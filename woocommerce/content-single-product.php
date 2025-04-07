<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>

	<div class="title_single_product"><?php the_title() ?></div>

	<div class="content_thumnail_product">

		<div class="row row_gap">

			<div class="col l-4 m-6 c-12">

				<div class="bor_sale">

					<div class="slider_img">

						<div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
							class="swiper mySwiper2 mySwiper2_product">
							<div class="swiper-wrapper">
								<div class="swiper-slide slider_top">
									<?php
									global $product;

									$product_image_url = wp_get_attachment_image_url($product->get_image_id(), 'full');

									if ($product_image_url) {

										echo '<a class="bor_img" data-fancybox="product-gallery" href="' . esc_url($product_image_url) . '"><img class="img_product_top" src="' . esc_url($product_image_url) . '" alt="' . esc_attr(get_the_title()) . '" /></a>';
									}

									?>
								</div>

								<?php
								global $product;

								$product_gallery_ids = $product->get_gallery_image_ids();

								if ($product_gallery_ids) {

									foreach ($product_gallery_ids as $gallery_id) {
										echo '<div class="swiper-slide slider_top">';
										$gallery_image_url = wp_get_attachment_image_url($gallery_id, 'full');
										echo '<a class="bor_img" data-fancybox="product-gallery" href="' . esc_url($gallery_image_url) . '"><img class="img_product_top" src="' . esc_url($gallery_image_url) . '" alt="' . esc_attr(get_the_title()) . '" /></a>';
										echo '</div>';
									}

								}

								?>

							</div>

							<div class="swiper-button-next swiper-button-next_product"><i
									class="fa-sharp fa-solid fa-chevron-right"></i></div>

							<div class="swiper-button-prev swiper-button-prev_product"><i
									class="fa-sharp fa-solid fa-chevron-left"></i></div>
						</div>


						<div thumbsSlider="" class="swiper mySwiper mySwiper_product">
							<div class="swiper-wrapper">
								<div class="swiper-slide slider_pro">
									<?php
									global $product;

									$product_image_url = wp_get_attachment_image_url($product->get_image_id(), 'full');

									if ($product_image_url) {

										echo '<img class="img_product_bt" src="' . esc_url($product_image_url) . '" alt="' . esc_attr(get_the_title()) . '" />';
									}

									?>
								</div>

								<?php
								global $product;

								$product_gallery_ids = $product->get_gallery_image_ids();

								if ($product_gallery_ids) {

									foreach ($product_gallery_ids as $gallery_id) {
										echo '<div class="swiper-slide slider_pro">';
										$gallery_image_url = wp_get_attachment_image_url($gallery_id, 'full');
										echo '<img class="img_product_bt" src="' . esc_url($gallery_image_url) . '" alt="' . esc_attr(get_the_title()) . '" />';
										echo '</div>';
									}

								}

								?>

							</div>


						</div>

					</div>

					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action('woocommerce_before_single_product_summary');
					?>
				</div>


			</div>

			<div class="col l-5 m-6 c-12">

				<div class="summary entry-summary summary_product">
					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action('woocommerce_single_product_summary');
					?>
				</div>

				<?php if (_opt('form_pro_lh')) { ?>

					<div class="form_single_pro">

						<span class="text_form_sp">Đặt hàng nhanh</span>

						<form id="from_single_pro" method="GET" action="">
							<input class="input_dh_single" type="text" name="customer_name" autocomplete="off"
								placeholder="Họ tên *" />

							<input class="input_dh_single" type="text" name="customer_hotline" autocomplete="off"
								placeholder="Số điện thoại *" />

							<input class="input_dh_single" type="hidden" name="title_product" value="<?php the_title(); ?>" />

							<input class="input_dh_single" type="hidden" name="date" id="currentDate" />

							<button type="button" id="submit-form_pro">Đặt hàng</button>
						</form>

						<!-- Popup message -->
						<div id="popup-modal">

							<div id="loader" class="loader" style="margin: 20px auto;"></div>

							<p id="popup-message" style="display: none;"></p>

						</div>

						<div id="overlay"></div>


					</div>

				<?php } ?>

			</div>

			<div class="col l-3 m-12 c-12">

				<?php if (_opt('sdt_pro_lh')) { ?>

					<div class="hotline_single">

						<img src="https://bizweb.dktcdn.net/100/463/111/themes/889675/assets/customer-service.png?1728877253274"
							alt="">

						<p class="text_hotline_single"><?php echo _opt('title_pro_lh') ?>
							<a href="<?php echo _opt('link_sdt_pro_lh') ?>"><?php echo _opt('sdt_pro_lh') ?></a>
						</p>
					</div>

				<?php } ?>


				<div class="tr_th_single_pro">

					<?php

					global $product;

					$product_id = $product->get_id();
					$sku = $product->get_sku();


					$categories = [];
					$terms = get_the_terms($product_id, 'product_cat');
					if ($terms && !is_wp_error($terms)) {
						$categories = wp_list_pluck($terms, 'name');
					}


					$stock_status = $product->get_stock_status();
					$stock_status_label = '';

					if ($stock_status === 'instock') {
						$stock_status_label = 'Còn hàng';
					} elseif ($stock_status === 'outofstock') {
						$stock_status_label = 'Hết hàng';
					} elseif ($stock_status === 'onbackorder') {
						$stock_status_label = 'Đặt hàng lại';
					}


					$brand = $product->get_attribute('thuong-hieu');

					echo '<div class="box_sku">';
					echo '<p class="product-sku sku_cat_tag"><strong>Mã sản phẩm: </strong> ' . $sku . '</p>';

					// echo '<p class="product-sku sku_cat_tag"><strong>Danh mục</strong>: ' . implode(', ', $categories) . '</p>';
					if (!empty($brand)) {
						echo '<p class="product-sku sku_cat_tag"><strong>Thương hiệu: </strong> ' . esc_html($brand) . '</p>';
					}
					echo '<p class="product-sku sku_cat_tag"><strong>Trạng thái: </strong> ' . $stock_status_label . '</p>';
					echo '</div>';
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="content_iner_product">

		<div class="row row_gap">

			<div class="col l-9 m-12 c-12">

				<div class="mota_single_pro">

					<div class="title_mota">Thông tin chi tiết</div>

					<div class="item_mota">

						<?php the_content() ?>

					</div>
				</div>
			</div>

			<div class="col l-3 m-12 c-12 order_flex">

				<div class="item_ts">

					<div class="title_mota">Thông số kĩ thuật</div>

					<div class="bor_tab_ts">

						<?php do_action('woocommerce_product_additional_information', $product); ?>

					</div>

					<div class="ts_popup">
						<a data-fancybox data-src="#aaa" href="" class="text_tspopup">Xem chi tiết cấu hình</a>

						<div id="aaa" style="display: none;" class="form_ts_none">
							<div class="title_mota">Thông số kĩ thuật</div>

							<div class="bor_popup_ts">
								<?php do_action('woocommerce_product_additional_information', $product); ?>
							</div>

						</div>
					</div>


				</div>
			</div>

			<div class="col l-12 m-12 c-12">

				<div class="sp_lq_product">

					<div class="title_mota">Sản phẩm tương tự</div>

					<div class="bor_list_swiper ">

						<div class="swiper mySwiper mySwiper_list">

							<div class="swiper-wrapper">

								<?php
								global $product;

								$product_categories = wc_get_product_term_ids($product->get_id(), 'product_cat');
								$product_category = reset($product_categories);

								if ($product_category) {
									$args = array(
										'post_type' => 'product',
										'posts_per_page' => 12,
										'post__not_in' => array($product->get_id()),
										'paged' => $paged,
										'tax_query' => array(
											array(
												'taxonomy' => 'product_cat',
												'field' => 'term_id',
												'terms' => $product_category,
											),
										),
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
								}
								?>
							</div>

							<!-- <div class="swiper-button-next swiper-next_single"><i class="fa-solid fa-chevron-right"></i>
							</div>
							<div class="swiper-button-prev swiper-prev_single"><i class="fa-solid fa-chevron-left"></i>
							</div> -->
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	// do_action('woocommerce_after_single_product_summary');
	?>
</div>

<?php do_action('woocommerce_after_single_product'); ?>