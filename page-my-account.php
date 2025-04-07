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
			<?php
			if (is_user_logged_in()) {
				echo do_shortcode('[woocommerce_my_account]');

			} else {

				wp_redirect(home_url('/login'));
			}
			?>


		</div>


	</div>

</div>

<?php get_footer(); ?>