
    <div class="footer-block-3 footer-contact nap">
        <?php
        $args = array(
            'post_type' => 'nap',
            'posts_per_page' => -1,
        );
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            ?>
            <div itemscope itemtype="https://schema.org/LegalService">
                <div class="d-none">
                    <meta itemprop="name" content="<?php echo bloginfo('name'); ?>">
                    <img src="<?php the_field('header_logo', 'option'); ?>" itemprop="image"
                        alt="<?php echo bloginfo('name'); ?>" />
                </div>
                <span itemprop="priceRange" class="d-none">N/a</span>
                <div class="footer-nap-row">
                    <?php
                    $i = 1;
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                        $nap_attorney_business_name = get_field('nap_attorney_business_name');
                        $nap_street_address = get_field('nap_street_address');
                        $nap_suite_number = get_field('nap_suite_number');
                        $nap_city_county = get_field('nap_city_county');
                        $nap_state = get_field('nap_state');
                        $nap_zip_code = get_field('nap_zip_code');
                        $nap_phone_number = get_field('nap_phone_number');
                        $phone_number_post = preg_replace("/[^0-9]/", "", $nap_phone_number);
                        $nap_email_address = get_field('nap_email_address');
                        $get_directions_link = get_field('get_directions_link');

                        $nap_latitude = get_field('nap_latitude');
                        $nap_longitude = get_field('nap_longitude');
                        ?>
                        <div class="footer-nap-col">

                           

                            <div class="nap-postal-address-wrap" itemprop="address" itemscope=""
                                itemtype="https://schema.org/PostalAddress">

                                <!--                                 <div class='widget-title h4'>Contact Us</div>
                                -->
                                <div class="address-wrap">
                                    <div class="nap-post-title"> <?php the_title(); ?> </div>
                                    <?php
                                    if ($nap_attorney_business_name) {
                                        echo "<div class='business-name d-none' itemprop='name'>" . $nap_attorney_business_name . "</div>";
                                    }
                                    ?>
                                    <div class="address address-text">
                                        <img src="https://www.stevensoncriminaldefense.com/wp-content/uploads/2025/09/icons8-location-50-1.png" alt="location-icon">
                                        <div>
                                        <?php if ($nap_street_address || $nap_suite_number) { ?>
                                            <span itemprop="streetAddress"><?php echo $nap_street_address; ?>
                                                <?php
                                                if ($nap_suite_number) {
                                                    echo '' . $nap_suite_number;
                                                }
                                                ?>
                                            </span>
                                        <?php } ?>
                                        <?php
                                        if ($nap_city_county) {
                                            echo '<span itemprop="addressLocality">' . $nap_city_county . '</span>, ';
                                        }
                                        ?>
                                        <?php
                                        if ($nap_state) {
                                            echo '<span itemprop="addressRegion"> ' . $nap_state . '</span>';
                                        }
                                        ?>
                                        <?php
                                        if ($nap_zip_code) {
                                            echo '<span itemprop="postalCode">' . $nap_zip_code . '</span>';
                                        }
                                        ?>
                                        </div>
                                    </div>
                                    <?php if ($get_directions_link) { ?>
                                        <div class="nap-global-direction">
                                            <a class="direction-link" href="<?php the_field('get_directions_link') ?>" target="_blank"
                                                rel="nofollow"> Get Directions</a>
                                        </div>
                                    <?php } ?>
                                </div>

                                <?php if ($phone_number_post != ''): ?>
                                    <div class="phone phone-text">
                                        <a href="tel:<?php echo $phone_number_post; ?>">
                                            <span itemprop="telephone">
                                            <svg width="37" height="40" viewBox="0 0 37 40" fill="none" xmlns="http://www.w3.org/2000/svg" class=" d-block replaced-svg">
                                <path d="M32.1962 27.8835C29.9121 25.8807 27.5941 24.6676 25.3381 26.6673L23.9909 27.876C23.0053 28.7533 21.1727 32.8527 14.0874 24.4966C7.00355 16.1512 11.219 14.8518 12.2061 13.982L13.5607 12.7719C15.8049 10.7676 14.9579 8.24441 13.3393 5.64713L12.3626 4.07395C10.7366 1.48273 8.96596 -0.219038 6.71583 1.78224L5.50002 2.87137C4.50554 3.61409 1.7257 6.02833 1.0514 10.6148C0.239879 16.1179 2.79986 22.4197 8.66496 29.3342C14.5227 36.2517 20.2579 39.7263 25.6907 39.6658C30.2057 39.6159 32.9324 37.1321 33.7853 36.229L35.0055 35.1383C37.2497 33.1386 35.8554 31.1025 33.5698 29.0952L32.1962 27.8835Z" fill="#C9A95F"></path>
                            </svg>    
                                            <?php echo $nap_phone_number; ?></span></a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($nap_email_address != ''): ?>
                                    <div class="email">
                                        <a href="mailto:<?php echo $nap_email_address; ?>"><span
                                                itemprop="email"><?php echo $nap_email_address; ?></span></a>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                        <?php
                        $i++;
                    endwhile;
                    wp_reset_query();
                    ?>
                       <?php if (is_front_page()) { ?>
                        <div class="d-none" itemscope itemtype="http://schema.org/Place">
                            <p itemprop="name">
                                <?php bloginfo('name'); ?>
                            </p>
                            <?php
                            while ($the_query->have_posts()):
                                $the_query->the_post();
                                $latitude = get_field('nap_latitude');
                                $longitude = get_field('nap_longitude');
                                ?>
                                <div itemprop="geo" itemscope itemtype="http://schema.org/GeoCoordinates">
                                    <meta itemprop="latitude" content="<?php echo $latitude; ?>" />
                                    <meta itemprop="longitude" content="<?php echo $longitude; ?>" />
                                </div>
                                <?php
                            endwhile;
                            wp_reset_query();
                            ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php }
        ?>
    </div>
    <?php

