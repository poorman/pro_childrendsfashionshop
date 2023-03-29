<?php
$current_user = wp_get_current_user();
$user_id      = $current_user->ID;
$profileuser  = get_userdata( $user_id );
extract( $args );
?>

<?php if ( isset( $_POST['success-message'] ) ) : ?>
    <div class="alert-success alert alert-dismissible fade in"
         role="alert"><?php echo esc_attr( $_POST['success-message'] ); ?></div>
<?php endif ?>

<?php if ( isset( $_POST['error-message'] ) ) : ?>
    <div class="alert-error alert alert-dismissible fade in"
         role="alert"><?php echo esc_attr( $_POST['error-message'] ); ?></div>
<?php endif ?>

<form method="post" action="">
    <div class="row clearfix">
        <!-- first name -->
        <div class="pccol_2 fname-field">
            <div class="form-group">
                <label for="fname"><?php _e( 'First Name', 'penci-frontend-submission' ); ?> <span
                            class="required">*</span></label>
                <input id="fname" name="fname"
                       placeholder="<?php _e( 'Insert your first name', 'penci-frontend-submission' ); ?>"
                       type="text" class="form-control"
                       value="<?php echo isset( $user_firstname ) ? esc_attr( $user_firstname ) : ''; ?>">
            </div>
        </div>

        <!-- last name -->
        <div class="pccol_2 lname-field">
            <div class="form-group">
                <label for="lname"><?php _e( 'Last Name', 'penci-frontend-submission' ); ?></label>
                <input id="lname" name="lname"
                       placeholder="<?php _e( 'Insert your last name', 'penci-frontend-submission' ); ?>"
                       type="text" class="form-control"
                       value="<?php echo isset( $user_lastname ) ? esc_attr( $user_lastname ) : ''; ?>">
            </div>
        </div>

        <!-- display name -->
        <div class="pccol_2 dname-field">
            <div class="form-group">
                <label for="dname"><?php _e( 'Display Name', 'penci-frontend-submission' ); ?></label>
                <select name="dname" id="dname">
					<?php
					$public_display                     = array();
					$public_display['display_nickname'] = $profileuser->nickname;
					$public_display['display_username'] = $profileuser->user_login;

					if ( ! empty( $profileuser->first_name ) ) {
						$public_display['display_firstname'] = $profileuser->first_name;
					}

					if ( ! empty( $profileuser->last_name ) ) {
						$public_display['display_lastname'] = $profileuser->last_name;
					}

					if ( ! empty( $profileuser->first_name ) && ! empty( $profileuser->last_name ) ) {
						$public_display['display_firstlast'] = $profileuser->first_name . ' ' . $profileuser->last_name;
						$public_display['display_lastfirst'] = $profileuser->last_name . ' ' . $profileuser->first_name;
					}

					if ( ! in_array( $profileuser->display_name, $public_display, true ) ) { // Only add this if it isn't duplicated elsewhere.
						$public_display = array( 'display_displayname' => $profileuser->display_name ) + $public_display;
					}

					$public_display = array_map( 'trim', $public_display );
					$public_display = array_unique( $public_display );

					foreach ( $public_display as $id => $item ) {
						?>
                        <option <?php selected( $profileuser->display_name, $item ); ?>><?php echo $item; ?></option>
						<?php
					}
					?>
                </select>
            </div>
        </div>

		<?php
		do_action( 'penci_insert_after_display_name', $user_id );
		?>

        <!-- social -->
        <div class="pccol_1 social-label">
            <h3 class="clearfix"><?php _e( 'Contact Info', 'penci-frontend-submission' ) ?></h3>
        </div>

		<?php foreach ( $socials as $key => $value ): ?>
            <div class="pccol_2 <?php echo esc_attr( $key ); ?>-field">
                <div class="form-group">
                    <label for="<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $value['label'] ); ?></label>
                    <input id="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $key ); ?>" type="text"
                           class="form-control"
                           value="<?php echo isset( $value['value'] ) ? esc_attr( $value['value'] ) : ''; ?>">
                </div>
            </div>
		<?php endforeach ?>

        <!-- description -->
        <div class="pccol_1 description-label">
            <h3 class="clearfix"><?php _e( 'About Yourself', 'penci-frontend-submission' ); ?></h3>
        </div>

        <div class="pccol_1 description-field">
            <div class="form-group">
                <label for="description"><?php _e( 'Biographical Info', 'penci-frontend-submission' ); ?></label>
				<?php
				wp_editor( $description, 'description', array(
					'textarea_name'    => 'description',
					'drag_drop_upload' => false,
					'media_buttons'    => false,
					'textarea_rows'    => 10,
					'teeny'            => true,
					'quicktags'        => false
				) );
				?>
            </div>
        </div>

        <!-- profile picture -->
        <div class="pccol_1 photo-field">
            <div class="form-group">
                <label for="photo"><?php _e( 'Profile Picture', 'penci-frontend-submission' ); ?></label>
                <div class="form-input-wrapper">
					<?php
					load_template( plugin_dir_path( __DIR__ ) . 'templates/upload_form.php', true, array(
						'id'      => 'photo',
						'class'   => '',
						'name'    => 'photo',
						'source'  => isset( $photo ) ? $photo : '',
						'button'  => 'btn-single-image',
						'multi'   => false,
						'maxsize' => apply_filters( 'penci_maxsize_upload_profile_picture', '2mb' )
					) );
					?>
                </div>
            </div>
        </div>

        <!-- submit -->
        <div class="pccol_1 submit-field">
            <div class="form-group">

				<?php if ( ! apply_filters( 'penci_account_disable_edit_account', false ) ): ?>
                    <input type="hidden" name="penci-action" value="edit-account"/>
                    <input type="hidden" name="user_id" value="<?php echo esc_attr( get_current_user_id() ); ?>"/>
                    <input type="hidden" name="penci-account-nonce"
                           value="<?php echo esc_attr( wp_create_nonce( 'penci-account-nonce' ) ); ?>"/>
                    <input type="submit"
                           value="<?php _e( 'Edit Account', 'penci-frontend-submission' ); ?>"/>
				<?php else: ?>
					<?php echo apply_filters( 'penci_account_disable_edit_account_msg', '' ); ?>
				<?php endif ?>

            </div>
        </div>

    </div>
</form>
