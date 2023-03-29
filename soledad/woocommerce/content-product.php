<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 */

defined( 'ABSPATH' ) || exit;

global $product;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
$product_style = penci_get_product_loop_class();
?>
<li <?php wc_product_class( '', $product ); ?>>
    <div class="penci-soledad-product <?php echo esc_attr( $product_style ); ?>">
		<?php do_action( 'penci_before_product_loop' ); ?>
        <div class="penci-product-loop-inner-content">
			<?php wc_get_template_part( 'product-loop/content', $product_style ); ?>
        </div>
		<?php do_action( 'penci_end_product_loop' ); ?>
    </div>
</li>
