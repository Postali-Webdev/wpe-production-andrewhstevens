<?php
// Template Name:Forensic Knowledge
get_header();
get_template_part('inc/inner', 'banner');
?>


<?php
$forensic_knowledge = get_field('forensic_knowledge');
$title = $forensic_knowledge['title'];
$content = $forensic_knowledge['content'];
$image = $forensic_knowledge['image'];
if ($forensic_knowledge):
    ?>
    <div class="forensic-section space-pd">
        <div class="container">
            <div class="row justify-content-center align-items-center gy-lg-0 gy-5">

                <div class="col-lg-6">
                    <div class="forensic-image">
                        <?php echo wp_get_attachment_image($image['ID'], 'full', '', array('class' => ' w-100')); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2><?php echo $title; ?></h2>
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
$andrew_h_stevenson = get_field('andrew_h_stevenson');
$andrew_title = $andrew_h_stevenson['andrew_title'];
$andrew_content = $andrew_h_stevenson['andrew_content'];
$andrew_image = $andrew_h_stevenson['andrew_image'];
if ($andrew_h_stevenson):
    ?>
    <div class="andrew-section space-pd">
        <div class="container">
            <div class="row justify-content-center align-items-center gy-lg-0 gy-lg-5 gy-3">
                <div class="col-lg-6 order-lg-1 order-2">
                    <h2><?php echo $andrew_title; ?></h2>
                    <?php echo $andrew_content; ?>
                </div>
                <div class="col-lg-6 order-lg-2 order-1">
                    <div class="forensic-image">
                        <?php echo wp_get_attachment_image($andrew_image['ID'], 'full', '', array('class' => ' w-100')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
$using_forensic = get_field('using_forensic');
$title = $using_forensic['title'];
$content = $using_forensic['content'];
$discription = $using_forensic['discription'];
$bottom_content = $using_forensic['bottom_content'];
if ($using_forensic):
    ?>
    <div class="using-forensic-section space-pd">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="top-sc text-center mb-4">
                    <div class="text-white">
                        <h2><?php echo $title; ?></h2>
                    </div>
                    <?php echo $content; ?>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-12">
                    <?php echo $discription; ?>
                </div>
                <div class="col-lg-12 text-center btm-sc">
                    <?php echo $bottom_content; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php
$logo = get_field('logo');
$logo_image = $logo['logo_image'];
if ($logo_image):
    ?>
    <div class="contact-info space-pd">
        <div class="container">
            <div class="row">
                <?php
                foreach ($logo_image as $data) {
                    $image = $data['image'];
                    ?>
                    <div class="col-6 col-md-3 col-lg-2 col-wp position-relative text-center">
                        <div class="Custom-boxes">
                            <?php echo wp_get_attachment_image($image['ID'], 'full', '', array('class' => '')); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- <?php
$forensic_results_group = get_field('forensic_results');
$heading_title = $forensic_results_group['title'];
$image_forensic = $forensic_results_group['image'];
$forensic_repeator = $forensic_results_group['forensic_content_results'];
$link = $forensic_results_group['Link'];
?>
<?php if ($forensic_results_group): ?>
    <div class="results-section space-pd">
        <div class="container">
            <?php if ($heading_title || $image_forensic): ?>
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center mb-4">
                        <div class="main-heading">
                            <h2><?php echo $heading_title; ?></h2>
                        </div>
                        <div class="icon-sc">
                            <?php echo wp_get_attachment_image($image_forensic['ID'], 'full', '', array('class' => '')); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($forensic_repeator): ?>
                <div class="row justify-content-center row2 gy-4">
                    <?php foreach ($forensic_repeator as $forensic_content):
                        $title_content = $forensic_content['title'];
                        $images = $forensic_content['forensic_image_results'];
                        $results_link = $forensic_content['results_link_forensic'];
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="content-result-forensic">
                                
                                
                                    <div class="image-background h-100">
                                        <?php echo wp_get_attachment_image($images['ID'], 'full', '', array('class' => 'd-block')); ?>
                                    </div>
                                    <div class="title-results">
                                        <?php echo $title_content; ?>
                                    </div>

                                
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            <?php endif;
            if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div class="btn-sc text-center">
                    <a class="btn white-btn" href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
endif;
?> -->

<?php
$forensic_results_group = get_field('forensic_results');
$heading_title = $forensic_results_group['title'];
$image_forensic = $forensic_results_group['image'];
$forensic_repeator = $forensic_results_group['forensic_content_results'];
$link = $forensic_results_group['Link'];
?>
<div class="case-result results-section space-pd">
    <div class="container">
        <?php if ($heading_title || $image_forensic): ?>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center mb-4">
                    <div class="main-heading">
                        <h2><?php echo $heading_title; ?></h2>
                    </div>
                    <div class="icon-sc">
                        <?php echo wp_get_attachment_image($image_forensic['ID'], 'full', '', array('class' => '')); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row gx-lg-4 gy-4 justify-content-center mt-lg-0 case-results-list">
            <?php
            $args = array(
                'post_type' => 'post_result',
                'post_status' => 'publish',
                'posts_per_page' => 6,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    $logo_image = get_field('logo_image');
                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                    $ids = get_the_ID();
                    ?>
                    <div class="col-xl-4  case-item">
                        <a href="/case-results/">
                            <div class="content-area-spacing">
                                
                                <div class="case-client">
                                    <div class="termname">
                                        <div class="case-cat-text"><?php the_title(); ?></div>
                                    </div>
                                </div>
                                <div class="case-content text-white">
                                    <?php echo wp_trim_words(get_the_content(), 35, '...'); ?>
                                </div>
                                <div class="read-more">
                                    <a class="position-relative" href="javascript:void(0);" data-bs-toggle="modal"
                                        data-bs-target="#dataitem-<?php echo $ids; ?>">
                                        Read More
                                        <svg width="12" height="13" viewBox="0 0 12 13" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 5.5H7V0.5H5V5.5H0V7.5H5V12.5H7V7.5H12V5.5Z" fill="white" />
                                        </svg>
                                    </a>
                                </div>
                            
                            </div>
                        </a>
                    </div>
                    <!-- Modal for full post content -->
                    <div class="modal fade centered-modal" id="dataitem-<?php echo $ids; ?>">
                        <div class="modal-dialog modal-xl modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body case-popup-info">
                                    <div class="row">
                                        <div class="<?php echo $thumb ? 'col-md-7' : 'col-md-12'; ?>">
                                            <div class="case-data-wrap">
                                                <div class="pop-case-termname">
                                                    <?php
                                                    $terms = wp_get_post_terms($post->ID, 'result_category');
                                                    foreach ($terms as $term) {
                                                        ?>
                                                        <div class="case-cat-text-popup"><?php echo $term->name; ?></div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                <div class="h3"><?php the_title(); ?></div>
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                        <?php if ($thumb) { ?>
                                            <div class="col-md-5">
                                                <div class="case-right-image">
                                                    <img src="<?php echo $thumb[0]; ?>" class="case-featured-img"
                                                        alt="<?php the_title(); ?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            wp_reset_postdata();
            ?>

            <?php if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div class="btn-sc text-center">
                    <a class="btn white-btn" href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                </div>
            <?php endif; ?>
        </div>

        
    </div>
</div>

<?php

?>





<?php get_template_part('inc/home/testimonial'); ?>



<section class="team-list space-mr">
    <div class="container">

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
                    $content = get_field('content'); ?>
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
                                    <div class="mt-3">
                                        <a class="link " href="<?php echo get_the_permalink() ?>">READ MORE</a>
                                    </div>
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



<?php
$strength = get_field('strength');
$title = $strength['title'];
$icon_content_box = $strength['icon_content_box'];
if ($icon_content_box):
    ?>
    <div class="forensic-strength-section space-pd">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-6 text-center">
                    <?php if ($title): ?>
                        <div class="heading-sc">
                            <h2><?php echo $title; ?></h2>
                        </div><?php endif; ?>
                </div>
            </div>

            <div class="row gy-4">
                <?php
                foreach ($icon_content_box as $data):
                    $icon = $data['icon'];
                    $heading = $data['heading'];
                    $content = $data['content'];
                    ?>
                    <div class="col-lg-4">
                        <div class="strength-custom-boxes">
                            <?php echo wp_get_attachment_image($icon['ID'], 'full', '', array('class' => 'img-fluid')); ?>
                            <?php if ($heading): ?>
                                <div class="strength-title"><?php echo $heading; ?></div><?php endif; ?>
                            <div class="strength-content text-white"><?php echo $content; ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
<?php endif; ?>










<?php get_footer(); ?>