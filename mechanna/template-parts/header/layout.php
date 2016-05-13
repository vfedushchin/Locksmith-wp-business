<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mechanna
 */
?>

<?php mechanna_social_list( 'header' ); ?>

<div class="site-branding">
	<?php mechanna_header_logo() ?>
	<?php mechanna_site_description(); ?>
</div>

<?php mechanna_main_menu(); ?>
