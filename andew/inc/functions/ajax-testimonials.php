<?php

function load_more_testimonial() {
    $nonce_check = check_ajax_referer('extra-testimonial', 'security');

    if (!$nonce_check) {
        return;
    }

    $offset = $_POST['offset'];

    $args = [
        'post_type' => 'post_testimonials',
        'post_status' => 'publish',
        'posts_per_page' => '2',
        'orderby' => 'date',
        'order' => 'DESC',
        'offset' => $offset,
    ];
    $loop = new WP_Query($args);
    $found_post = $loop->found_posts;
    $i = 1;
    if ($loop->have_posts()):
        while ($loop->have_posts()):
            $loop->the_post();
            ?>
            <?php get_template_part('inc/testimonials/testimonials', 'loop'); ?> 
            <?php

        endwhile;
        wp_reset_postdata();
        $i++;
    endif;
    wp_die();
}

add_action('wp_ajax_load_more_testimonial', 'load_more_testimonial');
add_action('wp_ajax_nopriv_load_more_testimonial', 'load_more_testimonial');
