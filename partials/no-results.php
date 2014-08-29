<?php
/**
 * The template is for rendering the no-results.
 *
 * @package 	WordPress
 * @subpackage 	Simple
 * @version 	1.0
*/
?>

<header>
	<h1><?php _e( 'Nothing Found', SIMPLE_THEME_SLUG ); ?></h1>
</header>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', SIMPLE_THEME_SLUG ), admin_url( 'post-new.php' ) ); ?></p>

<?php elseif ( is_search() ) : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', SIMPLE_THEME_SLUG ); ?></p>

	<?php get_search_form(); ?>

<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', SIMPLE_THEME_SLUG ); ?></p>

	<?php get_search_form(); ?>

<?php endif; ?>


<!--
	custom 404 text thru theme options perhaps?
'We are sorry, the page you are looking for is not found. Kindly check your link or visit again later.'
 -->