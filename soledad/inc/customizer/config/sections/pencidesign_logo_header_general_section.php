<?php
$options               = [];
$header_layout_options = array(
	'header-1'  => __( 'Header 1', 'soledad' ),
	'header-2'  => __( 'Header 2', 'soledad' ),
	'header-3'  => __( 'Header 3', 'soledad' ),
	'header-4'  => __( 'Header 4 ( Centered )', 'soledad' ),
	'header-5'  => __( 'Header 5 ( Centered )', 'soledad' ),
	'header-6'  => __( 'Header 6', 'soledad' ),
	'header-7'  => __( 'Header 7', 'soledad' ),
	'header-8'  => __( 'Header 8', 'soledad' ),
	'header-9'  => __( 'Header 9', 'soledad' ),
	'header-10' => __( 'Header 10', 'soledad' ),
	'header-11' => __( 'Header 11', 'soledad' ),
);
$options[]             = array(
	'default'  => 'header-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Header Layout', 'soledad' ),
	'id'       => 'penci_header_layout',
	'type'     => 'soledad-fw-select',
	'choices'  => $header_layout_options,
);
$options[]             = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Custom Header Container Width', 'soledad' ),
	'id'       => 'penci_header_ctwidth',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		''          => esc_html__( 'Width: 1170px', 'soledad' ),
		'1400'      => esc_html__( 'Width: 1400px', 'soledad' ),
		'fullwidth' => esc_html__( 'FullWidth', 'soledad' ),
	)
);
$options[]             = array(
	'sanitize'    => 'esc_url_raw',
	'type'        => 'soledad-fw-image',
	'label'       => __( 'Banner Header Right For Header 3', 'soledad' ),
	'id'          => 'penci_header_3_banner',
	'description' => __( 'You should choose banner with 728px width and 90px - 100px height for the best result', 'soledad' ),
);
$options[]             = array(
	'default'     => '#',
	'sanitize'    => 'esc_url_raw',
	'label'       => __( 'Link To Go When Click Banner Header Right on Header 3', 'soledad' ),
	'id'          => 'penci_header_3_banner_url',
	'description' => '',
	'type'        => 'soledad-fw-text',
);
$options[]             = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => __( 'Google adsense/custom HTML code to display in header 3', 'soledad' ),
	'id'          => 'penci_header_3_adsense',
	'description' => __( 'If you want use google adsense/custom HTML code in header style 3, paste your google adsense/custom HTML code here', 'soledad' ),
	'type'        => 'soledad-fw-textarea',
);
$options[]             = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Remove Border Bottom on The Header', 'soledad' ),
	'id'          => 'penci_remove_border_bottom_header',
	'description' => __( 'This option just apply for header styles 1, 4, 7', 'soledad' ),
	'type'        => 'soledad-fw-toggle',
);
$options[]             = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Header Social Icons', 'soledad' ),
	'id'       => 'penci_header_social_check',
	'type'     => 'soledad-fw-toggle',
);
$options[]             = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable Use Brand Colors for Social Icons on Header', 'soledad' ),
	'id'       => 'penci_header_social_brand',
	'type'     => 'soledad-fw-toggle',
);
$options[]             = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Font Size for Social Icons', 'soledad' ),
	'id'       => 'penci_size_header_social_check',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_size_header_social_check',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[]             = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Display Top Instagram Widget Title Overlay Images', 'soledad' ),
	'id'       => 'penci_top_insta_overlay_image',
	'type'     => 'soledad-fw-toggle',
);
$options[]             = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Instagram Icon on Top Instagram Widget', 'soledad' ),
	'id'       => 'penci_top_insta_hide_icon',
	'type'     => 'soledad-fw-toggle',
);
$options[]             = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => __( 'Add Custom Code Inside &lt;head&gt; tag', 'soledad' ),
	'id'       => 'penci_custom_code_inside_head_tag',
	'type'     => 'soledad-fw-textarea',
);
$options[]             = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => __( 'Add Custom Code After &lt;body&gt; tag', 'soledad' ),
	'id'       => 'penci_custom_code_after_body_tag',
	'type'     => 'soledad-fw-textarea',
);
/* Slogan Text */
$options[] = array(
	'default'     => 'keep your memories alive',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => __( 'Header Slogan Text', 'soledad' ),
	'id'          => 'penci_header_slogan_text',
	'description' => __( 'If you want to hide the slogan text, let make it blank', 'soledad' ),
	'type'        => 'soledad-fw-textarea',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Remove the Lines on Left & Right of Header Slogan', 'soledad' ),
	'id'       => 'penci_header_remove_line_slogan',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => '14',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Slogan', 'soledad' ),
	'id'       => 'penci_font_size_slogan',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_font_size_slogan',
	),
	'choices'  => array(
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
	'default'     => '"PT Serif", "regular:italic:700:700italic", serif',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Font For Header Slogan', 'soledad' ),
	'id'          => 'penci_font_for_slogan',
	'description' => __( 'Default font is "PT Serif"', 'soledad' ),
	'type'        => 'soledad-fw-select',
	'choices'     => penci_all_fonts()
);
$options[] = array(
	'default'  => 'bold',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Font Weight For Slogan', 'soledad' ),
	'id'       => 'penci_font_weight_slogan',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
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
	'default'  => 'italic',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Font Style for Slogan', 'soledad' ),
	'id'       => 'penci_font_style_slogan',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'italic' => 'Italic',
		'normal' => 'Normal'
	)
);

return $options;
