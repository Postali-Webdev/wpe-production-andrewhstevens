<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta name="google-site-verification" content="Zrku0rKaU1kb6EwSS1HhqZLmNsgOiCNj3SyvcXdYjg8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?php wp_title(); ?> </title>
    <?php wp_enqueue_script('jquery'); ?>
    <script>
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>
    <?php if (get_field('favicon', 'option')) { ?>
        <link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>">
    <?php } ?>

    <?php if (get_field('header_script', 'option')) { ?>
        <?php the_field('header_script', 'options'); ?>
    <?php } ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    $GLOBALS['header_logo'] = get_field('header_logo', 'option');
    $GLOBALS['header_phone'] = get_field('phone', 'option');
    $link = get_field('button', 'options');
    ?>

    <header class="header">
        <div id="header-search" class="search-panel">
            <div class="close-container search-close">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
            <?php echo get_search_form(); ?>
        </div>
<?php

                        if ($link && wp_is_mobile()):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                           
                                <a class="transparent-btn mobile-transparent-btn" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                           
                        <?php endif; ?>


        <div class="main-header-wrap no-list-ul">
		
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="header-logo">
                        <?php if ($GLOBALS['header_logo']): ?>
                            <a href="<?php echo site_url(); ?>">
                                <img src="<?php echo $GLOBALS['header_logo']; ?>" class="logo" alt="logo" width="250"
                                    height="65">
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="header-rgt">
                        <div class="header_menu_apply">
                            <?php if (!wp_is_mobile()): ?>
                                <div class="header-menu-wrap nav-menu">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'primary',
                                        'menu_class' => 'menu',
                                        'container' => false,
                                    ));
                                    ?>
                                    <div class="header-search">
                                        <div class="search-icon global-search">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.00614 1.80565e-08C6.72937 0.000108791 5.47115 0.305544 4.33643 0.890824C3.20172 1.4761 2.22342 2.32425 1.48316 3.36452C0.742897 4.40478 0.26214 5.60698 0.0809963 6.87083C-0.100148 8.13468 0.0235742 9.42353 0.44184 10.6298C0.860106 11.8361 1.56079 12.9249 2.48542 13.8054C3.41006 14.6858 4.53184 15.3324 5.75718 15.6911C6.98251 16.0498 8.27587 16.1103 9.52934 15.8676C10.7828 15.6248 11.96 15.0858 12.9628 14.2955L16.4029 17.7356C16.5806 17.9072 16.8185 18.0021 17.0655 18C17.3125 17.9978 17.5488 17.8988 17.7234 17.7241C17.8981 17.5495 17.9971 17.3132 17.9993 17.0662C18.0014 16.8192 17.9065 16.5813 17.7349 16.4036L14.2948 12.9635C15.2255 11.7829 15.8049 10.364 15.9669 8.86941C16.1289 7.3748 15.8668 5.86478 15.2106 4.51217C14.5544 3.15955 13.5307 2.019 12.2566 1.22102C10.9825 0.423049 9.5095 -0.000100927 8.00614 1.80565e-08ZM1.88328 8.00682C1.88328 6.38294 2.52836 4.82556 3.67662 3.6773C4.82488 2.52904 6.38225 1.88396 8.00614 1.88396C9.63002 1.88396 11.1874 2.52904 12.3357 3.6773C13.4839 4.82556 14.129 6.38294 14.129 8.00682C14.129 9.6307 13.4839 11.1881 12.3357 12.3363C11.1874 13.4846 9.63002 14.1297 8.00614 14.1297C6.38225 14.1297 4.82488 13.4846 3.67662 12.3363C2.52836 11.1881 1.88328 9.6307 1.88328 8.00682Z"
                                                    fill="#004488" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                            <?php endif; ?>
                        </div>
                        <?php

                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <div class="header-btn-sc">
                                <a class="transparent-btn" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ($GLOBALS['header_phone']): ?>


                            <div class="call-us-today">


                                <a href="tel:<?php echo preg_replace('/\D+/', '', $GLOBALS['header_phone']); ?>">
                                    <div class="call-icon"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18"
                                            viewBox="0 0 16 18" fill="none">
                                            <path
                                                d="M14.208 12.5283C13.1709 11.5982 12.1184 11.0349 11.094 11.9635L10.4824 12.5248C10.0348 12.9322 9.20274 14.8358 5.98562 10.9555C2.76917 7.08008 4.68323 6.47668 5.13143 6.07277L5.74645 5.51081C6.76545 4.58007 6.3809 3.40838 5.64595 2.20228L5.20244 1.47173C4.46415 0.268437 3.66021 -0.521817 2.63853 0.407522L2.08649 0.913285C1.63494 1.25819 0.372741 2.3793 0.0665717 4.50912C-0.301903 7.06463 0.860468 9.99103 3.52354 13.2019C6.18326 16.4142 8.78737 18.0277 11.2541 17.9996C13.3042 17.9765 14.5423 16.823 14.9295 16.4037L15.4836 15.8972C16.5026 14.9686 15.8695 14.0231 14.8317 13.0909L14.208 12.5283Z"
                                                fill="white" />
                                        </svg></div>
                                    <div class="header_phone_number">
                                        <?php echo $GLOBALS['header_phone']; ?>
                                    </div>
                                </a>

                            </div>
                        <?php endif; ?>
                        <div class="header-mobile-menu">
						<?php

                        if ($link && !wp_is_mobile()):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                           
                                <a class="transparent-btn" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                           
                        <?php endif; ?>
                            <div class="header-search">
                                <div class="search-icon global-search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.00614 1.80565e-08C6.72937 0.000108791 5.47115 0.305544 4.33643 0.890824C3.20172 1.4761 2.22342 2.32425 1.48316 3.36452C0.742897 4.40478 0.26214 5.60698 0.0809963 6.87083C-0.100148 8.13468 0.0235742 9.42353 0.44184 10.6298C0.860106 11.8361 1.56079 12.9249 2.48542 13.8054C3.41006 14.6858 4.53184 15.3324 5.75718 15.6911C6.98251 16.0498 8.27587 16.1103 9.52934 15.8676C10.7828 15.6248 11.96 15.0858 12.9628 14.2955L16.4029 17.7356C16.5806 17.9072 16.8185 18.0021 17.0655 18C17.3125 17.9978 17.5488 17.8988 17.7234 17.7241C17.8981 17.5495 17.9971 17.3132 17.9993 17.0662C18.0014 16.8192 17.9065 16.5813 17.7349 16.4036L14.2948 12.9635C15.2255 11.7829 15.8049 10.364 15.9669 8.86941C16.1289 7.3748 15.8668 5.86478 15.2106 4.51217C14.5544 3.15955 13.5307 2.019 12.2566 1.22102C10.9825 0.423049 9.5095 -0.000100927 8.00614 1.80565e-08ZM1.88328 8.00682C1.88328 6.38294 2.52836 4.82556 3.67662 3.6773C4.82488 2.52904 6.38225 1.88396 8.00614 1.88396C9.63002 1.88396 11.1874 2.52904 12.3357 3.6773C13.4839 4.82556 14.129 6.38294 14.129 8.00682C14.129 9.6307 13.4839 11.1881 12.3357 12.3363C11.1874 13.4846 9.63002 14.1297 8.00614 14.1297C6.38225 14.1297 4.82488 13.4846 3.67662 12.3363C2.52836 11.1881 1.88328 9.6307 1.88328 8.00682Z"
                                            fill="#004488" />
                                    </svg>
                                </div>
                            </div>
                            <div class="menu-button">
                                <div class="menu-bar-wrap">
                                    <div class="menu-bar menu-bar-top"></div>
                                    <div class="menu-bar menu-bar-middle"></div>
                                    <div class="menu-bar menu-bar-bottom"></div>
                                </div>
                            </div>
                            <div class="menu-wrap">
                                <div class="menu-close-button"></div>
                                <div class="menu-full-wrapper">
                                    <div class="menu-sidebar">
                                        <?php
                                        wp_nav_menu(array(
                                            'theme_location' => 'primary',
                                            'menu_class' => 'menu-bar-wrapper',
                                            'container' => 'false',
                                            'fallback_cb' => false // Do not fall back to wp_page_menu()
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </header>