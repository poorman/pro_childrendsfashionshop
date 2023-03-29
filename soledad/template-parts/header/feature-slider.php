<?php
if( get_theme_mod( 'penci_enable_featured_video_bg' ) && get_theme_mod( 'penci_featured_video_url' ) ) {
	get_template_part( 'inc/featured_slider/featured_video' );
} else {
	if ( get_theme_mod( 'penci_featured_slider' ) == true ) :
		$slider_style = get_theme_mod( 'penci_featured_slider_style' ) ? get_theme_mod( 'penci_featured_slider_style' ) : 'style-1';

		if( ( $slider_style == 'style-33' || $slider_style == 'style-34' ) && get_theme_mod( 'penci_feature_rev_sc' ) ) {
			$rev_shortcode = get_theme_mod( 'penci_feature_rev_sc' );
			echo '<div class="featured-area featured-' . $slider_style . '">';
			if( $slider_style == 'style-34' ): echo '<div class="container">'; endif;
			echo do_shortcode( $rev_shortcode );
			if( $slider_style == 'style-34' ): echo '</div>'; endif;
			echo '</div>';
		} else {
			if ( get_theme_mod( 'penci_body_boxed_layout' ) && ! get_theme_mod( 'penci_vertical_nav_show' ) ) {
				if( $slider_style == 'style-3' ) {
					$slider_style == 'style-1';
				} elseif( $slider_style == 'style-5' ) {
					$slider_style == 'style-4';
				} elseif( $slider_style == 'style-7' ) {
					$slider_style == 'style-8';
				} elseif( $slider_style == 'style-9' ) {
					$slider_style == 'style-10';
				} elseif( $slider_style == 'style-11' ) {
					$slider_style == 'style-12';
				} elseif( $slider_style == 'style-13' ) {
					$slider_style == 'style-14';
				} elseif( $slider_style == 'style-15' ) {
					$slider_style == 'style-16';
				} elseif( $slider_style == 'style-17' ) {
					$slider_style == 'style-18';
				} elseif( $slider_style == 'style-29' ) {
					$slider_style == 'style-30';
				} elseif( $slider_style == 'style-35' ) {
					$slider_style == 'style-36';
				}
			}
			$slider_class = $slider_style;
			if( $slider_style == 'style-5' ) {
				$slider_class = 'style-4 style-5';
			} elseif ( $slider_style == 'style-30' ) {
				$slider_class = 'style-29 style-30';
			} elseif ( $slider_style == 'style-36' ) {
				$slider_class = 'style-35 style-36';
			}
			$data_auto = 'false';
			$data_loop = 'true';
			$data_res = '';

			if( $slider_style == 'style-7' || $slider_style == 'style-8' ){
				$data_res = ' data-item="4" data-desktop="4" data-tablet="2" data-tabsmall="1"';
			} elseif( $slider_style == 'style-9' || $slider_style == 'style-10' ){
				$data_res = ' data-item="3" data-desktop="3" data-tablet="2" data-tabsmall="1"';
			} elseif( $slider_style == 'style-11' || $slider_style == 'style-12' ){
				$data_res = ' data-item="2" data-desktop="2" data-tablet="2" data-tabsmall="1"';
			} elseif( in_array( $slider_style, array( 'style-31', 'style-32', 'style-35', 'style-36', 'style-37' ) ) ) {
				$data_next_prev = get_theme_mod( 'penci_enable_next_prev_penci_slider' ) ? 'true' : 'false';
				$data_dots = get_theme_mod( 'penci_disable_dots_penci_slider' ) ? 'false' : 'true';
				$data_res = ' data-dots="'. $data_dots .'" data-nav="'. $data_next_prev .'"';
			}

			if( get_theme_mod( 'penci_featured_autoplay' ) ): $data_auto = 'true'; endif;
			if( get_theme_mod( 'penci_featured_loop' ) ): $data_loop = 'false'; endif;
			$auto_time = get_theme_mod( 'penci_featured_slider_auto_time' );
			if( !is_numeric( $auto_time ) ): $auto_time = '4000'; endif;
			$auto_speed = get_theme_mod( 'penci_featured_slider_auto_speed' );
			if( !is_numeric( $auto_speed ) ): $auto_speed = '600'; endif;
			$open_container = '';
			$close_container = '';
			if( in_array( $slider_style, array( 'style-1', 'style-4', 'style-6', 'style-8', 'style-10', 'style-12', 'style-14', 'style-16', 'style-18', 'style-19', 'style-20', 'style-21', 'style-22', 'style-23', 'style-24', 'style-25', 'style-26', 'style-27', 'style-30', 'style-32', 'style-36', 'style-37' ) ) ):
				$open_container = '<div class="container">';
				$close_container = '</div>';
			endif;

			if( get_theme_mod( 'penci_enable_flat_overlay' ) && in_array( $slider_style, array( 'style-6', 'style-7', 'style-8', 'style-9', 'style-10', 'style-11', 'style-12', 'style-13', 'style-14', 'style-15', 'style-16', 'style-17', 'style-18', 'style-19', 'style-20', 'style-21', 'style-22', 'style-23', 'style-24', 'style-25', 'style-26', 'style-27', 'style-28' ) ) ): $slider_class .= ' penci-flat-overlay'; endif;

			echo '<div class="featuredsl-customizer featured-area featured-' . $slider_class . '">' . $open_container;
			if( $slider_style == 'style-37' ):
				echo '<div class="penci-featured-items-left">';
			endif;
			echo '<div class="penci-owl-carousel penci-owl-featured-area"'. $data_res .' data-style="'. $slider_style .'" data-auto="'. $data_auto .'" data-autotime="'. $auto_time .'" data-speed="'. $auto_speed .'" data-loop="'. $data_loop .'">';
			get_template_part( 'inc/featured_slider/' . $slider_style );
			echo '</div>';
			echo $close_container. '</div>';
		}
	endif;
}
