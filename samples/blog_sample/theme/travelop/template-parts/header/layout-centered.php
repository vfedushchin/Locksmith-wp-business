<?php
/**
 * Template part for centered Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travelop
 */
?>
<div class="container">
    <div class="site-branding">
        <?php travelop_header_logo() ?>
        <?php travelop_site_description(); ?>
    </div>
</div>

<?php travelop_social_list( 'header' ); ?>
<?php travelop_main_menu(); ?>

