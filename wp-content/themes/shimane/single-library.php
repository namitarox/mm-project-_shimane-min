<?php
if ( is_preview() ) {
	locate_template( 'archive-library.php', true, false );
	exit();
}

wp_redirect( home_url() );
exit();