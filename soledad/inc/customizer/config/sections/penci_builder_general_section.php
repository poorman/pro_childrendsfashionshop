<?php

$header_options     = [];
$header_options[''] = __( '- Select -', 'soledad' );
$header_layouts     = get_posts( [
	'post_type'      => 'penci_builder',
	'posts_per_page' => - 1,
] );
foreach ( $header_layouts as $header_builder ) {
	$header_options[ $header_builder->post_name ] = $header_builder->post_title;
}
$options   = [];
$options[] = array(
	'id'       => 'pchdbd_all',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-select',
	'label'    => esc_html__( 'General Header Builder for All Pages', 'soledad' ),
	'choices'  => $header_options,
);

$options[] = array(
	'id'       => 'pchdbd_homepage',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-select',
	'label'    => esc_html__( 'Header Builder for Homepage', 'soledad' ),
	'choices'  => $header_options,
);

$options[] = array(
	'id'       => 'pchdbd_archive',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-select',
	'label'    => esc_html__( 'Header Builder for Category,Tag, Search, Archive Pages', 'soledad' ),
	'choices'  => $header_options,
);

$options[] = array(
	'id'       => 'pchdbd_post',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-select',
	'label'    => esc_html__( 'Header Builder for Single Post Pages', 'soledad' ),
	'choices'  => $header_options,
);

$options[] = array(
	'id'       => 'pchdbd_page',
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'type'     => 'soledad-fw-select',
	'label'    => esc_html__( 'Header Builder for Pages', 'soledad' ),
	'choices'  => $header_options,
);

return $options;
