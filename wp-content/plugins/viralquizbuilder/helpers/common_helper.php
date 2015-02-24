<?php

/*
 * Sanitize POST
 */
function vqzb_sanitize_post()
{
    $_POST = stripslashes_deep($_POST);
}

function vqzb_redirect($url)
{
    wp_redirect($url . '&noheader=true');
    exit;
}

/*
 * Send headers on admin page if they hasn't been already sent
 */
function vqzb_send_admin_headers()
{
    if (isset($_GET['noheader']))
        require_once(ABSPATH . 'wp-admin/admin-header.php');
}

/**
 * Start session if it hasn't been started yet
 */
function vqzb_start_session()
{
    if (isset($_GET['noheader']) && !session_id())
        session_start();
}

/**
 * Include admin footer
 */
function vqzb_include_admin_footer()
{
    require_once (ABSPATH . 'wp-admin/admin-footer.php');
}

/**
 * Check if value is numeric - contains only numders 0-9
 * @param mixed $val Value to check 
 */
function vqzb_is_numeric($val)
{
    if (!preg_match("|^[\d]+$|", $val))
        return FALSE;
    return TRUE;
}

function vqzb_is_valid_email($email)
{
    $p = '/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/';
    return preg_match($p, $email);
}

/**
 * Check if value is hexadecimal color - contains only numders 0-9, letters a-f, length = 6
 * @param mixed $val Value to check 
 */
function vqzb_is_color($val)
{
    if (!preg_match("|^[a-fA-F0-9]{6}$|", $val))
        return FALSE;
    return TRUE;
}

/**
 * Set field value
 * 
 * @param string $name Field name
 * @param string $cur_val Current field value (from POST or DB)
 * @param string $default Default field value
 * @return string 
 */
function vqzb_set_value($name, $cur_val = FALSE, $default = NULL)
{
    if (isset($_POST[$name]))
        return esc_html($_POST[$name]);
    elseif ($cur_val)
        return esc_html($cur_val);
    return esc_html($default);
}

/**
 * Set checkbox
 * 
 * @param mixed $field_name field name
 * @param string $field_val field value
 * @param mixed $cur_val current item value (default: FALSE)
 * @param mixed $default default field value (default: NULL)
 */
function vqzb_set_checkbox($field_name, $cur_val = FALSE, $default = FALSE)
{
    if ($_POST)
    {
        if (isset($_POST[$field_name]))
            return 'checked';
    }

    if ($cur_val)
    {
        if ($cur_val == 1)
            return 'checked';
    }

    if ($default)
        return 'checked';

    return '';
}

/**
 * Set radio button
 * 
 * @param mixed $field_name field name
 * @param string $field_val field value
 * @param mixed $cur_val current item value (default: FALSE)
 * @param mixed $default default field value (default: NULL)
 */
function vqzb_set_radio($field_name, $field_val, $cur_val = FALSE, $default = FALSE)
{
    if ($_POST && isset($_POST[$field_name]))
        $cur_val = $_POST[$field_name];

    if ($cur_val)
    {
        if (is_array($cur_val))
            return in_array($field_val, $cur_val) ? 'checked' : '';
        else
            return $field_val == $cur_val ? 'checked' : '';
    }

    if (is_array($default))
        return in_array($field_val, $default) ? 'checked' : '';
    else
        return $field_val == $default ? 'checked' : '';

    return '';
}

/**
 * Set select
 * 
 * @param mixed $field_name field name
 * @param string $field_val field value
 * @param mixed $cur_val current item value (default: FALSE)
 * @param mixed $default default field value (default: NULL)
 */
function vqzb_set_select($field_name, $field_val, $cur_val = FALSE, $default = FALSE)
{
    if ($_POST)
        $cur_val = $_POST[$field_name];

    if ($cur_val || $cur_val == '')
    {
        if (is_array($cur_val))
            return in_array($field_val, $cur_val) ? 'selected' : '';
        else
            return $field_val == $cur_val ? 'selected' : '';
    }

    if (is_array($default))
        return in_array($field_val, $default) ? 'selected' : '';
    else
        return $field_val == $default ? 'selected' : '';

    return '';
}

/**
 * Print errors in admin page
 * @param array $errors 
 */
function vqzb_show_admin_errors($errors)
{
    // check if there are any errors in SESSION data
    if (isset($_SESSION['errors']))
    {
        $errors += $_SESSION['errors'];
        unset($_SESSION['errors']);
    }

    if (!empty($errors))
    {
        echo '<div id="message" class="error">';
        foreach ($errors as $error)
        {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
    }
}

/**
 * Print success message in admin page
 * @param string $success
 */
function vqzb_show_admin_success($success)
{
    // check if there is a success message in SESSION data
    if (isset($_SESSION['success']))
    {
        $success .= $_SESSION['success'];
        unset($_SESSION['success']);
    }

    if ($success != '')
        echo '<div id="message" class="updated"><p>' . $success . '</p></div>';
}

/**
 * Get the item list from db plus additional fields if it is required
 * @param string $item Item name
 * @param mixed $additional_fields Additional fields array(array('field_name' => 'field_value')). Default = NULL. NOTE: field_name must be not numeric!
 * @return array Item array
 */
function vqzb_get_item_list($item, $additional_fields = NULL)
{
    $model_name = 'VQzBuilder_' . ucwords($item) . 'Model';
    $oitem = new $model_name;
    $result_list = $oitem->get_list();
    if (is_array($additional_fields))
    {
        foreach ($additional_fields as $val)
        {
            $result_list[] = $val;
        }
    }
    return $result_list;
}

/**
 * Get the user IP address
 */
function vqzb_get_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    return $_SERVER['REMOTE_ADDR'];
}

/**
 * Get the result measurement string
 * @param type $quiz_id
 * @param type $value
 */
function vqzb_get_value_measurement($quiz_id, $value)
{
    $quiz = VQzBuilder_QuizModel::getInstance()->get_one($quiz_id);

    // get the result measurement
    $measure_sing = vqzb_get_quiz_measurement($quiz['custom_measurement_sing'], $quiz['measurement']);
    $measure_pl = vqzb_get_quiz_measurement($quiz['custom_measurement_pl'], $quiz['measurement_pl']);

    // options for image generation
    $result_measure = vqzb_get_measurement_str($measure_sing, $measure_pl, $value);
    return $result_measure;
}

/**
 * Check what measurement the quiz has - custom or standard and get it
 * @param string $custom
 * @param string $standard
 * @return string Measurement
 */
function vqzb_get_quiz_measurement($custom, $standard)
{
    return $custom !== NULL ? $custom : $standard;
}

/**
 * Get the right measurement string (singular or plural)
 * @param string $sing Measurement in singular
 * @param string $pl Measurement in plural
 * @param string $value Measured value
 * @return string Measurement in singular or plural depends on value
 */
function vqzb_get_measurement_str($sing, $pl, $value = VQZB_DEFAULT_RESULT_VALUE)
{
    if ($value == 1)
        return $sing;
    return $pl;
}

/**
 * Delete all files from directory
 * @param string $dir Directory to empty 
 */
function vqzb_clear_dir($dir)
{
    if ($handle = opendir($dir))
    {
        while (false !== ($file = readdir($handle)))
        {
            if ($file != "." && $file != "..")
            {
	@unlink($dir . $file);
            }
        }
        closedir($handle);
    }
}

/**
 * Get short url using tinyurl.com service
 * @param string $url The url to be shorted
 * @return string Short url 
 */
function vqzb_get_tiny_url($url)
{
    $tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=" . $url);
    return $tinyurl;
}

/**
 * Replace all placeholders in result social text with the custom values
 * @param string $social_text Text which contains placeholders
 * @param string $quiz_url Quiz url (will replace the VQZB_QUIZ_LINK_PLHDR)
 * @param string $quiz_name Quiz name (will replace the VQZB_QUIZ_NAME_PLHDR)
 * @param string $value Result value (will replace the VQZB_RESULT_VALUE_PLHDR)
 * @param string $img_url Result image URL (will replace the VQZB_RESULT_VALUE_PLHDR)
 * @return string string Social text ready to be shown to user 
 */
function vqzb_get_social_text($social_text, $quiz_url, $quiz_name, $value, $img_url)
{
    return str_replace(array(VQZB_QUIZ_LINK_PLHDR, VQZB_QUIZ_NAME_PLHDR, VQZB_RESULT_VALUE_PLHDR, VQZB_RES_IMG_URL_PLHDR), array($quiz_url, $quiz_name, $value, $img_url), $social_text);
}

function vqzb_i18n($slug)
{
    $i18n = VQzBuilder_I18nModel::getInstance()->get_by_slug($slug);
    if ($i18n['translate'] != '')
        return $i18n['translate'];
    return $i18n['original'];
}

/**
 * Count the number percentage of total
 * @param integer $number
 * @param integer $total 
 */
function vqzb_get_percent($number, $total)
{
    if ($total == 0)
        return 0;
    return round($number * 100 / $total);
}

function vqzb_folder_to_zip($folder, &$zipFile, $subfolder = null) {
    if ($zipFile == null) {
        // no resource given, exit
        return false;
    }
    // we check if $folder has a slash at its end, if not, we append one
    $folder .= end(str_split($folder)) == "/" ? "" : "/";
    $subfolder .= end(str_split($subfolder)) == "/" ? "" : "/";
    // we start by going through all files in $folder
    $handle = opendir($folder);
    while ($f = readdir($handle)) {
        if ($f != "." && $f != "..") {
            if (is_file($folder . $f)) {
                // if we find a file, store it
                // if we have a subfolder, store it there
                if ($subfolder != null)
                    $zipFile->addFile($folder . $f, $subfolder . $f);
                else
                    $zipFile->addFile($folder . $f);
            } elseif (is_dir($folder . $f)) {
                // if we find a folder, create a folder in the zip 
                $zipFile->addEmptyDir($f);
                // and call the function again
                vqzb_folder_to_zip($folder . $f, $zipFile, $f);
            }
        }
    }
}

/*
 * Check if user is loading a page in the Viral Quiz Builder admin area
 */
function is_vqzb_admin_page() {
    if((stripos($_SERVER['REQUEST_URI'], "admin.php?page=vqzb_")!==FALSE) && (is_admin())) {
        return true;
    }
    return false;
}

function filter_custom_code($optin_custom_code) {
    $optin_custom_code = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $optin_custom_code);
    $optin_custom_code = preg_replace('#<style(.*?)>(.*?)</style>#is', '', $optin_custom_code);
    $patterns = array();
    $patterns[0] = '/<div[^>]*>/';
    $patterns[1] = '/<\/div>/';
    $patterns[3] = '/<span[^>]*>/';
    $patterns[4] = '/<\/span>/';
    $patterns[5] = '/<li[^>]*>/';
    $patterns[6] = '/<\/li>/';
    $patterns[7] = '/<ul[^>]*>/';
    $patterns[8] = '/<\/ul>/';
    $patterns[9] = '/<em[^>]*>/';
    $patterns[10] = '/<\/em>/';
    $patterns[11] = '/<p[^>]*>/';
    $patterns[12] = '/<\/p>/';
    $patterns[13] = '/<label[^>]*>/';
    $patterns[14] = '/<\/label>/';
    $patterns[15] = '/<a[^>]*>/';
    $patterns[16] = '/<\/a>/';
    $replacements = array();
    $replacements[2] = '';
    $replacements[1] = '';
    $optin_custom_code= preg_replace($patterns, $replacements, $optin_custom_code);
    $optin_custom_code=stripslashes($optin_custom_code);
    // remove new window/tab redirects
    $optin_custom_code = preg_replace('/target=\"_blank\"/i', '', $optin_custom_code);
    $optin_custom_code = preg_replace('/target=\"_new\"/i', '', $optin_custom_code);
    $optin_custom_code = preg_replace('/onsubmit=\"(.*?)\"/i', '', $optin_custom_code);
    $optin_custom_code = preg_replace('/onclick=\"(.*?)\"/i', '', $optin_custom_code);
    //remove blank lines
    $optin_custom_code = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "", $optin_custom_code);
    return $optin_custom_code;
}