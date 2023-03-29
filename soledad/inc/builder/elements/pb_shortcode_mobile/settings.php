<?php
$options   = [];
$options[] = array(
	'id'        => 'penci_header_builder_pb_shortcode_mobile_name',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-textarea',
	
	'label'     => esc_html__( 'Shortcode Code', 'soledad' ),
	'priority'  => 10,
);
$options[] = array(
	'id'        => 'penci_header_builder_pb_shortcode_mobile_spacing',
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
	'id'        => 'penci_header_builder_pb_shortcode_mobile_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_textarea_field',
	'type'      => 'soledad-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'soledad' ),
);

return $options;
/*$wp_customize->selective_refresh->add_partial( 'penci_header_builder_pb_shortcode_mobile_name', array(
	'selector'            => '.pc-wrapbuilder-header-inner',
	'settings'            => [
		'penci_header_builder_pb_shortcode_mobile_name',
		//'penci_header_builder_pb_shortcode_mobile_spacing',
		'penci_header_builder_pb_shortcode_mobile_class',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
	},
	'fallback_refresh'    => false,
) );*/
