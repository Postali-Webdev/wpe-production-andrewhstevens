<?php

/**
 * customtheme's functions and definitions
 *
 * @package theme_setup
 * @since theme_setup 1.0
 */
/**
 * First, let's set the maximum content width based on the theme's
 * design and stylesheet. Test comment for Git push.
 * This will limit the width of all uploaded images and embeds.
 */
if (!isset($content_width)) {
    $content_width = 800; /* pixels */
}


if (!function_exists('theme_setup')) :

    /**
     * Sets up theme defaults and registers support for various
     * WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme
     * hook, which runs before the init hook. The init hook is too late
     * for some features, such as indicating support post thumbnails.
     */
    function theme_setup() {
        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('customtheme', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support('automatic-feed-links');

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');

        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'customtheme'),
            'secondary' => __('Secondary Menu', 'customtheme'),
            'footer' => __('Footer Menu', 'customtheme'),
        ));

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));

        add_filter('use_block_editor_for_post', '__return_false');
        add_filter('disable_wpseo_json_ld_search', '__return_true');

        // Add Thumbnail Support
        add_theme_support('post-thumbnails');
    }

endif; // theme_setup
add_action('after_setup_theme', 'theme_setup');

get_template_part('/inc/functions/enqueue', 'scripts');
get_template_part('/inc/functions/parent', 'child');
get_template_part('/inc/functions/post', 'type');
get_template_part('/inc/functions/ajax', 'testimonials');

// Removed Script Attribute
add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);

function codeless_remove_type_attr($tag, $handle) {
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');

add_action('wp_footer', 'redirect_cf7');

function redirect_cf7() {
    ?>
    <script type="text/javascript">
        document.addEventListener('wpcf7mailsent', function (event) {
            if ('596' == event.detail.contactFormId) {
                location = 'thank-you-404-error';
            } else if ('205' == event.detail.contactFormId) {
                location = '/thank-you-footer-form/';
            } else if ('290' == event.detail.contactFormId) {
                location = '/thank-you-contact-form/';
            }else if ('523' == event.detail.contactFormId) {
                location = '/thank-you-sidebar-form/';
            } else {
                location = '/thank-you/';
            }
        }, false);
    </script>
    <?php

}

function year_shortcode() {
    $year = date_i18n('Y');
    return $year;
}

add_shortcode('year', 'year_shortcode');

/* new theme options for header and footer */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

/* * **********Ipad Function************* */
add_filter('wp_is_mobile', 'mobile_edits');

function mobile_edits() {
    static $is_mobile;

    if (isset($is_mobile))
        return $is_mobile;

    if (empty($_SERVER['HTTP_USER_AGENT'])) {
        $is_mobile = false;
    } elseif (
            strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false || strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
    ) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') == false) {
        $is_mobile = true;
    } elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad') !== false) {
        $is_mobile = false;
    } else {
        $is_mobile = false;
    }
    return $is_mobile;
}
function enable_extended_upload($mime_types = array()) {
    $mime_types['svg'] = 'application/svg';
    return $mime_types;
}

add_filter('upload_mimes', 'enable_extended_upload');

/* SVG Upload Code */
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

add_filter('walker_nav_menu_start_el', 'wpse_226884_replace_hash', 999);

/**
 * Replace # with js
 * @param string $menu_item item HTML
 * @return string item HTML
 */
function wpse_226884_replace_hash($menu_item) {
    if (strpos($menu_item, 'href="#"') !== false) {
        $menu_item = str_replace('href="#"', 'href="javascript:void(0);"', $menu_item);
    }
    return $menu_item;
}

/*  Disable the Schema - Yoast */

function disable_yoast_schema_data($data) {
    $data = array();
    return $data;
}

add_filter('wpseo_json_ld_output', 'disable_yoast_schema_data', 10, 1);

/* * **********Script call from admin setting**************** */

function header_script() {
    if (get_field('header_script', 'option')):
        the_field('header_script', 'option');
    endif;
}

add_action('wp_head', 'header_script');

function footer_script() {
    if (get_field('footer_script', 'option')):
        the_field('footer_script', 'option');
    endif;
}

add_action('wp_footer', 'footer_script');

function custom_yoast_breadcrumb_home_icon($links) {
    if (!empty($links[0]['text']) && $links[0]['text'] === 'Home') {
        $links[0]['text'] = '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
<path d="M13.75 5.95753L7.5 0.748779L1.25 5.95753V13.75H4.6875V8.43753H10.3125V13.75H13.75V5.95753Z" fill="white"/>
<path d="M9.0625 13.75H5.9375V9.6875H9.0625V13.75Z" fill="white"/>
</svg>'; // FontAwesome icon
    }
    return $links;
}
add_filter('wpseo_breadcrumb_links', 'custom_yoast_breadcrumb_home_icon');


function increase_upload_size() {
    @ini_set('upload_max_size', '256M');
    @ini_set('post_max_size', '256M');
    @ini_set('memory_limit', '512M');
}
add_action('init', 'increase_upload_size');