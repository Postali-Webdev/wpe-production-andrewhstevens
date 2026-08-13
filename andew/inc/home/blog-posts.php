<?php
$section = get_field('blog_sec');
$heading = $section['heading'];
$link = $section['link'];
$image = $section['image'];

$post_no = wp_is_mobile() ? 1 : 2; // Set number of posts based on device

$args = [
    'post_type'      => 'post',
    'posts_per_page' => $post_no,
    'post_status'    => 'publish',
];

$blog_query = new WP_Query($args);

if ($blog_query->have_posts()) : ?>
    <section class="space-pd home-blog-post">
        <div class="container wow fadeInUp">

            <?php if ($heading) : ?>
                <div class="heading-sc text-center">
                    <div class="blog_title h2"><?php echo esc_html($heading); ?></div>
                </div>
            <?php endif; ?>

            <?php if ($image) : ?>
                <div class="image-icon text-center">
                    <?php echo wp_get_attachment_image($image['ID'], 'full', false, ['class' => '']); ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <?php while ($blog_query->have_posts()) : $blog_query->the_post();
                    $title = get_the_title();
                    $content = wp_trim_words(get_the_content(), 20);
                    $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>
                    
                    <div class="col-xl-6 col-wp">
                        <div class="blog-card">
                            <div class="row align-items-center">

                                <?php if (!wp_is_mobile() && $featured_image) : ?>
                                    <div class="col-xl-6">
                                        <div class="lft">
                                            <a href="<?php the_permalink(); ?>">
                                                <img src="<?php echo esc_url($featured_image); ?>" 
                                                     alt="<?php echo esc_attr($title); ?>" 
                                                     class="img-fluid mb-3" />
                                            </a>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="col-xl-6">
                                    <div class="rgt">

                                        <?php if ($title) : ?>
                                            <a href="<?php the_permalink(); ?>">
                                                <div class="col-title blog-title"><?php echo esc_html($title); ?></div>
                                            </a>
                                        <?php endif; ?>

                                        <?php if (wp_is_mobile() && $featured_image) : ?>
                                            <div class="ft-img mt-3">
                                                <a href="<?php the_permalink(); ?>">
                                                    <img src="<?php echo esc_url($featured_image); ?>" 
                                                         alt="<?php echo esc_attr($title); ?>" 
                                                         class="img-fluid mb-4" />
                                                </a>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($content) : ?>
                                            <p><?php echo esc_html($content); ?></p>
                                        <?php endif; ?>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>

            <?php if ($link) :
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <div class="btn-wp text-md-center">
                    <a class="btn" href="<?php echo esc_url($link_url); ?>" 
                       target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </section>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>