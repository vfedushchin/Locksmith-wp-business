<?php
/**
 * Template part for centered Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Mechanna
 */
?>

<div class="header-container__flex">
	<?php mechanna_social_list( 'header' ); ?>
	<div class="site-branding">
		<?php mechanna_header_logo() ?>
		<?php mechanna_site_description(); ?>
	</div>
	<?php mechanna_main_menu(); ?>
</div>