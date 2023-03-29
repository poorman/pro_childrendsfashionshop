<?php
$options = [];
/* Add Options */
$options[]      = array(
	'default'  => 'Type and hit enter...',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Type and hit enter..."', 'soledad' ),
	'id'       => 'penci_trans_type_and_hit',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'read',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "read" - suffix of reading time', 'soledad' ),
	'id'       => 'penci_trans_read',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'views',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "views"', 'soledad' ),
	'id'       => 'penci_trans_countviews',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'ago',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "ago" after Time Ago Format', 'soledad' ),
	'id'       => 'penci_trans_tago',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => '',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Add Text Before Time Ago Format', 'soledad' ),
	'id'       => 'penci_trans_beforeago',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Published:',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Published:"', 'soledad' ),
	'id'       => 'penci_trans_published',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Last Updated on',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Last Updated on"', 'soledad' ),
	'id'       => 'penci_trans_modifiedat',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'comment',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "comment"', 'soledad' ),
	'id'       => 'penci_trans_comment',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'     => 'comments',
	'sanitize'    => 'sanitize_text_field',
	'label'       => __( 'Text: "comments"', 'soledad' ),
	'description' => __( 'for plural of comments', 'soledad' ),
	'id'          => 'penci_trans_comments',
	'type'        => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Reply',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Reply"', 'soledad' ),
	'id'       => 'penci_trans_reply_comment',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Edit',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Edit"', 'soledad' ),
	'id'       => 'penci_trans_edit_comment',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Your comment is awaiting approval',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Your comment is awaiting approval"', 'soledad' ),
	'id'       => 'penci_trans_wait_approval_comment',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Save my name, email, and website in this browser for the next time I comment.',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Save my name, email, and website in this browser for the next time I comment."', 'soledad' ),
	'id'       => 'penci_trans_save_fields',
	'type'     => 'soledad-fw-textarea',
);
$options[]      = array(
	'default'  => 'by',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "by"', 'soledad' ),
	'id'       => 'penci_trans_by',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Home',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Home"', 'soledad' ),
	'id'       => 'penci_trans_home',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Newer Posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Newer Posts"', 'soledad' ),
	'id'       => 'penci_trans_newer_posts',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Older Posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Older Posts"', 'soledad' ),
	'id'       => 'penci_trans_older_posts',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Load More Posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Load More Posts"', 'soledad' ),
	'id'       => 'penci_trans_load_more_posts',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Load More Comments',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Load More Comments"', 'soledad' ),
	'id'       => 'penci_trans_load_more_comments',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Sorry, No more posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Sorry, No more posts"', 'soledad' ),
	'id'       => 'penci_trans_no_more_posts',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Sorry, No more comments',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Sorry, No more comments"', 'soledad' ),
	'id'       => 'penci_trans_no_more_comments',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Sorry, No comments found.',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Sorry, No comments found."', 'soledad' ),
	'id'       => 'penci_trans_no_comments',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'All',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "All"', 'soledad' ),
	'id'       => 'penci_trans_all',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Back To Top',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Back To Top"', 'soledad' ),
	'id'       => 'penci_trans_back_to_top',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'written by',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "written by"', 'soledad' ),
	'id'       => 'penci_trans_written_by',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'previous post',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "previous post"', 'soledad' ),
	'id'       => 'penci_trans_previous_post',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'next post',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "next post"', 'soledad' ),
	'id'       => 'penci_trans_next_post',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Next',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Next"', 'soledad' ),
	'id'       => 'penci_trans_next',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Back',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Back"', 'soledad' ),
	'id'       => 'penci_trans_back',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Name*',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Name*"', 'soledad' ),
	'id'       => 'penci_trans_name',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Email*',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Email*"', 'soledad' ),
	'id'       => 'penci_trans_email',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Website',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Website"', 'soledad' ),
	'id'       => 'penci_trans_website',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Your Comment',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Your Comment"', 'soledad' ),
	'id'       => 'penci_trans_your_comment',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Leave a Comment',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Leave a Comment"', 'soledad' ),
	'id'       => 'penci_trans_leave_a_comment',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Cancel Reply',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Cancel Reply"', 'soledad' ),
	'id'       => 'penci_trans_cancel_reply',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Submit',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Submit"', 'soledad' ),
	'id'       => 'penci_trans_submit',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Category:',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Category:"', 'soledad' ),
	'id'       => 'penci_trans_category',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Continue Reading',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Continue Reading"', 'soledad' ),
	'id'       => 'penci_trans_continue_reading',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Read more',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Read more"', 'soledad' ),
	'id'       => 'penci_trans_read_more',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'View All',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "View All"', 'soledad' ),
	'id'       => 'penci_trans_view_all',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Tag:',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Tag:"', 'soledad' ),
	'id'       => 'penci_trans_tag',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Tags',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Tags"', 'soledad' ),
	'id'       => 'penci_trans_tags',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Posts tagged with',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Posts tagged with"', 'soledad' ),
	'id'       => 'penci_trans_posts_tagged',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Author',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Author"', 'soledad' ),
	'id'       => 'penci_trans_author',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Daily Archives',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Daily Archives"', 'soledad' ),
	'id'       => 'penci_trans_daily_archives',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Monthly Archives',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Monthly Archives"', 'soledad' ),
	'id'       => 'penci_trans_monthly_archives',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Yearly Archives',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Yearly Archives"', 'soledad' ),
	'id'       => 'penci_trans_yearly_archives',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Archives',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Archives"', 'soledad' ),
	'id'       => 'penci_trans_archives',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Search',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Search"', 'soledad' ),
	'id'       => 'penci_trans_search',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Search results for',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Search results for"', 'soledad' ),
	'id'       => 'penci_trans_search_results_for',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Share',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Share"', 'soledad' ),
	'id'       => 'penci_trans_share',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Comments are closed.',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Comments are closed."', 'soledad' ),
	'id'       => 'penci_trans_comments_closed',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Sorry, but nothing matched your search terms. Please try again with some different keywords."', 'soledad' ),
	'id'       => 'penci_trans_search_not_found',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Back to Home Page',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Back to Home Page"', 'soledad' ),
	'id'       => 'penci_trans_back_to_homepage',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Recent',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Recent"', 'soledad' ),
	'id'       => 'penci_trans_recent',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Popular',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Popular"', 'soledad' ),
	'id'       => 'penci_trans_popular',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Post',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Post"', 'soledad' ),
	'id'       => 'penci_trans_post',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Posts"', 'soledad' ),
	'id'       => 'penci_trans_posts',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'No results',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "No results"', 'soledad' ),
	'id'       => 'penci_trans_npostfound',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'Show all results',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "Show all results"', 'soledad' ),
	'id'       => 'penci_trans_allresult',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'default'  => 'minutes',
	'sanitize' => 'sanitize_text_field',
	'label'    => __( 'Text: "minutes"', 'soledad' ),
	'id'       => 'penci_trans_minutes',
	'type'     => 'soledad-fw-text',
);
$options[]      = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Login/Register Form', 'soledad' ),
	'id'       => 'penci_loginform_heading',
	'type'     => 'soledad-fw-header',
);
$login_register = array(
	'penci_trans_hello_text'             => esc_html__( 'Hello', 'soledad' ),
	'penci_trans_dashboard_text'         => esc_html__( 'Dashboard', 'soledad' ),
	'penci_trans_profile_text'           => esc_html__( 'Profile', 'soledad' ),
	'penci_trans_logout_text'            => esc_html__( 'Logout', 'soledad' ),
	'penci_trans_sign_in'                => esc_html__( 'Sign In', 'soledad' ),
	'penci_trans_register_new_account'   => esc_html__( 'Register New Account', 'soledad' ),
	'penci_trans_recover_pass'           => esc_html__( 'Password Recovery', 'soledad' ),
	'penci_trans_usernameemail_text'     => esc_html__( 'Username or email', 'soledad' ),
	'penci_plogin_email_place'           => esc_html__( 'Email Address', 'soledad' ),
	'penci_trans_pass_text'              => esc_html__( 'Password', 'soledad' ),
	'penci_plogin_label_remember'        => esc_html__( 'Keep me signed in until I sign out', 'soledad' ),
	'penci_plogin_label_log_in'          => esc_html__( 'Login to your account', 'soledad' ),
	'penci_plogin_label_lostpassword'    => esc_html__( 'Forgot your password?', 'soledad' ),
	'penci_plogin_text_has_account'      => esc_html__( 'Do not have an account ?', 'soledad' ),
	'penci_plogin_label_registration'    => esc_html__( 'Register here', 'soledad' ),
	'penci_plogin_validate_robot'        => esc_html__( 'Please validate you are not robot.', 'soledad' ),
	'penci_plogin_wrong'                 => esc_html__( 'Wrong username or password', 'soledad' ),
	'penci_plogin_success'               => esc_html__( 'Login successful, redirecting...', 'soledad' ),
	'penci_preset_submit'                => esc_html__( 'Send My Password', 'soledad' ),
	'penci_preset_desc'                  => esc_html__( 'A new password will be emailed to you.', 'soledad' ),
	'penci_preset_received'              => esc_html__( 'Have received a new password?', 'soledad' ),
	'penci_preset_noemail'               => esc_html__( 'There is no user registered with that email.', 'soledad' ),
	'penci_preset_from'                  => esc_html__( 'From:', 'soledad' ),
	'penci_preset_newpassis'             => esc_html__( 'Your new password is:', 'soledad' ),
	'penci_preset_checkinbox'            => esc_html__( 'Check your email address to get the new password.', 'soledad' ),
	'penci_preset_cantsend'              => esc_html__( 'The email could not be sent. Possible reason: your host may have disabled the mail() function.', 'soledad' ),
	'penci_preset_somethingwrong'        => esc_html__( 'Oops! Something went wrong while updating your account.', 'soledad' ),
	'penci_pregister_first_name'         => esc_html__( 'First Name', 'soledad' ),
	'penci_pregister_last_name'          => esc_html__( 'Last Name', 'soledad' ),
	'penci_pregister_user_name'          => esc_html__( 'Username', 'soledad' ),
	'penci_pregister_user_email'         => esc_html__( 'Email address', 'soledad' ),
	'penci_pregister_user_pass'          => esc_html__( 'Password', 'soledad' ),
	'penci_pregister_pass_confirm'       => esc_html__( 'Confirm Password', 'soledad' ),
	'penci_pregister_button_submit'      => esc_html__( 'Sign up new account', 'soledad' ),
	'penci_pregister_has_account'        => esc_html__( 'Have an account?', 'soledad' ),
	'penci_pregister_label_registration' => esc_html__( 'Login here', 'soledad' ),
	'penci_plogin_mess_invalid_email'    => esc_html__( 'Invalid email.', 'soledad' ),
	'penci_plogin_mess_error_email_pass' => esc_html__( 'Password does not match the confirm password', 'soledad' ),
	'penci_plogin_mess_username_reg'     => esc_html__( 'This username is already registered.', 'soledad' ),
	'penci_plogin_mess_email_reg'        => esc_html__( 'This email address is already registered.', 'soledad' ),
	'penci_plogin_mess_wrong_email_pass' => esc_html__( 'Wrong username or password.', 'soledad' ),
	'penci_plogin_mess_reg_succ'         => esc_html__( 'Registered successful, redirecting...', 'soledad' ),
);
foreach ( $login_register as $login_register_id => $login_register_label ) {
	$options[] = array(
		'default'  => $login_register_label,
		'sanitize' => 'sanitize_text_field',
		'label'    => __( 'Text: "' . $login_register_label . '"', 'soledad' ),
		'id'       => $login_register_id,
		'type'     => 'soledad-fw-text',
	);
}

return $options;
