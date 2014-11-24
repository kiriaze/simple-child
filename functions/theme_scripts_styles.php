<?php

function child_scripts_styles() {

	// Dequeue / Deregister

    // wp_dequeue_style( 'screen' );
    // wp_deregister_style( 'screen' );

	// Remove parent scripts
    // wp_dequeue_script( 'SCRIPTNAME' );
    // wp_deregister_script( 'SCRIPTNAME' );


    // 	 Register Styles & Scripts (note: use get_stylesheet_directory_uri() child themes)

    //	CSS
	wp_register_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_style('main');

    // signet - display unique seal
    wp_register_script('signet', '//oss.maxcdn.com/signet/0.4.4/signet.min.js', array('jquery'), '', true );
    wp_enqueue_script('signet');

	// JS
	if ( of_get_option('general_multi_checkbox')['smooth_scroll'] ) :
		wp_register_script('smooth_scroll', get_stylesheet_directory_uri() . '/assets/js/plugins/smoothscroll.js', array('jquery'), '', true );
		wp_enqueue_script('smooth_scroll');
	endif;

	if ( of_get_option('blog_multi_checkbox')['infinite_scroll'] ) :
		wp_register_script('infinite_scroll', get_stylesheet_directory_uri() . '/assets/js/plugins/infinite-scroll/jquery.infinitescroll.min.js', array('jquery'), '', true );
		wp_enqueue_script('infinite_scroll');
		wp_register_script('manual_trigger', get_stylesheet_directory_uri() . '/assets/js/plugins/infinite-scroll/manual-trigger.js', array('jquery'), '', true );
		wp_enqueue_script('manual_trigger');
	endif;
}

add_action( 'wp_enqueue_scripts', 'child_scripts_styles', 10 );