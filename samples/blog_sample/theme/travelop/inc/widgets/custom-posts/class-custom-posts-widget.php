<?php
/**
 * Widget custom posts.
 *
 * @package Travelop
 */

if ( ! class_exists( 'Travelop_Custom_Posts_Widget' ) ) {

	class Travelop_Custom_Posts_Widget extends Cherry_Abstract_Widget {
		/**
		 * Constructor
		 *
		 * @since  1.0.0
		 */
		public function __construct() {
			Cherry_Utility::utility_composition( $this );

			$this->widget_name = esc_html__( 'Custom Posts', 'travelop' );
			$this->widget_description = esc_html__( 'Display custom posts your site.', 'travelop' );
			$this->widget_id = apply_filters( 'travelop_custom_posts_widget_ID', 'widget-custom-postson' );
			$this->widget_cssclass = apply_filters( 'travelop_custom_posts_widget_cssclass', 'widget-custom-postson' );

			$this->settings = array(
				'title' => array(
					'type'				=> 'text',
					'value'				=> esc_html__( 'Custom Posts', 'travelop' ),
					'label'				=> esc_html__( 'Title', 'travelop' ),
				),
				'terms_type' => array(
					'type'				=> 'radio',
					'value'				=> 'category_name',
					'options'			=> array(
						'category_name' => array(
							'label'		=> esc_html__( 'Category', 'travelop' ),
							'slave'		=> 'terms_type_post_category',
						),
						'tag'			=> array(
							'label'		=> esc_html__( 'Tag', 'travelop' ),
							'slave'		=> 'terms_type_post_tag',
						),
						'post_format'	=> array(
							'label'		=> esc_html__( 'Post Format', 'travelop' ),
							'slave'		=> 'terms_type_post_format',
						),
					),
					'label'				=> esc_html__( 'Choose taxonomy type', 'travelop' ),
				),
				'category_name' => array(
					'type'				=> 'select',
					'size'				=> 1,
					'value'				=> '',
					'options_callback'	=> array( $this->utility->satellite, 'get_terms_array', array( 'category', 'slug' ) ),
					'options'			=> false,
					'label'				=> esc_html__( 'Select category', 'travelop' ),
					'multiple'			=> true,
					'placeholder'		=> esc_html__( 'Select category', 'travelop' ),
					'master'			=> 'terms_type_post_category',
				),
				'tag' => array(
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
				'post_format' => array(
					'type'				=> 'select',
					'size'				=> 1,
					'value'				=> '',
					'options_callback'	=> array( $this->utility->satellite, 'get_terms_array', array( 'post_format', 'slug' ) ),
					'options'			=> false,
					'label'				=> esc_html__( 'Select post format', 'travelop' ),
					'multiple'			=> true,
					'placeholder'		=> esc_html__( 'Select post format', 'travelop' ),
					'master'			=> 'terms_type_post_format',
				),
				'posts_per_page' => array(
					'type'				=> 'stepper',
					'value'				=> 10,
					'max_value'			=> 50,
					'min_value'			=> 0,
					'label'				=> esc_html__( 'Posts count ( Set 0 to show all. )', 'travelop' ),
				),
				'post_offset' => array(
					'type'				=> 'stepper',
					'value'				=> '0',
					'max_value'			=> '10000',
					'min_value'			=> '0',
					'step_value'		=> '1',
					'label'				=> esc_html__( 'Offset post', 'travelop' ),
				),
				'show_thumb'     => array(
					'type'  => 'switcher',
					'value' => 'true',
					'style' => ( wp_is_mobile() ) ? 'normal' : 'small',
					'label' => esc_html__( 'Display thumbnails', 'travelop' ),
				),
				'title_length' => array(
					'type'				=> 'stepper',
					'value'				=> '10',
					'max_value'			=> '500',
					'min_value'			=> '0',
					'step_value'		=> '1',
					'label'				=> esc_html__( 'Title words length ( Set 0 to hide title. )', 'travelop' ),
				),
				'excerpt_length' => array(
					'type'				=> 'stepper',
					'value'				=> '10',
					'max_value'			=> '500',
					'min_value'			=> '0',
					'step_value'		=> '1',
					'label'				=> esc_html__( 'Excerpt words length ( Set 0 to hide excerpt. )', 'travelop' ),
				),
				'mate_data' => array(
					'type'				=> 'checkbox',
					'value'				=> array(
						'date'				=> 'true',
						'author'			=> 'false',
						'comment_count'		=> 'false',
						'category'			=> 'false',
						'tag'				=> 'false',
						'more_button'				=> 'false',
					),
					'options'				=> array(
						'date'				=> esc_html__( 'Date', 'travelop' ),
						'author'			=> esc_html__( 'Author', 'travelop' ),
						'comment_count'		=> esc_html__( 'Comment count', 'travelop' ),
						'category'			=> esc_html__( 'Category', 'travelop' ),
						'post_tag'			=> esc_html__( 'Tag', 'travelop' ),
						'more_button'		=> esc_html__( 'More Button', 'travelop' ),
					),
					'label'				=> esc_html__( 'Display post meta data', 'travelop' ),
				),
				'button_text' => array(
					'type'				=> 'text',
					'value'				=> 'Read More',
					'label'				=> esc_html__( 'Post read more button label', 'travelop' ),
				),
			);

			parent::__construct();
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

			extract( $instance, EXTR_OVERWRITE );

			if ( !isset( $instance[ $terms_type ] ) || !$instance[ $terms_type ] ) {
				return;
			}

			$posts_per_page  = ( '0' === $posts_per_page ) ? -1 : ( int ) $posts_per_page ;
			$post_args = array(
				'post_type'		=> 'post',
				'offset'		=> $post_offset,
				'numberposts'	=> $posts_per_page,
			);
			$post_args[ $terms_type ] = implode( ',', $instance[ $terms_type ] );
			$grid_class_array = array(
					'default'				=> 'col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-4',
					'before-content-area'	=> 'col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-4',
					'after-content-area'	=> 'col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-4',
					'sidebar-primary'		=> 'col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12',
					'sidebar-secondary'		=> 'col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12',
					'before-loop-area'		=> 'col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6',
					'after-loop-area'		=> 'col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6',
					'footer-area'			=> 'col-xs-6 col-sm-6 col-md-12 col-lg-12 col-xl-12',
				);
			$grid_class = isset( $grid_class_array[ $args['id'] ] ) ? $grid_class_array[ $args['id'] ] : $grid_class_array[ 'default' ] ;

			$posts = get_posts( $post_args );

			if ( $posts ) {
				global $post;

				$holder_view_dir = locate_template( 'inc/widgets/custom-posts/views/custom-post-view.php' );

				echo '<div class="custom-posts-holder row" >';

					if ( $holder_view_dir ) {
						foreach ( $posts as $post ) {
							setup_postdata( $post );

							$image = 'true' === $this->instance['show_thumb'] ? $this->utility->media->get_image( array(
								'size'			=> '__tm-thumb-m',
								'mobile_size'	=> '__tm-thumb-s',
							) ) : '';

							$excerpt = $this->utility->attributes->get_content( array(
								'length'=> $excerpt_length,
								'content_type'	=> 'post_excerpt',
							) );

							$title = $this->utility->attributes->get_title( array(
								'length'		=> $title_length,
								'html'			=> '<h6 %1$s><a href="%2$s" title="%3$s">%4$s</a></h6>',
							) );

							$permalink = $this->utility->attributes->get_post_permalink();

							$date = $this->utility->meta_data->get_date( array(
								'visible'		=> $mate_data['date'],
							) );

							$count = $this->utility->meta_data->get_comment_count( array(
								'visible'		=> $mate_data['comment_count'],
							) );

							$author = $this->utility->meta_data->get_author( array(
								'visible'		=> $mate_data['author'],
							) );

							$category = $this->utility->meta_data->get_terms( array(
								'delimiter'		=> ', ',
								'type'			=> 'category',
								'visible'		=> $mate_data['category'],
							) );

							$tag = $this->utility->meta_data->get_terms( array(
								'delimiter'		=> ', ',
								'type'			=> 'post_tag',
								'visible'		=> $mate_data['post_tag'],
							) );

							$button = $this->utility->attributes->get_button( array(
								'visible'		=> $mate_data['more_button'],
								'text'			=> $button_text,
								'icon'			=> '',
							) );

							require( $holder_view_dir );
						}
					}

				echo '</div>';
			}

			$this->widget_end( $args );
			$this->reset_widget_data();
			wp_reset_postdata();

			echo $this->cache_widget( $args, ob_get_clean() );
		}
	}

	add_action( 'widgets_init', 'travelop_register_custom_posts_widget' );
	function travelop_register_custom_posts_widget() {
		register_widget( 'Travelop_Custom_Posts_Widget' );
	}
}