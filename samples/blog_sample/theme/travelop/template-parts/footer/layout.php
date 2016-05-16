<?php
/**
 * The template for displaying the default footer layout.
 *
 * @package Travelop
 */

?>
<div class="footer-area-wrap centered invert">
	<div class="container">
        <div class="block-footer">
		    <?php do_action( 'travelop_render_widget_area', 'footer-area' ); ?>
        </div>
	</div>
</div>

<div class="footer-container centered">
    <div class="container">
        <div <?php echo travelop_get_container_classes( array( 'site-info' ) ); ?>>
            <div class="site-info__flex">
                <div class="site-info__mid-box"><?php
	                travelop_footer_logo();
                    travelop_footer_menu();
                    travelop_social_list( 'footer' );
                    travelop_footer_copyright();
                ?></div>
            </div>
        </div><!-- .site-info -->
    </div><!-- .container -->
</div><!-- .footer-container -->