<?php
/*
*	Child Theme Options
*
*		- Theme Option 1
*
*/


// Example that appends an additional option using the filter of_options, located in options-framework.php
add_filter('of_options', function($options) {

	// Pull all the pages into an array
	$child_options_pages = array();
	$child_options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$child_options_pages[''] = 'Select a page:';
	foreach ($child_options_pages_obj as $page) {
		$child_options_pages[$page->ID] = $page->post_title;
	}

	// Fonts
	$typography_mixed_fonts = array_merge( options_typography_get_os_fonts() , options_typography_get_google_fonts() );
	asort($typography_mixed_fonts);

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/admin/simple-options/images/';

	$options[] = array( 
		"name" 	=> "Theme Options",
		"type" 	=> "heading",
		"desc" 	=> "Theme settings."
	);

	// Info Break
	$options[] = array(
		'name' => 'General',
		'desc' => 'This is just some example information you can put in the panel.',
		'type' => 'info'
	);

	return $options;

});