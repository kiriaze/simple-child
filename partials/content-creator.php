<?php

// custom add_image_size size defined in theme_functions/functions.php
$size = 'large';

// check if the flexible content field has rows of data
if ( have_rows('content_creator') ) :

    // loop through the rows of data
    while ( have_rows('content_creator') ) : the_row();

        if ( get_row_layout() == 'cc_fw' ) :

			$cc_fw_title 		= get_sub_field('cc_fw_title');
			$cc_fw_content 		= get_sub_field('cc_fw_content');
			$cc_fw_buttonText 	= get_sub_field('cc_fw_button_text');
			$cc_fw_buttonLink 	= get_sub_field('cc_fw_button_link');
			$cc_fw_background 	= get_sub_field('cc_fw_enable_background');
			$cc_fw_bgURL 		= $cc_fw_background ? get_sub_field('cc_fw_background_image')['sizes'][$size] : '';
			$cc_fw_overlay 		= get_sub_field('cc_fw_image_overlay');
			$cc_fw_opacity 		= get_sub_field('cc_fw_overlay_opacity');
			$cc_fw_class 		= get_sub_field('cc_fw_css_class');
			$cc_fw_textAlign 	= get_sub_field('cc_fw_text_align');

			$cc_fw_id         	= rand(1, 10000);

			$html = '';

			if ( $cc_fw_overlay ) : // bg enabled

				$cc_fw_newColor 	= HexToRGB( $cc_fw_overlay, $cc_fw_opacity ); // has to be hex
				$cc_fw_newColor 	= 'rgba(' . $cc_fw_newColor .');';

				if ( $cc_fw_overlay ) {

					$html .= '<style>
						.colored-overlay-'.$cc_fw_id.':before {
							content: "";
							background-color: '. $cc_fw_newColor .';
							position: absolute;
							top: 0;
							left: 0;
							height: 100%;
							width:100%;
							z-index: -1;
						}
					</style>';

				}

				$cc_fw_class = $cc_fw_class . ' colored-overlay-'. $cc_fw_id;

			endif;

 			$html .= '<section class="full-width-section text-align-'. $cc_fw_textAlign .' ' . $cc_fw_class . '" style="background-image:url('.$cc_fw_bgURL.')">';

	 			$html .= '<h2 class="block-heading">' . $cc_fw_title . '</h2>';

	 			$html .= $cc_fw_content;

	 			if ( $cc_fw_buttonLink ) :
	 				$html .= '<a href="'.$cc_fw_buttonLink.'" class="btn">'.$cc_fw_buttonText.'</a>';
	 			endif;

			$html .= '</section>';

			echo $html;

        elseif ( get_row_layout() == 'cc_5050' ) :

        	$leftBlock 		= get_sub_field('cc_5050_left_block');

			if ( have_rows('cc_5050_left_block') ) :

				while ( have_rows('cc_5050_left_block') ) : the_row();

					$cc_5050_left_title 		= get_sub_field('cc_5050_left_block_title');
					$cc_5050_left_content 		= get_sub_field('cc_5050_left_block_content');
					$cc_5050_left_buttonText 	= get_sub_field('cc_5050_left_block_button_text');
					$cc_5050_left_buttonLink 	= get_sub_field('cc_5050_left_block_button_link');
					$cc_5050_left_textAlign 	= get_sub_field('cc_5050_left_text_align');

				endwhile;

			endif;

        	$rightBlock 	= get_sub_field('cc_5050_right_block');

        	if ( have_rows('cc_5050_right_block') ) :

				while ( have_rows('cc_5050_right_block') ) : the_row();

					$cc_5050_right_title 		= get_sub_field('cc_5050_right_block_title');
					$cc_5050_right_content 		= get_sub_field('cc_5050_right_block_content');
					$cc_5050_right_buttonText 	= get_sub_field('cc_5050_right_block_button_text');
					$cc_5050_right_buttonLink 	= get_sub_field('cc_5050_right_block_button_link');
					$cc_5050_right_textAlign 	= get_sub_field('cc_5050_right_text_align');

				endwhile;

			endif;

        	$cc_5050_class 			= get_sub_field('cc_5050_css_class');
        	$cc_5050_background 	= get_sub_field('cc_5050_enable_background');
			$cc_5050_bgURL			= $cc_5050_background ? get_sub_field('cc_5050_background_image')['sizes'][$size] : '';
        	$cc_5050_overlay 		= get_sub_field('cc_5050_background_overlay');
        	$cc_5050_opacity 		= get_sub_field('cc_5050_overlay_opacity');

        	$cc_5050_id         	= rand(1, 10000);


			if ( $cc_5050_overlay ) : // bg enabled

				$cc_5050_newColor 		= HexToRGB( $cc_5050_overlay, .7 ); // has to be hex
				$cc_5050_newColor 		= 'rgba(' . $cc_5050_newColor .');';

				echo '<style>
					.colored-overlay-'.$cc_5050_id.':before {
						content: "";
						background-color: '. $cc_5050_newColor .';
						position: absolute;
						top: 0;
						left: 0;
						height: 100%;
						width:100%;
						z-index: -1;
					}
				</style>';

			endif;

 			echo '<section class="full-width-section colored-overlay-'. $cc_5050_id . ' ' . $cc_5050_class . '" style="background-image:url('.$cc_5050_bgURL.')">';

				echo '<div class="row">';

					echo '<div class="columns-2 text-align-'. $cc_5050_left_textAlign .'">';

			 			echo '<h2 class="block-heading">' . $cc_5050_left_title . '</h2>';

			 			echo $cc_5050_left_content;

			 			if ( $cc_5050_left_buttonLink )
			 				echo '<a href="'.$cc_5050_left_buttonLink.'" class="btn">'.$cc_5050_left_buttonText.'</a>';

					echo '</div>';

					echo '<div class="columns-2 text-align-'. $cc_5050_right_textAlign .'">';

			 			echo '<h2 class="block-heading">' . $cc_5050_right_title . '</h2>';

			 			echo $cc_5050_right_content;

			 			if ( $cc_5050_right_buttonLink )
			 				echo '<a href="'.$cc_5050_right_buttonLink.'" class="btn">'.$cc_5050_right_buttonText.'</a>';

					echo '</div>';

				echo '</div>';

			echo '</section>';

		elseif ( get_row_layout() == 'cc_left' ) :

			$cc_left_title 			= get_sub_field('cc_left_title');
			$cc_left_content		= get_sub_field('cc_left_content');
			$cc_left_buttonText 	= get_sub_field('cc_left_button_text');
			$cc_left_buttonLink 	= get_sub_field('cc_left_button_link');
			$cc_left_image 			= get_sub_field('cc_left_left_image');
			$cc_left_bgURL 			= get_sub_field('cc_left_background_image');
			$cc_left_class 			= get_sub_field('cc_left_css_class');
			$cc_left_textAlign 		= get_sub_field('cc_left_text_align');
			$cc_left_id         	= rand(1, 10000);

			echo '<section class="full-width-section colored-overlay-'. $cc_left_id . ' ' . $cc_left_class . '" style="background-image:url('.$cc_left_bgURL['sizes'][$size].')">';

				echo '<div class="row">';

					echo '<div class="columns-2 text-align-left">';

			 			echo '<img src="'. $cc_left_image .'" />';

					echo '</div>';

					echo '<div class="columns-2 text-align-'.$cc_left_textAlign.'">';

			 			echo '<h2 class="block-heading">' . $cc_left_title . '</h2>';

			 			echo $cc_left_content;

			 			if ( $cc_left_buttonLink )
			 				echo '<a href="'.$cc_left_buttonLink.'" class="btn">'.$cc_left_buttonText.'</a>';

					echo '</div>';

				echo '</div>';

			echo '</section>';

		elseif ( get_row_layout() == 'cc_right' ) :

			$cc_right_title 		= get_sub_field('cc_right_title');
			$cc_right_content		= get_sub_field('cc_right_content');
			$cc_right_buttonText 	= get_sub_field('cc_right_button_text');
			$cc_right_buttonLink 	= get_sub_field('cc_right_button_link');
			$cc_right_image 		= get_sub_field('cc_right_right_image');
			$cc_right_bgURL 		= get_sub_field('cc_right_background_image');
			$cc_right_class 		= get_sub_field('cc_right_css_class');
			$cc_right_textAlign 	= get_sub_field('cc_right_text_align');
			$cc_right_id         	= rand(1, 10000);

			echo '<section class="full-width-section colored-overlay-'. $cc_right_id . ' ' . $cc_right_class . '" style="background-image:url('.$cc_right_bgURL['sizes'][$size].')">';

				echo '<div class="row">';

					echo '<div class="columns-2 text-align-'.$cc_right_textAlign.'">';

			 			echo '<h2 class="block-heading">' . $cc_right_title . '</h2>';

			 			echo $cc_right_content;

			 			if ( $cc_right_buttonLink )
			 				echo '<a href="'.$cc_right_buttonLink.'" class="btn">'.$cc_right_buttonText.'</a>';

					echo '</div>';

					echo '<div class="columns-2 text-align-right">';

				 		echo '<img src="'. $cc_right_image .'" />';

					echo '</div>';

				echo '</div>';

			echo '</section>';

		elseif ( get_row_layout() == 'cc_ww' ) :

			$cc_ww_content 		= get_sub_field('cc_ww_editor');
			$cc_ww_class 		= get_sub_field('cc_ww_class');

			echo '<section class="full-width-section ' . $cc_ww_class . '">';

		 			echo $cc_ww_content;

			echo '</section>';

		elseif ( get_row_layout() == 'cc_special_content' ) :

			$special_type 		= get_sub_field('cc_special_type');
			$slider 			= get_sub_field('cc_testimonial_slider');
			$posts 				= get_sub_field('cc_single_post');
			$postsHeading		= get_sub_field('cc_single_post_heading');
			$postsSubheading	= get_sub_field('cc_single_post_subheading');
			$postsButtonLink	= get_sub_field('cc_single_post_button_link');
			$postsButtonText	= get_sub_field('cc_single_post_button_text');
			$tabs 				= get_sub_field('cc_tabs');
			$fpt_lh 			= get_sub_field('cc_tabs_left_heading');
			$fpt_lc				= get_sub_field('cc_tabs_left_content');
			$three_up			= get_sub_field('cc_three_up');
			$three_up_class		= get_sub_field('cc_three_up_class');
			$three_up_heading	= get_sub_field('cc_three_up_heading');
			$three_up_btn_text	= get_sub_field('cc_three_up_button_text');
			$three_up_btn_link	= get_sub_field('cc_three_up_button_link');
			$post_type 			= get_sub_field('cc_post_list');

 			if ( $special_type == 'test_slider' ) : ?>

				<section class="full-width-section <?php the_sub_field('testimonial_class'); ?>">

	 				<ul class="test-slider owl-carousel owl-theme">
	 					<?php foreach ($slider as $slide) { ?>
							<li>
								<p class="p2">
									<strong>
									"<?php echo $slide['cc_quote']; ?>"
									</strong>
								</p>
								<span>
									- <?php echo $slide['cc_author']; ?>
								</span>
								<span>
									<?php echo $slide['cc_byline']; ?>
								</span>
							</li>
	 					<?php } ?>
	 				</ul>

				</section>

 			<?php endif;

 			if ( $special_type == 'single_post' ) : ?>

				<section class="full-width-section single-post no-margin">

					<?php if ( $postsHeading ) : ?>
						<h2 class="block-heading text-align-center">
							<?php echo $postsHeading; ?>
							<?php if ( $postsSubheading ) : ?>
								<span>
									<?php echo $postsSubheading; ?>
								</span>
							<?php endif; ?>
						</h2>
					<?php endif; ?>


					<?php if ( $posts ) : ?>

					<div class="row">

						<?php foreach ( $posts as $post) : // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>

							<div class="columns-50">
								<?php
								if ( has_post_thumbnail() ) :
									the_post_thumbnail('single-post-block');
								else : ?>
								<img src="http://placehold.it/570x340" alt="" />
								<?php endif; ?>
							</div>

							<div class="columns-50">
								<div class="post-content">
									<article <?php post_class(); ?>>
										<header>
											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

											<?php
												echo apply_filters('simple_post_meta', array(
													'author' 		=> true,
													'date' 	 		=> true,
													'tags' 			=> false,
													'categories' 	=> false,
													'wordcount' 	=> false,
													'reading_time'	=> false,
													'views' 		=> false,
													'comments' 		=> false,
													'icons'			=> false
												));
											?>

										</header>
										<?php echo '<p class="post-excerpt">'. truncate_text( get_the_excerpt(), of_get_option('excerpt_length'), simple_excerpt_more() ) .'</p>'; ?>
									</article>
								</div>
							</div>

						<?php endforeach; ?>

						<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

					</div>

					<?php if ( $postsButtonLink ) : ?>
					<a href="<?php echo $postsButtonLink; ?>" class="btn center"><?php echo $postsButtonText; ?></a>
					<?php endif; ?>

					<?php endif; ?>

				</section>

 			<?php endif;

			if ( $special_type == 'tabs' ) : ?>

				<?php if ( $tabs ) : ?>

					<section class="full-width-section tabs no-margin">

						<div class="row">

							<div class="columns-2">
								<h5><?php echo $fpt_lh; ?></h5>
								<p><?php echo $fpt_lc; ?></p>
							</div>

							<div class="columns-2">
								<div data-type="tabs">
									<?php foreach ($tabs as $tab) { ?>
										<a href="#" data-tab="<?php echo $tab['cc_tab_text']; ?>" class="tab"><?php echo $tab['cc_tab_text']; ?></a>
				 					<?php } ?>
									<?php foreach ($tabs as $tab) { ?>
					            		<div data-tab-content="<?php echo $tab['cc_tab_text']; ?>" class="">
											<p>
												<?php echo $tab['cc_tab_content']; ?>
											</p>
										</div>
				 					<?php } ?>
								</div>
							</div>

			            </div><!-- /.row -->

					</section><!-- /.block.tabs -->

				<?php endif; // if tabs have content ?>

 			<?php endif; // front tabs

 			if ( $special_type == 'three_up' ) : ?>

				<section class="full-width-section <?php echo $three_up_class; ?>">

					<h5 class="block-heading"><?php echo $three_up_heading; ?></h5>

					<div class="row">

						<?php if ( $three_up ) : ?>
							<?php
								foreach ($three_up as $column) {
									echo '<div class="columns-3">';
									echo $column['cc_column_content'];
									echo '</div>';
								}
							?>
						<?php endif; ?>

					</div>

					<?php

						if ( $three_up_btn_link ) {
							echo '<a href="' . $three_up_btn_link . '" class="btn center">' . $three_up_btn_text . '</a>';
						}
					?>

				</section>

 			<?php endif; // three up

 			if ( $special_type == 'post_list' ) : ?>

				<section class="full-width-section text-align-center no-margin">

					<h3 class="block-heading">Meet the <?php echo ucfirst($post_type); ?></h3>

					<?php

					$args = array(
						// grabbing from theme_acf.php function
						'post_type'	=>	$post_type
					);

					$postList = new WP_Query($args);

					if( $postList->have_posts() ) :

						echo '<ul class="post-type-item-list">';

						while ( $postList->have_posts() ) : $postList->the_post(); ?>
							<li class="post-type-item">

								<?php if ( wp_is_mobile() ) : ?>
									<a href="<?php the_permalink(); ?>">
								<?php endif; ?>

								<figure>
									<?php
									$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'staff-grid', true )[0];
									echo '<img src="'.$image.'" />';
									?>
								</figure>

								<div class="post-type-item-inner">

									<h5><?php the_title(); ?></h5>
									<span><?php the_field('position'); ?></span>

									<?php if ( wp_is_mobile() ) : ?>

										<span href="<?php the_permalink(); ?>" class="btn">Meet <?php echo explode(' ',trim(get_the_title($post->ID)) )[0]; ?></span>

									<?php else : ?>

										<a href="<?php the_permalink(); ?>" class="btn">Meet <?php echo explode(' ',trim(get_the_title($post->ID)) )[0]; ?></a>

									<?php endif; ?>

								</div><!-- /post-type-item-inner -->

								<?php if ( wp_is_mobile() ) : ?>

									</a>

								<?php endif; ?>

							</li>
						<?php endwhile;

						echo '</ul>';

					endif; wp_reset_postdata();

					?>

				</section>

			<?php endif; // post list

        endif;

    endwhile;

else :

    // no layouts found

endif;