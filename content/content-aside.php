<article role="article" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('small-image', array('class'=>'post-image')); ?>
		</a>
	<?php endif; ?>

	<?php get_template_part('partials/header-content'); ?>

	<?php the_content(); ?>

	<?php get_template_part( 'partials/post-meta' ); ?>

</article>
