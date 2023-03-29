<?php
$options   = [];
$options[] = array(
	'id'       => 'penci_header_pb_news_ticker_text',
	'default'  => esc_html__( 'Top Posts', 'soledad' ),
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-text',
	'label'    => esc_html__( 'Custom "Top Posts" Text', 'soledad' ),
	'desc'     => esc_html__( 'If you want hide Top Posts text, let empty this', 'soledad' ),
);
$options[] = array(
	'id'       => 'penci_header_pb_news_ticker_style',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-select',
	'label'    => __( 'Style for "Top Posts" Text', 'soledad' ),
	'priority' => 10,
	'choices'  => array(
		''                => 'Default Style',
		'nticker-style-2' => 'Style 2',
		'nticker-style-3' => 'Style 3',
		'nticker-style-4' => 'Style 4'
	)
);
$options[] = array(
	'id'       => 'penci_header_pb_news_ticker_animation',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-select',
	'label'    => __( '"Top Posts" Transition Animation', 'soledad' ),
	'default'  => '',
	'priority' => 10,
	'choices'  => array(
		''             => 'Slide In Up',
		'slideInRight' => 'Fade In Right',
		'fadeIn'       => 'Fade In',
	)
);
$options[] = array(
	'id'       => 'penci_header_pb_news_ticker_by',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-select',
	'label'    => esc_html__( 'Display Top Posts By', 'soledad' ),
	'choices'  => array(
		''      => 'Recent Posts',
		'all'   => 'Popular Posts All Time',
		'week'  => 'Popular Posts Once Weekly',
		'month' => 'Popular Posts Once Month'
	)
);
$options[] = array(
	'id'       => 'penci_header_pb_news_ticker_filter_by',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-radio',
	'label'    => esc_html__( 'Filter Topbar By', 'soledad' ),
	'priority' => 10,
	'choices'  => array(
		'category' => 'Category',
		'tags'     => 'Tags'
	)
);
$options[] = array(
	'id'          => 'penci_header_pb_news_ticker_tags',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'type'        => 'soledad-fw-textarea',
	'label'       => esc_html__( 'Fill List Tags for Filter by Tags on "Top Post"', 'soledad' ),
	'description' => 'This option just apply when you select "Filter Topbar by" Tags above. And please fill list featured tags slug here, check <a rel="nofollow" href="https://soledad.pencidesign.net/soledad-document/images/tags.png" target="_blank">this image</a> to know what is tags slug. Example for multiple tags slug, fill:  tag-1, tag-2, tag-3',
	'priority'    => 10,
);
$options[] = array(
	'id'          => 'penci_header_pb_news_ticker_cats',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'type'        => 'soledad-fw-textarea',
	'label'       => esc_html__( 'Fill List Categories for Filter by Category on "Top Post"', 'soledad' ),
	'description' => 'This option just apply when you select "Filter Topbar by" Category above. And please fill list featured category slug here, check <a rel="nofollow" href="https://soledad.pencidesign.net/soledad-document/images/tags.png" target="_blank">this image</a> to know what is tags slug. Example for multiple category slug, fill:  cat-1, cat-2, cat-3',
);
$options[] = array(
	'id'       => 'penci_header_pb_news_ticker_post_titles',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-size',
	'label'    => esc_html__( 'Words Length for Post Titles on Top Posts', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_news_ticker_post_titles',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'ms',
		),
	),
);
$options[] = array(
	'id'       => 'penci_header_pb_news_ticker_disable_autoplay',
	'default'  => 'disable',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => esc_html__( 'Disable Auto Play', 'soledad' ),
	'type'     => 'soledad-fw-select',
	'choices'  => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'          => 'penci_header_pb_news_ticker_autoplay_timeout',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'type'        => 'soledad-fw-size',
	'description' => '1000 = 1 second',
	'label'       => esc_html__( 'Autoplay Timeout', 'soledad' ),
	'priority'    => 10,
	'ids'       => array(
		'desktop' => 'penci_header_pb_news_ticker_autoplay_timeout',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'ms',
		),
	),
);
$options[] = array(
	'id'          => 'penci_header_pb_news_ticker_autoplay_speed',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'type'        => 'soledad-fw-size',
	'description' => '1000 = 1 second',
	'label'       => esc_html__( 'Autoplay Speed', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_news_ticker_autoplay_speed',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'ms',
		),
	),
);
$options[] = array(
	'id'       => 'penci_header_pb_news_ticker_total_posts',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-size',
	'label'    => esc_html__( 'Amount of Posts Display on Top Posts', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_news_ticker_total_posts',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'ms',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_width',
	'default'   => '420',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'soledad-fw-size',
	'label'     => __( 'Maxium Width for Ticker Text', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_news_ticker_width',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_disable_uppercase',
	'default'   => 'disable',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => __( 'Disable Uppercase for "Top Posts" text', 'soledad' ),
	'type'      => 'soledad-fw-select',
	'choices'   => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_post_titles_uppercase',
	'default'   => 'disable',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => esc_html__( 'Turn Off Uppercase Post Titles', 'soledad' ),
	'type'      => 'soledad-fw-select',
	'choices'   => [
		'disable' => 'No',
		'enable'  => 'Yes',
	]
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_headline_color',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-color',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Color for "Top Posts" Text',
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_headline_bg',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'type'      => 'soledad-fw-color',
	'label'     => 'Background Color for "Top Posts Text"',
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_headline_bg_style3',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Color for Right Arrow on Style 3',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Color for Post Titles',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Hover Color for Post Titles',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_arr_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Color for Next/Prev Buttons',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_arr_hv_color',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Hover Color for Next/Prev Buttons',
	'type'      => 'soledad-fw-color',
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_font',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_choices_field',
	'label'     => 'Custom Text Font',
	'type'      => 'soledad-fw-select',
	'choices'   => penci_all_fonts( 'select' )
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_fs',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'soledad-fw-size',
	'label'     => __( 'Font Size for Post Titles', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_news_ticker_fs',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_arr_fs',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'absint',
	'type'      => 'soledad-fw-size',
	'label'     => __( 'Font Size for Next/Prev Buttons', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_news_ticker_arr_fs',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_headline_fs',
	'default'   => '',
	'transport' => 'postMessage',
	'type'      => 'soledad-fw-size',
	'sanitize'  => 'absint',
	'label'     => __( 'Font Size for "Top Posts" Text', 'soledad' ),
	'ids'       => array(
		'desktop' => 'penci_header_pb_news_ticker_headline_fs',
	),
	'choices'   => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 500,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'id'        => 'penci_header_pb_news_ticker_spacing',
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
	'id'        => 'penci_header_pb_news_ticker_class',
	'default'   => '',
	'transport' => 'postMessage',
	'sanitize'  => 'penci_sanitize_textarea_field',
	'type'      => 'soledad-fw-text',
	'label'     => esc_html__( 'Custom CSS Class', 'soledad' ),
);

/*$wp_customize->selective_refresh->add_partial( 'penci_header_pb_news_ticker_text', array(
	'selector'            => '.pc-wrapbuilder-header-inner',
	'settings'            => [
		//'penci_header_pb_news_ticker_width',
		'penci_header_pb_news_ticker_text',
		'penci_header_pb_news_ticker_style',
		'penci_header_pb_news_ticker_animation',
		//'penci_header_pb_news_ticker_disable_uppercase',
		'penci_header_pb_news_ticker_by',
		'penci_header_pb_news_ticker_filter_by',
		'penci_header_pb_news_ticker_tags',
		'penci_header_pb_news_ticker_cats',
		'penci_header_pb_news_ticker_post_titles',
		//'penci_header_pb_news_ticker_post_titles_uppercase',
		'penci_header_pb_news_ticker_disable_autoplay',
		'penci_header_pb_news_ticker_autoplay_timeout',
		'penci_header_pb_news_ticker_autoplay_speed',
		'penci_header_pb_news_ticker_total_posts',
		//'penci_header_pb_news_ticker_spacing',
		'penci_header_pb_news_ticker_class',
	],
	'container_inclusive' => true,
	'render_callback'     => function () {
		load_template( PENCI_BUILDER_PATH . '/template/desktop-builder.php' );
	},
	'fallback_refresh'    => false,
) );*/

return $options;
