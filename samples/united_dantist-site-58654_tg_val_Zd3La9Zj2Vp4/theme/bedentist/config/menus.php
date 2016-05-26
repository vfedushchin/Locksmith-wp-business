<?php
/**
 * Menus configuration.
 *
 * @package __Tm
 */

add_action( 'after_setup_theme', 'bedentist_register_menus', 5 );
function bedentist_register_menus() {

	// This theme uses wp_nav_menu() in four locations.
	register_nav_menus( array(
		'top'    => esc_html__( 'Top', 'bedentist' ),
		'main'   => esc_html__( 'Main', 'bedentist' ),
		'footer' => esc_html__( 'Footer', 'bedentist' ),
		'social' => esc_html__( 'Social', 'bedentist' ),
	) );
}
