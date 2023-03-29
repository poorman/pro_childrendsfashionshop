<?php
$options   = [];
$options[] = array(
	'label'    => __( 'General Text Colors', 'soledad' ),
	'id'       => 'penci_general_text_color',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => __( 'Accent Colors', 'soledad' ),
	'id'       => 'penci_color_accent',
	'default'  => '#6eb48c',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Custom General Buttons Background Color', 'soledad' ),
	'id'       => 'penci_buttons_bg',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Custom General Buttons Text Color', 'soledad' ),
	'id'       => 'penci_buttons_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Custom General Buttons Hover Background Color', 'soledad' ),
	'id'       => 'penci_buttons_bghover',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Custom General Buttons Hover Text Color', 'soledad' ),
	'id'       => 'penci_buttons_colorhver',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Custom Background Color for Body', 'soledad' ),
	'id'       => 'penci_bg_color_dark',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Custom General Border Color', 'soledad' ),
	'id'       => 'penci_border_color_dark',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Breadcrumbs Text Color', 'soledad' ),
	'id'       => 'penci_breadcrumbs_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Breadcrumbs Text Hover Color', 'soledad' ),
	'id'       => 'penci_breadcrumbs_hcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Archive Page Titles Prefix Color', 'soledad' ),
	'id'       => 'penci_archivetitle_prefix_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Archive Page Titles Color', 'soledad' ),
	'id'       => 'penci_archivetitle_color',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Selector Background Color', 'soledad' ),
	'id'       => 'penci_textselector_bgcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Selector Text Color', 'soledad' ),
	'id'       => 'penci_textselector_txtcolor',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'       => __( 'Enable Dark Theme', 'soledad' ),
	'id'          => 'penci_enable_dark_layout',
	'description' => __( 'All options below only apply when you enable dark theme. And all other elements, please change it via other colors options for those elements.', 'soledad' ),
	'type'        => 'soledad-fw-toggle',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => __( 'Custom Text Color for Dark Theme', 'soledad' ),
	'id'       => 'penci_text_color_dark',
	'default'  => '#afafaf',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

$options[] = array(
	'label'    => __( 'Custom Posts Meta Color for Dark Theme', 'soledad' ),
	'id'       => 'penci_meta_color_dark',
	'default'  => '#949494',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'       => esc_html__( 'Filled Categories Styles', 'soledad' ),
	'description' => __( 'The options below apply for categories listing filled styles you selected via General > General Settings > Style for Post Categories Listing', 'soledad' ),
	'id'          => 'penci_catfil_bheading',
	'type'        => 'soledad-fw-header',
	'sanitize'    => 'sanitize_text_field'
);
$options[] = array(
	'label'    => __( 'Text Color', 'soledad' ),
	'id'       => 'penci_cfiled_cl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Background Color', 'soledad' ),
	'id'       => 'penci_cfiled_bgcl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Text Hover Color', 'soledad' ),
	'id'       => 'penci_cfiled_hcl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'label'    => __( 'Background Hover Color', 'soledad' ),
	'id'       => 'penci_cfiled_hbgcl',
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
);

$options[] = array(
	'label'    => esc_html__( 'Pagination/Load More Post Button', 'soledad' ),
	'id'       => 'penci_pagination_bheading',
	'type'     => 'soledad-fw-header',
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => __( 'Color for Pagination', 'soledad' ),
	'id'       => 'penci_pagination_color',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => __( 'Accent Color for Pagination', 'soledad' ),
	'id'       => 'penci_pagination_hcolor',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => __( 'Color for "Load More Posts" Button', 'soledad' ),
	'id'       => 'penci_loadmorebtn_color',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => __( 'Borders Color for "Load More Posts" Button', 'soledad' ),
	'id'       => 'penci_loadmorebtn_borders',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => __( 'Background Color for "Load More Posts" Button', 'soledad' ),
	'id'       => 'penci_loadmorebtn_bg',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => __( 'Color on Hover for "Load More Posts" Button', 'soledad' ),
	'id'       => 'penci_loadmorebtn_hcolor',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => __( 'Borders Color on Hover for "Load More Posts" Button', 'soledad' ),
	'id'       => 'penci_loadmorebtn_hborders',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);
$options[] = array(
	'label'    => __( 'Background Color on Hover for "Load More Posts" Button', 'soledad' ),
	'id'       => 'penci_loadmorebtn_hbg',
	'default'  => '',
	'type'     => 'soledad-fw-color',
	'sanitize' => 'sanitize_hex_color'
);

return $options;
