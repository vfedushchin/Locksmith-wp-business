<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Travelop
 */
$sidebar_position = get_theme_mod( 'sidebar_position' );

if ( 'two-sidebars' !== $sidebar_position ) {
	return;
}

if ( ! is_active_sidebar( 'sidebar-secondary' ) ) {
	return;
}
if ( is_404() ) {
	return;
}
?>

<?php do_action( 'travelop_render_widget_area', 'sidebar-secondary' ); ?>
