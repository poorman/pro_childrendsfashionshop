<?php
$social_icon_section         = 'penci_header_pb_social_icon_mobile_section';
$general_config              = 'penci_builder_mods';
$query                       = [];
$query['autofocus[section]'] = 'pencidesign_new_section_social';
$options                     = [];
$options[]                   = array(
	'id'        => $social_icon_section . '_icon_size',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'label'     => 'Social Icon Size',
	'type'      => 'soledad-fw-size',
	
	'ids'  => array(
		'desktop' => $social_icon_section . '_icon_size',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 50,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[]                   = array(
	'id'        => $social_icon_section . '_icon_w',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'soledad-fw-size',
	'label'     => 'Social Icon Width',
	
	'ids'  => array(
		'desktop' => $social_icon_section . '_icon_w',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 50,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[]                   = array(
	'id'        => $social_icon_section . '_item_spacing',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-size',
	'sanitize'  => 'absint',
	'label'     => 'Spacing Between Item',
	
	'ids'  => array(
		'desktop' => $social_icon_section . '_item_spacing',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 1000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[]                   = array(
	'id'        => $social_icon_section . '_icon_style',
	'default'   => 'simple',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Social Icon Style',
	
	'type'      => 'soledad-fw-select',
	'choices'   => array(
		'simple' => 'Simple',
		'square' => 'Square',
		'circle' => 'Circle',
	)
);
$options[]                   = array(
	'id'        => $social_icon_section . '_icon_color',
	'default'   => 'normal',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Social Icon Color',
	
	'type'      => 'soledad-fw-select',
	'choices'   => array(
		'textaccent'  => 'Custom Color',
		'textcolored' => 'Brand Text Color',
		'colored'     => 'Brand Background Color',
	)
);
$options[]                   = array(
	'id'        => $social_icon_section . '_spacing',
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
$options[]                   = array(
	'id'        => $social_icon_section . '_penci_rel_type_social',
	'default'   => 'noreferrer',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Select "rel" Attribute Type for Social Media & Social Share Icons',
	
	'type'      => 'soledad-fw-select',
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
$options[]                   = array(
	'id'        => $social_icon_section . '_bg_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Custom Background Color',
	
);
$options[]                   = array(
	'id'        => $social_icon_section . '_bg_hv_color',
	'type'      => 'soledad-fw-color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Custom Background Hover Color',
	
);
$options[]                   = array(
	'id'        => $social_icon_section . '_border_color',
	'type'      => 'soledad-fw-color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Custom Borders Color',
	
);
$options[]                   = array(
	'id'        => $social_icon_section . '_border_hv_color',
	'type'      => 'soledad-fw-color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Custom Borders Hover Color',
	
);
$options[]                   = array(
	'id'        => $social_icon_section . '_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'type'      => 'soledad-fw-color',
	'label'     => 'Custom Color',
	
);
$options[]                   = array(
	'id'        => $social_icon_section . '_hv_color',
	'type'      => 'soledad-fw-color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'sanitize_hex_color',
	'label'     => 'Custom Hover Color',
	
);

return $options;