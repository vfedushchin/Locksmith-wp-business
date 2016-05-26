<?php
/**
 * Template part for top panel in header.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __Tm
 */

// Don't show top panel if all elements are disabled
if ( ! bedentist_is_top_panel_visible() ) {
	return;
} ?>

<div class="top-panel">

	<div <?php echo bedentist_get_container_classes( array( 'top-panel__wrap' ), 'header' ); ?>><?php
		bedentist_social_list( 'header' );
		bedentist_top_message( '<div class="top-panel__message">%s</div>' );
		bedentist_top_menu();
	?></div>
</div><!-- .top-panel -->