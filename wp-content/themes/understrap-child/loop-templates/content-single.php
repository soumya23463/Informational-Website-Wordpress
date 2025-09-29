<?php

/**
 * Template part for displaying single posts
 *
 * @package Understrap Child Theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5 shadow-sm bg-white rounded p-4'); ?>>

    <header class="entry-header mb-4 border-bottom pb-3">
        <h1 class="entry-title display-4"><?php the_title(); ?></h1>
        <div class="entry-meta text-muted small">
            <span><i class="bi bi-calendar"></i> <?php echo get_the_date(); ?></span> &nbsp;|&nbsp;
            <span><i class="bi bi-person"></i> <?php the_author_posts_link(); ?></span>
        </div>
    </header>

    <?php if (has_post_thumbnail()) : ?>
    <div class="post-thumbnail mb-4 text-center">
        <?php the_post_thumbnail('large', ['class' => 'img-fluid rounded']); ?>
    </div>
    <?php endif; ?>

    <div class="entry-content fs-5" style="line-height: 1.8;">
        <?php
        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links mt-4">' . __('Pages:', 'understrap-child'),
            'after'  => '</div>',
        ));
        ?>
    </div>

    <footer class="entry-footer mt-5 border-top pt-3 text-muted small">
        <div>
            <strong>Tags:</strong> <?php the_tags('', ', ', ''); ?>
        </div>
        <div>
            <strong>Categories:</strong> <?php the_category(', '); ?>
        </div>
    </footer>

</article>