<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide Comments & Comment Form', 'soledad' ),
	'id'       => 'penci_post_hide_comments',
	'type'     => 'soledad-fw-toggle',
);

$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Move Comment Form to Above the List Comments', 'soledad' ),
	'id'       => 'penci_post_move_comment_box',
	'type'     => 'soledad-fw-toggle',
);

$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Hide "Name" field on Comment Form', 'soledad' ),
	'id'          => 'penci_single_comments_remove_name',
	'type'        => 'soledad-fw-toggle',
	'description' => __( 'Note that: If you want to hide this field - you need go to Dashboard > Settings > Discussion > and un-check to "Comment author must fill out name and email" - check <a href="https://imgresources.s3.amazonaws.com/discussion_settings.png" target="_blank">this image</a> for more.', 'soledad' ),
);

$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Hide "Email" field on Comment Form', 'soledad' ),
	'id'          => 'penci_single_comments_remove_email',
	'description' => __( 'Note that: If you want to hide this field - you need go to Dashboard > Settings > Discussion > and un-check to "Comment author must fill out name and email" - check <a href="https://imgresources.s3.amazonaws.com/discussion_settings.png" target="_blank">this image</a> for more.', 'soledad' ),
	'type'        => 'soledad-fw-toggle',
);

$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Hide "Website" field on Comment Form', 'soledad' ),
	'id'       => 'penci_single_comments_remove_website',
	'type'     => 'soledad-fw-toggle',
);

$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => __( 'Remove checkbox "Save my name, email, and website in this browser for the next time I comment."', 'soledad' ),
	'id'          => 'penci_single_hide_save_fields',
	'description' => __( 'Note that: This checkbox just appears when you use Wordpress from version 4.9.6', 'soledad' ),
	'type'        => 'soledad-fw-toggle',
);

$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => __( 'Enable GDPR message on Comment Form', 'soledad' ),
	'id'       => 'penci_single_gdpr',
	'type'     => 'soledad-fw-toggle',
);

$options[] = array(
	'default'     => esc_html__( '* By using this form you agree with the storage and handling of your data by this website.', 'soledad' ),
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => esc_html__( 'Custom GDPR Message on Comment Form', 'soledad' ),
	'id'          => 'penci_single_gdpr_text',
	'description' => '',
	'type'        => 'soledad-fw-textarea',
);

return $options;
