<?php $why_hire_me = get_field('why_hire_me');
$heading = $why_hire_me['heading'];
$full_paragraph = $why_hire_me['full_paragraph'];

$left_content = $why_hire_me['left_content'];
$right_content = $why_hire_me['right_content'];
$full_content = $why_hire_me['full_content'];

$button = $why_hire_me['button'];
if ($left_content || $right_content) {
    ?>
    <section class="why-hire-me space-pd">
        <div class="container wow fadeInUp">
            <?php if ($heading) { ?>
                <div class="heading-sc text-center wt-blk">
                    <h2><?php echo $heading ?></h2>
                </div>
            <?php } ?>
            <div class="icon-sec text-center">
                <img src="<?php bloginfo('template_url'); ?>/img/white-icon.svg" alt="" width="419" height="26">
            </div>

            <div class="col-md-12 full_paragraph mb-xl-4 mb-lg-4 mb-md-3 mb-3 text-center">
                <?php echo $full_paragraph ?>
            </div>   

            <?php
            if ($left_content || $right_content) { ?>
                <div class="row  fw-300">
                    <?php if ($left_content) { ?>
                        <div class="col-md-6">
                            <?php echo $left_content ?>
                        </div>
                    <?php }
                    if ($right_content) { ?>
                        <div class="col-md-6">
                            <?php echo $right_content ?>
                        </div>
                    <?php } ?>
                </div>
                <?php } ?>
            
                <div class="col-md-12 full_content text-center">
                    <?php echo $full_content ?>
                </div> 
            

            <?php if ($button):
                $link_url = $button['url'];
                $link_title = $button['title'];
                $link_target = $button['target'] ? $link['target'] : '_self';
                ?>
                <div class="btn-wrap text-center">
                    <a class="btn white-btn" href="<?php echo esc_url($link_url); ?>"
                        target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                    </a>
                </div>
            <?php endif; ?>

           
        </div>
    </section>
<?php } ?>