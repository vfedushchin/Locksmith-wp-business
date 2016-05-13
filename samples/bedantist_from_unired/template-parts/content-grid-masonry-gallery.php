<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __Tm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'posts-list__item card' ); ?>>
	<div class="post-list__item-content">


		<figure class="post-thumbnail">
			<?php __tm_post_formats_gallery(); ?>
			<?php __tm_sticky_label(); ?>
		</figure><!-- .post-thumbnail -->

		<header class="entry-header">
			<?php
			if (is_single()) {
				the_title('<h3 class="entry-title">', '</h3>');
			} else {
				the_title('<h4 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h4>');
			}

			?>
		</header><!-- .entry-header -->

		<?php if ('post' === get_post_type()) : ?>

			<div class="entry-meta">
				<?php

				__tm_meta_author(
					'loop',
					array(
						'before' => esc_html__('by', '__tm') . ' ',
					)
				);

				__tm_meta_date('loop', array(
					'before' => '',
				));

				__tm_meta_categories('loop');

				?>
			</div><!-- .entry-meta -->

		<?php endif; ?>


		<div class="entry-content">
			<?php __tm_blog_content();

			__tm_meta_tags('loop', array(
				'before' => 'Tags: ' . '  ',
				'separator' => ' ',
			));
			?>
		</div><!-- .entry-content -->

	</div>
	<footer class="entry-footer">
		<?php __tm_read_more();

		__tm_meta_comments('loop', array(
			'before' => '<i class="fa  fa-comment"></i>',
			'after' => esc_html__('comments ', '__tm'),
			'zero' => '0',
			'one' => '1',
			'plural' => '%',
		));

		?>
		<?php __tm_share_buttons('loop');

		?>


	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
