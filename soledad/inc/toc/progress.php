<?php

use function Soledad\Table_Of_Contents\String\br2;

class SoledadToc_Post {

	private $queriedObjectID;
	private $post;
	private $permalink;
	private $pages = array();
	private $headingLevels = array();
	private $excludedNodes = array();
	private $collision_collector = array();
	private $hasTOCItems = false;

	public function __construct( WP_Post $post, $apply_content_filter = true ) {
		$this->post            = $post;
		$this->permalink       = get_permalink( $post );
		$this->queriedObjectID = get_queried_object_id();
		if ( $apply_content_filter ) {
			$this->applyContentFilter()->process();
		} else {
			$this->process();
		}
	}

	private function process() {
		$this->processPages();

		return $this;
	}

	private function processPages() {

		$split         = preg_split( '/<!--nextpage-->/msuU', $this->post->post_content );
		$pages_content = array();
		if ( is_array( $split ) ) {
			$page = 1;

			foreach ( $split as $content ) {

				$this->extractExcludedNodes( $page, $content );
				$pages_content[ $page ] = array(
					'headings' => $this->extractHeadings( $content ),
					'content'  => $content,
				);
				$page ++;
			}
		}
		$this->pages = $pages_content;
	}

	private function extractExcludedNodes( $page, $content ) {
		if ( ! class_exists( 'TagFilter' ) ) {
			require_once( get_template_directory() . '/inc/toc/tag_filter.php' );
		}
		$tagFilterOptions = TagFilter::GetHTMLOptions();
		// Set custom TagFilter options.
		$tagFilterOptions['charset'] = get_option( 'blog_charset' );
		//$tagFilterOptions['output_mode'] = 'xml';
		$html = TagFilter::Explode( $content, $tagFilterOptions );

		$selectors = apply_filters( 'penci_toc_exclude_by_selector', array( '.penci-toc-exclude-headings' ), $content );
		$nodes     = $html->Find( implode( ',', $selectors ) );
		foreach ( $nodes['ids'] as $id ) {
			//$this->excludedNodes[ $page ][ $id ] = $html->Implode( $id, $tagFilterOptions );
			array_push( $this->excludedNodes, $html->Implode( $id, $tagFilterOptions ) );
		}

	}

	private function extractHeadings( $content ) {
		$matches = array();

		$content = apply_filters( 'penci_toc_extract_headings_content', wptexturize( $content ) );
		// get all headings
		// the html spec allows for a maximum of 6 heading depths
		if ( preg_match_all( '/(<h([1-6]{1})[^>]*>)(.*)<\/h\2>/msuU', $content, $matches, PREG_SET_ORDER ) ) {
			$minimum = absint( get_theme_mod( 'penci_toc_start', 3 ) );
			$this->removeHeadingsFromExcludedNodes( $matches );
			$this->removeHeadings( $matches );
			$this->excludeHeadings( $matches );
			$this->removeEmptyHeadings( $matches );

			if ( count( $matches ) >= $minimum ) {
				$this->alternateHeadings( $matches );
				$this->headingIDs( $matches );
				$this->hasTOCItems = true;
			} else {
				return array();
			}
		}

		return array_values( $matches ); // Rest the array index.
	}

	private function removeHeadingsFromExcludedNodes( &$matches ) {
		foreach ( $matches as $i => $match ) {
			if ( $this->inExcludedNode( "{$match[3]}</h$match[2]>" ) ) {
				unset( $matches[ $i ] );
			}
		}

		return $matches;
	}

	private function inExcludedNode( $string ) {
		foreach ( $this->excludedNodes as $node ) {
			if ( empty( $node ) || empty( $string ) ) {
				return false;
			}
			if ( false !== strpos( $node, $string ) ) {
				return true;
			}
		}

		return false;
	}

	private function removeHeadings( &$matches ) {
		$levels = $this->getHeadingLevels();
		if ( count( $levels ) != 6 ) {
			$new_matches = array();
			//$count       = count( $matches );
			//for ( $i = 0; $i < $count; $i++ ) {
			foreach ( $matches as $i => $match ) {
				if ( in_array( $matches[ $i ][2], $levels ) ) {
					$new_matches[ $i ] = $matches[ $i ];
				}
			}
			$matches = $new_matches;
		}

		return $matches;
	}

	private function getHeadingLevels() {
		$levels = get_post_meta( $this->post->ID, '_penci-toc-heading-levels', true );
		if ( ! is_array( $levels ) ) {
			$levels = array();
		}
		if ( empty( $levels ) ) {
			$levels = get_theme_mod( 'penci_toc_heading_levels', array( '2', '3', '4', '5', '6' ) );
		}
		$this->headingLevels = $levels;

		return $this->headingLevels;
	}

	private function excludeHeadings( &$matches ) {
		$exclude = get_post_meta( $this->post->ID, '_penci-toc-exclude', true );
		if ( empty( $exclude ) ) {
			$exclude = get_theme_mod( 'penci_toc_exclude', '' );
		}
		if ( $exclude ) {
			$excluded_headings = explode( '|', $exclude );
			$excluded_count    = count( $excluded_headings );
			if ( $excluded_count > 0 ) {
				for ( $j = 0; $j < $excluded_count; $j ++ ) {
					$excluded_headings[ $j ] = preg_quote( $excluded_headings[ $j ] );
					// escape some regular expression characters
					// others: http://www.php.net/manual/en/regexp.reference.meta.php
					$excluded_headings[ $j ] = str_replace( array( '\*', '/', '%' ), array(
						'.*',
						'\/',
						'\%'
					), trim( $excluded_headings[ $j ] ) );
				}
				$new_matches = array();
				//$count       = count( $matches );
				//for ( $i = 0; $i < $count; $i++ ) {
				foreach ( $matches as $i => $match ) {
					$found   = false;
					$against = html_entity_decode( wptexturize( strip_tags( str_replace( array(
						"\r",
						"\n"
					), ' ', $matches[ $i ][0] ) ) ), ENT_NOQUOTES, get_option( 'blog_charset' ) );
					for ( $j = 0; $j < $excluded_count; $j ++ ) {
						// Since WP manipulates the post content it is required that the excluded header and
						// the actual header be manipulated similarly so a match can be made.
						$pattern = html_entity_decode( wptexturize( $excluded_headings[ $j ] ), ENT_NOQUOTES, get_option( 'blog_charset' ) );
						if ( @preg_match( '/^' . $pattern . '$/imU', $against ) ) {
							$found = true;
							break;
						}
					}
					if ( ! $found ) {
						$new_matches[ $i ] = $matches[ $i ];
					}
				}
				//if ( count( $matches ) != count( $new_matches ) ) {
				$matches = $new_matches;
				//}
			}
		}

		return $matches;
	}

	private function removeEmptyHeadings( &$matches ) {
		$new_matches = array();
		//$count       = count( $matches );
		//for ( $i = 0; $i < $count; $i ++ ) {
		foreach ( $matches as $i => $match ) {
			if ( trim( strip_tags( $matches[ $i ][0] ) ) != false ) {
				$new_matches[ $i ] = $matches[ $i ];
			}
		}
		//if ( count( $matches ) != count( $new_matches ) ) {
		$matches = $new_matches;

		//}
		return $matches;
	}

	private function alternateHeadings( &$matches ) {
		$alt_headings = $this->getAlternateHeadings();
		//$count        = count( $matches );
		if ( 0 < count( $alt_headings ) ) {
			//for ( $i = 0; $i < $count; $i++ ) {
			foreach ( $matches as $i => $match ) {
				foreach ( $alt_headings as $original_heading => $alt_heading ) {
					// Cleanup and texturize so alt heading can match heading in post content.
					$original_heading = wptexturize( trim( $original_heading ) );
					// Deal with special characters such as non-breakable space.
					$original_heading = str_replace( array( "\xc2\xa0" ), array( ' ' ), $original_heading );
					// Escape for regular expression.
					$original_heading = preg_quote( $original_heading );
					// Escape for regular expression some other characters: http://www.php.net/manual/en/regexp.reference.meta.php
					$original_heading = str_replace( array( '\*', '/', '%' ), array(
						'.*',
						'\/',
						'\%'
					), $original_heading );
					// Cleanup subject so alt heading can match heading in post content.
					$subject = strip_tags( $matches[ $i ][0] );
					// Deal with special characters such as non-breakable space.
					$subject = str_replace( array( "\xc2\xa0" ), array( ' ' ), $subject );
					if ( @preg_match( '/^' . $original_heading . '$/imU', $subject ) ) {
						$matches[ $i ]['alternate'] = $alt_heading;
					}
				}
			}
		}

		return $matches;
	}

	private function getAlternateHeadings() {
		$alternates = array();
		$value      = get_post_meta( $this->post->ID, '_penci-toc-alttext', true );
		if ( $value ) {
			$headings = preg_split( '/\r\n|[\r\n]/', $value );
			$count    = count( $headings );
			if ( $headings ) {
				for ( $k = 0; $k < $count; $k ++ ) {
					$heading = explode( '|', $headings[ $k ] );
					/**
					 * @link https://wordpress.org/support/topic/undefined-offset-1-home-blog-public-wp-content-plugins-easy-table-of-contents/
					 */
					if ( ! is_array( $heading ) || ! array_key_exists( 0, $heading ) || ! array_key_exists( 1, $heading ) ) {
						continue;
					}
					if ( 0 < strlen( $heading[0] ) && 0 < strlen( $heading[1] ) ) {
						$alternates[ $heading[0] ] = $heading[1];
					}
				}
			}
		}

		return $alternates;
	}

	private function headingIDs( &$matches ) {
		//$count = count( $matches );
		//for ( $i = 0; $i < $count; $i++ ) {
		foreach ( $matches as $i => $match ) {
			$matches[ $i ]['id'] = $this->generateHeadingIDFromTitle( $matches[ $i ][0] );
		}

		return $matches;
	}

	private function generateHeadingIDFromTitle( $heading ) {
		$return = false;
		if ( $heading ) {
			// WP entity encodes the post content.
			$return = html_entity_decode( $heading, ENT_QUOTES, get_option( 'blog_charset' ) );
			$return = br2( $return, ' ' );
			$return = trim( strip_tags( $return ) );
			// Convert accented characters to ASCII.
			$return = remove_accents( $return );
			// replace newlines with spaces (eg when headings are split over multiple lines)
			$return = str_replace( array( "\r", "\n", "\n\r", "\r\n" ), ' ', $return );
			// Remove `&amp;` and `&nbsp;` NOTE: in order to strip "hidden" `&nbsp;`,
			// title needs to be converted to HTML entities.
			// @link https://stackoverflow.com/a/21801444/5351316
			$return = htmlentities2( $return );
			$return = str_replace( array( '&amp;', '&nbsp;' ), ' ', $return );
			$return = html_entity_decode( $return, ENT_QUOTES, get_option( 'blog_charset' ) );
			// remove non alphanumeric chars
			//$return = preg_replace( '/[^a-zA-Z0-9 \-_]*/', '', $return );
			$return = preg_replace( '/[\x00-\x1F\x7F]*/u', '', $return );
			// Reserved Characters.
			// * ' ( ) ; : @ & = + $ , / ? # [ ]
			$return = str_replace( array(
				'*',
				'\'',
				'(',
				')',
				';',
				'@',
				'&',
				'=',
				'+',
				'$',
				',',
				'/',
				'?',
				'#',
				'[',
				']'
			), '', $return );
			// Unsafe Characters.
			// % { } | \ ^ ~ [ ] `
			$return = str_replace( array( '%', '{', '}', '|', '\\', '^', '~', '[', ']', '`' ), '', $return );
			// Special Characters.
			// $ - _ . + ! * ' ( ) ,
			$return = str_replace( array( '$', '.', '+', '!', '*', '\'', '(', ')', ',' ), '', $return );
			// Dashes
			// Special Characters.
			// - (minus) - (dash) – (en dash) — (em dash)
			$return = str_replace( array( '-', '-', '–', '—' ), '-', $return );
			// Curley quotes.
			// ‘ (curly single open quote) ’ (curly single close quote) “ (curly double open quote) ” (curly double close quote)
			$return = str_replace( array( '‘', '’', '“', '”' ), '', $return );
			// AMP/Caching plugins seems to break URL with the following characters, so lets replace them.
			$return = str_replace( array( ':' ), '_', $return );
			// Convert space characters to an `_` (underscore).
			$return = preg_replace( '/\s+/', '_', $return );
			// Replace multiple `-` (hyphen) with a single `-` (hyphen).
			$return = preg_replace( '/-+/', '-', $return );
			// Replace multiple `_` (underscore) with a single `_` (underscore).
			$return = preg_replace( '/_+/', '_', $return );
			// Remove trailing `-` (hyphen) and `_` (underscore).
			$return = rtrim( $return, '-_' );
			/*
			 * Encode URI based on ECMA-262.
			 *
			 * Only required to support the jQuery smoothScroll library.
			 *
			 * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/encodeURI#Description
			 * @link https://stackoverflow.com/a/19858404/5351316
			 */
			$return = preg_replace_callback( "{[^0-9a-z_.!~*'();,/?:@&=+$#-]}i", function ( $m ) {
				return sprintf( '%%%02X', ord( $m[0] ) );
			}, $return );
			// lowercase everything?
			if ( get_theme_mod( 'penci_toc_lowercase' ) ) {
				$return = strtolower( $return );
			}
			// if blank, then prepend with the fragment prefix
			// blank anchors normally appear on sites that don't use the latin charset
			if ( ! $return ) {
				$return = ( get_theme_mod( 'penci_toc_fragment_prefix' ) ) ? get_theme_mod( 'penci_toc_fragment_prefix' ) : '_';
			}
			// hyphenate?
			$return = str_replace( '_', '-', $return );
			$return = preg_replace( '/-+/', '-', $return );
		}
		if ( array_key_exists( $return, $this->collision_collector ) ) {
			$this->collision_collector[ $return ] ++;
			$return .= '-' . $this->collision_collector[ $return ];
		} else {
			$this->collision_collector[ $return ] = 1;
		}

		return apply_filters( 'penci_toc_url_anchor_target', $return, $heading );
	}

	private function applyContentFilter() {
		add_filter( 'strip_shortcodes_tagnames', array( __CLASS__, 'stripShortcodes' ), 10, 2 );
		remove_filter( 'the_content', array( 'PenciTOC', 'the_content' ), 100 );
		$this->post->post_content = apply_filters( 'the_content', strip_shortcodes( $this->post->post_content ) );
		add_filter( 'the_content', array( 'PenciTOC', 'the_content' ), 100 );
		remove_filter( 'strip_shortcodes_tagnames', array( __CLASS__, 'stripShortcodes' ) );

		return $this;
	}

	public static function get( $id ) {
		$post = get_post( $id );
		if ( ! $post instanceof WP_Post ) {
			return null;
		}

		return new static( $post );
	}

	public static function stripShortcodes( $tags_to_remove, $content ) {
		$tags_to_remove = apply_filters( 'penci_toc_strip_shortcodes_tagnames', array(
			'penci_toc',
			apply_filters( 'penci_toc_shortcode', 'toc' ),
		), $content );

		return $tags_to_remove;
	}

	public function getPages() {
		return $this->pages;
	}

	public function getHeadings( $page = null ) {
		$headings = array();
		if ( is_null( $page ) ) {
			$page = $this->getCurrentPage();
		}
		if ( isset( $this->pages[ $page ] ) ) {
			//$headings = wp_list_pluck( $this->pages[ $page ]['headings'], 0 );
			$matches = $this->pages[ $page ]['headings'];
			//$count   = count( $matches );
			//for ( $i = 0; $i < $count; $i++ ) {
			foreach ( $matches as $i => $match ) {
				//$anchor     = $matches[ $i ]['id'];
				$headings[] = str_replace( array(
					$matches[ $i ][1],                // start of heading
					'</h' . $matches[ $i ][2] . '>'   // end of heading
				), array(
					'>',
					'</h' . $matches[ $i ][2] . '>'
				), $matches[ $i ][0] );
			}
		}

		return $headings;
	}

	protected function getCurrentPage() {
		global $wp_query;
		// Check to see if the global `$wp_query` var is an instance of WP_Query and that the get() method is callable.
		// If it is then when can simply use the get_query_var() function.
		if ( $wp_query instanceof WP_Query && is_callable( array( $wp_query, 'get' ) ) ) {
			$page = get_query_var( 'page', 1 );

			return 1 > $page ? 1 : $page;
			// If a theme or plugin broke the global `$wp_query` var, check to see if the $var was parsed and saved in $GLOBALS['wp_query']->query_vars.
		} elseif ( isset( $GLOBALS['wp_query']->query_vars['page'] ) ) {
			return $GLOBALS['wp_query']->query_vars['page'];
			// We should not reach this, but if we do, lets check the original parsed query vars in $GLOBALS['wp_the_query']->query_vars.
		} elseif ( isset( $GLOBALS['wp_the_query']->query_vars['page'] ) ) {
			return $GLOBALS['wp_the_query']->query_vars['page'];
			// Ok, if all else fails, check the $_REQUEST super global.
		} elseif ( isset( $_REQUEST['page'] ) ) {
			return $_REQUEST['page'];
		}

		return 1;
	}

	public function getHeadingsWithAnchors( $page = null ) {
		$headings = array();
		if ( is_null( $page ) ) {
			$page = $this->getCurrentPage();
		}
		if ( isset( $this->pages[ $page ] ) ) {
			$matches = $this->pages[ $page ]['headings'];
			$prefix  = get_theme_mod( 'penci_toc_prefix', 'penci' );
			$prefix  = $prefix ? $prefix . '-' : '';
			foreach ( $matches as $i => $match ) {
				$anchor     = $matches[ $i ]['id'];
				$headings[] = str_replace( array(
					$matches[ $i ][1],                // start of heading
					'</h' . $matches[ $i ][2] . '>'   // end of heading
				), array(
					'><span class="penci-toc-section" id="' . $prefix . $anchor . '">',
					'</span></h' . $matches[ $i ][2] . '>'
				), $matches[ $i ][0] );
			}
		}

		return $headings;
	}

	public function toc() {
		echo $this->getTOC();
	}

	public function getTOC() {
		$class  = array( 'penci-toc-container' );
		$max_lv = get_theme_mod( 'penci_toc_levels', 3 );
		$html   = '';
		if ( $this->hasTOCItems() ) {
			// wrapping css classes
			switch ( get_theme_mod( 'penci_toc_wrapping' ) ) {
				case 'left':
					$class[] = 'penci-toc-wrap-left';
					break;
				case 'right':
					$class[] = 'penci-toc-wrap-right';
					break;
				default:
					$class[] = 'penci-toc-default';
			}
			if ( get_theme_mod( 'penci_toc_show_hierarchy', true ) ) {
				$class[] = 'counter-hierarchy';
			} else {
				$class[] = 'counter-flat';
			}
			switch ( get_theme_mod( 'penci_toc_counter', 'decimal' ) ) {
				case 'numeric':
					$class[] = 'counter-numeric';
					break;
				case 'roman':
					$class[] = 'counter-roman';
					break;
				case 'decimal':
					$class[] = 'counter-decimal';
					break;
			}
			$class[]      = get_theme_mod( 'penci_toc_visibility' ) ? 'dis-toggle' : 'enable-toggle';
			$class[]      = get_theme_mod( 'penci_toc_style' );
			$class[]      = 'penci-toc-wrapper';
			$class[]      = 'max-lv-' . $max_lv;
			$sticky_class = 'sticky-' . get_theme_mod( 'penci_toc_sticky', 'left' );
			$class        = array_filter( $class );
			$class        = array_map( 'trim', $class );
			$class        = array_map( 'sanitize_html_class', $class );
			$html         .= '<div class="penci-toc-container-wrapper ' . $sticky_class . '"><div id="penci-toc-container" class="' . implode( ' ', $class ) . '">' . PHP_EOL;

			$toc_title = penci_get_setting( 'penci_toc_heading_text' );
			if ( strpos( $toc_title, '%PAGE_TITLE%' ) !== false ) {
				$toc_title = str_replace( '%PAGE_TITLE%', get_the_title(), $toc_title );
			}
			if ( strpos( $toc_title, '%PAGE_NAME%' ) !== false ) {
				$toc_title = str_replace( '%PAGE_NAME%', get_the_title(), $toc_title );
			}
			$html .= '<div class="penci-toc-head penci-toc-title-container">' . PHP_EOL;
			if ( penci_get_setting( 'penci_toc_heading_text' ) ) {
				$html .= '<p class="penci-toc-title">' . esc_html__( htmlentities( $toc_title, ENT_COMPAT, 'UTF-8' ), 'soledad' ) . '</p>' . PHP_EOL;
			}
			$html .= '<span class="penci-toc-title-toggle">';
			if ( ! get_theme_mod( 'penci_toc_visibility' ) ) {
				$html .= '<a class="penci-toc-toggle penci-toc-title-toggle" style="display: none;"></a>';
			}
			$html .= '</span>';
			$html .= '</div>' . PHP_EOL;

			ob_start();
			do_action( 'penci_toc_before' );
			$html .= ob_get_clean();
			$html .= '<nav class="penci-toc">' . $this->getTOCList() . '</nav>';
			ob_start();
			do_action( 'penci_toc_after' );
			$html .= ob_get_clean();
			$html .= '</div></div>' . PHP_EOL;
		}

		return $html;
	}

	public function hasTOCItems() {
		return $this->hasTOCItems;
	}

	public function getTOCList() {
		$html = '';
		if ( $this->hasTOCItems ) {
			foreach ( $this->pages as $page => $attribute ) {
				$html .= $this->createTOC( $page, $attribute['headings'] );
			}
			$html = '<ul class="penci-toc-list">' . $html . '</ul>';
		}

		return $html;
	}

	private function createTOC( $page, $matches ) {
		// Whether or not the TOC should be built flat or hierarchical.
		$hierarchical = get_theme_mod( 'penci_toc_show_hierarchy', true );
		$html         = '';
		if ( $hierarchical ) {
			$current_depth      = 100;    // headings can't be larger than h6 but 100 as a default to be sure
			$numbered_items     = array();
			$numbered_items_min = null;
			foreach ( $matches as $i => $match ) {
				if ( $current_depth > $matches[ $i ][2] ) {
					$current_depth = (int) $matches[ $i ][2];
				}
			}
			$numbered_items[ $current_depth ] = 0;
			$numbered_items_min               = $current_depth;
			foreach ( $matches as $i => $match ) {
				$level = $matches[ $i ][2];
				$count = $i + 1;
				if ( $current_depth == (int) $matches[ $i ][2] ) {
					$html .= '<li class="penci-tocli">';
				}
				// start lists
				if ( $current_depth != (int) $matches[ $i ][2] ) {
					for ( $current_depth; $current_depth < (int) $matches[ $i ][2]; $current_depth ++ ) {
						$numbered_items[ $current_depth + 1 ] = 0;
						$html                                 .= '<ul class="penci-tocul"><li class="penci-tocli">';
					}
				}
				$title = isset( $matches[ $i ]['alternate'] ) ? $matches[ $i ]['alternate'] : $matches[ $i ][0];
				$title = br2( $title, ' ' );
				$title = strip_tags( apply_filters( 'penci_toc_title', $title ), apply_filters( 'penci_toc_title_allowable_tags', '' ) );
				$html  .= $this->createTOCItemAnchor( $page, $matches[ $i ]['id'], $title, $count );
				// end lists
				if ( $i != count( $matches ) - 1 ) {
					if ( $current_depth > (int) $matches[ $i + 1 ][2] ) {
						for ( $current_depth; $current_depth > (int) $matches[ $i + 1 ][2]; $current_depth -- ) {
							$html                             .= '</li></ul>';
							$numbered_items[ $current_depth ] = 0;
						}
					}
					if ( $current_depth == (int) @$matches[ $i + 1 ][2] ) {
						$html .= '</li>';
					}
				} else {
					// this is the last item, make sure we close off all tags
					for ( $current_depth; $current_depth >= $numbered_items_min; $current_depth -- ) {
						$html .= '</li>';
						if ( $current_depth != $numbered_items_min ) {
							$html .= '</ul>';
						}
					}
				}
			}
		} else {
			//for ( $i = 0; $i < count( $matches ); $i++ ) {
			foreach ( $matches as $i => $match ) {
				$count = $i + 1;
				$title = isset( $matches[ $i ]['alternate'] ) ? $matches[ $i ]['alternate'] : $matches[ $i ][0];
				$title = strip_tags( apply_filters( 'penci_toc_title', $title ), apply_filters( 'penci_toc_title_allowable_tags', '' ) );
				$html  .= '<li class="penci-tocli">';
				$html  .= $this->createTOCItemAnchor( $page, $matches[ $i ]['id'], $title, $count );
				$html  .= '</li>';
			}
		}

		return $html;
	}

	private function createTOCItemAnchor( $page, $id, $title, $count ) {
		$rel = get_theme_mod( 'penci_toc_nofollow_link' ) ? ' rel="nofollow" ' : ' ';

		return sprintf( '<a' . $rel . 'class="penci-toc-link penci-toc-heading-' . $count . '" href="%1$s" title="%2$s">%3$s</a>', esc_attr( $this->createTOCItemURL( $id, $page ) ), esc_attr( strip_tags( $title ) ), $title );
	}

	private function createTOCItemURL( $id, $page ) {
		$prefix       = get_theme_mod( 'penci_toc_prefix', 'penci' );
		$prefix       = $prefix ? $prefix . '-' : '';
		$current_post = $this->post->ID === $this->queriedObjectID;
		$current_page = $this->getCurrentPage();
		if ( $page === $current_page && $current_post ) {
			return '#' . $prefix . $id;
		} elseif ( 1 === $page ) {
			return trailingslashit( $this->permalink ) . '#' . $prefix . $id;
		}

		return trailingslashit( $this->permalink ) . $page . '/#' . $prefix . $id;
	}

	protected function isMultipage() {
		return 1 < $this->getNumberOfPages();
	}

	protected function getNumberOfPages() {
		return count( $this->pages );
	}
}
