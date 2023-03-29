<?php
$options   = [];
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Enable Post Meta Overlay Featured Image', 'soledad' ),
	'description' => __( 'This option just apply for Standard Layout Only', 'soledad' ),
	'id'          => 'penci_standard_meta_overlay',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Post Thumbnail', 'soledad' ),
	'id'       => 'penci_standard_thumbnail',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Autoplay for Slider on Posts Format Gallery', 'soledad' ),
	'id'       => 'penci_standard_disable_autoplay_gallery',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Make Featured Image Auto Crop', 'soledad' ),
	'id'       => 'penci_standard_thumb_crop',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable Uppercase in Post Categories', 'soledad' ),
	'id'       => 'penci_standard_on_uppercase_cat',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Turn Off Uppercase in Post Title', 'soledad' ),
	'id'       => 'penci_standard_off_uppercase_title',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Share Box', 'soledad' ),
	'id'       => 'penci_standard_share_box',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Category', 'soledad' ),
	'id'       => 'penci_standard_cat',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Post Author', 'soledad' ),
	'id'       => 'penci_standard_author',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Reading Time', 'soledad' ),
	'id'       => 'penci_standard_readingtime',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Post Date', 'soledad' ),
	'id'       => 'penci_standard_date',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Comment Count', 'soledad' ),
	'id'       => 'penci_standard_comment',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Show Views Count', 'soledad' ),
	'id'       => 'penci_standard_viewcount',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Remove Line Above Post Excerpt', 'soledad' ),
	'id'       => 'penci_standard_remove_line',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Display Post Excerpt Instead of Full Content', 'soledad' ),
	'id'       => 'penci_standard_auto_excerpt',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Hover Effect on "Continue Reading" Button', 'soledad' ),
	'id'       => 'penci_standard_effect_button',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Make "Continue Reading" is A Button', 'soledad' ),
	'id'       => 'penci_standard_continue_reading_button',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => '30',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Excerpt Length', 'soledad' ),
	'id'       => 'penci_standard_excerpt_length',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_standard_excerpt_length',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '',
			'default' => '30',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Header Alignment', 'soledad' ),
	'id'       => 'penci_stahea_align',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		''       => esc_html__( 'Default', 'soledad' ),
		'left'   => esc_html__( 'Left', 'soledad' ),
		'center' => esc_html__( 'Center', 'soledad' ),
		'right'  => esc_html__( 'Right', 'soledad' ),
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Post Excerpt Alignment', 'soledad' ),
	'id'       => 'penci_staex_align',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		''        => esc_html__( 'Default', 'soledad' ),
		'left'    => esc_html__( 'Left', 'soledad' ),
		'center'  => esc_html__( 'Center', 'soledad' ),
		'right'   => esc_html__( 'Right', 'soledad' ),
		'justify' => esc_html__( 'Justify', 'soledad' ),
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( '"Continue Reading" Button Alignment', 'soledad' ),
	'id'       => 'penci_stacoti_align',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		''       => esc_html__( 'Default', 'soledad' ),
		'left'   => esc_html__( 'Left', 'soledad' ),
		'center' => esc_html__( 'Center', 'soledad' ),
		'right'  => esc_html__( 'Right', 'soledad' ),
	)
);

return $options;
