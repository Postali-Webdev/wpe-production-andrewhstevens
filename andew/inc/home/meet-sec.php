<?php $meet_sec = get_field('meet_sec', 2);
$heading = $meet_sec['heading'];
$content = $meet_sec['content'];
$image = $meet_sec['image'];
$icon = $meet_sec['icon'];
$button = $meet_sec['link'];
$bg_image = $meet_sec['bg_image'];
if ($heading || $content || $image || $button || $bg_image) {
    ?>
    <section class="meet-sec space-pd ">
        <div class="container">
            <div class="outer-wp position-relative">
                <?php if ($bg_image) { ?>
                    <div class="bg-image">
                        <?php echo wp_get_attachment_image($bg_image, 'full') ?>
                    </div>
                <?php } ?>
                <div class="row align-items-center position-relative">

                    <div class="col-md-6 wow fadeInLeft">
                        <div class="lft-wp">
                            <?php if ($heading) { ?>
                                <div class="heading-sc">
                                    <h2><?php echo $heading ?></h2>
                                </div>
                            <?php } ?>
                            <?php if ($icon) { ?>
                                <div class="icon-bottom mb-3">
                                    <?php echo wp_get_attachment_image($icon['ID'], 'full', '', array('class' => '')); ?>
                                </div>
                            <?php } ?>
                            <?php if ($content) { ?>
                                <div class="content">
                                    <?php echo $content ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6 wow ">
                        <?php if ($image) { ?>
                            <div class="img-sc">
                                <?php echo wp_get_attachment_image($image, 'full') ?>
                            </div>
                        <?php }
                        if ($button):
                            $link_url = $button['url'];
                            $link_title = $button['title'];
                            $link_target = $button['target'] ? $link['target'] : '_self';
                            ?>
                            <div class="btn-wrap">
                                <a class="btn white-btn" href="<?php echo esc_url($link_url); ?>"
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
<?php } ?>