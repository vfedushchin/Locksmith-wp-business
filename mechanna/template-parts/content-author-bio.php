<?php
/**
 * The template for displaying author bio.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Mechanna
 * @subpackage widgets
 */
?>
<div class="post-author-bio">
	<div class="post-author__holder clear">
		<div class="post-author__avatar"><?php
			echo get_avatar( get_the_author_meta( 'user_email' ), 106, '', esc_attr( get_the_author_meta( 'nickname' ) ) );
		?></div>
		<h6 class="post-author__title"><?php
			printf( esc_html__( 'Written by %s', 'mechanna' ), mechanna_get_the_author_posts_link() );
		?></h6>
		<div class="post-author__content"><?php
			echo get_the_author_meta( 'description' );
		?></div>
	</div>
</div>