<?php
/**
 * Inspire Theme Framework (ITF)
 *
 * @package   ITF
 * @author    Masayuki Ietomi <jyokyoku@gmail.com>
 * @copyright Copyright(c) 2013 Masayuki Ietomi
 * @link      http://inspire-tech.jp
 */

if ( !class_exists( 'IWF_Loader' ) ) {
	die( 'itf-functions.php needs Inspire WordPress Framework (IWF).' );
}

require_once dirname(__FILE__) . '/itf-link.php';

/**
 * 都道府県一覧を返す
 *
 * @param bool $group 都道府県をエリア毎に分類するか
 * @return array
 */
function itf_get_pref_list( $group = false ) {
	$pref_groups = array(
		'北海道' => array(
			'北海道',
		),
		'東北' => array(
			'青森県', '岩手県', '秋田県', '宮城県', '山形県', '福島県'
		),
		'関東' => array(
			'東京都', '神奈川県', '埼玉県', '千葉県', '茨城県', '栃木県', '群馬県'
		),
		'甲信越・北陸' => array(
			'新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県'
		),
		'東海' => array(
			'岐阜県', '静岡県', '愛知県', '三重県'
		),
		'近畿' => array(
			'滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県'
		),
		'中国' => array(
			'鳥取県', '島根県', '岡山県', '広島県', '山口県'
		),
		'四国' => array(
			'徳島県', '香川県', '愛媛県', '高知県'
		),
		'九州・沖縄' => array(
			'福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
		)
	);

	if ( $group ) {
		return $pref_groups;
	}

	$prefs = array();

	foreach ( $pref_groups as $pref_group => $_prefs ) {
		$prefs = array_merge( $prefs, $_prefs );
	}

	return $prefs;
}

/**
 * メールアドレスをJavaScriptを利用して出力
 *
 * @param       $email
 * @param null  $subject
 * @param array $attr
 * @return string
 */
function itf_mail_to_safe( $email, $subject = null, $attr = array() ) {
	$text = $email;
	$email = explode( "@", $email );
	$subject and $subject = '?subject=' . $subject;
	$output = '<script type="text/javascript">';
	$output .= '(function() {';
	$output .= 'var user = "' . $email[0] . '";';
	$output .= 'var at = "@";';
	$output .= 'var server = "' . $email[1] . '";';
	$output .= "document.write('<a href=\"' + 'mail' + 'to:' + user + at + server + '$subject\">$text</a>');";
	$output .= '})();';
	$output .= '</script>';

	return $output;
}

/**
 * 文字列を指定した長さで切り取り末尾に$ellipsisをつけて返す
 *
 * @param        $text
 * @param int    $length
 * @param string $ellipsis
 * @return string
 */
function itf_get_truncate( $text, $length = 200, $ellipsis = '...' ) {
	$text = strip_tags( do_shortcode( $text ) );

	if ( mb_strlen( $text ) > $length ) {
		$text = mb_substr( $text, 0, $length ) . $ellipsis;
	}

	return $text;
}

/**
 * 指定されたアップロードファイルの実際のファイルパスを返す
 * （マルチサイト限定）
 *
 * @param $blog_id
 * @param $media_url
 * @return mixed
 */
function itf_calc_media_url( $media_url ) {
	global $wpdb;

	if ( !is_multisite() ) {
		return $media_url;
	}

	$pathes = array();

	foreach ( iwf_get_blogs( array( 'exclude_id' => $wpdb->siteid ) ) as $blog ) {
		switch_to_blog( $blog->blog_id );
		$blog_url = get_bloginfo( 'url' );
		restore_current_blog();

		if ( strpos( $media_url, $blog_url ) !== false ) {
			$media_url = preg_replace( '|/[^/]+?/wp-content/|', '/wp-content/', $media_url );
			break;
		}
	}

	return $media_url;
}

/**
 * 時間から日本語の曜日を返す
 *
 * @param int|string $time
 * @return null
 */
function itf_get_weekday_jp( $time ) {
	$num = is_numeric( $time ) ? $time : date( 'w', strtotime( $time ) );
	$weekday = array( '日', '月', '火', '水', '木', '金', '土' );

	return isset( $weekday[$num] ) ? $weekday[$num] : null;
}

/**
 * 時間から英語の曜日を返す
 *
 * @param int|string $time
 * @param bool       $short 省略表記を使うか
 * @return null
 */
function itf_get_weekday_en( $time, $short = false ) {
	$num = date( 'w', strtotime( $time ) );
	$weekday = $short
		? array( 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat' )
		: array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' );

	return isset( $weekday[$num] ) ? $weekday[$num] : null;
}

/**
 * 時間を日本の元号で返す
 *
 * @param int|string $time
 * @param string     $format 出力形式
 * @return string
 */
function itf_get_gengou( $time, $format = '%s%s' ) {
	list( $y, $m, $d ) = explode( ' ', date( 'Y m d', is_numeric( $time ) ? $time : strtotime( $time ) ) );
	$ret = '';

	if ( $y < 1868 ) {
		return ( $ret );
	}

	if ( $y >= 1868 && $y < 1912 ) {
		$ret = '明治';

	} else if ( $y >= 1913 && $y < 1926 ) {
		$ret = '大正';

	} else if ( $y >= 1927 && $y < 1989 ) {
		$ret = '昭和';

	} else if ( $y >= 1990 ) {
		$ret = '平成';

	} else if ( $y == 1912 ) {
		if ( $m < 7 ) {
			$ret = '明治';

		} else if ( $m > 7 ) {
			$ret = '大正';

		} else {
			if ( $d <= 29 ) {
				$ret = '明治';

			} else {
				$ret = '大正';
			}
		}

	} else if ( $y == 1926 ) {
		if ( $m < 12 ) {
			$ret = '大正';

		} else {
			if ( $d <= 24 ) {
				$ret = '大正';

			} else {
				$ret = '昭和';
			}
		}

	} else if ( $y == 1989 ) {
		if ( $m > 1 ) {
			$ret = '平成';

		} else {
			if ( $d <= 7 ) {
				$ret = '昭和';

			} else {
				$ret = '平成';
			}
		}
	}

	if ( $ret == '明治' ) {
		$year = $y - 1867;

	} else if ( $ret == '大正' ) {
		$year = $y - 1911;

	} else if ( $ret == '昭和' ) {
		$year = $y - 1925;

	} else if ( $ret == '平成' ) {
		$year = $y - 1988;
	}

	return sprintf( $format, $ret, $year );
}

/**
 * URLが現在のページかどうか
 *
 * @param $url
 * @return bool
 */
function itf_is_current_page( $url ) {
	return ITF_Link::is_current_page( $url );
}

/**
 * テキスト中のメールアドレスとURLにリンクを張る
 *
 * @param      $text
 * @param bool $window
 * @return string
 */
function itf_auto_link( $text, $window = false ) {
	$placeholders = array();
	$patterns = array(
		'#(?<!href="|src="|">)((?:https?|ftp|nntp)://[^\s<>()]+)#i',
		'#(?<!href="|">)(?<!\b[[:punct:]])(?<!http://|https://|ftp://|nntp://)www.[^\n\%\ <]+[^<\n\%\,\.\ <](?<!\))#i'
	);

	foreach ( $patterns as $pattern ) {
		if ( preg_match_all( $pattern, $text, $matches ) ) {
			foreach ( $matches[0] as $match ) {
				$key = md5( $match );
				$placeholders[$key] = $match;
				$text = str_replace( $match, $key, $text );
			}
		}
	}

	$replace = array();

	foreach ( $placeholders as $md5 => $url ) {
		$link = $url;

		if ( !preg_match( '#^[a-z]+\://#', $url ) ) {
			$url = 'http://' . $url;
		}

		$replace[$md5] = "<a href=\"{$url}\"";

		if ( $window ) {
			$replace[$md5] .= " target=\"_blank\"";
		}

		$replace[$md5] .= ">{$url}</a>";
	}

	return strtr( $text, $replace );
}

/**
 * 指定した住所からGoogleのジオロケーションを返す
 *
 * @param $address
 * @return bool
 */
function itf_get_geo_location( $address ) {
	$data = file_get_contents( 'http://maps.google.co.jp/maps/api/geocode/json?address=' . urlencode( $address ) . '&sensor=false' );

	if ( ( $json = json_decode( $data, true ) ) && $json['status'] == 'OK' ) {
		return $json['results'][0];
	}

	return false;
}

function itf_create_menu_setting_fields( IWF_SettingsPage_Section $section, array $menus, $args = array() ) {
	ITF_Link::setting_fields( $section, $menus, $args );
}

function itf_get_url_ife( $key, $query = array(), $args = array() ) {
	return ITF_Link::get_url_ife( $key, $query, $args );
}

function itf_open_new_window( $key = null, $args = array() ) {
	return ITF_Link::is_new_window( $key, $args );
}

function itf_target_blank( $key = null, $args = array() ) {
	ITF_Link::target_blank( $key, array_merge( $args, array( 'echo' => true ) ) );
}

function itf_get_link_ife( $key, $title, $query = array(), $args = array(), $attr = array() ) {
	return ITF_Link::get_link_ife( $key, $title, $query, $args, $attr );
}