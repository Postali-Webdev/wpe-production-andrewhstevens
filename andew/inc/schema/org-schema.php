<?php
if (is_front_page()):
    $social_links = get_field('social_links', 'option');
    if ($social_links):
        ?>
        <script type='application/ld+json'>   
            {
            "@context": "http://www.schema.org",
            "@type": "Organization",
            "sameAs": [<?php
            $i = 1;
            $count = count($social_links);
            foreach ($social_links as $sl):
                echo '"' . $sl['link'] . '"';
                if ($i < $count):
                    echo ",";
                endif;
                $i++;
            endforeach;
            ?>]
            }
        </script>
    <?php endif; ?>
<?php endif; ?>