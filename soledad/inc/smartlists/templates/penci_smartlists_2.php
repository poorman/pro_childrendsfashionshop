<?php


class Penci_SmartLists_Style_2 extends Penci_SmartLists {
	protected $atts = array();

	function __construct( $atts ) {
		$this->atts = $atts;
	}

	protected function render_before_list_wrap() {
		return '<div class="pcsml_style_2">';
	}


	protected function render_list_item( $item_array, $current_item_id, $current_item_number, $total_items_number ) {

		$sm_title_tag = isset( $this->atts['sm_title_tag'] ) && $this->atts['sm_title_tag'] ? $this->atts['sm_title_tag'] : apply_filters( 'sm_title_tag', 'h2' );

		$content = '';

		//creating each slide
		$content .= '<div class="pcsml-item">';

		//get the title
		$smart_list_2_title = '';
		if ( ! empty( $item_array['title'] ) ) {
			$smart_list_2_title = $item_array['title'];
		}

		//adding description
		if ( ! empty( $item_array['description'] ) ) {

			$item_array['description'] = preg_replace( '/<(div)\b([^>]*?)(attachment_' . $item_array['first_img_id'] . ')([^>]*?)>(.*?)<\/div>/', '', $item_array['description'] );

			$content .= '<div class="pcsml-info">';
			$content .= '<div class="pcsml-title-wrapper">';
			$content .= '<' . $sm_title_tag . '>';
			$content .= '<div class="pcsml-item-number"><span>' . $current_item_number . '</span></div>';
			$content .= '<span class="pcsml-item-title">' . $smart_list_2_title . '</span>';
			$content .= '</' . $sm_title_tag . '>';
			$content .= '</div>';

			$content .= '<div class="pcsml-desc">' . $item_array['description'] . '</div>';
			$content .= '</div>';
		}


		//get image link target
		$first_img_link_target = $item_array['first_img_link_target'];

		$first_image_size = get_theme_mod( 'penci_single_custom_thumbnail_size' ) ? get_theme_mod( 'penci_single_custom_thumbnail_size' ) : 'thumbnail';
		if ( isset( $this->atts['first_image_size'] ) && $this->atts['first_image_size'] != '' ) {
			$first_image_size = $this->atts['first_image_size'];
		}

		if ( isset( $this->atts['first_image_msize'] ) && $this->atts['first_image_msize'] != '' && penci_is_mobile() ) {
			$first_image_size = $this->atts['first_image_msize'];
		}

		$first_img_src = wp_get_attachment_image_url( $item_array['first_img_id'], $first_image_size );

		$first_img_info = wp_get_attachment_image_src( $item_array['first_img_id'], $first_image_size );

		//image caption
		$first_img_caption = $item_array['first_img_caption'];

		//image alt
		$first_img_alt = get_post_meta( $item_array['first_img_id'], '_wp_attachment_image_alt', true );

		if ( ! empty( $first_img_info[0] ) ) {

			// class used by magnific popup
			$smart_list_lightbox = " penci-lightbox";

			// if a custom link is set use it
			if ( ! empty( $item_array['first_img_link'] ) && $first_img_src != $item_array['first_img_link'] ) {
				$first_img_src = $item_array['first_img_link'];

				// remove the magnific popup class for custom links
				$smart_list_lightbox = "";
			}

			if ( $this->atts['disablelazy'] ) {
				$img_html = '<img src="' . $first_img_info[0] . '" alt="' . $first_img_alt . '"/>';
			} else {
				$image_width  = $first_img_info[1];
				$image_height = $first_img_info[2];
				$img_html     = '<img width="' . $image_width . '" height="' . $image_height . '" class="penci-lazy" src="' . penci_holder_image_base( $image_width, $image_height ) . '" data-src="' . $first_img_info[0] . '" alt="' . $first_img_alt . '"/>';
			}

			$content .= '<div class="pcsml-figure-wrapper">';
			$content .= '<figure class="pcsml-figure' . $smart_list_lightbox . '">';
			$content .= '<a class="pcsml-image-link" href="' . $first_img_src . '" data-caption="' . $first_img_caption . '" ' . $first_img_link_target . '>';
			$content .= $img_html;
			$content .= '</a>';
			$content .= '</figure>';

			if ( ! empty( $first_img_caption ) ) {
				$content .= '<figcaption class="pcsml-caption"><div>' . $first_img_caption . '</div></figcaption>';
			}
			$content .= '</div>';
		}

		$content .= '</div>';

		return $content;
	}


	protected function render_after_list_wrap() {
		return '</div>';
	}
}