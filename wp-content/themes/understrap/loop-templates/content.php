<?php

/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap Child Theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

<article <?php post_class('mb-5'); ?> id="post-<?php the_ID(); ?>">

    <div class="card shadow-sm border-0 h-100">

        <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('large', ['class' => 'card-img-top img-fluid rounded-top']); ?>
        </a>
        <?php endif; ?>

        <div class="card-body">

            <header class="entry-header mb-3">
                <?php
				the_title(
					sprintf('<h2 class="card-title h4"><a class="text-decoration-none text-dark" href="%s" rel="bookmark">', esc_url(get_permalink())),
					'</a></h2>'
				);
				?>

                <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta text-muted small mb-2">
                    <i class="bi bi-calendar"></i> <?php echo get_the_date(); ?>
                    &nbsp;|&nbsp;
                    <i class="bi bi-person"></i> <?php the_author_posts_link(); ?>
                    <?php if (comments_open() || get_comments_number()) : ?>
                    &nbsp;|&nbsp;
                    <i class="bi bi-chat"></i> <?php comments_number('No Comments', '1 Comment', '% Comments'); ?>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </header>

            <div class="entry-content">
                <?php
				the_excerpt();
				?>
            </div>

        </div><!-- .card-body -->



    </div><!-- .card -->

</article>