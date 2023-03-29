<?php
$options   = [];
$options[] = array(
	'id'        => 'penci_header_pb_logo_sticky_logo_display',
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
		'penci_header_pb_logo_sticky_logo_display' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'          => 'penci_header_pb_logo_sticky_image_setting_url',
	'default'     => '',
	'transport'   => 'postMessage',
	'sanitize'    => 'penci_sanitize_choices_field',
	'type'        => 'soledad-fw-image',
	'label'       => esc_html__( 'Logo Image', 'soledad' ),
	'description' => esc_html__( 'Upload your image logo here', 'soledad' ),
	'partial_refresh' => [
		'penci_header_pb_logo_sticky_image_setting_url' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sticky_size_logo_w',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'soledad-fw-size',
	'label'     => __( 'Maxium Width for Logo Image', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_logo_sticky_size_logo_w',
	),
	'choices'   => array(
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
	'id'        => 'penci_header_pb_logo_sticky_size_logo_h',
	'default'   => '60',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-size',
	'sanitize'  => 'absint',
	'label'     => __( 'Maxium Height for Logo Image', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_logo_sticky_size_logo_h',
	),
	'choices'   => array(
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
	'id'        => 'penci_header_pb_logo_sticky_image_setting_href',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-text',
	'label'     => __( 'Custom Logo Link', 'soledad' ),
	'priority'  => 10,
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sticky_site_title',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-text',
	'label'     => esc_html__( 'Text Logo', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sticky_site_description',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-textarea',
	'label'     => esc_html__( 'Slogan', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sticky_font_size_logo',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'soledad-fw-size',
	'label'     => __( 'Font Size for Text Logo', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_logo_sticky_font_size_logo',
	),
	'choices'   => array(
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
	'id'        => 'penci_header_pb_logo_sticky_color_logo',
	'default'   => '',
	'type'      => 'soledad-fw-color',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Color for Text Logo',
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sticky_penci_font_for_title',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font for Text Logo',
	'type'      => 'soledad-fw-select',
	'choices'   => penci_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sticky_penci_font_weight_title',
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
	'id'        => 'penci_header_pb_logo_sticky_penci_font_style_title',
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
	'id'        => 'penci_header_pb_logo_sticky_font_size_slogan',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-size',
	'sanitize'  => 'absint',
	'label'     => __( 'Font Size for Slogan Text', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_logo_sticky_font_size_slogan',
	),
	'choices'   => array(
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
	'id'        => 'penci_header_pb_logo_sticky_color_slogan',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-color',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Color for Slogan Text',
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sticky_penci_font_for_slogan',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font for Slogan Text',
	'type'      => 'soledad-fw-select',
	'choices'   => penci_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'penci_header_pb_logo_sticky_penci_font_weight_slogan',
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
	'id'        => 'penci_header_pb_logo_sticky_penci_font_style_slogan',
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
	'id'        => 'penci_header_pb_logo_sticky_spacing',
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
	'id'        => 'penci_header_pb_logo_stickyclass',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_textarea_field',
	'type'      => 'soledad-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'soledad' ),
);

/*$wp_customize->selective_refresh->add_partial( 'penci_header_pb_logo_sticky_logo_display', array(
	'selector'            => '.pc-wrapbuilder-header-inner',
	'settings'            => [
		'penci_header_pb_logo_sticky_logo_display',
		'penci_header_pb_logo_sticky_image_setting_url',
		//'penci_header_pb_logo_sticky_size_logo_w',
		//'penci_header_pb_logo_sticky_size_logo_h',
		//'penci_header_pb_logo_sticky_image_setting_href',
		'penci_header_pb_logo_sticky_site_title',
		'penci_header_pb_logo_sticky_site_description',
		//'penci_header_pb_logo_sticky_font_size_logo',
		//'penci_header_pb_logo_sticky_color_logo',
		//'penci_header_pb_logo_sticky_penci_font_for_title',
		//'penci_header_pb_logo_sticky_penci_font_weight_title',
		//'penci_header_pb_logo_sticky_penci_font_style_title',
		//'penci_header_pb_logo_sticky_font_size_slogan',
		//'penci_header_pb_logo_sticky_color_slogan',
		//'penci_header_pb_logo_sticky_penci_font_for_slogan',
		//'penci_header_pb_logo_sticky_penci_font_weight_slogan',
		//'penci_header_pb_logo_sticky_penci_font_style_slogan',
		//'penci_header_pb_logo_sticky_spacing',
		'penci_header_pb_logoclass',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
	},
	'fallback_refresh'    => false,
) );*/

return $options;
