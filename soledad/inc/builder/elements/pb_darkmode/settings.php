<?php
$options   = [];
$options[] = array(
	'id'       => 'penci_header_pb_darkmode_desc',
	'type'     => 'soledad-fw-alert',
	'label'    => 'Please go to "Appearance > Customize > Dark Mode/Dark Theme": turn on the "Enable Dark Mode Switcher" option before using this feature.',
	'sanitize' => 'penci_sanitize_choices_field',
	'default'  => 'notice-bg'
);
$options[] = array(
	'id'        => 'penci_header_pb_darkmode_style',
	'default'   => '3',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-select',
	'label'     => __( 'Button Style', 'soledad' ),
	'choices'   => [
		'1' => 'Style 1',
		'2' => 'Style 2',
		'3' => 'Style 3',
		'4' => 'Style 4',
	]
);
$options[] = array(
	'id'        => 'penci_header_pb_darkmode_bgcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => esc_html__( 'General Background Color', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_darkmode_d_color',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => esc_html__( 'Day Color', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_darkmode_d_bgcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => esc_html__( 'Day Background Color', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_darkmode_n_color',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => esc_html__( 'Night Color', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_darkmode_n_bgcolor',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-color',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => esc_html__( 'Night Background Color', 'soledad' ),
);
$options[] = array(
	'id'        => 'penci_header_pb_darkmode_spacing',
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

return $options;
