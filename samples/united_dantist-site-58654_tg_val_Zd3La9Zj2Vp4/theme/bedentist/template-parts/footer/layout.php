<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package __Tm
 */

?>
<div class="footer-area-wrap ">
	<div class="container">
		<?php do_action( 'bedentist_render_widget_area', 'footer-area' ); ?>
	</div>
</div>

<div class="footer-container">
	<div <?php echo bedentist_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<div class="site-info__flex">
			<div class="site-info__mid-box"><?php
				bedentist_footer_copyright();
				bedentist_footer_menu();
			?></div>
			<?php bedentist_social_list( 'footer' ); ?>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->