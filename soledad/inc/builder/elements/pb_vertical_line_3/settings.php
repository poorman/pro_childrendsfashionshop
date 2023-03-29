<?php
$general_config = 'penci_builder_mods';
$options        = [];
$options[]      = array(
	'id'        => 'penci_header_pb_vertical_line3_width',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'soledad-fw-text',
	'label'     => esc_html__( 'Vertical Line Width', 'soledad' ),
);
$options[]      = array(
	'id'        => 'penci_header_pb_vertical_line3_height',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'soledad-fw-text',
	'label'     => esc_html__( 'Vertical Line Height', 'soledad' ),
);
$options[]      = array(
	'id'        => 'penci_header_pb_vertical_line3_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => __( 'Vertical Line Color', 'soledad' ),
);
$options[]      = array(
	'id'        => 'penci_header_pb_vertical_line3_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-box-model',
	'label'     => __( 'Element Spacing', 'soledad' ),
	'choices'   => array(
		'margin' => array(
			'margin-top'    => '',
			'margin-right'  => '',
			'margin-bottom' => '',
			'margin-left'   => '',
		),
	),
);
$options[]      = array(
	'id'        => 'penci_header_pb_vertical_line3_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_textarea_field',
	'type'      => 'soledad-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'soledad' ),
);

return $options;
/*$wp_customize->selective_refresh->add_partial( 'penci_header_pb_vertical_line3_width', array(
	'selector'            => '.penci-vertical-line.vertical-line-1',
	'settings'            => [
		'penci_header_pb_vertical_line3_width',
		'penci_header_pb_vertical_line3_height',
		'penci_header_pb_vertical_line3_color',
		'penci_header_pb_vertical_line3_class',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( PENCI_BUILDER_PATH . '/elements/pb_vertical_line_1/front-end.php' );
	},
	'fallback_refresh'    => false,
) );*/
