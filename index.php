<?php
/**
 * The template is for rendering the index.
 *
 * @package 	WordPress
 * @subpackage 	Simple
 * @version 	1.0
*/
?>

<?php

if ( is_post_type_archive($post_type) ) :

	if ( $post_type && locate_template( '/templates/archive-'. $post_type .'.php' ) != '' ) :
		$template = 'archive-'. $post_type .'.php';
	else :
		$template = '/templates/archive.php';
	endif;

elseif ( is_404() || is_search() ) :

	$template = '/templates/404.php';

elseif ( is_page() ) :

	$template = '/templates/page.php';

elseif ( is_singular($post_type) ) :

	if( $post_type && locate_template( '/templates/single-'. $post_type .'.php' ) != '' ) :
		$template = 'single-'. $post_type .'.php';
	else :
		$template = '/templates/single.php';
	endif;

elseif ( is_tax() ) :

	$tax      = $wp_query->get_queried_object();
	$taxonomy = $tax->taxonomy;

	if ( locate_template( '/templates/taxonomy-'. $taxonomy .'.php' ) != '' ) :
		$template = 'taxonomy-'. $taxonomy .'.php';
	else :
		$template = '/templates/archive.php';
	endif;

elseif ( is_archive() ) :

	$template = '/templates/archive.php';

else :

	$template = '/templates/blog.php';

endif;

require_once locate_template( $template );

?>
