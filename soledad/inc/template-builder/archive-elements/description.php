<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class PenciArchiveDescription extends \Elementor\Widget_Base {

	public function get_title() {
		return esc_html__( 'Archive - Description', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-text';
	}

	public function get_categories() {
		return [ 'penci-custom-archive-builder' ];
	}

	public function get_keywords() {
		return [ 'archive', 'description' ];
	}

	protected function get_html_wrapper_class() {
		return 'pcab-adesc elementor-widget-' . $this->get_name();
	}

	public function get_name() {
		return 'penci-archive-description';
	}

	protected function register_controls() {

		$this->start_controls_section( 'content_section', [
			'label' => esc_html__( 'General', 'soledad' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'desc_align', [
			'label'     => __( 'Text Align', 'soledad' ),
			'type'      => \Elementor\Controls_Manager::CHOOSE,
			'default'   => 'left',
			'options'   => array(
				'left'   => array(
					'title' => __( 'Left', 'soledad' ),
					'icon'  => 'eicon-text-align-left',
				),
				'center' => array(
					'title' => __( 'Center', 'soledad' ),
					'icon'  => 'eicon-text-align-center',
				),
				'right'  => array(
					'title' => __( 'Right', 'soledad' ),
					'icon'  => 'eicon-text-align-right',
				),
			),
			'toggle'    => true,
			'selectors' => [ '{{WRAPPER}} .penci-category-description.post-entry' => 'text-align:{{VALUE}}' ],
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'color_style', [
			'label' => esc_html__( 'Color & Styles', 'soledad' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'desc_typo',
			'label'    => __( 'Typography for Archive Description', 'soledad' ),
			'selector' => '{{WRAPPER}} .penci-archive-description.post-entry, {{WRAPPER}} .penci-archive-description.post-entry p',
		) );

		$this->add_control( 'text-color', [
			'label'     => 'Text Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .penci-archive-description.post-entry' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'main-text-color', [
			'label'     => 'Link Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .penci-archive-description.post-entry a' => 'color:{{VALUE}} !important' ],
		] );

		$this->add_control( 'main-text-hcolor', [
			'label'     => 'Link Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .penci-archive-description.post-entry a:hover' => 'color:{{VALUE}} !important' ],
		] );

		$this->end_controls_section();

	}

	protected function render() {

		if ( penci_elementor_is_edit_mode() ) {
			$this->preview_content();
		} else {
			$this->builder_content();
		}

	}

	protected function preview_content() {
		?>
        <div class="post-entry penci-category-description penci-archive-description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus consequuntur eius iste mollitia quo
                veritatis, voluptatum. Atque culpa deleniti eligendi est explicabo modi officia optio porro reiciendis
                tempore, ut voluptas!</p>
        </div>
		<?php
	}

	protected function builder_content() {
		if ( is_tag() && tag_description() ) {
			echo '<div class="post-entry penci-archive-description penci-tag-description">' . do_shortcode( tag_description() ) . '</div>';
		} elseif ( is_category() && category_description() ) {
			echo '<div class="post-entry penci-archive-description penci-category-description">' . do_shortcode( category_description() ) . '</div>';
		} elseif ( is_archive() && get_the_archive_description() ) {
			the_archive_description( '<div class="post-entry penci-category-description penci-archive-description penci-acdes-below">', '</div>' );
		}
	}
}
