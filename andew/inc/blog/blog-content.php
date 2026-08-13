<div class="post-list fullwidth">
    <div class="row row1">

        <?php
        if (have_posts()):
            while (have_posts()):
                the_post();
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

                ?>
                <div class="col-md-12 blog-col">
                    <div class="outer-info-box">
                        <div class="info-box fullwidth">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-6">
                                    <div class="post-image h-100 overflow-hidden">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php if ($thumb) { ?>
                                                <img src="<?php echo $thumb['0']; ?>" class="featured-img w-100"
                                                    alt="<?php the_title(); ?>">
                                                <?php
                                            } else {
                                                ?>
                                                <?php
                                                $GLOBALS['header_logo'] = get_field('header_logo', 'option');
                                                if ($GLOBALS['header_logo']): ?>
                                                    <div class="no-post-img">
                                                        <img src="<?php echo $GLOBALS['header_logo']; ?>" class="logo" alt="logo"
                                                            width="250" height="65">
                                                    </div>

                                                <?php endif; ?>
                                            <?php } ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-6 py-3 d-flex align-items-center">
                                    <div class="post-desc">
                                        <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </div>

                                        <div class="blog-content">
                                            <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                                        </div>
                                        <div class="blog-btn mt-3">
                                            <a class="blog-button d-flex align-items-center text-uppercase"
                                                href="<?php the_permalink(); ?>">Read
                                                More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

            endwhile;
            ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="paging-new fullwidth"><?php the_posts_pagination(); ?></div>
    <?php
    wp_reset_postdata();
        endif;
        wp_reset_query();
        ?>