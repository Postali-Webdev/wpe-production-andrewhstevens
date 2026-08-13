<?php $schedule_consultation = get_field('schedule_consultation');
$heading = $schedule_consultation['heading'];
$sub_heading = $schedule_consultation['sub_heading'];
$call_text = $schedule_consultation['call_text'];
$phone_no = $schedule_consultation['phone_no'];
?>
<section class="schedule-consultation space-mr">
    <div class="container wow fadeInUp">
        <div class="row gy-lg-0 gy-5">

            <div class="col-lg-6">
                <?php if ($heading) { ?>
                    <div class="heading-sc">
                        <h2><?php echo $heading ?></h2>
                    </div>
                <?php }
                if ($sub_heading) { ?>
                    <div class="sub-heading">
                        <?php echo $sub_heading ?>
                    </div>
                <?php } ?>
                <?php if (!wp_is_mobile()) { ?>
                    <?php if ($phone_no) { ?>
                        <div class="fax-area ">
                            <div class="phone-area d-flex align-items-center">
                                <svg width="37" height="40" viewBox="0 0 37 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    class=" d-block replaced-svg">
                                    <path
                                        d="M32.1962 27.8835C29.9121 25.8807 27.5941 24.6676 25.3381 26.6673L23.9909 27.876C23.0053 28.7533 21.1727 32.8527 14.0874 24.4966C7.00355 16.1512 11.219 14.8518 12.2061 13.982L13.5607 12.7719C15.8049 10.7676 14.9579 8.24441 13.3393 5.64713L12.3626 4.07395C10.7366 1.48273 8.96596 -0.219038 6.71583 1.78224L5.50002 2.87137C4.50554 3.61409 1.7257 6.02833 1.0514 10.6148C0.239879 16.1179 2.79986 22.4197 8.66496 29.3342C14.5227 36.2517 20.2579 39.7263 25.6907 39.6658C30.2057 39.6159 32.9324 37.1321 33.7853 36.229L35.0055 35.1383C37.2497 33.1386 35.8554 31.1025 33.5698 29.0952L32.1962 27.8835Z"
                                        fill="#C9A95F"></path>
                                </svg>
                                <div class="content-flex ms-3">
                                    <?php if ($call_text) { ?>
                                        <div class="address "> <?php echo $call_text ?></div>
                                    <?php } ?>
                                    <?php if ($phone_no): ?>
                                        <div class="call-number "> <a
                                                href="tel:<?php echo preg_replace('/\D+/', '', $phone_no); ?>">

                                                <?php echo $phone_no; ?>

                                            </a></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                <?php } ?>
                <?php if (!wp_is_mobile()) { ?>
                <?php
                $args = array(
                    'post_type' => 'nap',
                    'posts_per_page' => -1,
                );
                $the_query = new WP_Query($args);
                if ($the_query->have_posts()) {
                    ?>
                    <div class="nap-row ">

                        <div class="row">
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
                                <div class="col-md-6">
                                    <div class="footer-nap-col">



                                        <div class="nap-postal-address-wrap">

                                            <div class="address-wrap">

                                                <?php
                                                if ($nap_attorney_business_name) {
                                                    echo "<div class='business-name' >" . $nap_attorney_business_name . "</div>";
                                                }
                                                ?>
                                                <div class="address">
                                                    <div class="location-wrap">
                                                        <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3.54393 3.48251C5.1785 1.88064 7.37919 0.988552 9.66779 1.00011C11.9564 1.01167 14.148 1.92594 15.7663 3.54424C17.3846 5.16255 18.2988 7.35412 18.3104 9.64272C18.322 11.9313 17.4299 14.132 15.828 15.7666L11.2368 20.3577C10.8255 20.769 10.2676 21 9.68596 21C9.1043 21 8.54646 20.769 8.1351 20.3577L3.54393 15.7666C1.91507 14.1376 1 11.9282 1 9.62455C1 7.32087 1.91507 5.11154 3.54393 3.48251Z" stroke="#000" stroke-width="1.5" stroke-linejoin="round"/>
                                                        <path d="M9.68588 12.9149C11.5031 12.9149 12.9763 11.4417 12.9763 9.62448C12.9763 7.80726 11.5031 6.33411 9.68588 6.33411C7.86866 6.33411 6.39551 7.80726 6.39551 9.62448C6.39551 11.4417 7.86866 12.9149 9.68588 12.9149Z" stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                        <span><?php if ($nap_street_address || $nap_suite_number) { ?>
                                                        <span><?php echo $nap_street_address; ?>
                                                            <?php
                                                            if ($nap_suite_number) {
                                                                echo '' . $nap_suite_number;
                                                            }
                                                            ?>
                                                        </span>
                                                    <?php } ?>
                                                    <?php
                                                    if ($nap_city_county) {
                                                        echo '<br/><span >' . $nap_city_county . '</span>,&nbsp;';
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($nap_state) {
                                                        echo '<span > ' . $nap_state . '</span>&nbsp;';
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($nap_zip_code) {
                                                        echo '<span >' . $nap_zip_code . '</span>';
                                                    }
                                                    ?>
                                                    </span>
                                                    
                                            </div>
                                                </div>
                                                <?php if ($get_directions_link) { ?>
                                                    <div class="nap-global-direction">
                                                        <a class="direction-link" href="<?php the_field('get_directions_link') ?>"
                                                            target="_blank" rel="nofollow"> [+] Map & Directions</a>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                            <?php if ($phone_number_post != ''): ?>
                                                <div class="phone">
                                                    <div class="location-wrap">
                                                         <svg width="37" height="40" viewBox="0 0 37 40" fill="none" xmlns="http://www.w3.org/2000/svg"
                                                            class=" d-block replaced-svg">
                                                            <path
                                                                d="M32.1962 27.8835C29.9121 25.8807 27.5941 24.6676 25.3381 26.6673L23.9909 27.876C23.0053 28.7533 21.1727 32.8527 14.0874 24.4966C7.00355 16.1512 11.219 14.8518 12.2061 13.982L13.5607 12.7719C15.8049 10.7676 14.9579 8.24441 13.3393 5.64713L12.3626 4.07395C10.7366 1.48273 8.96596 -0.219038 6.71583 1.78224L5.50002 2.87137C4.50554 3.61409 1.7257 6.02833 1.0514 10.6148C0.239879 16.1179 2.79986 22.4197 8.66496 29.3342C14.5227 36.2517 20.2579 39.7263 25.6907 39.6658C30.2057 39.6159 32.9324 37.1321 33.7853 36.229L35.0055 35.1383C37.2497 33.1386 35.8554 31.1025 33.5698 29.0952L32.1962 27.8835Z"
                                                                fill="#C9A95F"></path>
                                                        </svg>
                                                    <a
                                                        href="tel:<?php echo $phone_number_post; ?>"><span><?php echo $nap_phone_number; ?></span></a>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                            <?php if ($nap_email_address != ''): ?>
                                                <div class="email">
                                                    <a
                                                        href="mailto:<?php echo $nap_email_address; ?>"><span><?php echo $nap_email_address; ?></span></a>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                $i++;
                            endwhile;
                            wp_reset_query();
                            ?>
                        </div>
                    </div>

                </div>
            <?php } ?> <?php } ?>
            <div class="col-lg-6 text-end">
                <?php echo do_shortcode('[contact-form-7 id="bc993e6" title="Footer Form"]') ?>
            </div>
        </div>
    </div>
</section>