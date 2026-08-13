<?php
get_header();
get_template_part('inc/inner', 'banner');
$designation = get_field('designation');
$content = get_field('content');
?>
<section class="team-list space-mr">
    <div class="container">
      
        <div class="btm-sc">

          
                    <div class="team-outer-wp">
                        <div class="row team-member ">


                            <!-- Image Column -->
                            <div class="col-md-6">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="team-image h-100">
                                        <a href="<?php echo get_the_permalink() ?>" class="d-block h-100">
                                            <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => esc_attr(get_the_title())]); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- Text Column -->
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="py-3 rgt">
                                 
                                        <h3 class="team-title"> <?php echo (get_the_title()); ?> </h3>
                                    
                                    <?php if ($designation) { ?>
                                        <div class="designation">
                                            <?php echo $designation ?>
                                        </div>
                                    <?php } ?>
                                    <?php if ($content) { ?>
                                        <div class="team-content f-20">
                                            <?php echo $content; ?>
                                        </div>
                                    <?php } else { ?>
                                        <div class="team-content f-20 mb-3">
                                            <?php echo get_the_content(); ?>
                                        </div>
                                    <?php } ?>
                                    <div class="mt-3">
                                        <a class="link " href="<?php echo get_the_permalink() ?>">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               

       
            <?php
            // Reset post data
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>
<div class="static-page section-pd">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 content-area pr-lg-5 list-style">
                <h2 class="heading"> <?php the_title(); ?> </h2>
                <?php
                while (have_posts()): the_post();
                    if (has_post_thumbnail()){
                        ?>
                         <img src="<?php the_post_thumbnail_url('full'); ?>" class="mb-3" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                        <?php
                    }
                    ?>
                    <div class="the_content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="col-lg-4 sidebar">
                <?php get_sidebar('blog'); ?>
            </div>
        </div>
    </div>
</div> 

<?php get_template_part('inc/home/nationally-recognized'); ?>
<?php get_template_part('inc/home/testimonial'); ?>
<?php get_footer(); ?>