<?php

class Theme_Hook {
	public $cb;

	public function __construct() {
		$this->cb = IWF_CallbackManager_Hook::get_instance( 'theme' );
		$this->cb->set_callable_class( $this );

		$this->cb->add_action( 'widgets_init', 'remove_default_widgets' );
		$this->cb->add_action( 'admin_menu', 'remove_admin_menu' );
		$this->cb->add_action( 'wp_dashboard_setup', 'remove_dashboard_widgets' );
		$this->cb->add_action( 'pre_get_posts', 'query_filter' );
		$this->cb->add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
		$this->cb->add_action( 'wp_head', 'head_scripts' );
		$this->cb->add_action( 'template_redirect', 'before_filter' );

		$this->cb->add_filter( 'posts_clauses', 'posts_sql_filter', 10, 2 );
		$this->cb->add_filter( 'wp_before_admin_bar_render', 'remove_admin_bar_menu' );
		$this->cb->add_filter( 'tiny_mce_before_init', 'override_mce_options' );
		$this->cb->add_filter( 'wp_terms_checklist_args', 'terms_checklist_args', 10, 2 );

		add_filter('acf/settings/show_admin', '__return_false');
		add_filter( 'wpcf7_support_html5', '__return_false' );
		//add_filter( 'pre_site_transient_update_core', '__return_zero' );
		//add_filter( 'pre_site_transient_update_plugins', '__return_zero' );

		remove_action( 'wp_head', 'wp_shortlink_wp_head' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'welcome_panel', 'wp_welcome_panel' );
		remove_action( 'wp_version_check', 'wp_version_check' );
		remove_action( 'admin_init', '_maybe_update_core' );

		remove_filter( 'the_title', 'wptexturize' );
		remove_filter( 'the_excerpt', 'wptexturize' );
		remove_filter( 'the_content', 'wptexturize' );
		remove_filter( 'the_content', 'wpautop' );
		remove_filter( 'comment_text', 'wptexturize' );
	}

	/**
	 * テンプレート表示前の処理
	 */
	public function before_filter() {

	}

	/**
	 * TinyMCEの空タグ削除を抑制
	 *
	 * @param array $init_array
	 *
	 * @return array
	 */
	public function override_mce_options( $init_array ) {
		global $allowedposttags;

		$init_array['valid_elements']          = '*[*]';
		$init_array['extended_valid_elements'] = '*[*]';
		$init_array['valid_children']          = '+a[' . implode( '|', array_keys( $allowedposttags ) ) . ']';
		$init_array['indent']                  = true;
		$init_array['wpautop']                 = false;

		return $init_array;
	}

	/**
	 * チェックされたタクソノミーが一番上にこないようにする
	 *
	 * @param array $args
	 * @param int $post_id
	 *
	 * @return array
	 */
	public function terms_checklist_args( $args, $post_id ) {
		if ( ! isset( $args['checked_ontop'] ) || $args['checked_ontop'] !== false ) {
			$args['checked_ontop'] = false;
		}

		return $args;
	}

	/**
	 * クエリーフィルター
	 *
	 * @param $the_query WP_Query
	 */
	public function query_filter( $the_query ) {
		if ( is_admin() ) {
			return;
		}

		if ( $the_query->is_main_query() && $the_query->is_post_type_archive( 'gallery' ) ) {
			$the_query->set( 'meta_query', array(
				array(
					'key' => '_thumbnail_id'
				)
			) );
		}
	}

	/**
	 * SQLフィルター
	 *
	 * @param $sql
	 * @param $the_query
	 *
	 * @return array
	 */
	public function posts_sql_filter( $sql, $the_query ) {
		return $sql;
	}

	/**
	 * CSS/JavaScriptの読み込み
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.css' );
		wp_enqueue_style( 'theme-component', get_stylesheet_directory_uri() . '/component.css' );
		wp_enqueue_style( 'theme-utility', get_stylesheet_directory_uri() . '/utility.css' );
		wp_enqueue_style( 'theme-fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox/jquery.fancybox.css' );

		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-carouFredSel', get_stylesheet_directory_uri() . '/js/carouFredSel/jquery.carouFredSel-6.2.1.js' );
		wp_enqueue_script( 'jquery-page-scroller', get_stylesheet_directory_uri() . '/js/jquery.page-scroller.js' );
		wp_enqueue_script( 'jquery-fancybox', get_stylesheet_directory_uri() . '/js/jquery.fancybox/jquery.fancybox.pack.js' );
		wp_enqueue_script( 'jquery-heightLine', get_stylesheet_directory_uri() . '/js/jquery.heightLine.js' );
		wp_enqueue_script( 'jquery-masonry', get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js' );
		wp_enqueue_script( 'jquery-imagesloaded', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js' );
		wp_enqueue_script( 'jquery-common', get_stylesheet_directory_uri() . '/js/common.js' );
	}

	/**
	 * headタグ内の独自スクリプト
	 */
	public function head_scripts() {
		if ( is_page_template( 'tmpl-home.php' ) ) {
			?>
			<style>
				.wptouch-desktop-switch {
					clear: both;
					position: absolute !important;
					left: 0;
					width: 100%;
					font-size: 14px !important;
					font-weight: normal !important;
					padding: 0 !important;
				}
			</style>
			<script type="text/javascript">
				jQuery(function($) {
					$('body').imagesLoaded(function() {
						var windowHeight = $(document).height();
							footerHeight = $('.global-footer').height() + 420;
						$('.wptouch-desktop-switch').css('top', (windowHeight - footerHeight) + 'px');
					});
				});
			</script>
			<?php
		}
	}

	/**
	 * 管理メニューを削除
	 */
	public function remove_admin_menu() {
		remove_menu_page( 'edit.php' ); // 投稿
		remove_menu_page( 'edit-tags.php?taxonomy=link_category' ); // リンク
		remove_menu_page( 'edit-comments.php' ); // コメント
	}

	/**
	 * デフォルトのダッシュボードウィジェットを削除
	 */
	public function remove_dashboard_widgets() {
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	}

	/**
	 * デフォルトウィジェットを削除
	 */
	public function remove_default_widgets() {
		unregister_widget( 'WP_Widget_Pages' );
		unregister_widget( 'WP_Widget_Calendar' );
		unregister_widget( 'WP_Widget_Archives' );
		unregister_widget( 'WP_Widget_Links' );
		unregister_widget( 'WP_Widget_Meta' );
		unregister_widget( 'WP_Widget_Search' );
		unregister_widget( 'WP_Widget_Text' );
		unregister_widget( 'WP_Widget_Categories' );
		unregister_widget( 'WP_Widget_Recent_Posts' );
		unregister_widget( 'WP_Widget_Recent_Comments' );
		unregister_widget( 'WP_Widget_RSS' );
		unregister_widget( 'WP_Widget_Tag_Cloud' );
		unregister_widget( 'WP_Nav_Menu_Widget' );
	}

	public function remove_admin_bar_menu() {
		global $wp_admin_bar;
		// updates
		$wp_admin_bar->remove_menu( 'updates' );

		// comments
		$wp_admin_bar->remove_menu( 'comments' );

		// new-content
		$wp_admin_bar->remove_menu( 'new-content' );
		$wp_admin_bar->remove_menu( 'new-post' );
		$wp_admin_bar->remove_menu( 'new-media' );
		$wp_admin_bar->remove_menu( 'new-page' );
		$wp_admin_bar->remove_menu( 'new-user' );
	}
}

global $theme_hook;
$theme_hook = new Theme_Hook();
