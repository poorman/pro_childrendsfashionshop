<?php
$options   = [];
$options[] = array(
	'label'       => __( 'Enable Body Boxed Layout', 'soledad' ),
	'description'=>__('This option does not apply when you enable vertical navigation','soledad'),
	'id'          => 'penci_body_boxed_layout',
	'type'        => 'soledad-fw-toggle',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => __( 'Background Color for Body Boxed', 'soledad' ),
	'id'       => 'penci_body_boxed_bg_color',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => __( 'Background Image for Body Boxed', 'soledad' ),
	'id'       => 'penci_body_boxed_bg_image',
	'sanitize' => 'esc_url_raw',
	'type'     => 'soledad-fw-image'
);
$options[] = array(
	'label'    => __( 'Background Body Boxed Repeat', 'soledad' ),
	'id'       => 'penci_body_boxed_bg_repeat',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'no-repeat' => 'No Repeat',
		'repeat'    => 'Repeat'
	),
	'default'  => 'no-repeat',
	'sanitize' => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'    => __( 'Background Body Boxed Attachment', 'soledad' ),
	'id'       => 'penci_body_boxed_bg_attachment',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'fixed'  => 'Fixed',
		'scroll' => 'Scroll',
		'local'  => 'Local'
	),
	'default'  => 'fixed',
	'sanitize' => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'    => __( 'Background Body Boxed Size', 'soledad' ),
	'id'       => 'penci_body_boxed_bg_size',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'cover' => 'Cover',
		'auto'  => 'Auto',
	),
	'default'  => 'cover',
	'sanitize' => 'penci_sanitize_choices_field'
);

return $options;
