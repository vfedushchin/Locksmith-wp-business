<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travelop
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>

	<div class="post-list__item-content">
		<?php travelop_meta_categories( 'loop' ); ?>
		<?php travelop_sticky_label(); ?>

		<header class="entry-header">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
			?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

				$embed_args = array(
					'fields' => array( 'twitter', 'facebook' ),
					'height' => 300,
					'width'  => 300,
				);
				$embed_content = apply_filters( 'cherry_get_embed_post_formats', false, $embed_args );

				if ( false === $embed_content ) {
					travelop_blog_content();
				} else {
					printf( '<div class="embed-wrapper">%s</div>', $embed_content );
				}
			?>
		</div><!-- .entry-content -->

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php
					travelop_meta_date( 'loop', array(
                        'before' => '<i></i>',
					) );

					travelop_meta_comments( 'loop', array(
                        'before' => '<i class="material-icons">mode_comment</i>',
                        'zero'   => '0 Comments',
                        'one'    => '1 Comment',
                        'plural' => '% Comments',
					) );

					travelop_meta_tags( 'loop', array(
						'before'    => '<i></i>',
						'separator' => ', ',
					) );
				?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</div>
	<footer class="entry-footer">
		<?php travelop_share_buttons( 'loop' ); ?>
		<?php travelop_read_more(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
