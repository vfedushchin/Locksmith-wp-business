<?php
/**
 * Template part for centered Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __Tm
 */
?>

<div class="site-branding">
	<?php __tm_header_logo() ?>
	<?php __tm_site_description(); ?>
</div>

<div class="site-info">
	<?php
	__tm_header_phone_message( '<div class="phone__info">%s</div>' );
	__tm_header_time_message( '<div class="time__info">%s</div>' );
	?>
</div>

<div class="site-menu">
	<?php
	__tm_main_menu();
	__tm_top_search( '<div class="header__search">%s<span class="search__toggle fa  fa-search"></span></div>' );
	?>
</div>
