<?php
/**
 * Menus configuration.
 *
 * @package Travelop
 */

add_action( 'after_setup_theme', 'travelop_register_menus', 5 );
function travelop_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'travelop' ),
		'main'   => esc_html__( 'Main', 'travelop' ),
		'footer' => esc_html__( 'Footer', 'travelop' ),
		'social' => esc_html__( 'Social', 'travelop' ),
	) );
}
