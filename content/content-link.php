<article role="article" <?php post_class(); ?>>
	
	<?php get_template_part('partials/header-content'); ?>

	<?php 
		$linkUrl 	= get_field('simple-link-url');
		$linkText 	= get_field('simple-link-text');
	?>
	<a href="<?php echo $linkUrl; ?>">
		<?php echo $linkText; ?>
	</a>

	<?php get_template_part( 'partials/post-meta' ); ?>

</article>