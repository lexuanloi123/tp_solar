<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<meta name="google-site-verification" content="<?php echo _opt('google_verification'); ?>" />
	<title><?php is_front_page() ? _e('Trang chủ') : wp_title(''); ?> | <?php bloginfo('name'); ?></title>
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<?php wp_head(); ?>
	<?php get_template_part('zkw_dynamic_css'); ?>
	<?php _kw_get_lib('fancybox') ?>
	<?php _kw_get_lib('swiper') ?>
</head>

<body <?php body_class(); ?>>

	<div class="full-row full-header-top">

		<div class="inner-header-top inner-container">

			<p class="text_header"><?php echo _opt('text_top_header') ?></p>

		</div>

	</div>

	<header class="full-row full-header">

		<div class="inner-header inner-container">

			<div class="row">

				<div class="col l-3 m-4 c-4">

					<div class="header-logo">

						<?php if (_opt('logo')) {

							$src_logo = _opt('logo');

						} else {

							$src_logo = get_template_directory_uri() . '/css/images/no-logo.png';

						} ?>

						<a href="<?php echo esc_url(home_url('/')); ?>"
							title="<?php echo esc_attr(bloginfo('name')); ?>"><img class="site-logo"
								src="<?php echo $src_logo; ?>" title="<?php echo esc_attr(bloginfo('name')); ?>"
								alt="<?php echo esc_attr(bloginfo('name')); ?>" /></a>
					</div>
				</div>

				<div class="col l-9 m-8 c-8">

					<div class="list_header_right">

						<div class="header-search">

							<form role="search" method="get" class="searchform"
								action="<?php echo esc_url(home_url('/')); ?>">

								<input id="search-form" type="text" value="" name="s" class="app_search search-field"
									placeholder="<?php echo __('Tìm kiếm sản phẩm'); ?>" autocomplete="off" />

								<input type="hidden" name="post_type" value="product" />

								<button type="submit" class="search-submit" value=""><i
										class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>

								<div class="search-suggestions" style="display: none;"></div>

							</form>

						</div>

						<?php if (_opt('text_hotline_header')) { ?>

							<div class="box_hotline_header">

								<a href="<?php echo _opt('link_text_hotline_header') ?>" class="link_hotline_header">

									<div class="border_item_header">

										<div class="bor_i_header"><i class="fa-solid fa-phone"></i></div>

										<span><?php echo _opt('text_hotline_header') ?></span>
									</div>

								</a>
							</div>

						<?php } ?>

						<?php if (_opt('text_dl_header')) { ?>

							<div class="box_hotline_header">

								<a href="<?php echo _opt('link_text_dl_header') ?>" class="link_hotline_header">

									<div class="border_item_header">

										<div class="bor_i_header"><i class="fa-solid fa-location-dot"></i></div>

										<span><?php echo _opt('text_dl_header') ?></span>
									</div>

								</a>
							</div>

						<?php } ?>


						<div class="box_user">

							<a href="/my-account/" class="link_user">

								<i class="fa-regular fa-circle-user"></i>

							</a>

						</div>

						<div class="box_cart">

							<a href="/cart/" class="link_cart">

								<i class="fa-solid fa-cart-shopping"></i>

							</a>

							<?php

							global $woocommerce;

							echo "<span class='count-cart'>" . $woocommerce->cart->cart_contents_count . "</span>";
							?>
						</div>

					</div>


				</div>
			</div>


		</div>

	</header>

	<div class="full-row full_menu">

		<div class="inner-header inner-container">

			<div class="main-menu">

				<?php wp_nav_menu(array('theme_location' => 'max_mega_menu_1')); ?>

			</div>

		</div>
	</div>