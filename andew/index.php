<?php
get_header();
get_template_part('inc/inner', 'banner');
?>

<div class="static-page blog-listing space-mr no-list-ul">
    <div class="container">
        <div class="row">
        <div class="blog-search sidebar d-lg-none d-block mb-md-4 mb-2"> <?php get_template_part('searchform2'); ?></div>
            <div class="col-xl-8 col-lg-7 content-area list-content lft-sc-ly ">
         
                    <?php get_template_part('inc/blog/blog', 'content'); ?>
                
            </div>

            <div class="col-xl-4 col-lg-5 sidebar right-sc-ly">
                <?php get_sidebar('blog'); ?>
                <?php //echo do_shortcode('[child-pages]'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
