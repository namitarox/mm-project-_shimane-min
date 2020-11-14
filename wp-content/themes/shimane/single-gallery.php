<?php
if ( is_preview() ) {
	locate_template( 'archive-gallery.php', true, false );
	exit();
}

wp_redirect( home_url() );
exit();