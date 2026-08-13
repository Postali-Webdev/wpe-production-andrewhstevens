<?php
$section = get_field('testimonial_section', get_option('page_on_front'));
$heading = $section['heading'];
$link    = $section['button'];

if (!wp_is_mobile()) {
    $post_no = 9;
} else {
    $post_no = 3;
}

$args = [
    'post_type'      => 'post_testimonials', // Replace with your actual testimonial post type slug
    'posts_per_page' => $post_no,            // Adjust the number of testimonials to display
    'post_status'    => 'publish',
];

$testimonials_query = new WP_Query($args);

if ($testimonials_query->have_posts()) : ?>
    <section class="space-pd home-testimonial">
        <div class="container wow fadeInUp">

            <?php if ($heading) : ?>
                <div class="heading-sc text-md-center mb-t mt-negative">
                    <h2><?php echo esc_html($heading); ?></h2>
                </div>
            <?php endif; ?>

            <div class="testimonial-slider" id="testimonial-slider">
                <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                    $author  = get_field('author'); // Replace with actual ACF field key
                    $title   = get_the_title();
                    $content = get_the_content();
                    $trimmed_content = wp_trim_words($content, 30, '...');
                    $rating  = get_field('rating');
                ?>
                    <div class="testimonial-card">

                        <?php if ($title) : ?>
                            <div class="col-title"><?php echo esc_html($title); ?></div>
                        <?php endif; ?>

                        <?php if ($trimmed_content) : ?>
                            <p class="content"><?php echo esc_html($trimmed_content); ?></p>
                        <?php endif; ?>

                        <div class="row align-items-center">
                            <div class="col-6">
                                <?php if ($rating >= 1 && $rating <= 5) :
                                    $filled_star_image_url = get_template_directory_uri() . '/img/star1.svg';
                                    echo '<div class="rating-stars d-flex align-items-center">';
                                    for ($i = 1; $i <= $rating; $i++) {
                                        echo '<img src="' . esc_url($filled_star_image_url) . '" alt="Star" class="star" width="19" height="17">';
                                    }
                                    echo '</div>';
                                endif; ?>
                            </div>
                            <div class="col-6 text-end">
                                <?php if ($author) : ?>
                                    <div class="author"><?php echo esc_html($author); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                <?php endwhile; ?>
            </div><!-- .testimonial-slider -->

            <?php if ($link) :
                $link_url    = $link['url'];
                $link_title  = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
                <div class="btn-wp text-center">
                    <a class="btn" href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                </div>
            <?php endif; ?>

        </div><!-- .container -->
    </section>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>