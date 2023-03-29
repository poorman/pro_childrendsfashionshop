<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'Penci_Social_Counter_Twitter_API' ) ):
	class Penci_Social_Counter_Twitter_API {
		public static function get_count( $data, $cache_period ) {
			$user_id       = preg_replace( '/\s+/', '', $data['name'] );
			$data['url']   = "https://twitter.com/$user_id";
			$data['icon']  = penci_icon_by_ver( 'fab fa-twitter' );
			$default_count = penci_get_social_counter_option( 'twitter_default' );
			$cache_key     = 'penci_counter_twitter' . $user_id;
			$twitter_count = $default_count ? $default_count : get_transient( $cache_key );

			$count = 0;
			if ( ! $twitter_count ) {

				$twitter_worked = false;

				// Check 1 via https
				$penci_data = self::get_url( "https://twitter.com/$user_id" );

				if ( $penci_data !== false ) {
					$pattern = "/title=\"(.*)\"(.*)data-nav=\"followers\"/i";
					preg_match_all( $pattern, $penci_data, $matches );
					if ( ! empty( $matches[1][0] ) ) {
						$penci_counter_fix = self::extract_numbers_from_string( htmlentities( $matches[1][0] ) );

						$count = (int) $penci_counter_fix;

						if ( ! empty( $count ) and is_numeric( $count ) ) {
							$twitter_worked = true;
						}
					}
				}

				if ( $twitter_worked === false ) {
					if ( ! class_exists( 'TwitterApiClient' ) ) {
						require_once dirname( __FILE__ ) . '/twitter-client.php';
						$Client = new TwitterApiClient;
						$Client->set_oauth( YOUR_CONSUMER_KEY, YOUR_CONSUMER_SECRET, SOME_ACCESS_KEY, SOME_ACCESS_SECRET );
						try {
							$path     = 'users/show';
							$args     = array( 'screen_name' => $user_id );
							$response = @$Client->call( $path, $args, 'GET' );
							if ( ! empty( $response['followers_count'] ) ) {
								$count = (int) $response['followers_count'];  //set the buffer
							}
						} catch ( TwitterApiException $Ex ) {
							$count = 0;
						}
					}
				}

				set_transient( $cache_key, $count, $cache_period );
			} else {
				$count = $twitter_count;
			}

			if ( $count ) {
				$data['count'] = $count;
			}

			return $data;
		}

		public static function get_url_wordpress( $url ) {

			$response = wp_remote_get( $url, array(
				'timeout'    => 10,
				'sslverify'  => false,
				'user-agent' => 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:35.0) Gecko/20100101 Firefox/35.0'
			) );

			if ( is_wp_error( $response ) ) {
				return false;
			}

			$penci_request_result = wp_remote_retrieve_body( $response );

			if ( empty( $penci_request_result ) ) {
				return false;
			}

			return $penci_request_result;
		}

		private static function get_url( $url ) {
			return self::get_url_wordpress( $url );
		}

		/**
		 * Extract numbers from string
		 *
		 * @param $penci_string
		 *
		 * @return string
		 */
		private static function extract_numbers_from_string( $penci_string ) {
			$output = '';
			foreach ( str_split( $penci_string ) as $penci_char ) {
				if ( is_numeric( $penci_char ) ) {
					$output .= $penci_char;
				}
			}

			return $output;
		}
	}

endif;
