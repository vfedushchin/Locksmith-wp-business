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
                __tm_meta_author(
                    'single',
                    array(
                        'before' => esc_html__('by', '__tm') . ' ',
                    )
                );

                __tm_meta_date('single', array(
                    'before' => '',
                ));

                __tm_meta_categories('single');

                ?>

            </div><!-- .entry-meta -->

        <?php endif; ?>
    </header><!-- .entry-header -->

    <figure class="post-thumbnail">
        <?php __tm_post_thumbnail(false); ?>
    </figure><!-- .post-thumbnail -->


    <div class="entry-content">
        <?php the_content(); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', '__tm'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <div class="entry-footer__inner">
            <?php
            __tm_meta_tags('single', array(
                'before' => 'Tags: ' . '  ',
                'separator' => ' ',
            ));

            __tm_meta_comments('single', array(
                'before' => '<i class="fa fa-comment"></i>',
                'after' => esc_html__('comments ', '__tm'),
                'zero' => '0',
                'one' => '1',
                'plural' => '%',
            ));
            ?>
        </div>
        <?php __tm_share_buttons('single'); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->
