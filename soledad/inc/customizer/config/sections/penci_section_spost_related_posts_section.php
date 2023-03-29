<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Related Posts Box', 'soledad' ),
	'id'       => 'penci_post_related',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Make Related Posts Display in a Grid Layout ( not Slider )', 'soledad' ),
	'id'       => 'penci_post_related_grid',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => 'categories',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Display Related Posts By:', 'soledad' ),
	'id'       => 'penci_related_by',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'categories'  => 'Categories',
		'tags'        => 'Tags',
		'primary_cat' => 'Primary Category from "Yoast SEO" or "Rank Math" plugin'
	)
);
$options[] = array(
	'default'  => 'date',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Order Related Posts', 'soledad' ),
	'id'       => 'penci_related_orderby',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'rand'          => 'Random Posts',
		'date'          => 'Published Date',
		'ID'            => 'Post ID',
		'modified'      => 'Modified Date',
		'title'         => 'Post Title',
		'comment_count' => 'Comment Count',
		'popular'       => 'Most Viewed Posts All Time',
		'popular7'      => 'Most Viewed Posts Once Weekly',
		'popular_month' => 'Most Viewed Posts Once a Month',
	)
);
$options[] = array(
	'default'  => 'DESC',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Sort Order Related Posts', 'soledad' ),
	'id'       => 'penci_related_sort_order',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'DESC' => 'Descending',
		'ASC'  => 'Ascending '
	)
);
$options[] = array(
	'default'  => '8',
	'sanitize' => 'absint',
	'label'    => __( 'Words Length for Post Titles on Related Posts', 'soledad' ),
	'id'       => 'penci_related_posts_title_length',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_related_posts_title_length',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '',
			'default' => '8',
		),
	),
);
$options[] = array(
	'default'  => 'You may also like',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Related Posts Custom Text', 'soledad' ),
	'id'       => 'penci_post_related_text',
	'type'     => 'soledad-fw-text',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Turn Off Uppercase in Post Titles Related Posts', 'soledad' ),
	'id'       => 'penci_off_uppercase_post_title_related',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable Posts Format Icons in Related Posts', 'soledad' ),
	'id'       => 'penci_post_related_icons',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Post Date on Related Posts', 'soledad' ),
	'id'       => 'penci_hide_date_related',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Related Posts Carousel Auto Play', 'soledad' ),
	'id'       => 'penci_post_related_autoplay',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Dots On Carousel Related Posts', 'soledad' ),
	'id'       => 'penci_post_related_dots',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => true,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable Next/Prev Button On Carousel Related Posts', 'soledad' ),
	'id'       => 'penci_post_related_arrows',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => '10',
	'sanitize' => 'absint',
	'label'    => __( 'Amount of Related Posts', 'soledad' ),
	'id'       => 'penci_numbers_related_post',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_numbers_related_post',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '',
			'default' => '10',
		),
	),
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Exclude Featured Category from Related Posts based on Categories', 'soledad' ),
	'id'          => 'penci_post_related_exclusive_cat',
	'description'=>__('Featured Category is category you selected to filter slider via Customize > Featured Slider > General. This option will help you remove that category on related posts based on categories','soledad'),
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Related Posts Popup', 'soledad' ),
	'id'          => 'penci_section_related_post_popup',
	'description'=>__('Please check <a target="_blank" href="https://imgresources.s3.amazonaws.com/related-posts-popup.png">this image</a> to know what is "Related Posts Popup"','soledad'),
	'type'        => 'soledad-fw-header',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable Related Posts Popup', 'soledad' ),
	'id'       => 'penci_related_post_popup',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => 'left',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Position of Related Posts Popup', 'soledad' ),
	'id'       => 'penci_rltpopup_position',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'left'  => 'Left',
		'right' => 'Right'
	)
);
$options[] = array(
	'default'  => 'categories',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Display Related Posts Popup By:', 'soledad' ),
	'id'       => 'penci_rltpopup_by',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'categories'  => 'Categories',
		'tags'        => 'Tags',
		'primary_cat' => 'Primary Category from "Yoast SEO" or "Rank Math" plugin'
	)
);
$options[] = array(
	'default'  => 'date',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Order Related Posts Popup', 'soledad' ),
	'id'       => 'penci_rltpopup_orderby',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'rand'          => 'Random Posts',
		'date'          => 'Published Date',
		'ID'            => 'Post ID',
		'modified'      => 'Modified Date',
		'title'         => 'Post Title',
		'comment_count' => 'Comment Count',
		'popular'       => 'Most Viewed Posts All Time',
		'popular7'      => 'Most Viewed Posts Once Weekly',
		'popular_month' => 'Most Viewed Posts Once a Month',
	)
);
$options[] = array(
	'default'  => 'DESC',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Sort Order Related Posts Popup', 'soledad' ),
	'id'       => 'penci_rltpopup_sort_order',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'DESC' => 'Descending',
		'ASC'  => 'Ascending '
	)
);
$options[] = array(
	'default'  => '6',
	'sanitize' => 'absint',
	'label'    => __( 'Words Length for Post Titles on Related Posts Popup', 'soledad' ),
	'id'       => 'penci_rltpopup_title_length',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_rltpopup_title_length',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '',
			'default' => '6',
		),
	),
);
$options[] = array(
	'default'  => 'Read also',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Custom Heading Text for Related Posts Popup', 'soledad' ),
	'id'       => 'penci_rltpopup_heading_text',
	'type'     => 'soledad-fw-text',
);
$options[] = array(
	'default'  => '3',
	'sanitize' => 'absint',
	'type'     => 'soledad-fw-size',
	'label'    => __( 'Amount of Posts Display on Related Posts Popup', 'soledad' ),
	'id'       => 'penci_rltpopup_numpost',
	'ids'      => array(
		'desktop' => 'penci_rltpopup_numpost',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '',
			'default' => '3',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Padding Bottom of Related Posts Popup', 'soledad' ),
	'id'       => 'penci_rltpopup_padding_bottom',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_rltpopup_padding_bottom',
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
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Date on Related Posts Popup', 'soledad' ),
	'id'       => 'penci_rltpopup_hide_date',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Related Posts Popup on Mobile', 'soledad' ),
	'id'       => 'penci_rltpopup_hide_mobile',
	'type'     => 'soledad-fw-toggle',
);

return $options;
