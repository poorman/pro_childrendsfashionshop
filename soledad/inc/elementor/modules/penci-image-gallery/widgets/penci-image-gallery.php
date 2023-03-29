<?php

namespace PenciSoledadElementor\Modules\PenciImageGallery\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciImageGallery extends Base_Widget {

	public function get_name() {
		return 'penci-image-gallery';
	}

	public function get_title() {
		return penci_get_theme_name('Penci').' '.esc_html__( ' Image Gallery', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}
	
	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'facebook', 'social', 'embed', 'page' );
	}

	protected function register_controls() {
		

		$this->start_controls_section(
			'section_general', array(
				'label' => esc_html__( 'Image Gallery', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'penci_gallery', array(
				'label'      => __( 'Add Images', 'soledad' ),
				'type'       => Controls_Manager::GALLERY,
				'show_label' => false,
			)
		);
		$this->add_control(
			'gallery_style', array(
				'label'   => __( 'Choose Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 's1',
				'options' => array(
					's1'            => esc_html__( 'Style 1 ( Grid )', 'soledad' ),
					's2'            => esc_html__( 'Style 2 ( Mixed )', 'soledad' ),
					's3'            => esc_html__( 'Style 3 ( Mixed 2 )', 'soledad' ),
					'justified'     => esc_html__( 'Style 4 ( Justified )', 'soledad' ),
					'masonry'       => esc_html__( 'Style 5 ( Masonry )', 'soledad' ),
					'single-slider' => esc_html__( 'Style 6 ( Slider )', 'soledad' ),
				)
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), array(
				'name'      => 'penci_img',
				'exclude'   => array( 'custom' ),
				'separator' => 'none',
				'default'   => 'medium_large',
				'condition' => array( 'gallery_style' => array( 's1','s2','s3' ) ),
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(), array(
				'name'      => 'penci_img_bitem',
				'label'   => __( 'Image Size for Big Items', 'soledad' ),
				'exclude'   => array( 'custom' ),
				'separator' => 'none',
				'default'   => 'large',
				'condition' => array( 'gallery_style' => array( 's2','s3' ) ),
			)
		);

		$this->add_control(
			'penci_img_type', array(
				'label'                => esc_html__( 'Image Type', 'soledad' ),
				'type'                 => Controls_Manager::SELECT,
				'default'              => 'landscape',
				'options'              => array(
					''          => __( '-- Default --', 'soledad' ),
					'landscape' => __( 'Landscape', 'soledad' ),
					'vertical'  => __( 'Vertical', 'soledad' ),
					'square'    => __( 'Square', 'soledad' ),
					'custom'     => esc_html__( 'Custom', 'soledad' ),
				),
				'selectors_dictionary' => array(
					'landscape' => '66.6667%',
					'vertical'  => '135.4%',
					'square'    => '100%',
				),
				'selectors'            => array( '{{WRAPPER}} .penci-image-holder:before' => ' padding-top: {{VALUE}}' ),
				'condition' => array( 'gallery_style' => array( 's1','s2','s3' ) ),
			)
		);

		$this->add_responsive_control(
			'penci_featimg_ratio', array(
				'label'          => __( 'Image Ratio', 'soledad' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => array( 'size' => 0.66 ),
				'tablet_default' => array( 'size' => '' ),
				'mobile_default' => array( 'size' => 0.5 ),
				'range'          => array( 'px' => array( 'min' => 0.1, 'max' => 2, 'step' => 0.01 ) ),
				'selectors'      => array(
					'{{WRAPPER}} .penci-image-holder:before' => 'padding-top: calc( {{SIZE}} * 100% );',
				),
				'condition'      => array( 'penci_img_type' => 'custom' ),
			)
		);

		$this->add_control(
			'caption_source', array(
				'label'   => __( 'Caption', 'elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'none'       => __( 'None', 'elementor' ),
					'attachment' => __( 'Attachment Caption', 'elementor' ),
				),
				'default' => 'attachment',
			)
		);

		$this->add_responsive_control(
			'gallery_columns', array(
				'label'          => __( 'Columns', 'soledad' ),
				'type'           => Controls_Manager::SELECT,
				'default'        => '3',
				'tablet_default' => '2',
				'mobile_default' => '1',
				'options'        => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'condition'      => array( 'gallery_style' => array( 's1', 'masonry' ) ),
			)
		);
		$this->add_control(
			'row_gap', array(
				'label'     => __( 'Rows Gap', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}}  .pencisc-grid' => 'grid-row-gap: {{SIZE}}px' ),
				'condition' => array( 'gallery_style' => array( 's1' ) ),
			)
		);
		$this->add_responsive_control(
			'col_gap', array(
				'label'     => __( 'Columns Gap', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}}  .pencisc-grid' => 'grid-column-gap: {{SIZE}}px' ),
				'condition' => array( 'gallery_style' => array( 's1' ) ),
			)
		);

		$this->add_control(
			'gallery_height', array(
				'label'     => __( 'Custom the height of images', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '',
				'condition' => array( 'gallery_style' => array( 'justified', 'masonry' ) ),

			)
		);
		$this->add_control(
			'slider_autoplay', array(
				'label'     => __( 'Autoplay', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => array( 'gallery_style' => array( 'single-slider' ) ),
			)
		);


		$this->end_controls_section();
		$this->register_block_title_section_controls();

		// Design
		$this->start_controls_section(
			'section_design_content',
			array(
				'label' => __( 'Gallery', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'p_icon_color',
			array(
				'label'     => __( 'Icon Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-gallery-item i' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'p_icon_size', array(
				'label'      => __( 'Icon Size', 'soledad' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'size_units' => array( 'px' ),
				'selectors'  => array( '{{WRAPPER}} .penci-gallery-item i' => 'font-size: {{SIZE}}{{UNIT}};' ),
			)
		);
		$this->add_control(
			'p_overlay_bgcolor',
			array(
				'label'     => __( 'Overlay Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-gallery-item a::after' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->end_controls_section();
		$this->register_block_title_style_section_controls();

	}

	/**
	 * Get image sizes.
	 *
	 * Retrieve available image sizes after filtering `include` and `exclude` arguments.
	 */
	public function get_list_image_sizes( $default = false ) {
		$wp_image_sizes = $this->get_all_image_sizes();

		$image_sizes = array();

		if ( $default ) {
			$image_sizes[''] = esc_html__( 'Default', 'soledad' );
		}

		foreach ( $wp_image_sizes as $size_key => $size_attributes ) {
			$control_title = ucwords( str_replace( '_', ' ', $size_key ) );
			if ( is_array( $size_attributes ) ) {
				$control_title .= sprintf( ' - %d x %d', $size_attributes['width'], $size_attributes['height'] );
			}

			$image_sizes[ $size_key ] = $control_title;
		}

		$image_sizes['full'] = esc_html__( 'Full', 'soledad' );

		return $image_sizes;
	}

	public function get_all_image_sizes() {
		global $_wp_additional_image_sizes;

		$default_image_sizes = [ 'thumbnail', 'medium', 'medium_large', 'large' ];

		$image_sizes = [];

		foreach ( $default_image_sizes as $size ) {
			$image_sizes[ $size ] = [
				'width'  => (int) get_option( $size . '_size_w' ),
				'height' => (int) get_option( $size . '_size_h' ),
				'crop'   => (bool) get_option( $size . '_crop' ),
			];
		}

		if ( $_wp_additional_image_sizes ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}

		return $image_sizes;
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( ! $settings['penci_gallery'] ) {
			return;
		}

		$style_gallery        = $settings['gallery_style'];
		$penci_img_size       = $settings['penci_img_size'];
		$penci_img_size_bitem = $settings['penci_img_bitem_size'];
		$penci_img_type       = $settings['penci_img_type'];

		$css_class = 'penci-block-vc penci-image-gallery';
		$css_class .= ' penci-image-gallery-' . $style_gallery;

		if ( 's1' == $style_gallery ) {
			$column_desktop = isset( $settings['gallery_columns'] ) && $settings['gallery_columns'] ? $settings['gallery_columns'] : '3';
			$column_tablet = isset( $settings['gallery_columns_tablet'] ) && $settings['gallery_columns_tablet'] ? $settings['gallery_columns_tablet'] : '2';
			$column_mobile = isset( $settings['gallery_columns_mobile'] ) && $settings['gallery_columns_mobile'] ? $settings['gallery_columns_mobile'] : '1';
			$css_class .= ' pencisc-grid-' . $column_desktop;
			$css_class .= ' pencisc-grid-tablet-' . $column_tablet;
			$css_class .= ' pencisc-grid-mobile-' . $column_mobile;
		}

		if( 'attachment' != $settings['caption_source'] ) {
			$css_class .= ' penci-image-not-caption';
		}

		$images    = wp_list_pluck( $settings['penci_gallery'], 'id' );
		$total_img = is_array( $images ) ? count( (array) $images ) : 0;

		$block_id = 'penci-image_gallery_' . rand( 1000, 100000 );

		?>
		<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<div class="penci-block_content <?php echo esc_attr( 's1' == $style_gallery ? ' pencisc-grid' : '' ); ?>">
				<?php
				$gal_2_i = $gal_count = 0;

				if ( 's2' == $style_gallery ) {
					foreach ( $images as $image_key => $image_item ) {
						$gal_count ++;
						$gal_2_i ++;

						if ( $image_item < 0 ) {
							continue;
						}

						$class_item         = 'penci-gallery-small-item';
						$penci_img_size_pre = $penci_img_size;
						if ( $gal_count == 1 ) {
							$penci_img_size_pre = $penci_img_size_bitem;
							$class_item         = 'penci-gallery-big-item';
						}
						echo \Penci_Vc_Helper::get_image_holder_gal( $image_item, $penci_img_size_pre, $penci_img_type, true, $gal_count, $class_item, $settings['caption_source'] );

						if ( $gal_count == 1 ) {
							echo '<div class="penci-post-smalls">';
						}

						if ( 5 == $gal_count || $gal_2_i == $total_img ) {
							$gal_count = 0;
							echo '</div>';
						}
					}
				} elseif ( 's3' == $style_gallery ) {
					foreach ( $images as $image_key => $image_item ) {
						$gal_count ++;
						$gal_2_i ++;

						if ( $image_item < 0 ) {
							continue;
						}

						$class_item = 'penci-gallery-small-item';
						if ( $gal_count == 1 || $gal_count == 2 ) {
							$penci_img_size = $penci_img_size_bitem;
							$class_item     = 'penci-gallery-big-item';
						}

						echo \Penci_Vc_Helper::get_image_holder_gal( $image_item, $penci_img_size, $penci_img_type, true, $gal_count, $class_item, $settings['caption_source'] );

						if ( 5 == $gal_count || $gal_2_i == $total_img ) {
							$gal_count = 0;
						}
					}
				} elseif ( 'justified' == $style_gallery || 'masonry' == $style_gallery || 'single-slider' == $style_gallery ) {
					$data_height = '150';

					if ( is_numeric( $settings['gallery_height'] ) && 60 < $settings['gallery_height'] ) {
						$data_height = $settings['gallery_height'];
					}

					echo '<div class="penci-post-gallery-container ' . $style_gallery . ' column-' . $settings['gallery_columns'] . '" data-height="' . $data_height . '" data-margin="3">';

					if ( 'masonry' == $style_gallery ) {
						echo '<div class="inner-gallery-masonry-container">';
					}

					if ( 'single-slider' == $style_gallery ) {
						echo '<div class="penci-owl-carousel penci-owl-carousel-slider penci-nav-visible" data-auto="' . ( 'yes' == $settings['slider_autoplay'] ? 'true' : 'false' ) . '" data-lazy="true">';
					}

					$posts = get_posts( array( 'include' => $images, 'post_type' => 'attachment',  'orderby'   => 'post__in' ) );

					if ( $posts ) {
						foreach ( $posts as $imagePost ) {
							$caption       = '';
							$gallery_title = '';
							if ( $imagePost->post_excerpt ):
								$caption = $imagePost->post_excerpt;
							endif;

							if ( $caption && 'attachment' == $settings['caption_source'] ) {
								$gallery_title = ' data-cap="' . esc_attr( $caption ) . '"';
							}

							$get_full    = wp_get_attachment_image_src( $imagePost->ID, 'full' );
							$get_masonry = wp_get_attachment_image_src( $imagePost->ID, 'penci-masonry-thumb' );
							$thumbsize = 'penci-masonry-thumb';

							$image_alt        = penci_get_image_alt( $imagePost->ID, get_the_ID() );
							$image_title_html = penci_get_image_title( $imagePost->ID );

							$class_a_item = 'penci-gallery-ite';
							if ( 'masonry' != $style_gallery ) {
								$class_a_item = 'penci-gallery-ite item-gallery-' . $style_gallery;
							}
							
							if( $style_gallery == 'masonry' || $style_gallery == 'single-slider' ){
								$class_a_item .= ' item-link-relative';
							}

							if ( 'single-slider' == $style_gallery ) {
								echo '<figure>';
								$get_masonry = wp_get_attachment_image_src( $imagePost->ID, 'penci-full-thumb' );
								$thumbsize = 'penci-full-thumb';
							}
							if ( 'masonry' == $style_gallery ) {
								echo '<div class="item-gallery-' . $style_gallery . '">';
							}
							echo '<a class="' . $class_a_item . ( 'attachment' != $settings['caption_source'] ? ' added-caption' : '' ) . '" href="' . $get_full[0] . '"' . $gallery_title . ' data-rel="penci-gallery-image-content" data-idwrap="' .  esc_attr( $block_id ) . '">';

							if ( 'masonry' == $style_gallery ) {
								echo '<div class="inner-item-masonry-gallery">';
							}
							
							if( $style_gallery == 'masonry' || $style_gallery == 'single-slider' ){
								echo penci_get_ratio_img_basedid( $imagePost->ID, $thumbsize );
							}
							
							echo '<img src="' . $get_masonry[0] . '" alt="' . $image_alt . '"' . $image_title_html . '>';

							if ( $style_gallery == 'justified' && $caption && 'attachment' == $settings['caption_source'] ) {
								echo '<div class="caption">' . wp_kses( $caption, array( 'em' => array(), 'strong' => array(), 'b' => array(), 'i' => array() ) ) . '</div>';
							}
							if ( 'masonry' == $style_gallery ) {
								echo '</div>';
							}

							echo '</a>';

							// Close item-gallery-' . $style_gallery . '-wrap
							if ( 'masonry' == $style_gallery ) {
								echo '</div>';
							}

							if ( 'single-slider' == $style_gallery ) {
								if ( $caption && 'attachment' == $settings['caption_source'] ) {
									echo '<p class="penci-single-gallery-captions">' . $caption . '</p>';
								}
								echo '</figure>';
							}
						}
					}

					if ( 'masonry' == $style_gallery || 'single-slider' == $style_gallery ) {
						echo '</div>';
					}
					echo '</div>';
				} else {
					foreach ( $images as $image_key => $image_item ) {
						$gal_count ++;
						$gal_2_i ++;

						if ( $image_item < 0 ) {
							continue;
						}
						echo \Penci_Vc_Helper::get_image_holder_gal( $image_item, $penci_img_size, $penci_img_type, true, $gal_count, '', $settings['caption_source'] );
					}
				}
				?>
			</div>
		</div>
		<?php
	}
}
