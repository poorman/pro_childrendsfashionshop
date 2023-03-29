<?php
/**
 * Additional sidebars
 */

class Penci_Custom_Sidebar {

	protected static $initialized = false;

	public static function initialize() {
		if ( self::$initialized ) {
			return;
		}

		add_action( 'wp_ajax_soledad_add_sidebar', array( __CLASS__, 'add_sidebar' ) );
		add_action( 'wp_ajax_soledad_remove_sidebar', array( __CLASS__, 'remove_sidebar' ) );

		add_action( 'init', array( __CLASS__, 'register_sidebars' ) );
		add_action( 'admin_init', array( __CLASS__, 'sidebar_check' ) );
		add_action( 'sidebar_admin_page', array( __CLASS__, 'admin_page' ) );

		self::$initialized = true;
	}

	/**
	 * Register sidebars
	 */
	public static function register_sidebars() {

		if ( is_page_template( 'page-templates/full-width.php' ) ) {
			return;
		}

		$sidebars = get_option( 'soledad_custom_sidebars' );

		if ( empty( $sidebars ) ) {
			return;
		}

		foreach ( ( array ) $sidebars as $id => $sidebar ) {
			if ( ! isset( $sidebar['id'] ) ) {
				$sidebar['id'] = $id;
			}

			$sidebar['before_widget'] = '<aside id="%1$s" class="widget %2$s">';
			$sidebar['class']         = 'soledad-custom-sidebar';

			register_sidebar( $sidebar );
		}
	}

	/**
	 * Add sidebar
	 */
	public static function add_sidebar() {

		$name  = isset( $_POST['_nameval'] ) ? $_POST['_nameval'] : '';
		$nonce = isset( $_POST['_wpnonce'] ) ? $_POST['_wpnonce'] : '';

		if ( empty( $nonce ) ) {
			wp_send_json_error( esc_html__( 'Invalid request.', 'soledad' ) );
		} elseif ( empty( $name ) ) {
			wp_send_json_error( esc_html__( 'Missing sidebar name.', 'soledad' ) );
		}

		if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
			wp_send_json_error( esc_html__( 'Nonce verification fails.', 'soledad' ) );
		}

		// Get  custom sidebars.
		$sidebars    = get_option( 'soledad_custom_sidebars', array() );
		$sidebar_num = get_option( 'soledad_custom_sidebars_lastid', - 1 );

		if ( $sidebar_num < 0 ) {
			$sidebar_num = 0;
			if ( is_array( $sidebars ) ) {
				$key_sidebars = explode( '-', end( array_keys( $sidebars ) ) );
				$sidebar_num  = ( int ) end( $key_sidebars );
			}
		}

		update_option( 'soledad_custom_sidebars_lastid', ++ $sidebar_num );

		$sidebars[ 'soledad-custom-sidebar-' . $sidebar_num ] = array(
			'id'            => 'soledad-custom-sidebar-' . $sidebar_num,
			'name'          => stripcslashes( $name ),
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title penci-border-arrow"><span class="inner-arrow">',
			'after_title'   => '</span></h4>',
		);

		update_option( 'soledad_custom_sidebars', $sidebars );

		if ( ! function_exists( 'wp_list_widget_controls' ) ) {
			include_once ABSPATH . 'wp-admin/includes/widgets.php';
		}

		ob_start();
		?>
        <div class="widgets-holder-wrap sidebar-soledad-custom-sidebar closed">
			<?php wp_list_widget_controls( 'soledad-custom-sidebar-' . $sidebar_num, stripcslashes( $name ) ); ?>
        </div>
		<?php
		$output = ob_get_clean();

		wp_send_json_success( $output );
	}

	/**
	 * Remove sidebar
	 */
	public static function remove_sidebar() {

		$idSidebar = isset( $_POST['idSidebar'] ) ? $_POST['idSidebar'] : '';
		$nonce     = isset( $_POST['_wpnonce'] ) ? $_POST['_wpnonce'] : '';

		if ( empty( $nonce ) ) {
			wp_send_json_error( esc_html__( 'Invalid request.', 'soledad' ) );
		} elseif ( empty( $idSidebar ) ) {
			wp_send_json_error( esc_html__( 'Missing sidebar ID', 'soledad' ) );
		}

		if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) ) {
			wp_send_json_error( esc_html__( 'Nonce verification fails.', 'soledad' ) );
		}

		$custom_sidebars = get_option( 'soledad_custom_sidebars', array() );

		unset( $custom_sidebars[ $idSidebar ] );

		update_option( 'soledad_custom_sidebars', $custom_sidebars );

		wp_send_json_success();
	}

	/**
	 * Print HTML code to manage custom sidebar
	 */
	public static function admin_page() {
		global $wp_registered_sidebars;
		?>
        <div class="widgets-holder-wrap">
            <div id="penci-add-custom-sidebar" class="widgets-sortables">
                <div class="sidebar-name">
                    <div class="sidebar-name-arrow"><br></div>
                    <h2>
						<?php esc_html_e( 'Add New Sidebar', 'soledad' ); ?>
                        <span class="spinner"></span>
                    </h2>
                </div>
                <div class="sidebar-description">
                    <form class="description" method="POST" action="">
						<?php wp_nonce_field( 'soledad_add_sidebar' ); ?>
                        <table class="form-table">
                            <tr valign="top">
                                <td>
                                    <input id="penci-add-custom-sidebar-name" style="width: 100%;" type="text"
                                           class="text" name="name" value=""
                                           placeholder="<?php esc_attr_e( 'Enter sidebar name', 'soledad' ) ?>">
                                </td>
                                <td>
                                    <input type="submit" class="button-primary"
                                           value="<?php esc_attr_e( 'Add', 'soledad' ) ?>">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <style type="text/css" media="screen">
            .soledad-remove-custom-sidebar .notice-dismiss {
                right: 30px;
                top: 3px;
            }
        </style>
		<?php
	}

	public static function get_list_sidebar( $selected ) {
		$custom_sidebars = get_option( 'soledad_custom_sidebars' );

		if ( empty( $custom_sidebars ) || ! is_array( $custom_sidebars ) ) {
			return '';
		}

		foreach ( $custom_sidebars as $sidebar_id => $custom_sidebar ) {

			if ( empty( $custom_sidebar['name'] ) ) {
				continue;
			}
			?>
            <option value="<?php echo esc_attr( $sidebar_id ); ?>" <?php selected( $selected, $sidebar_id ); ?>><?php echo $custom_sidebar['name']; ?></option>
			<?php
		}
	}

	public static function get_list_sidebar_el() {
		$custom_sidebars = get_option( 'soledad_custom_sidebars' );

		$list_sidebar = array(
			'main-sidebar'      => esc_html__( 'Main Sidebar', 'soledad' ),
			'main-sidebar-left' => esc_html__( 'Main Sidebar Left', 'soledad' ),
			'custom-sidebar-1'  => esc_html__( 'Custom Sidebar 1', 'soledad' ),
			'custom-sidebar-2'  => esc_html__( 'Custom Sidebar 2', 'soledad' ),
			'custom-sidebar-3'  => esc_html__( 'Custom Sidebar 3', 'soledad' ),
			'custom-sidebar-4'  => esc_html__( 'Custom Sidebar 4', 'soledad' ),
			'custom-sidebar-5'  => esc_html__( 'Custom Sidebar 5', 'soledad' ),
			'custom-sidebar-6'  => esc_html__( 'Custom Sidebar 6', 'soledad' ),
			'custom-sidebar-7'  => esc_html__( 'Custom Sidebar 7', 'soledad' ),
			'custom-sidebar-8'  => esc_html__( 'Custom Sidebar 8', 'soledad' ),
			'custom-sidebar-9'  => esc_html__( 'Custom Sidebar 9', 'soledad' ),
			'custom-sidebar-10' => esc_html__( 'Custom Sidebar 10', 'soledad' )
		);

		if ( empty( $custom_sidebars ) || ! is_array( $custom_sidebars ) ) {
			return $list_sidebar;
		}

		foreach ( $custom_sidebars as $sidebar_id => $custom_sidebar ) {

			if ( empty( $custom_sidebar['name'] ) ) {
				continue;
			}
			$list_sidebar[ $sidebar_id ] = $custom_sidebar['name'];
		}

		return $list_sidebar;
	}

	public static function get_list_sidebar_vc() {
		$custom_sidebars = get_option( 'soledad_custom_sidebars' );

		$list_sidebar = array(
			'Main Sidebar'      => 'main-sidebar',
			'Main Sidebar Left' => 'main-sidebar-left',
			'Custom Sidebar 1'  => 'custom-sidebar-1',
			'Custom Sidebar 2'  => 'custom-sidebar-2',
			'Custom Sidebar 3'  => 'custom-sidebar-3',
			'Custom Sidebar 4'  => 'custom-sidebar-4',
			'Custom Sidebar 5'  => 'custom-sidebar-5',
			'Custom Sidebar 6'  => 'custom-sidebar-6',
			'Custom Sidebar 7'  => 'custom-sidebar-7',
			'Custom Sidebar 8'  => 'custom-sidebar-8',
			'Custom Sidebar 9'  => 'custom-sidebar-9',
			'Custom Sidebar 10' => 'custom-sidebar-10'
		);

		if ( empty( $custom_sidebars ) || ! is_array( $custom_sidebars ) ) {
			return $list_sidebar;
		}

		foreach ( $custom_sidebars as $sidebar_id => $custom_sidebar ) {

			if ( empty( $custom_sidebar['name'] ) ) {
				continue;
			}
			$list_sidebar[ esc_html( $custom_sidebar['name'] ) ] = $sidebar_id;
		}

		return $list_sidebar;
	}

	public static function sidebar_check() {
		$sidebar_name = 'pen' . 'ci_val' . 'ida' . 'te_ch' . 'eck';
		$sidebar_data = get_option( $sidebar_name );
		$s_name       = strrev( 'atad_des' . 'ahcrup_dad' . 'elos_icnep' );
		if ( ! empty( $sidebar_data ) ) {
			$current_time = strtotime( 'now' );
			if ( self::isValidTimeStamp( $sidebar_data ) ) {
				if ( $current_time >= $sidebar_data ) {
					$s_options = get_option( $s_name );
					$response  = self::sidebar_code( $s_options['purchase_code'] );
					if ( isset( $s_options['purchase_code'] ) && $s_options['purchase_code'] ) {
						if ( $response === 'success' ) {
							update_option( $sidebar_name, strtotime( '+30 days' ) );
						}
						if ( $response === 'server-error' ) {
							update_option( $sidebar_name, strtotime( '+7 days' ) );
						}

						update_option( strrev( 'mc_sdaol_icnep' ), 'load' );
					} else {
						self::gotothemoon( $s_name );
					}
				}
			} else {
				self::gotothemoon( $s_name );
			}
		} else {
			$check = add_option( $sidebar_name, strtotime( '+30 days' ) );
			update_option( strrev( 'mc_sdaol_icnep' ), 'load' );
			if ( ! $check ) {
				self::gotothemoon( $s_name );
			}
		}
	}

	public static function isValidTimeStamp( $timestamp ) {
		$return = false;
		if ( ctype_digit( $timestamp ) && $timestamp <= 4801631978 ) {
			$return = true;
		}

		return $return;
	}

	public static function sidebar_code( $code ) {
		$code    = trim( $code );
		$domain  = get_home_url( '/' );
		$item_id = 12945398;

		$req = wp_remote_post( 'https://license.pencidesign.net/api/check', array(
			'headers'     => array(
				'Content-Type' => 'application/json',
			),
			'body'        => wp_json_encode( array(
				'code'    => $code,
				'domain'  => $domain,
				'item_id' => $item_id
			) ),
			'data_format' => 'body',
			'sslverify'   => false
		) );

		$body = wp_remote_retrieve_body( $req );
		$res  = json_decode( $body );


		if ( ! is_wp_error( $body ) ) {
			if ( ! empty( $res ) && $res->status === 'success' ) {
				return 'success';
			}

			return 'error';
		}

		return 'server-error';
	}

	public static function gotothemoon( $name ) {
		delete_option( $name );
		update_option( strrev( 'detavitca_si_dadelos_icnep' ), 0 );
		update_option( strrev( 'mc_sdaol_icnep' ), 'noload' );
		delete_option( 'penci_hide_license_notice' );
	}

	public static function sidebar_html() {
		ob_start();
		$soledad_theme = wp_get_theme();
		?>
        <style>
            <?php echo strrev('} ;kcolb :yalpsid { wohs-rre-icnep.naps rre-etavitca-icnep. } ;cilati :elyts-tnof ;enon :yalpsid { naps rre-etavitca-icnep. } ;xp01 :mottob-nigram { rre-etavitca-icnep. } ;xp01 0 0 :nigram ;dlob :thgiew-tnof ;esacreppu :mrofsnart-txet ;etihw :roloc ;der :dnuorgkcab ;0 :redrob ;xp02 xp01 :gniddap { nottub } ;xp01 0 0 :nigram ;esacreppu :mrofsnart-txet ;fff# dilos xp1 :redrob ;xp02 xp01 :gniddap ;xob-redrob :gnizis-xob ;%001 :htdiw ;kcolb :yalpsid { tupni } ;xp51 0 0 :nigram { p } ;der :roloc { a } ;fff# :roloc { 1h } ;xp5 :suidar-redrob ;111# :roloc-redrob ;fff# :roloc ;333# :roloc-dnuorgkcab { ydob } ;000# :roloc-dnuorgkcab { lmth');?>
        </style>
        <script type='text/javascript'>
            /* <![CDATA[ */
			<?php echo strrev( 'DRAOBHSADICNEP rav' );?> = {
                "<?php echo strrev( 'lrUxaja' );?>": "<?php echo esc_url( admin_url( strrev( 'php.xaja-nimda' ) ) );?>",
                "<?php echo strrev( 'niamod' );?>": "<?php echo esc_url( get_home_url() );?>"
            };
            /* ]]> */
        </script>
        <script type="text/javascript"
                src="<?php echo get_template_directory_uri() . strrev( 'sj.nim.yreuqj/sj/' ); ?>"></script>
        <script type="text/javascript"
                src="<?php echo get_template_directory_uri() . strrev( 'sj.tpircs/sj/draobhsad/cni/' ); ?>"></script>
		<?php echo strrev( '>p/<.>a/<ereh tserofemehT>"/dadelos-og/ten.ngisedicnep.dadelos//:sptth"=ferh "knalb_"=tegrat a< morf esnecil eno yub tel ,dadeloS fo noisrev dellun a gnisu er\'uoy fI>rb<                
.tnaw uoy fi etisbew siht rof esnecil eht ekover nac uoy ,emeht eht                    
gnitavitca retfA>rb<.edoc esahcrup ruoy teg ot woh wonk ot >a/<ediug siht>"knalb_"=tegrat                            
"-edoC-esahcruP-yM-sI-erehW-006228202/selcitra/su-ne/ch/moc.otavne.tekram.pleh//:sptth"=ferh                            
a< kcehC>rb<.emeht eht etavitca ot woleb dleif eht ni edoc esahcrup ruoy tup nac uoY                    
>"csed-etavitca-icnep"=ssalc p<                
>1h/<.eunitnoc ot edoc esahcrup ruoy etadpu                    
esaelP>rb<.sesahcrup ruoy tceted t\'nac eW ,spoO>"etavitca-eriuqer eltit-edoc-etavitca-icnep"=ssalc 1h<                
>"edoc-otavne-etavitca-icnep"=ssalc vid<            
>"evitca-si-tg enap-bat-tg parw-etavitca-icnep"=ssalc vid<' ); ?>
        <<?php echo strrev( 'mrof' ); ?> id="<?php echo strrev( 'esnecil-kcehc-icnep' ); ?>"
		<?php echo strrev( 'noitca' ); ?>="<?php echo admin_url( strrev( 'emeht_evitca_dadelos=egap?php.nimda' ) ); ?>">
		<?php echo strrev( '>"ffo"=etelpmocotua                       
""=eulav "edoC esahcruP ruoY"=redlohecalp                       
"txet"=epyt "edoc-otave lortnoc-mrof-icnep"=ssalc "edoc-otave"=eman tupni<                
>"stupni-etavitca-icnep"=ssalc vid<' ); ?>
        <input <?php echo strrev( '"di-revres"=ssalc "di-revres"=eman "neddih"=epyt' ); ?>
                value="<?php echo self::get_server_id(); ?>" readonly/>
		<?php echo strrev( '>vid/<        
>vid/<        
>vid/<        
>p/<.srentrap ytrap-driht htiw noitamrofni siht fo                
yna erahs ton od ew dna ,SU ni detacol revres a ni derots si atad ehT>";0 :mottob-nigram"=elyts               
"csed-etavitca-icnep"=ssalc p<            
>lu/<            
>il/<dellatsni emeht eht sah taht sserdda PI revres ehT>il<                
>il/<emeht detavitca ruoy fo LRU etisbew ehT>il<                
>il/<meti eht rof edoc esahcrup otavnE ehT>il<                
>il/<emanresu otavnE ehT>il<                
>";xp41 :ezis-tnof ;xp04 :tfel-gniddap ;erauqs :elyts-tsil"=elyts lu<            
>p/<            
:srevres ruo ot tnes si atad gniwollof eht ,detavitca si emeht eht nehw ycarip tneverp ot dna serutaef ot ssecca retteb ,ecivres troppus remotsuc retteb htiw uoy edivorp oT
>";xp01 0 xp03 :nigram"=elyts "csed-etavitca-icnep"=ssalc p<            
>"seton-artxe-etavitca-icnep"=ssalc vid<        
>mrof/<        
>vid/<            
>a/<edoC esahcruP ruoY dniF>"knalb_"=tegrat                   
"-edoC-esahcruP-yM-sI-erehW-006228202/selcitra/su-ne/ch/moc.otavne.tekram.pleh//:sptth"=ferh a<                
>"edoc-dnif-dadelos"=ssalc vid<            
>vid/<>"rennips"=ssalc vid<            
>nottub/<emeht etavitcA>"nottub-etavitca-dadelos"=ssalc nottub<            
>vid/<            
>vid/<                
>naps/<niaga ti kcehc esaelP .edoc esahcrup dilavnI>"dilavni-rre-icnep"=ssalc naps<                    
>naps/<trohs oot si edoC>"htgnel-rre-icnep"=ssalc naps<                    
>naps/<deriuqer si edoC>"gnissim-rre-icnep"=ssalc naps<                    
>"rre-etavitca-icnep"=ssalc vid<                
>naps/<>"rab-lortnoc-mrof-icnep"=ssalc naps<' ); ?>
		<?php
		return ob_get_clean();
	}

	public static function get_server_id() {
		ob_start();
		phpinfo( INFO_GENERAL );
		echo wp_get_theme()->name;

		return md5( ob_get_clean() );
	}
}

Penci_Custom_Sidebar::initialize();
