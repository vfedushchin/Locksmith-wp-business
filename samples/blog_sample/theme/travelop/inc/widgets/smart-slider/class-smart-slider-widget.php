<?php
/**
 * Smart Slider widget.
 *
 * @package Travelop
 */

if ( ! class_exists( 'Travelop_Smart_Slider_Widget' ) ) {

	class Travelop_Smart_Slider_Widget extends Cherry_Abstract_Widget {

		/**
		 * Constructor.
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			Cherry_Utility::utility_composition( $this );

			$this->widget_cssclass    = 'travelop widget_smart_slider';
			$this->widget_description = esc_html__( 'Display smart slider on your site.', 'travelop' );
			$this->widget_id          = 'widget_smart_slider';
			$this->widget_name        = esc_html__( 'Smart Slider', 'travelop' );
			$this->settings           = array(
				'title' => array(
					'type'				=> 'text',
					'value'				=> esc_html__( 'Smart Slider', 'travelop' ),
					'label'				=> esc_html__( 'Title', 'travelop' ),
				),
				'terms_type' => array(
					'type'				=> 'radio',
					'value'				=> 'category',
					'options' => array(
						'category' => array(
							'label'		=> esc_html__( 'Category', 'travelop' ),
							'slave'		=> 'terms_type_category',
						),
						'post_tag' => array(
							'label'		=> esc_html__( 'Tag', 'travelop' ),
							'slave'		=> 'terms_type_post_tag',
						),
					),
					'label'				=> esc_html__( 'Choose taxonomy type', 'travelop' ),
				),
				'categories' => array(
					'type'				=> 'select',
					'size'				=> 1,
					'value'				=> '',
					'options_callback'	=> array( $this->utility->satellite, 'get_terms_array', array( 'category', 'slug' ) ),
					'options'			=> false,
					'label'				=> esc_html__( 'Select category', 'travelop' ),
					'multiple'			=> true,
					'placeholder'		=> esc_html__( 'Select category', 'travelop' ),
					'master'			=> 'terms_type_category',
				),
				'tags' => array(
					'type'				=> 'select',
					'size'				=> 1,
					'value'				=> '',
					'options_callback'	=> array( $this->utility->satellite, 'get_terms_array', array( 'post_tag', 'slug' ) ),
					'options'			=> false,
					'label'				=> esc_html__( 'Select tags', 'travelop' ),
					'multiple'			=> true,
					'placeholder'		=> esc_html__( 'Select tags', 'travelop' ),
					'master'			=> 'terms_type_post_tag',
				),
				'posts_per_page' => array(
					'type'				=> 'stepper',
					'value'				=> 3,
					'max_value'			=> 50,
					'min_value'			=> 1,
					'label'				=> esc_html__( 'Posts count', 'travelop' ),
				),
				'post_title' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display title', 'travelop' ),
				),
				'content' => array(
					'type'				=> 'switcher',
					'value'				=> 'false',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display content', 'travelop' ),
				),
				'more_button' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display more button', 'travelop' ),
					'toggle' => array(
						'true_toggle'	=> esc_html__( 'On', 'travelop' ),
						'false_toggle'	=> esc_html__( 'Off', 'travelop' ),
						'true_slave'	=> 'more_button_attr',
						'false_slave'	=> '',
					),
				),
				'more_button_text' => array(
					'type'				=> 'text',
					'value'				=> esc_html__( 'Read more', 'travelop' ),
					'label'				=> esc_html__( 'More button text', 'travelop' ),
					'master'			=> 'more_button_attr',
				),
				'trim_words' => array(
					'type'				=> 'slider',
					'value'				=> 15,
					'max_value'			=> 55,
					'min_value'			=> 1,
					'step_value'		=> 1,
					'label'				=> esc_html__( 'Content words trimmed count', 'travelop' ),
				),
				'width' => array(
					'type'				=> 'text',
					'value'				=> '100%',
					'label'				=> esc_html__( 'Slider width', 'travelop' ),
				),
				'height' => array(
					'type'				=> 'text',
					'value'				=> '800',
					'label'				=> esc_html__( 'Slider height', 'travelop' ),
				),
				'orientation' => array(
					'type'				=> 'select',
					'size'				=> 1,
					'value'				=> 'horizontal',
					'options' => array(
						'horizontal'	=> esc_html__( 'Horizontal', 'travelop' ),
						'vertical'		=> esc_html__( 'Vertical', 'travelop' ),
					),
					'label'				=> esc_html__( 'Slider orientation', 'travelop' ),
				),
				'slide_distance' => array(
					'type'				=> 'slider',
					'value'				=> 10,
					'max_value'			=> 100,
					'min_value'			=> 0,
					'label'				=> esc_html__( 'Slide distance(px)', 'travelop' ),
				),
				'slide_duration' => array(
					'type'				=> 'slider',
					'value'				=> 500,
					'max_value'			=> 3000,
					'min_value'			=> 100,
					'step_value'		=> 100,
					'label'				=> esc_html__( 'Slide duration(ms)', 'travelop' ),
				),
				'slide_fade' => array(
					'type'				=> 'switcher',
					'value'				=> 'false',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Use fade effect?', 'travelop' ),
				),
				'navigation' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Use navigation?', 'travelop' ),
					'toggle' => array(
						'true_toggle'	=> esc_html__( 'On', 'travelop' ),
						'false_toggle'	=> esc_html__( 'Off', 'travelop' ),
						'true_slave'	=> 'navigation_button',
						'false_slave'	=> ''
					),
				),
				'fade_navigation' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Indicates whether the arrows will fade in only on hover', 'travelop' ),
					'master'			=> 'navigation_button',
				),
				'pagination' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Use pagination?', 'travelop' ),
				),
				'autoplay' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Use autoplay?', 'travelop' ),
				),
				'fullScreen' => array(
					'type'				=> 'switcher',
					'value'				=> 'false',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display fullScreen button?', 'travelop' ),
				),
				'shuffle' => array(
					'type'				=> 'switcher',
					'value'				=> 'false',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Indicates if the slides will be shuffled', 'travelop' ),
				),
				'loop' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Use infinite scrolling?', 'travelop' ),
				),
				'thumbnails' => array(
					'type'				=> 'switcher',
					'value'				=> 'false',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display thumbnails?', 'travelop' ),
					'toggle'			=> array(
						'true_toggle'	=> esc_html__( 'On', 'travelop' ),
						'false_toggle'	=> esc_html__( 'Off', 'travelop' ),
						'true_slave'	=> 'thumbnails_attr',
						'false_slave'	=> ''
					),
				),
				'thumbnails_position' => array(
					'type'				=> 'select',
					'size'				=> 1,
					'value'				=> 'bottom',
					'options' => array(
						'bottom'		=> esc_html__( 'Bottom', 'travelop' ),
					),
					'label'				=> esc_html__( 'Sets the position of the thumbnail scroller', 'travelop' ),
					'master'			=> 'thumbnails_attr',
				),
				'thumbnails_arrows' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display thumbnails arrows?', 'travelop' ),
					'master'			=> 'thumbnails_attr',
				),
			);

			parent::__construct();

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 9 );
		}

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 *
		 * @since  1.0.0
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {

			if ( $this->get_cached_widget( $args ) ) {
				return;
			}

			ob_start();

			$this->setup_widget_data( $args, $instance );
			$this->widget_start( $args, $instance );

			$categories_array	= ( isset( $this->instance['categories'] ) ) ? $this->instance['categories'] : array();
			$tags_array			= ( isset( $this->instance['tags'] ) ) ? $this->instance['tags'] : array();

			$tax_query = array();

			if ( 'category' == $this->instance['terms_type'] ) {
				if ( ( is_array( $categories_array ) && ! empty( $categories_array ) ) ) {
					array_push( $tax_query, array(
						'taxonomy'	=> 'category',
						'field'		=> 'slug',
						'terms'		=> $categories_array,
					));
				}
			} else {
				if ( ( is_array( $tags_array ) && ! empty( $tags_array ) ) ) {
					array_push( $tax_query, array(
						'taxonomy'	=> 'post_tag',
						'field'		=> 'slug',
						'terms'		=> $tags_array,
					));
				}
			}

			// The Query.
			$posts_query = $this->get_query_slider_items( array(
				'posts_per_page'	=> $this->instance['posts_per_page'],
				'tax_query'			=> $tax_query,
			) );

			if ( $posts_query ) {
				$html = $this->render_slider( $posts_query );
			} else {
				$html = '<h4>' . esc_html__( 'Posts for slider not found', 'travelop' ) . '</h4>';
			}

			echo $html;

			$this->widget_end( $args );
			$this->reset_widget_data();
			wp_reset_postdata();

			echo $this->cache_widget( $args, ob_get_clean() );
		}

		/**
		 * Smart Slider rendering.
		 *
		 * @since  1.0.0
		 * @return string
		 */
		public function render_slider( $posts_query ) {
			$this->instance['shuffle'] = ( count( $posts_query->posts ) > 2 ) ? $this->instance['shuffle'] : 'false';

			$uniq_id = 'slider-pro-' . uniqid();
			$slider_html_attr  = 'data-id="' . $uniq_id . '"';
			$slider_html_attr .= ' data-width="' . esc_attr( $this->instance['width'] ) . '"';
			$slider_html_attr .= ' data-height="' . esc_attr( $this->instance['height'] ) . '"';
			$slider_html_attr .= ' data-orientation="' . esc_attr( $this->instance['orientation'] ) . '"';
			$slider_html_attr .= ' data-slide-distance="' . esc_attr( $this->instance['slide_distance'] ) . '"';
			$slider_html_attr .= ' data-slide-duration="' . esc_attr( $this->instance['slide_duration'] ) . '"';
			$slider_html_attr .= ' data-slide-fade="' . esc_attr( $this->instance['slide_fade'] ) . '"';
			$slider_html_attr .= ' data-navigation="' . esc_attr( $this->instance['navigation'] ) . '"';
			$slider_html_attr .= ' data-fade-navigation="' . esc_attr( $this->instance['fade_navigation'] ) . '"';
			$slider_html_attr .= ' data-pagination="' . esc_attr( $this->instance['pagination'] ) . '"';
			$slider_html_attr .= ' data-autoplay="' . esc_attr( $this->instance['autoplay'] ) . '"';
			$slider_html_attr .= ' data-fullScreen="' . esc_attr( $this->instance['fullScreen'] ) . '"';
			$slider_html_attr .= ' data-shuffle="' . esc_attr( $this->instance['shuffle'] ) . '"';
			$slider_html_attr .= ' data-loop="' . esc_attr( $this->instance['loop'] ) . '"';
			$slider_html_attr .= ' data-thumbnails="' . esc_attr( $this->instance['thumbnails'] ) . '"';
			$slider_html_attr .= ' data-thumbnails-arrows="' . esc_attr( $this->instance['thumbnails_arrows'] ) . '"';
			$slider_html_attr .= ' data-thumbnails-position="' . esc_attr( $this->instance['thumbnails_position'] ) . '"';
			$slider_html_attr .= ' data-thumbnails-width="240"';
			$slider_html_attr .= ' data-thumbnails-height="100"';

			$html = '<div class="travelop-smartslider" ' . $slider_html_attr . '>';
				$html .= '<div id="' . $uniq_id . '" class="travelop-smartslider__instance slider-pro">';
					$html .= '<div class="travelop-smartslider__slides sp-slides">';
						$html .= $this->get_slider_loop( $posts_query );
					$html .= '</div>';

					if ( 'true' == $this->instance['thumbnails'] ) {
						$html .= '<div class="travelop-smartslider__thumbnails sp-thumbnails">';
							$html .= $this->get_slider_thumbnails( $posts_query );
						$html .= '</div>';
					}
				$html .= '</div>';
			$html .= '</div>';

			return $html;
		}

		/**
		 * Get slider items.
		 *
		 * @since  1.0.0
		 * @param  array|string $query_args Arguments to be passed to the query.
		 * @return array|bool               Array if true, boolean if false.
		 */
		public function get_query_slider_items( $query_args = array() ) {

			$defaults_query_args = apply_filters( 'travelop_smart_slider_default_query_args', array(
				'post_type'				=> 'post',
				'orderby'				=> 'date',
				'order'					=> 'DESC',
				'posts_per_page'		=> -1,
				'offset'				=> 0,
				'tax_query'				=> array(),
				'ignore_sticky_posts'	=> 1,
			) );

			$query_args = wp_parse_args( $query_args, $defaults_query_args );
			$query_args = array_intersect_key( $query_args, $defaults_query_args );
			// The Query.
			$posts_query = new WP_Query( $query_args );

			if ( ! is_wp_error( $posts_query ) && $posts_query->have_posts() ) {
				$posts_query->set( 'posts_per_page', $query_args[ 'posts_per_page' ] );

				return $posts_query;
			} else {
				return false;
			}
		}

		/**
		 * Get slider loop.
		 *
		 * @since  1.0.0
		 * @param  array  $posts_query List of WP_Post objects.
		 * @return string
		 */
		public function get_slider_loop( $posts_query ) {
			/**
			 * Title layer settings.
			 *
			 * @link https://github.com/bqworks/slider-pro/blob/master/docs/modules.md
			 * @var  array
			 */
			$title_settings = apply_filters( 'travelop_smart_slider_title_settings', array(
				//'width'				=> '100%%',
				'horizontal'		=> '0%%',
				'vertical'			=> '0%%',
				'show_transition'	=> 'left',
				'show_duration'		=> 500,
				'show_delay'		=> 500,
				'hide_transition'	=> 'left',
				'hide_duration'		=> 500,
				'hide_delay'		=> 700,
			), $this->instance );

			$title_attr = $this->generate_layer_attrline( $title_settings );

			/**
			 * Content layer settings.
			 *
			 * @link https://github.com/bqworks/slider-pro/blob/master/docs/modules.md
			 * @var  array
			 */
			$content_settings = apply_filters( 'travelop_smart_slider_content_settings', array(
				//'width'				=> '90%%',
				'horizontal'		=> '0%%',
				'vertical'			=> '0%%',
				'show_transition'	=> 'left',
				'show_duration'		=> 500,
				'show_delay'		=> 800,
				'hide_transition'	=> 'left',
				'hide_duration'		=> 500,
				'hide_delay'		=> 400,
			), $this->instance );

			$content_attr = $this->generate_layer_attrline( $content_settings );

			/**
			 * More button layer settings.
			 *
			 * @link https://github.com/bqworks/slider-pro/blob/master/docs/modules.md
			 * @var  array
			 */
			$more_settings = apply_filters( 'travelop_smart_slider_more_button_settings', array(
				//'width'				=> '90%%',
				'horizontal'		=> '0%%',
				'vertical'			=> '0%%',
				'show_transition'	=> 'left',
				'show_duration'		=> 500,
				'show_delay'		=> 1100,
				'hide_transition'	=> 'left',
				'hide_duration'		=> 500,
				'hide_delay'		=> 100,
			), $this->instance );

			$more_attr = $this->generate_layer_attrline( $more_settings );

			$html = '';

			while ( $posts_query->have_posts() ) : $posts_query->the_post();
				$post_id   = get_the_ID();
				$permalink = get_permalink();

				$html .= '<div class="sp-slide">';
					$html .= $this->utility->media->get_image( array(
						'size'			=> '__tm-thumb-xl',
						'mobile_size'	=> '__tm-thumb-xs',
						'class'			=> 'sp-image',
					) );

                $html .= '<div class="caption">';
					$html .= $this->utility->attributes->get_title( array(
						'visible'		=> $this->instance['post_title'],
						'class'			=> 'sp-title sp-layer',
						'html'			=> '<h2 %1$s '. $title_attr .'><a href="%2$s" title="%3$s">%4$s</a></h2>',
					) );

					$html .= $this->utility->attributes->get_content( array(
						'visible'		=> $this->instance['content'],
						'length'		=> (int) $this->instance['trim_words'],
                        'content_type'	=> 'post_excerpt',
						'class'			=> 'sp-content sp-layer',
						'html'			=> '<p %1$s ' . $content_attr . '>%2$s</p>',
					) );

					$html .= $this->utility->attributes->get_button( array(
						'visible'		=> $this->instance['more_button'],
						'text'			=> $this->use_wpml_translate( 'more_button_text' ),
						'icon'			=> '',
						'html'			=> '<div ' . $more_attr . ' class="sp-more sp-layer" ><a href="%1$s" title="%2$s" %3$s >%4$s%5$s</a></div>',
					) );
                $html .= '</div>';

				$html .= '</div>';

			endwhile;

			// Reset the query.
			//wp_reset_postdata();

			return $html;
		}

		/**
		 * Get thumbnails images list.
		 *
		 * @since  1.0.0
		 * @param  object $posts_query Result post query.
		 * @return string $html
		 */
		public function get_slider_thumbnails( $posts_query ) {
			$html = '';

			while ( $posts_query->have_posts() ) : $posts_query->the_post();
				$html .= '<div class="sp-thumbnail">';
					$html .= $this->utility->media->get_image( array(
								'size'			=> '__tm-thumb-240-100',
								'mobile_size'	=> '__tm-thumb-s',
							) );
				$html .= '</div>';

			endwhile;

			// Reset the query.
			//wp_reset_postdata();

			return $html;
		}

		/**
		 * Slider layer attributes line generator.
		 *
		 * @since  1.0.0
		 * @param  array  $settings Attributes line settings.
		 * @return string
		 */
		public function generate_layer_attrline( $settings ) {
			$attr_line = '';
			if ( ! empty( $settings ) && is_array( $settings ) ) {
				//$attr_line .= ' data-width="' . esc_attr( $settings['width'] ) . '"';
				$attr_line .= ' data-horizontal="' . esc_attr( $settings['horizontal'] ) . '"';
				$attr_line .= ' data-vertical="' . esc_attr( $settings['vertical'] ) . '"';
				$attr_line .= ' data-show-transition="' . esc_attr( $settings['show_transition'] ) . '"';
				$attr_line .= ' data-show-duration="' . esc_attr( $settings['show_duration'] ) . '"';
				$attr_line .= ' data-show-delay="' . esc_attr( $settings['show_delay'] ) . '"';
				$attr_line .= ' data-hide-transition="' . esc_attr( $settings['hide_transition'] ) . '"';
				$attr_line .= ' data-hide-duration="' . esc_attr( $settings['hide_duration'] ) . '"';
				$attr_line .= ' data-hide-delay="' . esc_attr( $settings['hide_delay'] ) . '"';
			}

			return $attr_line;
		}

		/**
		 * Enqueue javascript and stylesheet
		 *
		 * @since  4.0.0
		 */
		public function enqueue_assets() {
			wp_enqueue_script( 'jquery-slider-pro' );
			wp_enqueue_style( 'jquery-slider-pro' );
		}
	}

	add_action( 'widgets_init', 'travelop_register_smart_slider_widgets' );
	function travelop_register_smart_slider_widgets() {
		register_widget( 'Travelop_Smart_Slider_Widget' );
	}
}