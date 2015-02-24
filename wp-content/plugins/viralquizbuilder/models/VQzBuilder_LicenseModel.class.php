<?php
class VQzBuilder_LicenseModel extends VQzBuilder_ModelCore
{
    public function createTable()
    {

    }

    public static function getCredentials()
    {
        return array(
            'email' => get_option("vqzBuilder_license_email", ""),
            'license' => get_option("vqzBuilder_license_key", ""),
            'val' => get_option("vqb_l_a", FALSE)
        );
    }

    public static function setCredentials($email,$license)
    {
            update_option("vqzBuilder_license_email", $email);
            update_option("vqzBuilder_license_key", $license);
    }

    public static function setVal()
    {
        update_option("vqb_l_a","VAL");
    }
}
