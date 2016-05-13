<?php
/**
 * Thumbnails configuration.
 *
 * @package Mechanna
 */

add_action( 'after_setup_theme', 'mechanna_register_image_sizes', 5 );
function mechanna_register_image_sizes() {
	set_post_thumbnail_size( 370, 230, true );

	// Registers a new image sizes.
	add_image_size( 'mechanna-thumb-s', 150, 150, true );
	add_image_size( 'mechanna-thumb-m', 370, 400, true );
	add_image_size( 'mechanna-thumb-l', 770, 402, true );
	add_image_size( 'mechanna-thumb-xl', 1170, 780, true );
	add_image_size( 'mechanna-thumb-xxl', 1920, 1080, true );
	add_image_size( 'mechanna-author-avatar', 512, 512, true );

	add_image_size( 'mechanna-thumb-240-100', 240, 100, true );
	add_image_size( 'mechanna-thumb-560-350', 560, 350, true );


}
