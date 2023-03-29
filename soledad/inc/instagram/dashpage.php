<?php

class InstgramSettingPages {
	function __construct() {
		if ( ! function_exists( 'sb_instagram_feed_init' ) ) {
			add_action( 'admin_menu', [ $this, 'add_settings_page' ], 90 );
			add_action( 'init', [ $this, 'sb_instagram_feed' ] );
		}
	}

	public function add_settings_page() {
		add_submenu_page(
			'soledad_dashboard_welcome',
			esc_html__( 'Connect Instagram', 'soledad' ),
			esc_html__( 'Connect Instagram', 'soledad' ),
			'manage_options',
			'penci_instgram_token',
			[ $this, 'dashboard_content' ],
			3
		);
	}

	public function sb_instagram_feed() {
		if ( ! is_admin() || ! current_user_can( 'manage_options' ) ) {
			return;
		}

		if ( ! empty( $_GET['page'] ) && sanitize_text_field( $_GET['page'] ) === 'sb-instagram-feed' ) {

			if ( ! empty( $_GET['access_token'] ) ) {

				$account = [
					'id'           => sanitize_text_field( $_GET['id'] ),
					'username'     => sanitize_text_field( $_GET['username'] ),
					'access_token' => $this->clean( sanitize_text_field( $_GET['access_token'] ) ),
					'expires_on'   => (int) $_GET['expires_in'] + time(),
				];
				update_option( 'penci_options[penci_instagram]', $account );
			}

			// Redirect
			$redirect = admin_url( 'admin.php?page=penci_instgram_token' );
			wp_redirect( $redirect );

			exit;
		}
	}

	public function clean( $maybe_dirty ) {

		if ( substr_count( $maybe_dirty, '.' ) < 3 ) {
			return str_replace( '634hgdf83hjdj2', '', $maybe_dirty );
		}

		$parts     = explode( '.', trim( $maybe_dirty ) );
		$last_part = $parts[2] . $parts[3];
		$cleaned   = $parts[0] . '.' . base64_decode( $parts[1] ) . '.' . base64_decode( $last_part );

		return $cleaned;
	}

	public function dashboard_content() {
		$instagram_api         = 'https://api.instagram.com/oauth/authorize?app_id=423965861585747&redirect_uri=https://api.smashballoon.com/instagram-basic-display-redirect.php&response_type=code&scope=user_profile,user_media&state=' . admin_url( 'admin.php?page=sb-instagram-feed' );
		$instagram_token       = get_option( 'penci_options[penci_instagram]' );
		$instagram_label       = __( 'You\'ve not connected to any Instagram Account.', 'soledad' );
		$instagram_description = sprintf( __( 'You can <a class="%1$s" href="%2$s" target="_blank">click here</a> to connect to your Instagram account.', 'soledad' ), 'penci_instagram_access_token instagram', $instagram_api );
		if ( is_array( $instagram_token ) && ! empty( $instagram_token ) ) {
			$instagram_label       = sprintf( __( 'Connected to account <strong>%s</strong>', 'soledad' ), $instagram_token['username'] );
			$instagram_description = sprintf( __( 'This token is valid until <strong>%1$s</strong> because Instagram just provide an active token in 60 days.<br>Before it expired, you should connect it again to make it won\'t break the connection to Instagram.<br>You can re-connect or connect to another Instagram account by click <a class="%2$s" href="%3$s" target="_blank">HERE</a>.', 'soledad' ), date( 'F d, Y H:i:s', (int) $instagram_token['expires_on'] ), 'penci_instagram_access_token instagram', $instagram_api );
		}
		?>
        <div class="penci-insta-token-wrapper">
            <div class="pc-ins-tk top-icon">
                <span class="dashicons dashicons-instagram"></span>
            </div>
            <div class="pc-ins-tk top-head">
                <h3><?php echo $instagram_label; ?></h3>
                <p>
					<?php echo $instagram_description; ?>
                </p>
            </div>
        </div>
		<?php
	}
}

new InstgramSettingPages();
