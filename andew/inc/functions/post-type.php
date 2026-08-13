<?php

function create_posttype() {
    register_post_type('nap', array(
        'labels' => array(
            'name' => __('NAP'),
            'singular_name' => __('nap')
        ),
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-location',
        'rewrite' => array('slug' => 'nap'),
        'supports' => array('title', 'thumbnail'),
    ));

    register_post_type('post_testimonials', array(
        'labels' => array(
            'name' => __('Testimonials'),
            'singular_name' => __('Testimonial')
        ),
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => array('slug' => 'testimonial', 'with_front' => false),
        'supports' => array('title', 'thumbnail', 'editor'),
    ));

  register_post_type('post_result', array(
        'labels' => array(
            'name' => __('Case Results'),
            'singular_name' => __('Case Results')
        ),
        'public' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => array('slug' => 'case-results', 'with_front' => false),
        'supports' => array('title', 'thumbnail', 'editor'),
    ));
    register_post_type('post_team', array(
        'labels' => array(
            'name' => __('Team'),
            'singular_name' => __('Team')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'my-team', 'with_front' => false),
        'supports' => array('title', 'editor', 'thumbnail'),
        'hierarchical' => true,
    ));

    // register_post_type('post_faqs', array(
    //     'labels' => array(
    //         'name' => __('FAQs'),
    //         'singular_name' => __('FAQs')
    //     ),
    //     'public' => true,
    //     'has_archive' => true,
    //     'menu_icon' => 'dashicons-admin-post',
    //     'rewrite' => array('slug' => 'faq', 'with_front' => false),
    //     'supports' => array('title', 'editor', 'thumbnail'),
    //     'hierarchical' => true,
    // ));
}

add_action('init', 'create_posttype');

/* Taxonomies  */

function add_custom_taxonomies() {
        register_taxonomy('faqs_category', 'post_faqs', array(
        'label' => 'FAQs Categories',
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => array(
            'slug' => 'faqs_categories',
            'with_front' => false,
            'hierarchical' => true
        ),
    ));
	register_taxonomy('result_category', 'post_result', array(
        'label' => 'Case Results Categories',
        'hierarchical' => true,
        'show_admin_column' => true,
        'has_archive' => true,

        'rewrite'      => array('slug' => 'case-results-category', 'with_front' => false)
    ));
}

add_action('init', 'add_custom_taxonomies', 0);
