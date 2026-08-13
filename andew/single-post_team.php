<?php
get_header();
get_template_part('inc/inner', 'banner');
$designation = get_field('designation');
$content = get_field('content');
$detail_page_content = get_field('detail_page_content');
?>
<section class="team-list space-mr">
    <div class="container">

        <div class="btm-sc">


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
                        <div class="rgt">

                            <h1 class="team-title mb-3"> <?php echo (get_the_title()); ?> </h1>

                            <?php if ($designation) { ?>
                                <div class="designation">
                                    <?php echo $designation ?>
                                </div>
                            <?php } ?>
                           
                                <div class="team-content f-20 mb-3">
                                    <?php echo get_the_content(); ?>
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
<?php $add_tabs = get_field('add_tabs');
if ($add_tabs) {
    ?>
    <div class="tabs-sec">
        <div class="container">
            <div class="tabs-title no-list-ul">

                <ul class="d-flex text-center">
                    <?php $i = 0;
                    foreach ($add_tabs as $row) {
                        $i++;
                        $title = $row['title'];
                        $content = $row['content'];
                        if ($title && ($content || $right_content)) {
                            ?>
                            <li id="tab-<?php echo $i ?>" class="text-uppercase h-100"><?php echo $title ?></li>
                        <?php }
                        ;
                    } ?>
                </ul>

            </div>
            <div class="tab-content-area">
                <?php $j = 0;
                foreach ($add_tabs as $row) {
                    $title = $row['title'];
                    $content = $row['content'];
                    $right_content = $row['right_content'];
                    $j++;
                    if ($title && ($content || $right_content)) {
                        ?>
                        <div class="tabs-content for-tab-<?php echo $j ?>">
                            <h3 class="title w-100 text-center"><?php echo $title ?></h3>
                          
                            <div class="row mt-4">
                                <?php if ($content) { ?>
                                    <div class=" <?php if ($right_content) { ?>col-md-6<?php }?>">
                                        <?php echo $content ?>
                                    </div>
                                <?php } ?>
                                <?php if ($right_content) { ?>
                                    <div class="col-md-6">
                                        <?php echo $right_content ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php }
                    ;
                } ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php get_template_part('inc/home/nationally-recognized'); ?>
<?php get_template_part('inc/home/testimonial'); ?>
<?php get_template_part('inc/schema/attorney-schema'); ?>
<script>
    jQuery(document).ready(function ($) {
        $('.tabs-title ul li:first-child').addClass('active');
        $('.tabs-content:first-child').addClass('active');
        $('.tabs-title ul li').click(function () {
            let id = $(this).attr('id');
            $('.tabs-title ul li').removeClass('active');
            $(this).addClass('active');
            
            $('.tabs-content').removeClass('active');
            $(`.tabs-content.for-${id}`).addClass('active');
        })
    })
</script>
<?php get_footer(); ?>