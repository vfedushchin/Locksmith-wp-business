<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mechanna
 */
?>

<section class="error-404 not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( '404', 'mechanna' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<h3><?php esc_html_e( 'The page not found...', 'mechanna' ); ?></h3>
		<p>
      <?php esc_html_e( "Can't find what you need? Take a moment and do a search below or start from", 'mechanna' ); ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'our homepage.', 'mechanna' ); ?></a>
    </p>

		<?php get_search_form(); ?>

	</div><!-- .page-content -->
</section><!-- .error-404 -->