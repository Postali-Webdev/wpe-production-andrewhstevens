<?php
/* Template Name: Thank You */
get_header();
get_template_part('inc/inner', 'banner');
?>
<div class="thank-you-page text-center space-pd">
    <div class="container">
        <div class="text">
            <?php
            while (have_posts()):the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>