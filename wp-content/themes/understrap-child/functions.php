<?php

/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts()
{
	wp_dequeue_style('understrap-styles');
	wp_deregister_style('understrap-styles');

	wp_dequeue_script('understrap-scripts');
	wp_deregister_script('understrap-scripts');
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles()
{

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get('Version');

	$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	$css_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_styles);

	wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version);
	wp_enqueue_script('jquery');

	$js_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_scripts);

	wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain()
{
	load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version()
{
	return 'bootstrap5';
}
add_filter('theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20);



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js()
{
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array('customize-preview'),
		'20130508',
		true
	);
}
add_action('customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js');



function add_fresh_market_posts_bulk()
{
	if (! get_option('fresh_market_posts_created')) {
		$posts = [
			[
				'The Rise of Fresh Markets in Urban Areas',
				'Urban communities are embracing fresh markets to promote healthy eating and support local farmers. These markets offer seasonal produce and reduce reliance on supermarkets.'
			],
			[
				'Top 5 Organic Vegetables You’ll Find at a Fresh Market',
				'Discover popular organic vegetables such as kale, spinach, carrots, tomatoes, and beets — all freshly harvested and chemical-free.'
			],
			[
				'Fresh Market vs Supermarket: What’s the Difference?',
				'Fresh markets focus on locally sourced and seasonal goods, while supermarkets rely on mass production and longer supply chains.'
			],
			[
				'How to Shop Smart at Your Local Fresh Market',
				'Bring cash, reusable bags, and visit early for the best selection. Don’t be afraid to talk to vendors about where their produce comes from.'
			],
			[
				'The Environmental Impact of Buying Local Produce',
				'Supporting local farms helps reduce your carbon footprint by cutting down on transportation and packaging waste.'
			],
		];

		foreach ($posts as $post_data) {
			wp_insert_post(array(
				'post_title'   => $post_data[0],
				'post_content' => $post_data[1],
				'post_status'  => 'publish',
				'post_author'  => 1,
				'post_category' => array(1), // Default category or change ID
				'tags_input'   => array('fresh market', 'organic', 'local'),
			));
		}

		update_option('fresh_market_posts_created', true);
	}
}
add_action('init', 'add_fresh_market_posts_bulk');


// Register Testimonials Post Type
function create_testimonials_cpt()
{
	$labels = array(
		'name' => 'Testimonials',
		'singular_name' => 'Testimonial',
		'menu_name' => 'Testimonials',
		'add_new' => 'Add New',
		'add_new_item' => 'Add New Testimonial',
		'edit_item' => 'Edit Testimonial',
		'new_item' => 'New Testimonial',
		'view_item' => 'View Testimonial',
		'search_items' => 'Search Testimonials',
		'not_found' => 'No Testimonials found',
		'not_found_in_trash' => 'No Testimonials found in Trash',
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => false,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-testimonial',
		'show_in_rest' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
	);

	register_post_type('testimonial', $args);
}
add_action('init', 'create_testimonials_cpt');



function my_register_services_cpt()
{
	$labels = array(
		'name'               => 'Services',
		'singular_name'      => 'Service',
		'add_new'            => 'Add New Service',
		'add_new_item'       => 'Add New Service',
		'edit_item'          => 'Edit Service',
		'new_item'           => 'New Service',
		'view_item'          => 'View Service',
		'search_items'       => 'Search Services',
		'not_found'          => 'No services found',
		'not_found_in_trash' => 'No services found in Trash',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => false,
		'rewrite'            => array('slug' => 'services'),
		'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
		'menu_icon'          => 'dashicons-hammer', // आप icon बदल सकते हो
	);

	register_post_type('service', $args);
}
add_action('init', 'my_register_services_cpt');