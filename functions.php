<?php
/**
 * Child Theme 1.0
 * Simple is a sleek, intuitve approach to wordpress website development designed for uncluttered and sophisticated experiences.
 *
 * This file enables the core features of Simple including sidebars, menus, post thumbnails, post formats, header, backgrounds, and more.
 * Some functions are able to be overridden using child themes. These functions will be wrapped in a function_exists() conditional.
 * They are auto loaded from within functions directory.
 *
 * @package     WordPress
 * @subpackage  Simple
 * @version     1.0
*/

add_action('after_setup_theme', 'theme_support', 10);
function theme_support() {
	// Simple Framework Supports
	add_theme_support('simple-relative-urls');      //  Enable relative URLs
	add_theme_support('simple-rewrites');           //  Enable URL rewrites for only parent theme
	add_theme_support('simple-breadcrumbs');        //  Enable breadcrumbs
	add_theme_support('debug');                     //  Enable debug bar
	add_theme_support('admin_bar');                 //  Enable admin bar
	add_theme_support('jquery-cdn');                //  Enable to load jQuery from the Google CDN. Issue with infinite scroll if enabled, include migrate

	// remove_theme_support in child theme if undesired, all enabled by default
	add_theme_support('custom_searchform');         //  Enable use of custom searchform template - /templates/searchform.php
	add_theme_support('nice-search');               //  Enables clean search in url; from /?s= to /search/result
	add_theme_support('single-search-result');      //  Enables redirect to first result
	add_theme_support('theme-options-setup');       //  Enable Setup tab in theme options
	add_theme_support('more-themes-link');          //  Enable more theme links under dashboard menu
	add_theme_support('admin-footer-text');         //  Enable extra text in admin footer
	add_theme_support('remove_admin_menu_items');   //  Remove Unwanted Admin Menu Items(left hand side)
	add_theme_support('remove_admin_bar_links');    //  Remove Unwanted Admin Menu Items(admin bar)
}

add_action('after_setup_theme', 'simple_child_theme_setup', 20);
function simple_child_theme_setup() {

	//  $content_width is a global variable used by WordPress for max image upload sizes and media embeds (in pixels).
	global $content_width;
	if ( !isset($content_width) ) {
		$content_width = 960; // set it to $medium
	}

	// Custom Image Sizes
	add_theme_support( 'post-thumbnails' );
	// add_image_size('custom-size-example', 1400, 720, true);

	// add editor styles
	add_editor_style();

	// Functions
	require_once locate_template( '/functions/theme_acf.php', true );
	require_once locate_template( '/functions/theme_grid_template_filter.php', true );
	require_once locate_template( '/functions/theme_head_scripts.php', true );
	require_once locate_template( '/functions/theme_options.php', true );
	require_once locate_template( '/functions/theme_scripts_styles.php', true );
	require_once locate_template( '/functions/theme_shortcodes.php', true );
	require_once locate_template( '/functions/theme_sidebars.php', true );
	require_once locate_template( '/functions/theme_menus.php', true );
	require_once locate_template( '/functions/theme_widgets.php', true );
	require_once locate_template( '/functions/theme_ajax.php', true );
	require_once locate_template( '/functions/theme_tinymce.php', true );
	require_once locate_template( '/functions/theme_extras.php', true );
	require_once locate_template( '/functions/theme_plugins.php', true );
}
