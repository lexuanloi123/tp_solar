<?php // File này cho các trang, category, achive, tag ?>

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


<div class="full-row full-content_ar_sea">

	<div id="primary" class="inner-content inner-container">

		<main class="content_archive_post" role="main">

			<?php if (have_posts()) { ?>

				<div class="text_cate_home">

					<?php printf(__('Tìm kiếm: %s'), '<span>' . get_search_query() . '</span>'); ?>

				</div>

				<div class="entry-content_post">

					<?php while (have_posts()):

						the_post(); ?>

						<div class="item_post">

							<a href="<?php echo get_permalink(); ?>">

								<div class="item_post_img">

									<?php if (has_post_thumbnail()): ?>

										<?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>

									<?php else:

										$args = array('post_type' => 'attachment', 'numberposts' => 5, 'post_parent' => get_the_ID());

										$attachments = get_posts($args);

										if ($attachments) {

											foreach ($attachments as $attachment) {

												echo wp_get_attachment_image($attachment->ID, 'full');

												break;
											}
										} else {

											echo '<img src="' . get_bloginfo('template_url') . '/css/images/no-preview-400x400.jpg" alt="no-images" >';
										}

									endif;

									?>
								</div>

								<div class="item_post_content">

									<h4><?php the_title(); ?></h4>

									<div class="post_date"><?php echo get_the_date('d/m/Y'); ?></div>

									<div class="post_excerpt"><?php the_excerpt(); ?></div>

								</div>

							</a>

						</div>

					<?php endwhile; ?>

				</div>

				<?php
				the_posts_pagination(array(
					'mid_size' => 1,
					'prev_text' => '<',
					'next_text' => '>',
				));
			} else {
				echo 'No post';
			}
			?>
		</main>

	</div>

</div>

<?php get_footer(); ?>