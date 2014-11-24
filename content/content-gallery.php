<article role="article" <?php post_class(); ?>>
	
	<?php get_template_part('partials/header-content'); ?>
	
	<?php the_content(); ?>

	<?php get_template_part( 'partials/post-meta' ); ?>

</article>