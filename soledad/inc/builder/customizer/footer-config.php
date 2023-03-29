<?php
$wp_customize->add_section( 'penci_footer_builder_config', array(
	'priority'    => - 1,
	'panel'       => 'penci_footer_section_panel',
	'description' => __( 'You can add new and edit a Footer Template on <a target="_blank" href="' . esc_url( admin_url( '/edit.php?post_type=penci-block' ) ) . '">this page</a>.<br>Please check <a href="https://www.youtube.com/watch?v=kUFqsVYyJig&list=PL1PBMejQ2VTwp9ppl8lTQ9Tq7I3FJTT04&t=809s" target="_blank">this video tutorial</a> to know how to setup your footer builder.', 'soledad' ),
	'title'       => esc_html__( 'Footer Builder', 'soledad' ),
) );

/* Saved Layout */
$wp_customize->add_setting( 'penci_footer_builder_layout', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_footer_builder_layout', [
	'type'    => 'select',
	'label'   => esc_html__( 'General Footer Builder for All Pages', 'soledad' ),
	'section' => 'penci_footer_builder_config',
	'choices' => penci_builder_block_list(),
] ) );

$wp_customize->add_setting( 'penci_footer_builder_layout_homepage', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_footer_builder_layout_homepage', [
	'type'    => 'select',
	'label'   => esc_html__( 'Footer Builder for Homepage', 'soledad' ),
	'section' => 'penci_footer_builder_config',
	'choices' => penci_builder_block_list(),
] ) );

$wp_customize->add_setting( 'penci_footer_builder_layout_archive', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_footer_builder_layout_archive', [
	'type'    => 'select',
	'label'   => esc_html__( 'Footer Builder for Category,Tag, Search, Archive Pages', 'soledad' ),
	'section' => 'penci_footer_builder_config',
	'choices' => penci_builder_block_list(),
] ) );

$wp_customize->add_setting( 'penci_footer_builder_layout_page', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_footer_builder_layout_page', [
	'type'    => 'select',
	'label'   => esc_html__( 'Footer Builder for Pages', 'soledad' ),
	'section' => 'penci_footer_builder_config',
	'choices' => penci_builder_block_list(),
] ) );

$wp_customize->add_setting( 'penci_footer_builder_layout_post', array(
	'default'           => '',
	'sanitize_callback' => 'penci_sanitize_choices_field'
) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'penci_footer_builder_layout_post', [
	'type'    => 'select',
	'label'   => esc_html__( 'Footer Builder for Single Post Pages', 'soledad' ),
	'section' => 'penci_footer_builder_config',
	'choices' => penci_builder_block_list(),
] ) );
