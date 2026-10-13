<?php
if (!is_front_page()):
    get_template_part('inc/schema/site', 'schema');
endif;
?>
<footer class="footer no-list-ul">
    <div class="footer-top">
        <div class="container">
            <div class="footer-row">
                <div class="footer-column">
                    <?php
                    $footer_logo = get_field('footer_logo', 'option');
                    $footer_phone_no = get_field('footer_phone_no', 'option');
                    if ($footer_logo):
                        ?>
                        <div class="footer-logo">
                            <?php
                            $image_html = wp_get_attachment_image($footer_logo, 'full', "", array("class" => "footer-logo"));

                            // Remove 'sizes' and 'srcset' attributes
                            $image_html = preg_replace('/\s*(sizes|srcset)="[^"]+"/', '', $image_html);

                            echo '<a href="' . esc_url(site_url()) . '">' . $image_html . '</a>';
                            ?>


                        </div>
                    <?php endif;
                    if ($footer_phone_no) { ?>
                        <div class="footer-phn-no">
                            <a href="tel:<?php echo preg_replace('/\D+/', '', $footer_phone_no); ?>">

                               <svg width="37" height="40" viewBox="0 0 37 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                                class=" d-block replaced-svg">
                                <path
                                    d="M32.1962 27.8835C29.9121 25.8807 27.5941 24.6676 25.3381 26.6673L23.9909 27.876C23.0053 28.7533 21.1727 32.8527 14.0874 24.4966C7.00355 16.1512 11.219 14.8518 12.2061 13.982L13.5607 12.7719C15.8049 10.7676 14.9579 8.24441 13.3393 5.64713L12.3626 4.07395C10.7366 1.48273 8.96596 -0.219038 6.71583 1.78224L5.50002 2.87137C4.50554 3.61409 1.7257 6.02833 1.0514 10.6148C0.239879 16.1179 2.79986 22.4197 8.66496 29.3342C14.5227 36.2517 20.2579 39.7263 25.6907 39.6658C30.2057 39.6159 32.9324 37.1321 33.7853 36.229L35.0055 35.1383C37.2497 33.1386 35.8554 31.1025 33.5698 29.0952L32.1962 27.8835Z"
                                    fill="#C9A95F"></path>
                            </svg> <?php echo $footer_phone_no; ?>

                            </a>
                        </div>
                    <?php } ?>
                    <?php if (!wp_is_mobile()) { ?>
                        <div class="social-media">
                            <?php get_template_part('inc/social-media'); ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="footer-column">
                    <div class="footer-address text-start">
                        <?php get_template_part('inc/schema/footer-address'); ?>
                    </div>
                </div>
                <?php if (wp_is_mobile()) { ?>
                    <div class="social-media">
                        <?php get_template_part('inc/social-media'); ?>
                    </div>
                <?php } ?>
                <?php if (!wp_is_mobile()) { ?>

                    <div class="footer-column footer-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class' => 'footer-menu',
                        ));
                        ?>
                    </div>

                    <div class="footer-column footer-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'secondary',
                            'menu_class' => 'secondary-menu',
                        ));
                        ?>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

    <div class="footer-copyright mt-md-5 mt-3 pt-md-0 pt-2 pt-xl-3">
        <div class="container">

            <?php if (get_field('footer_description', 'options')) { ?>
                <div class="footer-desc text-white">
                    <?php echo (get_field('footer_description', 'options')) ?>
                </div>
            <?php } ?>
            <div class="copyright-privacy mt-3 f-flex flex-wrap align-items-center justify-content-md-center">
                        <?php if (get_field('copyright', 'option')) { ?>
                            <p><span> Copyright &copy; <?php echo get_field('copyright', 'option'); ?>,
                                    <?php echo date('Y'); ?>. All
                                    Rights Reserved.</span></p><?php if (get_field('footer_links', 'options')) { ?>
                               <span class="sapn2">&nbsp; | &nbsp;</span> <?php echo get_field('footer_links', 'options') ?><?php } ?>
                        <?php } ?>

                    </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
    (function () {
        var fonts = document.createElement('link');
        fonts.href = 'https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=DM+Serif+Display:ital@0;1&display=swap';
        fonts.rel = 'stylesheet';
        fonts.type = 'text/css';
        document.getElementsByTagName('head')[0].appendChild(fonts);

    })();
</script>
<script>
    jQuery('.select-dropdown .wpcf7-form-control-wrap').removeAttr('data-name');
</script>
<?php get_template_part('inc/schema/website', 'schema'); ?>
<?php get_template_part('inc/schema/org', 'schema'); ?>
<?php get_template_part('inc/schema/faq', 'schema'); ?>
<?php get_template_part('inc/schema/event', 'schema'); ?>
<?php get_template_part('inc/schema/page', 'schema'); ?>
<script>
    <!--  function to defer image.    -->
    function init() {
        var imgDefer = document.getElementsByTagName('img');
        for (var i = 0; i < imgDefer.length; i++) {
            if (imgDefer[i].getAttribute('data-src')) {
                imgDefer[i].setAttribute('src', imgDefer[i].getAttribute('data-src'));
            }
        }
    } window.onload = init; </script>
	
	 <script type="text/javascript" src="//cdn.calltrk.com/companies/401857285/d7f6c456278bd0f9e13e/12/swap.js" nitro-exclude></script>
	 
     

    <?php wp_footer(); ?>
    </body>

    </html>