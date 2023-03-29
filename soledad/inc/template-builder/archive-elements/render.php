<?php
add_filter( 'body_class', function ( $class ) {
	$class[] = 'pccustom-template-enable';

	return $class;
} );
get_header(); ?>
<div class="container-archive-page">
    <div id="main" class="penci-custom-archive-template">
		<?php
		$post_name = penci_should_render_archive_template();
		$post_data = get_page_by_path( $post_name, OBJECT, 'archive-template' );
		if ( ! empty( $post_data ) && isset( $post_data->ID ) ) {

			if ( class_exists( '\Elementor\Plugin' ) && did_action( 'elementor/loaded' ) && \Elementor\Plugin::$instance->documents->get( $post_data->ID )->is_built_with_elementor() ) {

				echo penci_get_elementor_content( $post_data->ID );

			} else {
				$builder_content = get_post( $post_data->ID );
				echo '<div class="js-composer-content">';
				echo do_shortcode( $builder_content->post_content );

				$shortcodes_custom_css = get_post_meta( $post_data->ID, '_wpb_shortcodes_custom_css', true );

				echo '<style data-type="vc_shortcodes-custom-css">';
				if ( ! empty( $shortcodes_custom_css ) ) {
					echo $shortcodes_custom_css;
				}
				echo '</style>';
				echo '</div>';
			}
		}
		?>
    </div>
</div>
<?php get_footer(); ?>
