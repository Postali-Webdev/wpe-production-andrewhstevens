<?php
if (is_front_page()) {
    /** Announcement Schema Code Start * */
    if (have_rows('announcement_schema_tab')):
        while (have_rows('announcement_schema_tab')): the_row();
            $name = get_sub_field('name');
            $text = get_sub_field('text');
            $date_posted = get_sub_field('date_posted');
            $expires = get_sub_field('expires');
            $quarantine_guidelines = get_sub_field('quarantine_guidelines');
            $disease_prevention_info = get_sub_field('disease_prevention_info');
            $category = get_sub_field('category');
            $administrative_area_name = get_sub_field('administrative_area_name');
            ?>
            <script type="application/ld+json">
                {
                "@context": "https://schema.org",
                "@type": "SpecialAnnouncement",
                "name": "<?php echo $name; ?>",
                "text": "<?php echo $text; ?>",
                "datePosted": "<?php echo $date_posted; ?>",
                "expires": "<?php echo $expires; ?>",
                "quarantineGuidelines": "<?php echo $quarantine_guidelines; ?>",
                "diseasePreventionInfo": "<?php echo $disease_prevention_info; ?>",
                "category": "<?php echo $category; ?>",
                "spatialCoverage": [
                {
                "type": "AdministrativeArea",
                "name": "<?php echo $administrative_area_name; ?>"
                }
                ]
                }
            </script>
            <?php
        endwhile;
    endif;
    /* Announcement Schema Code End */

    /** Event Schema Code Start * */
    if (have_rows('event_schema_tab')):
        while (have_rows('event_schema_tab')): the_row();
            $name = get_sub_field('name');
            $start_date = get_sub_field('start_date');
            $end_date = get_sub_field('end_date');
            $event_attendance_mode = get_sub_field('event_attendance_mode');
            $event_status = get_sub_field('event_status');
            $event_description = get_sub_field('event_description');
            $event_performer = get_sub_field('event_performer');
            $event_image = get_sub_field('event_image');
            ?>
            <script type="application/ld+json">
                {
                "@context": "https://schema.org",
                "@type": "Event",
                "name": "<?php echo $name; ?>",
                "startDate": "<?php echo $start_date; ?>",
                "endDate": "<?php echo $end_date; ?>",
                "eventAttendanceMode": "<?php echo $event_attendance_mode; ?>",
                "eventStatus": "<?php echo $event_status; ?>",

                <?php
                if (have_rows('event_location')):
                    while (have_rows('event_location')): the_row();
                        $location_name = get_sub_field('location_name');
                        $street_address = get_sub_field('street_address');
                        $address_locality = get_sub_field('address_locality');
                        $postal_code = get_sub_field('postal_code');
                        $address_region = get_sub_field('address_region');
                        $address_country = get_sub_field('address_country');
                        ?>
                        "location": {
                        "@type": "Place",
                        "name": "<?php echo $location_name; ?>",
                        "address": {
                        "@type": "PostalAddress",
                        "streetAddress": "<?php echo $street_address; ?>",
                        "addressLocality": "<?php echo $address_locality; ?>",
                        "postalCode": "<?php echo $postal_code; ?>",
                        "addressRegion": "<?php echo $address_region; ?>",
                        "addressCountry": "<?php echo $address_country; ?>"
                        }
                        },
                        <?php
                    endwhile;
                endif;
                ?>

                "image": [
                "<?php echo $event_image; ?>"
                ],
                "description": "<?php echo $event_description; ?>",

                <?php
                if (have_rows('event_offers')):
                    while (have_rows('event_offers')): the_row();
                        $offer_url = get_sub_field('offer_url');
                        $price = get_sub_field('price');
                        $price_currency = get_sub_field('price_currency');
                        $availability = get_sub_field('availability');
                        $valid_from = get_sub_field('valid_from');
                        ?>
                        "offers": {
                        "@type": "Offer",
                        "url": "<?php echo $offer_url; ?>",
                        "price": "<?php echo $price; ?>",
                        "priceCurrency": "<?php echo $price_currency; ?>",
                        "availability": "<?php echo $availability; ?>",
                        "validFrom": "<?php echo $valid_from; ?>"
                        },
                        <?php
                    endwhile;
                endif;
                ?>

                "performer": {
                "@type": "PerformingGroup",
                "name": "<?php echo $event_performer; ?>"
                },

                <?php
                if (have_rows('event_organizer')):
                    while (have_rows('event_organizer')): the_row();
                        $organizer_name = get_sub_field('organizer_name');
                        $organizer_url = get_sub_field('organizer_url');
                        ?>
                        "organizer": {
                        "@type": "Organization",
                        "name": "<?php echo $organizer_name; ?>",
                        "url": "<?php echo $organizer_url; ?>"
                        }
                        <?php
                    endwhile;
                endif;
                ?>

                }
            </script>
            <?php
        endwhile;
    endif;
    /* Event Schema Code End */
}
?>