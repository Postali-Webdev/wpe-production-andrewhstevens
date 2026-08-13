<?php
/* Template Name: Case Result Page */
get_header();
get_template_part('inc/inner', 'banner');
?>
<div class="case-result space-pd">
    <div class="container">
        <div class="main-heading text-center">
            <?php
            $title = get_field('title');
            $image = get_field('image');
            $content = get_field('content');
            ?>
            <div class="case-main-title mb-lg-5 mb-3">
                <h2><?php echo $title; ?></h2>
            </div>
            <?php echo wp_get_attachment_image($image['ID'], 'full', '', array('class' => 'mb-lg-5 mb-3')); ?>
            <?php echo $content; ?>
        </div>

        <div class="row gx-lg-4 gy-4 justify-content-center mt-lg-0 case-results-list">
            <?php
            $args = array(
                'post_type' => 'post_result',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    $logo_image = get_field('logo_image');
                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                    $ids = get_the_ID();
                    ?>
                    <div class="col-xl-4 case-item">
                        <div class="content-area-spacing">
                            <!-- <div class="case-client">
                                <div class="termname">
                                    <?php
                                    $terms = wp_get_post_terms($post->ID, 'result_category');
                                    foreach ($terms as $term) {
                                        ?>
                                        <div class="case-cat-text"><?php echo $term->name; ?></div>
                                        <?php
                                    }
                                    ?>
                                </div> 
                            </div>-->

                            <div class="case-client">
                                <div class="termname">
                                    <div class="case-cat-text"><?php the_title(); ?></div>
                                </div>
                            </div>
                            <!-- <div class="case-title text-white mb-3"><?php the_title(); ?></div> -->
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
        </div>

        <?php if ($query->found_posts > 6): ?>
            <div class="load-more text-center">
                <a id="more-case" class="btn white-btn mt-5" aria-label="Load More Button" href="javascript:void(0);">
                    LOAD MORE</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function ($) {
        // Initially show only the first 6 items
        $(".case-item").hide().slice(0, 6).show();

        // Handle Load More button click
        $("#more-case").on("click", function () {
            $(".case-item:hidden").slice(0, 6).slideDown();
            if ($(".case-item:hidden").length === 0) {
                $("#more-case").fadeOut(); // Hide the button if no more items are available
            }
        });

        // Hide Load More button if 6 or fewer items exist
        if ($(".case-item").length <= 6) {
            $("#more-case").hide();
        }
    });
</script>
<?php get_footer(); ?>