<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Mechanna
 */
?>

<div class="footer-container container">
	<div <?php echo mechanna_get_container_classes( array( 'site-info' ) ); ?>>
		<div class="site-info__flex">
			<?php mechanna_footer_logo(); ?>
			<div class="site-info__mid-box"><?php
				mechanna_footer_menu();
			?></div>
			<?php mechanna_social_list( 'footer' ); ?>
			<?php mechanna_footer_copyright(); ?>
		</div>
	</div><!-- .site-info -->
</div><!-- .container -->