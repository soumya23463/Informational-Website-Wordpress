<?php

/**
 * The template for displaying all single posts
 *
 * @package Understrap Child Theme
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="wrapper py-5 bg-light" id="single-wrapper">
    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">
        <div class="row">

            <!-- Left Sidebar (Optional) -->
            <?php get_template_part('global-templates/left-sidebar-check'); ?>

            <!-- Main Content + Right Sidebar -->
            <div class="d-flex flex-wrap">
                <main class="site-main col-md-8" id="main">

                    <?php
					while (have_posts()) {
						the_post();

						// Post content
						get_template_part('loop-templates/content', 'single');
					?>
                    <!-- Post navigation -->
                    <nav class="post-navigation d-flex justify-content-between my-5" aria-label="Post navigation">
                        <div class="nav-previous">
                            <?php
								$prev_post = get_previous_post();
								if (!empty($prev_post)) {
									echo '<a class="btn btn-outline-primary" href="' . get_permalink($prev_post->ID) . '" rel="prev">';
									echo '<i class="bi bi-arrow-left"></i> ' . esc_html(get_the_title($prev_post->ID));
									echo '</a>';
								}
								?>
                        </div>
                        <div class="nav-next ml-auto">
                            <?php
								$next_post = get_next_post();
								if (!empty($next_post)) {
									echo '<a class="btn btn-outline-primary" href="' . get_permalink($next_post->ID) . '" rel="next">';
									echo esc_html(get_the_title($next_post->ID)) . ' <i class="bi bi-arrow-right"></i>';
									echo '</a>';
								}
								?>
                        </div>
                    </nav>
                    <?php
						// Comments
						if (comments_open() || get_comments_number()) {
							comments_template();
						}
					}
					?>

                </main>

                <!-- Right Sidebar -->
                <?php if (is_active_sidebar('right-sidebar')) : ?>
                <aside class="col-md-4" id="right-sidebar" role="complementary">
                    <div class="bg-white p-4 rounded shadow-sm">
                        <?php dynamic_sidebar('right-sidebar'); ?>
                    </div>
                </aside>
                <?php endif; ?>
            </div><!-- /.d-flex -->

        </div><!-- /.row -->
    </div><!-- /#content -->
</div><!-- /#single-wrapper -->

<?php
get_footer();
?>