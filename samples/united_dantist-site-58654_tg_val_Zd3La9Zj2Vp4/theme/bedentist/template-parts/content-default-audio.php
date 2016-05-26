<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __Tm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-list__item card'); ?>>
    <div class="post-list__item-content">

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

                bedentist_meta_author(
                    'loop',
                    array(
                        'before' => esc_html__('by', 'bedentist') . ' ',
                    )
                );

                bedentist_meta_date('loop', array(
                    'before' => '',
                ));

                bedentist_meta_categories('loop');

                ?>
            </div><!-- .entry-meta -->

        <?php endif; ?>

        <div class="post-featured-content ">
            <?php do_action('cherry_post_format_audio'); ?>
            <?php bedentist_post_thumbnail(true); ?>
            <?php bedentist_sticky_label(); ?>
        </div><!-- .post-featured-content -->

        <div class="entry-content">

            <?php

            $embed_args = array(
                'fields' => array('soundcloud'),
                'height' => 310,
                'width' => 310,
            );

            $embed_content = apply_filters('cherry_get_embed_post_formats', false, $embed_args);

            if (false === $embed_content) {
                bedentist_blog_content();
            } else {
                printf('<div class="embed-wrapper">%s</div>', $embed_content);
            }

            bedentist_meta_tags('loop', array(
                'before' => 'Tags: ' . '  ',
                'separator' => ' ',
            ));
            ?>
        </div><!-- .entry-content -->

    </div>
    <footer class="entry-footer">
        <?php bedentist_read_more();

        bedentist_meta_comments('loop', array(
            'before' => '<i class="fa  fa-comment"></i>',
            'after' => esc_html__('comments ', 'bedentist'),
            'zero' => '0',
            'one' => '1',
            'plural' => '%',
        ));

        ?>
        <?php bedentist_share_buttons('loop'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
