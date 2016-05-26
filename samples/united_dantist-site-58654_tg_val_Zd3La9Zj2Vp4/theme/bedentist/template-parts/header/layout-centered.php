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
	<?php bedentist_header_logo() ?>
	<?php bedentist_site_description(); ?>
</div>



<div class="site-menu">
	<?php
	bedentist_main_menu();
	bedentist_top_search( '<div class="header__search">%s<span class="search__toggle fa  fa-search"></span></div>' );
	?>
</div>
