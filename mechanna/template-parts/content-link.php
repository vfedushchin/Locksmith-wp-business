<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mechanna
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>

	<?php $utility = mechanna_utility()->utility; ?>

	<div class="post-list__item-content">

		<figure class="post-thumbnail">
			<?php $size = mechanna_post_thumbnail_size( array( 'class_prefix' => 'post-thumbnail--' ) ); ?>

			<?php $utility->media->get_image( array(
					'size'        => $size['size'],
					'class'       => 'post-thumbnail__link ' . $size[ 'class' ],
					'html'        => '<a href="%1$s" %2$s><img class="post-thumbnail__img wp-post-image" src="%3$s" alt="%4$s" %5$s></a>',
					'placeholder' => false,
					'echo'        => true,
				) );
			?>

			<?php $cats_visible = mechanna_is_meta_visible( 'blog_post_categories', 'loop' ) ? 'true' : 'false'; ?>

			<?php $utility->meta_data->get_terms( array(
					'visible' => $cats_visible,
					'type'    => 'category',
					'icon'    => '',
					'before'  => '<div class="post__cats">',
					'after'   => '</div>',
					'echo'    => true,
				) );
			?>

			<?php mechanna_sticky_label(); ?>

			<div class="post-thumbnail__format-link">
				<?php do_action( 'cherry_post_format_link', array( 'render' => true ) ); ?>
			</div>

		</figure><!-- .post-thumbnail -->


		<header class="entry-header">

			<?php
				$title_html = ( is_single() ) ? '<h1 %1$s>%4$s</h1>' : '<h2 %1$s><a href="%2$s" rel="bookmark">%4$s</a></h2>';

				$utility->attributes->get_title( array(
					'class' => 'entry-title',
					'html'  => $title_html,
					'echo'  => true,
				) );
			?>


			<?php if ( 'post' === get_post_type() ) : ?>

				<div class="entry-meta">

					<?php $author_visible = mechanna_is_meta_visible( 'blog_post_author', 'loop' ) ? 'true' : 'false'; ?>
						<?php $utility->meta_data->get_author( array(
							'visible' => $author_visible,
							'class'   => 'posted-by__author',
							'prefix'  => esc_html__( 'by ', 'mechanna' ),
							'html'    => '<span class="posted-by">%1$s<a href="%2$s" %3$s %4$s rel="author">%5$s%6$s</a></span>',
							'echo'    => true,
						) );
					?>

					<span class="post__date">
						<?php $date_visible = mechanna_is_meta_visible( 'blog_post_publish_date', 'loop' ) ? 'true' : 'false';

							$utility->meta_data->get_date( array(
								'visible' => $date_visible,
								'class'   => 'post__date-link',
								'icon'    => '',
								'echo'    => true,
							) );
						?>
					</span>

					<?php $comment_visible = mechanna_is_meta_visible( 'blog_post_comments', 'loop' ) ? 'true' : 'false';
						$utility->meta_data->get_comment_count( array(
							'visible' => $comment_visible,
							'class'   => 'post__comments-link',
							'sufix'     => _n_noop( '%s comment', '%s comments', 'mechanna' ),
							'echo'    => true,
							'html'      => '<span class="post__comments"> %1$s<a href="%2$s" %3$s %4$s>%5$s%6$s</a></span>',
						) );
					?>

					<?php $tags_visible = mechanna_is_meta_visible( 'blog_post_tags', 'loop' ) ? 'true' : 'false';

						$utility->meta_data->get_terms( array(
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

		<div class="entry-content">
			<?php $blog_content = get_theme_mod( 'blog_posts_content', mechanna_theme()->customizer->get_default( 'blog_posts_content' ) );
				$length = ( 'full' === $blog_content ) ? 0 : 55;

				$utility->attributes->get_content( array(
					'length'       => $length,
					'content_type' => 'post_excerpt',
					'echo'         => true,
				) );
			?>
		</div><!-- .entry-content -->



	</div><!-- .post-list__item-content -->

	<footer class="entry-footer">
		<?php mechanna_share_buttons( 'loop' ); ?>

		<?php $utility->attributes->get_button( array(
				'class' => 'btn btn-secondary',
				'text'  => get_theme_mod( 'blog_read_more_text', mechanna_theme()->customizer->get_default( 'blog_read_more_text' ) ),
				'icon'  => '<i class="material-icons">arrow_forward</i>',
				'html'  => '<a href="%1$s" %3$s><span class="btn__text">%4$s</span>%5$s</a>',
				'echo'  => true,
			) );
		?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->