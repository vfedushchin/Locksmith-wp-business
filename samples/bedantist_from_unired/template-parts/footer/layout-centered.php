<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package __Tm
 */

?>
<div class="footer-container">
	<div <?php echo __tm_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<?php
			__tm_social_list( 'footer' );
			__tm_footer_copyright();
			__tm_footer_menu();
		?>
	</div><!-- .site-info -->
</div><!-- .container -->