<article role="article" <?php post_class(); ?>>

	<?php get_template_part('partials/header-content'); ?>

	<?php
		$src        = get_field('simple-audio-url');
		$parts      = parse_url($src);
		$result     = $parts['scheme'] . '://' . $parts['host'];
		$selfHosted = ($result == get_site_url()) ? true : false;

		$src        = substr($src, 0, -4);
		$audio      = '<audio data-media-src="'.$src.'.{mp4, ogg, mp3}" controls></audio>';

		if ( $selfHosted ) {
			echo $audio;
		} else {
			echo wp_oembed_get(get_field('simple-audio-url'));
		}
	?>

	<?php get_template_part( 'partials/post-meta' ); ?>

</article>
