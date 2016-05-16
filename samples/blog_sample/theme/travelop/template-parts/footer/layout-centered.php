<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Travelop
 */

?>
<div class="footer-container">
	<div <?php echo travelop_get_container_classes( array( 'site-info' ) ); ?>>
		<?php
			travelop_footer_logo();
			travelop_footer_menu();
			travelop_social_list( 'footer' );
			travelop_footer_copyright();
		?>
	</div><!-- .site-info -->
</div><!-- .container -->