<?php
/* Template Name: Full Width */
get_header();
get_template_part('inc/inner', 'banner');
?>
<div class="fullwidth-page space-mr">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 content-area list-content list-style">
                <?php while (have_posts()): the_post(); ?> 
                    <div class="default-content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php get_template_part('inc/home/home', 'contact'); ?>
<?php get_footer(); ?>