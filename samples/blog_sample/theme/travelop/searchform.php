<?php
/**
 * The template for displaying search form.
 *
 * @package Travelop
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'travelop' ) ?></span>
		<input type="search" class="search-form__field"
			placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'travelop' ) ?>"
			value="<?php echo get_search_query() ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label', 'travelop' ) ?>" />
	</label>
	<button type="submit" class="search-form__submit btn"><i class="material-icons">search</i></button>
</form>