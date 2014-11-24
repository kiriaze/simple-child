<?php

// Add Formats Dropdown Menu To MCE
if ( ! function_exists( 'simple_style_select' ) ) {
	function simple_style_select( $buttons ) {
		array_push( $buttons, 'styleselect' );
		return $buttons;
	}
}
add_filter( 'mce_buttons', 'simple_style_select' );

// Add new styles to the TinyMCE "formats" menu dropdown
if ( ! function_exists( 'simple_styles_dropdown' ) ) {
	function simple_styles_dropdown( $settings ) {

		// Create array of new styles
		$new_styles = array(
			array(
				'title'	=> __( 'Custom Styles', SIMPLE_THEME_SLUG ),
				'items'	=> array(
					array(
						'title'		=> __('Theme Button', SIMPLE_THEME_SLUG),
						'selector'	=> 'a',
						'classes'	=> 'btn'
					),
					array(
						'title'		=> __('Highlight', SIMPLE_THEME_SLUG),
						'inline'	=> 'span',
						'classes'	=> 'text-highlight',
					),
					array(
						'title' 	=> 'Paragraph Lead',
						'selector' 	=> 'p',
						'classes' 	=> 'lead'
					),
					array(
						'title' 	=> 'Span',
						'inline'	=>	'span'
					)
				),
			),
		);

		// Merge old & new styles
		$settings['style_formats_merge'] = true;

		// Add new styles
		$settings['style_formats'] = json_encode( $new_styles );

		// Return New Settings
		return $settings;

	}
}
add_filter( 'tiny_mce_before_init', 'simple_styles_dropdown' );


// Remove buttons from tinymce
function myplugin_tinymce_buttons($buttons) {
	$remove = array('bold', 'alignleft', 'aligncenter', 'alignjustify', 'alignright', 'italic', 'strikethrough', 'blockquote');

	return array_diff($buttons,$remove);
 }
add_filter('mce_buttons_2','myplugin_tinymce_buttons');