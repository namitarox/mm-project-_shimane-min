<?php
require_once get_template_directory() . '/iwf/iwf-loader.php';

IWF_Loader::init( array(
	get_template_directory() . '/itf/itf-functions.php',
	get_template_directory() . '/theme-lib/theme-custom-post.php',
	get_template_directory() . '/theme-lib/theme-settings-page.php',
	get_template_directory() . '/theme-lib/theme-hook.php',
	get_template_directory() . '/theme-lib/theme-shortcode.php',
	get_template_directory() . '/theme-lib/theme-util.php'
) );

do_action( 'wptouch_functions_start' );

add_filter( 'wp_title', 'foundation_set_title' );

function foundation_set_title( $title ) {
	global $wptouch_pro;
	if ( $wptouch_pro->showing_mobile_theme ) {
		return $title . ' ' . wptouch_get_bloginfo( 'site_title' );
	} else {
		return $title;
	}
}


