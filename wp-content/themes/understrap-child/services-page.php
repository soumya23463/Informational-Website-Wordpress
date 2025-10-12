<?php

/**
 * Template Name: Services Grid Page
 * Template Post Type: page
 */

get_header(); ?>

<section class="services-section">
    <div class="container">
        <h1><?php the_title();
            ?></h1>
        <div class="services-grid">
            <?php
            $args = array(
                'post_type'      => 'service',
                'posts_per_page' => -1,
                'order'          => 'ASC',
            );
            $counter = 1;
            $services = new WP_Query($args);
            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post(); ?>
            <div class="service-item">
                <div class="service-number">
                    <?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                <div class="service-icon">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
                <?php endif; ?>
                <div class="service-desc">
                    <?php the_content(); ?>
                </div>
                <h2 class="service-title"><?php the_title(); ?></h2>

            </div>
            <?php
                    $counter++;
                endwhile;
                wp_reset_postdata();
            else : ?>
            <p>No services found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>