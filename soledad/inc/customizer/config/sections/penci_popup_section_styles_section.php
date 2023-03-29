<?php
$options   = [];
$options[] = array(
	'id'        => 'penci_popup_bgimg',
	'default'   => '',
	'transport' => 'refresh',
	'type'      => 'soledad-fw-image',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => __( 'Popup Background Image', 'soledad' ),
);
$options[] = array(
	'id'          => 'penci_popup_bgcolor',
	'default'     => '',
	'sanitize'    => 'sanitize_hex_color',
	'type'        => 'soledad-fw-color',
	'label'       => __( 'Popup Background Color', 'soledad' ),
	'description' => __( 'Set background image or color for promo popup', 'soledad' ),
);
$options[] = array(
	'id'       => 'penci_popup_bgrepeat',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Popup Background Repeat', 'soledad' ),
	'type'     => 'soledad-fw-select',
	'choices'  => [
		'repeat'    => 'repeat',
		'repeat-x'  => 'repeat-x',
		'repeat-y'  => 'repeat-y',
		'no-repeat' => 'no-repeat',
		'initial'   => 'initial',
		'inherit'   => 'inherit'
	]
);
$options[] = array(
	'id'       => 'penci_popup_bgposition',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Popup Background Position', 'soledad' ),
	'type'     => 'soledad-fw-select',
	'choices'  => [
		'left top'      => 'left top',
		'left center'   => 'left center',
		'left bottom'   => 'left bottom',
		'right top'     => 'right top',
		'right center'  => 'right center',
		'right bottom'  => 'right bottom',
		'center top'    => 'center top',
		'center center' => 'center center',
		'center bottom' => 'center bottom',
	]
);
$options[] = array(
	'id'       => 'penci_popup_bgsize',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Popup Background Size', 'soledad' ),
	'type'     => 'soledad-fw-select',
	'choices'  => [
		'auto'    => 'auto',
		'length'  => 'length',
		'cover'   => 'cover',
		'contain' => 'contain',
		'initial' => 'initial',
		'inherit' => 'inherit'
	]
);
$options[] = array(
	'id'       => 'penci_popup_bgscroll',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Popup Background Scroll', 'soledad' ),
	'type'     => 'soledad-fw-select',
	'choices'  => [
		'scroll'  => 'scroll',
		'fixed'   => 'fixed',
		'local'   => 'local',
		'initial' => 'initial',
		'inherit' => 'inherit'
	]
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'penci_popup_width_mobile',
	'type'        => 'soledad-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'       => __( 'Popup Width', 'soledad' ),
	'description' => __( 'Set width of the promo popup in pixels.', 'soledad' ),
	'id'          => 'penci_popup_width_desktop',
	'type'        => 'soledad-fw-size',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'penci_popup_width_desktop',
		'mobile'  => 'penci_popup_width_mobile',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'       => 'penci_popup_txtcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => __( 'Popup Text Color', 'soledad' ),
);
$options[] = array(
	'id'       => 'penci_popup_bordercolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => __( 'Popup Border Color', 'soledad' ),
);
$options[] = array(
	'id'       => 'penci_popup_closecolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => __( 'Popup Close Button Color', 'soledad' ),
);
$options[] = array(
	'label'       => '',
	'description' => '',
	'id'          => 'penci_popup_txt_msize',
	'type'        => 'soledad-fw-hidden',
	'sanitize'    => 'absint',
);
$options[] = array(
	'label'    => __( 'Popup Text Size', 'soledad' ),
	'id'       => 'penci_popup_txt_size',
	'type'     => 'soledad-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_popup_txt_size',
		'mobile'  => 'penci_popup_txt_msize',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
		'mobile'  => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'       => 'penci_popup_spacing',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-box-model',
	'label'    => __( 'Popup Spacing', 'soledad' ),
	'choices'  => array(
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

return $options;
