<?php // File này cho trang post ?>

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


<div class="full-row full-content_single">

	<div id="primary" class="inner-content inner-container">

		<div class="box_single_post">

			<div class="row">

				<div class="col l-3 m-12 c-12"><?php get_sidebar('two'); ?></div>

				<div class="col l-9 m-12 c-12">

					<header class="entry-header_single">

						<?php the_title('<h4 class="archive-heading">', '</h4>'); ?>

					</header>

					<div class="entry-content_single">

						<?php

						if (have_posts()):
							while (have_posts()):
								the_post();
								the_content();

							endwhile;
						endif;

						?>
					</div>

					<div class="list_post_tag">
						<div class="text_cate_post"><i class="fa-solid fa-tags"></i>Tags: </div>

						<?php
						$post_tags = get_the_tags();

						if ($post_tags) {
							echo '<ul class="list_tag_post">';
							foreach ($post_tags as $tag) {
								$tag_link = get_tag_link($tag->term_id);
								echo '<li><a href="' . esc_url($tag_link) . '">' . esc_html($tag->name) . '</a></li>';
							}
							echo '</ul>';
						} else {
							echo 'No tags found.';
						}
						?>
					</div>

					<div class="list_post_lq">

						<div class="title_lq_post">Bài viết liên quan</div>

						<div class="swiper mySwiper mySwiper_post_lq">

							<div class="swiper-wrapper">

								<?php
								$current_post_id = get_the_ID();

								if (is_category()) {

									$current_cat = get_queried_object();

									$cat_id = $current_cat->term_id;

								} elseif (is_single()) {

									$categories = get_the_category();

									$cat_id = !empty($categories) ? $categories[0]->term_id : 0;

								} else {
									$cat_id = 0;
								}

								$args = array(
									'post_status' => 'publish',

									'posts_per_page' => 6,

									'cat' => $cat_id,

									'post__not_in' => array($current_post_id),
								);
								?>

								<?php $getposts = new WP_Query($args); ?>

								<?php global $wp_query;

								$wp_query->in_the_loop = true; ?>

								<?php if ($getposts->have_posts()): ?>

									<?php while ($getposts->have_posts()):

										$getposts->the_post(); ?>

										<div class="swiper-slide">

											<div class="right_bar_ar">
												<a href="<?php the_permalink(); ?>">

													<div class="bor_img_post_lq">

														<?php the_post_thumbnail('full'); ?>

													</div>

													<div class="content_lq">

														<h2 class="text_lq"><?php the_title(); ?></h2>

														<?php the_excerpt(); ?>
													</div>

												</a>

											</div>

										</div>

									<?php endwhile; ?>

								<?php else: ?>

									<p>Không có bài viết nào.</p>

								<?php endif; ?>

								<?php wp_reset_postdata(); ?>

							</div>

							<div class="swiper-button-next swiper-button-next_single"><i
									class="fa-solid fa-chevron-right"></i></div>
							<div class="swiper-button-prev swiper-button-prev_single"><i
									class="fa-solid fa-chevron-left"></i></div>

						</div>

					</div>


				</div>

			</div>

		</div>

	</div>

</div>

<div class="full-row full-content_comment">

	<div id="primary" class="inner-content inner-container">


		<div class="review_single"><?php echo comments_template(); ?></div>
	</div>

</div>

<?php get_footer(); ?>

<script>
	document.addEventListener('DOMContentLoaded', function () {

		var swiper = new Swiper(".mySwiper_post_lq", {

			slidesPerView: 2,

			spaceBetween: 20,

			autoplay: {
				delay: 5000,

				disableOnInteraction: false,
			},

			breakpoints: {
				700: {
					slidesPerView: 1,
					spaceBetween: 20,
				},
			}

		});


	});
</script>

<script>
	jQuery(document).ready(function () {

		jQuery('p.comment-form-cookies-consent label').text('Lưu thông tin');

		jQuery('.review_single input#submit').val('Gửi bình luận');

		jQuery('h3#reply-title').text('Viết bình luận');

		
		
	});
</script>