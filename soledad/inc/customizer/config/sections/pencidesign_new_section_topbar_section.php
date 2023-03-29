<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable Top Bar', 'soledad' ),
	'id'       => 'penci_top_bar_show',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Top Bar on Mobile', 'soledad' ),
	'id'       => 'penci_top_bar_hmobile',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Use Full Width Container for Top Bar', 'soledad' ),
	'id'       => 'penci_top_bar_full_width',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Use Container 1400px for Top Bar', 'soledad' ),
	'id'       => 'penci_top_bar_1400',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => 'toptext-topposts-topmenu-topsocial',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Re-order elements on Topbar', 'soledad' ),
	'id'          => 'penci_topbar_ordersec',
	'description' => '',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'toptext-topposts-topmenu-topsocial' => 'Custom Text - Top Posts - Topbar Menu - Social Icons',
		'toptext-topposts-topsocial-topmenu' => 'Custom Text - Top Posts - Social Icons - Topbar Menu',
		'toptext-topsocial-topposts-topmenu' => 'Custom Text - Social Icons - Top Posts - Topbar Menu',
		'toptext-topsocial-topmenu-topposts' => 'Custom Text - Social Icons - Topbar Menu - Top Posts',
		'toptext-topmenu-topsocial-topposts' => 'Custom Text - Topbar Menu - Social Icons - Top Posts',
		'toptext-topmenu-topposts-topsocial' => 'Custom Text - Topbar Menu - Top Posts - Social Icons',
		'topposts-toptext-topmenu-topsocial' => 'Top Posts - Custom Text - Topbar Menu - Social Icons',
		'topposts-toptext-topsocial-topmenu' => 'Top Posts - Custom Text - Social Icons - Topbar Menu',
		'topposts-topsocial-toptext-topmenu' => 'Top Posts - Social Icons - Custom Text - Topbar Menu',
		'topposts-topsocial-topmenu-toptext' => 'Top Posts - Social Icons - Topbar Menu - Custom Text',
		'topposts-topmenu-topsocial-toptext' => 'Top Posts - Topbar Menu - Social Icons - Custom Text',
		'topposts-topmenu-toptext-topsocial' => 'Top Posts - Topbar Menu - Custom Text - Social Icons',
		'topmenu-toptext-topsocial-topposts' => 'Topbar Menu - Custom Text - Social Icons - Top Posts',
		'topmenu-toptext-topposts-topsocial' => 'Topbar Menu - Custom Text - Top Posts - Social Icons',
		'topmenu-topsocial-toptext-topposts' => 'Topbar Menu - Social Icons - Custom Text - Top Posts',
		'topmenu-topsocial-topposts-toptext' => 'Topbar Menu - Social Icons - Top Posts - Custom Text',
		'topmenu-topposts-toptext-topsocial' => 'Topbar Menu - Top Posts - Custom Text - Social Icons',
		'topmenu-topposts-topsocial-toptext' => 'Topbar Menu - Top Posts - Social Icons - Custom Text',
		'topsocial-toptext-topposts-topmenu' => 'Social Icons - Custom Text - Top Posts - Topbar Menu',
		'topsocial-toptext-topmenu-topposts' => 'Social Icons - Custom Text - Topbar Menu - Top Posts',
		'topsocial-topposts-topmenu-toptext' => 'Social Icons - Top Posts - Topbar Menu - Custom Text',
		'topsocial-topposts-toptext-topmenu' => 'Social Icons - Top Posts - Custom Text - Topbar Menu',
		'topsocial-topmenu-toptext-topposts' => 'Social Icons - Topbar Menu - Custom Text - Top Posts',
		'topsocial-topmenu-topposts-toptext' => 'Social Icons - Topbar Menu - Top Posts - Custom Text',
	)
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Topbar Current Date/Custom Text', 'soledad' ),
	'id'       => 'penci_tbctext_heading',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Show Topbar Custom Text', 'soledad' ),
	'id'       => 'penci_tbtext_enable',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Topbar Custom Text on Mobile', 'soledad' ),
	'id'       => 'penci_tbtext_mobile',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => "[penci_date format='l, F j Y'] - Welcome",
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => __( 'Custom Text', 'soledad' ),
	'id'          => 'penci_tb_date_text',
	'description' => "If you want to show today's date - you can use shortcode <strong>[penci_date format='l, F j Y']</strong> - inside the custom text. Change format 'l, F j Y' to the date format you want. You can check more about date/time format <a href='https://wordpress.org/support/article/formatting-date-and-time/' target='_blank'>here</a>",
	'type'        => 'soledad-fw-textarea',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Top Posts/News Ticker', 'soledad' ),
	'id'       => 'penci_tbtoppost_heading',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'  => true,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Show "Top Posts" Section', 'soledad' ),
	'id'       => 'penci_toppost_enable',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Show "Top Posts" on Mobile', 'soledad' ),
	'id'       => 'penci_toppost_mobile',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'label'    => '',
	'id'       => 'penci_toppost_width_mobile',
	'type'     => 'soledad-fw-hidden',
	'sanitize' => 'absint',
);
$options[] = array(
	'label'    => __( 'Custom Max-Width for "Top Posts"', 'soledad' ),
	'id'       => 'penci_toppost_width',
	'type'     => 'soledad-fw-size',
	'sanitize' => 'absint',
	'ids'      => array(
		'desktop' => 'penci_toppost_width',
		'mobile'  => 'penci_toppost_width_mobile',
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
	'default'     => esc_html__( 'Top Posts', 'soledad' ),
	'sanitize'    => 'sanitize_text_field',
	'label'       => __( 'Custom "Top Posts" Text', 'soledad' ),
	'id'          => 'penci_top_bar_custom_text',
	'description' => __( 'If you want hide Top Posts text, let empty this', 'soledad' ),
	'type'        => 'soledad-fw-text',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Style for "Top Posts" Text', 'soledad' ),
	'id'       => 'penci_top_bar_custom_style',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		''                => 'Default Style',
		'nticker-style-2' => 'Style 2',
		'nticker-style-3' => 'Style 3',
		'nticker-style-4' => 'Style 4'
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( '"Top Posts" Transition Animation', 'soledad' ),
	'id'       => 'penci_top_bar_animation',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		''             => 'Slide In Up',
		'slideInRight' => 'Fade In Right',
		'fadeIn'       => 'Fade In',
	)
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Uppercase for "Top Posts" text', 'soledad' ),
	'id'       => 'penci_top_bar_top_posts_lowcase',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Display Top Posts By', 'soledad' ),
	'id'       => 'penci_top_bar_display_by',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		''      => 'Recent Posts',
		'all'   => 'Popular Posts All Time',
		'week'  => 'Popular Posts Once Weekly',
		'month' => 'Popular Posts Once Month'
	)
);
$options[] = array(
	'default'  => 'category',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Filter Topbar By', 'soledad' ),
	'id'       => 'penci_top_bar_filter_by',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'category' => 'Category',
		'tags'     => 'Tags'
	)
);
$options[] = array(
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Select "Top Posts" Category', 'soledad' ),
	'type'        => 'soledad-fw-ajax-select',
	'id'          => 'penci_top_bar_category',
	'description' => __( 'This option just apply when you select "Filter Topbar by" Category above', 'soledad' ),
	'choices'     => call_user_func( function () {
		$category = [ '' ];
		$count    = wp_count_terms( 'category' );
		$limit    = 99;
		if ( (int) $count <= $limit ) {
			$categories = get_categories( [
				'hide_empty'   => false,
				'hierarchical' => true,
			] );
			foreach ( $categories as $value ) {
				$category[ $value->term_id ] = $value->name;
			}
		} else {
			$selected = get_theme_mod( 'penci_top_bar_category' );
			if ( ! empty( $selected ) ) {
				$categories = get_categories( [
					'hide_empty'   => false,
					'hierarchical' => true,
					'include'      => $selected,
				] );

				foreach ( $categories as $value ) {
					$category[ $value->term_id ] = $value->name;
				}
			}
		}

		return $category;
	} ),
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => __( 'Fill List Tags for Filter by Tags on "Top Post"', 'soledad' ),
	'id'          => 'penci_top_bar_tags',
	'description' => __( 'This option just apply when you select "Filter Topbar by" Tags above. And please fill list featured tags slug here, check <a rel="nofollow" href="https://soledad.pencidesign.net/soledad-document/images/tags.png" target="_blank">this image</a> to know what is tags slug. Example for multiple tags slug, fill:  tag-1, tag-2, tag-3', 'soledad' ),
	'type'        => 'soledad-fw-textarea',
);
$options[] = array(
	'default'  => '8',
	'sanitize' => 'absint',
	'label'    => __( 'Words Length for Post Titles on Top Posts', 'soledad' ),
	'id'       => 'penci_top_bar_title_length',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_top_bar_title_length',
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
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Turn Off Uppercase Post Titles', 'soledad' ),
	'id'       => 'penci_top_bar_off_uppercase',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Disable Auto Play', 'soledad' ),
	'id'       => 'penci_top_bar_posts_autoplay',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => '3000',
	'sanitize'    => 'absint',
	'label'       => __( 'Autoplay Timeout', 'soledad' ),
	'description' => __( '1000 = 1 second', 'soledad' ),
	'id'          => 'penci_top_bar_auto_time',
	'type'        => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_top_bar_auto_time',
	),
	'choices'     => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '',
			'default' => '3000',
		),
	),
);
$options[] = array(
	'default'     => '300',
	'sanitize'    => 'absint',
	'type'        => 'soledad-fw-size',
	'label'       => __( 'Autoplay Speed', 'soledad' ),
	'description' => __( '1000 = 1 second', 'soledad' ),
	'id'          => 'penci_top_bar_auto_speed',
	'ids'         => array(
		'desktop' => 'penci_top_bar_auto_speed',
	),
	'choices'     => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 100,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '',
			'default' => '300',
		),
	),
);
$options[] = array(
	'default'  => '10',
	'sanitize' => 'absint',
	'label'    => __( 'Amount of Posts Display on Top Posts', 'soledad' ),
	'id'       => 'penci_top_bar_posts_per_page',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_top_bar_posts_per_page',
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
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Topbar Menu', 'soledad' ),
	'id'       => 'penci_tbmenu_heading',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Show Topbar Menu', 'soledad' ),
	'description' => __( 'If you enable topbar menu, you need go to Dashboard > Appearance > Menus > create/select a menu for your topbar > scroll down and check to "Topbar Menu" at the bottom', 'soledad' ),
	'id'          => 'penci_top_bar_enable_menu',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Topbar Menu on Mobile', 'soledad' ),
	'id'       => 'penci_tbmenu_mobile',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Turn Off Uppercase on Topbar Menu', 'soledad' ),
	'id'       => 'penci_top_bar_off_uppercase_menu',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Social Media / Login & Register Popup', 'soledad' ),
	'id'       => 'penci_tbsocial_heading',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Social Icons on Top Bar', 'soledad' ),
	'id'       => 'penci_top_bar_hide_social',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable Use Brand Colors for Social Icons on Top Bar', 'soledad' ),
	'id'       => 'penci_top_bar_brand_social',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Display Login/Register?', 'soledad' ),
	'description' => __( 'Note that: By default, the register form is disabled, if you want to enable it, please go to Dashboard > Settings > General > on "Membership" check to "Anyone can register" - check <a href="https://imgresources.s3.amazonaws.com/register.png" target="_blank">this image</a> for more.<br>And if you want to add captcha for Login/Register form, you can use <a href="https://wordpress.org/plugins/login-security-recaptcha/" target="_blank">this plugin</a> - this theme supports Google reCaptcha v2 from this plugin.', 'soledad' ),
	'id'          => 'penci_tblogin',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		''      => 'None',
		'left'  => 'On the left social icons',
		'right' => 'On the right social icons',
	)
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'label'       => __( 'Add Login Text', 'soledad' ),
	'description' => __( 'Text beside the icon, leave it empty to disable', 'soledad' ),
	'id'          => 'penci_tblogin_text',
	'type'        => 'soledad-fw-text',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Social Icons & Login on Mobile', 'soledad' ),
	'id'       => 'penci_tbsocial_mobile',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Turn off uppercase for titles on login/register popup', 'soledad' ),
	'id'       => 'penci_tblogin_titleupper',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Turn off uppercase for submit buttons on login/register popup', 'soledad' ),
	'id'       => 'penci_tblogin_submitupper',
	'type'     => 'soledad-fw-toggle',
);

return $options;
