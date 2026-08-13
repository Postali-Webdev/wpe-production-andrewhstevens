<?php
function wpb_list_child_pages()
{
    global $post;
    $currentPage = get_the_ID();
    $children = get_pages('child_of=' . $currentPage);
    $title = get_field('widget_title', $currentPage);
    $parentId = wp_get_post_parent_id($currentPage);

       ?>

        <?php
         if (count($children) != 0) {
            ?>
            <div class="widget cat-widget pc-widget fullwidth">
                <div class="widget-menu">
                    <div class="widget-title h2 bb">
                        <a class="link " href="<?php echo get_the_permalink() ?>">
                            <?php echo $title ? $title : get_the_title($currentPage); ?>
                        </a>    
                    </div>
                    <div>
                        <ul>
                            <?php
                            $pageArgs = array(
                                'sort_order' => 'asc',
                                'sort_column' => 'post_title',
                                'hierarchical' => 1,
                                'child_of' => 0,
                                'parent' => $currentPage,
                                'post_type' => 'page',
                                'post_status' => 'publish'
                            );
                            $pages = get_pages($pageArgs);
                            foreach ($pages as $page) {
                                $activeClass = ($page->ID == $currentPage) ? "activeChild" : "";
                                $option = $page->post_title;
                                $title2 = get_field('menu_title', $page->ID);
                                ?>
                                <li class="<?php echo $activeClass; ?>">
                                    <a href="<?php echo get_page_link($page->ID); ?>">
                                        <?php echo $title2 ? $title2 : $option; ?>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
        } else {
            // This block handles when there are no child pages
            $parentId2 = wp_get_post_parent_id($currentPage);
            $title = get_field('widget_title', $parentId2);

            if ($parentId2 > 0) {
                ?>
                <div class="widget cat-widget pc-widget fullwidth">
                    <div class="widget-menu">
                        <div class="widget-title h2 aa">
                        <a class="link " href="<?php echo get_the_permalink() ?>">
                             <?php echo $title ? $title : get_the_title($parentId2); ?>
                        </a>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <?php
                                $pageArgs = array(
                                    
                                    'sort_column' => 'post_title',
                                    'hierarchical' => 1,
                                    'child_of' => 0,
                                    'parent' => $parentId2,
                                    'post_type' => 'page',
                                    'post_status' => 'publish'
                                );
                                $pages = get_pages($pageArgs);
                                foreach ($pages as $page) {
                                    $activeClass = ($page->ID == $currentPage) ? "activeChild" : "";
                                    $option = $page->post_title;
                                    $title2 = get_field('menu_title', $page->ID);
                                    ?>
                                    <li class="<?php echo $activeClass; ?>">
                                        <a href="<?php echo get_page_link($page->ID); ?>">
                                            <?php echo $title2 ? $title2 : $option; ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
            }else {
        // This block handles when the page is neither a child nor has children
        ?>


        <?php
        $themeLocations = get_nav_menu_locations();
        $menuObj = get_term($themeLocations['parent-child']);

        // Check if the menu object exists and has a name
        if (!empty($menuObj) && !empty($menuObj->name)) {
            ?>
            <div class="widget cat-widget pc-widget fullwidth">
                <div class="widget-menu">
                    <div class="widget-title h2"><?php echo $menuObj->name; ?></div>
                    <?php
                    // Display the menu
                    wp_nav_menu(array('theme_location' => 'parent-child')); ?>
                </div>
            </div>
            <?php
        }
        ?>


        <?php
    }
}
}

add_shortcode('child-pages', 'wpb_list_child_pages');
add_filter('widget_text', 'do_shortcode');

register_nav_menus(
    array(
        'parent-child' => __('Parent child menu')
    )
);
?>