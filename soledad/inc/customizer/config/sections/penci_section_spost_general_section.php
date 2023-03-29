<?php
$options           = [];
$options[]         = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Single Posts Template', 'soledad' ),
	'id'       => 'penci_single_style',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'style-1'  => esc_html__( 'Style 1', 'soledad' ),
		'style-2'  => esc_html__( 'Style 2', 'soledad' ),
		'style-3'  => esc_html__( 'Style 3', 'soledad' ),
		'style-4'  => esc_html__( 'Style 4', 'soledad' ),
		'style-5'  => esc_html__( 'Style 5', 'soledad' ),
		'style-6'  => esc_html__( 'Style 6', 'soledad' ),
		'style-7'  => esc_html__( 'Style 7', 'soledad' ),
		'style-8'  => esc_html__( 'Style 8', 'soledad' ),
		'style-9'  => esc_html__( 'Style 9', 'soledad' ),
		'style-10' => esc_html__( 'Style 10', 'soledad' ),
	)
);
$single_layout     = [];
$single_layout[''] = esc_attr__( 'None' );
$single_layouts    = get_posts( [
	'post_type'      => 'custom-post-template',
	'posts_per_page' => - 1,
] );
foreach ( $single_layouts as $slayout ) {
	$single_layout[ $slayout->post_name ] = $slayout->post_title;
}
$options[] = array(
	'default'     => '',
	'description' => __( 'Will override the pre-build single posts template above. You can add new and edit a single post template on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=custom-post-template' ) ) . '">this page</a>', 'soledad' ),
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Custom Post Builder Template', 'soledad' ),
	'id'          => 'penci_single_custom_template',
	'type'        => 'soledad-fw-select',
	'choices'     => $single_layout
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Move Categories, Post Title, Post Meta To Bellow Featured Image', 'soledad' ),
	'id'       => 'penci_move_title_bellow',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => 'right',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Single Posts Sidebar Layout', 'soledad' ),
	'id'       => 'penci_single_layout',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'right'       => 'Right Sidebar',
		'left'        => 'Left Sidebar',
		'two'         => 'Two Sidebars',
		'no'          => 'No Sidebar',
		'small_width' => 'No Sidebar with Container Width Smaller'
	)
);
$options[] = array(
	'default'  => '1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Default Smart Lists Style', 'soledad' ),
	'id'       => 'penci_single_smartlists_style',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'1' => 'Style 1',
		'2' => 'Style 2',
		'3' => 'Style 3',
		'4' => 'Style 4',
		'5' => 'Style 5',
		'6' => 'Style 6',
	)
);
$options[] = array(
	'default'         => '780',
	'sanitize'        => 'absint',
	'label'           => __( 'Custom Width for "No Sidebar with Container Width Smaller" Layout You Selected Above', 'soledad' ),
	'id'              => 'penci_single_smaller_width',
	'type'            => 'soledad-fw-size',
	'ids'             => array(
		'desktop' => 'penci_single_smaller_width',
	),
	'choices'         => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => 'px',
			'default' => '780',
		),
	),
	'active_callback' => [
		[
			'setting'  => 'penci_single_layout',
			'operator' => '==',
			'value'    => 'small_width',
		]
	],
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'label'       => __( 'Custom Container Width on Single Posts Page', 'soledad' ),
	'description' => __( 'Minimum is 600px', 'soledad' ),
	'id'          => 'penci_single_container_w',
	'type'        => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_single_container_w',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'absint',
	'label'       => __( 'Custom Container Width for Two Sidebars on Single Posts Page', 'soledad' ),
	'description' => __( 'Minimum is 800px', 'soledad' ),
	'id'          => 'penci_single_container2_w',
	'type'        => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_single_container2_w',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Custom Image Size for Featured Image', 'soledad' ),
	'description' => __( 'This option doesn\'t apply for two sidebars layout.', 'soledad' ),
	'id'          => 'penci_single_custom_thumbnail_size',
	'type'        => 'soledad-fw-ajax-select',
	'choices'     => call_user_func( function () {
		global $_wp_additional_image_sizes;

		$default_image_sizes = get_intermediate_image_sizes();

		foreach ( $default_image_sizes as $size ) {
			$image_sizes[ $size ]['width']  = intval( get_option( "{$size}_size_w" ) );
			$image_sizes[ $size ]['height'] = intval( get_option( "{$size}_size_h" ) );
			$image_sizes[ $size ]['crop']   = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
		}

		if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}

		$image_sizes_data = array( '' => 'Default' );
		if ( ! empty( $image_sizes ) ) {
			foreach ( $image_sizes as $key => $val ) {
				$new_val = $key;
				if ( isset( $val['width'] ) && isset( $val['height'] ) ) {
					$heightname = $val['height'];
					if ( '0' == $val['height'] || '99999' == $val['height'] ) {
						$heightname = 'auto';
					}
					$new_val = $key . ' - ' . $val['width'] . ' x ' . $heightname;
				}
				$image_sizes_data[ $key ] = $new_val;
			}
		}
		$image_sizes_data['full'] = 'Full Size';

		return $image_sizes_data;
	} ),
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Enable Parallax on Featured Image', 'soledad' ),
	'id'          => 'penci_enable_jarallax_single',
	'type'        => 'soledad-fw-toggle',
	'description' => __( 'This feature does not apply for Single Style 1 & 2', 'soledad' ),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Parallax on Featured Image on Mobile', 'soledad' ),
	'id'       => 'penci_dis_jarallax_single_mb',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Auto Play for Single Slider Gallery & Posts Format Gallery', 'soledad' ),
	'id'       => 'penci_disable_autoplay_single_slider',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Images Title on Galleries from The Theme', 'soledad' ),
	'id'       => 'penci_disable_image_titles_galleries',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Lightbox on Single Posts', 'soledad' ),
	'id'       => 'penci_disable_lightbox_single',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Hide Featured Image on Top', 'soledad' ),
	'id'          => 'penci_post_thumb',
	'description' => __( 'Hide Featured images auto appears on single posts page - This option not apply for Video format, Gallery format', 'soledad' ),
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Category', 'soledad' ),
	'id'       => 'penci_post_cat',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable Uppercase on Post Categories', 'soledad' ),
	'id'       => 'penci_on_uppercase_post_cat',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'label'       => __( 'Custom Border Radius for Featured Image', 'soledad' ),
	'id'          => 'penci_post_featured_image_radius',
	'type'        => 'soledad-fw-text',
	'description' => __( 'You can use pixel or percent. E.g:  <strong>10px</strong>  or  <strong>10%</strong>. If you want to disable border radius - fill 0', 'soledad' ),
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'label'       => __( 'Custom Aspect Ratio for Featured Image', 'soledad' ),
	'id'          => 'penci_post_featured_image_ratio',
	'type'        => 'soledad-fw-text',
	'description' => __( 'The aspect ratio of an element describes the proportional relationship between its width and its height. E.g: <strong>3:2</strong>. Default is 3:2 . This option not apply when enable parallax images. This feature does not apply for Single Style 1 & 2', 'soledad' ),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Align Left Post Categories, Post Title, Post Meta', 'soledad' ),
	'id'       => 'penci_align_left_post_title',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Remove Letter Spacing on Post Title', 'soledad' ),
	'id'       => 'penci_off_letter_space_post_title',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Turn Off Uppercase on Post Title', 'soledad' ),
	'id'       => 'penci_off_uppercase_post_title',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Post Author', 'soledad' ),
	'id'       => 'penci_single_meta_author',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Post Date', 'soledad' ),
	'id'       => 'penci_single_meta_date',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Display Published Date & Modified Date', 'soledad' ),
	'description' => esc_html__( 'Note that: If Published Date and Modified Date is the same - will be display Published date only. And if you want to display Modified date only - check option for it via Customize > General > General Settings > Display Modified Date Replace with Published Date', 'soledad' ),
	'id'          => 'penci_single_publishmodified',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Comment Count', 'soledad' ),
	'id'       => 'penci_single_meta_comment',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Show Views Count', 'soledad' ),
	'id'       => 'penci_single_show_cview',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Reading Time', 'soledad' ),
	'id'       => 'penci_single_hreadtime',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Enable ajax Post View Count', 'soledad' ),
	'id'          => 'penci_enable_ajax_view',
	'description' => __( 'Use to count posts viewed when you using cache plugin.', 'soledad' ),
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Enable Caption on Featured Image', 'soledad' ),
	'id'          => 'penci_post_thumb_caption',
	'description' => __( 'If your featured image has a caption, it will display on featured image', 'soledad' ),
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable Caption on Slider of Gallery Post Format', 'soledad' ),
	'id'       => 'penci_post_gallery_caption',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Move Caption of Images to Below The Images', 'soledad' ),
	'id'       => 'penci_post_caption_below',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Italic on Caption of Images', 'soledad' ),
	'id'       => 'penci_post_caption_disable_italic',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Blockquote Style:', 'soledad' ),
	'id'       => 'penci_blockquote_style',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'style-1' => 'Style 1',
		'style-2' => 'Style 2'
	)
);
/*$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'=>__('Add Ads/Custom HTML Code Inside Posts Content','soledad'),
	'id'          => 'penci_ads_inside_content_html',
	'description'=>'',
	'type'        => 'soledad-fw-textarea',
);
$options[] = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'=>__('Add Ads/Custom HTML Code Inside Posts Content With:','soledad'),
	'id'       => 'penci_ads_inside_content_style',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'style-1' => 'After Each X Paragraphs - Repeat',
		'style-2' => 'After X Paragraphs - No Repeat'
	)
);
$options[] = array(
	'default'  => '4',
	'sanitize' => 'absint',
	'label'    => __( 'Add Ads/Custom HTML Code Inside Posts Content After How Many Paragraphs?', 'soledad' ),
	'id'       => 'penci_ads_inside_content_num',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_ads_inside_content_num',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
);*/
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Tags', 'soledad' ),
	'id'       => 'penci_post_tags',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Like Count & Social Share', 'soledad' ),
	'id'       => 'penci_post_share',
	'type'     => 'soledad-fw-toggle',
);

$share_style = [];
for ( $i = 1; $i <= 23; $i ++ ) {
	$v                      = $i < 4 ? 's' : 'n';
	$n                      = $i < 4 ? $i : $i - 3;
	$share_style[ $v . $n ] = 'Style ' . $i;
}

$options[] = array(
	'default'     => 's1',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Share Box Style', 'soledad' ),
	'id'          => 'penci_single_style_cscount',
	'description' => '',
	'type'        => 'soledad-fw-select',
	'choices'     => $share_style
);
$options[] = array(
	'default'  => true,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Social Share Plus Button', 'soledad' ),
	'id'       => 'penci_post_share_disbtnplus',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_post_align_cscount',
	'default'  => 'default',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Share Box Alignment', 'soledad' ),
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'default' => 'Default Theme Style',
		'left'    => 'Left',
		'right'   => 'Right',
		'center'  => 'Center',
	)
);
$options[] = array(
	'default'     => 'below-content',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Share Box Position', 'soledad' ),
	'id'          => 'penci_single_poslcscount',
	'description' => '',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'btitle'             => 'Bellow Post Meta',
		'above-content'      => 'Above Content',
		'below-content'      => 'Below Content',
		'abovebelow-content' => 'Above & Below Content',
		'btitle-bcontent'    => 'Bellow Post Meta & Below Content',
	)
);
$options[] = array(
	'default'     => 'author-postnav-related-comments',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Re-order "Author Box" - "Post Navigation" - "Related Posts" - "Comments" section', 'soledad' ),
	'id'          => 'penci_single_ordersec',
	'description' => '',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'author-postnav-related-comments' => 'Author Box - Post Navigation - Related Posts - Comments',
		'author-postnav-comments-related' => 'Author Box - Post Navigation - Comments - Related Posts',
		'author-comments-postnav-related' => 'Author Box - Comments - Post Navigation - Related Posts',
		'author-comments-related-postnav' => 'Author Box - Comments - Related Posts - Post Navigation',
		'author-related-comments-postnav' => 'Author Box - Related Posts - Comments - Post Navigation',
		'author-related-postnav-comments' => 'Author Box - Related Posts - Post Navigation - Comments',
		'postnav-author-related-comments' => 'Post Navigation - Author Box - Related Posts - Comments',
		'postnav-author-comments-related' => 'Post Navigation - Author Box - Comments - Related Posts',
		'postnav-comments-author-related' => 'Post Navigation - Comments - Author Box - Related Posts',
		'postnav-comments-related-author' => 'Post Navigation - Comments - Related Posts - Author Box',
		'postnav-related-comments-author' => 'Post Navigation - Related Posts - Comments - Author Box',
		'postnav-related-author-comments' => 'Post Navigation - Related Posts - Author Box - Comments',
		'related-author-comments-postnav' => 'Related Posts - Author Box - Comments - Post Navigation',
		'related-author-postnav-comments' => 'Related Posts - Author Box - Post Navigation - Comments',
		'related-comments-author-postnav' => 'Related Posts - Comments - Author Box - Post Navigation',
		'related-comments-postnav-author' => 'Related Posts - Comments - Post Navigation - Author Box',
		'related-postnav-author-comments' => 'Related Posts - Post Navigation - Author Box - Comments',
		'related-postnav-comments-author' => 'Related Posts - Post Navigation - Comments - Author Box',
		'comments-author-postnav-related' => 'Comments - Author Box - Post Navigation - Related Posts',
		'comments-author-related-postnav' => 'Comments - Author Box - Related Posts - Post Navigation',
		'comments-postnav-related-author' => 'Comments - Post Navigation - Related Posts - Author Box',
		'comments-postnav-author-related' => 'Comments - Post Navigation - Author Box - Related Posts',
		'comments-related-author-postnav' => 'Comments - Related Posts - Author Box - Post Navigation',
		'comments-related-postnav-author' => 'Comments - Related Posts - Post Navigation - Author Box',
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Author Box', 'soledad' ),
	'id'       => 'penci_post_author',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Show Email Icon of Author on Author Box', 'soledad' ),
	'id'       => 'penci_post_author_email',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Uppercase for Author Name on Author Box', 'soledad' ),
	'id'       => 'penci_bio_upper_name',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => 'style-1',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Author Box Style', 'soledad' ),
	'id'          => 'penci_authorbio_style',
	'description' => '',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'style-1' => 'Default',
		'style-2' => 'Style 2',
		'style-3' => 'Style 3',
		'style-4' => 'Style 4',
	)
);
$options[] = array(
	'default'     => 'round',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Author Box Image Type', 'soledad' ),
	'id'          => 'penci_bioimg_style',
	'description' => '',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'round'  => 'Round',
		'square' => 'Square',
		'sround' => 'Round Borders',
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Next/Prev Post Navigation', 'soledad' ),
	'id'       => 'penci_post_nav',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Turn Off Uppercase in Post Title Next/Prev Post Navigation', 'soledad' ),
	'id'       => 'penci_off_uppercase_post_title_nav',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Show Post Thumbnail on Next/Prev Post Navigation', 'soledad' ),
	'id'       => 'penci_post_nav_thumbnail',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Remove Lines Before & After of Heading Title on Related & Comments', 'soledad' ),
	'id'       => 'penci_post_remove_lines_related',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Gallery Feature from This Theme', 'soledad' ),
	'id'       => 'penci_post_disable_gallery',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => 'justified',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Default Gallery Style from The Theme', 'soledad' ),
	'id'       => 'penci_gallery_dstyle',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'justified'     => 'Justified Style',
		'masonry'       => 'Masonry Style',
		'grid'          => 'Grid Style',
		'single-slider' => 'Single Slider',
		'none'          => 'None'
	)
);
$options[] = array(
	'default'  => '150',
	'sanitize' => 'absint',
	'label'    => __( 'Custom the height of images on Justified Gallery style', 'soledad' ),
	'id'       => 'penci_image_height_gallery',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_image_height_gallery',
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
	'default'     => 'main-sidebar',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Custom Sidebar for Single', 'soledad' ),
	'id'          => 'penci_sidebar_name_single',
	'description' => __( 'If sidebar your choice is empty, will display Main Sidebar', 'soledad' ),
	'type'        => 'soledad-fw-select',
	'choices'     => get_list_custom_sidebar_option()
);
$options[] = array(
	'default'     => 'main-sidebar-left',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Custom Sidebar Left for Single', 'soledad' ),
	'id'          => 'penci_sidebar_left_name_single',
	'description' => __( 'If sidebar your choice is empty, will display Main Sidebar. This option just apply when you use 2 sidebars for Single', 'soledad' ),
	'type'        => 'soledad-fw-select',
	'choices'     => get_list_custom_sidebar_option()
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Ads on Single Posts', 'soledad' ),
	'id'       => 'penci_singleads_bheading',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => __( 'Add Ads/Custom HTML Code Inside Posts Content', 'soledad' ),
	'id'          => 'penci_ads_inside_content_html',
	'description' => '',
	'type'        => 'soledad-fw-textarea',
);
$options[] = array(
	'default'  => 'style-1',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Add Ads/Custom HTML Code Inside Posts Content:', 'soledad' ),
	'id'       => 'penci_ads_inside_content_style',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'style-1' => 'After Each X Paragraphs - Repeat',
		'style-2' => 'After X Paragraphs - No Repeat'
	)
);
$options[] = array(
	'default'  => '4',
	'sanitize' => 'absint',
	'label'    => __( 'Add Ads/Custom HTML Code Inside Posts Content After How Many Paragraphs?', 'soledad' ),
	'id'       => 'penci_ads_inside_content_num',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_ads_inside_content_num',
	),
	'choices'  => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_textarea_field',
	'label'    => __( 'Add Google Adsense/Custom HTML code For Post Template Style 10', 'soledad' ),
	'id'       => 'penci_post_adsense_single10',
	'type'     => 'soledad-fw-textarea',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => __( 'Add Google Adsense/Custom HTML code below post description', 'soledad' ),
	'id'          => 'penci_post_adsense_one',
	'description' => '',
	'type'        => 'soledad-fw-textarea',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => __( 'Add Google Adsense/Custom HTML code at the end of content posts', 'soledad' ),
	'id'          => 'penci_post_adsense_two',
	'description' => '',
	'type'        => 'soledad-fw-textarea',
);

return $options;
