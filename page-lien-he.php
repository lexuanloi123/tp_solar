<?php // File này cho trang liên hệ ?>

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

			<div class="row row_gap">

				<div class="col l-6 m-12 c-12">

					<div class="left_lh">

						<div class="title_lh">
							<?php $page_title = get_the_title();

							echo $page_title; ?>
						</div>

						<?php for ($i = 1; $i <= _opt('sl_dc_lh'); $i++) { ?>

							<div class="item_dc_lh">

								<strong><?php echo _opt('ten_lh_' . $i) ?></strong>

								<a href="<?php echo _opt('link_nd_lh_' . $i) ?>"><?php echo _opt('nd_lh_' . $i) ?></a>

							</div>

						<?php } ?>

						<div class="text_lh"><?php echo _opt('nd_cn') ?></div>

						<div class="form_lh">

							<form id="from_page_lh" method="GET" action="">
								<input class="input_page_lh" type="text" name="name" autocomplete="off"
									placeholder="Họ tên *" />

								<input class="input_page_lh" type="text" name="hotline" autocomplete="off"
									placeholder="Số điện thoại *" />

								<input class="input_page_lh" type="text" name="email" autocomplete="off"
									placeholder="Email *" />

								<textarea class="textarea_page_lh" name="content" autocomplete="off"
									placeholder="Nội dung *"></textarea>

								<input class="input_page_lh" type="hidden" name="date" id="currentDate_lh" />

								<button type="button" id="submit-form_lh">Gửi liên hệ</button>
							</form>

							<!-- Popup message -->
							<div id="popup-modal">

								<div id="loader" class="loader" style="margin: 20px auto;"></div>

								<p id="popup-message" style="display: none;"></p>

							</div>

							<div id="overlay"></div>

						</div>
					</div>
				</div>

				<div class="col l-6 m-12 c-12">

					<div class="right_lh"><?php echo _opt('link_map') ?></div>

				</div>
			</div>

		</div>

	</div>

</div>

<?php get_footer(); ?>