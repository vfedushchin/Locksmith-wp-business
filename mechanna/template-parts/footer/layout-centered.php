<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Mechanna
 */

?>
<div class="footer-container container">
  <div <?php echo mechanna_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<?php
      mechanna_footer_logo();
      mechanna_social_list( 'footer' );
      mechanna_footer_menu();
      mechanna_footer_copyright();
		?>
	</div><!-- .site-info -->
</div><!-- .container -->