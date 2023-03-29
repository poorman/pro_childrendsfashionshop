<div class="pc-wrapbuilder-header-inner">
	<?php
	if ( ( is_home() || is_front_page() ) && get_theme_mod( 'penci_home_h1content' ) ) {
		echo '<h1 class="penci-hide-tagupdated">' . get_theme_mod( 'penci_home_h1content' ) . '</h1>';
	}
	load_template( PENCI_BUILDER_PATH . 'template/desktop-sticky-wrapper.php' );
	$overlap           = penci_get_builder_mod( 'penci_header_overlap_setting' );
	$header_width      = penci_get_builder_mod( 'penci_header_wrap_all', 'normal-width' );
	$header_shadow     = penci_get_builder_mod( 'penci_header_shadow' );
	$header_wrap_width = penci_get_builder_mod( 'penci_header_wrap_width' );
	$classes           = [];
	$classes[]         = 'penci_header penci-header-builder main-builder-header';
	$classes[]         = 'enable' == $overlap ? 'penci_header_overlap' : '';
	$classes[]         = 'enable' == $header_width ? 'container' : 'normal';
	$classes[]         = 'enable' == $header_shadow ? 'shadow-enable' : 'no-shadow';
	$classes[]         = 'enable' == $header_width && $header_wrap_width ? $header_wrap_width : '';
	$classes[]         = 'enable' == $header_width ? 'pchb-boxed-layout' : '';
	?>
    <div class="<?php echo implode( ' ', $classes ); ?>">
		<?php
		$rows = penci_get_builder_mod( 'penci_hb_arrange_bar', 'topblock,top,mid,bottom,bottomblock' );

		$rows = explode( ',', $rows );

		foreach ( $rows as $row ) {
			if ( ( ! empty( $row ) && penci_can_render_header( 'desktop', $row ) ) || is_customize_preview() ) {
				load_template( PENCI_BUILDER_PATH . 'template/desktop-' . $row . '.php' );
			}
		}
		?>
    </div>
	<?php
	load_template( PENCI_BUILDER_PATH . 'template/mobile-builder.php' );
	load_template( PENCI_BUILDER_PATH . 'template/mobile-menu.php' );
	?>
</div>
