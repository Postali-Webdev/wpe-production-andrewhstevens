<?php
$social_links = get_field('social_links', 'option');
if ($social_links):
    ?> 
    <ul>
        <?php
        $i = 1;
        foreach ($social_links as $sl):
            $icon = $sl['icon'];
            $link = $sl['link'];
            ?>
            <li class="item-<?php echo $i; ?>">
                <a href="<?php echo $link; ?>" target="_blank">
                    <?php echo wp_get_attachment_image($icon['id'], 'full'); ?>
                </a>
            </li>
        <?php endforeach;
        ?>
    </ul>
    <?php
endif;
?>