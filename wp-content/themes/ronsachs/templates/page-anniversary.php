<?php /* Template Name: Anniversary */

if ( is_user_logged_in() ) {
	wp_redirect('/anniversary/people/', 301);
	exit;
}else{
	wp_redirect('/');
	exit;		
}

?>