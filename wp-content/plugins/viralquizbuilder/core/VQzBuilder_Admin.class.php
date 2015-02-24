<?php

/*
 * Admin class
 */

class VQzBuilder_Admin extends VQzBuilder_Core
{
    /*
        * Add admin menu/submenu pages
        */
    function add_adminmenu_pages()
    {

        add_menu_page('Viral Quiz Builder', 'Viral Quiz Builder', 'manage_options', 'vqzb_quiz_grid', array($this, 'quiz_grid'), VQZB_IMG_DIR . 'vqzb-icon.png');
        add_submenu_page('vqzb_quiz_grid', 'Add quiz', 'Add quiz', 'manage_options', 'vqzb_add_quiz', array(VQzBuilder_QuizAction::getInstance(), 'add'));
        add_submenu_page('vqzb_quiz_grid', 'Quiz Statistics', 'Quiz Statistics', 'manage_options', 'vqzb_statistic', array($this, 'statistic'));
        add_submenu_page('vqzb_quiz_grid', 'Language Settings', 'Language Settings', 'manage_options', 'vqzb_translate', array($this, 'translate'));
        add_submenu_page('vqzb_quiz_grid', 'Export/Import Quiz data', 'Export/Import Quiz data', 'manage_options', 'vqzb_transfer_data', array(VQzBuilder_DataTransferAction::getInstance(), 'pageHandler'));
        add_submenu_page(null, 'VQB Log File', 'VQB Log File', 'administrator', 'vqbLog', array($this, 'vqb_log'));

    }

    /**
     * Register js scripts
     */
    function register_js()
    {
        wp_register_script('jquery_validate', VQZB_JS_DIR . 'jquery.validate.js', array('jquery'), '1.9.0', false);
        wp_register_script('jquery.tablednd', VQZB_JS_DIR . 'jquery.tablednd.js', array('jquery'), '0.4.0', false);
        wp_register_script('vqzb_colorpicker', VQZB_JS_DIR . 'colorpicker.js', array('jquery'), '1.0.0', false);
        wp_register_script('jquery.form', VQZB_JS_DIR . 'jquery.form.js', array('jquery'), '3.04', false);
        wp_register_script('vqzb_tiny_mce', VQZB_JS_DIR . 'tiny_mce/tiny_mce.js', array('jquery'), '1.0.0', false);
        wp_register_script('vqzb_common', VQZB_JS_DIR . 'admin/common.js', array('jquery'), '1.0.0', false);
        wp_register_script('vqzb_quiz_form', VQZB_JS_DIR . 'admin/vqzb_quiz_form.js', array('jquery'), '1.0.0', false);
        wp_register_script('vqzb_question_form', VQZB_JS_DIR . 'admin/vqzb_question_form.js', array('jquery'), '1.0.0', false);
        wp_register_script('vqzb_statistic_page', VQZB_JS_DIR . 'admin/vqzb_statistic_page.js', array('jquery'), '1.0.0', false);
        wp_register_script('vqzb_result_content_form', VQZB_JS_DIR . 'admin/vqzb_result_content_form.js', array('jquery', 'vqzb_tiny_mce'), '1.0.0', false);
        wp_register_script('vqzb_result_badge_form', VQZB_JS_DIR . 'admin/vqzb_result_badge_form.js', array('jquery', 'vqzb_colorpicker'), '1.0.0', false);
        wp_register_script('vqzb_result_optin_form', VQZB_JS_DIR . 'admin/vqzb_result_optin_form.js', array('jquery'), '1.0.0', false);
        wp_register_script('vqzb_result_page', VQZB_JS_DIR . 'admin/vqzb_result_page.js', array('jquery'), '1.0.0', false);
        // bar chart scripts
        wp_register_script('jquery.flot', VQZB_JS_DIR . 'jquery.flot.js', array('jquery'), '0.7.0', false);
        wp_register_script('excanvas', VQZB_JS_DIR . 'excanvas.js', array('jquery', 'jquery.flot'), '1.0.0', false);
        // wistia popover script
        wp_register_script('wistia_popover', VQZB_JS_DIR . 'wistia_popover.js');
    }

    /**
     * Enqueue js scripts
     */
    function enqueue_js()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery_validate');
        wp_enqueue_script('vqzb_common');
        wp_enqueue_script('wistia_popover');
    }

    /**
     * Register css styles
     */
    function register_css()
    {
        wp_register_style('vqzb_admin_css', VQZB_CSS_DIR . 'admin.css', array(), '1.0.0', false);
        wp_register_style('vqzb_colorpicker_css', VQZB_CSS_DIR . 'colorpicker.css', array(), '1.0.0', false);
    }

    /**
     * Enqueue css styles
     */
    function enqueue_css()
    {
        wp_enqueue_style('vqzb_admin_css');
    }

    /**
     * log page for error debugging
     */
    function vqb_log()
    {
        $view_array = array(
            'log_contents' => VQzBuilder_LogModel::getInstance()->get_log_file()
        );
        vqzb_send_admin_headers();
        $this->load_view('log_page.php', $view_array, TRUE);
    }

    /**
     *  Quiz grid page loader
     */
    function quiz_grid()
    {
        vqzb_start_session();

        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'la':
                    $this->vqb_la();
                    die;
                case 'del_quiz':
                    //call delete quiz function
                    VQzBuilder_QuizAction::getInstance()->delete($_GET['quiz_id']);
                    die;
                case 'edit_quiz':
                    //edit quiz function
                    wp_enqueue_script('vqzb_quiz_form');
                    wp_enqueue_script('jquery.tablednd');
                    VQzBuilder_QuizAction::getInstance()->edit($_GET['quiz_id']);
                    die;
                case 'quiz_statistic':
                    VQzBuilder_QuizAction::getInstance()->quizStatistic();
                    die;
                case 'add_question':
                    //add question function
                    wp_enqueue_script('vqzb_tiny_mce');
                    wp_enqueue_script('vqzb_question_form');
                    wp_enqueue_script('jquery.tablednd');
                    VQzBuilder_QuestionAction::getInstance()->add($_GET['quiz_id']);
                    die;
                case 'edit_question':
                    //edit question function
                    //wp_enqueue_script('vqzb_tiny_mce');
                    wp_enqueue_script('vqzb_question_form');
                    wp_enqueue_script('jquery.tablednd');
                    VQzBuilder_QuestionAction::getInstance()->edit($_GET['question_id']);
                    die;
                case 'del_question':
                    //delete question function
                    VQzBuilder_QuestionAction::getInstance()->delete($_GET['question_id']);
                    die;
                case 'result_page':
                    //result page edit function
                    wp_enqueue_script('vqzb_result_page');
                    $this->result_page($_GET['quiz_id']);
                    die;
                case 'add_rescontent':
                    // add quiz result content
                    // wp_enqueue_script('vqzb_tiny_mce');
                    // wp_enqueue_script('vqzb_result_content_form');
                    VQzBuilder_ResultContentAction::getInstance()->add($_GET['quiz_id']);
                    die;
                case 'edit_rescontent':
                    // edit quiz result content
                    wp_enqueue_script('vqzb_tiny_mce');
                    wp_enqueue_script('vqzb_result_content_form');
                    VQzBuilder_ResultContentAction::getInstance()->edit($_GET['id']);
                    die;
                case 'del_rescontent':
                    // delete quiz result content
                    VQzBuilder_ResultContentAction::getInstance()->delete($_GET['id']);
                    die;
                case 'add_resbadge':
                    // add quiz result badge
                    wp_enqueue_script('jquery.form');
                    wp_enqueue_style('vqzb_colorpicker_css');
                    wp_enqueue_script('vqzb_colorpicker');
                    wp_enqueue_script('vqzb_result_badge_form');
                    VQzBuilder_ResultBadgeAction::getInstance()->add($_GET['quiz_id']);
                    die;
                case 'edit_resbadge':
                    // edit quiz result badge
                    wp_enqueue_script('jquery.form');
                    wp_enqueue_style('vqzb_colorpicker_css');
                    wp_enqueue_script('vqzb_colorpicker');
                    wp_enqueue_script('vqzb_result_badge_form');
                    VQzBuilder_ResultBadgeAction::getInstance()->edit($_GET['id']);
                    die;
                case 'del_resbadge':
                    // delete quiz result content
                    VQzBuilder_ResultBadgeAction::getInstance()->delete($_GET['id']);
                    die;
                case 'add_optin_form':
                    // add quiz result opt-in gate form
                    //wp_enqueue_script('vqzb_tiny_mce');
                    //wp_enqueue_script('vqzb_result_optin_form');
                    VQzBuilder_ResultOptInGateAction::getInstance()->addForm($_GET['optin_sett'], $_GET['quiz_id']);
                    die;
                case 'edit_optin_form':
                    // edit quiz result opt-in gate form
                    //wp_enqueue_script('vqzb_tiny_mce');
                    // wp_enqueue_script('vqzb_result_optin_form');
                    VQzBuilder_ResultOptInGateAction::getInstance()->editForm($_GET['id']);
                    die;
                case 'del_optin_form':
                    // delete quiz result opt-in gate form
                    VQzBuilder_ResultOptInGateAction::getInstance()->deleteForm($_GET['id']);
                    die;
            }
        }

        // execute the quiz grid page handler
        VQzBuilder_QuizAction::getInstance()->quizGrid();
    }

    /**
     * Edit results page loader
     * @param integer $quiz_id Quiz id which result page needs to be edited
     */
    function result_page($quiz_id)
    {
        $view_array = array(
            'quiz_id' => $quiz_id,
            'result_contents' => VQzBuilder_ResultContentModel::getInstance()->get_by_quiz($quiz_id),
            'result_badges' => VQzBuilder_ResultBadgeModel::getInstance()->get_by_quiz($quiz_id),
            'optin_systems' => VQzBuilder_OptinSystemModel::getInstance()->get_list(),
            'errors' => array()
        );

        // save the optin system credentials & save
        if ($_POST) {
            vqzb_sanitize_post();

            // delete the previous opt-in setting
            if (!VQzBuilder_OptinSettingModel::getInstance()->delete_by_quiz($quiz_id))
                return FALSE;

            switch ($_POST['optin_system_id']) {
                case 1: // aweber system
                    // validate
                    if (!isset($_POST['aweber_auth_token']) OR ($_POST['aweber_auth_token'] == '')) {
                        // if validation is not success do not run futher code
                        $view_array['aweber_errors'][] = 'Aweber Authorization Token is required.';

                        break;
                    }

                    if (!VQzBuilder_ResultOptInGateAction::getInstance()->authAweberAPP($quiz_id, $_POST['aweber_auth_token']))
                        $view_array['aweber_errors'][] = 'Aweber Authorization failed.';

                    break;

                case 2: // iContact system
                    // validate
                    if (!isset($_POST['icontact_username']) OR ($_POST['icontact_username'] == '')) {
                        // if validation is not success do not run futher code
                        $view_array['icontact_errors'][] = 'iContact Username is required.';
                    }

                    if (!isset($_POST['icontact_password']) OR ($_POST['icontact_password'] == '')) {
                        // if validation is not success do not run futher code
                        $view_array['icontact_errors'][] = 'iContact Api Password is required.';
                    }

                    if (!empty($view_array['errors']))
                        break;

                    if (!VQzBuilder_ResultOptInGateAction::getInstance()->authIContactAPP($quiz_id, $_POST['icontact_username'], $_POST['icontact_password']))
                        $view_array['icontact_errors'][] = 'iContact Authorization failed.';

                    break;

                case 3: // mailchimp system
                    // validate
                    if (!isset($_POST['mailchimp_api_key']) OR ($_POST['mailchimp_api_key'] == '')) {
                        // if validation is not success do not run futher code
                        $view_array['mailchimp_errors'][] = 'MailChimp Api Key is required.';

                        break;
                    }

                    if (!VQzBuilder_ResultOptInGateAction::getInstance()->authMailChimpAPP($quiz_id, $_POST['mailchimp_api_key']))
                        $view_array['mailchimp_errors'][] = 'MailChimp Authorization failed.';

                    break;

                default:
                    // delete the Quiz Opt-in Settings
                    VQzBuilder_OptinSettingModel::getInstance()->delete_by_quiz($quiz_id);
                    break;
            }

            if (isset($_POST['optinGateCode']) && $_POST['optinGateCode']) {
                VQzBuilder_ResultOptInFormModel::getInstance()->edit($quiz_id, array("custom_code" => $_POST['optinGateCode']));
                VQzBuilder_LogModel::getInstance()->vqb_log("Saving web form code for opt in gate");
            }
        }


        vqzb_send_admin_headers();

        $view_array['optin_setting'] = VQzBuilder_OptinSettingModel::getInstance()->get_by_quiz($quiz_id);
        $view_array['optin_forms'] = VQzBuilder_ResultOptInFormModel::getInstance()->get_by_quiz($quiz_id);
        $this->load_view('result_page.php', $view_array, TRUE);
    }

    function vqb_l_scan()
    {
        if (get_option("vqb_l_a", FALSE) != "VAL") {
            if (stripos($_SERVER['REQUEST_URI'], "admin.php?page=vqzb_quiz_grid&action=la") === FALSE) {
                vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=la'));
            }
        }
    }

    function vqb_la()
    {
        // if l key and email address submitted
        $view_array = array();
        if ($_POST) {
            VQzBuilder_LicenseModel::setCredentials($_POST['email'],$_POST['license_key']);
            $vqzb_l_result = vqb_SMPLicense::getInstance()->checkLicense("Viral Quiz Builder", $_POST['email'], $_POST['license_key'], 1);

            if ($vqzb_l_result['status'] != "accepted") {
                $_SESSION['errors'] = array($vqzb_l_result['reason']);
            } else {
                VQzBuilder_LicenseModel::setVal();
                $_SESSION['success'] = "Your license has been successfully activated - Thank you!";
            }
        }

        vqzb_send_admin_headers();

        $view_array['licensedetails']=VQzBuilder_LicenseModel::getCredentials();
        $this->load_view('license_check.php', $view_array, TRUE);
    }

    /**
     * Show statistic page function
     */
    function statistic()
    {
        // start session if it hasn't started yet
        vqzb_start_session();
        // enqueue scripts
        wp_enqueue_script('jquery.flot');
        //wp_enqueue_script('excanvas');
        wp_enqueue_script('vqzb_statistic_page');

        $view_arr = array();
        $oresult = new VQzBuilder_ResultModel();

        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'del_res') {
                if ($oresult->delete($_GET['res_id']))
                    $_SESSION['success'] = "Result successfully deleted.";
                else
                    $_SESSION['errors'] = array("DB error occured");
            } elseif ($_GET['action'] == 'del_all') {
                //delete all statistic from DB
                if (!$oresult->clear_table())
                    $_SESSION['errors'] = array("DB error occured");
                else {
                    $_SESSION['success'] = "Statistic cleared successfully.";

                    // delete result images if needed
                    if ($_GET['del_img'])
                        vqzb_clear_dir(VQZB_RESULT_IMG_DIR); // delete all result images
                }
            }

            //redirect to statistic page
            vqzb_redirect(self_admin_url('admin.php?page=vqzb_statistic'));
        }

        //get data for statistic graphics building
        $view_arr['graph_data'] = $oresult->get_statistic(isset($_GET['quiz_id']) ? $_GET['quiz_id'] : NULL);

        //get results
        $results = $oresult->get_list(isset($_GET['quiz_id']) ? $_GET['quiz_id'] : NULL);

        //set the correct measurement
        foreach ($results as $key => $result) {
            if ($result['quiz_name'] === NULL) {
                $results[$key]['measurement'] = "";
            } elseif ($result['abc_type_answer_id'] != NULL) {
                $results[$key]['measurement'] = '';
            } elseif ($result['measurement_id'] == NULL) {
                $results[$key]['measurement'] = vqzb_get_measurement_str($result['custom_measurement_sing'], $result['custom_measurement_pl'], $result['points']);
            } else {
                $standard_measure = VQzBuilder_MeasurementModel::getInstance()->get_one($result['measurement_id']);
                $results[$key]['measurement'] = vqzb_get_measurement_str($standard_measure['name_sing'], $standard_measure['name_pl'], $result['points']);
            }
        }
        $view_arr['results'] = $results;

        if (isset($_GET['quiz_id']))
            $view_arr['filter_quiz_id'] = $_GET['quiz_id'];

        $view_arr['quizes'] = VQzBuilder_QuizModel::getInstance()->get_list();

        vqzb_send_admin_headers();
        $this->load_view('statistic_page.php', $view_arr, TRUE);
    }

    public function translate()
    {
        vqzb_start_session();
        // check if user submitted the form
        if ($_POST) {
            // sanitize post data
            vqzb_sanitize_post();

            // try to update text translates
            try {
                foreach ($_POST['text'] as $id => $text) {
                    if (!VQzBuilder_I18nModel::getInstance()->edit($id, $text))
                        throw new Exception;
                }
                $_SESSION['success'] = 'Changes saved successfully';
            } catch (Exception $e) {
                $_SESSION['errors'] = array('DB error occured');
            }
            //redirect to the same page
            vqzb_redirect(self_admin_url('admin.php?page=vqzb_translate'));
        }

        $view_arr = array
        (
            'i18n' => VQzBuilder_I18nModel::getInstance()->get_list(),
        );

        vqzb_send_admin_headers();
        $this->load_view('translate.php', $view_arr, TRUE);
    }

}