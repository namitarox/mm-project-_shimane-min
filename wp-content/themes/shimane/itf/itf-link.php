<?php

class ITF_Link {
	public static $option_set = '';

	public static $post_type = 'page';

	protected static $_latest_url_key = '';

	protected static $_url_keys = '';

	public static function setting_fields( IWF_SettingsPage_Section $section, array $menus, $args = array() ) {
		self::$option_set = $section->get_option_set();

		$args = self::_parse_args( $args, array(
			'orderby' => 'menu_order',
			'order'   => 'asc',
		) );

		$page_list = IWF_CustomPost::get_list_recursive( self::$post_type, array(
			'orderby' => $args['orderby'],
			'order'   => $args['order']
		) );

		foreach ( $menus as $slug => $name ) {
			$section->c( $name )
			        ->select( $slug . '_' . self::$post_type . '_id', $page_list, array( 'empty' => true ) )->nbsp
				->text( $slug . '_' . self::$post_type . '_url_hash', null, array( 'label' => 'ページ内リンク # %s', 'style' => 'width: 70px' ) )->br
				->checkbox( $slug . '_' . self::$post_type . '_link_is_external', 1, array( 'label' => '%s 外部リンクを利用 （URL：' ) )->nbsp
				->text( $slug . '_' . self::$post_type . '_url', null, array( 'style' => 'width: 50%', 'validation' => 'url' ) )->nbsp
				->checkbox( $slug . '_' . self::$post_type . '_link_is_blank', 1, array( 'label' => '%s ウィンドウで開く）' ) );
		}
	}

	public static function is_new_window( $key = null, $args = array() ) {
		$args = self::_parse_args( $args );

		if ( empty( $key ) ) {
			if ( self::$_latest_url_key ) {
				$key = self::$_latest_url_key;

			} else {
				return false;
			}
		}

		if ( iwf_get_option( ( self::$option_set ? self::$option_set . '.' : '' ) . $key . '_' . self::$post_type . '_link_is_blank' ) ) {
			return true;
		}

		return false;
	}

	public static function target_blank( $key = null, $args = array() ) {
		$args = self::_parse_args( $args, array(
			'echo' => true
		) );

		$text = '';

		if ( self::is_new_window( $key, $args ) ) {
			$text = ' target="_blank"';
		}

		if ( $args['echo'] ) {
			echo $text;

		} else {
			return $text;
		}
	}

	public static function get_url_ife( $key, $query = array(), $args = array() ) {
		$args = self::_parse_args( $args );
		$url  = null;

		if (
			! iwf_get_option( ( self::$option_set ? self::$option_set . '.' : '' ) . $key . '_' . self::$post_type . '_link_is_external' )
			&& ( $page_id = iwf_get_option( ( self::$option_set ? self::$option_set . '.' : '' ) . $key . '_' . self::$post_type . '_id' ) )
		) {
			$url = get_permalink( $page_id );

		} else if ( $outerlink_url = iwf_get_option( ( self::$option_set ? self::$option_set . '.' : '' ) . $key . '_' . self::$post_type . '_url' ) ) {
			$url = $outerlink_url;
		}

		$url = iwf_create_url( $url, $query );

		if ( $hash = iwf_get_option( ( self::$option_set ? self::$option_set . '.' : '' ) . $key . '_' . self::$post_type . '_url_hash' ) ) {
			$url .= '#' . $hash;
		}

		self::$_url_keys[] = self::$_latest_url_key = $key;
		self::$_url_keys   = array_unique( self::$_url_keys );

		return $url;
	}

	public static function get_link_ife( $key, $title, $query = array(), $args = array(), $attr = array() ) {
		$args = self::_parse_args( $args );
		$url  = self::get_url_ife( $key, $query, $args );

		$attr = wp_parse_args( $attr, array(
			'href' => $url
		) );

		if ( self::is_new_window( $key, $args ) ) {
			$attr['target'] = '_blank';
		}

		if ( ! $title ) {
			$title = $url;
		}

		if ( self::is_current_page( $url ) ) {
			IWF_Tag_Element_Node::add_class( $attr, 'current' );
		}

		return iwf_html_tag( 'a', $attr, $title );
	}

	public static function is_current_page( $url ) {
		$_root_relative_current = untrailingslashit( iwf_get_array( $_SERVER, 'REQUEST_URI' ) );
		$current_url            = ( is_ssl() ? 'https://' : 'http://' ) . iwf_get_array( $_SERVER, 'HTTP_HOST' ) . $_root_relative_current;
		$_indexless_current     = untrailingslashit( preg_replace( '/index.php$/', '', $current_url ) );
		$raw_url                = strpos( $url, '#' ) ? substr( $url, 0, strpos( $url, '#' ) ) : $url;
		$url                    = untrailingslashit( $raw_url );

		return in_array( $url, array( $current_url, $_indexless_current, $_root_relative_current ) );
	}

	public static function get_url_keys() {
		return self::$_url_keys;
	}

	protected static function _parse_args( $args = array(), $defaults = array() ) {
		if ( $args && is_string( $args ) ) {
			$args = array( 'post_type' => $args );
		}

		$args = wp_parse_args( $args, array(
			'post_type'  => '',
			'option_set' => ''
		) );

		$args = wp_parse_args( $args, $defaults );

		if ( $args['post_type'] ) {
			self::$post_type = $args['post_type'];
		}

		if ( $args['option_set'] ) {
			self::$option_set = $args['option_set'];
		}

		unset( $args['post_type'], $args['option_set'] );

		return $args;
	}
}