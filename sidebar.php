<div class="sidebar-one">

	<div class="control-sidebar"><i class="sidebar-fa fa fa-bars"></i></div>

	<script>

		setTimeout(function () {

			jQuery('.sidebar-one .control-sidebar').on('click', function () {

				if (jQuery(this).is('.active')) {

					jQuery(this).removeClass('active');

					jQuery(this).parent().animate({ left: '-280px' }, 350);

				} else {

					jQuery(this).addClass('active');

					jQuery(this).parent().animate({ left: '0' }, 350);

				}
			});
		}, 1000);
	</script>
	<div class="sidebar-content">

		<?php if (is_product_category() || is_shop()) { ?>

			<div class="block-sidebar">

				<div class="block-content">

					<?php dynamic_sidebar('keyweb_filter'); ?>

				</div>

			</div>

		<?php } ?>

	</div>
</div>

<script>
	jQuery(document).ready(function () {
		jQuery('.woocommerce .widget_price_filter .price_slider_amount .button').text('Áp dụng');
		
	});
</script>