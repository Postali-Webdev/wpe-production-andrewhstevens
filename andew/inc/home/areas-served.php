<?php 
$areas_served = get_field('areas_served');
$heading = $areas_served['heading'];
$content = $areas_served['content'];
$map = $areas_served['map'];

if ($heading || $content || $map) {
    ?>
    <section class="areas-served space-pd">
        <div class="container">
            <div class="row">

                <div class="<?php if ($map) { echo 'col-md-6'; } ?> d-flex align-items-center">
                    <div class="areas-left wow fadeInLeft">
                        <?php if ($heading) { ?>
                            <div class="heading-sc">
                                <h2><?php echo $heading ?></h2>
                            </div>
                        <?php } ?>
                        <?php if ($content) { ?>
                            <div class="content">
                                <?php echo $content ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <?php if ($map) { ?>
                    <div class="col-md-6 wow fadeInRight">
                        <div class="map-sc w-100 h-100">
                            <?php
                            // Remove width/height from iframe
                            $map = preg_replace('/width="[^"]*"/', '', $map);
                            $map = preg_replace('/height="[^"]*"/', '', $map);
                            echo $map;
                            ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
<?php } ?>