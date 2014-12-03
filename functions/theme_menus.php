<?php

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'extra-menu'   => 'Extra Menu'
		)
	);
}

// register them in dropdown
$menus = get_registered_nav_menus();
foreach ( $menus as $key => $value ) {

	$simple_nav_mod = false;

	$main_menu = wp_get_nav_menu_object($value);

	if ( !$main_menu ) {
		$main_menu_id = wp_create_nav_menu($value, array('slug' => $value));
		$simple_nav_mod[$value] = $main_menu_id;
	} else {
		$simple_nav_mod[$value] = $main_menu->term_id;
	}

	if ( $simple_nav_mod ) {
		set_theme_mod('nav_menu_locations', $simple_nav_mod);
	}
}