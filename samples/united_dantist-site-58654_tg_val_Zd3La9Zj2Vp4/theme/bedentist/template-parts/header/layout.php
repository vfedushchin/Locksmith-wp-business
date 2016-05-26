<?php
/**
 * Template part for default Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __Tm
 */
?>


<div class="site-branding">
	<?php bedentist_header_logo() ?>
	<?php bedentist_site_description(); ?>
</div>

<div class="site-info">
	<?php
	bedentist_header_phone_message( '<div class="phone__info">%s</div>' );
	bedentist_header_time_message( '<div class="time__info">%s</div>' );
	?>
</div>

<div class="site-menu">
<?php
	bedentist_main_menu();
	bedentist_top_search( '<div class="header__search">%s<label for="s"><span class="search__toggle fa  fa-search"></span></label></div>' );
?>
</div>

