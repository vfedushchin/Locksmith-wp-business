<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package __Tm
 */

?>
<div class="footer-container">
	<div <?php echo bedentist_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<?php
			bedentist_social_list( 'footer' );
			bedentist_footer_copyright();
			bedentist_footer_menu();
		?>
	</div><!-- .site-info -->
</div><!-- .container -->