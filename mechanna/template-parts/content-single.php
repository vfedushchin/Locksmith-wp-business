<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mechanna
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php $utility = mechanna_utility()->utility; ?>


	<figure class="post-thumbnail">
		<?php $utility->media->get_image( array(
				'size'        => 'mechanna-thumb-l2',
				'html'        => '<img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s">',
				'placeholder' => false,
				'echo'        => true,
			) );
		?>

		<?php $cats_visible = mechanna_is_meta_visible( 'single_post_categories', 'single' ) ? 'true' : 'false'; ?>
		<?php $utility->meta_data->get_terms( array(
				'visible' => $cats_visible,
				'type'    => 'category',
				'icon'    => '',
				'before'  => '<div class="post__cats">',
				'after'   => '</div>',
				'echo'    => true,
			) );
		?>
	</figure><!-- .post-thumbnail -->



	<header class="entry-header">


		<?php $utility->attributes->get_title( array(
				'class' => 'entry-title',
				'html'  => '<h1 %1$s>%4$s</h1>',
				'echo'  => true,
			) );
		?>

		<?php if ( 'post' === get_post_type() ) : ?>

			<div class="entry-meta">
				<?php $author_visible = mechanna_is_meta_visible( 'single_post_author', 'single' ) ? 'true' : 'false'; ?>
				<?php $utility->meta_data->get_author( array(
						'visible' => $author_visible,
						'class'   => 'posted-by__author',
						'prefix'  => esc_html__( 'by ', 'mechanna' ),
						'html'    => '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
						'echo'    => true,
					) );
				?>
				<span class="post__date">
					<?php $date_visible = mechanna_is_meta_visible( 'single_post_publish_date', 'single' ) ? 'true' : 'false';

						$utility->meta_data->get_date( array(
							'visible' => $date_visible,
							'class'   => 'post__date-link',
							'icon'    => '',
							'echo'    => true,
						) );
					?>
				</span>


				<span class="post__comments">
					<?php $comment_visible = mechanna_is_meta_visible( 'single_post_comments', 'single' ) ? 'true' : 'false';
						$utility->meta_data->get_comment_count( array(
							'visible' => $comment_visible,
							'class'   => 'post__comments-link',
							'sufix'     => _n_noop( '%s comment', '%s comments', 'mechanna' ),
							'echo'    => true,
						) );
					?>
				</span>


				<?php $tags_visible = mechanna_is_meta_visible( 'single_post_tags', 'single' ) ? 'true' : 'false'; ?>

				<?php $utility->meta_data->get_terms( array(
						'visible'   => $tags_visible,
						'type'      => 'post_tag',
						'delimiter' => ', ',
						'icon'      => '',
						'before'    => '<span class="post__tags">',
						'after'     => '</span>',
						'echo'      => true,
					) );
				?>
			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php mechanna_ads_post_before_content() ?>



	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links__title">' . __( 'Pages:', 'mechanna' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span class="page-links__item">',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'mechanna' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<div class="entry-footer__share-block">
			<?php
				if ( mechanna_is_meta_visible( 'single_post_share_buttons', 'single' ) ) {
					echo '<h6>' . __( 'Like this post? Share it!', 'mechanna' ) . '</h6>';
				}
				mechanna_share_buttons( 'single' );
			?>
		</div> <!-- .entry-footer__share-block -->
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->