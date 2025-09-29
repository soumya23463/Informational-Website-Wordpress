<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */
/* That's all, stop editing! Happy publishing. */
define( 'WP_HOME', 'http://localhost/Informational-Website-Wordpress' );
define( 'WP_SITEURL', 'http://localhost/Informational-Website-Wordpress' );

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'first_wordpress');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', '');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5/c$!.vFa1oLI~SZT?X_5}|zXujD>W,0IKCasE|LO*q wk6R`-O3VfiZ?!{B#V=6');
define('SECURE_AUTH_KEY',  'n53[1N7adzc^`qU.&K{+Ro[Xewc&f^w)u}VoDa2#2TW0l$wyh3QjRgL!9S1mg}ms');
define('LOGGED_IN_KEY',    'Z&H]H=O-R?nbZ&(_ge||P]5oOn>)`@t+tp~F)pO~B7dL5;ge y_Pc3Q@tj=MB<og');
define('NONCE_KEY',        't+#{[WrRnqov./?&oq}6bG3dzqYF(QVLsFl3R3YF My^m=X{gI6B$*Jn]SB8|ZZ^');
define('AUTH_SALT',        'gU+:qf#QEC:F9FB{x5M<nOKl8sWYnQ?pynOux#PwQ:~&TRLv_|7 5-8UHPd}/r?H');
define('SECURE_AUTH_SALT', '{;OL*G+*AJ!Y.;l7i%DQwzI#EEr6y3$,y]hUJb9C:6(0Euq,X+LTnx3|r|[gk4}Y');
define('LOGGED_IN_SALT',   '6.T+},hNYS=7Ldd}q16lu+/6Z]!v21h?eO1UT* )UMfvSH%bKeRIBKi[QCUBP{^[');
define('NONCE_SALT',       '%]qwNDE+/oq08 -Gn1,f4KFW0GCc?d1j^78=s@N~lc[8vR4Gv{D(V;X2d+Sxub9c');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';