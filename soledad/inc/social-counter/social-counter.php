<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( ! function_exists( 'penci_get_social_counter_option' ) ):
	function penci_get_social_counter_option( $key = null, $default = false ) {
		static $data;

		$data = empty( $data ) ? get_option( 'penci_social_counter_settings' ) : $data;

		if ( isset( $data[ $key ] ) ) {
			return $data[ $key ];
		}

		if ( $default ) {
			return $default;
		}

		return '';
	}
endif;

if ( ! class_exists( 'PENCI_FW_Social_Counter' ) ):
	class PENCI_FW_Social_Counter {

		private static $_instance = null;

		private static $caching_time = 86400;  // cache expire time - default 86400 = 1 day

		public static function instance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}

			return self::$_instance;
		}

		public function __construct() {
			$this->load_files();
		}

		public function load_files() {
			require_once dirname( __FILE__ ) . '/admin-options.php';
		}

		public static function get_social_counter( $social, $get_number = true ) {

			$cache_period = apply_filters( 'penci_social_cache_time', self::$caching_time );

			$penci_social_counter_settings = get_option( 'penci_social_counter_settings' );

			$counter_data = shortcode_atts( array(
				$social . '_name'       => '',
				$social . '_text_below' => '',
				$social . '_text_btn'   => '',
				$social . '_default'    => ''
			), $penci_social_counter_settings );

			$face_name = isset( $counter_data[ $social . '_name' ] ) && $counter_data[ $social . '_name' ] ? $counter_data[ $social . '_name' ] : '';

			$data = [];

			if ( ! $face_name ) {
				return [];
			}

			$data_default = array(
				'name'       => $face_name,
				'title'      => $face_name ? $face_name : esc_html__( 'Facebook', 'soledad' ),
				'text_below' => $counter_data[ $social . '_text_below' ],
				'text_btn'   => $counter_data[ $social . '_text_btn' ],
				'count'      => $counter_data[ $social . '_default' ],
				'icon'       => '',
				'url'        => '',
				'error'      => '',
			);

			$social_file = dirname( __FILE__ ) . '/counter-' . $social . '-api.php';
			$class_name  = 'Penci_Social_Counter_' . ucwords( $social ) . '_API';


			if ( file_exists( $social_file ) ) {
				require_once $social_file;
			}

			if ( class_exists( $class_name ) ) {
				$data = $class_name::get_count( $data_default, $cache_period );
			}

			return $data;
		}

		public static function format_followers( $followers ) {
			if ( ! $followers || ! is_numeric( $followers ) ) {
				return $followers;
			}


			if ( $followers >= 1000000 ) {
				$followers = number_format_i18n( $followers / 1000000, 1 ) + 0 . 'm';
			} elseif ( $followers >= 1000 ) {
				$followers = number_format_i18n( $followers / 1000, 1 ) + 0 . 'k';
			} else {
				$followers = number_format_i18n( $followers );
			}


			return $followers;
		}
	}

	new PENCI_FW_Social_Counter;
endif;

if ( ! function_exists( 'penci_get_the_number' ) ) :
	function penci_get_the_number( $pattern, $the_request ) {

		$counter = 0;

		preg_match( $pattern, $the_request, $matches );

		if ( is_array( $matches ) && ! empty( $matches[1] ) ) {

			$number  = strip_tags( $matches[1] );
			$counter = '';

			foreach ( str_split( $number ) as $char ) {
				if ( is_numeric( $char ) ) {
					$counter .= $char;
				}
			}
		}

		return $counter;
	}
endif;

if ( ! function_exists( 'penci_remote_get' ) ) :
	function penci_remote_get( $url, $json = true, $args = array( 'timeout' => 18, 'sslverify' => false ) ) {

		$get_request = preg_replace( '/\s+/', '', $url );
		$get_request = wp_remote_get( $url, $args );

		$request = wp_remote_retrieve_body( $get_request );

		if ( $json ) {
			$request = @json_decode( $request, true );
		}

		return $request;

	}
endif;

add_action( 'mb_settings_page_submit_buttons', function () {
	if ( isset( $_GET['page'] ) && 'penci_social_counter_settings' == $_GET['page'] ) {
		echo '<button class="button button-secondary penci-reset-social-cache">' . __( 'Clear Counter Caches', 'soledad' ) . '</button>';
	}
} );

add_action( 'wp_ajax_penci_social_clear_all_caches', 'penci_social_clear_all_caches' );
function penci_social_clear_all_caches() {
	global $wpdb;
	$transients = $wpdb->get_results( "SELECT option_name AS name, option_value AS value FROM $wpdb->options 
              WHERE option_name LIKE '_transient_%'" );
	foreach ( $transients as $std => $value ) {
		$t_name = $value->name;
		if ( strpos( $t_name, 'penci_counter' ) !== false ) {
			delete_transient( str_replace( '_transient_', '', $t_name ) );
		}
	}
	wp_send_json_success( [ 'messages' => __( 'Successfully clear all social counter cache.', 'soledad' ) ], 200 );
	wp_die();
}
