<?php // File này cho các trang, category, achive, tag ?>

<?php get_header(); ?>

<div class="full-row full_product_yoast">

    <div class="full_yoast">

        <div id="primary" class="inner-content inner-container">

            <?php

            if (function_exists('yoast_breadcrumb')) {

                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }

            ?>

        </div>

    </div>

</div>


<?php
//  Lấy thông tin của danh mục hiện tại
$category = get_queried_object();
$category_id = $category->term_id; ?>


<div class="full-row full-content_ar_post_video">

    <div id="primary" class="inner-content inner-container">

        <main class="content_archive_post" role="main">

            <?php if (have_posts()) { ?>

                <div class="text_cate_home">

                    <?php $title = get_the_archive_title();

                    if (strpos($title, ':') !== false) {
                        $title_parts = explode(':', $title);
                        $title = trim(end($title_parts));
                    }
                    echo $title; ?>

                </div>

                <div class="entry-content_post_video">

                    <?php while (have_posts()):

                        the_post(); ?>

                        <div class="item_video_home">

                            <a class="fancybox" data-fancybox="video-slider" data-src="#video-<?php echo $post_id; ?>" href="">

                                <?php the_post_thumbnail(); ?>

                                <div class="back_play"></div>
                            </a>

                            <a href="<?php the_permalink(); ?>" class="link_single_youtube">

                                <p class="title_single"><?php the_title(); ?></p>
                            </a>


                            <div class="content_video" id="video-<?php echo $post_id; ?>" style="display: none;">

                                <figure>

                                    <div class="wp-block-embed__wrapper">

                                        <?php the_field('video'); ?>

                                    </div>

                                </figure>

                            </div>
                        </div>

                    <?php endwhile; ?>

                </div>

                <?php
                the_posts_pagination(array(
                    'mid_size' => 1,
                    'prev_text' => '<',
                    'next_text' => '>',
                ));
            } else {
                echo 'No post';
            }
            ?>
        </main>

    </div>

</div>

<?php get_footer(); ?>

