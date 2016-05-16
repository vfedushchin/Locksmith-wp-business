<?php
/**
 * Thumbnails configuration.
 *
 * @package Travelop
 */

add_action( 'after_setup_theme', 'travelop_register_image_sizes', 5 );
function travelop_register_image_sizes() {
	set_post_thumbnail_size( 370, 230, true );

	// Registers a new image sizes.
	add_image_size( '__tm-thumb-s', 150, 150, true );
	add_image_size( '__tm-thumb-240-100', 240, 100, true );
    add_image_size( '__tm-thumb-xs', 670, 716, true );
	add_image_size( '__tm-thumb-m', 400, 400, true );
	add_image_size( '__tm-thumb-560-350', 560, 350, true );
	add_image_size( '__tm-post-thumbnail-large', 770, 490, true );
	add_image_size( '__tm-thumb-l', 1170, 780, true );
	add_image_size( '__tm-thumb-xl', 1920, 1080, true );
}
