<?php
    if( get_field('banner_bg_gradient') ) {
        $banner_class = "gradient";
    } else {
        $banner_class = "image";
} ?>

<?php
if (!get_field('hide_banner')):
    if (!is_front_page() && is_home()) {
        $pageID = get_option('page_for_posts');
    } else {
        $pageID = get_the_ID();
    }
    $attachment_image = get_field('banner_image');
    if ($attachment_image) {
        $bg_image = $attachment_image;
    } else {
        $bg_image = get_field('global_banner', 'options');
    }
    if ($bg_image):
        ?>

        <div class="inner-page-banner <?php echo $banner_class; ?>" style="background-image: url(<?php echo esc_url($bg_image); ?>)" data-page-id="<?php echo esc_attr($pageID); ?>">

            <div class="container">
                <div class="row align-items-center">

                    <!-- Breadcrumb logic is commented out in your original code -->

                    <div class="col-md-6">
                        <?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?> 
                        <p>&nbsp;</p>
                        <?php if (get_field('banner_title', $pageID)): ?>
                            <h1 class="inner-banner-heading"><?php the_field('banner_title', $pageID); ?></h1>
                        <?php elseif (!is_front_page() && is_home()): ?>
                            <h1 class="inner-banner-heading">Our Blog</h1>
                        <?php elseif (is_single() && 'post' == get_post_type()): ?>
                            <h2 class="inner-banner-heading">Our Blog</h2>
                        <?php elseif (is_single() && 'post_team' == get_post_type()): ?>
                            <h2 class="inner-banner-heading">Our Team</h2>
                        <?php elseif (is_single() && 'post_news' == get_post_type()): ?>
                            <h1 class="inner-banner-heading">News</h1>
                        <?php elseif (is_single() && 'photo_gallery' == get_post_type()): ?>
                            <h1 class="inner-banner-heading">Gallery</h1>
                        <?php elseif (is_tax('photo_gallery_category')): ?>
                            <h1 class="inner-banner-heading">Gallery</h1>
                        <?php elseif (is_category()): ?>
                            <h1 class="inner-banner-heading">Categories</h1>
                        <?php elseif (is_search()): ?>
                            <h1 class="inner-banner-heading">Search Results</h1>
                        <?php elseif (is_404()): ?>
                            <h1 class="inner-banner-heading">404 Error</h1>
                        <?php elseif (is_page_template('templates/template-thankyou.php')): ?>
                            <h1 class="inner-banner-heading">Thank You</h1>
                        <?php else: ?>
                            <h1 class="inner-banner-heading"><?php the_title(); ?></h1>
                        <?php endif; ?>

                        <div class="btn-wrap">
                            <a class="btn" href="/contact/" target="_self">Schedule a free case evaluation</a>
                        </div>

                    </div>

                    <?php if(is_page(array('178','422'))) { ?>
                
                    <div class="col-md-6">
                        <div class="testimonial-block">
                            <div class="quote">"</div>
                            <div class="copy">
                                <p>His dedication, his relentless attitude, and his vast knowledge of the law is unsurpassed as he works diligently.</p>
                                <p class="author">Angie</p>
                            </div>
                            <div class="review-block">
                                <div class="review-left">
                                    <div class="stars">★★★★★</div>
                                    <p class="rating">5.0 Rating  |  93 Reviews</p>
                                </div>
                                <div class="review-right">
                                    <img src="/wp-content/uploads/2026/07/google-logo-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <?php } ?>

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>