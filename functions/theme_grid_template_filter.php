<?php

// Child grid action modifications
function child_grid_before($container_class) { 
	// Add wrapper around all grids, 
	// with a class of wrapper for this theme
	$container_class .= 'container';
	return $container_class;
}
add_filter( 'grid_before' , 'child_grid_before' );

//	Filter sidebar display within child 
function simple_display_sidebar_child_theme($sidebar) { 

    if ( is_post_type_archive( get_post_type() ) ) {
    	return false;
    }

    if ( is_page_template('templates/home.php') || is_page_template('templates/builder.php') ) {
    	return false;
    }

    return $sidebar;
}
add_filter( 'simple_display_sidebar' , 'simple_display_sidebar_child_theme' );


//	Filter template display within child 
function simple_display_custom_template_child_theme($template) {

    if ( is_page_template('templates/home.php') || is_page_template('templates/builder.php') ) {
    	return false;
    }

    return $template;

}
add_filter( 'simple_display_custom_template' , 'simple_display_custom_template_child_theme' );