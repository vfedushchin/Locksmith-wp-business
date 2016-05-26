<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __Tm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			bedentist_meta_categories( 'single' );
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">

				<?php
					bedentist_meta_author(
						'single',
						array(
							'before' => esc_html__( 'Posted by', 'bedentist' ) . ' ',
						)
					);

					bedentist_meta_date( 'single', array(
						'before' => '<i class="material-icons">event</i>',
					) );

					bedentist_meta_comments( 'single', array(
						'before' => '<i class="material-icons">mode_comment</i>',
						'zero'   => '0',
						'one'    => '1',
						'plural' => '%',
					) );
				?>

			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<figure class="post-thumbnail">
		<?php bedentist_post_thumbnail( false ); ?>
		<div class="post-thumbnail__format-link">
			<?php do_action( 'cherry_post_format_link', array( 'render' => true, 'class' => 'invert' ) ); ?>
		</div>
	</figure><!-- .post-thumbnail -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bedentist' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			bedentist_meta_tags( 'single', array(
				'before'    => '<i class="material-icons">folder_open</i>',
				'separator' => ', ',
			) );
		?>
		<?php bedentist_share_buttons( 'single' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
