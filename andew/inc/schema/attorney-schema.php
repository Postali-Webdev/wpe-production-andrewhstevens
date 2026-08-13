<?php
$image = get_the_post_thumbnail_url();
?>

<?php
$args = array(
    'post_type' => 'nap',
    'posts_per_page' => 1
);
$the_query = new WP_Query($args);
if ($the_query->have_posts()) {
?>
    <div class="d-none" itemscope itemtype="http://schema.org/Attorney">
        <div class="d-none">
            <span itemprop="priceRange">N/A</span>
            <span itemprop="name"><?php the_title(); ?></span>
            <img src='<?php echo $image; ?>' itemprop='image' alt='image' />
        </div>
        <span itemprop="priceRange" class="d-none">N/a</span>
        <div itemprop="makesOffer" itemscope itemtype="http://schema.org/Offer">
            <div itemprop="name"><?php //echo bloginfo('name'); ?> <?php the_title(); ?></div>
            <div itemprop="description"><?php the_content(); ?></div>
        </div>
        <?php
        while ($the_query->have_posts()) : $the_query->the_post();
        ?>
            <?php
            $nap_attorney_business_name = get_field('nap_attorney_business_name');
            $nap_street_address = get_field('nap_street_address');
            $nap_suite_number = get_field('nap_suite_number');
            $nap_city_county = get_field('nap_city_county');
            $nap_state = get_field('nap_state');
            $nap_zip_code = get_field('nap_zip_code');
            $nap_phone_number = get_field('nap_phone_number');
            $phone_number_post = preg_replace("/[^0-9]/", "", $nap_phone_number);
            $nap_text_number = get_field('nap_text_number');
            $get_directions_link = get_field('get_directions_link');
            ?>
            <?php if ($nap_attorney_business_name || $nap_street_address || $nap_city_county || $nap_state) { ?>
                <div class="nap-postal-address-wrap" itemprop="address" itemscope="" itemtype="https://schema.org/PostalAddress">
                    <div class="h5">
                        <span class="d-none" itemprop="name"><?php the_field('business_name', 'option'); ?></span>
                        <span class="location-name-nap"><?php echo $nap_attorney_business_name; ?></span>
                    </div>
                    <p><strong><?php echo $sub_address_info; ?></strong><br><span itemprop="streetAddress"><?php echo $nap_street_address; ?>
                            <?php
                            if ($nap_suite_number) {
                                echo '<br/>' . $nap_suite_number;
                            }
                            ?>
                        </span>
                        <?php echo '<br/><span itemprop="addressLocality">' . $nap_city_county . '</span>,&nbsp;<span itemprop="addressRegion"> ' . $nap_state . '</span>&nbsp;<span itemprop="postalCode">' . $nap_zip_code . '</span>' ?>
                    </p>
                <?php } ?>
                <?php if ($get_directions_link) { ?>
                    <div class="nap-global-direction">
                        <a href="<?php the_field('get_directions_link') ?>" target="_blank" rel="nofollow">Get Directions</a>
                    </div>
                <?php } ?>
                <?php if ($phone_number_post != '') : ?>
                    <div class="nap-global-phone"> Phone :
                        <?php echo '<a href=tel:' . $phone_number_post . '><span itemprop="telephone">' . $nap_phone_number . '</span></a>'; ?>
                    </div>
                <?php endif; ?>
                </div>
            <?php
        endwhile;
            ?>
    </div>
<?php
    wp_reset_query();
}
