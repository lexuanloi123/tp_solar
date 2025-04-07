<footer class="full-row full-footer">

	<div class="inner-footer inner-container">

		<div class="row row_gap">

			<div class="col l-4 m-6 c-12">

				<div class="footer_cty">

					<a href="/">
						<img src="<?php echo _opt('logo_footer') ?>" alt="" class="logo_footer">
					</a>

					<p class="text_cty_footer"><?php echo _opt('text_cty_footer') ?></p>


					<?php for ($i = 1; $i <= _opt('sl_nd_cty'); $i++) { ?>

						<a href="<?php echo _opt('link_nd_cty_footer_' . $i) ?>">

							<div class="item_cty_footer"><?php echo _opt('nd_cty_footer_' . $i) ?></div>

						</a>
					<?php } ?>
				</div>
			</div>

			<div class="col l-3 m-6 c-12">

				<div class="hotline_footer">

					<?php for ($i = 1; $i <= _opt('sl_sdt_footer'); $i++) { ?>

						<p class="text_ht_footer"><?php echo _opt('title_sdt_footer_' . $i) ?> <br> <a
								href="<?php echo _opt('link_sdt_footer_' . $i) ?>"><?php echo _opt('sdt_footer_' . $i) ?></a>
						</p>

					<?php } ?>
				</div>
			</div>

			<div class="col l-2 m-6 c-12">

				<div class="menu_footer">

					<p class="text_cs_footer"><?php echo _opt('title_cs_footer') ?></p>

					<?php wp_nav_menu(array('theme_location' => 'footer_1')); ?>
				</div>
			</div>

			<div class="col l-3 m-6 c-12">

				<div class="pt_footer">

					<p class="text_pt_footer"><?php echo _opt('title_tt_footer') ?></p>

					<div class="list_pt">

						<img src="<?php echo _opt('img_tt_1') ?>" alt="">

						<img src="<?php echo _opt('img_tt_2') ?>" alt="">
					</div>

					<a href="<?php echo _opt('link_img_tt_ct') ?>" class="link_ct">
						<img src="<?php echo _opt('img_tt_ct') ?>" alt="">
					</a>
				</div>
			</div>

			<?php if (_opt('tat_kn') === true) { ?>

				<div class="col l-12 m-12 c-12">

					<div class="footer_kn">

						<p class="text_kn"><?php echo _opt('title_kn_footer') ?></p>

						<div class="list_kn">

							<?php for ($i = 1; $i <= _opt('sl_kn_footer'); $i++) { ?>

								<a class="sitdown" target="_blank" href="<?php echo _opt('link_img_kn_' . $i) ?>"><img
										src="<?php echo _opt('img_kn_' . $i) ?>" alt=""></a>

							<?php } ?>
						</div>
					</div>
				</div>

			<?php } ?>


			<?php if (_opt('tat_hd') === true) { ?>

				<div class="col l-12 m-12 c-12">

					<div class="link_bt_footer">

						<?php for ($i = 1; $i <= _opt('sl_hd_footer'); $i++) { ?>

							<p class="text_link_footer">
								<a href="<?php echo _opt('link_text_hd_' . $i) ?>"><?php echo _opt('text_hd_' . $i) ?></a>
							</p>

						<?php } ?>
					</div>
				</div>

			<?php } ?>


		</div>
	</div>

</footer>

<div class="full-row full-footer-bottom">

	<div class="inner-footer-bottom inner-container">

		<p class="text_copy"><?php echo _opt('text_copy_right') ?></p>

	</div>

</div>



<!-- <script>
	if (jQuery(window).width() <= 600) {

		jQuery('.footer-content').hide();

		jQuery('.footer-box h2').append('<i id="show-sft" class="fa fa-plus"></i><i id="hide-sft" class="fa fa-minus"></i>');

		setTimeout(function () {

			jQuery('.footer-box h2').on('click', function () {

				if (jQuery(this).is('.active-sft')) {

					jQuery(this).removeClass('active-sft').siblings('.footer-content').slideToggle(300);

				} else {

					jQuery(this).addClass('active-sft').siblings('.footer-content').slideToggle(300);
				}
			});

		}, 1000);
	}
</script> -->

<?php _kw_get_lib('font-awesome-6'); ?>

<?php get_template_part('zkw_addon'); ?>

<?php wp_footer(); ?>

</body>

</html>