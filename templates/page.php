<?php
/**
 * The template is for rendering pages.
 *
 * @package 	WordPress
 * @subpackage 	Simple
 * @version 	1.0
*/
?>

<?php if ( have_posts() ) :

	while ( have_posts() ) : the_post();

		get_template_part( 'content/content', get_post_format() );

	endwhile;

else :

	get_template_part( 'partials/no-results' );

endif; wp_reset_postdata(); ?>