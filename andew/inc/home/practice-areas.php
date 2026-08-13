<?php 
$practice_areas = get_field('practice_areas');
$heading = $practice_areas['heading'];
$add_pa = $practice_areas['add_pa'];
$full_content = $practice_areas['full_content'];

if ($add_pa) { ?>
    <section class="practice-areas space-pd text-center">
        <div class="container wow fadeInUp">

            <?php if ($heading) { ?>
                <div class="heading-sc practice-heading">
                    <h2><?php echo $heading ?></h2>
                </div>
            <?php } ?>

            <?php if ($full_content) { ?>
                <div class="content text-center text-white mb-t">
                    <?php echo $full_content ?>
                </div>
            <?php } ?>

            <!-- Desktop version -->
            <div class="d-xl-block d-none">
                <div class="row justify-content-center">
                    <?php
                    $columns = array_fill(0, 3, []);
                    $index = 0;

                    foreach ($add_pa as $item) {
                        $columns[$index][] = $item;
                        $index = ($index + 1) % 3;
                    }

                    foreach ($columns as $column) { ?>
                        <div class="col-md-4">
                            <?php foreach ($column as $row) {
                                $title = $row['title'];
                                $content = $row['content'];
                                $link = $row['link']; ?>


                                <?php if ($link) { ?>
                                <a class="pa-blk" href="<?php echo $link ?>">
                                <?php } else { ?>
                                <div class="pa-blk">
                                <?php } ?>
                                
                                    <div>
                                        <?php if ($title) { ?>
                                            <div class="title"><?php echo $title ?></div>
                                        <?php } ?>
                                        <div class="btm-content" style="display: none;">
                                            <?php if ($content) { ?>
                                                <div class="content"><?php echo $content ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                <?php if ($link) { ?>
                                </a>
                                <?php } else { ?>
                                </div>
                                <?php } ?>

                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Mobile version -->
            <div class="d-block d-xl-none">
                <div class="row justify-content-center">
                    <?php foreach ($add_pa as $item) {
                        $title = $item['title'];
                        $content = $item['content'];
                        $link = $item['link']; ?>
                        <div class="col-md-6">
                            <div class="pa-blk">
                                <div>
                                    <?php if ($title) { ?>
                                        <div class="title"><?php echo $title ?></div>
                                    <?php } ?>
                                    <div class="btm-content" style="display: none;">
                                        <?php if ($content) { ?>
                                            <div class="content"><?php echo $content ?></div>
                                        <?php } ?>
                                        <?php if ($link) { ?>
                                            <div class="btn-sc">
                                                <a class="btn-link" href="<?php echo $link ?>">VIEW MORE</a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </section>


<?php } ?>