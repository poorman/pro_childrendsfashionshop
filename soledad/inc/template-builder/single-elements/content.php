<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class PenciSingleContent extends \Elementor\Widget_Base {

	public function get_name() {
		return 'penci-single-content';
	}

	public function get_title() {
		return esc_html__( 'Post - Content', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-post-content';
	}

	public function get_categories() {
		return [ 'penci-single-builder' ];
	}

	public function get_keywords() {
		return [ 'single', 'content' ];
	}

	protected function get_html_wrapper_class() {
		return 'pcsb-mct elementor-widget-' . $this->get_name();
	}

	protected function register_controls() {

		$this->start_controls_section( 'content_section', [
			'label' => esc_html__( 'General', 'soledad' ),
			'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		] );

		$this->add_control( 'block_style', [
			'label'       => esc_html__( 'Blockquote Style', 'soledad' ),
			'description' => esc_html__( 'blockquote styles just applies when you use Classic Block or Classic Editor', 'soledad' ),
			'type'        => \Elementor\Controls_Manager::SELECT,
			'default'     => 'style-1',
			'options'     => [
				'style-1' => 'Style 1',
				'style-2' => 'Style 2'
			]
		] );

		$this->end_controls_section();

		$this->start_controls_section( 'color_style', [
			'label' => esc_html__( 'Color & Styles', 'soledad' ),
			'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
		] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
			'name'     => 'heading_typo',
			'label'    => __( 'Typography for General Content', 'soledad' ),
			'selector' => '{{WRAPPER}} .post-entry',
		) );

		$this->add_control( 'main-text-color', [
			'label'     => 'Text Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .post-entry' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'main-link-color', [
			'label'     => 'Link Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .post-entry a' => 'color:{{VALUE}}' ],
		] );

		$this->add_control( 'main-link-hcolor', [
			'label'     => 'Link Hover Color',
			'type'      => \Elementor\Controls_Manager::COLOR,
			'selectors' => [ '{{WRAPPER}} .post-entry a:hover' => 'color:{{VALUE}}' ],
		] );

		for ( $i = 1; $i <= 6; $i ++ ) {
			$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
				'name'     => 'heading_typo_h' . $i,
				'label'    => sprintf( __( 'Typography for H%s', 'soledad' ), $i ),
				'selector' => '{{WRAPPER}} .post-entry h' . $i,
			) );
			$this->add_control( "content_h{$i}_color", [
				'label'     => "H{$i} Color",
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ "{{WRAPPER}} .post-entry h{$i}" => 'color:{{VALUE}}' ],
			] );
		}


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
		$settings    = $this->get_settings_for_display();
		$block_style = $settings['block_style'];
		?>
        <div class="post-entry <?php echo 'blockquote-' . $block_style; ?>">
            <div class="inner-post-entry entry-content" id="penci-post-entry-inner">

				<?php do_action( 'penci_action_before_the_content' ); ?>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor expedita reiciendis veniam
                    voluptatum? Inventore labore quia quisquam repudiandae rerum unde. Accusantium consectetur
                    distinctio eius esse, necessitatibus quos sint tempore.</p>
                <h2>H2 Heading Tag</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor expedita reiciendis veniam
                    voluptatum? Inventore labore quia quisquam repudiandae rerum unde. Accusantium consectetur
                    distinctio eius esse, necessitatibus quos sint tempore.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor expedita reiciendis veniam
                    voluptatum? Inventore labore quia quisquam repudiandae rerum unde. Accusantium consectetur
                    distinctio eius esse, necessitatibus quos sint tempore.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus dolor expedita reiciendis veniam
                    voluptatum? Inventore labore quia quisquam repudiandae rerum unde. Accusantium consectetur
                    distinctio eius esse, necessitatibus quos sint tempore.</p>

				<?php do_action( 'penci_action_after_the_content' ); ?>

                <div class="penci-single-link-pages">
					<?php wp_link_pages(); ?>
                </div>
            </div>
        </div>
		<?php
	}

	protected function builder_content() {
		$settings    = $this->get_settings_for_display();
		$block_style = $settings['block_style'];
		?>
        <article class="post">
            <div class="post-entry <?php echo 'blockquote-' . $block_style; ?>">
                <div class="inner-post-entry entry-content" id="penci-post-entry-inner">

					<?php do_action( 'penci_action_before_the_content' ); ?>

					<?php the_content(); ?>

					<?php do_action( 'penci_action_after_the_content' ); ?>

                    <div class="penci-single-link-pages">
						<?php wp_link_pages(); ?>
                    </div>
                </div>
            </div>
        </article>
		<?php
	}
}
