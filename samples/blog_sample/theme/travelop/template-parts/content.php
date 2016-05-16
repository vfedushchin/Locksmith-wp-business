<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travelop
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card hentry' ); ?>>
	<div class="post-list__item-content">

		<figure class="post-thumbnail">
			<?php travelop_post_thumbnail( true ); ?>
			<?php travelop_meta_categories( 'loop' ); ?>
			<?php travelop_sticky_label(); ?>
		</figure><!-- .post-thumbnail -->


        <?php if ( 'post' === get_post_type() ) : ?>

            <div class="entry-meta">
<!--                <span>&mdash;&nbsp;&nbsp;</span>-->
                <?php
                travelop_meta_author(
                    'loop',
                    array(
                        'before' => esc_html__( '&mdash;&nbsp;&nbsp;By', 'travelop' ) . ' ',
                    )
                );
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
//                    'before'    => '<span>Tags</span>',
                    'separator' => ', ',
                ) );
                ?>
            </div><!-- .entry-meta -->

        <?php endif; ?>

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
			<?php travelop_blog_content(); ?>
		</div><!-- .entry-content -->

	</div>
	<footer class="entry-footer">
		<?php travelop_read_more(); ?>
		<?php travelop_share_buttons( 'loop' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
