<?php
/**
 * Template part for minimal Header layout.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package __Tm
 */
?>

<div class="header-container__flex">
	<div class="site-branding">
		<?php __tm_header_logo() ?>
		<?php __tm_site_description(); ?>
	</div>

	<div class="site-menu">
		<?php
		__tm_main_menu();
		__tm_top_search( '<div class="header__search">%s<span class="search__toggle fa  fa-search"></span></div>' );
		?>
	</div>
</div>
