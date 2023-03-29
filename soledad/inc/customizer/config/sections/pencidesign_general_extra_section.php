<?php
$options   = [];
$options[] = array(
	'label'       => esc_attr__( 'YouTube API Key', 'soledad' ),
	'id'          => 'penci_youtube_api_key',
	'type'        => 'soledad-fw-text',
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'description' => __( 'Please go to <a href="https://developers.google.com/youtube/v3/getting-started?hl=en" target="_blank">https://developers.google.com/youtube/v3/getting-started?hl=en</a> and check this giude and get the YouTube API Key', 'soledad' ),
);
$options[] = array(
	'label'       => esc_attr__( 'Weather API Key', 'soledad' ),
	'id'          => 'penci_api_weather_key',
	'type'        => 'soledad-fw-text',
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'description' => __( '<a href="' . esc_url( 'https://openweathermap.org/appid#get' ) . '" target="_blank">' . esc_html__( 'Click here to get an api key', 'soledad' ) . '</a>', 'soledad' )
);
$options[] = array(
	'label'       => esc_attr__( 'Google Map API Key', 'soledad' ),
	'id'          => 'penci_map_api_key',
	'type'        => 'soledad-fw-text',
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'description' => __( 'When you use "Penci Map" element from Elementor or WPBakery page builder, it required an Google Map API to make it works.', 'soledad' ),
);
$options[] = array(
	'label'    => __( 'Select "rel" Attribute Type for Social Media & Social Share Icons', 'soledad' ),
	'id'       => 'penci_rel_type_social',
	'default'  => 'noreferrer',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'none'                         => 'None',
		'nofollow'                     => 'nofollow',
		'noreferrer'                   => 'noreferrer',
		'noopener'                     => 'noopener',
		'noreferrer_noopener'          => 'noreferrer noopener',
		'nofollow_noreferrer'          => 'nofollow noreferrer',
		'nofollow_noopener'            => 'nofollow noopener',
		'nofollow_noreferrer_noopener' => 'nofollow noreferrer noopener',
	)
);
if ( get_option( 'penci_soledad_is_activated' ) ) {
	$options[] = array(
		'label'       => __( 'Disable New Version Update Notice on The Admin Page', 'soledad' ),
		'description' => __( 'You can check <a href="https://imgresources.s3.amazonaws.com/notice-updates.png" target="_blank">this image</a> to understand what\'s "new version update notice on admin page". When a new version released, this notice will appear. This option will help you disable this notice if you want.', 'soledad' ),
		'id'          => 'penci_disable_notice_updates',
		'type'        => 'soledad-fw-toggle',
		'default'     => false,
		'sanitize'    => 'penci_sanitize_checkbox_field'
	);
}
$options[] = array(
	'label'    => __( 'Use Fontawesome Version 5', 'soledad' ),
	'id'       => 'penci_fontawesome_ver5',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);

return $options;
