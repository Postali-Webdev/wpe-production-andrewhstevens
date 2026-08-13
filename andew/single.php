<?php
get_header();
get_template_part('inc/inner', 'banner');

?>

<div class="static-page space-mr single-blog default-page">
    <div class="container">
        <div class="row">
        <div class="blog-search sidebar d-lg-none d-block mb-md-4 mb-2"> <?php get_template_part('searchform2'); ?></div>
            <div class="col-xl-8 col-lg-7  content-area list-content list-style lft-sc-ly">
                <?php if (have_posts()): ?>
                    <!-- default content area-->
                    <?php while (have_posts()):
                        the_post(); ?>
                        <?php if (has_post_thumbnail()): ?>
                            <div class="featured-img">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="blog-title">
                            <h1 class="mb-4 h2"> <?php the_title() ?></h1>
                        </div>
                        <?php if (!empty(get_the_content())): ?>
                            <div class="the_content">
                                <?php the_content(); ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>

                <?php endif; ?>
            </div>

            <div class="col-xl-4 col-lg-5 sidebar no-list-ul right-sc-ly">
                <?php get_sidebar('blog'); ?>

            </div>
        </div>
    </div>
</div>
<?php get_template_part('inc/home/home', 'contact'); ?>
<?php get_footer(); ?>