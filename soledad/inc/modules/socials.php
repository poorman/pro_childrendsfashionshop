<div class="inner-header-social">
	<?php 
	$social_data = penci_social_media_array();
	foreach( $social_data as $name => $sdata ){
		if( $sdata[0] ){
			$icon_html = penci_icon_by_ver( $sdata[1] );
			?>
			<a href="<?php echo esc_url( do_shortcode( $sdata[0] ) ); ?>" aria-label="<?php echo ucwords( $name ); ?>" <?php echo penci_reltag_social_icons(); ?> target="_blank"><?php echo $icon_html; ?></a>
			<?php
		}
	}
	?>
</div>