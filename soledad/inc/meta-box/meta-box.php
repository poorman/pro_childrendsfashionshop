<?php
/**
 * Add custom meta box for pages
 * Add custom sidebar for page go here
 * Use add_meta_box() function to hook it
 *
 * @package Wordpress
 * @since 1.0
 *
 */

require get_template_directory() . '/inc/meta-box/meta-box-array.php';

/* Sub title */
add_action( 'admin_head', 'penci_add_subtitle_metaboxes' );
function penci_add_subtitle_metaboxes() {
	// Detect if editor is gutenberg or not - if not, add meta box after post title.
	if ( penci_is_using_gutenberg() ) {
		add_meta_box(
			'penci_post_secondry_title',
			esc_html__( 'Add Subtitle', 'soledad' ),
			'penci_render_subtitle_markup_gutenberg',
			penci_post_types_allow_meta_boxes(),
			'side',
			'high'
		);
	} else {
		add_action( 'edit_form_after_title', 'penci_render_subtitle_markup', 1 );
	}
}

function penci_render_subtitle_markup() {
	$post_id = get_the_ID();

	// Get currently viewing post type
	if ( ! empty( $post_id ) ) {
		$post_type = get_post_type( $post_id );
	}

	if ( empty( $post_type ) && get_current_screen()->post_type ) {
		$post_type = get_current_screen()->post_type;
	}

	// Don't render markup if it's not allowed
	if ( ! in_array( $post_type, penci_post_types_allow_meta_boxes() ) ) {
		return;
	}
	?>

    <div id="penci-subtitlediv">
        <div id="penci-subtitlewrap">
            <label class="screen-reader-text" id="penci-sub-title-label"
                   for="penci-sub-title"><?php esc_html_e( 'Add sub title here', 'soledad' ) ?></label>
            <input type="text" id="penci-sub-title" name="penci_post_sub_title" size="30"
                   style="padding: 3px 8px; font-size: 1.4em; line-height: 100%; height: 2em; width: 100%; outline: 0; margin: 0 0 3px; background-color: #fff;"
                   value="<?php echo esc_attr( get_post_meta( $post_id, 'penci_post_sub_title', true ) ); ?>"
                   placeholder="<?php esc_html_e( 'Add sub title here', 'soledad' ) ?>" spellcheck="true"
                   autocomplete="off">
        </div>
    </div>
	<?php
}

function penci_render_subtitle_markup_gutenberg() {
	$post_id = get_the_ID();

	// Get currently viewing post type
	if ( ! empty( $post_id ) ) {
		$post_type = get_post_type( $post_id );
	}

	if ( empty( $post_type ) && get_current_screen()->post_type ) {
		$post_type = get_current_screen()->post_type;
	}

	// Don't render markup if it's not allowed
	if ( ! in_array( $post_type, penci_post_types_allow_meta_boxes() ) ) {
		return;
	}
	?>

    <div id="penci-subtitlediv">
        <div id="penci-subtitlewrap">
            <label class="screen-reader-text" id="penci-sub-title-label"
                   for="penci-sub-title"><?php esc_html_e( 'Add sub title here', 'soledad' ) ?></label>
            <textarea name="penci_post_sub_title" rows="6" style="height: 80px; width: 100%; font-size: 1.3em;"
                      placeholder="<?php esc_html_e( 'Add sub title here', 'soledad' ) ?>" spellcheck="false"
                      autocomplete="off"><?php echo esc_attr( get_post_meta( $post_id, 'penci_post_sub_title', true ) ); ?></textarea>
        </div>
    </div>
	<?php
}


function Penci_Add_Custom_Metabox() {
	new Penci_Add_Custom_Metabox_Class();
}

if ( is_admin() ) {
	add_action( 'load-post.php', 'Penci_Add_Custom_Metabox' );
	add_action( 'load-post-new.php', 'Penci_Add_Custom_Metabox' );
}

/**
 * The Class.
 */
class Penci_Add_Custom_Metabox_Class {

	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	/**
	 * Adds the meta box container.
	 */
	public function add_meta_box( $post_type ) {
		$post_types = penci_post_types_allow_meta_boxes();     //limit meta box to certain post types
		if ( in_array( $post_type, $post_types ) ) {
			add_meta_box(
				'penci_custom_sidebar_page'
				, esc_html__( 'Options for This Post/Page', 'soledad' )
				, array( $this, 'render_meta_box_content' )
				, $post_type
				, 'advanced'
				, 'high'
			);

			add_meta_box(
				'penci_view_count_custom'
				, esc_html__( 'Post Views', 'soledad' )
				, array( $this, 'render_meta_box_view_count' )
				, $post_type
				, 'side'
				, 'high'
			);
		}
	}

	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function save( $post_id ) {


		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['penci_inner_custom_box_nonce'] ) ) {
			return $post_id;
		}

		$nonce = $_POST['penci_inner_custom_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'penci_inner_custom_box' ) ) {
			return $post_id;
		}

		// If this is an autosave, our form has not been submitted,
		//     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		$post_type_allow = penci_post_types_allow_meta_boxes();
		$post_type       = $_POST['post_type'];

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return $post_id;
			}

		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}
		}

		// Sanitize the user input.
		$mydata            = sanitize_text_field( $_POST['penci_custom_sidebar_page_field'] );
		$sidebar_left_page = sanitize_text_field( $_POST['penci_custom_sidebar_left_page_field'] );

		if ( in_array( $post_type, $post_type_allow ) ) {
			$sidebar = sanitize_text_field( $_POST['penci_post_sidebar_display'] );
		}

		$hide_header = $hide_footer = '';

		if ( 'page' == $_POST['post_type'] ) {
			$slider         = sanitize_text_field( $_POST['penci_page_slider_field'] );
			$featured_boxes = sanitize_text_field( $_POST['penci_page_display_featured_boxes'] );
			$pagetitle      = sanitize_text_field( $_POST['penci_page_display_title_field'] );
			$breadcrumb     = sanitize_text_field( $_POST['penci_page_breadcrumb_field'] );
			$sharebox       = sanitize_text_field( $_POST['penci_page_sharebox_field'] );
			$rev_shortcode  = sanitize_text_field( $_POST['penci_page_rev_shortcode'] );
			$hide_header    = sanitize_text_field( $_POST['penci_page_hide_header_field'] );
			$hide_footer    = sanitize_text_field( $_POST['penci_page_hide_footer_field'] );
			$page_sidebar   = sanitize_text_field( $_POST['penci_sidebar_page_pos'] );
		}


		// Update the meta field.
		update_post_meta( $post_id, 'penci_custom_sidebar_page_display', $mydata );
		update_post_meta( $post_id, 'penci_custom_sidebar_left_page_field', $sidebar_left_page );

		if ( isset( $_POST['penci_post_critical_css'] ) ) {
			update_post_meta( $post_id, 'penci_post_critical_css', $_POST['penci_post_critical_css'] );
		}

		if ( isset( $_POST['penci_cpost_title'] ) ) {
			update_post_meta( $post_id, 'penci_cpost_title', $_POST['penci_cpost_title'] );
		}

		if ( in_array( $post_type, $post_type_allow ) ) {
			update_post_meta( $post_id, 'penci_post_sidebar_display', $sidebar );

			if ( isset( $_POST['penci_post_sub_title'] ) ) {
				update_post_meta( $post_id, 'penci_post_sub_title', $_POST['penci_post_sub_title'] );
			}

			if ( isset( $_POST['penci_single_style'] ) ) {
				update_post_meta( $post_id, 'penci_single_style', $_POST['penci_single_style'] );
			}

			if ( isset( $_POST['penci_pfeatured_image_ratio'] ) ) {
				update_post_meta( $post_id, 'penci_pfeatured_image_ratio', $_POST['penci_pfeatured_image_ratio'] );
			}

			if ( isset( $_POST['penci_enable_jarallax_single'] ) ) {
				update_post_meta( $post_id, 'penci_enable_jarallax_single', $_POST['penci_enable_jarallax_single'] );
			}

			if ( isset( $_POST['penci_toc_enable'] ) ) {
				update_post_meta( $post_id, 'penci_toc_enable', $_POST['penci_toc_enable'] );
			}

			if ( isset( $_POST['penci_post_hide_featuimg'] ) ) {
				update_post_meta( $post_id, 'penci_post_hide_featuimg', $_POST['penci_post_hide_featuimg'] );
			}

			if ( isset( $_POST['penci_reading_time'] ) ) {
				update_post_meta( $post_id, 'penci_reading_time', $_POST['penci_reading_time'] );
			}

			if ( isset( $_POST['penci_header_builder_layout'] ) ) {
				update_post_meta( $post_id, 'penci_header_builder_layout', $_POST['penci_header_builder_layout'] );
			}

			if ( isset( $_POST['penci_footer_builder_layout'] ) ) {
				update_post_meta( $post_id, 'penci_footer_builder_layout', $_POST['penci_footer_builder_layout'] );
			}

			if ( isset( $_POST['penci_single_builder_layout'] ) ) {
				update_post_meta( $post_id, 'penci_single_builder_layout', $_POST['penci_single_builder_layout'] );
			}

			$count_key  = penci_get_postviews_key();
			$count_wkey = 'penci_post_week_views_count';
			$count_mkey = 'penci_post_month_views_count';

			if ( isset( $_POST[ $count_key ] ) ) {
				update_post_meta( $post_id, $count_key, $_POST[ $count_key ] );
			}

			if ( isset( $_POST[ $count_wkey ] ) ) {
				update_post_meta( $post_id, $count_wkey, $_POST[ $count_wkey ] );
			}

			if ( isset( $_POST[ $count_mkey ] ) ) {
				update_post_meta( $post_id, $count_mkey, $_POST[ $count_mkey ] );
			}
		}

		if ( 'page' == $_POST['post_type'] ) {
			update_post_meta( $post_id, 'penci_page_slider', $slider );
			update_post_meta( $post_id, 'penci_page_display_featured_boxes', $featured_boxes );
			update_post_meta( $post_id, 'penci_page_display_title', $pagetitle );
			update_post_meta( $post_id, 'penci_page_breadcrumb', $breadcrumb );
			update_post_meta( $post_id, 'penci_page_sharebox', $sharebox );
			update_post_meta( $post_id, 'penci_page_rev_shortcode', $rev_shortcode );
			update_post_meta( $post_id, 'penci_page_hide_header', $hide_header );
			update_post_meta( $post_id, 'penci_page_hide_footer', $hide_footer );
			update_post_meta( $post_id, 'penci_sidebar_page_pos', $page_sidebar );
		}
	}

	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 */
	public function render_meta_box_view_count( $post ) {

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'penci_inner_custom_box', 'penci_inner_custom_box_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$count_key  = penci_get_postviews_key();
		$count_wkey = 'penci_post_week_views_count';
		$count_mkey = 'penci_post_month_views_count';
		$count      = get_post_meta( $post->ID, $count_key, true ) ? get_post_meta( $post->ID, $count_key, true ) : 0;
		$count_w    = get_post_meta( $post->ID, $count_wkey, true ) ? get_post_meta( $post->ID, $count_wkey, true ) : 0;
		$count_m    = get_post_meta( $post->ID, $count_mkey, true ) ? get_post_meta( $post->ID, $count_mkey, true ) : 0;


		// Display the form, using the current value.
		?>
        <p><?php esc_html_e( 'You can change the view count for this post by change values below.', 'soledad' ); ?></p>
        <h2 style="font-weight: 600; font-size: 13px; padding-left: 0;"><?php esc_html_e( 'All Time Views', 'soledad' ); ?></h2>
        <p><input id="<?php echo $count_key . '_id'; ?>" name="<?php echo $count_key; ?>" type="number"
                  value="<?php echo absint( $count ); ?>"></p>

        <h2 style="font-weight: 600; font-size: 13px; padding-left: 0;"><?php esc_html_e( 'This Week Views', 'soledad' ); ?></h2>
        <p><input id="<?php echo $count_wkey . '_id'; ?>" name="<?php echo $count_wkey; ?>" type="number"
                  value="<?php echo absint( $count_w ); ?>"></p>

        <h2 style="font-weight: 600; font-size: 13px; padding-left: 0;"><?php esc_html_e( 'This Month Views', 'soledad' ); ?></h2>
        <p><input id="<?php echo $count_mkey . '_id'; ?>" name="<?php echo $count_mkey; ?>" type="number"
                  value="<?php echo absint( $count_m ); ?>"></p>
        <p style="font-size: 12px;"><?php _e( '<strong>Note that:</strong> If you don\'t see the weekly view count reset after installing the theme in some weeks, that means your hosting doesn\'t support <a href="https://developer.wordpress.org/reference/functions/wp_schedule_event/" target="_blank">wp_schedule_event</a> function from WordPress. So, if you want to get it to work, please contact your hosting provider and requirement them allows it.', 'soledad' ); ?></p>
		<?php
	}


	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 */
	public function render_meta_box_content( $post ) {

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'penci_inner_custom_box', 'penci_inner_custom_box_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$value      = get_post_meta( $post->ID, 'penci_custom_sidebar_page_display', true );
		$value_left = get_post_meta( $post->ID, 'penci_custom_sidebar_left_page_field', true );


		$sidebar        = get_post_meta( $post->ID, 'penci_post_sidebar_display', true );
		$slider         = get_post_meta( $post->ID, 'penci_page_slider', true );
		$featured_boxes = get_post_meta( $post->ID, 'penci_page_display_featured_boxes', true );
		$pagetitle      = get_post_meta( $post->ID, 'penci_page_display_title', true );
		$breadcrumb     = get_post_meta( $post->ID, 'penci_page_breadcrumb', true );
		$sharebox       = get_post_meta( $post->ID, 'penci_page_sharebox', true );
		$rev_shortcode  = get_post_meta( $post->ID, 'penci_page_rev_shortcode', true );
		$single_style   = get_post_meta( $post->ID, 'penci_single_style', true );
		$hide_featuimg  = get_post_meta( $post->ID, 'penci_post_hide_featuimg', true );

		$hide_header             = get_post_meta( $post->ID, 'penci_page_hide_header', true );
		$hide_footer             = get_post_meta( $post->ID, 'penci_page_hide_footer', true );
		$pfeatured_image_ratio   = get_post_meta( $post->ID, 'penci_pfeatured_image_ratio', true );
		$penci_reading_time      = get_post_meta( $post->ID, 'penci_reading_time', true );
		$enable_parallax         = get_post_meta( $post->ID, 'penci_enable_jarallax_single', true );
		$penci_toc_enable        = get_post_meta( $post->ID, 'penci_toc_enable', true );
		$page_sidebar            = get_post_meta( $post->ID, 'penci_sidebar_page_pos', true );
		$headerbd_layout         = get_post_meta( $post->ID, 'penci_header_builder_layout', true );
		$footerbd_layout         = get_post_meta( $post->ID, 'penci_footer_builder_layout', true );
		$singlebd_layout         = get_post_meta( $post->ID, 'penci_single_builder_layout', true );
		$penci_post_critical_css = get_post_meta( $post->ID, 'penci_post_critical_css', true );
		$penci_cpost_title       = get_post_meta( $post->ID, 'penci_cpost_title', true );


		$post_type_allow = penci_post_types_allow_meta_boxes();
		$post_type       = get_post_type( $post->ID );
		// Display the form, using the current value.

		$header_layout = [];
		$footer_layout = [];
		$single_layout = [];

		$header_layout[''] = esc_attr__( 'Default Customizer Settings' );
		$footer_layout[''] = esc_attr__( 'Default Customizer Settings' );
		$single_layout[''] = esc_attr__( 'Default Customizer Settings' );

		$header_layouts = get_posts( [
			'post_type'      => 'penci_builder',
			'posts_per_page' => - 1,
		] );
		foreach ( $header_layouts as $header ) {
			$header_layout[ $header->ID ] = $header->post_title;
		}

		$footer_layouts = get_posts( [
			'post_type'      => 'penci-block',
			'posts_per_page' => - 1,
		] );
		foreach ( $footer_layouts as $footer ) {
			$footer_layout[ $footer->ID ] = $footer->post_title;
		}

		$single_layouts = get_posts( [
			'post_type'      => 'custom-post-template',
			'posts_per_page' => - 1,
		] );
		foreach ( $single_layouts as $slayout ) {
			$single_layout[ $slayout->post_name ] = $slayout->post_title;
		}
		?>

		<?php if ( 'page' == get_post_type( $post->ID ) ) { ?>

            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Select Featured Slider/Featured
                        Video to
                        Display on Top of This Page?</h2>
                </div>
                <div class="pcmt-control">
                    <p>
                        <select id="penci_page_slider_field" name="penci_page_slider_field">
                            <option value="">None</option>
                            <option value="style-1" <?php selected( $slider, 'style-1' ); ?>>Posts Featured Slider Style
                                1
                            </option>
                            <option value="style-2" <?php selected( $slider, 'style-2' ); ?>>Posts Featured Slider Style
                                2
                            </option>
                            <option value="style-3" <?php selected( $slider, 'style-3' ); ?>>Posts Featured Slider Style
                                3
                            </option>
                            <option value="style-4" <?php selected( $slider, 'style-4' ); ?>>Posts Featured Slider Style
                                4
                            </option>
                            <option value="style-5" <?php selected( $slider, 'style-5' ); ?>>Posts Featured Slider Style
                                5
                            </option>
                            <option value="style-6" <?php selected( $slider, 'style-6' ); ?>>Posts Featured Slider Style
                                6
                            </option>
                            <option value="style-7" <?php selected( $slider, 'style-7' ); ?>>Posts Featured Slider Style
                                7
                            </option>
                            <option value="style-8" <?php selected( $slider, 'style-8' ); ?>>Posts Featured Slider Style
                                8
                            </option>
                            <option value="style-9" <?php selected( $slider, 'style-9' ); ?>>Posts Featured Slider Style
                                9
                            </option>
                            <option value="style-10" <?php selected( $slider, 'style-10' ); ?>>Posts Featured Slider
                                Style 10
                            </option>
                            <option value="style-11" <?php selected( $slider, 'style-11' ); ?>>Posts Featured Slider
                                Style 11
                            </option>
                            <option value="style-12" <?php selected( $slider, 'style-12' ); ?>>Posts Featured Slider
                                Style 12
                            </option>
                            <option value="style-13" <?php selected( $slider, 'style-13' ); ?>>Posts Featured Slider
                                Style 13
                            </option>
                            <option value="style-14" <?php selected( $slider, 'style-14' ); ?>>Posts Featured Slider
                                Style 14
                            </option>
                            <option value="style-15" <?php selected( $slider, 'style-15' ); ?>>Posts Featured Slider
                                Style 15
                            </option>
                            <option value="style-16" <?php selected( $slider, 'style-16' ); ?>>Posts Featured Slider
                                Style 16
                            </option>
                            <option value="style-17" <?php selected( $slider, 'style-17' ); ?>>Posts Featured Slider
                                Style 17
                            </option>
                            <option value="style-18" <?php selected( $slider, 'style-18' ); ?>>Posts Featured Slider
                                Style 18
                            </option>
                            <option value="style-19" <?php selected( $slider, 'style-19' ); ?>>Posts Featured Slider
                                Style 19
                            </option>
                            <option value="style-20" <?php selected( $slider, 'style-20' ); ?>>Posts Featured Slider
                                Style 20
                            </option>
                            <option value="style-21" <?php selected( $slider, 'style-21' ); ?>>Posts Featured Slider
                                Style 21
                            </option>
                            <option value="style-22" <?php selected( $slider, 'style-22' ); ?>>Posts Featured Slider
                                Style 22
                            </option>
                            <option value="style-23" <?php selected( $slider, 'style-23' ); ?>>Posts Featured Slider
                                Style 23
                            </option>
                            <option value="style-24" <?php selected( $slider, 'style-24' ); ?>>Posts Featured Slider
                                Style 24
                            </option>
                            <option value="style-25" <?php selected( $slider, 'style-25' ); ?>>Posts Featured Slider
                                Style 25
                            </option>
                            <option value="style-26" <?php selected( $slider, 'style-26' ); ?>>Posts Featured Slider
                                Style 26
                            </option>
                            <option value="style-27" <?php selected( $slider, 'style-27' ); ?>>Posts Featured Slider
                                Style 27
                            </option>
                            <option value="style-28" <?php selected( $slider, 'style-28' ); ?>>Posts Featured Slider
                                Style 28
                            </option>
                            <option value="style-29" <?php selected( $slider, 'style-29' ); ?>>Posts Featured Slider
                                Style 29
                            </option>
                            <option value="style-30" <?php selected( $slider, 'style-30' ); ?>>Posts Featured Slider
                                Style 30
                            </option>
                            <option value="style-31" <?php selected( $slider, 'style-31' ); ?>>Penci Slider Style 1
                            </option>
                            <option value="style-32" <?php selected( $slider, 'style-32' ); ?>>Penci Slider Style 2
                            </option>
                            <option value="style-33" <?php selected( $slider, 'style-33' ); ?>>Revolution Slider Full
                                Width
                            </option>
                            <option value="style-34" <?php selected( $slider, 'style-34' ); ?>>Revolution Slider In
                                Container
                            </option>
                            <option value="style-35" <?php selected( $slider, 'style-35' ); ?>>Posts Featured Slider
                                Style 35
                            </option>
                            <option value="style-36" <?php selected( $slider, 'style-36' ); ?>>Posts Featured Slider
                                Style 36
                            </option>
                            <option value="style-37" <?php selected( $slider, 'style-37' ); ?>>Posts Featured Slider
                                Style 37
                            </option>
                            <option value="style-38" <?php selected( $slider, 'style-38' ); ?>>Posts Featured Slider
                                Style 38
                            </option>
                            <option value="video" <?php selected( $slider, 'video' ); ?>>Featured Video Background
                            </option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Revolution Slider Shortcode</h2>
                    <p class="description">If you select Revolution Slider above, please fill Revolution Slider
                        Shortcode here</p>
                </div>
                <div class="pcmt-control">
                    <textarea style="width: 100%; height: 50px;"
                              name="penci_page_rev_shortcode"><?php if ( $rev_shortcode ): echo $rev_shortcode; endif; ?></textarea>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Display Featured Boxes?</h2>
                </div>
                <div class="pcmt-control select-button-type">
                    <p>
                        <select id="penci_page_display_featured_boxes" name="penci_page_display_featured_boxes">
                            <option value="">No</option>
                            <option value="yes" <?php selected( $featured_boxes, 'yes' ); ?>>Yes</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Display Page Title?</h2>
                    <p class="descriptions">By default, this option will follow on Customizer settings</p>
                </div>
                <div class="pcmt-control select-button-type">
                    <p>
                        <select id="penci_page_display_title_field" name="penci_page_display_title_field">
                            <option value="">Default</option>
                            <option value="yes" <?php selected( $pagetitle, 'no' ); ?>>Yes</option>
                            <option value="no" <?php selected( $pagetitle, 'no' ); ?>>No</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">

                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Display Breadcrumb on This
                        Page?</h2>
                </div>
                <div class="pcmt-control select-button-type">
                    <p>
                        <select id="penci_page_breadcrumb_field" name="penci_page_breadcrumb_field">
                            <option value="">Yes</option>
                            <option value="no" <?php selected( $breadcrumb, 'no' ); ?>>No</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">

                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Display Share Box on This Page?</h2>
                </div>
                <div class="pcmt-control select-button-type">
                    <p>
                        <select id="penci_page_sharebox_field" name="penci_page_sharebox_field">
                            <option value="">Yes</option>
                            <option value="no" <?php selected( $sharebox, 'no' ); ?>>No</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">


                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Hide Header on This Page?</h2>
                </div>
                <div class="pcmt-control select-button-type">
                    <p>
                        <select id="penci_page_hide_header_field" name="penci_page_hide_header_field">
                            <option value="">No</option>
                            <option value="yes" <?php selected( $hide_header, 'yes' ); ?>>Yes</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">

                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Hide Footer on This Page?</h2>
                </div>
                <div class="pcmt-control select-button-type">
                    <p>
                        <select id="penci_page_hide_footer_field" name="penci_page_hide_footer_field">
                            <option value="">No</option>
                            <option value="yes" <?php selected( $hide_footer, 'yes' ); ?>>Yes</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Select Sidebar Position for This
                        Page</h2>
                    <p class="description"><?php esc_html_e( 'This option just apply for Page Template "Page with Sidebar" and "Page VC Builder with Sidebar"', 'soledad' ); ?></p>
                </div>
                <div class="pcmt-control">
                    <p>
                        <select id="penci_sidebar_page_pos" name="penci_sidebar_page_pos">
                            <option value=""><?php esc_html_e( "Default", "soledad" ); ?></option>
                            <option value="left-sidebar" <?php selected( $page_sidebar, 'left-sidebar' ); ?>><?php esc_html_e( "Left Sidebar", "soledad" ); ?></option>
                            <option value="right-sidebar" <?php selected( $page_sidebar, 'right-sidebar' ); ?>><?php esc_html_e( "Right Sidebar", "soledad" ); ?></option>
                            <option value="two-sidebar" <?php selected( $page_sidebar, 'two-sidebar' ); ?>><?php esc_html_e( "Two Sidebar", "soledad" ); ?></option>
                        </select>
                    </p>
                </div>
            </div>
		<?php } ?>

		<?php if ( in_array( $post_type, $post_type_allow ) ) { ?>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Hide Featured Image Auto Appears on
                        This
                        Post?</h2>
                    <p class="description">
						<?php esc_html_e( 'This option only applies to Single Post Template Styles 1 & 2.', 'soledad' ); ?>
                        <br>
						<?php esc_html_e( 'If you wish to hide Featured Images from automatically appearing on all posts, you can select the option to do so by going to Customize > Single Posts > General > Hide Featured Image on Top.', 'soledad' ); ?>
                    </p>
                </div>
                <div class="pcmt-control">
                    <p>
                        <select id="penci_post_hide_featuimg" name="penci_post_hide_featuimg">
                            <option value="">Default ( follow Customize )</option>
                            <option value="no" <?php selected( $hide_featuimg, 'no' ); ?>>No, Show Featured Image
                            </option>
                            <option value="yes" <?php selected( $hide_featuimg, 'yes' ); ?>>Yes, Hide Featured Image
                            </option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">

                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Custom Post Title on Single Post
                        Page</h2>
                    <p class="description">You can enter a custom post title to be displayed on the single post page that is different from the post title shown on archive pages.</strong></p>
                </div>
                <div class="pcmt-control">
                    <textarea style="width: 100%; height: 50px;" placeholder="Enter the custom single post title" id="penci_cpost_title"
                                 name="penci_cpost_title"><?php echo $penci_cpost_title; ?></textarea>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">

                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Reading Time</h2>
                    <p class="description">Please fill in the estimated reading time for this post. For example: 3 mins<br>If you want to set a default reading time value for all posts, you can do so by going to <strong>Customize > General >
                            General Settings > Set A Default Reading Time Value</strong></p>
                </div>
                <div class="pcmt-control">
                    <p><input placeholder="Enter the custom post reading time" id="penci_reading_time"
                              name="penci_reading_time" type="text"
                              value="<?php echo esc_attr( $penci_reading_time ); ?>"></p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Sidebar Layout for this post?</h2>
                </div>
                <div class="pcmt-control">
                    <p>
                        <select id="penci_post_sidebar_display" name="penci_post_sidebar_display">
                            <option value="">Default Value ( on Customize )</option>
                            <option value="left" <?php selected( $sidebar, 'left' ); ?>>Left Sidebar</option>
                            <option value="right" <?php selected( $sidebar, 'right' ); ?>>Right Sidebar</option>
                            <option value="two" <?php selected( $sidebar, 'two' ); ?>>Two Sidebar</option>
                            <option value="no" <?php selected( $sidebar, 'no' ); ?>>No Sidebar</option>
                            <option value="small_width" <?php selected( $sidebar, 'small_width' ); ?>>No Sidebar with
                                Container Width Smaller
                            </option>
                        </select>
                    </p>
                </div>
            </div>
		<?php } ?>
        <div class="pcmt-control-wrapper">
            <div class="pcmt-title">
                <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Custom Sidebar for This Posts/Page</h2>
                <p class="description"><?php esc_html_e( 'Note: For pages, you can choose whether or not to display a sidebar in the "Page with Sidebar" template and customize the sidebar there. If the sidebar you choose here is empty, the sidebar you chose for the page in Customize will be displayed.', 'soledad' ); ?></p>
            </div>
            <div class="pcmt-control">
                <p>
                    <select id="penci_custom_sidebar_page_field" name="penci_custom_sidebar_page_field">
                        <option value=""><?php esc_html_e( "Default Sidebar( on Customize )", "soledad" ); ?></option>
                        <option value="main-sidebar" <?php selected( $value, 'main-sidebar' ); ?>><?php esc_html_e( "Main Sidebar", "soledad" ); ?></option>
                        <option value="main-sidebar-left" <?php selected( $value, 'main-sidebar-left' ); ?>><?php esc_html_e( "Main Sidebar Left", "soledad" ); ?></option>
                        <option value="custom-sidebar-1" <?php selected( $value, 'custom-sidebar-1' ); ?>><?php esc_html_e( "Custom Sidebar 1", "soledad" ); ?></option>
                        <option value="custom-sidebar-2" <?php selected( $value, 'custom-sidebar-2' ); ?>><?php esc_html_e( "Custom Sidebar 2", "soledad" ); ?></option>
                        <option value="custom-sidebar-3" <?php selected( $value, 'custom-sidebar-3' ); ?>><?php esc_html_e( "Custom Sidebar 3", "soledad" ); ?></option>
                        <option value="custom-sidebar-4" <?php selected( $value, 'custom-sidebar-4' ); ?>><?php esc_html_e( "Custom Sidebar 4", "soledad" ); ?></option>
                        <option value="custom-sidebar-5" <?php selected( $value, 'custom-sidebar-5' ); ?>><?php esc_html_e( "Custom Sidebar 5", "soledad" ); ?></option>
                        <option value="custom-sidebar-6" <?php selected( $value, 'custom-sidebar-6' ); ?>><?php esc_html_e( "Custom Sidebar 6", "soledad" ); ?></option>
                        <option value="custom-sidebar-7" <?php selected( $value, 'custom-sidebar-7' ); ?>><?php esc_html_e( "Custom Sidebar 7", "soledad" ); ?></option>
                        <option value="custom-sidebar-8" <?php selected( $value, 'custom-sidebar-8' ); ?>><?php esc_html_e( "Custom Sidebar 8", "soledad" ); ?></option>
                        <option value="custom-sidebar-9" <?php selected( $value, 'custom-sidebar-9' ); ?>><?php esc_html_e( "Custom Sidebar 9", "soledad" ); ?></option>
                        <option value="custom-sidebar-10" <?php selected( $value, 'custom-sidebar-10' ); ?>><?php esc_html_e( "Custom Sidebar 10", "soledad" ); ?></option>
						<?php Penci_Custom_Sidebar::get_list_sidebar( $value ); ?>
                    </select>
                </p>
            </div>
        </div>
        <div class="pcmt-control-wrapper">
            <div class="pcmt-title">
                <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Custom Sidebar Left for This
                    Posts/Page</h2>
                <p class="description"><?php esc_html_e( 'Note: For pages, you can choose to display or hide the sidebar using the "Page with Sidebar" template and customize the sidebar here. If the sidebar you choose here is empty, the sidebar you chose for the page in Customize will be displayed.', 'soledad' ); ?></p>
            </div>
            <div class="pcmt-control">
                <p>
                    <select id="penci_custom_sidebar_left_page_field" name="penci_custom_sidebar_left_page_field">
                        <option value=""><?php esc_html_e( "Default Sidebar( on Customize )", "soledad" ); ?></option>
                        <option value="main-sidebar" <?php selected( $value_left, 'main-sidebar' ); ?>><?php esc_html_e( "Main Sidebar", "soledad" ); ?></option>
                        <option value="main-sidebar-left" <?php selected( $value_left, 'main-sidebar-left' ); ?>><?php esc_html_e( "Main Sidebar Left", "soledad" ); ?></option>
                        <option value="custom-sidebar-1" <?php selected( $value_left, 'custom-sidebar-1' ); ?>><?php esc_html_e( "Custom Sidebar 1", "soledad" ); ?></option>
                        <option value="custom-sidebar-2" <?php selected( $value_left, 'custom-sidebar-2' ); ?>><?php esc_html_e( "Custom Sidebar 2", "soledad" ); ?></option>
                        <option value="custom-sidebar-3" <?php selected( $value_left, 'custom-sidebar-3' ); ?>><?php esc_html_e( "Custom Sidebar 3", "soledad" ); ?></option>
                        <option value="custom-sidebar-4" <?php selected( $value_left, 'custom-sidebar-4' ); ?>><?php esc_html_e( "Custom Sidebar 4", "soledad" ); ?></option>
                        <option value="custom-sidebar-5" <?php selected( $value_left, 'custom-sidebar-5' ); ?>><?php esc_html_e( "Custom Sidebar 5", "soledad" ); ?></option>
                        <option value="custom-sidebar-6" <?php selected( $value_left, 'custom-sidebar-6' ); ?>><?php esc_html_e( "Custom Sidebar 6", "soledad" ); ?></option>
                        <option value="custom-sidebar-7" <?php selected( $value_left, 'custom-sidebar-7' ); ?>><?php esc_html_e( "Custom Sidebar 7", "soledad" ); ?></option>
                        <option value="custom-sidebar-8" <?php selected( $value_left, 'custom-sidebar-8' ); ?>><?php esc_html_e( "Custom Sidebar 8", "soledad" ); ?></option>
                        <option value="custom-sidebar-9" <?php selected( $value_left, 'custom-sidebar-9' ); ?>><?php esc_html_e( "Custom Sidebar 9", "soledad" ); ?></option>
                        <option value="custom-sidebar-10" <?php selected( $value_left, 'custom-sidebar-10' ); ?>><?php esc_html_e( "Custom Sidebar 10", "soledad" ); ?></option>
						<?php Penci_Custom_Sidebar::get_list_sidebar( $value_left ); ?>
                    </select>
                </p>
            </div>
        </div>

		<?php if ( in_array( $post_type, $post_type_allow ) ) { ?>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Select Single Style for This
                        Post?</h2>
                </div>
                <div class="pcmt-control">
                    <p>
                        <select id="penci_single_style" name="penci_single_style">
                            <option value=""><?php esc_html_e( "Default Style( on Customize )", "soledad" ); ?></option>
                            <option value="style-1" <?php selected( $single_style, 'style-1' ); ?>><?php esc_html_e( "Style 1", "soledad" ); ?></option>
                            <option value="style-2" <?php selected( $single_style, 'style-2' ); ?>><?php esc_html_e( "Style 2", "soledad" ); ?></option>
                            <option value="style-3" <?php selected( $single_style, 'style-3' ); ?>><?php esc_html_e( "Style 3", "soledad" ); ?></option>
                            <option value="style-4" <?php selected( $single_style, 'style-4' ); ?>><?php esc_html_e( "Style 4", "soledad" ); ?></option>
                            <option value="style-5" <?php selected( $single_style, 'style-5' ); ?>><?php esc_html_e( "Style 5", "soledad" ); ?></option>
                            <option value="style-6" <?php selected( $single_style, 'style-6' ); ?>><?php esc_html_e( "Style 6", "soledad" ); ?></option>
                            <option value="style-7" <?php selected( $single_style, 'style-7' ); ?>><?php esc_html_e( "Style 7", "soledad" ); ?></option>
                            <option value="style-8" <?php selected( $single_style, 'style-8' ); ?>><?php esc_html_e( "Style 8", "soledad" ); ?></option>
                            <option value="style-9" <?php selected( $single_style, 'style-9' ); ?>><?php esc_html_e( "Style 9", "soledad" ); ?></option>
                            <option value="style-10" <?php selected( $single_style, 'style-10' ); ?>><?php esc_html_e( "Style 10", "soledad" ); ?></option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Custom Aspect Ratio for Featured
                        Image of This Post?</h2>
                    <p class="description">The aspect ratio of an element describes the proportional relationship between its width and height, for example, 3:2 (width:height). The default aspect ratio is 3:2<br>Please note that this option does not apply when parallax images are enabled or for Single Post Styles 1 & 2.</p>
                </div>
                <div class="pcmt-control">
                    <p><input placeholder="Enter the custom aspect ratio here"
                              id="_customize-input-penci_pfeatured_image_ratio" name="penci_pfeatured_image_ratio"
                              type="text" value="<?php echo esc_attr( $pfeatured_image_ratio ); ?>"></p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Enable Parallax Images for This
                        Post?</h2>
                    <p class="description"><?php esc_html_e( 'This feature does not apply for Single Style 1 & 2', 'soledad' ); ?></p>
                </div>
                <div class="pcmt-control">
                    <p>
                        <select id="penci_enable_jarallax_single" name="penci_enable_jarallax_single">
                            <option value="">No</option>
                            <option value="yes" <?php selected( $enable_parallax, 'yes' ); ?>>Yes</option>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Custom Post Builder Template for
                        This Post</h2>
                </div>
                <div class="pcmt-control">
                    <p>
                        <select id="penci_single_builder_layout" name="penci_single_builder_layout">
							<?php foreach ( $single_layout as $single_slug => $single_name ) { ?>
                                <option value="<?php echo $single_slug; ?>" <?php selected( $single_slug, $singlebd_layout ); ?>><?php echo $single_name; ?></option>
							<?php } ?>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Custom Header Builder Template for
                        This Post</h2>
                </div>
                <div class="pcmt-control">
                    <p>
                        <select id="penci_header_builder_layout" name="penci_header_builder_layout">
							<?php foreach ( $header_layout as $header_slug => $header_name ) { ?>
                                <option value="<?php echo $header_slug; ?>" <?php selected( $header_slug, $headerbd_layout ); ?>><?php echo $header_name; ?></option>
							<?php } ?>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Custom Footer Builder Template for
                        This Post</h2>
                </div>
                <div class="pcmt-control">
                    <p>
                        <select id="penci_footer_builder_layout" name="penci_footer_builder_layout">
							<?php foreach ( $footer_layout as $footer_slug => $footer_name ) { ?>
                                <option value="<?php echo $footer_slug; ?>" <?php selected( $footer_slug, $footerbd_layout ); ?>><?php echo $footer_name; ?></option>
							<?php } ?>
                        </select>
                    </p>
                </div>
            </div>
            <div class="pcmt-control-wrapper">
                <div class="pcmt-title">
                    <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Enable Table of Content for This
                        Post</h2>
                </div>
                <div class="pcmt-control">
                    <p>
                        <select id="penci_toc_enable" name="penci_toc_enable">
                            <option value="">Default Customizer Settings</option>
                            <option value="yes" <?php selected( $penci_toc_enable, 'yes' ); ?>>Yes</option>
                            <option value="no" <?php selected( $penci_toc_enable, 'no' ); ?>>No</option>
                        </select>
                    </p>
                </div>
            </div>
			<?php if ( get_theme_mod( 'penci_speed_remove_css' ) ): ?>
                <div class="pcmt-control-wrapper">
                    <div class="pcmt-title">
                        <h2 style="font-weight: 600; font-size: 14px; padding-left: 0;">Create a Separate Critical CSS
                            cache for this Post?</h2>
                    </div>
                    <div class="pcmt-control">
                        <p>
                            <select id="penci_post_critical_css" name="penci_post_critical_css">
                                <option value="">No</option>
                                <option value="yes" <?php selected( $penci_post_critical_css, 'yes' ); ?>>Yes</option>
                            </select>
                        </p>
                    </div>
                </div>
			<?php endif; ?>
		<?php }
	}
}
