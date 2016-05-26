<?php
/**
 * Thumbnails configuration.
 *
 * @package __Tm
 */

add_action( 'after_setup_theme', 'bedentist_register_image_sizes', 5 );
function bedentist_register_image_sizes() {
	set_post_thumbnail_size( 770, 560, true );

	// Registers a new image sizes.
	add_image_size( 'bedentist-thumb-s', 116, 116, true );
	add_image_size( 'bedentist-thumb-180', 180, 180, true );
	add_image_size( 'bedentist-thumb-270', 270, 270, true );
	add_image_size( 'bedentist-thumb-m', 370, 270, true );
	add_image_size( 'bedentist-thumb-550', 550, 550, true );
	add_image_size( 'bedentist-post-thumbnail-large', 770, 560, true );
	add_image_size( 'bedentist-thumb-l', 1170, 550, true );
}
