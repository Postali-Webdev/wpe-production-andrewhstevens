<?php 
$contact_athens = get_field('contact_athens');
$heading = $contact_athens['heading'];
$content = $contact_athens['content'];

if ($heading || $content) { ?>
    <section class="criminal_section contact_athens pd-lg position-relative">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-12 wow fadeInRight">
                    <div class="inner-right-content">

                        <?php if ($heading) { ?>
                            <div class="heading-sc text-center wt-blk">
                                <h2><?php echo $heading ?></h2>
                            </div>
                        <?php } ?>

                        <div class="icon-sec text-center">
                            <img src="<?php bloginfo('template_url'); ?>/img/white-icon.svg" alt="" width="419" height="26">
                        </div>

                        <?php if ($content) { ?>
                            <div class="content">
                                <?php echo $content; ?>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>