<?php
$options   = [];
$options[] = array(
	'id'       => 'penci_woo_post_per_page',
	'default'  => '24',
	'sanitize' => 'penci_sanitize_number_field',
	'label'    => __( 'Total Products Display Per Page', 'soledad' ),
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_woo_post_per_page',
	),
	'choices'  => array(
		'desktop' => array(
			'min'     => 1,
			'max'     => 2000,
			'step'    => 1,
			'edit'    => true,
			'unit'    => '',
			'default' => '24',
		),
	),
);
$options[] = array(
	'id'       => 'penci_catalog_heading_1',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Catalog Tools Settings', 'soledad' ),
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'  => '9,24,36',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Products Per Page Variations', 'soledad' ),
	'id'       => 'penci_woo_post_per_page_variations',
	'type'     => 'soledad-fw-text',
);
$options[] = array(
	'id'       => 'penci_woo_per_row_columns_selector',
	'default'  => true,
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => __( 'Show Columns Selector on Shop page', 'soledad' ),
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => 'list-grid',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Shop products view', 'soledad' ),
	'description' => __( 'You can set different view mode for the shop page', 'soledad' ),
	'id'          => 'penci_shop_product_view',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'grid'      => 'Grid',
		'list'      => 'List',
		'grid-list' => 'Grid/List',
		'list-grid' => 'List/Grid',
	)
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'AJAX shop', 'soledad' ),
	'description' => __( 'Enable AJAX functionality for filter widgets, categories navigation, and pagination on the shop page.', 'soledad' ),
	'id'          => 'penci_woocommerce_ajax_shop',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Scroll to top after AJAX', 'soledad' ),
	'description' => __( 'Disable - Enable scroll to top after AJAX.', 'soledad' ),
	'id'          => 'penci_woocommerce_ajax_shop_auto_top',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_calalog_heading_1',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Product Item Settings', 'soledad' ),
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'     => 'style-1',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Product Category Style', 'soledad' ),
	'description' => __( 'Select the style of the category showing on archive/categories/tags/search', 'soledad' ),
	'id'          => 'penci_woocommerce_product_cat_style',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'style-1' => 'Style 1',
		'style-2' => 'Style 2',
		'style-3' => 'Style 3',
		'style-4' => 'Style 4',
		'style-5' => 'Style 5',
	)
);
$options[] = array(
	'default'     => 'style-1',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Product Item Style', 'soledad' ),
	'description' => __( 'Select the style of the product showing on shop/archive/categories/tags/search<br/>.', 'soledad' ),
	'id'          => 'penci_woocommerce_product_style',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'standard' => 'Default',
		'style-1'  => 'Style 1',
		'style-2'  => 'Style 2',
		'style-3'  => 'Style 3',
		'style-4'  => 'Style 4',
		'style-5'  => 'Style 5',
		'style-6'  => 'Style 6',
		'style-7'  => 'Style 7',
	)
);
$options[] = array(
	'id'          => 'penci_woocommerce_product_icon_hover_style',
	'default'     => 'round',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Icon Hover Style', 'soledad' ),
	'description' => __( 'Select icon hover style on Product Item', 'soledad' ),
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'round' => 'Separate Round',
		'group' => 'Group in Rectangle',
	)
);
$options[] = array(
	'id'          => 'penci_woocommerce_product_icon_hover_position',
	'default'     => 'top-left',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Icon Hover Position', 'soledad' ),
	'description' => __( 'Select icon hover position on Product Item', 'soledad' ),
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'top-left'      => 'Top left',
		'top-right'     => 'Top Right',
		'bottom-left'   => 'Bottom Left',
		'bottom-right'  => 'Bottom Right',
		'center-top'    => 'Center Top',
		'center-center' => 'Center Center',
		'center-bottom' => 'Center Bottom',
	)
);
$options[] = array(
	'id'          => 'penci_woocommerce_product_icon_hover_animation',
	'default'     => 'move-right',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Icon Hover Animation', 'soledad' ),
	'description' => __( 'Select icon hover animation on Product Item', 'soledad' ),
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'move-left'   => 'Move to left',
		'move-right'  => 'Move to Right',
		'move-top'    => 'Move to Top',
		'move-bottom' => 'Move to Bottom',
		'fade'        => 'Fade In',
		'zoom'        => 'Zoom In',
	)
);
$options[] = array(
	'id'       => 'penci_woocommerce_product_hover_img',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable Hover Image on Product Catalog ?', 'soledad' ),
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Show product category ?', 'soledad' ),
	'description' => __( 'Display product category link below the product title.', 'soledad' ),
	'id'          => 'penci_woocommerce_loop_category',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'id'          => 'penci_woocommerce_loop_rating',
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Show product star rating ?', 'soledad' ),
	'description' => __( 'Display product loop rating below the product title.', 'soledad' ),
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Login to see add to cart and prices', 'soledad' ),
	'description' => __( 'You can restrict shopping functions only for logged in customers.', 'soledad' ),
	'id'          => 'penci_woocommerce_restrict_cart_price',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Enable Quick Select Options on Product', 'soledad' ),
	'description' => __( 'Allow customers purchase product on hover content.', 'soledad' ),
	'id'          => 'penci_woocommerce_product_quick_shop',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_number_field',
	'label'    => __( 'Limit Product Title Length', 'soledad' ),
	'desc'     => 'Enter the custom length of the product title you want to display',
	'id'       => 'penci_woo_limit_product_title',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_woo_limit_product_title',
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
	'id'       => 'penci_woo_limit_product_excerpt',
	'default'  => '',
	'sanitize' => 'penci_sanitize_number_field',
	'label'    => __( 'Limit Product Excerpt Length', 'soledad' ),
	'desc'     => 'Enter the custom length of the product summary you want to display',
	'type'     => 'soledad-fw-size',
	'ids'      => array(
		'desktop' => 'penci_woo_limit_product_excerpt',
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
if ( function_exists( 'penci_product_attributes_array' ) ) {
	$options[] = array(
		'id'          => 'penci_woocommerce_grid_swatch',
		'default'     => false,
		'sanitize'    => 'penci_sanitize_choices_field',
		'label'       => __( 'Grid swatch attribute to display', 'soledad' ),
		'description' => __( 'Choose the attribute that will be shown on the product grid.', 'soledad' ),
		'type'        => 'soledad-fw-ajax-select',
		'choices'     => penci_product_attributes_array(),
	);
}
$options[] = array(
	'id'       => 'penci_woocommerce_grid_swatch_limit',
	'default'  => '5',
	'sanitize' => 'absint',
	'label'    => __( 'Limit swatches on grid ', 'soledad' ),
);
$options[] = array(
	'id'          => 'penci_woocommerce_grid_swatch_cache',
	'default'     => true,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Enable Product Swatches Shop Cache', 'soledad' ),
	'description' => __( 'By default, Soledad using cache to speed up Query for swatch image. Uncheck this option to disable/debug.', 'soledad' ),
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'id'       => 'penci_catalog_heading_4',
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Catalog Columns Settings', 'soledad' ),
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'id'          => 'penci_shop_cat_columns',
	'default'     => 4,
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Categories Columns', 'soledad' ),
	'description' => __( 'How many category should be shown per row on section ?', 'soledad' ),
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		2 => '2 Columns',
		3 => '3 Columns',
		4 => '4 Columns',
		5 => '5 Columns',
		6 => '6 Columns',
	)
);
$options[] = array(
	'id'          => 'penci_shop_cat_display_type',
	'default'     => 'grid',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Categories Display Style', 'soledad' ),
	'description' => __( 'Select the category displays style on shop/category page', 'soledad' ),
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'grid'     => 'Grid',
		'carousel' => 'Carousel',
	)
);
$options[] = array(
	'id'          => 'penci_shop_product_columns',
	'default'     => 3,
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Products per row on Desktop', 'soledad' ),
	'description' => __( 'How many products should be shown per row on desktop ?', 'soledad' ),
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		2 => '2 Columns',
		3 => '3 Columns',
		4 => '4 Columns',
		5 => '5 Columns',
		6 => '6 Columns',
	)
);
$options[] = array(
	'id'          => 'penci_shop_product_mobile_columns',
	'default'     => 2,
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => __( 'Products per row on Mobile', 'soledad' ),
	'description' => __( 'How many products should be shown per row on mobile ?', 'soledad' ),
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		1 => '1 Column',
		2 => '2 Columns',
	)
);

return $options;
