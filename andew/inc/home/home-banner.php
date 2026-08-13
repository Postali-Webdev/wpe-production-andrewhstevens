<?php
$home_banner = get_field('banner');
$bg_image1 = $home_banner['bg_image'];
$heading = $home_banner['heading'];
$content = $home_banner['top_content'];
$button = $home_banner['button'];
$image = $home_banner['image'];
$icon = $home_banner['icon'];
$mobile_bg_image = $home_banner['mobile_bg_image'];
$mobile_image = $home_banner['mobile_image'];

$bg_image = !wp_is_mobile() ? $bg_image1 : $mobile_bg_image;
if ($home_banner):
    ?>
<link rel="preload" fetchpriority="high" as="image" href="https://www.stevensoncriminaldefense.com/wp-content/uploads/2025/03/banner-1-1.webp" type="image/webp">
    <div class="home-page-banner text-center position-relative"
        style="background-image: url(<?php echo $bg_image; ?>); background-repeat: no-repeat;background-size: cover;background-position: center;">
        
        <div class="container-fluid p-0">
            <div class="row p-0">
                <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6 content_sec">
                    <div class="banner-content-wrap ">
                        <div class="top-content">
                            <?php if (wp_is_mobile()) { ?>
                                <?php if ($mobile_image): ?>

                                    <div class="image">
                                        <?php echo wp_get_attachment_image($mobile_image, 'full'); ?>
                                    </div>

                                <?php endif; ?>
                            <?php } ?>
                        </div>
                        <div class="mobile_content">
                            <?php if ($content): ?>
                                <div class="banner_content text-uppercase">
                                    <?php echo $content; ?>
                                </div>
                                <?php
                            endif;
                            ?>
                            <?php if ($icon): ?>
                                <div class="icon-image">
                                    <?php echo wp_get_attachment_image($icon['ID'], 'full', '', array('class' => '')); ?>
                                </div>
                                <?php
                            endif;
                            ?>
                            <?php if ($heading): ?>
                                <h1 class="banner_heading ">
                                    <?php echo $heading; ?>
                                </h1>
                                <?php
                            endif;
                            ?>
                            
                            
                            <?php
                            if ($button):
                                $link_url = $button['url'];
                                $link_title = $button['title'];
                                $link_target = $button['target'] ? $link['target'] : '_self';
                                ?>
                                <div class="btn-wrap">
                                    <a class="btn" href="<?php echo esc_url($link_url); ?>"
                                        target="<?php echo esc_attr($link_target); ?>">
                                        <?php echo esc_html($link_title); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-6 col-lg-6 image_wrap p-0">
                    <?php if (!wp_is_mobile()) { ?>
                        <?php if ($image): ?>

                            <div class="image">
                                <?php echo wp_get_attachment_image($image, 'full'); ?>
                            </div>

                        <?php endif; ?>
                    <?php } ?>  
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>