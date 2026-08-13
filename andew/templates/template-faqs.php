<?php
/* Template Name: FAQs Page */
get_header();
get_template_part('inc/inner', 'banner');
?>
<?php
$thecontent = get_the_content();
if (!empty($thecontent)):
    ?>
    <div class="section-pd faqs-default defautl-editor pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <?php
                    if (have_posts()) : while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<div class="faqs-page common-pd">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post_faqs',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'paged' => $paged
                );

                $wp_query = new WP_Query($args);
                if ($wp_query->have_posts()) :
                    ?>
                    <div id="accordionExample" class="faqs-tabs mt-lg-5 mt-md-4 accordion faq-accordion">
                        <div class="faqs_response">
                            <?php
                            while ($wp_query->have_posts()) :
                                $wp_query->the_post();
                                ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id = "heading<?php echo get_the_id(); ?>">
                                        <button class="accordion-button collapsed h6" type = "button" data-bs-toggle = "collapse" data-bs-target = "#collapse<?php echo get_the_id(); ?>" aria-expanded = "true" aria-controls = "collapse<?php echo get_the_id(); ?>"><?php the_title();
                                ?> </button>
                                    </h2>
                                    <div id="collapse<?php echo get_the_id(); ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo get_the_id(); ?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body list-style"><?php the_content(); ?></div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php $nonce = wp_create_nonce('extra-faqs'); ?>
<script>
    jQuery(".faqajax").change(function () {
        var faqslug = jQuery(this).val();
        var ajax_url = '/wp-admin/admin-ajax.php';
        var data = {
            'action': 'load_faqs_category',
            'faqslug': faqslug,
            'security': '<?php echo $nonce; ?>',
        };

        jQuery.post(ajax_url, data, function (response) {
            if (response !== '') {
                jQuery('.faqs_response').html(response);
            } else {

            }
        });
    });
</script>
<style>
    /* faq */
    .faqs-page {
        padding-top: 0 !important;
    }

    .faq-accordion .accordion-item {
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, .125)
    }

    .faq-accordion .accordion-item:last-child {
        margin-bottom: 0;
    }

    .faq-accordion .accordion-item .accordion-header button {
        text-transform: uppercase;
    }

    .faq-accordion .accordion-item .accordion-body {
        text-transform: capitalize;
        padding-left: 50px;
        position: relative;
    }

    .faq-accordion .accordion-button:not(.collapsed)::after {
        background-image: url(<?php echo get_template_directory_uri(); ?>/img/faq-minus.svg);
    }

    .faq-accordion .accordion-button::after {
        background-image: url(<?php echo get_template_directory_uri(); ?>/img/faq-plus.svg);
    }

    .faq-accordion .pagination .nav-links {
        justify-content: center;

    }

    .faq-search input#faqs {
        padding: 10px 20px;
        font-size: 18px;
        background-image: url(/wp-content/uploads/2023/04/search.svg);
        background-repeat: no-repeat;
        background-position: 97% center;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: none;
        outline: none;
    }

    .accordion-button:focus {
        border-color: transparent;
        outline: none;
        box-shadow: none;
        background: transparent;
    }

    .accordion-button:not(.collapsed) {
        color: #36444F;
        background-color: transparent;
        box-shadow: none;
    }

    .accordion-button::after {
        left: -10px;
        top: 18px;
        position: absolute;
    }

    .faq-accordion .accordion-item .accordion-body:after {
        content: '';
        background: #0b4b9d;
        position: absolute;
        top: 0;
        left: 23px;
        width: 1px;
        height: calc(100% - 50px);
        bottom: 0;
        margin: auto;
    }
    /* end */
    
    @media (max-width:1024px) {
        .faq-accordion .accordion-item .accordion-body {
            padding-left: 15px;
        }

        .faq-accordion .accordion-item .accordion-body:after {
            left: 0px;
        }
    }
</style>
<?php get_template_part('inc/home/home', 'content'); ?>
<?php get_template_part('inc/home/home', 'contact'); ?>
<?php
get_footer();
