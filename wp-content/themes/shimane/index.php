<?php
if ( is_super_admin() ) {
	wp_die( '[index.php] を表示しています。<br>マッチしたルール：' . $wp->matched_rule );

} else {
	die( '404 Not Found.' );
}