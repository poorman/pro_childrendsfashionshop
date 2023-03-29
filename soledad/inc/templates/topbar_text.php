<?php if( penci_get_setting( 'penci_tb_date_text' ) ){
$custom_text = penci_get_setting( 'penci_tb_date_text' );
?>
<div class="pctopbar-item penci-topbar-ctext">
	<?php echo do_shortcode( $custom_text ); ?>
</div>
<?php } ?>