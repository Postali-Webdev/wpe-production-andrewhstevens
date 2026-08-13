<div class="clearfix"></div>
<?php if (get_field('schema_review_title', get_the_id())) { ?>
    <section class="schema-sec-1 common-padding fullwidth">
        <?php
        $desc = get_field('schema_review_content', get_the_id());
        $star = get_field('star_rating', get_the_id());
        $Reviewtitle = get_field('schema_review_title', get_the_id());
        $reviewerName = get_field('reviewed_by', get_the_id());
        if ($desc && $star && $reviewerName && $Reviewtitle) {
            ?>

            <div class="container review-schema-wrapper">
                <div class="schema-wrap">
                    <h3 class="mb-3">Client Review  <span class="rating">
                            <span class="star active"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                            <span class="star"></span>
                        </span>
                    </h3>
                    <div class="page_review text-left" itemprop="review" itemscope itemtype="http://schema.org/Review">
                        <div class="page_review_by" itemprop="author" itemscope itemtype="http://schema.org/Person">
                            <p><strong>By:</strong> <span itemprop="name"><?php echo $reviewerName; ?></span></p>
                        </div>                     


                        <div class="page_review_by">
                            <div class="testimonialTitle">
        <!--                                <strong>Title:</strong> -->
                                <span itemprop="itemReviewed" itemtype="http://schema.org/Thing">
                                    <?php echo $Reviewtitle; ?>
                                </span>
                            </div>

                            <?php /* ============== */ ?>

                            <?php
                            $header_logo = get_field('header_logo', 'option');

                            $args = array(
                                'post_type' => 'nap',
                                'posts_per_page' => 1,
                            );
                            $the_query = new WP_Query($args);
                            if ($the_query->have_posts()):
                                while ($the_query->have_posts()) : $the_query->the_post();

                                    $nap_attorney_business_name = get_field('nap_attorney_business_name');
                                    $nap_street_address = get_field('nap_street_address');
                                    $nap_suite_number = get_field('nap_suite_number');
                                    $nap_city_county = get_field('nap_city_county');
                                    $nap_state = get_field('nap_state');
                                    $nap_zip_code = get_field('nap_zip_code');
                                    $nap_phone_number = get_field('nap_phone_number');
                                    $phone_number_post = preg_replace("/[^0-9]/", "", $nap_phone_number);
                                    $nap_text_number = get_field('nap_text_number');
                                    $get_directions_link = get_field('get_directions_link');
                                    ?>
                                    <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/LocalBusiness">
                                        <span class="d-none">
                                            <span itemprop="priceRange">N/A</span>
                                            <span itemprop="name" ><?php bloginfo('name'); ?></span>
                                            <img class="main-logo" src="<?php echo $header_logo; ?>" itemprop="image" alt="logo" />                                        
                                            <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                                <span itemprop="streetAddress"><?php echo $nap_street_address; ?> </span> 
                                                <span itemprop="addressLocality"><?php echo $nap_suite_number ?></span> 
                                                <span itemprop="addressRegion"><?php echo $nap_city_county; ?> <?php echo $nap_state; ?></span> 
                                                <span itemprop="postalCode"><?php echo $nap_zip_code; ?></span> 
                                            </span>
                                            Phone: <span itemprop="telephone"><?php echo $nap_phone_number; ?></span>
                                        </span>
                                    </div>
                                <?php endwhile; ?>
                                <?php
                            endif;
                            wp_reset_query();
                            ?>
                            <?php /* ============== */ ?>

                        </div>
                        <div class="page_review_review">
                            <div>
                                <span itemprop="description">
                                    <?php echo $desc; ?>
                                </span>
                            </div>
                        </div>



                        <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                            <p><strong>Rating:</strong> 
                                <?php $star = get_field('star_rating', get_the_id()); ?>
                                <span style="color:#c18e59;font-size: 18px;">
                                    <?php
                                    if ($star == 1) {
                                        echo"★";
                                    } elseif ($star == 2) {
                                        echo"★★";
                                    } elseif ($star == 3) {
                                        echo"★★★";
                                    } elseif ($star == 4) {
                                        echo"★★★★";
                                    } elseif ($star == 5) {
                                        echo"★★★★★";
                                    } else {
                                        
                                    }
                                    ?>
                                </span></p>
                            <meta itemprop="worstRating" content="3">
                            <span itemprop="ratingValue"><?php echo $star; ?></span> / <span itemprop="bestRating">5</span> stars</div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <?php
}
$video_title = get_field('schema_video_title', get_the_id());
$video_thumbnail = get_field('page_video_thumbnail', get_the_id());
$video_desc = get_field('schema_video_description', get_the_id());
$video_uploaded = get_field('video_uploaded_date', get_the_id());
if ($video_title && $video_thumbnail && $video_desc && $video_uploaded) {
    ?>
    <?php if (get_field('schema_video_title', get_the_id())) { ?>

        <section class="schema-sec-2 common-padding sec-bg-2 ourteam-sec text-left fullwidth">
            <div class="container">
                <div class="schema-wrap">
                    <div itemscope itemtype="http://schema.org/VideoObject" class="fullwidth clientreviews middle-heading video-schema"><span itemprop="name" class="d-none"><?php echo $video_title; ?></span>
                        <h3 class="mb-4"><?php echo $video_title; ?></h3>

                        <div class="row flex"> 
                            <div class="col-sm-4 half"> <iframe width="400" height="220" src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id'); ?>" allowfullscreen></iframe>
                                <meta itemprop="thumbnailURL" content="<?php echo $video_thumbnail; ?>" />
                                <meta itemprop="embedURL" content="https://youtu.be/<?php echo get_field('youtube_video_id'); ?>" />
                            </div>
                            <div class="col-sm-8 half">
                                <p itemprop="uploadDate" content="<?php echo $video_uploaded; ?>"><strong>Uploaded Date:</strong> <?php echo $video_uploaded; ?></p>
                                <div><p><span itemprop="description"><?php echo $video_desc; ?></span></p></div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php }
            ?>
        </div>
    </section>
<?php } ?>