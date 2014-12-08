<?php

// Change the name of the default template in the admin
function change_default_template_name( $translation, $text, $domain ) {
    if ( $text == 'Default Template' ) {
        return __( 'Page', SIMPLE_THEME_SLUG );
    }
    return $translation;
}
add_filter( 'gettext', 'change_default_template_name', 10, 3 );


// Extend body classes for theme option styles
add_filter( 'body_class', 'child_body_class' );
function child_body_class( $classes ){
	$classes[] = 'sbg'; // themeoptions styling class
	return $classes;
}

/*	Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
================================================== */
add_action( 'customize_preview_init', 'simple_customize_preview_js', 99 );
function simple_customize_preview_js() {
	wp_enqueue_script( 'simple_customizer', get_stylesheet_directory_uri() . '/assets/js/plugins/customizer.js', array( 'jquery','customize-preview' ), '', true );
}

/*	Typography Options
================================================== */
function options_typography_get_os_fonts() {
    // OS Font Defaults
    $os_faces = array(
        'Arial, sans-serif' => 'Arial',
        'Cambria, Georgia, serif' => 'Cambria',
        'Copse, sans-serif' => 'Copse',
        'Garamond, Times New Roman, Times, serif' => 'Garamond',
        'Georgia, serif' => 'Georgia',
        'Helvetica, sans-serif' => 'Helvetica',
        'Tahoma, Geneva, sans-serif' => 'Tahoma'
    );
    return $os_faces;
}

function options_typography_get_google_fonts() {
	$google_fonts = file_get_contents( get_stylesheet_directory() . '/assets/fonts/google-fonts.json' );

	$google_fonts_object = json_decode($google_fonts);

	$google_faces = array();

	foreach($google_fonts_object as $obj => $props) {
		$google_faces[$props->family] =  $props->family;
	}

	return $google_faces;
}


/**
 * Checks font options to see if a Google font is selected.
 * If so, options_typography_enqueue_google_font is called to enqueue the font.
 * Ensures that each Google font is only enqueued once.
 */
if ( !function_exists( 'options_typography_google_fonts' ) ) {
	function options_typography_google_fonts() {
		$all_google_fonts = array_keys( options_typography_get_google_fonts() );
		// Define all the options that possibly have a unique Google font
		$body_font = of_get_option('custom_body_typography', 'Rokkitt, serif');
		$heading_font = of_get_option('custom_header_typography', false);
		$subheading_font = of_get_option('custom_subheader_typography', 'Arvo, serif');
		// Get the font face for each option and put it in an array
		$selected_fonts = array(
		    is_array($body_font) && isset($body_font['face']) ? $body_font['face'] : $body_font,
		    is_array($heading_font) && isset($heading_font['face']) ? $heading_font['face'] : $heading_font,
		    is_array($subheading_font) && isset($subheading_font['face']) ? $subheading_font['face'] : $subheading_font,
		);

		// Remove any duplicates in the list
		$selected_fonts = array_unique($selected_fonts);
		// Check each of the unique fonts against the defined Google fonts
		// If it is a Google font, go ahead and call the function to enqueue it
		// if ( of_get_option('enable_custom_typography') ) :
		// 	foreach ( $selected_fonts as $font ) {
		// 		if ( in_array( $font, $all_google_fonts ) ) {
		// 			options_typography_enqueue_google_font($font);
		// 		}
		// 	}
		// endif;

		// individualy
		$index = 0;

		$custom_type = of_get_option('enable_custom_typography');
		if ( is_array($custom_type) ) :
		foreach ( $custom_type as $key => $value ) {
			if( $value ) {
				if ( in_array( $selected_fonts[$index], $all_google_fonts ) ) {
					options_typography_enqueue_google_font($selected_fonts[$index]);
				}
			}
			$index++;
		}
		endif;

	}
}
add_action( 'wp_enqueue_scripts', 'options_typography_google_fonts' );

function options_typography_enqueue_google_font($font) {
	$font = explode(',', $font);
	$font = $font[0];
	// Certain Google fonts need slight tweaks in order to load properly
	// Like our friend "Raleway"
	if ( $font == 'Raleway' )
		$font = 'Raleway:100';
	$font = str_replace(" ", "+", $font);
	wp_enqueue_style( "options_typography_$font", "http://fonts.googleapis.com/css?family=$font", false, null, 'all' );
}




/*	Options Output
================================================== */
function options_output_styles() {

	get_template_part('css/output-styles.css');

}
add_action('wp_head', 'options_output_styles');

