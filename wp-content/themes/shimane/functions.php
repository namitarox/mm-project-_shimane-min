<?php
require_once dirname( __FILE__ ) . '/iwf/iwf-loader.php';

IWF_Loader::init( array(
	dirname( __FILE__ ) . '/itf/itf-functions.php',
	dirname( __FILE__ ) . '/theme-lib/theme-custom-post.php',
	dirname( __FILE__ ) . '/theme-lib/theme-settings-page.php',
	dirname( __FILE__ ) . '/theme-lib/theme-hook.php',
	dirname( __FILE__ ) . '/theme-lib/theme-shortcode.php',
	dirname( __FILE__ ) . '/theme-lib/theme-util.php'
) );

register_nav_menus( array(
	'header_navi' => 'ヘッダー',
	'footer_navi' => 'フッター',
	'doctor'      => '医師・医学生',
	'narse'       => '看護・看護学生',
	'about'       => '島根県民医連について',
) );