<?php
/**
 * The template is for rendering archives.
 *
 * @package 	WordPress
 * @subpackage 	Simple
 * @version 	1.0
*/

?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content/content', get_post_format() ); ?>

	<?php endwhile; ?>

<?php else :

	get_template_part( 'partials/no-results' );

endif; wp_reset_postdata(); ?>
