<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mechanna
 */

while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content-single', get_post_format() );

	mechanna_post_author_bio();


	the_post_navigation( array(
		'next_text' => esc_html__( 'Next Post ', 'mechanna' ),
		'prev_text' => esc_html__( 'Previous Post ', 'mechanna' ),
	) );


	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;

endwhile; // End of the loop.
