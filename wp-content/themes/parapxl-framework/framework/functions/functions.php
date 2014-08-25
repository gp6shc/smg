<?php
/**
 * WP Theme Functions
 *
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 */


	
	/* Define Paths */
		define('FW_FUNCTIONS', get_template_directory() . '/framework/functions' );
		define('FW_RESOURCES', get_template_directory().'/framework/resources' );
		define('FW_RESOURCES_PATH', get_template_directory_uri().'/framework/resources' );
		define('RESOURCES', '/resources' );
		define('PARENT_PATH', get_template_directory().RESOURCES);
		if ( get_template_directory() === get_stylesheet_directory() ) define('CHILD_PATH', false);
		else define('CHILD_PATH', get_stylesheet_directory() . RESOURCES);
		define('TEMPLATES', get_stylesheet_directory() . '/templates' );
		
	/* Query Helper */
		$pxl_query = false;
		
	/* PHP Helper Functions */
		include( FW_FUNCTIONS . '/phpfn.php' );
		include( FW_FUNCTIONS . '/class.formcast.php' );
		
	/* Theme Setup */
		include( get_stylesheet_directory() . '/setup.php' );
		
	// Framework
		include( FW_FUNCTIONS . '/class.pxl.php');

	// Custom admin login 
	function custom_login_logo() {
		echo '<style type="text/css">
		h1 a { background-image: url(http://sachsmedia.com/rockheaven/assets/images/smg_logo.png) !important; }
		</style>';
	}
	add_action('login_head', 'custom_login_logo');
	
	function the_title_limit($length, $replacer = '...') {
 $string = the_title('','',FALSE);
 if(strlen($string) > $length)
 $string = (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
 echo $string;
}