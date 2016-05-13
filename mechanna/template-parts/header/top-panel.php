<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mechanna
 */

// Don't show top panel if all elements are disabled.
if ( ! mechanna_is_top_panel_visible() ) {
	return;
} ?>

<div class="top-panel">
	<div <?php echo mechanna_get_container_classes( array( 'top-panel__wrap' ) ); ?>><?php
		mechanna_top_message( '<div class="top-panel__message">%s</div>' );
		mechanna_top_search( '<div class="top-panel__search">%s</div>' );
		mechanna_top_menu();
	?></div>
</div><!-- .top-panel -->