<?php
/* Template Name: Payment Fees */
get_header();
get_template_part('inc/inner', 'banner');
?>

<?php
$fees_payment = get_field('fees_payment');
$image = $fees_payment['image'];
$title = $fees_payment['title'];
$sub_title = $fees_payment['sub_title'];
$content = $fees_payment['content'];
$button = $fees_payment['button'];
if ($fees_payment):
    ?>
    <div class="payment-section space-pd">
        <div class="container">
            <div class="payment-inner">
                <div class="row  g-0">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="inner-content">
                            <?php if ($title): ?>
                                <h2><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php if ($sub_title): ?>
                                <div class="sub-title"><?php echo $sub_title; ?></div><?php endif; ?>
                            <?php echo $content; ?>
                            <?php
                            if ($button):
                                $link_url = $button['url'];
                                $link_title = $button['title'];
                                $link_target = $button['target'] ? $button['target'] : '_self';
                                ?>
                                <a class="btn mr-20" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>">
                                    <?php echo $link_title; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <?php if ($image): ?>
                            <div class="payment-img h-100">
                                <?php echo wp_get_attachment_image($image['ID'], 'full', '', array('class' => 'w-100')); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>





<?php
$strength = get_field('strength');
$title = $strength['title'];
$icon_content_box = $strength['icon_content_box'];
if ($icon_content_box):
    ?>
    <div class="strength-section space-pd">
        <div class="container">
            <div class=" top-sc">

                <?php if ($title): ?>
                    <div class="heading-sc">
                        <h2><?php echo $title; ?></h2>
                    </div><?php endif; ?>

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





<?php
$about_section = get_field('about_section');
$about_image = $about_section['about_image'];
$about_title = $about_section['about_title'];
$about_subtitle = $about_section['about_subtitle'];
$about_content = $about_section['about_content'];
$about_btn = $about_section['about_btn'];
if ($about_section):
    ?>
    <div class="team-list space-pd">
        <div class="container">
            <div class="team-outer-wp">
                <div class="row team-member ">


                    <!-- Image Column -->
                    <div class="col-lg-6">
                        <?php if ($image): ?>
                            <div class="team-image h-100">
                                <?php echo wp_get_attachment_image($about_image['ID'], 'full', '', array('class' => 'w-100')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- Text Column -->
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class=" rgt">
                            <?php if ($about_title): ?>
                                <h3 class="team-title"> <?php echo $about_title; ?> </h3>
                            <?php endif; ?>
                            <?php if ($about_subtitle) { ?>
                                <div class="designation">
                                    <?php echo $about_subtitle ?>
                                </div>
                            <?php } ?>
                            <?php if ($about_content) { ?>
                                <div class="team-content f-20">
                                    <?php echo $about_content; ?>
                                </div>
                            <?php } ?>


                            <?php
                            if ($about_btn):
                                $link_url = $about_btn['url'];
                                $link_title = $about_btn['title'];
                                $link_target = $about_btn['target'] ? $about_btn['target'] : '_self';
                                ?>
                                <div class="mt-3">
                                    <a class="link" href="<?php echo esc_url($link_url); ?>"
                                        target="<?php echo esc_attr($link_target); ?>">
                                        <?php echo $link_title; ?>
                                    </a>
                                </div>
                            <?php endif; ?>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>



<?php get_footer(); ?>