<?php
$options   = [];
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_logo_display',
	'default'   => 'image',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-radio',
	
	'label'     => esc_html__( 'Display Logo as', 'soledad' ),
	'priority'  => 10,
	'choices'   => [
		'image' => esc_html__( 'Logo Image', 'soledad' ),
		'text'  => esc_html__( 'Text', 'soledad' ),
	],
	'partial_refresh' => [
		'penci_header_pb_logo_sidebar_logo_display' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'          => 'penci_header_pb_logo_sidebar_image_setting_url',
	'default'     => '',
	'transport'   => 'postMessage',
	'sanitize'    => 'penci_sanitize_choices_field',
	'type'        => 'soledad-fw-image',
	
	'label'       => esc_html__( 'Logo Image', 'soledad' ),
	'description' => esc_html__( 'Upload your image logo here', 'soledad' ),
	'partial_refresh' => [
		'penci_header_pb_logo_sidebar_image_setting_url' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'          => 'penci_header_pb_logo_sidebar_size_logo_mw',
	'default'     => '',
	'transport'   => 'postMessage',
	'sanitize'    => 'absint',
	'type'      => 'soledad-fw-size',
	'label' => __( 'Maxium Width for Logo Image', 'soledad' ),
	'ids'    => array(
		'desktop' => 'penci_header_pb_logo_sidebar_size_logo_mw',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'          => 'penci_header_pb_logo_sidebar_size_logo_mh',
	'default'     => '60',
	'transport'   => 'postMessage',
	'sanitize'    => 'absint',
	'type'      => 'soledad-fw-size',
	'label' => __( 'Maxium Height for Logo Image', 'soledad' ),
	'ids'    => array(
		'desktop' => 'penci_header_pb_logo_sidebar_size_logo_mh',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_image_setting_href',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-text',
	
	'label'     => __( 'Custom Logo Link', 'soledad' ),
	'priority'  => 10,
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_site_title',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-text',
	
	'label'     => esc_html__( 'Text Logo', 'soledad' ),
	'partial_refresh' => [
		'penci_header_pb_logo_sidebar_site_title' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_site_description',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-textarea',
	
	'label'     => esc_html__( 'Slogan Text', 'soledad' ),
	'partial_refresh' => [
		'penci_header_pb_logo_sidebar_site_description' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'          => 'penci_header_pb_logo_sidebar_font_size_logo',
	'default'     => '',
	'transport'   => 'postMessage',
	'sanitize'    => 'absint',
	'type'      => 'soledad-fw-size',
	'label' => __( 'Font Size for Text Logo', 'soledad' ),
	'ids'    => array(
		'desktop' => 'penci_header_pb_logo_sidebar_font_size_logo',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
/* Text Logo */
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_color_logo',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-color',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Color for Text Logo',
);
$options[] = array(
	'id'          => 'penci_header_pb_logo_sidebar_penci_font_for_title',
	'default'     => '',
	'transport'   => 'postMessage',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Font for Text Logo',
	
	'description' => 'Default font is "PT Serif"',
	'type'        => 'soledad-fw-select',
	'choices'     => penci_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_penci_font_weight_title',
	'default'   => 'bold',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font Weight for Text Logo',
	
	'type'      => 'soledad-fw-select',
	'choices'   => array(
		'normal'  => 'Normal',
		'bold'    => 'Bold',
		'bolder'  => 'Bolder',
		'lighter' => 'Lighter',
		'100'     => '100',
		'200'     => '200',
		'300'     => '300',
		'400'     => '400',
		'500'     => '500',
		'600'     => '600',
		'700'     => '700',
		'800'     => '800',
		'900'     => '900'
	)
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_penci_font_style_title',
	'default'   => 'normal',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font Style for Text Logo',
	
	'type'      => 'soledad-fw-select',
	'choices'   => array(
		'normal' => 'Normal',
		'italic' => 'Italic'
	)
);
/* Slogan*/
$options[] = array(
	'id'          => 'penci_header_pb_logo_sidebar_font_size_slogan',
	'default'     => '',
	'transport'   => 'postMessage',
	'type'      => 'soledad-fw-size',
	'sanitize'    => 'absint',
	'label' => __( 'Font Size for Slogan', 'soledad' ),
	'ids'    => array(
		'desktop' => 'penci_header_pb_logo_sidebar_font_size_slogan',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_color_slogan',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-color',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Color Header Slogan',
);
$options[] = array(
	'id'          => 'penci_header_pb_logo_sidebar_penci_font_for_slogan',
	'default'     => '',
	'transport'   => 'postMessage',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Font for Slogan Text',
	
	'description' => 'Default font is "PT Serif"',
	'type'        => 'soledad-fw-select',
	'choices'     => penci_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_penci_font_weight_slogan',
	'default'   => 'bold',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font Weight for Slogan Text',
	'type'      => 'soledad-fw-select',
	'choices'   => array(
		'normal'  => 'Normal',
		'bold'    => 'Bold',
		'bolder'  => 'Bolder',
		'lighter' => 'Lighter',
		'100'     => '100',
		'200'     => '200',
		'300'     => '300',
		'400'     => '400',
		'500'     => '500',
		'600'     => '600',
		'700'     => '700',
		'800'     => '800',
		'900'     => '900'
	)
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_penci_font_style_slogan',
	'default'   => 'normal',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font Style for Slogan Text',
	
	'type'      => 'soledad-fw-select',
	'choices'   => array(
		'normal' => 'Normal',
		'italic' => 'Italic'
	)
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebar_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-box-model',
	'label'     => __( 'Element Spacing', 'soledad' ),
	'choices'   => array(
		'margin'  => array(
			'margin-top'    => '',
			'margin-right'  => '',
			'margin-bottom' => '',
			'margin-left'   => '',
		),
		'padding' => array(
			'padding-top'    => '',
			'padding-right'  => '',
			'padding-bottom' => '',
			'padding-left'   => '',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sidebarclass',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_textarea_field',
	'type'      => 'soledad-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'soledad' ),
);

return $options;
