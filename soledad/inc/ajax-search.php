<?php
if ( ! function_exists( 'penci_ajax_search_assets' ) ) {
	add_action( 'wp_enqueue_scripts', 'penci_ajax_search_assets' );
	function penci_ajax_search_assets() {

		if ( ! get_theme_mod( 'penci_ajxs_enable' ) ) {
			return;
		}

		wp_register_script( 'penci-autocomplete', get_template_directory_uri() . '/js/jquery.autocomplete.min.js', '', PENCI_SOLEDAD_VERSION, true );
		wp_register_script( 'penci-ajaxsearch', get_template_directory_uri() . '/js/ajax-search.js', [
			'penci-autocomplete',
			'jquery'
		], PENCI_SOLEDAD_VERSION, true );
		wp_localize_script( 'penci-ajaxsearch', 'penci_ajsr', array(
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			'minchar'    => (int) get_theme_mod( 'penci_ajxs_character', 2 ),
			'maxitems'   => (int) get_theme_mod( 'penci_ajxs_count', get_option( 'posts_per_page' ) ),
			'citems'     => (boolean) get_theme_mod( 'penci_ajxs_count' ),
			'thumbnail'  => (bool) get_theme_mod( 'penci_ajxs_thumb', true ),
			'date'       => (bool) get_theme_mod( 'penci_ajxs_date', true ),
			'allresults' => penci_get_setting( 'penci_trans_allresult' ),
			'nonce'      => wp_create_nonce( 'penci_search_ajax_nonce' ),
		) );
	}
}
if ( ! function_exists( 'penci_search_form' ) ) {
	function penci_search_form( $args = array() ) {
		$args = wp_parse_args( $args, array(
			'ajax'                   => get_theme_mod( 'penci_ajxs_enable' ),
			'post_type'              => 'post',
			'show_categories'        => false,
			'type'                   => 'form',
			'thumbnail'              => true,
			'price'                  => true,
			'count'                  => get_option( 'posts_per_page' ),
			'icon_type'              => '',
			'search_style'           => '',
			'custom_icon'            => '',
			'el_classes'             => '',
			'innerclass'             => '',
			'innerclass_css'         => 'inner-hbg-search-form',
			'wrapper_custom_classes' => '',
		) );

		extract( $args );

		if ( $ajax ) {

			ob_start();

			$class             = '';
			$btn_classes       = '';
			$data              = '';
			$wrapper_classes   = '';
			$dropdowns_classes = '';

			if ( $show_categories && $post_type == 'product' ) {
				$class .= ' penci-with-cat has-categories-dropdown';
			}

			if ( $icon_type == 'custom' ) {
				$btn_classes .= ' penci-with-img penci-searchform-custom-icon';
			}

			if ( $search_style ) {
				$class .= ' search-style-' . $search_style;
			}

			$ajax_args = array(
				'thumbnail'     => $thumbnail,
				'price'         => $price,
				'post_type'     => $post_type,
				'count'         => $count,
				'sku'           => '1',
				'symbols_count' => 3,
			);

			if ( $ajax ) {
				$class .= ' penci-ajax-search';
				foreach ( $ajax_args as $key => $value ) {
					$data .= ' data-' . $key . '="' . $value . '"';
				}
			}

			$placeholder = penci_get_setting( 'penci_trans_type_and_hit' );

			switch ( $post_type ) {
				case 'product':
					$description = penci_get_setting( 'penci_trans_sepproduct_desc' );
					break;

				case 'portfolio':
					$description = penci_get_setting( 'penci_trans_sepproject_desc' );
					break;

				default:
					$description = penci_get_setting( 'penci_trans_seppost_desc' );
					break;
			}

			if ( $el_classes ) {
				$class .= ' ' . $el_classes;
			}

			if ( $wrapper_custom_classes ) {
				$wrapper_classes .= ' ' . $wrapper_custom_classes;
			}

			if ( 'dropdown' === $type ) {
				$wrapper_classes .= ' penci-dropdown';
			}

			if ( 'full-screen' === $type ) {
				$wrapper_classes .= ' penci-fill';
			} else {
				$dropdowns_classes .= ' penci-dropdown';
			}

			$wrapper_classes   .= ' penci-search-' . $type;
			$dropdowns_classes .= ' penci-search-results';

			$autocompleted = $ajax ? ' autocomplete="off"' : '';

			?>
            <div class="penci-search-<?php echo esc_attr( $type ); ?><?php echo esc_attr( $wrapper_classes ); ?>">
				<?php if ( $type == 'full-screen' ): ?>
                    <span class="penci-close-search penci-action-btn penci-style-icon penci-cross-icon"><a></a></span>
				<?php endif ?>
                <form<?php echo $autocompleted; ?> role="search" method="get"
                                                   class="pc-searchform searchform <?php echo esc_attr( $class ); ?>"
                                                   action="<?php echo esc_url( home_url( '/' ) ); ?>" <?php echo ! empty( $data ) ? $data : ''; ?>>

					<?php if ( $innerclass ) : ?>
                    <div class="<?php echo $args['innerclass_css']; ?>">
						<?php endif; ?>
                        <input type="text" class="s search-input" placeholder="<?php echo esc_attr( $placeholder ); ?>"
                               value="<?php echo get_search_query(); ?>" name="s"
                               aria-label="<?php echo penci_get_setting( 'penci_trans_search' ); ?>"
                               title="<?php echo esc_attr( $placeholder ); ?>"/>
                        <input type="hidden" name="post_type" value="<?php echo esc_attr( $post_type ); ?>">
						<?php
						if ( $icon_type == 'custom' ) {
							echo $custom_icon;
						}
						?>
                        <button type="submit" class="searchsubmit<?php echo esc_attr( $btn_classes ); ?>">
	                            <span>
								<?php echo penci_get_setting( 'penci_trans_search' ); ?>
							</span>
                        </button>
						<?php if ( $innerclass ) : ?>
                    </div>
				<?php endif; ?>

                </form>
				<?php if ( $type == 'full-screen' ): ?>
                    <div class="search-info-text"><span><?php echo esc_html( $description ); ?></span></div>
				<?php endif ?>
				<?php if ( $ajax ): ?>
                    <div class="search-results-wrapper">
                        <div class="penci-dropdown-results penci-scroll<?php echo esc_attr( $dropdowns_classes ); ?>">
                            <div class="penci-search-results-wrapper"></div>
                        </div>

						<?php if ( 'full-screen' === $type ) : ?>
                            <div class="penci-search-loader"></div>
						<?php endif; ?>
                    </div>
				<?php endif ?>
            </div>
			<?php

			echo apply_filters( 'get_search_form', ob_get_clean() );
			wp_enqueue_script( 'penci-ajaxsearch' );
		} else {
			if ( $args['wrapper_custom_classes'] ) {
				echo '<div class="' . esc_attr( $args['wrapper_custom_classes'] ) . '">';
			}
			?>
            <form role="search" method="get" class="pc-searchform"
                  action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="pc-searchform-inner">
                    <input type="text" class="search-input"
                           placeholder="<?php echo penci_get_setting( 'penci_trans_type_and_hit' ); ?>" name="s"/>
                    <i class="penciicon-magnifiying-glass"></i>
                    <button type="submit"
                            class="searchsubmit"><?php echo penci_get_setting( 'penci_trans_search' ); ?></button>
                </div>
            </form>
			<?php
			if ( $args['wrapper_custom_classes'] ) {
				echo '</div>';
			}
		}
	}
}

/**
 * ------------------------------------------------------------------------------------------------
 * Ajax search
 * ------------------------------------------------------------------------------------------------
 */
if ( ! function_exists( 'penci_ajax_suggestions' ) ) {
	function penci_ajax_suggestions() {

		check_ajax_referer( 'penci_search_ajax_nonce', 'nonce' );

		$allowed_types = array( 'post', 'product', 'portfolio', 'page' );
		$post_type     = 'product';

		$query_args = array(
			'posts_per_page' => 5,
			'post_status'    => 'publish',
			'post_type'      => $post_type,
			'no_found_rows'  => 1,
		);

		if ( ! empty( $_REQUEST['post_type'] ) && in_array( $_REQUEST['post_type'], $allowed_types ) ) {
			$post_type               = strip_tags( $_REQUEST['post_type'] );
			$query_args['post_type'] = $post_type;
		}

		if ( get_theme_mod( 'penci_include_search_page' ) && $post_type != 'product' ) {
			$query_args['post_type'] = [ $query_args['post_type'], 'page' ];
		}

		if ( ! empty( $_REQUEST['query'] ) ) {
			$query_args['s'] = sanitize_text_field( $_REQUEST['query'] );
		}

		if ( ! empty( $_REQUEST['number'] ) ) {
			$query_args['posts_per_page'] = (int) $_REQUEST['number'];
		}

		$results = new WP_Query( apply_filters( 'penci_ajax_search_args', $query_args ) );

		if ( get_theme_mod( 'penci_woo_relevanssi_search' ) && function_exists( 'relevanssi_do_query' ) ) {
			relevanssi_do_query( $results );
		}

		$suggestions = array();

		if ( $results->have_posts() ) {

			if ( $post_type == 'product' ) {
				$factory = new WC_Product_Factory();
			}

			while ( $results->have_posts() ) {
				$results->the_post();

				if ( $post_type == 'product' ) {
					$product = $factory->get_product( get_the_ID() );

					$suggestions[] = array(
						'value'     => html_entity_decode( wp_trim_words( get_the_title(), get_theme_mod( 'penci_ajxs_title_words', 8 ) ) ),
						'title'     => html_entity_decode( get_the_title() ),
						'permalink' => get_the_permalink(),
						'price'     => $product->get_price_html(),
						'thumbnail' => $product->get_image(),
						'sku'       => $product->get_sku() ? penci_get_setting( 'penci_trans_sku' ) . ' ' . $product->get_sku() : '',
					);
				} else {

					$post_format_icon = '';
					$post_format      = get_post_format();
					switch ( $post_format ) {
						case "video":
							$post_format_icon = penci_icon_by_ver( 'fas fa-play', '' );
							break;
						case "audio":
							$post_format_icon = penci_icon_by_ver( 'fas fa-music', '' );
							break;
						case "link":
							$post_format_icon = penci_icon_by_ver( 'fas fa-link', '' );
							break;
						case "quote":
							$post_format_icon = penci_icon_by_ver( 'fas fa-quote-left', '' );
							break;
						case "gallery":
							$post_format_icon = penci_icon_by_ver( 'far fa-image', '' );
							break;
					}

					$post_format_icon = get_theme_mod( 'penci_ajxs_fmat_icon' ) ? $post_format_icon : '';

					$thumb_img     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' ) : get_template_directory_uri() . '/images/no-thumb.jpg';
					$suggestions[] = array(
						'value'     => html_entity_decode( wp_trim_words( get_the_title(), get_theme_mod( 'penci_ajxs_title_words', 8 ) ) ),
						'title'     => html_entity_decode( get_the_title() ),
						'permalink' => get_the_permalink(),
						'date'      => get_the_date(),
						'thumbnail' => '<a data-bgset="' . esc_attr( $thumb_img ) . '" class="penci-image-holder penci-lazy">' . $post_format_icon . '</a>',
					);
				}
			}

			wp_reset_postdata();
		} else {
			$suggestions[] = array(
				'value'     => penci_get_setting( 'penci_trans_npostfound' ),
				'no_found'  => true,
				'permalink' => ''
			);
		}

		if ( get_theme_mod( 'penci_woo_enqueue_posts_results' ) && 'post' !== $post_type ) {
			$post_suggestions = penci_get_post_suggestions();
			$suggestions      = array_merge( $suggestions, $post_suggestions );
		}

		echo json_encode( array(
			'suggestions' => $suggestions,
			'allsearch'   => get_search_link( sanitize_text_field( $_REQUEST['query'] ) ),
		) );

		die();
	}

	add_action( 'wp_ajax_penci_ajax_search', 'penci_ajax_suggestions', 10 );
	add_action( 'wp_ajax_nopriv_penci_ajax_search', 'penci_ajax_suggestions', 10 );
}

if ( ! function_exists( 'penci_get_post_suggestions' ) ) {
	function penci_get_post_suggestions() {
		$query_args = array(
			'posts_per_page' => 5,
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'no_found_rows'  => 1,
		);

		if ( ! empty( $_REQUEST['query'] ) ) {
			$query_args['s'] = sanitize_text_field( $_REQUEST['query'] );
		}

		if ( ! empty( $_REQUEST['number'] ) ) {
			$query_args['posts_per_page'] = (int) $_REQUEST['number'];
		}

		$results     = new WP_Query( $query_args );
		$suggestions = array();

		if ( $results->have_posts() ) {

			$suggestions[] = array(
				'value'   => '',
				'divider' => penci_get_setting( 'penci_trans_resfblog' ),
			);

			while ( $results->have_posts() ) {
				$results->the_post();

				$suggestions[] = array(
					'value'     => html_entity_decode( get_the_title() ),
					'permalink' => get_the_permalink(),
					'thumbnail' => get_the_post_thumbnail( null, 'medium', '' ),
				);
			}

			wp_reset_postdata();
		}

		return $suggestions;
	}
}
