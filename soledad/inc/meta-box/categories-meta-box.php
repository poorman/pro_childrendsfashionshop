<?php
/**
 * Hook to create meta box in categories edit screen
 *
 * @since 1.0
 */

// Create markup
if ( ! function_exists( 'penci_category_fields_meta' ) ) {
	add_action( 'category_edit_form_fields', 'penci_category_fields_meta' );
	function penci_category_fields_meta( $tag ) {
		$t_id                = $tag->term_id;
		$penci_categories    = get_option( "category_$t_id" );
		$mag_layout          = isset( $penci_categories['mag_layout'] ) ? $penci_categories['mag_layout'] : 'style-1';
		$mag_ads             = isset( $penci_categories['mag_ads'] ) ? $penci_categories['mag_ads'] : '';
		$cat_layout          = isset( $penci_categories['cat_layout'] ) ? $penci_categories['cat_layout'] : '';
		$cat_sidebar         = isset( $penci_categories['cat_sidebar'] ) ? $penci_categories['cat_sidebar'] : '';
		$cat_sidebar_left    = isset( $penci_categories['cat_sidebar_left'] ) ? $penci_categories['cat_sidebar_left'] : '';
		$cat_sidebar_display = isset( $penci_categories['cat_sidebar_display'] ) ? $penci_categories['cat_sidebar_display'] : '';
		$penci_critical_css  = isset( $penci_categories['penci_critical_css'] ) ? $penci_categories['penci_critical_css'] : '';
		$alayout_save_slug   = isset( $penci_categories['penci_archive_layout'] ) ? $penci_categories['penci_archive_layout'] : '';
		$archive_bgcolor     = isset( $penci_categories['penci_archive_bgcolor'] ) ? $penci_categories['penci_archive_bgcolor'] : '';
		$archive_color       = isset( $penci_categories['penci_archive_color'] ) ? $penci_categories['penci_archive_color'] : '';
		$archivepage_color   = isset( $penci_categories['penci_archivepage_color'] ) ? $penci_categories['penci_archivepage_color'] : '';
		?>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="cat_layout"><?php esc_html_e( 'Select Layout For This Category', 'soledad' ); ?></label>
            </th>
            <td>
                <select name="penci_categories[cat_layout]" id="penci_categories[cat_layout]">
                    <option value="" <?php selected( $cat_layout, '' ); ?>><?php _e( 'None', 'soledad' ); ?></option>
                    <option value="standard" <?php selected( $cat_layout, 'standard' ); ?>><?php _e( 'Standard Posts', 'soledad' ); ?></option>
                    <option value="classic" <?php selected( $cat_layout, 'classic' ); ?>><?php _e( 'Classic Posts', 'soledad' ); ?></option>
                    <option value="overlay" <?php selected( $cat_layout, 'overlay' ); ?>><?php _e( 'Overlay Posts', 'soledad' ); ?></option>
                    <option value="featured" <?php selected( $cat_layout, 'featured' ); ?>><?php _e( 'Featured Posts', 'soledad' ); ?></option>
                    <option value="grid" <?php selected( $cat_layout, 'grid' ); ?>><?php _e( 'Grid Posts', 'soledad' ); ?></option>
                    <option value="grid-2" <?php selected( $cat_layout, 'grid-2' ); ?>><?php _e( 'Grid 2 Columns Posts', 'soledad' ); ?></option>
                    <option value="masonry" <?php selected( $cat_layout, 'masonry' ); ?>><?php _e( 'Grid Masonry Posts', 'soledad' ); ?></option>
                    <option value="masonry-2" <?php selected( $cat_layout, 'masonry-2' ); ?>><?php _e( 'Grid Masonry 2 Columns Posts', 'soledad' ); ?></option>
                    <option value="list" <?php selected( $cat_layout, 'list' ); ?>><?php _e( 'List Posts', 'soledad' ); ?></option>
                    <option value="small-list" <?php selected( $cat_layout, 'small-list' ); ?>><?php _e( 'Small List Posts', 'soledad' ); ?></option>
                    <option value="boxed-1" <?php selected( $cat_layout, 'boxed-1' ); ?>><?php _e( 'Boxed Posts Style 1', 'soledad' ); ?></option>
                    <option value="boxed-2" <?php selected( $cat_layout, 'boxed-2' ); ?>><?php _e( 'Boxed Posts Style 2', 'soledad' ); ?></option>
                    <option value="mixed" <?php selected( $cat_layout, 'mixed' ); ?>><?php _e( 'Mixed Posts', 'soledad' ); ?></option>
                    <option value="mixed-2" <?php selected( $cat_layout, 'mixed-2' ); ?>><?php _e( 'Mixed Posts Style 2', 'soledad' ); ?></option>
                    <option value="mixed-3" <?php selected( $cat_layout, 'mixed-3' ); ?>><?php _e( 'Mixed Posts Style 3', 'soledad' ); ?></option>
                    <option value="mixed-4" <?php selected( $cat_layout, 'mixed-4' ); ?>><?php _e( 'Mixed Posts Style 4', 'soledad' ); ?></option>
                    <option value="photography" <?php selected( $cat_layout, 'photography' ); ?>><?php _e( 'Photography Posts', 'soledad' ); ?></option>
                    <option value="standard-grid" <?php selected( $cat_layout, 'standard-grid' ); ?>><?php _e( '1st Standard Then Grid', 'soledad' ); ?></option>
                    <option value="standard-grid-2" <?php selected( $cat_layout, 'standard-grid-2' ); ?>><?php _e( '1st StandardThen Grid 2 Columns', 'soledad' ); ?></option>
                    <option value="standard-list" <?php selected( $cat_layout, 'standard-list' ); ?>><?php _e( '1st Standard Then List', 'soledad' ); ?></option>
                    <option value="standard-boxed-1" <?php selected( $cat_layout, 'standard-boxed-1' ); ?>><?php _e( '1st Standard Then Boxed', 'soledad' ); ?>
                    </option>
                    <option value="classic-grid" <?php selected( $cat_layout, 'classic-grid' ); ?>><?php _e( '1st Classic Then Grid', 'soledad' ); ?>
                    </option>
                    <option value="classic-grid-2" <?php selected( $cat_layout, 'classic-grid-2' ); ?>><?php _e( '1st Classic Then Grid 2 Columns', 'soledad' ); ?>
                    </option>
                    <option value="classic-list" <?php selected( $cat_layout, 'classic-list' ); ?>><?php _e( '1st Classic Then List', 'soledad' ); ?>
                    </option>
                    <option value="classic-boxed-1" <?php selected( $cat_layout, 'classic-boxed-1' ); ?>><?php _e( '1st Classic Then Boxed', 'soledad' ); ?>
                    </option>
                    <option value="overlay-grid" <?php selected( $cat_layout, 'overlay-grid' ); ?>><?php _e( '1st Overlay Then Grid', 'soledad' ); ?>
                    </option>
                    <option value="overlay-list" <?php selected( $cat_layout, 'overlay-list' ); ?>><?php _e( '1st Overlay Then List', 'soledad' ); ?>
                    </option>
                </select>
                <p class="description"><?php _e( 'This option will override with the general layout you selected on General > General Settings > Category, Tags, Search, Archive Pages > Category, Tag, Search, Archive Layout', 'soledad' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="cat_sidebar"><?php esc_html_e( 'Display sidebar on this category', 'soledad' ); ?></label>
            </th>
            <td>
                <select name="penci_categories[cat_sidebar_display]" id="penci_categories[cat_sidebar_display]">
                    <option value="">Default ( follow Customize )</option>
                    <option value="left" <?php selected( $cat_sidebar_display, 'left' ); ?>><?php _e( 'Left Sidebar', 'soledad' ); ?></option>
                    <option value="right" <?php selected( $cat_sidebar_display, 'right' ); ?>><?php _e( 'Right Sidebar', 'soledad' ); ?></option>
                    <option value="two" <?php selected( $cat_sidebar_display, 'two' ); ?>><?php _e( 'Two Sidebar', 'soledad' ); ?></option>
                    <option value="no" <?php selected( $cat_sidebar_display, 'no' ); ?>><?php _e( 'No Sidebar', 'soledad' ); ?></option>
                </select>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="cat_sidebar"><?php esc_html_e( 'Select Custom Sidebar for This Category', 'soledad' ); ?></label>
            </th>
            <td>
                <select name="penci_categories[cat_sidebar]" id="penci_categories[cat_sidebar]">
                    <option value=""><?php _e( 'Default ( follow Customize )', 'soledad' ); ?></option>
                    <option value="main-sidebar" <?php selected( $cat_sidebar, 'main-sidebar' ); ?>><?php _e( 'Main Sidebar', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-1" <?php selected( $cat_sidebar, 'custom-sidebar-1' ); ?>><?php _e( 'Custom Sidebar 1', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-2" <?php selected( $cat_sidebar, 'custom-sidebar-2' ); ?>><?php _e( 'Custom Sidebar 2', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-3" <?php selected( $cat_sidebar, 'custom-sidebar-3' ); ?>><?php _e( 'Custom Sidebar 3', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-4" <?php selected( $cat_sidebar, 'custom-sidebar-4' ); ?>><?php _e( 'Custom Sidebar 4', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-5" <?php selected( $cat_sidebar, 'custom-sidebar-5' ); ?>><?php _e( 'Custom Sidebar 5', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-6" <?php selected( $cat_sidebar, 'custom-sidebar-6' ); ?>><?php _e( 'Custom Sidebar 6', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-7" <?php selected( $cat_sidebar, 'custom-sidebar-7' ); ?>><?php _e( 'Custom Sidebar 7', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-8" <?php selected( $cat_sidebar, 'custom-sidebar-8' ); ?>><?php _e( 'Custom Sidebar 8', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-9" <?php selected( $cat_sidebar, 'custom-sidebar-9' ); ?>><?php _e( 'Custom Sidebar 9', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-10" <?php selected( $cat_sidebar, 'custom-sidebar-10' ); ?>><?php _e( 'Custom Sidebar 10', 'soledad' ); ?>
                    </option>
					<?php Penci_Custom_Sidebar::get_list_sidebar( $cat_sidebar ); ?>
                </select>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="cat_sidebar_left"><?php esc_html_e( 'Select Custom Sidebar Left for This Category', 'soledad' ); ?></label>
            </th>
            <td>
                <select name="penci_categories[cat_sidebar_left]" id="penci_categories[cat_sidebar_left]">
                    <option value=""><?php _e( 'Default ( follow Customize )', 'soledad' ); ?></option>
                    <option value="main-sidebar" <?php selected( $cat_sidebar_left, 'main-sidebar' ); ?>><?php _e( 'Main Sidebar', 'soledad' ); ?>
                    </option>
                    <option value="custom-sidebar-1" <?php selected( $cat_sidebar_left, 'custom-sidebar-1' ); ?>><?php _e( 'Custom                        Sidebar 1', 'soledad' ); ?>                    </option>
                    <option value="custom-sidebar-2" <?php selected( $cat_sidebar_left, 'custom-sidebar-2' ); ?>><?php _e( 'Custom                        Sidebar 2', 'soledad' ); ?>                    </option>
                    <option value="custom-sidebar-3" <?php selected( $cat_sidebar_left, 'custom-sidebar-3' ); ?>><?php _e( 'Custom                        Sidebar 3', 'soledad' ); ?>                    </option>
                    <option value="custom-sidebar-4" <?php selected( $cat_sidebar_left, 'custom-sidebar-4' ); ?>><?php _e( 'Custom                        Sidebar 4', 'soledad' ); ?>                    </option>
                    <option value="custom-sidebar-5" <?php selected( $cat_sidebar_left, 'custom-sidebar-5' ); ?>><?php _e( 'Custom                        Sidebar 5', 'soledad' ); ?>                    </option>
                    <option value="custom-sidebar-6" <?php selected( $cat_sidebar_left, 'custom-sidebar-6' ); ?>><?php _e( 'Custom                        Sidebar 6', 'soledad' ); ?>                    </option>
                    <option value="custom-sidebar-7" <?php selected( $cat_sidebar_left, 'custom-sidebar-7' ); ?>><?php _e( 'Custom                        Sidebar 7', 'soledad' ); ?>                    </option>
                    <option value="custom-sidebar-8" <?php selected( $cat_sidebar_left, 'custom-sidebar-8' ); ?>><?php _e( 'Custom                        Sidebar 8', 'soledad' ); ?>                    </option>
                    <option value="custom-sidebar-9" <?php selected( $cat_sidebar_left, 'custom-sidebar-9' ); ?>><?php _e( 'Custom                        Sidebar 9', 'soledad' ); ?>                    </option>
                    <option value="custom-sidebar-10" <?php selected( $cat_sidebar_left, 'custom-sidebar-10' ); ?>>                        <?php _e( 'Custom Sidebar 10', 'soledad' ); ?>                    </option>
					<?php Penci_Custom_Sidebar::get_list_sidebar( $cat_sidebar_left ); ?>
                </select>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="mag_layout"><?php esc_html_e( 'Select Featured Layout for Magazine Layout', 'soledad' ); ?></label>
            </th>
            <td>
                <select name="penci_categories[mag_layout]" id="penci_categories[mag_layout]">
                    <option value="style-1" <?php selected( $mag_layout, 'style-1' ); ?>><?php _e( 'Style 1 - 1st Post Grid                        Featured on Left', 'soledad' ); ?>                    </option>
                    <option value="style-2" <?php selected( $mag_layout, 'style-2' ); ?>><?php _e( 'Style 2 - 1st Post Grid                        Featured on Top', 'soledad' ); ?>                    </option>
                    <option value="style-3" <?php selected( $mag_layout, 'style-3' ); ?>><?php _e( 'Style 3 - Text Overlay', 'soledad' ); ?></option>
                    <option value="style-4" <?php selected( $mag_layout, 'style-4' ); ?>><?php _e( 'Style 4 - Single Slider', 'soledad' ); ?>                    </option>
                    <option value="style-5" <?php selected( $mag_layout, 'style-5' ); ?>><?php _e( 'Style 5 - Slider 2 Columns', 'soledad' ); ?>                    </option>
                    <option value="style-6" <?php selected( $mag_layout, 'style-6' ); ?>><?php _e( 'Style 6 - 1st Post List                        Featured on Top', 'soledad' ); ?>                    </option>
                    <option value="style-7" <?php selected( $mag_layout, 'style-7' ); ?>><?php _e( 'Style 7 - Grid 2 Columns', 'soledad' ); ?></option>
                    <option value="style-8" <?php selected( $mag_layout, 'style-8' ); ?>><?php _e( 'Style 8 - List Layout', 'soledad' ); ?></option>
                    <option value="style-9" <?php selected( $mag_layout, 'style-9' ); ?>><?php _e( 'Style 9 - Small List Layout', 'soledad' ); ?>                    </option>
                    <option value="style-10" <?php selected( $mag_layout, 'style-10' ); ?>><?php _e( 'Style 10 - 2 First Posts                        Featured and List', 'soledad' ); ?>                    </option>
                    <option value="style-11" <?php selected( $mag_layout, 'style-11' ); ?>><?php _e( 'Style 11 - Text Overlay                        Center', 'soledad' ); ?>                    </option>
                    <option value="style-12" <?php selected( $mag_layout, 'style-12' ); ?>><?php _e( 'Style 12 - Slider 3 Columns', 'soledad' ); ?>                    </option>
                    <option value="style-13" <?php selected( $mag_layout, 'style-13' ); ?>><?php _e( 'Style 13 - Grid 3 Columns', 'soledad' ); ?>                    </option>
                    <option value="style-14" <?php selected( $mag_layout, 'style-14' ); ?>><?php _e( 'Style 14 - 1st Post Overlay                        Featured on Top', 'soledad' ); ?>                    </option>
                    <option value="style-15" <?php selected( $mag_layout, 'style-15' ); ?>><?php _e( 'Style 15 - Overlay Left then                        List on Right', 'soledad' ); ?>                    </option>
                </select>
                <p class="description"><?php _e( 'Use it to change the featured layout for this category when you use this layout as a featured category. Check more on <a href="https://www.youtube.com/watch?v=gnbMyMBCK_M&list=PL1PBMejQ2VTwp9ppl8lTQ9Tq7I3FJTT04" target="_blank">this video tutorial</a>', 'soledad' ); ?></p>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="mag_ads"><?php esc_html_e( 'Add Google Adsense/Custom HTML Code below this category', 'soledad' ); ?></label>
            </th>
            <td>
                <textarea name="penci_categories[mag_ads]" id="penci_categories[mag_ads]" rows="5"
                          cols="50"><?php echo stripslashes( $mag_ads ); ?></textarea>
            </td>
        </tr>
		<?php
		$archive_layout   = [];
		$archive_layout[] = __( 'Default Template', 'soledad' );
		$archive_layouts  = get_posts( [
			'post_type'      => 'archive-template',
			'posts_per_page' => - 1,
		] );
		foreach ( $archive_layouts as $alayout ) {
			$archive_layout[ $alayout->post_name ] = $alayout->post_title;
		}
		?>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="penci_categories[penci_archive_layout]"><?php esc_html_e( 'Select Custom Archive Template for this Category', 'soledad' ); ?></label>
            </th>
            <td>
                <select name="penci_categories[penci_archive_layout]" id="penci_categories[penci_archive_layout]">
					<?php foreach ( $archive_layout as $alayout_slug => $alayout_name ): ?>
                        <option value="<?php echo $alayout_slug; ?>" <?php selected( $alayout_slug, $alayout_save_slug ); ?>><?php echo $alayout_name; ?></option>
					<?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="penci_categories[penci_archive_bgcolor]"><?php esc_html_e( 'Category Name Background Color', 'soledad' ); ?></label>
            </th>
            <td>
                <input class="widefat pccat-color-picker color-picker"
                       id="penci_categories[penci_archive_bgcolor]"
                       name="penci_categories[penci_archive_bgcolor]" type="text"
                       value="<?php echo $archive_bgcolor; ?>"/>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="penci_categories[penci_archive_color]"><?php esc_html_e( 'Category Name Text Color', 'soledad' ); ?></label>
            </th>
            <td>
                <input class="widefat pccat-color-picker color-picker"
                       id="penci_categories[penci_archive_color]"
                       name="penci_categories[penci_archive_color]" type="text"
                       value="<?php echo $archive_color; ?>"/>
            </td>
        </tr>
        <tr class="form-field">
            <th scope="row" valign="top">
                <label for="penci_categories[penci_archivepage_color]"><?php esc_html_e( 'Category Text Color on Category Page (Apply for Penci Cat Default Style)', 'soledad' ); ?></label>
            </th>
            <td>
                <input class="widefat pccat-color-picker color-picker"
                       id="penci_categories[penci_archivepage_color]"
                       name="penci_categories[penci_archivepage_color]" type="text"
                       value="<?php echo $archivepage_color; ?>"/>
            </td>
        </tr>
		<?php if ( get_theme_mod( 'penci_speed_remove_css' ) ): ?>
            <tr class="form-field">
                <th scope="row">
                    <label for="penci_categories[penci_critical_css]"><?php esc_html_e( 'Create a Separate Critical CSS cache for this Category?', 'soledad' ); ?></label>
                </th>
                <td>
                    <select name="penci_categories[penci_critical_css]" id="penci_categories[penci_critical_css]">
                        <option value=""><?php _e( 'No', 'soledad' ); ?></option>
                        <option value="yes" <?php selected( $penci_critical_css, 'yes' ); ?>><?php _e( 'Yes', 'soledad' ); ?></option>
                    </select>
                </td>
            </tr>
		<?php endif;
	}
}

// Save data
if ( ! function_exists( 'penci_save_category_fileds_meta' ) ) {
	add_action( 'edited_category', 'penci_save_category_fileds_meta' );
	function penci_save_category_fileds_meta( $term_id ) {
		if ( isset( $_POST['penci_categories'] ) ) {
			$t_id             = $term_id;
			$penci_categories = get_option( "category_$t_id" );
			$cat_keys         = array_keys( $_POST['penci_categories'] );
			foreach ( $cat_keys as $key ) {
				if ( isset( $_POST['penci_categories'][ $key ] ) ) {
					$penci_categories[ $key ] = $_POST['penci_categories'][ $key ];
				}
			}
			//save the option array
			update_option( "category_$t_id", $penci_categories );
		}
	}
}
