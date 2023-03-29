<?php
$options   = [];
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_text_setting',
	'default'   => 'Button Text',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      =>  'soledad-fw-text',
	'label'     => __( 'Button Text', 'soledad' ),
	'partial_refresh' => [
		'penci_header_pb_button_mobile_text_setting' => [
			'selector'        => '.pc-wrapbuilder-header-inner',
			'render_callback' => function () {
				load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
			},
		],
	],
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_link_setting',
	'default'   => 'https://your-link.com',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      =>  'soledad-fw-text',
	'label'     => __( 'Button Link', 'soledad' ),
	'priority'  => 10,
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_link_target',
	'default'   => '_blank',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      =>  'soledad-fw-select',
	'label'     => __( 'Link Target', 'soledad' ),
	'choices'   => [
		'_blank'  => 'Blank',
		'_self'   => 'Self',
		'_parent' => 'Parent',
		'_top'    => 'Top',
	]
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_link_rel',
	'default'   => 'noreferrer',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Select "rel" Attribute Type for Button Link',
	'type'      =>  'soledad-fw-select',
	'choices'   => array(
		'none'                         => 'None',
		'nofollow'                     => 'nofollow',
		'noreferrer'                   => 'noreferrer',
		'noopener'                     => 'noopener',
		'noreferrer_noopener'          => 'noreferrer noopener',
		'nofollow_noreferrer'          => 'nofollow noreferrer',
		'nofollow_noopener'            => 'nofollow noopener',
		'nofollow_noreferrer_noopener' => 'nofollow noreferrer noopener',
	)
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_style',
	'default'   => 'style-4',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      =>  'soledad-fw-select',
	'label'     => __( 'Button Pre-define Style', 'soledad' ),
	'choices'   => [
		'customize' => 'Default',
		'style-4'   => 'Filled',
		'style-1'   => 'Bordered',
		'style-2'   => 'Link',
		'style-3'   => 'Creative',
	]
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_shape',
	'default'   => 'ratangle',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      =>  'soledad-fw-select',
	'label'     => __( 'Button Shape', 'soledad' ),
	'choices'   => [
		'ratangle' => 'Retangle',
		'circle'   => 'Circle',
		'round'    => 'Round',
	]
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_spacing_setting',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      =>  'soledad-fw-box-model',
	
	'label'     => __( 'Button Spacing', 'soledad' ),
	'choices'   => array(
		'margin'        => array(
			'margin-top'    => '',
			'margin-right'  => '',
			'margin-bottom' => '',
			'margin-left'   => '',
		),
		'padding'       => array(
			'padding-top'    => '',
			'padding-right'  => '',
			'padding-bottom' => '',
			'padding-left'   => '',
		),
		'border'        => array(
			'border-top'    => '',
			'border-right'  => '',
			'border-bottom' => '',
			'border-left'   => '',
		),
		'border-radius' => array(
			'border-radius-top'    => '',
			'border-radius-right'  => '',
			'border-radius-bottom' => '',
			'border-radius-left'   => '',
		),
	),
);
/* start font */
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_font',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font For Button Text',
	
	'type'      =>  'soledad-fw-select',
	'choices'   => penci_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_font_w',
	'default'   => 'bold',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font Weight For Button Text',
	
	'type'      =>  'soledad-fw-select',
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
	'id'        => 'penci_header_pb_button_mobile_font_s',
	'default'   => 'normal',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Font Style for Button Text',
	
	'type'      =>  'soledad-fw-select',
	'choices'   => array(
		'normal' => 'Normal',
		'italic' => 'Italic'
	)
);
/* end font*/
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_border_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	
	'label'     => __( 'Borders Color', 'soledad' ),
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_border_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-color',
	
	'label'     => __( 'Borders Hover Color', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-color',
	'label'     => __( 'Background Color', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_bg_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-color',
	
	'label'     => __( 'Background Hover Color', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_txt_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-color',
	'label'     => __( 'Text Color', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_txt_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-color',
	
	'label'     => __( 'Text Hover Color', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_button_mobile_txt_size',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Button Font Size',
	'type'      => 'soledad-fw-size',
	'ids'  => array(
		'desktop' => 'penci_header_pb_button_mobile_txt_size',
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
	'id'       => 'penci_header_pb_button_mobile_txt_css_class',
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'type'     =>  'soledad-fw-text',
	'label'    => esc_html__( 'Custom CSS Class', 'soledad' ),
);
return $options;
