<?php

/**
 * Template Name: Page with Sidebar
 * Description: A custom page template with a right sidebar.
 */

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<div class="wrapper py-5 bg-light" id="page-wrapper">
    <div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">
        <div class="row">

            <!-- Main Content -->
            <main class="site-main col-md-8" id="main">
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
                    <header class="entry-header mb-4">
                        <h1 class="entry-title display-5"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content fs-5">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php endwhile; ?>
            </main>

            <!-- Sidebar -->
            <?php get_template_part('global-templates/right-sidebar-check'); ?>

        </div><!-- .row -->
    </div><!-- #content -->
</div><!-- #page-wrapper -->

<?php get_footer(); ?>