<?php
/* Template Name: Testimonials Page */
get_header();
get_template_part('inc/inner', 'banner');
?>

<section class="testimonial-list space-mr">
    <div class="container">

        <?php if (!empty(get_the_content())): ?>

            <div class="top-sec text-center">
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>

        <?php endif; ?>

        <?php
        // Define the number of testimonials per page
        $testimonials_per_page = 9;

        // Get the current page
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // Define the WP_Query arguments
        $args = array(
            'post_type' => 'post_testimonials', // Replace 'post_testimonials' with your custom post type slug
            'posts_per_page' => $testimonials_per_page,
            'paged' => $paged,
        );

        // Custom query
        $testimonials_query = new WP_Query($args);

        // The Loop
        if ($testimonials_query->have_posts()): ?>
            <div class="testimonials-list mt-4">
                <div class="row row1">
                    <?php while ($testimonials_query->have_posts()):
                        $testimonials_query->the_post();
                        $author = get_field('author'); // Replace with the actual field key
                        $title = get_the_title();
                        $content = get_the_content();
                        $rating = get_field('rating');
                        ?>
                        <div class="col-xl-6 testimonial-card">
                            <div class="col-wp">
                                <?php if ($title): ?>
                                    <div class="col-title"> <?php echo esc_html($title); ?> </div>
                                <?php endif; ?>

                                <?php if ($content): ?>
                                    <p class="content"> <?php echo wp_kses_post($content); ?> </p>
                                <?php endif; ?>

                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <?php if ($rating >= 1 && $rating <= 5): ?>
                                            <div class="rating-stars d-flex align-items-center">
                                                <?php
                                                $filled_star_image_url = get_template_directory_uri() . '/img/star1.svg';
                                                for ($i = 1; $i <= $rating; $i++): ?>
                                                    <img src="<?php echo esc_url($filled_star_image_url); ?>" alt="Star" class="star"
                                                        width="19" height="17">
                                                <?php endfor; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-6 text-end">
                                        <?php if ($author): ?>
                                            <div class="author"> <?php echo esc_html($author); ?> </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="paging-new fullwidth">
                    <nav class="navigation pagination" aria-label="Posts pagination">

                        <div class="nav-links">
                            <?php
                            // Pagination
                            echo paginate_links(array(
                                'total' => $testimonials_query->max_num_pages,
                                'current' => $paged,
                                'type' => 'plain', // Use 'plain' instead of 'list'
                                'prev_text' => __('Previous', 'textdomain'),
                                'next_text' => __('Next', 'textdomain'),
                            ));
                            ?>
                        </div>
                    </nav>
                </div>
            </div>



        <?php else: ?>
            <p class="no-testimonials">No testimonials found.</p>
        <?php endif; ?>

        <?php
        // Reset post data
        wp_reset_postdata();
        ?>

    </div>
</section>

<?php get_footer(); ?>