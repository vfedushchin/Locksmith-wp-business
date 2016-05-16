<?php
/**
 * Instagram widget.
 *
 * @package Travelop
 */

class Travelop_Instagram_Widget extends Cherry_Abstract_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'widget-instagram';
		$this->widget_description = esc_html__( 'Display a list of photos from Instagram network.', 'travelop' );
		$this->widget_id          = 'travelop_widget_instagram';
		$this->widget_name        = esc_html__( 'Instagram', 'travelop' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'value' => esc_html__( 'Instagram', 'travelop' ),
				'label' => esc_html__( 'Title', 'travelop' ),
			),
			'client_id' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Client ID', 'travelop' ),
			),
			'tag' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Hashtag (enter without `#` symbol)', 'travelop' ),
			),
			'image_counter' => array(
				'type'       => 'stepper',
				'value'      => '6',
				'max_value'  => '12',
				'min_value'  => '1',
				'step_value' => '1',
				'label'      => esc_html__( 'Number of photos', 'travelop' ),
			),
			'display_caption' => array(
				'type'  => 'checkbox',
				'value' => array(
					'display_caption_check' => 'false',
				),
				'options' => array(
					'display_caption_check' => esc_html__( 'Caption', 'travelop' ),
				),
			),
			'display_date' => array(
				'type'  => 'checkbox',
				'value' => array(
					'display_date_check' => 'false',
				),
				'options' => array(
					'display_date_check' => esc_html__( 'Date', 'travelop' ),
				),
			),
		);

		add_action( 'cherry_widget_after_update', array( $this, 'delete_cache' ) );
		parent::__construct();
	}

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {

		if ( empty( $instance['client_id'] ) ) {
			return print $args['before_widget'] . esc_html__( 'Please, enter your Instagram CLIENT ID.', 'travelop' ) . $args['after_widget'];
		}

		if ( empty( $instance['tag'] ) ) {
			return print $args['before_widget'] . esc_html__( 'Please, enter #hashtag.', 'travelop' ) . $args['after_widget'];
		}

		if ( $this->get_cached_widget( $args ) ) {
			return;
		}

		ob_start();

		$this->setup_widget_data( $args, $instance );
		$this->widget_start( $args, $instance );

		$client_id     = esc_attr( $instance['client_id'] );
		$tag           = esc_attr( $instance['tag'] );
		$image_counter = absint( $instance['image_counter'] );

		$config = array();

		$date_enabled    = ( ! empty( $instance['display_date'] ) )    ? $instance['display_date'] : false;
		$caption_enabled = ( ! empty( $instance['display_caption'] ) ) ? $instance['display_caption'] : false;

		// Date.
		if ( is_array( $date_enabled ) && 'true' === $date_enabled['display_date_check'] ) {
			$date_enabled = true;
		} else {
			$date_enabled = false;
		}

		if ( $date_enabled ) {
			$config[] = 'date';
		}

		// Caption.
		if ( is_array( $caption_enabled ) && 'true' === $caption_enabled['display_caption_check'] ) {
			$caption_enabled = true;
		} else {
			$caption_enabled = false;
		}

		if ( $caption_enabled ) {
			$config[] = 'caption';
		}

		$photos = $this->get_photos( $tag, $client_id, $image_counter, $config );

		if ( ! $photos ) {
			return print $args['before_widget'] . esc_html__( 'No photos. Maybe you entered a invalid CLIENT ID or hashtag.', 'travelop' ) . $args['after_widget'];
		}

		$template = locate_template( 'inc/widgets/instagram/views/instagram.php' );

		$date_format = get_option( 'date_format' );

		printf( '<div class="%s">',
			join( ' ', apply_filters( 'travelop_instagram_widget_wrapper_class', array( 'instagram__items' ) ) )
		);

		foreach ( (array) $photos as $photo ) {

			$image   = $this->get_image( $photo );
			$caption = $this->get_caption( $photo );
			$date    = $this->get_date( $photo, $date_format );

			include $template;
		}

		echo '</div>';

		$this->widget_end( $args );
		$this->reset_widget_data();
		wp_reset_postdata();

		echo $this->cache_widget( $args, ob_get_clean() );
	}

	/**
	 * Retrieve a photos.
	 *
	 * @since  1.0.0
	 * @param  string $data        Hashtag.
	 * @param  string $client_id   Instagram CLIENT ID.
	 * @param  int    $img_counter Number of images.
	 * @param  array  $config      Set of configuration.
	 * @return array
	 */
	public function get_photos( $data, $client_id, $img_counter, $config ) {

		$transient_key = $this->get_transient_key(
			array( 'image_counter' => $img_counter, 'tag' => $data )
		);

		$cached = get_transient( $transient_key );

		if ( false !== $cached ) {
			return $cached;
		}

		$old_url = 'https://api.instagram.com/v1/tags/' . $data . '/media/recent/';

		$url = add_query_arg(
			array( 'client_id' => esc_attr( $client_id ) ),
			$old_url
		);

		$response = wp_remote_get( $url );

		if ( is_wp_error( $response ) || empty( $response ) || '200' != $response ['response']['code'] ) {
			return false;
		}

		$result  = json_decode( wp_remote_retrieve_body( $response ), true );
		$counter = 1;
		$photos  = array();

		foreach ( $result['data'] as $photo ) {

			if ( $counter > $img_counter ) {
				break;
			}

			if ( 'image' != $photo['type'] ) {
				continue;
			}

			$_photo           = array();
			$_photo['link']   = $photo['link'];
			$_photo['image']  = $photo['images']['low_resolution']['url'];
			$_photo['width']  = $photo['images']['low_resolution']['width'];
			//$_photo['width']  = $photo['images']['thumbnail']['265'];
			$_photo['height'] = $photo['images']['low_resolution']['height'];
			//$_photo['height'] = $photo['images']['thumbnail']['265'];

			if ( in_array( 'date', $config ) ) {
				$_photo['date'] = sanitize_text_field( $photo['created_time'] );
			}

			if ( in_array( 'caption', $config ) ) {
				// $_photo['caption'] = wp_trim_words( $photo['caption']['text'], 3 );
				$caption           = strip_tags( $photo['caption']['text'] );
				$_photo['caption'] = substr(
					$caption,
					0,
					apply_filters( 'travelop_instagram_widget_caption_length', 10 )
				);
			}

			array_push( $photos, $_photo );
			$counter++;
		}

		set_transient( $transient_key, $photos, HOUR_IN_SECONDS );

		return $photos;
	}

	/**
	 * Get transient key to cache photos by key
	 *
	 * @return string
	 */
	public function get_transient_key( $instance = null ) {

		if ( ! isset( $instance['image_counter'] ) || ! isset( $instance['tag'] ) ) {
			return '';
		}

		return md5( $instance['tag'] . $instance['image_counter'] );
	}

	/**
	 * Retrieve a HTML tag with date.
	 *
	 * @since  1.0.0
	 * @param  array  $photo  Item photo data.
	 * @param  string $format Date format.
	 * @return string
	 */
	public function get_date( $photo, $format ) {

		if ( empty( $photo['date'] ) ) {
			return;
		}

		return sprintf( '<time class="instagram__date" datetime="%s">%s</time>', date( 'Y-m-d\TH:i:sP', $photo['date'] ), date( $format, $photo['date'] ) );
	}

	/**
	 * Retrieve a caption
	 *
	 * @since  1.0.0
	 * @param  array  $photo Item photo data.
	 * @return string
	 */
	public function get_caption( $photo ) {
		return ! empty( $photo['caption'] ) ? $photo['caption'] : '';
	}

	/**
	 * Retrieve a HTML link with image.
	 *
	 * @since  1.0.0
	 * @param  array  $photo Item photo data.
	 * @return string
	 */
	public function get_image( $photo ) {

		//$width  = ( ! empty( $photo['width'] ) ) ? $photo['width'] : 150;
		//$height = ( ! empty( $photo['height'] ) ) ? $photo['height'] : 150;

		$width  = ( ! empty( $photo['width'] ) ) ? $photo['width'] : 265;
		$height = ( ! empty( $photo['height'] ) ) ? $photo['height'] : 265;

		return sprintf( '<a class="instagram__link" href="%s" target="_blank" rel="nofollow"><img class="instagram__img" src="%s" alt="" width="%s" height="%s"><span class="instagram__cover"></span></a>', esc_url( $photo['link'] ), esc_url( $photo['image'] ), $width, $height );
	}

	/**
	 * Clear cache.
	 *
	 * @since 1.0.0
	 */
	public function delete_cache( $instance ) {
		delete_transient( $this->get_transient_key( $instance ) );
	}
}

add_action( 'widgets_init', 'travelop_register_instagram_widget' );
function travelop_register_instagram_widget() {
	register_widget( 'Travelop_Instagram_Widget' );
}