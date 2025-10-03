<?php
/**
 * WordPress Secure Configuration Helper
 * This file provides encryption/decryption functions for sensitive data
 */

class WP_Secure_Config {

    private static $encryption_key = null;

    /**
     * Initialize encryption key from environment or file
     */
    public static function init() {
        $key_file = dirname(__FILE__) . '/.encryption_key';

        if (file_exists($key_file)) {
            self::$encryption_key = trim(file_get_contents($key_file));
        } else {
            self::$encryption_key = self::generateKey();
            file_put_contents($key_file, self::$encryption_key);
            chmod($key_file, 0600);
        }
    }

    /**
     * Generate a secure encryption key
     */
    private static function generateKey() {
        return base64_encode(random_bytes(32));
    }

    /**
     * Encrypt sensitive data
     */
    public static function encrypt($data) {
        if (self::$encryption_key === null) {
            self::init();
        }

        $iv = random_bytes(16);
        $encrypted = openssl_encrypt($data, 'AES-256-CBC', self::$encryption_key, 0, $iv);
        return base64_encode($iv . '::' . $encrypted);
    }

    /**
     * Decrypt sensitive data
     */
    public static function decrypt($data) {
        if (self::$encryption_key === null) {
            self::init();
        }

        $decoded = base64_decode($data);
        list($iv, $encrypted) = explode('::', $decoded, 2);
        return openssl_decrypt($encrypted, 'AES-256-CBC', self::$encryption_key, 0, $iv);
    }

    /**
     * Get database credentials from environment or encrypted storage
     */
    public static function getDbCredentials() {
        $credentials = [
            'DB_NAME' => getenv('WP_DB_NAME') ?: 'informational-website-wordpress',
            'DB_USER' => getenv('WP_DB_USER') ?: 'root',
            'DB_PASSWORD' => getenv('WP_DB_PASSWORD') ?: '',
            'DB_HOST' => getenv('WP_DB_HOST') ?: 'localhost'
        ];

        return $credentials;
    }

    /**
     * Security headers and configurations
     */
    public static function setSecurityHeaders() {
        if (!headers_sent()) {
            header('X-Frame-Options: SAMEORIGIN');
            header('X-Content-Type-Options: nosniff');
            header('X-XSS-Protection: 1; mode=block');
            header('Referrer-Policy: strict-origin-when-cross-origin');

            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
                header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
            }
        }
    }

    /**
     * Check if site is using HTTPS
     */
    public static function enforceSSL() {
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
            if (!defined('WP_CLI') && php_sapi_name() !== 'cli') {
                $redirect_url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                header('Location: ' . $redirect_url);
                exit();
            }
        }
    }
}

/**
 * Additional security functions
 */

function wp_secure_random_string($length = 64) {
    return bin2hex(random_bytes($length / 2));
}

function wp_hash_password_secure($password) {
    return password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
}

function wp_verify_password_secure($password, $hash) {
    return password_verify($password, $hash);
}