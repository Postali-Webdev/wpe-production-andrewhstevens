<?php
get_header();
get_template_part('inc/inner', 'banner');
?>
<div class="clearfix"></div>
<?php
$post_type = "";
if (isset($_GET['s'])) {
    $keyword = $_GET['s'];
}
if (isset($_GET['post_type'])) {
    $post_type = $_GET['post_type'];
}
?>
<?php if ($keyword && $post_type == "post") { ?>
    <div class="blog-search-page fullwidth space-mr no-list-ul common-top-padding" id="searchPage">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7 content-area search-left-side">
                     <div class="h3 mb-3">Search Results for "<em><?php echo $_GET['s'] ?></em>"</div>
                    <div class="page-header fullwidth">
                        <?php if (have_posts()) : ?>
                            <h2 class="page-title h3 mb-0"><?php printf(__('Search Results for: %s', 'twentyseventeen'), '<span>' . get_search_query() . '</span>'); ?></h2>
                        <?php else : ?>
                            <h2 class="page-title h3 mb-0"><?php _e('Nothing Found', 'twentyseventeen'); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="search_result blog-full-post fullwidth">
                        <?php if (have_posts()) : ?>
                            <ul class="post-list fullwidth">
                                <?php
                                /* Start the Loop */
                                while (have_posts()) : the_post();
                                ?>
                                    <li>
                                        <div class="info-box fullwidth">
                                            <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                            <div class="blog_desc">
                                                <?php
                                                echo wp_trim_words(get_the_content(), 60, '...');
                                                ?>
                                            </div>
                                            <div class="blog-btn mt-3">
                                                <a class="btn" href="<?php the_permalink(); ?>">Read More</a>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                endwhile;
                                ?>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="col-lg-12">
                                <div class="paging-new fullwidth"><?php the_posts_pagination(); ?></div>
                            </div>
                        <?php
                        else :
                        ?>
                            <p>Sorry no result found. Please try a different search term or <a href="<?php echo esc_url(home_url('/')); ?>" class="click-here">click here</a> for back to home.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if ($keyword && empty($post_type) || $keyword && $post_type == "undefined" || $keyword && $post_type == "") { ?>
    <div class="common-search-page fullwidth space-mr no-list-ul " id="searchPage">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7  content-area search-left-side">
                     <div class="h3 mb-3">Search Results for "<em><?php echo $_GET['s'] ?></em>"</div>
                    <div class="page-header fullwidth">
                        <?php if (have_posts()) : ?>
                            <h2 class="page-title"><?php printf(__('Search Results for: %s', 'twentyseventeen'), '<span>' . get_search_query() . '</span>'); ?></h2>
                        <?php else : ?>
                            <h2 class="page-title"><?php _e('Nothing Found', 'twentyseventeen'); ?></h2>
                        <?php endif; ?>
                    </div><!-- .page-header -->

                    <div class="search_result blog-full-post fullwidth">
                        <?php if (have_posts()) : ?>
                            <ul class="post-list fullwidth">
                                <?php
                                /* Start the Loop */
                                while (have_posts()) : the_post();
                                ?>
                                    <li>
                                        <div class="info-box fullwidth">
                                            <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                            <div class="blog_desc">
                                                <?php
                                                echo wp_trim_words(get_the_content(), 60, '...');
                                                ?>
                                            </div>
                                            <div class="blog-btn mt-3">
                                                <a class="btn" href="<?php the_permalink(); ?>">Read More</a>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                endwhile;
                                ?>
                            </ul>
                            <div class="clearfix"></div>
                            <div class="col-lg-12">
                                <div class="paging-new fullwidth"><?php the_posts_pagination(); ?></div>
                            </div>
                        <?php
                        else :
                        ?>
                            <p>Sorry no result found. Please try a different search term or <a href="<?php echo esc_url(home_url('/')); ?>" class="click-here">click here</a> for back to home.</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 sidebar">
                    <?php get_sidebar(); ?>
                  
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
get_footer();
