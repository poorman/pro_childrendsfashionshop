<?php
$options   = [];
$options[] = array(
	'id'        => 'penci_header_pb_search_form_style',
	'default'   => 'default',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Search Style',

	'type'    => 'soledad-fw-select',
	'choices' => array(
		'default'     => 'Default',
		'text-button' => 'Text Button',
		'icon-button' => 'Icon Button',
	)
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Background Color',
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_border_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Borders Color',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_txt_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Text Color',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_btntxt_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Icon/Button Text Color',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_btnhtxt_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Button Hover Text Color',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_btn_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Button Background Color',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_btn_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Button Background Hover Color',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_width',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Search Form Max Width',
	'type'      => 'soledad-fw-size',
	'ids'       => array(
		'desktop' => 'penci_header_pb_search_form_width',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 1200,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_height',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Custom Height',
	'type'      => 'soledad-fw-size',
	'ids'       => array(
		'desktop' => 'penci_header_pb_search_form_height',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 1200,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_input_size',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Font Size for Input Text',
	'type'      => 'soledad-fw-size',
	'ids'       => array(
		'desktop' => 'penci_header_pb_search_form_input_size',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 1200,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_btn_size',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Font Size for Button/Icon',
	'type'      => 'soledad-fw-size',
	'ids'       => array(
		'desktop' => 'penci_header_pb_search_form_btn_size',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 1200,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_input_pdl',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-size',
	'ids'       => array(
		'desktop' => 'penci_header_pb_search_form_input_pdl',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 1200,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
	'label'     => __( 'Input Text Padding Left', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_input_pdr',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-size',
	'ids'       => array(
		'desktop' => 'penci_header_pb_search_form_input_pdr',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 1200,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
	'label'     => __( 'Input Text Padding Right', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_btn_pdl',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-size',
	'ids'       => array(
		'desktop' => 'penci_header_pb_search_form_btn_pdl',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 1200,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
	'label'     => __( 'Button Padding Left', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_btn_pdr',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-size',
	'ids'       => array(
		'desktop' => 'penci_header_pb_search_form_btn_pdr',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 1200,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
	'label'     => __( 'Button Padding Right', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_search_form_menu_spacing',
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
	'id'        => 'penci_header_pb_search_form_menu_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_textarea_field',
	'type'      => 'soledad-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'soledad' ),

);

/*$wp_customize->selective_refresh->add_partial( 'penci_header_pb_search_form_bg_color', array(
	'selector'            => '.penci-builder-element.pc-search-form',
	'settings'            => [
		'penci_header_pb_search_form_bg_color',
		'penci_header_pb_search_form_border_color',
		'penci_header_pb_search_form_txt_color',
		'penci_header_pb_search_form_btn_color',
		'penci_header_pb_search_form_btn_hv_color',
		'penci_header_pb_search_form_style',
		'penci_header_pb_search_form_width',
		'penci_header_pb_search_form_height',
		'penci_header_pb_search_form_menu_spacing',
		'penci_header_pb_search_form_menu_class',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( PENCI_BUILDER_PATH . '/elements/pb_search_form/front-end.php' );
	},
	'fallback_refresh'    => false,
) );*/

return $options;
