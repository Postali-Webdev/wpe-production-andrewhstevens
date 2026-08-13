<?php
$sidebarform = get_field('sidebar_form', 'options');
$sidebarheading = get_field('sidebar_title', 'options');
$hide_sidebar_form = get_field('hide_sidebar_form', 'options');
if ($hide_sidebar_form == 'show') {
    ?>

    <?php
    if ($sidebarform):
        ?>
        <div class="widget contat-wrap contact-form-sidebar">
            <?php if ($sidebarheading) { ?>
                <div class="widget-title w-100 text-center mb-4">
                    <?php echo $sidebarheading ?>
                </div>
            <?php } ?>
            <?php echo do_shortcode($sidebarform); ?>
            




        </div>
        <?php
    endif;
}
?>

