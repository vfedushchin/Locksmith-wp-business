<?php
/**
 * Thumbnails configuration.
 *
 * @package __Tm
 */

add_action( 'after_setup_theme', '__tm_register_image_sizes', 5 );
function __tm_register_image_sizes() {
	set_post_thumbnail_size( 770, 560, true );

	// Registers a new image sizes.
	add_image_size( '__tm-thumb-s', 116, 116, true );
	add_image_size( '__tm-thumb-180', 180, 180, true );
	add_image_size( '__tm-thumb-270', 270, 270, true );
	add_image_size( '__tm-thumb-m', 370, 270, true );
	add_image_size( '__tm-thumb-550', 550, 550, true );
	add_image_size( '__tm-post-thumbnail-large', 770, 560, true );
	add_image_size( '__tm-thumb-l', 1170, 550, true );
}
