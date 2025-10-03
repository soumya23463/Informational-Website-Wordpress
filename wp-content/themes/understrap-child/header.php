<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_get_document_title(); ?></title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- Site Icon/Favicon - Dynamic from WordPress -->
    <?php
    $site_icon_url = get_site_icon_url();
    if ($site_icon_url) { ?>
    <link rel="icon" href="<?php echo esc_url($site_icon_url); ?>" />
    <link rel="shortcut icon" href="<?php echo esc_url($site_icon_url); ?>" />
    <?php } ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page">

        <!-- Header -->
        <header id="site-header">
            <!-- Top bar with social icons + search -->
            <div class="top-bar">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="social-icons">
                                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" title="Google Plus"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="search-box">
                                <form method="get" action="<?php echo home_url('/'); ?>">
                                    <input type="search" name="s" placeholder="Search"
                                        value="<?php echo get_search_query(); ?>">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main header -->
            <div class="main-header">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <!-- Logo -->
                            <div class="logo">
                                <?php
                                if (function_exists('the_custom_logo') && has_custom_logo()) {
                                    the_custom_logo();
                                } else {
                                ?>
                                <a href="<?php echo home_url(); ?>">
                                    <span class="logo-text">GLOBALY</span>
                                </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Navigation -->
                            <nav class="main-nav">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'menu_class'     => 'nav-menu',
                                    'container'      => false
                                ));
                                ?>
                            </nav>
                        </div>
                        <div class="col-lg-3">
                            <!-- Contact Info -->
                            <div class="contact-info">
                                <div class="phone-number">
                                    <i class="fas fa-phone-alt"></i>
                                    <span>800-2345-6789</span>
                                </div>
                                <div class="email">
                                    <a href="mailto:globaly@demolink.org">globaly@demolink.org</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <!-- Page Content -->