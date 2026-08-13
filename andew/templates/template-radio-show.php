<?php
// Template Name:Radio Show Page
get_header();
get_template_part('inc/inner', 'banner');
?>
<?php
$radio_show_lists = get_field('radio_show_lists');
if ($radio_show_lists) {
    ?>
    <div class="radio-page">
        <?php
        foreach ($radio_show_lists as $radio_show_data):
            $heading = $radio_show_data['heading'];
            $video_lists = $radio_show_data['video_lists'];

            // Divide $video_lists into chunks of 2 items
            $video_chunks = array_chunk($video_lists, 2);

            foreach ($video_chunks as $chunk_index => $video_chunk):
                $class = ($chunk_index % 2 == 0) ? 'even' : 'odd';
                ?>
                <div class="radio-section space-pd <?php echo $class; ?>">
                    <div class="container">
                        <?php if ($heading && $chunk_index === 0): // Display heading only for the first chunk ?>
                            <div class="row justify-content-center radio-row ps-0 pe-0">
                                <div class="col-lg-12 text-center">
                                    <div class="heading-sc"><h2><?php echo $heading; ?></h2></div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <?php
                            foreach ($video_chunk as $data) {
                                $image = $data['video_poster'];
                                $title = $data['video_title'];
                                $video = $data['video_file'];
                                ?>
                                <div class="col-lg-6">
                                    <div class="video-top-box">
                                        <?php if ($video): ?>
                                            <a href="<?php echo $video; ?>" class="html5lightbox video-boxes position-relative">
                                                <?php echo wp_get_attachment_image($image['ID'], 'full', '', array('class' => '')); ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" viewBox="0 0 68 68" fill="none">
                                                    <g filter="url(#filter0_d_60_1484)">
                                                        <rect x="4" width="60" height="60" rx="30" fill="#C9A95F" shape-rendering="crispEdges"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M28.7245 23.9667C28.747 23.7775 28.8134 23.5961 28.9183 23.437C29.0232 23.2779 29.1637 23.1455 29.3288 23.0503C29.4938 22.9551 29.6788 22.8997 29.869 22.8885C30.0592 22.8773 30.2495 22.9106 30.4245 22.9858C31.3095 23.3642 33.2929 24.2633 35.8095 25.7158C38.327 27.1692 40.0979 28.4383 40.867 29.0142C41.5237 29.5067 41.5254 30.4833 40.8679 30.9775C40.1062 31.55 38.357 32.8025 35.8095 34.2742C33.2595 35.7458 31.2995 36.6342 30.4229 37.0075C29.6679 37.33 28.8229 36.8408 28.7245 36.0267C28.6095 35.075 28.3945 32.9142 28.3945 29.9958C28.3945 27.0792 28.6087 24.9192 28.7245 23.9667Z" fill="#292929"/>
                                                    </g>
                                                    <defs>
                                                        <filter id="filter0_d_60_1484" x="0" y="0" width="68" height="68" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                            <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                                            <feOffset dy="4"/>
                                                            <feGaussianBlur stdDeviation="2"/>
                                                            <feComposite in2="hardAlpha" operator="out"/>
                                                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_60_1484"/>
                                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_60_1484" result="shape"/>
                                                        </filter>
                                                    </defs>
                                                </svg>
                                                </a>
                                                <a href="<?php echo $video; ?>" class="html5lightbox ">
                                                <?php if ($title): ?>
                                                    <div class="video-heading"><?php echo $title; ?></div>
                                                <?php endif; ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
        endforeach;
        ?>
    </div>
<?php } ?>




<?php get_footer(); ?>
