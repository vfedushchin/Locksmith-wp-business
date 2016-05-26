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

        the_title('<h3 class="entry-title">', '</h3>');


        ?>



        <?php if ('post' === get_post_type()) : ?>

            <div class="entry-meta">

                <?php
                bedentist_meta_author(
                    'single',
                    array(
                        'before' => esc_html__('by', 'bedentist') . ' ',
                    )
                );

                bedentist_meta_date('single', array(
                    'before' => '',
                ));

                bedentist_meta_categories('single');

                ?>

            </div><!-- .entry-meta -->

        <?php endif; ?>
    </header><!-- .entry-header -->

    <figure class="post-thumbnail">
        <?php bedentist_post_thumbnail(false); ?>
    </figure><!-- .post-thumbnail -->


    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'bedentist'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <div class="entry-footer__inner">
            <?php
            bedentist_meta_tags('single', array(
                'before' => 'Tags: ' . '  ',
                'separator' => ' ',
            ));

            bedentist_meta_comments('single', array(
                'before' => '<i class="fa fa-comment"></i>',
                'after' => esc_html__('comments ', 'bedentist'),
                'zero' => '0',
                'one' => '1',
                'plural' => '%',
            ));
            ?>
        </div>
        <?php bedentist_share_buttons('single'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
