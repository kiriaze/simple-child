<?php
/**
 * @package 	WordPress
 * @subpackage 	Simple
 * @version 	1.0
 *
 * The front page widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 */
if ( !is_active_sidebar( 'sidebar_blog' ) && !is_active_sidebar( 'sidebar_default' ) ) {
	return;
}

// if not in array, show sidebars
if( simple_display_sidebar() ) : // was !empty 

?>

	<?php if( is_home() || is_single() || is_category() || is_archive() ) : ?>
		<?php if( is_active_sidebar( 'sidebar_blog' ) ) : ?>
			<aside role="complementary" class="sidebar">
				<?php dynamic_sidebar( 'sidebar_blog' ); ?>
			</aside>
		<?php endif; ?>
		
	<?php else : ?>

		<?php if( is_active_sidebar( 'sidebar_default' ) ) : ?>
			<aside role="complementary" class="sidebar">
				<?php dynamic_sidebar( 'sidebar_default' ); ?>
			</aside>
		<?php endif; ?>

	<?php endif; ?>

<?php endif; ?>