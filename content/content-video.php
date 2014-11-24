<article role="article" <?php post_class(); ?>>

	<?php get_template_part('partials/header-content'); ?>

	<figure class="aspect">
		<?php the_content(); ?>
	</figure>

	<?php get_template_part( 'partials/post-meta' ); ?>

</article>