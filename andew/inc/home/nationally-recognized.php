<?php $nationally_recognized = get_field('nationally_recognized', get_option('page_on_front'));
$heading = $nationally_recognized['heading'];
$add_awards = $nationally_recognized['add_awards'];
if ($add_awards) {
    ?>
    <section class="nationally-recognized space-pd">
        <div class="container wow fadeInUp">
            <?php if ($heading) { ?>
                <div class="heading-sc text-center">
                    <h2><?php echo $heading ?></h2>
                </div>
            <?php } ?>
        </div>
        <div class="award-wrp wow fadeInUp">
            <?php if (wp_is_mobile()) { ?>
                <div class="award-slider" id="award-slider">
                    <?php foreach ($add_awards as $row) {
                        $title = $row['title'];
                        $icon = $row['image'];
                        $content = $row['content']; ?>

                        <div class="pa-blk">
                            <?php if ($icon) { ?>
                                <div class="lft">
                                    <?php echo wp_get_attachment_image($icon, 'meduim'); ?>
                                </div>
                            <?php } ?>

                            <?php
                            if ($title) { ?>
                                <div class="title text-center">
                                    <?php echo $title ?>
                                </div>
                            <?php }
                            ?>
                            <div class="icon-sc my-3"><img class="w-100"
                                    src="<?php echo get_template_directory_uri() . '/img/icon-line.svg'; ?>" alt="Icon Line" width="420" height="28" />
                            </div>
                            <?php
                            if ($content) { ?>
                                <div class="content">
                                    <?php echo $content ?>
                                </div>
                            <?php } ?>

                        </div>

                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (!wp_is_mobile()) { ?>
                <div class="swiper award-slider award-slider1">
                    <div class="swiper-wrapper">
                        <?php foreach ($add_awards as $row) { ?>
                            <div class="swiper-slide pa-blk">
                                <div class="lft">
                                    <?php echo wp_get_attachment_image($row['image'], 'medium'); ?>
                                </div>
                                <div class="title text-center"><?php echo $row['title']; ?></div>
                                <div class="icon-sc my-3"><img class="w-100"
                                        src="<?php echo get_template_directory_uri() . '/img/icon-line.svg'; ?>" alt="Icon Line" width="420" height="28" />
                                </div>
                                <div class="content"><?php echo $row['content']; ?></div>
                            </div>
                        <?php } ?>
                    </div>

                    <!-- Custom Swiper Scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            <?php } ?>

        </div>
    </section>
<?php } ?>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".award-slider1", {
        slidesPerView: "auto",
        spaceBetween: 20,
        freeMode: true,
        scrollbar: {
            el: ".swiper-scrollbar",
            draggable: true, // Make scrollbar interactive
            dragSize: 200, // Fixed width for the draggable block
            snapOnRelease: false, // Smooth dragging
        },
        mousewheel: false
    });




</script>