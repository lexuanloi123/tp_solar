<style type="text/css">
	<?php if (_opt('css_layout_width') != '') { ?>

		.inner-container {

			max-width:
				<?php echo _opt('css_layout_width'); ?>
				!important;

		}

	<?php } ?>

	<?php if (_opt('css_fixed_menu') === true) { ?>

		@media only screen and (min-width: 1100px) {

			.full-header {

				position: sticky;

				top: 0;

			}

		}

	<?php } ?>

	/* Màu chính */



	<?php if (_opt('css_main_color_header') != '') { ?>

		.full-header-top {
			background:
				<?php echo _opt('css_main_color_header'); ?>
				!important;
		}

		.border_item_header span,
		.box_user i,
		.box_cart i {
			color:
				<?php echo _opt('css_main_color_header'); ?>
				!important;
		}

	<?php } ?>


	<?php if (_opt('css_main_color_header_m') != '') { ?>


		.full_menu,
		.search-submit,
		span.count-cart {
			background:
				<?php echo _opt('css_main_color_header_m'); ?>
				!important;
		}

		.bor_i_header i {
			color:
				<?php echo _opt('css_main_color_header_m'); ?>
				!important;
		}

		#search-form {

			border: 1px solid
				<?php echo _opt('css_main_color_header_m'); ?>
				!important;
		}

	<?php } ?>


	<?php if (_opt('css_main_color_cd') != '') { ?>


		a.none_button_cart.button.product_type_simple.add_to_cart_button.ajax_add_to_cart,
		#bttop,
		.woocommerce .widget_price_filter .price_slider_amount .button,
		.summary.entry-summary.summary_product form.cart button.single_add_to_cart_button:hover,
		.item_post_home:first-child::after,
		.review_single input#submit,
		.woocommerce #respond input#submit.alt,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt,
		.woocommerce table.shop_table button.button,
		.post-item.selected,
		.post-item:hover,
		nav.woocommerce-MyAccount-navigation ul li.is-active a,
		nav.woocommerce-MyAccount-navigation ul li a:hover,
		a.woocommerce-button.button.view,
		button.bt_green.button,
		p.full_sb_mk button.woocommerce-Button.button,
		.nav-links>span.page-numbers.current,
		.woocommerce nav.woocommerce-pagination ul li span.current {
			background:
				<?php echo _opt('css_main_color_cd'); ?>
				!important;
		}


		ul.yith-wcan-label.yith-wcan.yith-wcan-group li.chosen a,
		ul.yith-wcan-label.yith-wcan.yith-wcan-group a:hover,
		.summary.entry-summary.summary_product p.price,
		p.text_hotline_single a,
		.summary.entry-summary.summary_product form.cart button.single_add_to_cart_button i,
		.woocommerce table.shop_table td.product-name a,
		.title_page,
		.nav-links>a.page-numbers,
		ul.page-numbers li a {
			color:
				<?php echo _opt('css_main_color_cd'); ?>
				!important;
		}

		.block-filter {
			border-bottom: 2px solid
				<?php echo _opt('css_main_color_cd'); ?>
				!important;
		}

		ul.yith-wcan-label.yith-wcan.yith-wcan-group li.chosen a,
		ul.yith-wcan-label.yith-wcan.yith-wcan-group a:hover,
		.post-item,
		.woocommerce form.woocommerce-checkout .form-row input.input-text,
		.woocommerce form.woocommerce-checkout .form-row textarea,
		.woocommerce form.woocommerce-checkout .form-row select,
		.woocommerce form.woocommerce-checkout .form-row .select2-selection,
		.nav-links>span.page-numbers.current,
		.nav-links>a.page-numbers,
		.woocommerce nav.woocommerce-pagination ul li span.current,
		ul.page-numbers li a {
			border: 1px solid
				<?php echo _opt('css_main_color_cd'); ?>
				!important;
		}

		.summary.entry-summary.summary_product form.cart button.single_add_to_cart_button {
			border: 2px solid
				<?php echo _opt('css_main_color_cd'); ?>
				!important;
		}

		.woocommerce table.shop_table,
		.woocommerce table.shop_table td,
		.woocommerce table.shop_table tbody th,
		.woocommerce table.shop_table tfoot td,
		.woocommerce table.shop_table tfoot th {
			border-color:
				<?php echo _opt('css_main_color_cd'); ?>
				!important;
		}

	<?php } ?>

	<?php if (_opt('css_main_color_button') != '') { ?>


		.form_lh input.wpcf7-form-control.has-spinner.wpcf7-submit {
			background:
				<?php echo _opt('css_main_color_button'); ?>
				!important;
		}

		.title_lh {
			color:
				<?php echo _opt('css_main_color_button'); ?>
				!important;
		}

	<?php } ?>


	<?php if (_opt('css_main_color_tc') != '') { ?>

		ul.item_pro_single>li.product>a.woocommerce-LoopProduct-link.woocommerce-loop-product__link>span.price,
		.woocommerce ul.products li.product .price {
			color:
				<?php echo _opt('css_main_color_tc'); ?>
				!important;
		}

	<?php } ?>

	<?php if (_opt('css_main_color_sidebar') != '') { ?>

		.heading_filter {
			color:
				<?php echo _opt('css_main_color_sidebar'); ?>
				!important;
		}

		.woocommerce .widget_price_filter .price_slider_amount .button {
			background:
				<?php echo _opt('css_main_color_sidebar'); ?>
				!important;
		}

		.block-filter {
			border-bottom: 2px solid
				<?php echo _opt('css_main_color_sidebar'); ?>
				!important;
		}

	<?php } ?>



	<?php if (_opt('css_main_color') != '') { ?>

		.full-footer-bottom,

		.full-header-top,

		.search-submit,

		.heading_box,

		#menu-sidebar a:hover,



		.woocommerce ul.products li.product a.button.product_type_simple,

		.divider,

		input.wpcf7-form-control.wpcf7-submit,

		.woocommerce.widget_shopping_cart .buttons a.checkout {

			background:
				<?php echo _opt('css_main_color'); ?>
				!important;

		}

		#menu-sidebar a,

		h3.home_slogan,

		.home-box-category h3,

		.home-box-category p.view-all a,

		.home-box-du-an h3,

		.home-box-du-an-right h4 span,

		.home-box-du-an .swiper-slide h3,

		.woocommerce ul.products li.product-category .woocommerce-loop-category__title,
		.woocommerce ul.products li.product-category .woocommerce-loop-product__title,
		.woocommerce ul.products li.product-category h3,

		.home-box-tin-tuc h3,

		.home-box-tin-tuc h4,

		.home-box-kh-danhgia h3,

		.kh-danhgia-content,

		.tagcloud a,

		.block-sidebar .item-detail h4.title,

		.block-sidebar .item-detail .item-date,



		ul.yith-wcan-list li a,

		ul.yith-wcan-list li::before,

		h1.woocommerce-products-header__title.page-title,

		.woocommerce .woocommerce-breadcrumb a,

		.woocommerce ul.products li.type-product .woocommerce-loop-category__title,
		.woocommerce ul.products li.type-product .woocommerce-loop-product__title,
		.woocommerce ul.products li.type-product h3,

		.woocommerce div.product .product_title,

		section.related.products h2,

		.woocommerce .content-wrap .woocommerce-breadcrumb a,

		.lien-he-left h3,
		.lien-he-right h3,

		.content-lienhe h4,

		h4.archive-heading,

		.item_post h4,

		.woocommerce ul.cart_list li a span,
		.woocommerce ul.product_list_widget li a span,

		.woocommerce .woocommerce-mini-cart-item.mini_cart_item a {

			color:
				<?php echo _opt('css_main_color'); ?>
				!important;

		}

		.woocommerce ul.products li.product-category:hover,
		.woocommerce-page ul.products li.product-category:hover,

		#menu-sidebar a,

		.block-filter,

		.block-sidebar .item-post,

		.woocommerce ul.products li.type-product,
		.woocommerce-page ul.products li.type-product,

		.woocommerce ul.cart_list li img,
		.woocommerce ul.product_list_widget li img,

		.woocommerce .woocommerce-breadcrumb,

		.block-sidebar .item-images,

		.woocommerce ul.cart_list li,
		.woocommerce ul.product_list_widget li,

		.control-sidebar {

			border-color:
				<?php echo hex2rgba(_opt('css_main_color'), 0.6); ?>
				!important;

		}

	<?php } ?>

	/* Màu thứ cấp */

	<?php if (_opt('css_sub_color') != '') { ?>

		.full-footer,

		.woocommerce ul.products li.product-category:hover .woocommerce-loop-category__title,
		.woocommerce ul.products li.product-category:hover .woocommerce-loop-product__title,
		.woocommerce ul.products li.product-category:hover h3,

		.home-box-du-an .swiper-slide a:hover h3 {

			background:
				<?php echo _opt('css_sub_color'); ?>
				!important;

		}

	<?php } ?>

	/* Màu tương phản */

	<?php if (_opt('css_rev_color') != '') { ?>

		.heading_box {

			border-color:
				<?php echo _opt('css_rev_color'); ?>
				!important;

		}

		.home-box-kh-thanthiet h3,

		.home-box-category p.view-all,

		h3.home_slogan,

		.kh-thanthiet-img {

			border-color:
				<?php echo hex2rgba(_opt('css_rev_color'), 0.6); ?>
				!important;

		}

	<?php } ?>
</style>