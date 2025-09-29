<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_get_document_title(); ?></title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page">

        <!-- First Row: Site Logo and Title -->
        <header id="header" class="container">
            <div class="row">
                <!-- Site Logo -->
                <div class="col-12 text-center py-3">
                    <a href="<?php echo home_url(); ?>">
                        <img class="circle-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png"
                            alt="<?php bloginfo('name'); ?>" />
                    </a>
                </div>
                <!-- Site Title -->
                <div class="col-12 text-center" style="padding-bottom: 0px;padding-top: 20px;">
                    <h1 class="site-title">
                        <a href="<?php echo home_url(); ?>" style="text-decoration: none; color: #333;">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <p class="site-description"><?php bloginfo('description'); ?></p>
                </div>
            </div>
        </header>

        <!-- Second Row: Navbar with Side-by-Side Menu Items -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- Navbar Toggle Button (for mobile) -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary', // Ensure this matches your theme's location
                        'menu_class' => 'navbar-nav mr-auto', // Align to the left (change this if you want different alignment)
                        'container' => false, // Don't wrap the menu in a div
                        'depth' => 2, // Allows sub-menus
                    ));
                    ?>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="main-content" class="container mt-5">