<?php

/**
 * Front page template
 *
 * @package Understrap Child
 */

// Include header
get_header();
?>

<!-- Hero Banner Section -->
<?php
// Get featured image URL for front page
$featured_image_url = '';
$front_page_id = get_option('page_on_front');

if ($front_page_id && has_post_thumbnail($front_page_id)) {
    $featured_image_url = get_the_post_thumbnail_url($front_page_id, 'full');
}
?>
<div id="main-content" class="container-fluid d-flex align-items-center justify-content-center text-center"
    style="background: url('<?php echo esc_url($featured_image_url); ?>') no-repeat center center; background-size: cover; height: 100vh;">


    <div class="overlay"></div> <!-- optional dark overlay -->

    <div class="container position-relative">
        <h1 class="display-4 font-weight-bold text-white">Full Cycle Business Management</h1>
        <p class="lead text-white">
            Whether your company looks for a financial consulting, investment risks assessments or an interim, HR
            management, we’re ready to provide that for you.We have a proven expertise in any process, that a modern day
            business lives and works through.
        </p>
        <a href="about-page/" class="btn btn-primary btn-lg">READ MORE</a>
    </div>

</div>


<!-- Services Section -->
<div class="container py-5">
    <h3 class="text-center" style="letter-spacing: -1px;">business Management</h3>
    <h1 class="text-center mb-3" style="font-size: 50px;font-weight: bolder;">Services We Offer</h1>
    <div class="text-center mb-5">
        <hr style="width: 80px; height: 4px; background-color: #00d4d8; border: none; margin: 20px auto;">
    </div>


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
                    <h2 class="service-title"><?php the_title(); ?></h2>
                    <div class="service-desc">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php
                $counter++;
            endwhile;
            wp_reset_postdata();
        else : ?>
            <p>No services found.</p>
        <?php endif; ?>
    </div>


    <div class="text-center">
        <a href="<?php echo get_permalink(get_page_by_path('services')); ?>" class="btn btn-primary btn-lg">VIEW
            MORE</a>

    </div>
</div>


<!-- Case Studies Section -->
<div class="case-studies-section d-flex align-items-center"
    style="background: linear-gradient(135deg, #3a7bd5 0%, #3a6073 100%); color: white;">

    <div class="container py-5">
        <div class="row align-items-center">

            <!-- Left Side Image -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="http://localhost/Informational-Website-Wordpress/wp-content/uploads/2025/10/image39.jpg"
                    alt="Case Studies" class="img-fluid rounded shadow">
            </div>

            <!-- Right Side Text -->
            <div class="col-md-6">
                <h2 class="display-5 font-weight-bold">Case Studies & Success</h2>
                <p class="lead">
                    Any company level of expertise, trustworthiness or popularity can be easily checked
                    when it comes to proven cases...
                </p>
                <p>
                    We stockpiled hundreds of successful business consulting operations throughout the
                    25 years long history we’re in this business. Here are the best examples of our
                    diligent and efficient advice for small and big companies.
                </p>
                <a href="" class="btn btn-outline-light btn-lg mt-3">OUR CASES</a>
            </div>
        </div>
    </div>
</div>
<!-- End Case Studies Section -->

<!-- Buisness Section -->
<section class="business-tips py-5">
    <div class="container">
        <!-- Section Title -->
        <div class="text-center mb-5">
            <h2 class="section-title">Browse our <strong>Business Tips</strong></h2>
            <hr style="width:80px;height:3px;background:#00d4d8;border:none;margin:15px auto;">
        </div>

        <div class="row">
            <?php
            // Custom query for latest 3 posts from "Business Tips" category
            $args = array(
                'posts_per_page' => 3,
                'category_name'  => 'business-tips' // <-- Change to your category slug
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <!-- Featured Image -->
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top']); ?>
                                </a>
                            <?php endif; ?>

                            <div class="card-body">
                                <!-- Date & Author -->
                                <p class="text-muted small mb-2">
                                    <span class="date text-info"><?php echo get_the_date('d.m.Y'); ?></span>
                                    <span class="author"> by <?php the_author(); ?></span>
                                </p>

                                <!-- Title -->
                                <h5 class="card-title">
                                    <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                                        <?php the_title(); ?>
                                    </a>
                                </h5>

                                <!-- Excerpt -->
                                <p class="card-text text-muted">
                                    <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p class="text-center">No posts found!</p>
            <?php endif; ?>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-4">
            <a href="<?php echo get_category_link(get_category_by_slug('my-data-page')); ?>"
                class="btn btn-info btn-lg text-white px-5">
                View All
            </a>
        </div>
    </div>
</section>
<!-- End Buisness Section -->

<!-- Performance Stats Section -->
<section class="performance-stats py-5"
    style="background:url('http://localhost/Informational-Website-Wordpress/wp-content/uploads/2025/10/image33.jpg') no-repeat center center; background-size: cover; color:#fff;">
    <div class=" container text-center">
        <h2 class="section-title mb-4">Thanks to our business tips</h2>
        <h3 class="mb-5" style="font-weight: bold;">You’ll improve your performance!</h3>

        <div class="row justify-content-center">
            <!-- Companies Consulted -->
            <div class="col-md-3 mb-4">
                <div class="stat-card">
                    <h2 class="display-4" style="font-size: 50px; font-weight: bold;">56</h2>
                    <p class="text-muted">Companies consulted</p>
                </div>
            </div>

            <!-- Consultants -->
            <div class="col-md-3 mb-4">
                <div class="stat-card">
                    <h2 class="display-4" style="font-size: 50px; font-weight: bold;">47</h2>
                    <p class="text-muted">Consultants</p>
                </div>
            </div>

            <!-- Awards Won -->
            <div class="col-md-3 mb-4">
                <div class="stat-card">
                    <h2 class="display-4" style="font-size: 50px; font-weight: bold;">85</h2>
                    <p class="text-muted">Awards won</p>
                </div>
            </div>

            <!-- Satisfied Customers -->
            <div class="col-md-3 mb-4">
                <div class="stat-card">
                    <h2 class="display-4" style="font-size: 50px; font-weight: bold;">79</h2>
                    <p class="text-muted">Satisfied customers</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Performance Stats Section -->


<!-- Dynamic Testimonials Section -->
<section class="client-testimonials-dynamic py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">What Our Clients Say</h2>
        <div class="row justify-content-center">
            <?php
            $args = array(
                'post_type' => 'testimonial',
                'posts_per_page' => 4
            );
            $testimonial_query = new WP_Query($args);

            if ($testimonial_query->have_posts()) :
                while ($testimonial_query->have_posts()) : $testimonial_query->the_post(); ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="p-4 bg-white rounded shadow-sm h-100">
                            <div class="mb-3">
                                <?php
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('thumbnail', ['class' => 'rounded-circle', 'style' => 'width:80px; height:80px; object-fit:cover;']);
                                }
                                ?>
                            </div>
                            <p class="text-muted"><?php the_content(); ?></p>
                            <h5 class="mt-3 font-weight-bold"><?php the_title(); ?></h5>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No testimonials found.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End -->

<!-- Revenue Growth CTA Section -->
<section class="revenue-growth-cta d-flex align-items-center text-center text-white"
    style="background: url('http://localhost/Informational-Website-Wordpress/wp-content/uploads/2025/10/image44.jpg') no-repeat center center; background-size: cover; height: 60vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h5 class="mb-3" style="font-weight: 400;">As we’re managing the aspects of your business,</h5>
                <h1 class="font-weight-bold mb-4" style="font-size: 3rem;">Your revenue continues to grow.</h1>
                <a href="#" class="btn btn-outline-light btn-lg px-4 py-2">LEARN MORE</a>
            </div>
        </div>
    </div>
</section>


<!-- Contact Us Section -->
<section class="contact-us bg-light py-5">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="font-weight-bold">Contact Us</h2>
            <p class="lead">We’d love to hear from you. Let us help you grow your business.</p>
            <hr style="width:80px; height:3px; background:#00d4d8; border:none; margin:20px auto;">
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php echo do_shortcode('[contact-form-7 id="39e91f5" title="Contact form 1"]'); ?>
                <!-- Replace with your real shortcode -->
            </div>
        </div>
    </div>
</section>


<?php
// Include footer
get_footer();
?>