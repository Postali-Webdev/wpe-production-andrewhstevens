<?php

function enqueue_my_css() {
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css', false, time());
   
        wp_enqueue_style('slick_css', get_template_directory_uri() . '/css/slick.css', false, time());
        wp_enqueue_style('wow_css', get_template_directory_uri() . '/css/animate.min.css', false, time());
    wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css', false, time());  
    if (is_front_page()) {  
        wp_enqueue_style('home_css', get_template_directory_uri() . '/css/home.css', false, time());
    }
   
    if (!is_front_page()) {
        wp_enqueue_style('inner_css', get_template_directory_uri() . '/css/inner-page.css', false, time());
    }
    wp_enqueue_script('wow-js', get_template_directory_uri() . '/js/wow.min.js', array('jquery'), false, time());
    wp_enqueue_style('main_css', get_template_directory_uri() . '/css/main.css', false, time());
    wp_enqueue_style('responsive_css', get_template_directory_uri() . '/css/responsive.css', false, time());
}

add_action('wp_enqueue_scripts', 'enqueue_my_css');

function enqueue_my_script() {
    if (!is_front_page()) {
        wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, time());
    }

   
        wp_enqueue_script('slick_js', get_template_directory_uri() . '/js/slick.js', array('jquery'), false, time());
    
    wp_enqueue_script('jqueryvalidate', get_template_directory_uri() . '/js/jquery.validate.min.js', array('jquery'), false, true);
    wp_enqueue_script('html5lightbox', get_template_directory_uri() . '/js/html5lightbox.js', array('jquery'), false, time());
    wp_enqueue_script('froogaloop2', get_template_directory_uri() . '/js/froogaloop2.min.js', array('jquery'), false, time());
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js?'.time(), array('jquery'), false, time());
}

add_action('wp_enqueue_scripts', 'enqueue_my_script');

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
 wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

?>