<?php
if( !defined( 'ABSPATH' ) )	exit;

global $wpdb;
define('VQZB_VERSION', '2.15');
define('VQZB_INCS_DIR', realpath(dirname(__FILE__).'/../').'/inc/');
define('VQZB_MODELS_DIR', realpath(dirname(__FILE__).'/../').'/models/');
define('VQZB_HELPERS_DIR', realpath(dirname(__FILE__).'/../').'/helpers/');
define('VQZB_LIBRARIES_DIR', realpath(dirname(__FILE__).'/../').'/libraries/');
define('VQZB_ACTIONS_DIR', realpath(dirname(__FILE__).'/../').'/actions/');
define('VQZB_VIEWS_DIR', dirname(__FILE__).'/../views/');
define('VQZB_CSS_DIR', trailingslashit(WP_PLUGIN_URL.'/'.plugin_basename(__FILE__).'/../../public/css/'));
define('VQZB_JS_DIR', trailingslashit(WP_PLUGIN_URL.'/'.plugin_basename(__FILE__).'/../../public/js/'));
define('VQZB_IMG_DIR', trailingslashit(WP_PLUGIN_URL.'/'.plugin_basename(__FILE__).'/../../public/images/'));
define('VQZB_IMG_URL', trailingslashit(WP_PLUGIN_URL.'/'.plugin_basename(__FILE__).'/../../public/images/'));
define('VQZB_FONTS_DIR', realpath(dirname(__FILE__).'/../').'/public/fonts/');

/* Text placeholders */
define('VQZB_RESULT_VALUE_PLHDR', '{%result value%}');
define('VQZB_QUIZ_LINK_PLHDR', '{%link to test%}');
define('VQZB_ROW_BREAK_PLHDR', '{%br%}');
define('VQZB_QUIZ_NAME_PLHDR', '{%quiz name%}');
define('VQZB_RES_IMG_URL_PLHDR', '{%image url%}');

/* QUIZ shortcode */
define('VQZB_SHORTCODE_NAME', 'vqzb quiz_id=');

/* RESULT IMAGES FOLDER & URL */
define('VQZB_RESULT_IMG_DIR', realpath(dirname(__FILE__).'/../').'/uploads/result_images/');
//define('VQZB_RESULT_IMG_URL', trailingslashit(WP_PLUGIN_URL.'/vqzbuilder/uploads/result_images/'));
define('VQZB_RESULT_IMG_URL', plugins_url('/uploads/result_images/', dirname(__FILE__)));

/* RESULT BACKGROUND IMAGES FOLDER*/
define('VQZB_RESULT_BG_IMG_DIR', realpath(dirname(__FILE__).'/../').'/uploads/result_bg_images/');

/* TEMPORARY FILES FOLDER */
define('VQZB_TMP_UPLOADS_DIR', realpath(dirname(__FILE__).'/../').'/uploads/tmp/');

/* IMAGE GENERATE DEFAULT OPTIONS */
define('VQZB_DEFAULT_BG_COLOR', 'ffffff');//default background color
define('VQZB_DEFAULT_TXT_COLOR', '000000');//default text color
define('VQZB_DEFAULT_FONT_ID', 1);//default font type
define('VQZB_DEFAULT_TXT_SIZE', 1);//default text size
define('VQZB_DEFAULT_TXT', PHP_EOL.PHP_EOL.PHP_EOL.'         Thank you'.PHP_EOL.'      Your score is'.PHP_EOL.'       {%result value%}');//default text
define('VQZB_DEFAULT_RESULT_VALUE', rand(1,1000));//default result value

/* FILE UPLOAD SETTINGS*/
define('VQZB_IMG_TYPES', 'jpg, jpeg, gif, png');//allowed file extensions
define('VQZB_MAX_FILE_SIZE', min(vqzb_get_max_filesize(), 1024*1024));//max upload file size

/**
 * Get max file size from php.ini in number format
 * @return int Php.ini max dile size
 */
function vqzb_get_max_filesize()
{
    $size = ini_get('upload_max_filesize');
    $l = substr($size, -1);
    $ret = substr($size, 0, -1);
    switch(strtoupper($l)){
    case 'P':
        $ret *= 1024;
    case 'T':
        $ret *= 1024;
    case 'G':
        $ret *= 1024;
    case 'M':
        $ret *= 1024;
    case 'K':
        $ret *= 1024;
        break;
    }
    return $ret;
}

/**
 * Opt-in Gate settings 
 */
define('VQZB_AWEBER_APP_ID', 'e05428b5');
define('VQZB_ICONTACT_APP_ID', 'E8xkuzNU3EGNx4TUKVGOezrZjuB9nznK');