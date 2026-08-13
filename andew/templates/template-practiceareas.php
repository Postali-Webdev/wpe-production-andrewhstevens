<?php
/* Template Name: Practice Areas */
get_header();
get_template_part('inc/inner', 'banner');
?>
<?php $practice_areas = get_field('practice_areas_copy');
$heading = $practice_areas['heading'];
$add_pa = $practice_areas['add_pa'];
if ($add_pa) {
    ?>
    <section class="practice-areas space-pd text-center pa-list-1">
        <div class="container">
            <?php if ($heading) { ?>
                <div class="heading-sc practice-heading mb-t">
                    <h2><?php echo $heading ?></h2>
                </div>
            <?php } ?>
            <div class="d-xl-block d-none">
                <div class="row justify-content-center ">
                    <?php
                    // Ensure there are always three columns
                    $columns = array_fill(0, 3, []); // Create three empty columns
                    $items = $add_pa;
                    $total_items = count($items);
                    $index = 0;

                    // Distribute items evenly into the three columns
                    foreach ($items as $item) {
                        $columns[$index][] = $item;
                        $index = ($index + 1) % 3; // Rotate between 0, 1, 2
                    }

                    // Loop through each column
                    foreach ($columns as $column) { ?>
                        <div class="col-md-4"> <!-- Each column -->
                            <?php
                            // Loop through each item in the column
                            foreach ($column as $row) {
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
            <div class="d-block d-xl-none">
                <div class="row justify-content-center ">
                    <?php
                    // Loop through each column
                    foreach ($add_pa as $column1) {
                        $title1 = $column1['title'];
                        $content1 = $column1['content'];
                        $link1 = $column1['link']; ?>
                        <div class="col-md-6"> <!-- Each column -->
                            <?php
                            // Loop through each item in the column
                    
                            ?>
                            <div class="pa-blk">
                                <div>
                                    <?php if ($title1) { ?>
                                        <div class="title">
                                            <?php echo $title1 ?>
                                        </div>
                                    <?php } ?>
                                    <div class="btm-content" style="display: none;"> <!-- Initially hidden -->
                                        <div>
                                            <?php if ($content1) { ?>
                                                <div class="content">
                                                    <?php echo $content1 ?>
                                                </div>
                                            <?php } ?>
                                            <?php if ($link1) { ?>
                                                <div class="btn-sc">
                                                    <a class="btn-link" href="<?php echo $link1 ?>">VIEW MORE</a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php get_footer(); ?>