<?php // File này cho trang page ?>

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

<div class="full-row full-content_page">

    <div id="primary" class="inner-content inner-container">


        <div class="content_page">

            <div class="title_page">

                <?php $page_title = get_the_title();

                echo $page_title; ?>

            </div>

            <div class="item_page_tt">

                <div class="row row_gap">

                    <?php for ($i = 1; $i <= _opt('sl_box_ht'); $i++) { ?>

                        <div class="col l-3 m-6 c-12">

                            <div class="content_ch <?php echo 'content_ch_'.$i; ?>">

                                <div class="text_ch"><?php echo _opt('title_ht_' . $i) ?></div>

                                <span><?php echo _opt('so_title_ht_' . $i) ?></span>

                            </div>

                        </div>

                    <?php } ?>
                </div>
            </div>

            <div class="content_map_tt">


                <div class="row row_gap">

                    <div class="col l-4 m-12 c-12">

                        <div class="map_tt_left">

                            <select name="tinh-thanh" id="tinh-thanh">

                                <?php $args = array(
                                    'taxonomy' => 'tinh-thanh',
                                    'hide_empty' => false,
                                );
                                $result = get_terms($args); ?>

                                <?php if (!empty($result)) {

                                    $first_cat = array_shift($result);
                                    ?>
                                    <option value="<?php echo esc_attr($first_cat->term_id); ?>" selected>
                                        <?php echo esc_html($first_cat->name); ?>
                                    </option>
                                    <?php
                                }

                                foreach ($result as $cat) {
                                    if ('Uncategorized' !== $cat->name) {
                                        ?>
                                        <option value="<?php echo esc_attr($cat->term_id); ?>">
                                            <?php echo esc_html($cat->name); ?>
                                        </option>
                                        <?php
                                    }
                                } ?>

                            </select>

                            <div id="post-results"></div>

                        </div>

                    </div>

                    <div class="col l-8 m-12 c-12">

                        <div class="map_tt_right">

                            <div id="map_page"></div>

                        </div>
                    </div>

                </div>


            </div>


        </div>


    </div>

</div>

<?php get_footer(); ?>

