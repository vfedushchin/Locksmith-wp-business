<?php
/**
 * Carousel widget.
 *
 * @package Travelop
 */
if ( ! class_exists( 'Travelop_Carousel_Widget' ) ) {

	class Travelop_Carousel_Widget extends Cherry_Abstract_Widget {

		/**
		 * Constructor.
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			Cherry_Utility::utility_composition( $this );

			$this->widget_cssclass		= 'travelop widget_carousel';
			$this->widget_description	= esc_html__( 'Display a list of your posts on your site.', 'travelop' );
			$this->widget_id			= 'widget_carousel';
			$this->widget_name			= esc_html__( 'Carousel', 'travelop' );
			$this->settings				= array(
				'title' => array(
					'type'				=> 'text',
					'value'				=> esc_html__( 'Carousel', 'travelop' ),
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
					'label' => esc_html__( 'Choose taxonomy type', 'travelop' ),
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
					'value'				=> 10,
					'max_value'			=> 20,
					'min_value'			=> 1,
					'label'				=> esc_html__( 'Posts count', 'travelop' ),
				),
				'post_title' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display title', 'travelop' ),
				),
				'post_cats' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display categories', 'travelop' ),
				),
				'post_comments' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display comments', 'travelop' ),
				),
				'content' => array(
					'type'				=> 'switcher',
					'value'				=> 'false',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display content', 'travelop' ),
				),
				'more_button' => array(
					'type'				=> 'switcher',
					'value'				=> 'false',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Display more button', 'travelop' ),
					'toggle'			=> array(
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
				'slides_per_view' => array(
					'type'				=> 'slider',
					'max_value'			=> 25,
					'min_value'			=> 1,
					'value'				=> 5,
					'label'				=> esc_html__( 'Number of slides per view', 'travelop' ),
				),
				'slides_per_group' => array(
					'type'				=> 'slider',
					'max_value'			=> 25,
					'min_value'			=> 1,
					'value'				=> 1,
					'label'				=> esc_html__( 'Number slides per group', 'travelop' ),
				),
				'slides_per_column' => array(
					'type'				=> 'slider',
					'max_value'			=> 5,
					'min_value'			=> 1,
					'value'				=> 1,
					'label'				=> esc_html__( 'Multi Row Slides Layout', 'travelop' ),
				),
				'space_between_slides' => array(
					'type'				=> 'slider',
					'max_value'			=> 100,
					'min_value'			=> 0,
					'value'				=> 30,
					'label'				=> esc_html__( 'Width of the space between slides(px)', 'travelop' ),
				),
				'duration_speed' => array(
					'type'				=> 'slider',
					'max_value'			=> 5000,
					'min_value'			=> 100,
					'value'				=> 500,
					'label'				=> esc_html__( 'Duration of transition between slides (ms)', 'travelop' ),
				),
				'navigation' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Slider navigation', 'travelop' ),
				),
				'pagination' => array(
					'type'				=> 'switcher',
					'value'				=> 'true',
					'style'				=> ( wp_is_mobile() ) ? 'normal' : 'small',
					'label'				=> esc_html__( 'Slider pagination', 'travelop' ),
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
		 * @since 1.0.0
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

			// Widgets area check.
			if ( 'sidebar-primary' == $args['id'] || 'sidebar-secondary' == $args['id'] ) {
				$this->instance['slides_per_view']		= 1;
				$this->instance['slides_per_group']		= 1;
				$this->instance['slides_per_column']	= 1;
			}

			$footer_widget_columns = get_theme_mod( 'footer_widget_columns', travelop_theme()->customizer->get_default( 'footer_widget_columns' ) );

			if ( 'footer-area' == $args['id'] && in_array( $footer_widget_columns, array( '2', '3', '4' ) ) ) {
				$this->instance['slides_per_view']		= 1;
				$this->instance['slides_per_group']		= 1;
				$this->instance['slides_per_column']	= 1;
			}

			$instance = uniqid();

			$data_attr_line = 'class="travelop-carousel swiper-container"';
			$data_attr_line .= ' data-uniq-id="swiper-carousel-' . $instance . '"';
			$data_attr_line .= ' data-slides-per-view="' . esc_attr( $this->instance['slides_per_view'] ) . '"';
			$data_attr_line .= ' data-slides-per-group="' . esc_attr( $this->instance['slides_per_group'] ) . '"';
			$data_attr_line .= ' data-slides-per-column="' . esc_attr( $this->instance['slides_per_column'] ) . '"';
			$data_attr_line .= ' data-space-between-slides="' . esc_attr( $this->instance['space_between_slides'] ) . '"';
			$data_attr_line .= ' data-duration-speed="' . esc_attr( $this->instance['duration_speed'] ) . '"';
			$data_attr_line .= ' data-swiper-loop="false"';
			$data_attr_line .= ' data-free-mode="false"';
			$data_attr_line .= ' data-grab-cursor="true"';
			$data_attr_line .= ' data-mouse-wheel="false"';

			$swiper_pagination_html = ( 'true' == $this->instance['pagination'] ) ? '<div id="swiper-carousel-'. $instance . '-pagination" class="swiper-pagination"></div>' : '';
			$swiper_navigation_html = ( 'true' == $this->instance['navigation'] ) ? '<div id="swiper-carousel-'. $instance . '-next" class="swiper-button-next button-next"></div><div id="swiper-carousel-'. $instance . '-prev" class="swiper-button-prev button-prev"></div>' : '';

			$categories_array	= ( isset( $this->instance['categories'] ) ) ? $this->instance['categories'] : array();
			$tags_array			= ( isset( $this->instance['tags'] ) ) ? $this->instance['tags'] : array();

			$tax_query = array();

			if ( 'category' == $this->instance['terms_type'] ) {
				if ( ( is_array( $categories_array ) && ! empty( $categories_array ) ) ) {
					array_push( $tax_query, array(
						'taxonomy'	=> 'category',
						'field'		=> 'slug',
						'terms'		=> $categories_array,
					) );
				}
			} else {
				if ( ( is_array( $tags_array ) && ! empty( $tags_array ) ) ) {
					array_push( $tax_query, array(
						'taxonomy'	=> 'post_tag',
						'field'		=> 'slug',
						'terms'		=> $tags_array,
					) );
				}
			}

			// The Query.
			$posts_query = $this->get_query_items( array(
				'posts_per_page'	=> $this->instance['posts_per_page'],
				'tax_query'			=> $tax_query,
			) );

			if ( $posts_query ) {
				echo '<div class="swiper-carousel-container">';
					echo '<div id="swiper-carousel-' . $instance . '" ' . $data_attr_line . '>';
						echo '<div class="swiper-wrapper">';
							echo $this->get_carousel_loop( $posts_query );
						echo '</div>';
						echo $swiper_pagination_html;
					echo '</div>';
					echo $swiper_navigation_html;
				echo '</div>';
			} else {
				echo '<h4>' . esc_html__( 'Posts not found', 'travelop' ) . '</h4>';
			}

			$this->widget_end( $args );
			$this->reset_widget_data();
			wp_reset_postdata();

			echo $this->cache_widget( $args, ob_get_clean() );
		}

		/**
		 * Get carousel items.
		 *
		 * @since  1.0.0
		 * @param  array|string $args Arguments to be passed to the query.
		 * @return array|bool         Array if true, boolean if false.
		 */
		public function get_query_items( $query_args = array() ) {

			$defaults_query_args = apply_filters( 'travelop_carousel_default_query_args', array(
				'post_type'			=> 'post',
				'orderby'			=> 'date',
				'order'				=> 'DESC',
				'posts_per_page'	=> -1,
				'tax_query'			=> array(),
			) );

			$query_args = wp_parse_args( $query_args, $defaults_query_args );
			$query_args = array_intersect_key( $query_args, $defaults_query_args );

			// The Query.
			$posts_query = new WP_Query( $query_args );

			if ( ! is_wp_error( $posts_query ) && $posts_query->have_posts() ) {
				return $posts_query;
			} else {
				return false;
			}
		}

		/**
		 * Get carousel items.
		 *
		 * @since  1.0.0
		 * @param  array  $posts_query List of WP_Post objects.
		 * @return string
		 */
		public function get_carousel_loop( $posts_query ) {
			$view_dir = locate_template( 'inc/widgets/carousel/views/carousel-view.php' );

			if ( ! $view_dir ) {
				return '<h4>' . esc_html__( 'View file not found', 'travelop' ) . '</h4>';
			}

			while ( $posts_query->have_posts() ) : $posts_query->the_post();

				$permalink = $this->utility->media->get_post_permalink();
				$date = $this->utility->meta_data->get_date( array(
					'class'				=> 'post__date',
					'icon'				=> '<i class="material-icons">event</i>',
				) );

				$author = $this->utility->meta_data->get_author(array(
					'icon'				=> '',
				) );

				$title = $this->utility->attributes->get_title( array(
					'visible'			=> $this->instance['post_title'],
					'html'				=> '<h4 %1$s><a href="%2$s" title="%3$s">%4$s</a></h4>',
				) );

				$image = $this->utility->media->get_image( array(
					'size'				=> '__tm-thumb-xs',
					'mobile_size'		=> '__tm-thumb-xs',
					'html'				=> '<a class="post-thumbnail__link" href="' . $permalink . '"><img src="%1$s" alt="%2$s" %3$s %4$s ></a>',
					'placeholder_title'	=> strip_tags( $title ),
				) );

				$content = $this->utility->attributes->get_content( array(
					'visible'			=> $this->instance['content'],
					'length'			=> (int) $this->instance['trim_words'],
					'class'				=> 'post__excerpt',
				) );

				$more_button = $this->utility->attributes->get_button( array(
					'visible'			=> $this->instance['more_button'],
					'text'				=> $this->use_wpml_translate( 'more_button_text' ),
					'icon'				=> '',
				) );

				$comments = $this->utility->meta_data->get_comment_count( array(
					'visible'			=> $this->instance['post_comments'],
					'class'				=> 'post__comments',
				) );

				$terms_line = $this->utility->meta_data->get_terms( array(
					'visible'			=> $this->instance['post_cats'],
					'type'				=> $this->instance['terms_type'],
					'before'			=> '<div class="post__cats">',
					'after'				=> '</div>',
					'icon'				=> '',
				) );

				echo '<article class="swiper-slide post hentry">';
					require( $view_dir );
				echo '</article>';

			endwhile;

			// Reset the query.
			// wp_reset_postdata();
		}

		/**
		 * Enqueue javascript and stylesheet.
		 *
		 * @since 1.0.0
		 */
		public function enqueue_assets() {
			wp_enqueue_style( 'jquery-swiper' );
			wp_enqueue_script( 'jquery-swiper' );
		}
	}

	add_action( 'widgets_init', 'tm_register_carosel_widgets' );
	function tm_register_carosel_widgets() {
		register_widget( 'Travelop_Carousel_Widget' );
	}
}