<div class="sidebar-two">

	<div class="control-sidebar"><i class="sidebar-fa fa fa-bars"></i></div>

	<script>

		setTimeout(function () {

			jQuery('.sidebar-two .control-sidebar').on('click', function () {

				if (jQuery(this).is('.active')) {

					jQuery(this).removeClass('active');

					jQuery(this).parent().animate({ right: '-280px' }, 350);

				} else {

					jQuery(this).addClass('active');

					jQuery(this).parent().animate({ right: '0' }, 350);

				}

			});

		}, 1000);

	</script>

	<div class="text_cate_home">Chủ đề Hot</div>

	<div class="bor_sidebar_two">


		<?php $args = array(
			'taxonomy' => 'category',

			'hide_empty' => false,
		);
		$result = get_terms($args); ?>


		<?php foreach ($result as $cat) {
			if ('Uncategorized' !== $cat->name && 'Video' !== $cat->name && 'video' !== $cat->name) {

				$term_link = get_term_link($cat, 'category');

				$cat_img = $shop_catalog_img_arr[0];

				?>
				<div class="item_cate_post">

					<a href="<?php echo $term_link; ?>">

						<div class="thumnail_cate_post">

							<img class="" src="<?php echo bloginfo('template_url') . '/css/images/hot_ico.webp'; ?>" alt="">
						</div>

						<div class="title_cate_post">

							<?php echo $cat->name; ?>

						</div>
					</a>
				</div>
				<?php
			}
		} ?>

	</div>

</div>