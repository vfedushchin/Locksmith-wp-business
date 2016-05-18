<?php
/**
 * Post Meta Template Functions.
 *
 * @package Mechanna
 */

/**
 * Print HTML with a share buttons.
 *
 * @since  1.0.0
 * @return array
 */
function mechanna_share_buttons( $context = 'loop', $args = array(), $config = array() ) {

	if ( 'loop' == $context ) {
		$meta = 'blog_post_share_buttons';
	} else {
		$meta = 'single_post_share_buttons';
	}


	if ( ! mechanna_is_meta_visible( $meta, $context ) ) {
		return;
	}

	/**
	 * Default social networks.
	 *
	 * @since 1.0.0
	 *
	 * $1%s - `id`
	 * $2%s - `type`
	 * $3%s - `url`
	 * $4%s - `title`
	 * $4%s - `summary`
	 * $6%s - `thumbnail`
	 */
	$defaults = apply_filters( 'mechanna_default_args_share_buttons', array(
		'facebook' => array(
			'icon'      => 'fa fa-facebook',
			'name'      => esc_html__( 'Facebook', 'mechanna' ),
			'share_url' => 'https://www.facebook.com/sharer/sharer.php?u=%3$s&t=%4$s',
		),
		'twitter' => array(
			'icon'      => 'fa fa-twitter',
			'name'      => esc_html__( 'Twitter', 'mechanna' ),
			'share_url' => 'https://twitter.com/intent/tweet?url=%3$s&text=%4$s',
		),
		'google-plus' => array(
			'icon'      => 'fa fa-google-plus',
			'name'      => esc_html__( 'Google+', 'mechanna' ),
			'share_url' => 'https://plus.google.com/share?url=%3$s',
		),
		'linkedin' => array(
			'icon'      => 'fa fa-linkedin',
			'name'      => esc_html__( 'LinkedIn', 'mechanna' ),
			'share_url' => 'http://www.linkedin.com/shareArticle?mini=true&url=%3$s&title=%4$s&summary=%5$s&source=%3$s',
		),
		'pinterest' => array(
			'icon'      => 'fa fa-pinterest',
			'name'      => esc_html__( 'Pinterest', 'mechanna' ),
			'share_url' => 'https://www.pinterest.com/pin/create/button/?url=%3$s&description=%4$s&media=%6$s',
		),
	) );

	$networks = wp_parse_args( $args, $defaults );

	$default_config = apply_filters( 'mechanna_default_config_share_buttons', array(
		'http'         => is_ssl() ? 'https' : 'http',
		'custom_class' => '',
	) );

	$config = wp_parse_args( $config, $default_config );

	// Prepare a data for sharing.
	$id           = get_the_ID();
	$type         = get_post_type( $id );
	$url          = get_permalink( $id );
	$title        = get_the_title( $id );
	$summary      = get_the_excerpt();
	$thumbnail_id = get_post_thumbnail_id( $id );
	$thumbnail    = '';

	if ( ! empty( $thumbnail_id ) ) {
		$thumbnail = wp_get_attachment_image_src( $thumbnail_id, 'full' );
		$thumbnail = $thumbnail[0];
	}

	$share_item_html = apply_filters( 'mechanna_share_button_html',
		'<div class="share-btns__item %2$s-item"><a class="share-btns__link" href="%1$s" target="_blank" rel="nofollow" title="%3$s"><i class="%4$s"></i><span class="share-btns__label screen-reader-text">%5$s</span></a></div>'
	);
	$share_buttons = '';

	foreach ( (array) $networks as $id => $network ) :

		if ( empty( $network['share_url'] ) ) {
			continue;
		}

		$share_url = sprintf( $network['share_url'],
			urlencode( $id ),
			urlencode( $type ),
			urlencode( $url ),
			urlencode( $title ),
			urlencode( $summary ),
			urlencode( $thumbnail )
		);

		$share_buttons .= sprintf(
			$share_item_html,
			htmlentities( $share_url ),
			sanitize_html_class( $id ),
			esc_html__( 'Share on ', 'mechanna' ) . $network['name'],
			esc_attr( $network['icon'] ),
			esc_attr( $network['name'] )
		);

	endforeach;

	printf(
		'<div class="share-btns__list %1$s">%2$s</div>',
		esc_attr( $config['custom_class'] ),
		$share_buttons
	);
}






/**
 * Prints HTML with meta information for the current post comments.
 *
 * @since  1.0.0
 * @param  string $context Current post context - 'single' or 'loop'.
 * @param  array  $args    Arguments array.
 * @return void
 */
function mechanna_meta_comments( $context = 'loop', $args = array() ) {

	if ( post_password_required() || ! comments_open() ) {
		return;
	}

	if ( 'loop' == $context ) {
		$meta = 'blog_post_comments';
	} else {
		$meta = 'single_post_comments';
	}

	if ( ! mechanna_is_meta_visible( $meta, $context ) ) {
		return;
	}

	$args = wp_parse_args( $args, array(
		'container' => 'span',
		'before'    => '',
		'after'     => '',
		'zero'      => '',
		'one'       => '',
		'plural'    => '',
	) );

	/**
	 * Filter post comments output format.
	 *
	 * @var string
	 */
	$comments_format = apply_filters(
		'mechanna_meta_comments_format',
		'<%1$s class="post__comments">%2$s%4$s%3$s</%1$s>',
		$context
	);

	ob_start();
	comments_popup_link(
		esc_html( $args['zero'] ), esc_html( $args['one'] ), esc_html( $args['plural'] ), 'post-comments__link'
	);
	$comments_link = ob_get_clean();

	printf(
		$comments_format,
		esc_attr( $args['container'] ),
		$args['before'],
		$args['after'],
		$comments_link
	);

}
