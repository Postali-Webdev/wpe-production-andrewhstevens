<div class="widget searchitem  d-lg-block d-none " id="sidebar-search">
    <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
        <label>
            <span class="screen-reader-text"><?php echo _x('Search for:', 'label') ?></span>
            <input type="search" class="search-field" autocomplete="off" placeholder="<?php echo esc_attr_x('Search Here', 'placeholder') ?>" value="" name="s" title="<?php echo esc_attr_x('Search:', 'label') ?>" required />
        </label>
        <input type="hidden" value="post" name="post_type" id="post_type" />
        <input type="submit" class="search-submit search-btn" value="<?php echo esc_attr_x('Search Blog', 'submit') ?>" />
    </form>
</div>
<div class="clearfix"></div>
<?php get_sidebar(); ?>

<div class="widget cat-widget fullwidth">
    <div class="widget-menu">
        <div class="widget-title h2">Categories</div>
        <div class="menu-cat-areas">
            <?php
            $curTerm = $wp_query->queried_object;
            $terms = get_terms('category');
            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<ul>';
                foreach ($terms as $term) {
                    $classes = array();
                    if ($term->name == $curTerm->name)
                        $classes[] = 'current-menu';
                    echo '<li class="' . implode(' ', $classes) . '"><a href="' . get_term_link($term) . '" title="' . sprintf(__('View all post filed under %s', 'my_localization_domain'), $term->name) . '">' . $term->name . '</a></li>';
                }
                echo '</ul>';
            }
            ?>
        </div>
    </div>
</div> 