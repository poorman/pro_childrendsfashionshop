<?php
require_once get_template_directory() . '/inc/avatar/class-penci-avatars.php';

if ( ! defined( 'PENCI_IS_NETWORK' ) ) {
	define( 'PENCI_IS_NETWORK', Penci_Avatars::is_network( plugin_basename( __FILE__ ) ) );
}
global $penci_avatars;
$penci_avatars = new Penci_Avatars();

function get_penci_avatar( $id_or_email, $size = 96, $default = '', $alt = '', $args = array() ) {
	return apply_filters( 'penci_avatar', get_avatar( $id_or_email, $size, $default, $alt, $args ) );
}
