<?php

class vqb_SMPLicense
{

    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new vqb_SMPLicense;
        }
        return self::$instance;
    }

    /**
     * @param $plugin_name string (must match license in SMP - case insensitive)
     * @param $licensed_email (license email)
     * @param $license_key (license key)
     * @param $ucount (set to 1)
     */
    public static function checkLicense($plugin_name, $licensed_email, $license_key, $ucount)
    {
        $license_key = trim($license_key);
        $licensed_email = trim($licensed_email);
        $smp_location = 'http://smp.whitesquareim.com';
        $smp_api_key = 'JAHSGTY651BB819KAJSHBAHST';

        $api_url = $smp_location . '/index.php/api/license_api/license/lkey/' . $license_key . '/email/' . $licensed_email . '/block/0/key/' . $smp_api_key . '/ucount/' . $ucount . '/format/json';
        $licenseValid = wp_remote_get($api_url);
        if (!is_wp_error($licenseValid)) {
            $response = json_decode($licenseValid['body']);
            if ($response) {
                if ($response->times_used >= $response->max_use) {
                    $result = array(
                        "status" => "declined",
                        "reason" => "Your license has already reached the maximum number of activatations.  If you feel this is in error, please contact our support department."
                    );
                } else if (strpos(strtolower($response->product_name), strtolower($plugin_name)) === false) {
                    $result = array(
                        "status" => "declined",
                        "reason" => "This particular license key isn't for our " . $plugin_name . " product.  Are you sure this license is for " . $plugin_name . " and not another one of our products?  <br/><br/>If you're sure that the details are correct then please contact our support department."
                    );
                } else {
                    $result = array(
                        "status" => "accepted"
                    );
                }
            } else {
                // invalid license
                $result = array(
                    "status" => "incorrect",
                    "reason" => "Sorry, we can't seem to find a license key on file with those details. Make sure you have entered your details correctly. <br/><br/>If you feel this is an error then just let us know through our support desk and we'll take care of that for you."
                );
            }
        } // couldn't connect to server
        else {
            $result = array(
                "status" => "error",
                "reason" => "We couldn't connect to the license server.  Please make sure that CURL is activated on your web host - alternatively contact support and we'll get this sorted for you."
            );
        }
        return $result;
    }
}

?>