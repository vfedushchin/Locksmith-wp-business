<?php
/**
 * Theme Customizer.
 *
 * @package __Tm
 */

/**
 * Retrieve a holder for Customizer options.
 *
 * @since  1.0.0
 * @return array
 */
function bedentist_get_customizer_options() {
	/**
	 * Filter a holder for Customizer options (for theme/plugin developer customization).
	 *
	 * @since 1.0.0
	 */
	return apply_filters( 'bedentist_get_customizer_options' , array(
		'prefix'     => 'bedentist',
		'capability' => 'edit_theme_options',
		'type'       => 'theme_mod',
		'options'    => array(

			/** 'Site Indentity' section */
			'show_tagline' => array(
				'title'    => esc_html__( 'Show tagline after logo', 'bedentist' ),
				'section'  => 'title_tagline',
				'priority' => 60,
				'default'  => false,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'totop_visibility' => array(
				'title'   => esc_html__( 'Enable topTop button', 'bedentist' ),
				'section' => 'title_tagline',
				'priority' => 61,
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'page_preloader' => array(
				'title'    => esc_html__( 'Show preloader when open a page', 'bedentist' ),
				'section'  => 'title_tagline',
				'priority' => 62,
				'default'  => true,
				'field'    => 'checkbox',
				'type'     => 'control',
			),
			'general_settings' => array(
				'title'       => esc_html__( 'General Site settings', 'bedentist' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Logo & Favicon` section */
			'logo_favicon' => array(
				'title'       => esc_html__( 'Logo &amp; Favicon', 'bedentist' ),
				'priority'    => 25,
				'panel'       => 'general_settings',
				'type'        => 'section',
			),
			'header_logo_type' => array(
				'title'   => esc_html__( 'Logo Type', 'bedentist' ),
				'section' => 'logo_favicon',
				'default' => 'image',
				'field'   => 'radio',
				'choices' => array(
					'image' => esc_html__( 'Image', 'bedentist' ),
					'text'  => esc_html__( 'Text', 'bedentist' ),
				),
				'type' => 'control',
			),
			'header_logo_url' => array(
				'title'           => esc_html__( 'Logo Upload', 'bedentist' ),
				'description'     => esc_html__( 'Upload logo image', 'bedentist' ),
				'section'         => 'logo_favicon',
				'default'         => get_stylesheet_directory_uri() . '/assets/images/logo.png',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'bedentist_is_header_logo_image',
			),
			'retina_header_logo_url' => array(
				'title'           => esc_html__( 'Retina Logo Upload', 'bedentist' ),
				'description'     => esc_html__( 'Upload logo for retina-ready devices', 'bedentist' ),
				'section'         => 'logo_favicon',
				'field'           => 'image',
				'type'            => 'control',
				'active_callback' => 'bedentist_is_header_logo_image',
			),
			'header_logo_font_family' => array(
				'title'           => esc_html__( 'Font Family', 'bedentist' ),
				'section'         => 'logo_favicon',
				'default'         => 'Alegria sans',
				'field'           => 'fonts',
				'type'            => 'control',
				'active_callback' => 'bedentist_is_header_logo_text',
			),
			'header_logo_font_style' => array(
				'title'           => esc_html__( 'Font Style', 'bedentist' ),
				'section'         => 'logo_favicon',
				'default'         => 'normal',
				'field'           => 'select',
				'choices'         => bedentist_get_font_styles(),
				'type'            => 'control',
				'active_callback' => 'bedentist_is_header_logo_text',
			),
			'header_logo_font_weight' => array(
				'title'           => esc_html__( 'Font Weight', 'bedentist' ),
				'section'         => 'logo_favicon',
				'default'         => '700',
				'field'           => 'select',
				'choices'         => bedentist_get_font_weight(),
				'type'            => 'control',
				'active_callback' => 'bedentist_is_header_logo_text',
			),
			'header_logo_font_size' => array(
				'title'           => esc_html__( 'Font Size, px', 'bedentist' ),
				'section'         => 'logo_favicon',
				'default'         => '40',
				'field'           => 'number',
				'input_attrs'     => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type'            => 'control',
				'active_callback' => 'bedentist_is_header_logo_text',
			),
			'header_logo_character_set' => array(
				'title'           => esc_html__( 'Character Set', 'bedentist' ),
				'section'         => 'logo_favicon',
				'default'         => 'latin',
				'field'           => 'select',
				'choices'         => bedentist_get_character_sets(),
				'type'            => 'control',
				'active_callback' => 'bedentist_is_header_logo_text',
			),

			/** `Breadcrumbs` section */
			'breadcrumbs' => array(
				'title'    => esc_html__( 'Breadcrumbs', 'bedentist' ),
				'priority' => 30,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'breadcrumbs_path_type' => array(
				'title'   => esc_html__( 'Show full/minified breadcrumbs path', 'bedentist' ),
				'section' => 'breadcrumbs',
				'default' => 'minified',
				'field'   => 'select',
				'choices' => array(
					'full'     => esc_html__( 'Full', 'bedentist' ),
					'minified' => esc_html__( 'Minified', 'bedentist' ),
				),
				'type'    => 'control',
			),
			'breadcrumbs_page_title' => array(
				'title'   => esc_html__( 'Enable page title in breadcrumbs area', 'bedentist' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs', 'bedentist' ),
				'section' => 'breadcrumbs',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'breadcrumbs_front_visibillity' => array(
				'title'   => esc_html__( 'Enable Breadcrumbs on front page', 'bedentist' ),
				'section' => 'breadcrumbs',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Color Scheme` panel */
			'color_scheme' => array(
				'title'       => esc_html__( 'Color Scheme', 'bedentist' ),
				'description' => esc_html__( 'Configure Color Scheme', 'bedentist' ),
				'priority'    => 40,
				'type'        => 'panel',
			),

			/** `Regular scheme` section */
			'regular_scheme' => array(
				'title'       => esc_html__( 'Regular scheme', 'bedentist' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'regular_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#0095e5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#f7f7f7',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_text_color' => array(
				'title'   => esc_html__( 'Text color', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#616262',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_color' => array(
				'title'   => esc_html__( 'Link color', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#949494',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#0674d1',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#0095e5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#0095e5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#0095e5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#0095e5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#0095e5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'regular_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'bedentist' ),
				'section' => 'regular_scheme',
				'default' => '#616262',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Invert scheme` section */
			'invert_scheme' => array(
				'title'       => esc_html__( 'Invert scheme', 'bedentist' ),
				'priority'    => 1,
				'panel'       => 'color_scheme',
				'type'        => 'section',
			),
			'invert_accent_color_1' => array(
				'title'   => esc_html__( 'Accent color (1)', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_accent_color_2' => array(
				'title'   => esc_html__( 'Accent color (2)', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#303043',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_text_color' => array(
				'title'   => esc_html__( 'Text color', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_color' => array(
				'title'   => esc_html__( 'Link color', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_link_hover_color' => array(
				'title'   => esc_html__( 'Link hover color', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#0674d1',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h1_color' => array(
				'title'   => esc_html__( 'H1 color', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h2_color' => array(
				'title'   => esc_html__( 'H2 color', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h3_color' => array(
				'title'   => esc_html__( 'H3 color', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h4_color' => array(
				'title'   => esc_html__( 'H4 color', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h5_color' => array(
				'title'   => esc_html__( 'H5 color', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'invert_h6_color' => array(
				'title'   => esc_html__( 'H6 color', 'bedentist' ),
				'section' => 'invert_scheme',
				'default' => '#ffffff',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Typography Settings` panel */
			'typography' => array(
				'title'       => esc_html__( 'Typography', 'bedentist' ),
				'description' => esc_html__( 'Configure typography settings', 'bedentist' ),
				'priority'    => 45,
				'type'        => 'panel',
			),

			/** `Body text` section */
			'body_typography' => array(
				'title'       => esc_html__( 'Body text', 'bedentist' ),
				'priority'    => 5,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'body_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bedentist' ),
				'section' => 'body_typography',
				'default' => 'Alegreya Sans',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'body_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bedentist' ),
				'section' => 'body_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bedentist_get_font_styles(),
				'type'    => 'control',
			),
			'body_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bedentist' ),
				'section' => 'body_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => bedentist_get_font_weight(),
				'type'    => 'control',
			),
			'body_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bedentist' ),
				'section'     => 'body_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bedentist' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bedentist' ),
				'section'     => 'body_typography',
				'default'     => '1.2',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'body_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'bedentist' ),
				'section'     => 'body_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'body_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bedentist' ),
				'section' => 'body_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bedentist_get_character_sets(),
				'type'    => 'control',
			),
			'body_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bedentist' ),
				'section' => 'body_typography',
				'default' => 'left',
				'field'   => 'select',
				'choices' => bedentist_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H1 Heading` section */
			'h1_typography' => array(
				'title'       => esc_html__( 'H1 Heading', 'bedentist' ),
				'priority'    => 10,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h1_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bedentist' ),
				'section' => 'h1_typography',
				'default' => 'Alegreya Sans',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h1_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bedentist' ),
				'section' => 'h1_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bedentist_get_font_styles(),
				'type'    => 'control',
			),
			'h1_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bedentist' ),
				'section' => 'h1_typography',
				'default' => '800',
				'field'   => 'select',
				'choices' => bedentist_get_font_weight(),
				'type'    => 'control',
			),
			'h1_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bedentist' ),
				'section'     => 'h1_typography',
				'default'     => '80',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bedentist' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bedentist' ),
				'section'     => 'h1_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h1_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'bedentist' ),
				'section'     => 'h1_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h1_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bedentist' ),
				'section' => 'h1_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bedentist_get_character_sets(),
				'type'    => 'control',
			),
			'h1_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bedentist' ),
				'section' => 'h1_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bedentist_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H2 Heading` section */
			'h2_typography' => array(
				'title'       => esc_html__( 'H2 Heading', 'bedentist' ),
				'priority'    => 15,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h2_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bedentist' ),
				'section' => 'h2_typography',
				'default' => 'Alegreya Sans',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h2_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bedentist' ),
				'section' => 'h2_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bedentist_get_font_styles(),
				'type'    => 'control',
			),
			'h2_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bedentist' ),
				'section' => 'h2_typography',
				'default' => '800',
				'field'   => 'select',
				'choices' => bedentist_get_font_weight(),
				'type'    => 'control',
			),
			'h2_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bedentist' ),
				'section'     => 'h2_typography',
				'default'     => '70',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bedentist' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bedentist' ),
				'section'     => 'h2_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h2_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'bedentist' ),
				'section'     => 'h2_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h2_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bedentist' ),
				'section' => 'h2_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bedentist_get_character_sets(),
				'type'    => 'control',
			),
			'h2_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bedentist' ),
				'section' => 'h2_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bedentist_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H3 Heading` section */
			'h3_typography' => array(
				'title'       => esc_html__( 'H3 Heading', 'bedentist' ),
				'priority'    => 20,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h3_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bedentist' ),
				'section' => 'h3_typography',
				'default' => 'Alegreya Sans',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h3_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bedentist' ),
				'section' => 'h3_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bedentist_get_font_styles(),
				'type'    => 'control',
			),
			'h3_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bedentist' ),
				'section' => 'h3_typography',
				'default' => '700',
				'field'   => 'select',
				'choices' => bedentist_get_font_weight(),
				'type'    => 'control',
			),
			'h3_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bedentist' ),
				'section'     => 'h3_typography',
				'default'     => '50',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bedentist' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bedentist' ),
				'section'     => 'h3_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h3_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'bedentist' ),
				'section'     => 'h3_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h3_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bedentist' ),
				'section' => 'h3_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bedentist_get_character_sets(),
				'type'    => 'control',
			),
			'h3_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bedentist' ),
				'section' => 'h3_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bedentist_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H4 Heading` section */
			'h4_typography' => array(
				'title'       => esc_html__( 'H4 Heading', 'bedentist' ),
				'priority'    => 25,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h4_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bedentist' ),
				'section' => 'h4_typography',
				'default' => 'Alegreya Sans',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h4_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bedentist' ),
				'section' => 'h4_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bedentist_get_font_styles(),
				'type'    => 'control',
			),
			'h4_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bedentist' ),
				'section' => 'h4_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => bedentist_get_font_weight(),
				'type'    => 'control',
			),
			'h4_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bedentist' ),
				'section'     => 'h4_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bedentist' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bedentist' ),
				'section'     => 'h4_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h4_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'bedentist' ),
				'section'     => 'h4_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h4_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bedentist' ),
				'section' => 'h4_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bedentist_get_character_sets(),
				'type'    => 'control',
			),
			'h4_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bedentist' ),
				'section' => 'h4_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bedentist_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H5 Heading` section */
			'h5_typography' => array(
				'title'       => esc_html__( 'H5 Heading', 'bedentist' ),
				'priority'    => 30,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h5_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bedentist' ),
				'section' => 'h5_typography',
				'default' => 'Alegreya Sans',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h5_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bedentist' ),
				'section' => 'h5_typography',
				'default' => 'italic',
				'field'   => 'select',
				'choices' => bedentist_get_font_styles(),
				'type'    => 'control',
			),
			'h5_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bedentist' ),
				'section' => 'h5_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => bedentist_get_font_weight(),
				'type'    => 'control',
			),
			'h5_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bedentist' ),
				'section'     => 'h5_typography',
				'default'     => '30',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bedentist' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bedentist' ),
				'section'     => 'h5_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h5_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'bedentist' ),
				'section'     => 'h5_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h5_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bedentist' ),
				'section' => 'h5_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bedentist_get_character_sets(),
				'type'    => 'control',
			),
			'h5_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bedentist' ),
				'section' => 'h5_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bedentist_get_text_aligns(),
				'type'    => 'control',
			),

			/** `H6 Heading` section */
			'h6_typography' => array(
				'title'       => esc_html__( 'H6 Heading', 'bedentist' ),
				'priority'    => 35,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'h6_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bedentist' ),
				'section' => 'h6_typography',
				'default' => 'Alegreya Sans',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'h6_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bedentist' ),
				'section' => 'h6_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bedentist_get_font_styles(),
				'type'    => 'control',
			),
			'h6_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bedentist' ),
				'section' => 'h6_typography',
				'default' => '800',
				'field'   => 'select',
				'choices' => bedentist_get_font_weight(),
				'type'    => 'control',
			),
			'h6_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bedentist' ),
				'section'     => 'h6_typography',
				'default'     => '20',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 10,
					'max'  => 200,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bedentist' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bedentist' ),
				'section'     => 'h6_typography',
				'default'     => '1.1',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'h6_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'bedentist' ),
				'section'     => 'h6_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'h6_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bedentist' ),
				'section' => 'h6_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bedentist_get_character_sets(),
				'type'    => 'control',
			),
			'h6_text_align' => array(
				'title'   => esc_html__( 'Text Align', 'bedentist' ),
				'section' => 'h6_typography',
				'default' => 'inherit',
				'field'   => 'select',
				'choices' => bedentist_get_text_aligns(),
				'type'    => 'control',
			),

			/** `Body text` section */
			'breadcrumbs_typography' => array(
				'title'       => esc_html__( 'Breadcrumbs text', 'bedentist' ),
				'priority'    => 45,
				'panel'       => 'typography',
				'type'        => 'section',
			),
			'breadcrumbs_font_family' => array(
				'title'   => esc_html__( 'Font Family', 'bedentist' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'Alegreya Sans',
				'field'   => 'fonts',
				'type'    => 'control',
			),
			'breadcrumbs_font_style' => array(
				'title'   => esc_html__( 'Font Style', 'bedentist' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'normal',
				'field'   => 'select',
				'choices' => bedentist_get_font_styles(),
				'type'    => 'control',
			),
			'breadcrumbs_font_weight' => array(
				'title'   => esc_html__( 'Font Weight', 'bedentist' ),
				'section' => 'breadcrumbs_typography',
				'default' => '400',
				'field'   => 'select',
				'choices' => bedentist_get_font_weight(),
				'type'    => 'control',
			),
			'breadcrumbs_font_size' => array(
				'title'       => esc_html__( 'Font Size, px', 'bedentist' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '16',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 6,
					'max'  => 50,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_line_height' => array(
				'title'       => esc_html__( 'Line Height', 'bedentist' ),
				'description' => esc_html__( 'Relative to the font-size of the element', 'bedentist' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '1.5',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 1.0,
					'max'  => 3.0,
					'step' => 0.1,
				),
				'type' => 'control',
			),
			'breadcrumbs_letter_spacing' => array(
				'title'       => esc_html__( 'Letter Spacing, px', 'bedentist' ),
				'section'     => 'breadcrumbs_typography',
				'default'     => '0',
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => -10,
					'max'  => 10,
					'step' => 1,
				),
				'type' => 'control',
			),
			'breadcrumbs_character_set' => array(
				'title'   => esc_html__( 'Character Set', 'bedentist' ),
				'section' => 'breadcrumbs_typography',
				'default' => 'latin',
				'field'   => 'select',
				'choices' => bedentist_get_character_sets(),
				'type'    => 'control',
			),

			/** `Social links` section */
			'social_links' => array(
				'title'    => esc_html__( 'Social links', 'bedentist' ),
				'priority' => 50,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),

			'footer_social_links' => array(
				'title'   => esc_html__( 'Show social links in footer', 'bedentist' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to blog posts', 'bedentist' ),
				'section' => 'social_links',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_share_buttons' => array(
				'title'   => esc_html__( 'Show social sharing to single blog post', 'bedentist' ),
				'section' => 'social_links',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Page Layout` section */
			'page_layout' => array(
				'title'    => esc_html__( 'Page Layout', 'bedentist' ),
				'priority' => 55,
				'type'     => 'section',
				'panel'    => 'general_settings',
			),
			'header_container_type' => array(
				'title'   => esc_html__( 'Header type', 'bedentist' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'bedentist' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'bedentist' ),
				),
				'type' => 'control',
			),
			'content_container_type' => array(
				'title'   => esc_html__( 'Content type', 'bedentist' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'bedentist' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'bedentist' ),
				),
				'type' => 'control',
			),
			'footer_container_type' => array(
				'title'   => esc_html__( 'Footer type', 'bedentist' ),
				'section' => 'page_layout',
				'default' => 'boxed',
				'field'   => 'select',
				'choices' => array(
					'boxed'     => esc_html__( 'Boxed', 'bedentist' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'bedentist' ),
				),
				'type' => 'control',
			),
			'container_width' => array(
				'title'       => esc_html__( 'Container width (px)', 'bedentist' ),
				'section'     => 'page_layout',
				'default'     => 1200,
				'field'       => 'number',
				'input_attrs' => array(
					'min'  => 960,
					'max'  => 1920,
					'step' => 1,
				),
				'type' => 'control',
			),
			'sidebar_width' => array(
				'title'   => esc_html__( 'Sidebar width', 'bedentist' ),
				'section' => 'page_layout',
				'default' => '1/3',
				'field'   => 'select',
				'choices' => array(
					'1/3' => '1/3',
					'1/4' => '1/4',
				),
				'sanitize_callback' => 'sanitize_text_field',
				'type'              => 'control',
			),

			/** `Header` panel */
			'header_options' => array(
				'title'       => esc_html__( 'Header', 'bedentist' ),
				'priority'    => 60,
				'type'        => 'panel',
			),

			/** `Header styles` section */
			'header_styles' => array(
				'title'       => esc_html__( 'Header Styles', 'bedentist' ),
				'priority'    => 5,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_bg_color' => array(
				'title'   => esc_html__( 'Background Color', 'bedentist' ),
				'section' => 'header_styles',
				'field'   => 'hex_color',
				'default' => '#ffffff',
				'type'    => 'control',
			),
			'header_bg_image' => array(
				'title'   => esc_html__( 'Background Image', 'bedentist' ),
				'section' => 'header_styles',
				'field'   => 'image',
				'type'    => 'control',
			),
			'header_bg_repeat' => array(
				'title'   => esc_html__( 'Background Repeat', 'bedentist' ),
				'section' => 'header_styles',
				'default' => 'repeat',
				'field'   => 'select',
				'choices' => array(
					'no-repeat'  => esc_html__( 'No Repeat', 'bedentist' ),
					'repeat'     => esc_html__( 'Tile', 'bedentist' ),
					'repeat-x'   => esc_html__( 'Tile Horizontally', 'bedentist' ),
					'repeat-y'   => esc_html__( 'Tile Vertically', 'bedentist' ),
				),
				'type' => 'control',
			),
			'header_bg_position_x' => array(
				'title'   => esc_html__( 'Background Position', 'bedentist' ),
				'section' => 'header_styles',
				'default' => 'center',
				'field'   => 'select',
				'choices' => array(
					'left'   => esc_html__( 'Left', 'bedentist' ),
					'center' => esc_html__( 'Center', 'bedentist' ),
					'right'  => esc_html__( 'Right', 'bedentist' ),
				),
				'type' => 'control',
			),
			'header_bg_attachment' => array(
				'title'   => esc_html__( 'Background Attachment', 'bedentist' ),
				'section' => 'header_styles',
				'default' => 'scroll',
				'field'   => 'select',
				'choices' => array(
					'scroll' => esc_html__( 'Scroll', 'bedentist' ),
					'fixed'  => esc_html__( 'Fixed', 'bedentist' ),
				),
				'type' => 'control',
			),
			'header_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'bedentist' ),
				'section' => 'header_styles',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'minimal'  => esc_html__( 'Style 1', 'bedentist' ),
					'centered' => esc_html__( 'Style 2', 'bedentist' ),
					'default'  => esc_html__( 'Style 3', 'bedentist' ),
				),
				'type' => 'control',
			),
			'header_phone_text' => array(
				'title'       		=> esc_html__( 'Phone Text', 'bedentist' ),
				'section'     		=> 'header_styles',
				'default'     		=> bedentist_get_default_header_phone_text(),
				'field'       		=> 'textarea',
				'type'        		=> 'control',
				'sanitize_callback' => 'bedentist_esc_option',
			),
			'header_time_text' => array(
				'title'       => esc_html__( 'Time Text', 'bedentist' ),
				'section'     => 'header_styles',
				'default'     => bedentist_get_default_header_time_text(),
				'field'       => 'textarea',
				'type'        => 'control',
				'sanitize_callback' => 'bedentist_esc_option',
			),

			/** `Top Panel` section */
			'header_top_panel' => array(
				'title'       => esc_html__( 'Top Panel', 'bedentist' ),
				'priority'    => 10,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'top_panel_text' => array(
				'title'       => esc_html__( 'Disclaimer Text', 'bedentist' ),
				'description' => esc_html__( 'HTML formatting support', 'bedentist' ),
				'section'     => 'header_top_panel',
				'default'     => bedentist_get_default_top_panel_text(),
				'field'       => 'textarea',
				'type'        => 'control',
			),
			'top_panel_bg' => array(
				'title'   => esc_html__( 'Background color', 'bedentist' ),
				'section' => 'header_top_panel',
				'default' => '#0095e5',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'top_panel_social_links' => array(
				'title'   => esc_html__( 'Show social links in top panel', 'bedentist' ),
				'section' => 'header_top_panel',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Main Menu` section */
			'header_main_menu' => array(
				'title'       => esc_html__( 'Main Menu', 'bedentist' ),
				'priority'    => 15,
				'panel'       => 'header_options',
				'type'        => 'section',
			),
			'header_menu_sticky' => array(
				'title'   => esc_html__( 'Enable sticky menu', 'bedentist' ),
				'section' => 'header_main_menu',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_search' => array(
				'title'   => esc_html__( 'Enable search', 'bedentist' ),
				'section' => 'header_main_menu',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'header_menu_attributes' => array(
				'title'   => esc_html__( 'Enable title attributes', 'bedentist' ),
				'section' => 'header_main_menu',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Sidebar` section */
			'sidebar_settings' => array(
				'title'    => esc_html__( 'Sidebar', 'bedentist' ),
				'priority' => 105,
				'type'     => 'section',
			),
			'sidebar_position' => array(
				'title'   => esc_html__( 'Sidebar Position', 'bedentist' ),
				'section' => 'sidebar_settings',
				'default' => 'one-right-sidebar',
				'field'   => 'select',
				'choices' => array(
					'one-left-sidebar'  => esc_html__( 'Sidebar on left side', 'bedentist' ),
					'one-right-sidebar' => esc_html__( 'Sidebar on right side', 'bedentist' ),
					'fullwidth'         => esc_html__( 'No sidebars', 'bedentist' ),
				),
				'type' => 'control',
			),

			/** `Footer` panel */
			'footer_options' => array(
				'title'       => esc_html__( 'Footer', 'bedentist' ),
				'priority'    => 110,
				'type'        => 'section',
			),
			'footer_logo_url' => array(
				'title'   => esc_html__( 'Logo upload', 'bedentist' ),
				'section' => 'footer_options',
				'field'   => 'image',
				'default' => get_stylesheet_directory_uri() . '/assets/images/footer-logo.png',
				'type'    => 'control',
			),
			'footer_copyright' => array(
				'title'   => esc_html__( 'Copyright text', 'bedentist' ),
				'section' => 'footer_options',
				'default' => bedentist_get_default_footer_copyright(),
				'field'   => 'textarea',
				'type'    => 'control',
			),
			'footer_widget_columns' => array(
				'title'   => esc_html__( 'Widget Area Columns', 'bedentist' ),
				'section' => 'footer_options',
				'default' => '4',
				'field'   => 'select',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'type' => 'control'
			),
			'footer_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'bedentist' ),
				'section' => 'footer_options',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'  => esc_html__( 'Style 1', 'bedentist' ),
					'centered' => esc_html__( 'Style 2', 'bedentist' ),
					'minimal'  => esc_html__( 'Style 3', 'bedentist' ),
				),
				'type' => 'control'
			),
			'footer_widgets_bg' => array(
				'title'   => esc_html__( 'Footer Widgets Area color', 'bedentist' ),
				'section' => 'footer_options',
				'default' => '#373838',
				'field'   => 'hex_color',
				'type'    => 'control',
			),
			'footer_bg' => array(
				'title'   => esc_html__( 'Footer Background color', 'bedentist' ),
				'section' => 'footer_options',
				'default' => '#2c2d2d',
				'field'   => 'hex_color',
				'type'    => 'control',
			),

			/** `Blog Settings` panel */
			'blog_settings' => array(
				'title'       => esc_html__( 'Blog Settings', 'bedentist' ),
				'priority'    => 115,
				'type'        => 'panel',
			),

			/** `Blog` section */
			'blog' => array(
				'title'           => esc_html__( 'Blog', 'bedentist' ),
				'panel'           => 'blog_settings',
				'priority'        => 10,
				'type'            => 'section',
				'active_callback' => 'is_home',
			),

			'blog_layout_type' => array(
				'title'   => esc_html__( 'Layout', 'bedentist' ),
				'section' => 'blog',
				'default' => 'default',
				'field'   => 'select',
				'choices' => array(
					'default'        => esc_html__( 'Default', 'bedentist' ),
					'grid-2-cols'    => esc_html__( 'Grid (2 Columns)', 'bedentist' ),
					'grid-3-cols'    => esc_html__( 'Grid (3 Columns)', 'bedentist' ),
					'masonry-2-cols' => esc_html__( 'Masonry (2 Columns)', 'bedentist' ),
					'masonry-3-cols' => esc_html__( 'Masonry (3 Columns)', 'bedentist' ),
				),
				'type' => 'control'
			),
			'blog_sticky_label' => array(
				'title'       => esc_html__( 'Featured Post Label', 'bedentist' ),
				'description' => esc_html__( 'Label for sticky post.', 'bedentist' ),
				'section'     => 'blog',
				'default'     => 'icon:material:star_border',
				'field'       => 'text',
				'type'        => 'control',
			),
			'blog_posts_content' => array(
				'title'   => esc_html__( 'Post content', 'bedentist' ),
				'section' => 'blog',
				'default' => 'excerpt',
				'field'   => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Only excerpt', 'bedentist' ),
					'full'    => esc_html__( 'Full content', 'bedentist' ),
				),
				'type' => 'control'
			),
			'blog_featured_image' => array(
				'title'   => esc_html__( 'Featured image', 'bedentist' ),
				'section' => 'blog',
				'default' => 'fullwidth',
				'field'   => 'select',
				'choices' => array(
					'small'     => esc_html__( 'Small', 'bedentist' ),
					'fullwidth' => esc_html__( 'Fullwidth', 'bedentist' ),
				),
				'type' => 'control'
			),
			'blog_read_more_text' => array(
				'title'   => esc_html__( 'Read More button text', 'bedentist' ),
				'section' => 'blog',
				'default' => esc_html__( 'Read more', 'bedentist' ),
				'field'   => 'text',
				'type'    => 'control',
			),
			'blog_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'bedentist' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'bedentist' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'bedentist' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'bedentist' ),
				'section' => 'blog',
				'default' => false,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'blog_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'bedentist' ),
				'section' => 'blog',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),

			/** `Post` section */
			'blog_post' => array(
				'title'           => esc_html__( 'Post', 'bedentist' ),
				'panel'           => 'blog_settings',
				'priority'        => 20,
				'type'            => 'section',
				'active_callback' => 'callback_single',
			),
			'single_post_author' => array(
				'title'   => esc_html__( 'Show post author', 'bedentist' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_publish_date' => array(
				'title'   => esc_html__( 'Show publish date', 'bedentist' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_categories' => array(
				'title'   => esc_html__( 'Show categories', 'bedentist' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_tags' => array(
				'title'   => esc_html__( 'Show tags', 'bedentist' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_post_comments' => array(
				'title'   => esc_html__( 'Show comments', 'bedentist' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'single_author_block' => array(
				'title'   => esc_html__( 'Enable the author block after each post', 'bedentist' ),
				'section' => 'blog_post',
				'default' => true,
				'field'   => 'checkbox',
				'type'    => 'control',
			),
			'mailchimp' => array(
				'title'       => esc_html__( 'MailChimp', 'bedentist' ),
				'description' => esc_html__( 'Setup MailChimp settings for subscribe widget', 'bedentist' ),
				'priority'    => 109,
				'type'        => 'section',
			),
			'mailchimp_api_key' => array(
				'title'   => esc_html__( 'MailChimp API key', 'bedentist' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
			'mailchimp_list_id' => array(
				'title'   => esc_html__( 'MailChimp list ID', 'bedentist' ),
				'section' => 'mailchimp',
				'field'   => 'text',
				'type'    => 'control',
			),
	) ) );
}

/**
 * Return true if logo in header has image type. Otherwise - return false.
 *
 * @param  object $control
 * @return bool
 */
function bedentist_is_header_logo_image( $control ) {

	if ( $control->manager->get_setting( 'header_logo_type' )->value() == 'image' ) {
		return true;
	}

	return false;
}

/**
 * Return true if logo in header has text type. Otherwise - return false.
 *
 * @param  object $control
 * @return bool
 */
function bedentist_is_header_logo_text( $control ) {

	if ( $control->manager->get_setting( 'header_logo_type' )->value() == 'text' ) {
		return true;
	}

	return false;
}

// Move native `site_icon` control (based on WordPress core) in custom section.
add_action( 'customize_register', 'bedentist_customizer_change_core_controls', 20 );
function bedentist_customizer_change_core_controls( $wp_customize ) {
	$wp_customize->get_control( 'site_icon' )->section      = 'bedentist_logo_favicon';
	$wp_customize->get_control( 'background_color' )->label = esc_html__( 'Body Background Color', 'bedentist' );
}

////////////////////////////////////
// Typography utility function    //
////////////////////////////////////
function bedentist_get_font_styles() {
	return apply_filters( 'bedentist_get_font_styles', array(
		'normal'  => esc_html__( 'Normal', 'bedentist' ),
		'italic'  => esc_html__( 'Italic', 'bedentist' ),
		'oblique' => esc_html__( 'Oblique', 'bedentist' ),
		'inherit' => esc_html__( 'Inherit', 'bedentist' ),
	) );
}

function bedentist_get_character_sets() {
	return apply_filters( 'bedentist_get_character_sets', array(
		'latin'        => esc_html__( 'Latin', 'bedentist' ),
		'greek'        => esc_html__( 'Greek', 'bedentist' ),
		'greek-ext'    => esc_html__( 'Greek Extended', 'bedentist' ),
		'vietnamese'   => esc_html__( 'Vietnamese', 'bedentist' ),
		'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'bedentist' ),
		'latin-ext'    => esc_html__( 'Latin Extended', 'bedentist' ),
		'cyrillic'     => esc_html__( 'Cyrillic', 'bedentist' ),
	) );
}

function bedentist_get_text_aligns() {
	return apply_filters( 'bedentist_get_text_aligns', array(
		'inherit' => esc_html__( 'Inherit', 'bedentist' ),
		'center'  => esc_html__( 'Center', 'bedentist' ),
		'justify' => esc_html__( 'Justify', 'bedentist' ),
		'left'    => esc_html__( 'Left', 'bedentist' ),
		'right'   => esc_html__( 'Right', 'bedentist' ),
	) );
}

function bedentist_get_font_weight() {
	return apply_filters( 'bedentist_get_font_weight', array(
		'normal' => esc_html__( 'Normal', 'bedentist' ),
		'bold'   => esc_html__( 'Bold', 'bedentist' ),
		'100'    => '100',
		'200'    => '200',
		'300'    => '300',
		'400'    => '400',
		'500'    => '500',
		'600'    => '600',
		'700'    => '700',
		'800'    => '800',
		'900'    => '900',
	) );
}

/**
 * Return array of arguments for dynamic CSS module
 *
 * @return array
 */
function bedentist_get_dynamic_css_options() {
	return apply_filters( 'bedentist_get_dynamic_css_options', array(
		'prefix'    => 'bedentist',
		'type'      => 'theme_mod',
		'single'    => true,
		'css_files' => array(
			BEDENTIST_THEME_DIR . '/assets/css/dynamic.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/widgets/widget-default.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/widgets/taxonomy-tiles.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/widgets/image-grid.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/widgets/carousel.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/widgets/smart-slider.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/widgets/instagram.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/widgets/subscribe.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/widgets/track-kickstarter.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/widgets/donate.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/site/top-panel.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/site/search-form.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/site/social.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/site/main-navigation.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/site/footer.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/site/elements.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/site/post.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/site/pagination.css',
			BEDENTIST_THEME_DIR . '/assets/css/dynamic/site/misc.css',
		),
		'options'   => array(
			'header_logo_font_style',
			'header_logo_font_weight',
			'header_logo_font_size',
			'header_logo_font_family',

			'body_font_style',
			'body_font_weight',
			'body_font_size',
			'body_line_height',
			'body_font_family',
			'body_letter_spacing',
			'body_text_align',

			'h1_font_style',
			'h1_font_weight',
			'h1_font_size',
			'h1_line_height',
			'h1_font_family',
			'h1_letter_spacing',
			'h1_text_align',

			'h2_font_style',
			'h2_font_weight',
			'h2_font_size',
			'h2_line_height',
			'h2_font_family',
			'h2_letter_spacing',
			'h2_text_align',

			'h3_font_style',
			'h3_font_weight',
			'h3_font_size',
			'h3_line_height',
			'h3_font_family',
			'h3_letter_spacing',
			'h3_text_align',

			'h4_font_style',
			'h4_font_weight',
			'h4_font_size',
			'h4_line_height',
			'h4_font_family',
			'h4_letter_spacing',
			'h4_text_align',

			'h5_font_style',
			'h5_font_weight',
			'h5_font_size',
			'h5_line_height',
			'h5_font_family',
			'h5_letter_spacing',
			'h5_text_align',

			'h6_font_style',
			'h6_font_weight',
			'h6_font_size',
			'h6_line_height',
			'h6_font_family',
			'h6_letter_spacing',
			'h6_text_align',

			'breadcrumbs_font_style',
			'breadcrumbs_font_weight',
			'breadcrumbs_font_size',
			'breadcrumbs_line_height',
			'breadcrumbs_font_family',
			'breadcrumbs_letter_spacing',
			'breadcrumbs_text_align',

			'regular_accent_color_1',
			'regular_accent_color_2',
			'regular_text_color',
			'regular_link_color',
			'regular_link_hover_color',
			'regular_h1_color',
			'regular_h2_color',
			'regular_h3_color',
			'regular_h4_color',
			'regular_h5_color',
			'regular_h6_color',

			'invert_accent_color_1',
			'invert_accent_color_2',
			'invert_text_color',
			'invert_link_color',
			'invert_link_hover_color',
			'invert_h1_color',
			'invert_h2_color',
			'invert_h3_color',
			'invert_h4_color',
			'invert_h5_color',
			'invert_h6_color',

			'header_bg_color',
			'header_bg_image',
			'header_bg_repeat',
			'header_bg_position_x',
			'header_bg_attachment',

			'top_panel_bg',

			'container_width',

			'footer_widgets_bg',
			'footer_bg',
		)
	) );
}

/**
 * Return array of arguments for Google Fonta loader module.
 *
 * @return array
 */
function bedentist_get_fonts_options() {
	return apply_filters( 'bedentist_get_fonts_options', array(
		'prefix'  => 'bedentist',
		'type'    => 'theme_mod',
		'single'  => true,
		'options' => array(
			'body' => array(
				'family'  => 'body_font_family',
				'style'   => 'body_font_style',
				'weight'  => 'body_font_weight',
				'charset' => 'body_character_set',
			),
			'h1' => array(
				'family'  => 'h1_font_family',
				'style'   => 'h1_font_style',
				'weight'  => 'h1_font_weight',
				'charset' => 'h1_character_set',
			),
			'h2' => array(
				'family'  => 'h2_font_family',
				'style'   => 'h2_font_style',
				'weight'  => 'h2_font_weight',
				'charset' => 'h2_character_set',
			),
			'h3' => array(
				'family'  => 'h3_font_family',
				'style'   => 'h3_font_style',
				'weight'  => 'h3_font_weight',
				'charset' => 'h3_character_set',
			),
			'h4' => array(
				'family'  => 'h4_font_family',
				'style'   => 'h4_font_style',
				'weight'  => 'h4_font_weight',
				'charset' => 'h4_character_set',
			),
			'h5' => array(
				'family'  => 'h5_font_family',
				'style'   => 'h5_font_style',
				'weight'  => 'h5_font_weight',
				'charset' => 'h5_character_set',
			),
			'h6' => array(
				'family'  => 'h6_font_family',
				'style'   => 'h6_font_style',
				'weight'  => 'h6_font_weight',
				'charset' => 'h6_character_set',
			),
			'header_logo' => array(
				'family'  => 'header_logo_font_family',
				'style'   => 'header_logo_font_style',
				'weight'  => 'header_logo_font_weight',
				'charset' => 'header_logo_character_set',
			),
			'breadcrumbs' => array(
				'family'  => 'breadcrumbs_font_family',
				'style'   => 'breadcrumbs_font_style',
				'weight'  => 'breadcrumbs_font_weight',
				'charset' => 'breadcrumbs_character_set',
			),
		)
	) );
}

/**
 * Get default time text in header
 *
 * @since  1.0.0
 * @return string
 */
function bedentist_get_default_header_time_text() {
	return sprintf(
		__( '<h6>Opening Hours: </h6> <em>Mon–Fri: 9am–6pm; Sun: 10am–1pm</em>', 'bedentist' )
	);
}

/**
 * Get default phone text in header
 *
 * @since  1.0.0
 * @return string
 */
function bedentist_get_default_header_phone_text() {
	return sprintf(
		__( '<h6>Call Today: </h6><a href="tell:#">555–123–2323</a>; <a href="tell:#">555–123–2323</a>', 'bedentist' )
	);
}

/**
 * Get default top panel text
 *
 * @since  1.0.0
 * @return string
 */
function bedentist_get_default_top_panel_text() {
	return __( '<em>Make an Appointment Now!</em><a href="%%home_url%%book-an-appointments/">Book an Appointment</a>', 'bedentist' );
}

/**
 * Get default footer copyright.
 *
 * @since  1.0.0
 * @return string
 */
function bedentist_get_default_footer_copyright() {
	return '©  %%year%% <span><em>Be</em>DENTIST</span>. All rights reserved.';
}

/**
 * @param $input
 * @return mixed
 */
function bedentist_esc_option( $input ) {
	return $input;
}
