<?php

add_action( 'widgets_init', 'penci_buymeacoffee_load_widget' );

function penci_buymeacoffee_load_widget() {
	register_widget( 'penci_buymeacoffee_widget' );
}

if ( ! class_exists( 'penci_buymeacoffee_widget' ) ) {
	class penci_buymeacoffee_widget extends WP_Widget {

		/**
		 * Widget setup.
		 */
		function __construct() {
			/* Widget settings. */
			$widget_ops = array(
				'classname'   => 'penci_buymeacoffee_widget',
				'description' => esc_html__( 'A widget that displays the Buy Me a Coffee account information.', 'soledad' )
			);

			/* Widget control settings. */
			$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'penci_buymeacoffee_widget' );

			/* Create the widget. */ global $wp_version;
			if ( 4.3 > $wp_version ) {
				$this->WP_Widget( 'penci_buymeacoffee_widget', penci_get_theme_name( '.Soledad', true ) . esc_html__( 'Buy Me a Coffee', 'soledad' ), $widget_ops, $control_ops );
			} else {
				parent::__construct( 'penci_buymeacoffee_widget', penci_get_theme_name( '.Soledad', true ) . esc_html__( 'Buy Me a Coffee', 'soledad' ), $widget_ops, $control_ops );
			}
		}

		/**
		 * How to display the widget on the screen.
		 */
		function widget( $args, $instance ) {
			extract( $args );

			/* Our variables from the widget settings. */
			$title       = isset( $instance['title'] ) ? $instance['title'] : '';
			$title       = apply_filters( 'widget_title', $title );
			$button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : esc_html__( 'Buy Me a Coffee', 'soledad' );
			$username    = ! empty( $instance['username'] ) ? $instance['username'] : '';

			/* Before widget (defined by themes). */
			echo ent2ncr( $before_widget );

			/* Display the widget title if one was input (before and after defined by themes). */
			if ( $title ) {
				echo ent2ncr( $before_title ) . $title . ent2ncr( $after_title );
			}
			?>
            <div class="penci-buymeacoffee-badge-wrap">
                <a href="https://www.buymeacoffee.com/<?php echo $username ?>" rel="external noopener nofollow"
                   target="_blank">
                    <svg data-v-fcca4322="" width="500" height="500" viewBox="0 0 25 35" fill="none"
                         xmlns="http://www.w3.org/2000/svg"><title><?php echo esc_html( $button_text ) ?></title>
                        <path d="M22.0672 8.1281L22.0437 8.11426L21.9893 8.09766C22.0112 8.11614 22.0386 8.12685 22.0672 8.1281Z"
                              fill="black"></path>
                        <path d="M22.4111 10.5781L22.3848 10.5855L22.4111 10.5781Z" fill="black"></path>
                        <path d="M22.0735 8.11128C22.0708 8.11093 22.0681 8.11029 22.0655 8.10938C22.0654 8.11115 22.0654 8.11293 22.0655 8.1147C22.0685 8.11432 22.0712 8.11313 22.0735 8.11128Z"
                              fill="black"></path>
                        <path d="M22.3877 10.5647L22.4274 10.5421L22.4421 10.5338L22.4555 10.5195C22.4303 10.5304 22.4074 10.5457 22.3877 10.5647Z"
                              fill="black"></path>
                        <path d="M22.1334 8.1762L22.0947 8.1393L22.0684 8.125C22.0825 8.14993 22.1058 8.16832 22.1334 8.1762Z"
                              fill="black"></path>
                        <path d="M12.3836 31.9453C12.3526 31.9587 12.3255 31.9796 12.3047 32.0062L12.3291 31.9905C12.3457 31.9753 12.3693 31.9573 12.3836 31.9453Z"
                              fill="black"></path>
                        <path d="M18.0497 30.8309C18.0497 30.7958 18.0326 30.8023 18.0368 30.9268C18.0368 30.9167 18.0409 30.9065 18.0428 30.8969C18.0451 30.8747 18.0469 30.853 18.0497 30.8309Z"
                              fill="black"></path>
                        <path d="M17.4617 31.9453C17.4307 31.9587 17.4036 31.9796 17.3828 32.0062L17.4073 31.9905C17.4239 31.9753 17.4474 31.9573 17.4617 31.9453Z"
                              fill="black"></path>
                        <path d="M8.39845 32.2145C8.37496 32.1941 8.34619 32.1807 8.31543 32.1758C8.34034 32.1878 8.36524 32.1998 8.38185 32.209L8.39845 32.2145Z"
                              fill="black"></path>
                        <path d="M7.50541 31.3533C7.50173 31.317 7.49058 31.2818 7.47266 31.25C7.48535 31.2831 7.49598 31.317 7.50448 31.3515L7.50541 31.3533Z"
                              fill="black"></path>
                        <path d="M13.5278 15.9814C12.2963 16.5086 10.8987 17.1064 9.08736 17.1064C8.32963 17.1048 7.57558 17.0009 6.8457 16.7973L8.09845 29.6592C8.14279 30.1968 8.38769 30.698 8.78452 31.0634C9.18134 31.4288 9.70106 31.6316 10.2405 31.6315C10.2405 31.6315 12.0167 31.7237 12.6094 31.7237C13.2474 31.7237 15.1601 31.6315 15.1601 31.6315C15.6995 31.6315 16.2191 31.4286 16.6158 31.0633C17.0125 30.6979 17.2574 30.1967 17.3017 29.6592L18.6435 15.4463C18.0439 15.2415 17.4387 15.1055 16.7565 15.1055C15.5767 15.105 14.626 15.5114 13.5278 15.9814Z"
                              fill="#FFDD00"></path>
                        <path d="M2.96582 10.5039L2.98704 10.5237L3.00088 10.532C2.99022 10.5215 2.97847 10.512 2.96582 10.5039Z"
                              fill="black"></path>
                        <path d="M24.4376 9.31226L24.249 8.36071C24.0797 7.50694 23.6955 6.70022 22.8191 6.39164C22.5382 6.29294 22.2195 6.2505 22.0041 6.04617C21.7887 5.84184 21.725 5.5245 21.6752 5.23023C21.583 4.6901 21.4963 4.14952 21.4017 3.61033C21.3201 3.14677 21.2555 2.62602 21.0428 2.20075C20.7661 1.62973 20.1918 1.29579 19.6208 1.07485C19.3282 0.965622 19.0296 0.873222 18.7265 0.798101C17.2998 0.421723 15.7999 0.283349 14.3322 0.204476C12.5705 0.107269 10.8042 0.136556 9.04673 0.292113C7.73863 0.411114 6.36089 0.555024 5.11783 1.00751C4.6635 1.1731 4.19533 1.37189 3.84986 1.7229C3.42597 2.15417 3.2876 2.82113 3.5971 3.35894C3.81711 3.74086 4.1898 4.01069 4.58509 4.18919C5.09997 4.41919 5.63769 4.5942 6.18931 4.71132C7.72526 5.0508 9.3161 5.1841 10.8853 5.24083C12.6245 5.31103 14.3665 5.25414 16.0974 5.07063C16.5254 5.02359 16.9527 4.96716 17.3792 4.90136C17.8815 4.82433 18.2039 4.16751 18.0558 3.70995C17.8787 3.16292 17.4027 2.95074 16.8644 3.0333C16.7851 3.04576 16.7062 3.05729 16.6269 3.06882L16.5697 3.07712C16.3873 3.10019 16.205 3.12171 16.0226 3.1417C15.646 3.18229 15.2683 3.2155 14.8898 3.24133C14.042 3.30037 13.192 3.32758 12.3423 3.32896C11.5075 3.32896 10.6722 3.30544 9.83916 3.25055C9.45909 3.22564 9.07994 3.19397 8.70172 3.15553C8.52967 3.13755 8.35809 3.11864 8.18651 3.09742L8.02322 3.07666L7.98771 3.07159L7.81843 3.04714C7.4725 2.99502 7.12656 2.93506 6.78431 2.86264C6.74978 2.85498 6.71889 2.83577 6.69675 2.80818C6.67461 2.78059 6.66254 2.74627 6.66254 2.71089C6.66254 2.67552 6.67461 2.6412 6.69675 2.61361C6.71889 2.58602 6.74978 2.5668 6.78431 2.55914H6.79077C7.08735 2.49595 7.38624 2.44199 7.68605 2.39494C7.78599 2.37926 7.88623 2.36388 7.98679 2.34881H7.98955C8.17728 2.33636 8.36593 2.30269 8.55274 2.28055C10.178 2.11149 11.813 2.05386 13.4461 2.10804C14.239 2.13111 15.0314 2.17769 15.8206 2.25795C15.9903 2.27548 16.1592 2.29393 16.328 2.31468C16.3926 2.32252 16.4576 2.33175 16.5226 2.33959L16.6536 2.3585C17.0355 2.41539 17.4154 2.48442 17.7934 2.5656C18.3533 2.68737 19.0724 2.72704 19.3215 3.3405C19.4008 3.53514 19.4368 3.75147 19.4806 3.9558L19.5364 4.2164C19.5379 4.22108 19.5389 4.22586 19.5396 4.2307C19.6716 4.8457 19.8036 5.46069 19.9359 6.07569C19.9455 6.12112 19.9458 6.16806 19.9365 6.21359C19.9273 6.25911 19.9087 6.30224 19.8821 6.34028C19.8554 6.37832 19.8212 6.41046 19.7816 6.4347C19.7419 6.45893 19.6977 6.47474 19.6517 6.48113H19.648L19.5673 6.4922L19.4875 6.50281C19.2348 6.53571 18.9817 6.56646 18.7283 6.59506C18.2292 6.65194 17.7294 6.70114 17.2288 6.74265C16.234 6.82537 15.2373 6.87965 14.2385 6.90548C13.7296 6.919 13.2209 6.92531 12.7123 6.92439C10.6878 6.92279 8.66519 6.80513 6.65424 6.57199C6.43653 6.54616 6.21883 6.51849 6.00112 6.49035C6.16993 6.51203 5.87843 6.47375 5.81939 6.46545C5.68101 6.44607 5.54264 6.42593 5.40426 6.40502C4.93979 6.33537 4.47808 6.24958 4.01453 6.1744C3.45411 6.08215 2.91814 6.12827 2.41123 6.40502C1.99513 6.63272 1.65836 6.98188 1.44584 7.40593C1.22721 7.85795 1.16217 8.3501 1.06439 8.8358C0.966604 9.32149 0.814392 9.84408 0.872048 10.3427C0.996123 11.4188 1.74842 12.2933 2.8305 12.4889C3.84848 12.6734 4.87198 12.8228 5.89826 12.9501C9.9297 13.4439 14.0025 13.5029 18.0466 13.1263C18.3759 13.0956 18.7048 13.062 19.0332 13.0258C19.1358 13.0145 19.2396 13.0263 19.337 13.0604C19.4344 13.0944 19.523 13.1498 19.5962 13.2225C19.6694 13.2952 19.7255 13.3834 19.7602 13.4805C19.795 13.5777 19.8075 13.6814 19.797 13.7841L19.6946 14.7794C19.4883 16.7908 19.282 18.802 19.0756 20.813C18.8604 22.9249 18.6437 25.0366 18.4257 27.1482C18.3642 27.7429 18.3027 28.3375 18.2412 28.9319C18.1822 29.5172 18.1739 30.121 18.0627 30.6994C17.8875 31.609 17.2717 32.1675 16.3732 32.3719C15.55 32.5592 14.7091 32.6575 13.8649 32.6652C12.929 32.6703 11.9936 32.6288 11.0578 32.6338C10.0587 32.6394 8.83502 32.5471 8.06381 31.8036C7.38624 31.1505 7.29261 30.1279 7.20036 29.2437C7.07736 28.073 6.95544 26.9025 6.83459 25.7322L6.15656 19.2245L5.71791 15.0137C5.71053 14.9441 5.70315 14.8754 5.69623 14.8053C5.64365 14.303 5.28803 13.8113 4.72761 13.8366C4.24792 13.8579 3.70272 14.2656 3.759 14.8053L4.08417 17.927L4.75667 24.3844C4.94824 26.2187 5.13935 28.0532 5.33 29.888C5.3669 30.2395 5.40149 30.5919 5.44024 30.9434C5.65103 32.864 7.11779 33.899 8.93419 34.1906C9.99506 34.3612 11.0818 34.3963 12.1583 34.4138C13.5384 34.4359 14.9322 34.489 16.2897 34.239C18.3012 33.87 19.8104 32.5268 20.0258 30.4434C20.0873 29.8419 20.1488 29.2403 20.2103 28.6385C20.4148 26.6484 20.619 24.6581 20.8228 22.6677L21.4898 16.1641L21.7956 13.1835C21.8108 13.0357 21.8733 12.8968 21.9736 12.7872C22.0739 12.6776 22.2069 12.6033 22.3528 12.5751C22.928 12.463 23.4778 12.2716 23.8869 11.8339C24.5382 11.137 24.6678 10.2283 24.4376 9.31226ZM2.80098 9.95524C2.80975 9.95109 2.7936 10.0263 2.78669 10.0613C2.7853 10.0083 2.78807 9.96124 2.80098 9.95524ZM2.8568 10.387C2.86141 10.3837 2.87524 10.4022 2.88954 10.4243C2.86786 10.404 2.85403 10.3888 2.85633 10.387H2.8568ZM2.91168 10.4594C2.93152 10.4931 2.94213 10.5143 2.91168 10.4594V10.4594ZM3.02192 10.5489H3.02469C3.02469 10.5521 3.02976 10.5553 3.03161 10.5586C3.02855 10.555 3.02515 10.5518 3.02146 10.5489H3.02192ZM22.326 10.4151C22.1194 10.6116 21.8081 10.7029 21.5004 10.7486C18.0503 11.2606 14.5499 11.5198 11.0619 11.4054C8.56565 11.3201 6.09567 11.0429 3.62431 10.6937C3.38215 10.6596 3.11971 10.6153 2.9532 10.4368C2.63955 10.1001 2.7936 9.42204 2.87524 9.01522C2.94997 8.64253 3.09295 8.14577 3.53621 8.09272C4.22808 8.01155 5.03158 8.30352 5.71607 8.4073C6.54016 8.53306 7.36733 8.63377 8.19758 8.70941C11.7409 9.03229 15.3437 8.98201 18.8713 8.50969C19.5143 8.42329 20.1549 8.32289 20.7933 8.2085C21.362 8.10656 21.9926 7.91515 22.3362 8.50416C22.5719 8.90544 22.6033 9.44233 22.5668 9.89574C22.5556 10.0933 22.4693 10.2791 22.3256 10.4151H22.326Z"
                              fill="black"></path>
                    </svg>
                </a>

				<?php
				if ( ! empty( $instance['secondary_text'] ) ) {
					echo '<h4>' . $instance['secondary_text'] . '</h4>';
				}
				?>

                <a href="https://www.buymeacoffee.com/<?php echo $username ?>" rel="external noopener nofollow"
                   target="_blank" class="button">
                    <span><?php echo esc_html( $button_text ) ?></span>
                </a>
            </div>
			<?php

			/* After widget (defined by themes). */
			echo ent2ncr( $after_widget );
		}

		/**
		 * Update the widget settings.
		 */
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$data_instance = $this->soledad_widget_defaults();

			foreach ( $data_instance as $data => $value ) {
				$instance[ $data ] = ! empty( $new_instance[ $data ] ) ? $new_instance[ $data ] : '';
			}

			return $instance;
		}

		public function soledad_widget_defaults() {
			return array(
				'title'          => esc_html__( 'Buy Me a Coffee', 'soledad' ),
				'button_text'    => '',
				'secondary_text' => '',
				'username'       => '',
			);
		}


		function form( $instance ) {

			/* Set up some default widget settings. */
			$defaults       = $this->soledad_widget_defaults();
			$instance       = wp_parse_args( (array) $instance, $defaults );
			$title          = $instance['title'] ? str_replace( '"', '&quot;', $instance['title'] ) : '';
			$username       = isset( $instance['username'] ) ? $instance['username'] : '';
			$button_text    = isset( $instance['button_text'] ) ? $instance['button_text'] : '';
			$secondary_text = isset( $instance['secondary_text'] ) ? $instance['secondary_text'] : '';
			?>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'soledad' ) ?></label>
                <input id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
                       value="<?php echo esc_attr( $title ); ?>" class="widefat" type="text"/>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( 'Username', 'soledad' ) ?></label>
                <input id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>"
                       value="<?php echo esc_attr( $username ); ?>" class="widefat" type="text"/>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"><?php esc_html_e( 'Button Text', 'soledad' ) ?></label>
                <input id="<?php echo esc_attr( $this->get_field_id( 'button_text' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'button_text' ) ); ?>"
                       value="<?php echo esc_attr( $button_text ); ?>" class="widefat" type="text"/>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'secondary_text' ) ); ?>"><?php esc_html_e( 'Secondary Text', 'soledad' ) ?></label>
                <input id="<?php echo esc_attr( $this->get_field_id( 'secondary_text' ) ); ?>"
                       name="<?php echo esc_attr( $this->get_field_name( 'secondary_text' ) ); ?>"
                       value="<?php echo esc_attr( $secondary_text ); ?>" class="widefat" type="text"/>
            </p>

			<?php
		}
	}
}
?>
