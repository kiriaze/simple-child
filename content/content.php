<?php
	global $single;

	$page_object = get_queried_object();
	$page_id     = get_queried_object_id();

	$single 	 = $post->ID == $page_id ? true : false;
?>

<article role="article" <?php post_class(); ?>>

	<?php
	if ( !$single ) :
		if ( has_post_thumbnail() ) : ?>

			<figure class="post-thumbnail">

			<?php if( !$single ) : ?>
				<a href="<?php the_permalink(); ?>">
			<?php endif; ?>

			<?php
				// grab attachment meta, play with data
				$attachment_id = get_post_thumbnail_id( $post->ID );
				$attachment_meta = wp_get_attachment($attachment_id);

				$title 			= $attachment_meta['title'];
				$alt 			= $attachment_meta['alt'];
				$caption 		= $attachment_meta['caption'];
				$description 	= $attachment_meta['description'];
				$href 			= $attachment_meta['href'];
				$url 			= $attachment_meta['src'];

				$size = 'post-list';
				$url = wp_get_attachment_image_src( $attachment_id, $size ); // uses correct size

				// post thumbnail
				$attr = array(
					'src'			=>	get_template_directory_uri().'/assets/images/gray.png',
					'class'			=>	'post-image lazy',
					'data-original'	=>	$url['0']
				);

			?>

			<?php the_post_thumbnail( 'post-list', $attr ); // featured image with lazy load attributes ?>

			<?php if( !$single ) : ?>
				</a>
			<?php endif; ?>

			</figure>

		<?php else :

		echo '<figure class="post-thumbnail"><img src="http://placehold.it/530x375"></figure>';

		endif;

	endif; ?>

	<div class="post-content">

		<?php //get_template_part('partials/header-content'); // set a theme_option to render image above or below header markup ?>

		<?php
			if ( !$single ) :
				echo '<p class="post-excerpt">'. truncate_text( get_the_excerpt(), of_get_option('excerpt_length'), simple_excerpt_more() ) .'</p>';
			else :
				the_content();
			endif;
		?>

		<?php get_template_part( 'partials/post-meta' ); ?>

	</div>

</article>