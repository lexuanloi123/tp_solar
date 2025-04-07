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


<?php
//  Lấy thông tin của danh mục hiện tại
$category = get_queried_object();
$category_id = $category->term_id; ?>


<div class="full-row full-content_post_archive">

	<div id="primary" class="inner-content inner-container">

		<div class="box_post">

			<div class="content_list_post_home">

				<?php

				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 5,
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'category',
							'field' => 'id',
							'terms' => $category_id,
							'operator' => 'IN',
						),
						array(
							'taxonomy' => 'post_tag',
							'field' => 'slug',
							'terms' => 'hot',
							'operator' => 'IN',
						),
					),
					'orderby' => 'date',
					'order' => 'DESC',
				);

				$query = new WP_Query($args);

				if ($query->have_posts()):

					while ($query->have_posts()):

						$query->the_post(); ?>

						<div class="item_post_home">

							<a href="<?php the_permalink(); ?>">

								<div class="bor_img_post_home">

									<?php the_post_thumbnail('full'); ?>

								</div>

								<div class="bor_full_content">

									<h3 class="title_post_home"><?php the_title(); ?></h3>

									<div class="new-date"><?php echo get_the_modified_date('d/m/Y'); ?></div>

									<?php the_excerpt(); ?>

								</div>
							</a>
						</div>

					<?php endwhile;

				else: ?>
					<style>
						.full-content_post_archive {
							display: none;
						}

						.full-content_post_cate {
							margin-top: 20px;
						}
					</style>
				<?php endif;

				wp_reset_postdata();
				?>

			</div>

		</div>

	</div>

</div>

<div class="full-row full-content_post_cate">

	<div id="primary" class="inner-content inner-container">

		<div class="box_post_hot">

			<div class="text_cate_home">Chủ đề Hot</div>

			<div class="list_cate_post">

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

									<img class="" src="<?php echo bloginfo('template_url') . '/css/images/hot_ico.webp'; ?>"
										alt="">
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

	</div>

</div>


<div class="full-row full-content_ar_post">

	<div id="primary" class="inner-content inner-container">

		<main class="content_archive_post" role="main">

			<?php if (have_posts()) { ?>

				<div class="text_cate_home">

					<?php $title = get_the_archive_title();

					if (strpos($title, ':') !== false) {
						$title_parts = explode(':', $title);
						$title = trim(end($title_parts));
					}
					echo $title; ?>

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