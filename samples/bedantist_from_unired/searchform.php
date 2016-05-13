<?php
/**
 * The template for displaying search form.
 *
 * @package __Tm
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', '__tm' ) ?></span>
		<input id="s" type="search" class="search-form__field"
			placeholder="<?php echo esc_attr_x( 'Enter keyword ', 'placeholder', '__tm' ) ?>"
			value="<?php echo get_search_query() ?>" name="s"
			title="<?php echo esc_attr_x( 'Search for:', 'label', '__tm' ) ?>" />
	</label>
	<button type="submit" class="search-form__submit btn"><i class="material-icons">search</i></button>
</form>