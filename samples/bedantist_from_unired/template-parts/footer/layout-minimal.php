<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package __Tm
 */
?>

<div class="footer-container">
	<div <?php echo __tm_get_container_classes( array( 'site-info' ), 'footer' ); ?>>
		<div class="site-info__flex">
			<div class="site-info__mid-box"><?php
				__tm_footer_copyright();
				__tm_footer_menu();
			?></div>
			<?php __tm_social_list( 'footer' ); ?>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->