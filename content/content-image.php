<?php
	global $single;

	$page_object = get_queried_object();
	$page_id     = get_queried_object_id();

	$single = $post->ID == $page_id ? true : false;
?>

<article role="article" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>

		<?php if ( !$single ) : ?>
			<a href="<?php the_permalink(); ?>">
				<figure class="post-thumbnail">
		<?php else : ?>
				<figure>
		<?php endif; ?>

			<?php
				// grab attachment meta, play with data
				$attachment_id = get_post_thumbnail_id( $post->ID );
				$attachment_meta = wp_get_attachment($attachment_id);
				// pp($attachment_meta);
				$title 			= $attachment_meta['title'];
				$alt 			= $attachment_meta['alt'];
				$caption 		= $attachment_meta['caption'];
				$description 	= $attachment_meta['description'];
				$href 			= $attachment_meta['href'];
				$url 			= $attachment_meta['src'];

				$size = 'medium-image';
				$url = wp_get_attachment_image_src( $attachment_id, $size ); // uses correct size

				// post thumbnail
				$attr = array(
					'src'			=>	get_template_directory_uri().'/assets/images/gray.png',
					'class'			=>	'post-image lazy',
					'data-original'	=>	$url['0']
				);
				the_post_thumbnail( $size, $attr ); // featured image with lazy load attributes

				if ( $caption ) :
			?>
				<style>
					/*temp styling*/
					figcaption{
						position: absolute;
						color: white;
						font-weight: 800;
						font-size: 3rem;
						text-align: center;
						text-transform: uppercase;
						line-height: normal;
						font-family: 'Maven Pro', sans-serif;
						padding: 10%;
						top: 50%;
						width: 100%;
						-webkit-transform: translateY(-50%);
					}
				</style>
				<figcaption>
					<?php
						//echo $title;
						//echo $alt;
						echo $caption;
						//echo $description;
					?>
				</figcaption>

			<?php endif; ?>

			</figure>

		<?php if ( !$single ) : ?>
			</a>
		<?php endif; ?>

	<?php endif; ?>

	<div class="post-content">

		<?php get_template_part('partials/header-content'); ?>

		<?php
		if ( !$single ) :
			echo truncate_text( get_the_excerpt(), of_get_option('excerpt_length'), simple_excerpt_more() );
		else :
			the_content();
		endif;
		?>

		<?php get_template_part( 'partials/post-meta' ); ?>

	</div>

</article>
