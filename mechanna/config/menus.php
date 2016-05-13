<?php
/**
 * Menus configuration.
 *
 * @package Mechanna
 */

add_action( 'after_setup_theme', 'mechanna_register_menus', 5 );
function mechanna_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'mechanna' ),
		'main'   => esc_html__( 'Main', 'mechanna' ),
		'footer' => esc_html__( 'Footer', 'mechanna' ),
		'social' => esc_html__( 'Social', 'mechanna' ),
	) );
}
