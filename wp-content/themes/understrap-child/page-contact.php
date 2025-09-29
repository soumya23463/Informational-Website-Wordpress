<?php

/**
 * Template Name: Contact Page
 * Template Post Type: page
 */

get_header(); ?>

<!-- Contact Page Content -->
<section id="contact-section" class="contact-section">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We would love to hear from you. Fill out the form below to get in touch.</p>

        <!-- Contact Form (using shortcode for Contact Form 7 or WPForms) -->
        <?php echo do_shortcode('[contact-form-7 id="1904e7b" title="New Contact Form"]'); ?>

    </div>
</section>

<?php get_footer(); ?>