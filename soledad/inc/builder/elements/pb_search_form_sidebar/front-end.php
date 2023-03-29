<?php
$class   = [];
$class[] = 'search-style-' . penci_get_builder_mod( 'penci_header_pb_search_form_sidebar_style' );
$class[] = penci_get_builder_mod( 'penci_header_pb_search_form_sidebar_menu_class' );
penci_search_form( [
	'wrapper_custom_classes' => 'penci-builder-element pc-search-form pc-search-form-sidebar ' . implode( ' ', $class ),
	'el_classes'             => 'pc-searchform',
] );
