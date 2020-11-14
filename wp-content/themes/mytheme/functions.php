<?php

//*-------------------------------------------------------
//*                   自動更新停止
//*-------------------------------------------------------

// add_filter( 'auto_update_plugin', '__return_false' );
// add_filter( 'auto_update_theme', '__return_false' );
// add_filter( 'auto_update_translation', '__return_false' );

//*-------------------------------------------------------
//*                   管理画面メニュー非表示
//*-------------------------------------------------------
// function remove_menus(){
//   remove_menu_page( 'index.php' );                  // ダッシュボード
//   remove_menu_page( 'edit.php' );                   // 投稿
//   remove_menu_page( 'upload.php' );                 // メディア
//   remove_menu_page( 'edit.php?post_type=page' );    // 固定ページ
//   remove_menu_page( 'edit-comments.php' );          // コメント
//   remove_menu_page( 'themes.php' );                 // 外観
//   remove_menu_page( 'plugins.php' );                // プラグイン
//   remove_menu_page( 'users.php' );                  // ユーザー
//   remove_menu_page( 'tools.php' );                  // ツール
//   remove_menu_page( 'options-general.php' );        // 設定

//   remove_submenu_page( 'themes.php', 'widgets.php' );  // 外観->ウィジェット
// }
// add_action( 'admin_menu', 'remove_menus' );

// 管理バー非表示
add_filter('show_admin_bar', '__return_false');


/// titleタグの出力
add_theme_support( 'title-tag' );

//アイキャッチ画像の表示
add_theme_support( 'post-thumbnails' );

	//アイキャッチ画像の定義と切り抜き/
add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
  add_image_size('small_thumbnail', 532, 320 ,true );
  add_image_size('large_thumbnail', 1200, 774, true );
}

//archiveページでのdescriptionの設定
add_filter( 'aioseop_description', 'my_change_description');
function my_change_description( $description ) {
  if(is_post_type_archive()){
    $description = 'yourDescription';
  }
  return $description;
}

// <script> などの type属性削除

function remove_type_attr($tag) {
  return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}
add_filter('script_loader_tag', 'remove_type_attr');
add_filter('style_loader_tag', 'remove_type_attr');



/**
 * 絵文字機能削除
 */
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
 }
 add_action( 'init', 'disable_emojis' );

 /**
  * Filter function used to remove the tinymce emoji plugin.
  *
  * @param array $plugins
  * @return array Difference betwen the two arrays
  */
 function disable_emojis_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
  return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
  return array();
  }
 }

 /**
  * Remove emoji CDN hostname from DNS prefetching hints.
  *
  * @param array $urls URLs to print for resource hints.
  * @param string $relation_type The relation type the URLs are printed for.
  * @return array Difference betwen the two arrays.
  */
 function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
  /** This filter is documented in wp-includes/formatting.php */
  $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

 $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }

 return $urls;
 }



