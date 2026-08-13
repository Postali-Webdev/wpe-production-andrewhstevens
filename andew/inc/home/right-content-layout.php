<?php 
$right_content_layout = get_field('right_content_layout');
$heading = $right_content_layout['heading'];
$sub_heading = $right_content_layout['sub_heading'];
$icon = $right_content_layout['icon'];
$title = $right_content_layout['title'];
$content = $right_content_layout['content'];
$bg_image = $right_content_layout['bg_image'];
$button = $right_content_layout['button'];
if($heading || $sub_heading || $content || $title){
?>
<section class="right-content-layout pd-lg position-relative" style="background-image:url('<?php echo $bg_image ?>'); background-repeat: no-repeat;background-size: cover;background-position:left center;">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-6 wow fadeInRight">
			<div class="inner-right-content">
                <?php if ($heading) { ?>
                    <div class="heading-sc">
                        <h2><?php echo $heading ?></h2>
                    </div>
                <?php } ?>
                <?php if ($sub_heading) { ?>
                    <div class="sub-heading">
                        <?php echo $sub_heading ?>
                    </div>
                <?php } ?>
                <?php if ($icon || $title) { ?>
                <div class="icon-wrap d-flex align-items-center">
                    <?php if ($icon) { ?>
                        <div class="lft">
                            <?php echo wp_get_attachment_image($icon, 'meduim'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($title) { ?>
                        <div class="rgt">
                            <div class="title"><?php echo $title ?></div>
                        </div>
                    <?php } ?>
                </div>
                <?php }?>
                <?php if ($content): ?>
                    <div class="content">
                        <?php echo $content; ?>
                    </div>
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
    </div>
</section>
<?php }?>