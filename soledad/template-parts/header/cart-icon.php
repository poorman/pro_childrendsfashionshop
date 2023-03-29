<?php
if ( ! class_exists( 'WooCommerce' ) || get_theme_mod( 'penci_woo_shop_hide_cart_icon', false ) ) {
	return;
}
?>
<div id="top-header-cart"
     class="top-search-classes pcheader-icon shoping-cart-icon<?php if ( get_theme_mod( 'penci_topbar_search_check' ) ): echo ' clear-right'; endif; ?>">
    <ul>
        <li><a class="cart-contents"
               href="<?php $cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : WC()->cart->get_cart_url();
		       echo $cart_link; ?>"
               title="<?php _e( 'View your shopping cart' ); ?>">
                <i class="penciicon-shopping-cart"></i>
                <span><?php echo sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
			<?php if ( 'dropdown' == get_theme_mod( 'penci_woo_cart_style' ) ): ?>
                <div class="penci-header-cart-detail woocommerce">
                    <div class="widget_shopping_cart_content">
						<?php woocommerce_mini_cart(); ?>
                    </div>
                </div>
			<?php endif; ?>
        </li>
    </ul>
</div>
