<?php
get_header();
get_template_part('inc/inner', 'banner');
$form404 = get_field('404_page_form', 'options');
if ($form404) {
    ?>

    <div class="page-not-found space-mr <?php echo strtolower(get_the_title()); ?>-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto js-error">
                    <div class="text-center mb-4">
                        <h2 class="title">Sorry! Page Not Found</h2>
                        <p>The page you are looking for can’t be found.<br>
                            Contact us by filling the form below. We will get in touch with you shortly.</p>
                    </div>
                    <?php echo do_Shortcode($form404); ?>   
                </div>
            </div>
        </div>
    </div>
    <?php
}
get_footer();
?>