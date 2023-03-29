<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


class PenciSingleTaxonomy extends \Elementor\Widget_Base {

	public function get_name() {
		return 'penci-single-taxonomy';
	}

	public function get_title() {
		return esc_html__( 'Post - Taxonomy', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-folder-o';
	}

	public function get_categories() {
		return [ 'penci-single-builder' ];
	}

	public function get_keywords() {
		return [ 'single', 'taxonomy' ];
	}

	protected function register_controls() {

		$this->start_controls_section( 'content_section', [
				'label' => esc_html__( 'General', 'soledad' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			] );

		$post_taxonomies = get_object_taxonomies( 'post' );
		$post_tax        = [];
		$post_tax['']    = 'Select';
		foreach ( $post_taxonomies as $tname ) {
			$labels             = get_taxonomy( $tname );
			$post_tax[ $tname ] = $labels->label;
		}

		foreach ( penci_get_published_posttypes() as $type ) {

			$type_data = get_object_taxonomies( $type );
			if ( is_array( $type_data ) ) {
				foreach ( $type_data as $type_name ) {
					$labels                 = get_taxonomy( $type_name );
					$post_tax[ $type_name ] = $labels->label;
				}
			}
		}

		$this->add_control( 'term_name', [
				'label'   => 'Taxonomies',
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $post_tax,
				'default' => '',
			] );

		$this->add_control( 'term_style', [
				'label'   => 'Display Style',
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 's1',
				'options' => [
					's1' => 'Style 1',
					's2' => 'Style 2',
					's3' => 'Style 3',
					's4' => 'Style 4',
				]
			] );

		$this->add_control( 'tax_align', [
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
				'selectors' => [ '{{WRAPPER}} .pctmp-term-list' => 'text-align:{{VALUE}}' ],
			] );

		$this->add_control( 'term_link', [
				'label'     => 'Show Taxonomy as Text',
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'soledad' ),
				'label_off' => __( 'Hide', 'soledad' ),
				'default'   => '',
			] );

		$this->add_control( 'term_text', [
				'label'   => 'Show Label Text',
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			] );

		$this->add_control( 'term_divider', [
				'label'     => 'Show Icon Divider',
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Show', 'soledad' ),
				'label_off' => __( 'Hide', 'soledad' ),
			] );

		$this->add_control( 'term_divider_icon', [
				'label'     => 'Divider Icon',
				'type'      => \Elementor\Controls_Manager::ICONS,
				'default'   => [
					'value'   => 'far fa-circle',
					'library' => 'fa-regular',
				],
				'condition' => [ 'term_divider' => 'yes' ],
			] );

		$this->add_control( 'divider_icon_size', [
				'label'     => 'Divider Icon Size',
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'default'   => array( 'size' => '7' ),
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 20, ) ),
				'selectors' => array( '{{WRAPPER}} .divider-icon' => 'font-size: {{SIZE}}px;' ),
				'condition' => [ 'term_divider' => 'yes' ],
			] );

		$this->add_control( 'term_spacing', [
				'label'     => 'Spacing Between Taxonomy Terms',
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .pctmp-term-item' => 'margin-right: {{SIZE}}px;margin-left: {{SIZE}}px' ),
			] );

		$this->end_controls_section();

		$this->start_controls_section( 'content_label', [
				'label'     => esc_html__( 'Label Settings', 'soledad' ),
				'tab'       => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [ 'term_text' => 'yes' ],
			] );

		$this->add_control( 'label_text', [
				'label'   => 'Label Text',
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => '',
			] );

		$this->add_control( 'label_enable_icon', [
				'label'   => 'Show Icon Before Lable Text?',
				'type'    => \Elementor\Controls_Manager::SWITCHER,
				'default' => '',
			] );

		$this->add_control( 'label_icon_display', [
				'label'     => 'Label Icon',
				'type'      => \Elementor\Controls_Manager::ICONS,
				'condition' => [ 'label_enable_icon' => 'yes' ],
				'default'   => [
					'value'   => 'far fa-tags',
					'library' => 'fa-regular',
				]
			] );

		$this->add_control( 'label_spacing', [
				'label'     => 'Label Spacing',
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .pctmp-term-list .term-labels' => 'margin-right: {{SIZE}}px' ),
			] );

		$this->end_controls_section();

		$this->start_controls_section( 'color_style', [
				'label' => esc_html__( 'Color & Styles', 'soledad' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
				'name'     => 'term_typo',
				'label'    => __( 'Typography for Term', 'soledad' ),
				'selector' => '{{WRAPPER}} .pctmp-term-item',
			) );

		$this->add_control( 'term_color', [
				'label'     => 'Term Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .pctmp-term-item' => 'color:{{VALUE}}' ],
			] );

		$this->add_control( 'term_hcolor', [
				'label'     => 'Term Hover Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} a.pctmp-term-item:hover' => 'color:{{VALUE}}' ],
			] );

		$this->add_control( 'term_bgcolor', [
				'label'     => 'Term Background Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .pctmp-term-item' => 'background-color:{{VALUE}}' ],
			] );

		$this->add_control( 'term_bghcolor', [
				'label'     => 'Term Background Hover Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} a.pctmp-term-item:hover' => 'background-color:{{VALUE}}' ],
			] );

		$this->add_control( 'term_bcolor', [
				'label'     => 'Term Background Borders Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .pctmp-term-item' => 'border-color:{{VALUE}}' ],
			] );

		$this->add_control( 'term_bhcolor', [
				'label'     => 'Term Background Borders Hover Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} a.pctmp-term-item:hover' => 'border-color:{{VALUE}}' ],
			] );

		$this->add_control( 'term_padding', [
				'label'      => 'Term Item Padding',
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .pctmp-term-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			] );

		$this->add_control( 'term_border', [
				'label'      => 'Term Item Border',
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .pctmp-term-item' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			] );

		$this->add_control( 'term_border_style', [
				'label'     => 'Term Borders Style',
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => [
					'dotted' => 'Dotted',
					'dashed' => 'Dashed',
					'solid'  => 'Solid',
					'double' => 'Double',
					'groove' => 'Groove',
					'ridge'  => 'Ridge',
					'inset'  => 'Inset',
					'outset' => 'Outset',
				],
				'selectors' => [ '{{WRAPPER}} .pctmp-term-item' => 'border-style:{{VALUE}}' ],
			] );

		$this->add_control( 'term_border_radius', [
				'label'      => 'Term Item Borders Radius',
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .pctmp-term-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			] );

		$this->add_control( 'divider_color', [
				'label'     => 'Divider Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .divider-icon' => 'color:{{VALUE}}' ],
				'condition' => [ 'term_divider' => 'yes' ],
			] );

		$this->end_controls_section();

		$this->start_controls_section( 'style_label', [
				'label'     => esc_html__( 'Label Style', 'soledad' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [ 'term_text' => 'yes' ],
			] );

		$this->add_control( 'icon_color', [
				'label'     => 'Icon Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .term-labels i' => 'color:{{VALUE}}' ],
			] );

		$this->add_responsive_control( 'icon_size', [
				'label'     => 'Icon Size',
				'type'      => \Elementor\Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => [ '{{WRAPPER}} .term-labels i' => 'font-size:{{SIZE}}px' ],
			] );

		$this->add_control( 'label_style', [
				'label'   => 'Label Style',
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => 'Default',
					's1'      => 'Style 1',
					's2'      => 'Style 2',
					's3'      => 'Style 3',
					's4'      => 'Style 4',
				]
			] );

		$this->add_group_control( \Elementor\Group_Control_Typography::get_type(), array(
				'name'     => 'label_typo',
				'label'    => __( 'Typography for Label', 'soledad' ),
				'selector' => '{{WRAPPER}} .term-labels',
			) );

		$this->add_control( 'label_color', [
				'label'     => 'Label Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .term-labels' => 'color:{{VALUE}}' ],
			] );

		$this->add_control( 'label_bgcolor', [
				'label'     => 'Label Background Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .term-labels' => 'background-color:{{VALUE}}' ],
			] );

		$this->add_control( 'label_bcolor', [
				'label'     => 'Label Background Borders Color',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [ '{{WRAPPER}} .pctmp-term-item' => 'border-color:{{VALUE}}' ],
			] );

		$this->add_control( 'label_padding', [
				'label'      => 'Label Item Padding',
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .term-labels' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			] );

		$this->add_control( 'label_border', [
				'label'      => 'Label Item Border',
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .term-labels' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			] );

		$this->add_control( 'label_border_style', [
				'label'     => 'Label Borders Style',
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => [
					'dotted' => 'Dotted',
					'dashed' => 'Dashed',
					'solid'  => 'Solid',
					'double' => 'Double',
					'groove' => 'Groove',
					'ridge'  => 'Ridge',
					'inset'  => 'Inset',
					'outset' => 'Outset',
				],
				'selectors' => [ '{{WRAPPER}} .term-labels' => 'border-style:{{VALUE}}' ],
			] );

		$this->add_control( 'label_border_radius', [
				'label'      => 'Label Item Borders Radius',
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .term-labels' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
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
		$settings          = $this->get_settings_for_display();
		$term_text         = $settings['term_text'];
		$label_text        = $settings['label_text'];
		$term_link         = $settings['term_link'];
		$label_enable_icon = $settings['label_enable_icon'];
		$label_icon        = $settings['label_icon_display'];
		$before            = 'a href="#"';
		$after             = 'a';
		$divider           = $settings['term_divider'];
		$divider_icon      = $settings['term_divider_icon'];
		$term_style        = $settings['term_style'];
		$label_style       = $settings['label_style'];
		if ( $term_link ) {
			$before = $after = 'span';
		}
		?>
        <div class="pctmp-term-list term-style-<?php echo esc_attr( $term_style ); ?> label-style-<?php echo esc_attr( $label_style ); ?>">
			<?php if ( $term_text && $label_text ) : ?>
                <span class="term-labels">
                <?php if ( $label_icon && $label_enable_icon ): ?>
	                <?php \Elementor\Icons_Manager::render_icon( $label_icon ); ?>
                <?php endif; ?>
                <?php echo $label_text; ?>
            </span>
			<?php endif;
			$demo_terms  = [
				'Animal',
				'World',
				'Miami',
				'Tini',
				'Coast',
			];
			$i           = 0;
			$total_items = count( $demo_terms );
			foreach ( $demo_terms as $term ) {
				echo '<' . $before . ' class="pctmp-term-item">' . $term . '</' . $after . '>';
				if ( $divider && $divider_icon && $i ++ < ( $total_items - 1 ) ) {
					echo '<span class="divider-icon">';
					\Elementor\Icons_Manager::render_icon( $divider_icon );
					echo '</span>';
				}
			}
			?>
        </div>
		<?php
	}

	protected function builder_content() {
		$settings          = $this->get_settings();
		$term_name         = $settings['term_name'];
		$term_text         = $settings['term_text'];
		$label_text        = $settings['label_text'];
		$term_link         = $settings['term_link'];
		$label_enable_icon = $settings['label_enable_icon'];
		$label_icon        = $settings['label_icon_display'];
		$divider           = $settings['term_divider'];
		$divider_icon      = $settings['term_divider_icon'];
		$terms             = wp_get_post_terms( get_the_ID(), $term_name );
		$term_style        = $settings['term_style'];
		$label_style       = $settings['label_style'];
		if ( $terms ) {
			?>
            <div class="pctmp-term-list term-style-<?php echo esc_attr( $term_style ); ?> label-style-<?php echo esc_attr( $label_style ); ?>">
				<?php if ( $term_text && $label_text ) : ?>
                    <span class="term-labels">
                <?php if ( $label_icon && $label_enable_icon ): ?>
	                <?php \Elementor\Icons_Manager::render_icon( $label_icon ); ?>
                <?php endif; ?>
                <?php echo $label_text; ?>
            </span>
				<?php endif;
				$terms       = wp_get_post_terms( get_the_ID(), $term_name );
				$i           = 0;
				$total_items = count( $terms );
				foreach ( $terms as $term ) {
					if ( $term_link ) {
						echo '<span class="pctmp-term-item">' . $term->name . '</span>';
					} else {
						echo '<a href="' . get_term_link( $term ) . '" class="pctmp-term-item">' . $term->name . '</a>';
					}

					if ( $divider && $divider_icon && $i ++ < ( $total_items - 1 ) ) {
						echo '<span class="divider-icon">';
						\Elementor\Icons_Manager::render_icon( $divider_icon );
						echo '</span>';
					}
				}

				?>
            </div>
			<?php
		}
	}
}
