<?php
/**
 * Layout configuration.
 *
 * @package Mechanna
 */

add_action( 'after_setup_theme', 'mechanna_set_layout', 5 );
function mechanna_set_layout() {

	mechanna_theme()->layout = array(
		'one-right-sidebar' => array(
			'1/3' => array(
				'content' => array( 'col-xs-12', 'col-md-8' ),
				'sidebar' => array( 'col-xs-12', 'col-md-4' ),
			),
			'1/4' => array(
				'content' => array( 'col-xs-12', 'col-md-9' ),
				'sidebar' => array( 'col-xs-12', 'col-md-3' ),
			),
		),
		'one-left-sidebar' => array(
			'1/3' => array(
				'content' => array( 'col-xs-12', 'col-md-8', 'col-md-push-4' ),
				'sidebar' => array( 'col-xs-12', 'col-md-4', 'col-md-pull-8' ),
			),
			'1/4' => array(
				'content' => array( 'col-xs-12', 'col-md-9', 'col-md-push-3' ),
				'sidebar' => array( 'col-xs-12', 'col-md-3', 'col-md-pull-9' ),
			),
		),
		'two-sidebars' => array(
			'1/3' => array(
				'content' => array( 'col-xs-12', 'col-md-4' ),
				'sidebar' => array( 'col-xs-12', 'col-md-4' ),
			),
			'1/4' => array(
				'content' => array( 'col-xs-12', 'col-md-6' ),
				'sidebar' => array( 'col-xs-12', 'col-md-3' ),
			),
		),
		'fullwidth' => array(
			array(
				'content' => array( 'col-xs-12', 'col-md-12' ),
			),
		),
	);
}
