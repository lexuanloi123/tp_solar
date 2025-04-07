<?php // File này cho trang home ?>

<?php get_header(); ?>

<?php if (_opt('tat_1') === true) { ?>

	<div class="full-row full-content_banner">

		<div class="banner_home">

			<a href="<?php echo _opt('link_banner_home') ?>" class=""><img src="<?php echo _opt('banner_home') ?>"
					alt=""></a>
		</div>

	</div>

<?php } ?>

<?php if (_opt('tat_2') === true) { ?>

	<div class="full-row full-content_slider">

		<div id="primary" class="inner-content inner-container">

			<div class="slider_home">

				<div class="swiper mySwiper mySwiper_slider_home">

					<div class="swiper-wrapper">

						<?php for ($i = 1; $i <= _opt('sl_slider_home'); $i++) { ?>

							<div class="swiper-slide">

								<a class="link_slider" href="<?php echo _opt('link_img_slider_' . $i) ?>">

									<img class="img_slider" src="<?php echo _opt('img_slider_' . $i) ?>" alt="">

								</a>

							</div>

						<?php } ?>

					</div>

					<div class="swiper-button-next swiper-button-next_slider"><i class="fa-solid fa-chevron-right"></i>
					</div>

					<div class="swiper-button-prev swiper-button-prev_slider"><i class="fa-solid fa-chevron-left"></i></div>
				</div>
			</div>

		</div>

	</div>

<?php } ?>

<?php if (_opt('tat_3') === true) { ?>

	<div class="full-row full-content_guarantee">

		<div id="primary" class="inner-content inner-container">

			<div class="content_guarantee">

				<div class="row row_gap">

					<?php for ($i = 1; $i <= _opt('sl_bh_home'); $i++) { ?>

						<div class="col l-3 m-6 c-6">

							<div class="item_gua">

								<img src="<?php echo _opt('img_gua_' . $i) ?>" alt="">

								<span class="text_gua"><?php echo _opt('link_img_gua_' . $i) ?></span>
							</div>
						</div>

					<?php } ?>

				</div>
			</div>

		</div>

	</div>

<?php } ?>

<?php if (_opt('tat_4') === true) { ?>

	<div class="full-row full-content_cate">

		<div id="primary" class="inner-content inner-container">

			<div class="box_cate_home">

				<div class="text_cate_home"><?php echo _opt('title_cate_home') ?></div>

				<div class="list_cate">


					<?php $args = array(
						'taxonomy' => 'product_cat',

						'hide_empty' => false,
					);
					$result = get_terms($args); ?>


					<?php foreach ($result as $cat) {
						if ('Uncategorized' !== $cat->name) {

							$term_link = get_term_link($cat, 'product_cat');

							$cat_thumb_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);

							$shop_catalog_img_arr = wp_get_attachment_image_src($cat_thumb_id, 'shop_catalog');

							$cat_img = $shop_catalog_img_arr[0];

							?>
							<div class="item_cate_pro">

								<a href="<?php echo $term_link; ?>">

									<div class="thumnail_cate_pro">

										<img class="img_cate" src="<?php echo $cat_img; ?>" alt="">
									</div>

									<div class="title_cate_pro">

										<?php echo $cat->name; ?>

									</div>
								</a>
							</div>
							<?php
						}
					} ?>




				</div>
			</div>

		</div>

	</div>

<?php } ?>

<?php if (_opt('tat_5') === true) { ?>

	<div class="full-row full-content_video">

		<div id="primary" class="inner-content inner-container">

			<div class="box_video">

				<div class="text_cate_home"><?php echo _opt('title_video_home') ?></div>

				<div class="list_video">

					<div class="swiper mySwiper mySwiper_video">

						<div class="swiper-wrapper">

							<?php $category_id = _opt('cate_video');


							$args = array(
								'post_type' => 'post',

								'posts_per_page' => _opt('sl_video'),

								'tax_query' => array(
									array(
										'taxonomy' => 'category',

										'field' => 'id',

										'terms' => $category_id,

										'operator' => 'IN',
									),
								),
								'orderby' => 'date',

								'order' => 'DESC',
							);

							$query = new WP_Query($args);

							if ($query->have_posts()):

								$counter = 0;
								while ($query->have_posts()):

									$query->the_post();

									$post_id = get_the_ID();

									$counter++;
									?>
									<div class="swiper-slide">

										<div class="item_video_home">

											<a class="fancybox" data-fancybox="video-slider"
												data-src="#video-<?php echo $post_id; ?>" href="">

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
									</div>
									<?php
								endwhile;
							else:
								echo '<p>Không có trong danh mục này.</p>';
							endif;

							wp_reset_postdata();
							?>

						</div>

						<div class="swiper-button-next swiper-button-next_video"><i class="fa-solid fa-chevron-right"></i>
						</div>
						<div class="swiper-button-prev swiper-button-prev_video"><i class="fa-solid fa-chevron-left"></i>
						</div>
					</div>


				</div>

			</div>

		</div>

	</div>

<?php } ?>

<?php if (_opt('tat_6') === true) { ?>

	<div class="full-row full-content_sale">

		<div id="primary" class="inner-content inner-container">

			<div class="box_sale">

				<div class="box_title_sale">

					<div class="row">

						<div class="col l-3 m-3 c-12">

							<div class="left_sale">

								<a href="<?php echo _opt('link_title_sale_home') ?>">

									<img class="img_sale"
										src="<?php echo bloginfo('template_url') . '/css/images/flash.webp'; ?>" alt="">

									<span class="text_sale"><?php echo _opt('title_sale_home') ?></span></a>
							</div>
						</div>

						<div class="col l-6 m-6 c-12">

							<div class="text_center_sale"><?php echo _opt('nd_sale') ?></div>

						</div>
					</div>
				</div>

				<div class="bor_list_sale">

					<div class="swiper mySwiper mySwiper_list_sale">

						<div class="swiper-wrapper">

							<?php
							$tax_query[] = array(

								'taxonomy' => 'product_visibility',

								'field' => 'name',

								'terms' => 'featured',

								'operator' => 'IN',
							); ?>
							<?php $args = array(

								'post_type' => 'product',

								'posts_per_page' => 20,

								'ignore_sticky_posts' => 1,

								'tax_query' => $tax_query
							);

							$query = new WP_Query($args);

							if ($query->have_posts()) {

								while ($query->have_posts()) {
									echo '<div class="swiper-slide ">';
									echo '<ul class="item_pro_single">';
									$query->the_post();
									wc_get_template_part('content', 'product');
									echo '</ul>';
									echo '</div>';

								}


								wp_reset_postdata();
							} else {
								echo 'Không có sản phẩm nào.';
							}

							?>
						</div>


					</div>
				</div>
			</div>
		</div>

	</div>

<?php } ?>

<?php if (_opt('tat_7') === true) { ?>

	<?php for ($i = 1; $i <= _opt('sl_img_pro'); $i++) { ?>

		<div class="full-row full-content_img_left">

			<div id="primary" class="inner-content inner-container">

				<div class="box_img_left">

					<div class="row row_gap">

						<div class="col l-12 m-12 c-12">

							<div class="box_title_pro_home">

								<?php $category_id = _opt('cate_img_' . $i);


								$category = get_term($category_id, 'product_cat');

								if ($category && !is_wp_error($category)) {

									$category_name = $category->name;

									$category_link = get_term_link($category);

									echo '<a href="' . esc_url($category_link) . '">';

									echo '<div class="text_cate_home">' . esc_attr($category_name) . ' </div>';

									echo '</a>';

									echo '<a href="' . esc_url($category_link) . '">';

									echo '<span>Xem thêm</span>';

									echo '</a>';


								} ?>


							</div>
						</div>

						<div class="col l-3 m-0 c-0">

							<div class="img_left_content">

								<a class="sitdown" href="<?php echo _opt('link_img_cate_1_' . $i) ?>"><img
										src="<?php echo _opt('img_cate_1_' . $i) ?>" alt=""></a>

								<a class="sitdown" href="<?php echo _opt('link_img_cate_1_' . $i) ?>"><img
										src="<?php echo _opt('img_cate_2_' . $i) ?>" alt=""></a>
							</div>
						</div>

						<div class="col l-9 m-12 c-12">

							<div class="box_pro_columns_4">
								<?php echo do_shortcode('[products limit="8" columns="4" category="' . _opt('cate_img_' . $i) . '" cat_operator="AND"]') ?>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>

	<?php } ?>

<?php } ?>

<?php if (_opt('tat_8') === true) { ?>

	<?php for ($i = 1; $i <= _opt('sl_pro_list'); $i++) { ?>

		<div class="full-row full-content_pro_list">

			<div id="primary" class="inner-content inner-container">

				<div class="box_pro_list">

					<div class="box_title_pro_home">

						<?php $category_id = _opt('cate_pro_list_' . $i);


						$category = get_term($category_id, 'product_cat');

						if ($category && !is_wp_error($category)) {

							$category_name = $category->name;

							$category_link = get_term_link($category);

							echo '<a href="' . esc_url($category_link) . '">';

							echo '<div class="text_cate_home">' . esc_attr($category_name) . ' </div>';

							echo '</a>';

							echo '<a href="' . esc_url($category_link) . '">';

							echo '<span>Xem thêm</span>';

							echo '</a>';


						} ?>


					</div>

					<div class="pro_list">

						<?php echo do_shortcode('[products limit="12" columns="6" category="' . _opt('cate_pro_list_' . $i) . '" cat_operator="AND"]') ?>

					</div>

				</div>

			</div>

		</div>

	<?php } ?>

<?php } ?>

<?php if (_opt('tat_9') === true) { ?>

	<div class="full-row full-content_we">

		<div id="primary" class="inner-content inner-container">

			<div class="box_we">

				<div class="text_cate_home"><?php echo _opt('title_we') ?></div>

				<div class="list_we">

					<div class="swiper mySwiper mySwiper_we">

						<div class="swiper-wrapper">

							<?php for ($i = 1; $i <= _opt('sl_we'); $i++) { ?>

								<div class="swiper-slide">

									<a href="<?php echo _opt('link_img_we_' . $i) ?>" class="link_we">

										<img src="<?php echo _opt('img_we_' . $i) ?>" alt="" class="img_we">

									</a>
								</div>

							<?php } ?>

						</div>

					</div>
				</div>
			</div>

		</div>

	</div>

<?php } ?>

<?php if (_opt('tat_10') === true) { ?>

	<div class="full-row full-content_client">

		<div id="primary" class="inner-content inner-container">

			<div class="box_client">

				<div class="text_cate_home"><?php echo _opt('title_client') ?></div>

				<div class="list_client">

					<div class="swiper mySwiper mySwiper_client">

						<div class="swiper-wrapper">

							<?php for ($i = 1; $i <= _opt('sl_client'); $i++) { ?>

								<div class="swiper-slide">

									<div class="item_client">

										<div class="top_client">

											<img src="<?php echo _opt('img_client_' . $i) ?>" alt="" class="img_client">

											<div class="full_title_client">

												<strong><?php echo _opt('ten_client_' . $i) ?></strong>

												<span><?php echo _opt('nghe_client_' . $i) ?></span>
											</div>
										</div>

										<div class="content_client"><?php echo _opt('content_client_' . $i) ?><i
												class="fa-solid fa-quote-right"></i>
										</div>

									</div>
								</div>

							<?php } ?>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

<?php } ?>

<?php if (_opt('tat_11') === true) { ?>

	<div class="full-row full-content_img">

		<div id="primary" class="inner-content inner-container">

			<div class="box_img">

				<div class="text_cate_home"><?php echo _opt('title_img_home') ?></div>

				<div class="list_img_home">

					<div class="swiper mySwiper mySwiper_img">

						<div class="swiper-wrapper">

							<?php for ($i = 1; $i <= _opt('sl_img_home'); $i++) { ?>

								<div class="swiper-slide">

									<a href="<?php echo _opt('img_home_' . $i) ?>" data-fancybox="product-gallery"
										class="link_img_home">

										<img src="<?php echo _opt('img_home_' . $i) ?>" alt="" class="img_home">
									</a>
								</div>

							<?php } ?>

						</div>

					</div>
				</div>
			</div>

		</div>

	</div>

<?php } ?>

<?php if (_opt('tat_12') === true) { ?>

	<div class="full-row full-content_post">

		<div id="primary" class="inner-content inner-container">

			<div class="box_post">

				<div class="box_title_pro_home">

					<?php $category_id = _opt('cate_post_home');


					$category = get_term($category_id, 'category');

					if ($category && !is_wp_error($category)) {

						$category_name = $category->name;

						$category_link = get_term_link($category);

						echo '<a href="' . esc_url($category_link) . '">';

						echo '<div class="text_cate_home">' . esc_attr($category_name) . ' </div>';

						echo '</a>';

						echo '<a href="' . esc_url($category_link) . '">';

						echo '</a>';


					} ?>


				</div>

				<div class="content_list_post_home">



					<?php $category_id = _opt('cate_post_home');


					$args = array(
						'post_type' => 'post',

						'posts_per_page' => 5,

						'tax_query' => array(
							array(
								'taxonomy' => 'category',

								'field' => 'id',

								'terms' => $category_id,

								'operator' => 'IN',
							),
						),
						'orderby' => 'date',

						'order' => 'DESC',
					);

					$query = new WP_Query($args);

					if ($query->have_posts()):

						while ($query->have_posts()):

							$query->the_post(); ?>

							<div class="item_post_home">

								<a href="<?php the_permalink(); ?>">

									<div class="bor_img_post_home">

										<?php the_post_thumbnail('full'); ?>

									</div>

									<div class="bor_full_content">

										<h3 class="title_post_home"><?php the_title(); ?></h3>

										<div class="new-date"><?php echo get_the_modified_date('d/m/Y'); ?></div>

										<?php the_excerpt(); ?>

									</div>
								</a>

							</div>

						<?php endwhile;


					else:
						echo '<p>Không có trong danh mục này.</p>';
					endif;

					wp_reset_postdata();
					?>

					<div class="xt_post">

						<?php $category_id = _opt('cate_post_home');


						$category = get_term($category_id, 'category');

						if ($category && !is_wp_error($category)) {

							$category_name = $category->name;

							$category_link = get_term_link($category);

							echo '<a href="' . esc_url($category_link) . '">';

							echo '<div class="text_post_xt">Xem thêm</div>';

							echo '</a>';


						} ?>


					</div>

				</div>
			</div>

		</div>

	</div>

<?php } ?>


<?php get_footer(); ?>


