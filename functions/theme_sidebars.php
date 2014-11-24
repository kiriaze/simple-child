<?php

// Register Theme Specific Sidebars
$child_sidebars = array( 'Example Sidebar' );
foreach ( $child_sidebars as $sidebar ) {
	$sidebar_args = array(
		'name'			=> $sidebar,
		'id'			=> 'sidebar_'.preg_replace('/\W/', '_', strtolower($sidebar) ),
		'before_widget'	=>	'<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h6 class="widgettitle">',
		'after_title'	=> '</h6>'	
	);
	register_sidebar($sidebar_args);
}