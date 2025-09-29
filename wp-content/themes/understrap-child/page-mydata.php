<?php
/*
Template Name: My Data Page
*/

get_header(); ?>

<div class="custom-post-list-container"
    style="max-width: 800px; margin: 50px auto; padding: 30px; background: #f9f9f9; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; color: #333; margin-bottom: 30px;"> Latest Blog Posts</h2>

    <?php
    global $wpdb;

    // Get published posts
    $results = $wpdb->get_results("SELECT ID, post_title FROM {$wpdb->prefix}posts WHERE post_status='publish' AND post_type='post' ORDER BY post_date DESC LIMIT 10");

    if (!empty($results)) {
        echo '<ul style="list-style: none; padding: 0;">';
        foreach ($results as $row) {
            $permalink = get_permalink($row->ID);
            echo '<li style="margin-bottom: 15px; background: #fff; border-left: 5px solid #28a745; padding: 15px 20px; border-radius: 5px; transition: all 0.3s;">';
            echo '<a href="' . esc_url($permalink) . '" style="text-decoration: none; color: #222; font-weight: 500;">' . esc_html($row->post_title) . '</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p style="text-align: center; color: #666;">No posts found.</p>';
    }
    ?>
</div>


<?php get_footer(); ?>