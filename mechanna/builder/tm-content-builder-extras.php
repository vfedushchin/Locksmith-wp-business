<?php
/**
 * Custom functions that act independently of the tm-content-builder plugin.
 *
 * @package Ironmass
 */

add_action( 'tm_builder_load_user_modules', 'ironmass__builder_load_user_modules' );
add_filter( 'tm_pb_pre_set_style', 'ironmass_pb_pre_set_style_team_member', 10, 2 );

function ironmass__builder_load_user_modules( $modules ) {

	$key = 'Tm_Builder_Module_Link_Box';
	$value = MECHANNA_THEME_DIR  . 'builder/modules/class-builder-module-link-box.php';
	$modules->modules_list = ( !isset( $modules->modules_list ) ? array( $key => $value ) : $modules->modules_list += array( $key => $value ) );

	require_once trailingslashit( MECHANNA_THEME_DIR ) . 'builder/modules/class-builder-module-link-box.php';

}

function ironmass_pb_pre_set_style_team_member( $style, $function_name ) {

	if( 'tm_pb_team_member' !== $function_name ) {
		return $style;
	}

	if( false !== strpos( $style['declaration'], 'background' ) || false !== strpos( $style['declaration'], 'border' ) ) {
		$style['selector'] .= ' .tm_pb_team_member_description';
	}

	return $style;

}