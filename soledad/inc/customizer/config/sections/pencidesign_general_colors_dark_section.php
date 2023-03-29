<?php
$options   = [];
$options[] = array(
	'label'    => esc_html__( 'Dark Mode Switcher', 'soledad' ),
	'id'       => 'penci_dm_switcher_heading',
	'type'     => 'soledad-fw-header',
	'sanitize' => 'sanitize_text_field'
);

$options[] = array(
	'label'    => __( 'Enable Dark Mode Switcher', 'soledad' ),
	'id'       => 'penci_dms_enable',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);

$options[] = array(
	'label'    => __( 'Switcher Style', 'soledad' ),
	'id'       => 'penci_dms_style',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'1' => 'Style 1',
		'2' => 'Style 2',
		'3' => 'Style 3',
		'4' => 'Style 4',
	),
	'default'  => '3',
	'sanitize' => 'penci_sanitize_choices_field'
);

$options[] = array(
	'label'    => esc_html__( 'Auto Dark Mode', 'soledad' ),
	'id'       => 'penci_dms_auto_by',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'disable' => 'Disable',
		'os'      => 'By Operating System',
		'time'    => 'By User Time',
	),
	'default'  => 'disable',
	'sanitize' => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'    => esc_html__( 'Dark Mode Colors', 'soledad' ),
	'id'       => 'penci_dm_switcher_heading_2',
	'type'     => 'soledad-fw-header',
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => esc_html__( 'Logo for Dark Mode', 'soledad' ),
	'id'       => 'penci_menu_logo_dark',
	'type'     => 'soledad-fw-image',
);

$options[] = array(
	'sanitize' => 'esc_url_raw',
	'label'    => esc_html__( 'Logo for Vertical Mobile Navigation', 'soledad' ),
	'id'       => 'penci_menu_logosidebar_dark',
	'type'     => 'soledad-fw-image',
);

$options[] = array(
	'label'    => __( 'Background Color for Body', 'soledad' ),
	'id'       => 'penci_dm_bg_color_dark',
	'default'  => '#000000',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);

$options[] = array(
	'label'    => __( 'General Border Color', 'soledad' ),
	'id'       => 'penci_dm_border_color_dark',
	'default'  => '#333333',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);

$options[] = array(
	'label'    => __( 'Accent Color', 'soledad' ),
	'id'       => 'penci_accent_color_dark',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);

$options[] = array(
	'label'    => __( 'Link Color', 'soledad' ),
	'id'       => 'penci_link_color_dark',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);

$options[] = array(
	'label'    => __( 'Link Hover Color', 'soledad' ),
	'id'       => 'penci_link_hcolor_dark',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);

$options[] = array(
	'label'    => __( 'General Heading Text Color', 'soledad' ),
	'id'       => 'penci_heading_color_dark',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);

$options[] = array(
	'label'    => __( 'Text Color', 'soledad' ),
	'id'       => 'penci_dm_text_color_dark',
	'default'  => '#afafaf',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

$options[] = array(
	'label'    => __( 'Posts Meta Color', 'soledad' ),
	'id'       => 'penci_dm_meta_color_dark',
	'default'  => '#949494',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);

$options[] = array(
	'label'    => esc_html__( 'Dark Mode Switcher Button', 'soledad' ),
	'id'       => 'penci_dm_switcher_heading_01',
	'type'     => 'soledad-fw-header',
	'sanitize' => 'sanitize_text_field'
);

$options[] = array(
	'label'    => __( 'General Background Color', 'soledad' ),
	'id'       => 'penci_dm_bg_color',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

$options[] = array(
	'label'    => __( 'Day Button/Icon Color', 'soledad' ),
	'id'       => 'penci_dm_d_color',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

$options[] = array(
	'label'    => __( 'Day Button/Icon Background Color', 'soledad' ),
	'id'       => 'penci_dm_d_bgcolor',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

$options[] = array(
	'label'    => __( 'Night Button/Icon Color', 'soledad' ),
	'id'       => 'penci_dm_n_color',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

$options[] = array(
	'label'    => __( 'Night Button/Icon Background Color', 'soledad' ),
	'id'       => 'penci_dm_n_bgcolor',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

return $options;
