<?php
/* Template Name: Team */
get_header();
get_template_part('inc/inner', 'banner');
?>
<?php
/* Template Name: Team Page */
get_header();
?>
<section class="team-list space-mr">
    <div class="container">
        <?php if (!empty(get_the_content())): ?>

            <div class="top-sec text-center">
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>

        <?php endif; ?>
        <div class="btm-sc">

            <?php
            // Define the WP_Query arguments
            $args = array(
                'post_type' => 'post_team', // Replace 'post_team' with your custom post type slug
                'posts_per_page' => -1, // Adjust the number of posts per page if needed
            );

            // Custom query
            $team_query = new WP_Query($args);

            // The Loop
            if ($team_query->have_posts()):
                while ($team_query->have_posts()):
                    $team_query->the_post();
                    $designation = get_field('designation');
                    $content = get_field('content'); 
                    $button = get_field('button');
                    ?>
                    <div class="team-outer-wp">
                        <div class="row team-member ">


                            <!-- Image Column -->
                            <div class="col-lg-6">
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="team-image h-100">
                                        <a href="<?php echo get_the_permalink() ?>" class="d-block h-100">
                                            <?php the_post_thumbnail('full', ['class' => 'img-fluid', 'alt' => esc_attr(get_the_title())]); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- Text Column -->
                            <div class="col-lg-6 d-flex align-items-center">
                                <div class=" rgt">
                                    <?php if (get_the_title()): ?>
                                        <h3 class="team-title"> <?php echo esc_html(get_the_title()); ?> </h3>
                                    <?php endif; ?>
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

                                    <?php
                                    if ($button):
                                        $link_url = $button['url'];
                                        $link_title = $button['title'];
                                        $link_target = $button['target'] ? $link['target'] : '_self';
                                        ?>
                                        <div class="mt-3">
                                            <a class="link" href="<?php echo esc_url($link_url); ?>"
                                                target="<?php echo esc_attr($link_target); ?>">
                                                <?php echo esc_html($link_title); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>    

                                    <!-- <div class="mt-3">
                                       <a class="link " href="<?php echo get_the_permalink() ?>">View Education, Honors Awards, Memberships, and Community Involvement</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            <?php else: ?>
                <p class="no-team-members">No team members found.</p>
            <?php endif; ?>

            <?php
            // Reset post data
            wp_reset_postdata();
            ?>

        </div>
    </div>
</section>


<section class="team_content space-pd text-white">
    <?php $team_content = get_field('team_content');
        $heading = $team_content['heading'];
        $content = $team_content['content'];
        $paragraph = $team_content['paragraph'];
    ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <?php if ($heading) { ?>
                    <div class="heading-sc">
                        <h2 class="text-white mb-xl-4 mb-lg-4 mb-md-3 mb-3 text-center"><?php echo $heading ?></h2>
                    </div>
                <?php } ?>
                <?php if ($content): ?>
                    <div class="content text-center">
                        <?php echo $content; ?>
                    </div>
                    <?php
                endif;
                ?>
            </div> 
        </div>   

        <div class="row mt-5 justify-content-center">	
            <?php
                if (have_rows('team_repeater')):
                while (have_rows('team_repeater')): the_row();
                $heading = get_sub_field('heading');
                $content = get_sub_field('content');
            ?>	
            <?php if ($heading || $content) { ?>	
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 content_list">
                <div class="inner_content text-center">
                <?php if ($heading) { ?>
                    <div class="heading-sc">
                        <h4 class=""><?php echo $heading ?></h4>
                    </div>
                <?php } ?>  
                <?php if ($content): ?>
                    <div class="content  ">
                        <?php echo $content; ?>
                    </div>
                    <?php
                endif;
                ?>
                </div>		
            </div>
            <?php } ?>
            <?php
                endwhile;
                endif;
            ?>
        </div>

        <!-- <?php if ($paragraph): ?>
            <div class="content  ">
                <?php echo $paragraph; ?>
            </div>
            <?php
        endif;
        ?> -->

    </div>
</section>


<?php get_template_part('inc/home/nationally-recognized'); ?>
<?php get_template_part('inc/home/testimonial'); ?>

<?php get_footer(); ?>