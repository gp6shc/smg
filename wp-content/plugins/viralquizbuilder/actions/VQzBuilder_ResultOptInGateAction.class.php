<?php

/**
 *  Result Opt-in Gate actions controller
 *
 * Aweber system:
 * - credentials are as folows: consumerKey|consumerSecret|accessKey|accessSecret
 */
class VQzBuilder_ResultOptInGateAction extends VQzBuilder_Core
{

    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new VQzBuilder_ResultOptInGateAction;
        }
        return self::$instance;
    }

    /**
     * Authorize APP to get access to customer's Aweber account & save the opt-in settings for the quiz
     */
    public function authAweberAPP($quiz_id, $auth_token)
    {
        // first get the consumer key & secret
        try {
            if (!$auth = AWeberAPI::getDataFromAweberID($auth_token))
                return FALSE;
        } catch (Exception $e) {
            // authorization failed
            return FALSE;
        }

        // save the new opt-in setting
        return VQzBuilder_OptinSettingModel::getInstance()->add(array(
            'quiz_id' => $quiz_id,
            'optin_system_id' => 1,
            'credentials' => implode('|', $auth),
        ));
    }

    /**
     * Authorize APP & save the opt-in settings for the quiz
     */
    public function authMailChimpAPP($quiz_id, $api_key)
    {
        $mailchimp = new MCAPI($api_key);

        // ping the server with api key
        if (!$mailchimp->ping())
            return FALSE;

        // save the new opt-in setting
        return VQzBuilder_OptinSettingModel::getInstance()->add(array(
            'quiz_id' => $quiz_id,
            'optin_system_id' => 3,
            'credentials' => $api_key,
        ));
    }

    /**
     * Authorize APP to get access to customer's Aweber account & save the opt-in settings for the quiz
     */
    public function authIContactAPP($quiz_id, $username, $password)
    {
        $icontact = new iContactApi($username, $password, VQZB_ICONTACT_APP_ID);

        // try to get the account id
        $account = $icontact->getAccountId();

        if (!$account OR !$account['res'])
            return FALSE;

        // try to get folders
        $folders = $icontact->getFolders($account['account_id']);

        if (!$folders OR !$folders['res'])
            return FALSE;

        // get the first folder id
        $folder_id = $folders['folders']->clientfolders[0]->clientFolderId;

        // save the new opt-in setting
        return VQzBuilder_OptinSettingModel::getInstance()->add(array(
            'quiz_id' => $quiz_id,
            'optin_system_id' => 2,
            'credentials' => $username . '|' . $account['account_id'] . '|' . $folder_id,
            'icontact_password' => $password
        ));
    }

    public function addForm($optin_setting_id, $quiz_id)
    {
        if (!$optin_setting_id) {
            // generate fake entry to protect foreign key relationship with custom code optin forms
            $optin_setting_id = VQzBuilder_OptinSettingModel::getInstance()->add(array(
                'quiz_id' => $quiz_id,
                'optin_system_id' => 1,
                'credentials' => implode('|', array("PLACEHOLD")),
            ));
        }



        $optin_setting = VQzBuilder_OptinSettingModel::getInstance()->get_one($optin_setting_id);
        // if user can add one more result content?
        if (!VQzBuilder_ResultOptInFormModel::getInstance()->can_create($optin_setting['quiz_id'])) {
            //set message
            $_SESSION['errors'] = array('You cannot add result optin form - forms for all result variants already created.');
            // redirect to main result page
            vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $optin_setting['quiz_id']));
        }

        // set some data to pass to view
        $view_array = array
        (
            'vqzb_form_action' => '?page=vqzb_quiz_grid&action=add_optin_form&quiz_id=' . $quiz_id . '&optin_sett=' . $optin_setting_id . '&noheader=true',
            'vqzb_page_title' => 'Add result Opt-in Gate form',
            'quiz_id' => $optin_setting['quiz_id'],
            'email_lists' => $this->getContactLists($optin_setting_id),
        );

        if ($_POST) {
            //sanitize post data
            vqzb_sanitize_post();

            //make some improvements on the POST data
            if (isset($_POST['is_default'])) {
                $_POST['is_default'] = 1;
                if (isset($_POST['points_from']))
                    $_POST['points_from'] = NULL;
                if (isset($_POST['points_to']))
                    $_POST['points_to'] = NULL;
                if (isset($_POST['abc_type_answer_id']))
                    $_POST['abc_type_answer_id'] = NULL;
            } else {
                $_POST['is_default'] = 0;
            }

            // validate
            $errors = VQzBuilder_ResultOptInFormModel::getInstance()->validate($_POST, $optin_setting['quiz_id']);

            // if validation is success
            if ($errors === TRUE) {
                // try to save
                if (VQzBuilder_ResultOptInFormModel::getInstance()->add($_POST + array('optin_setting_id' => $optin_setting_id))) {
                    // set success message
                    $_SESSION['success'] = 'Result Opt-in form saved successfully.';
                    //redirect to main quiz result page
                    vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $optin_setting['quiz_id']));
                }

                // set db error
                $errors[] = 'DB error occured';
            } else
                $view_array['errors'] = $errors;
        }

        // get list of abc-type-ansers if needed
        if (VQzBuilder_QuizModel::getInstance()->get_type_slug($optin_setting['quiz_id']) == 'abc-quiz')
            $view_array['abc_type_answers'] = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_not_used_in_quiz_optin_form($optin_setting['quiz_id']);

        //send headers
        vqzb_send_admin_headers();

        //load view
        $this->load_view('result-optin_form.php', $view_array, TRUE);
    }

    /**
     * Edit the result opt-in gate form
     * @param type $id
     */
    public function editForm($id)
    {
        $optin_form = VQzBuilder_ResultOptInFormModel::getInstance()->get_one($id);
        $view_array = array
        (
            'vqzb_form_action' => '?page=vqzb_quiz_grid&action=edit_optin_form&id=' . $id . '&noheader=true',
            'vqzb_page_title' => 'Edit result Opt-in Gate form',
            'quiz_id' => $optin_form['quiz_id'],
            'email_lists' => $this->getContactLists($optin_form['optin_setting_id']),
            'optin_form' => $optin_form
        );

        if ($_POST) {
            vqzb_sanitize_post();

            //make some improvements on the POST data
            if (isset($_POST['is_default'])) {
                $_POST['is_default'] = 1;
                if (isset($_POST['points_from']))
                    $_POST['points_from'] = NULL;
                if (isset($_POST['points_to']))
                    $_POST['points_to'] = NULL;
                if (isset($_POST['abc_type_answer_id']))
                    $_POST['abc_type_answer_id'] = NULL;
            } else {
                $_POST['is_default'] = 0;
            }

            $errors = VQzBuilder_ResultOptInFormModel::getInstance()->validate($_POST, $optin_form['quiz_id']);
            // if validation is success
            if ($errors === TRUE) {
                // try to save
                if (VQzBuilder_ResultOptInFormModel::getInstance()->edit($id, $_POST)) {
                    //redirect to edit result content page
                    $_SESSION['success'] = 'Changes saved successfully.';
                    vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_optin_form&id=' . $id));
                }

                $errors[] = 'DB error occured';
            }
            $view_array['errors'] = $errors;
        }

        if (VQzBuilder_QuizModel::getInstance()->get_type_slug($optin_form['quiz_id']) == 'abc-quiz')
            $view_array['abc_type_answers'] = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_not_used_in_quiz_optin_form($optin_form['quiz_id'], $id);

        //send headers
        vqzb_send_admin_headers();

        //load view
        $this->load_view('result-optin_form.php', $view_array, TRUE);
    }

    public function deleteForm($id)
    {
        $optin_form = VQzBuilder_ResultOptInFormModel::getInstance()->get_one($id);

        $del_res = VQzBuilder_ResultOptInFormModel::getInstance()->delete($id);
        if ($del_res !== TRUE)
            $_SESSION['errors'] = $del_res;
        else
            $_SESSION['success'] = 'Result Opt-in Form deleted successfully';

        //redirect to main quiz result page
        vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $optin_form['quiz_id']));
    }

    /**
     * Get the Email System account contact lists
     * @param integer $optin_setting_id
     * @return mixed[FALSE|AWeberCollection]
     */
    public function getContactLists($optin_setting_id)
    {
        $optin_setting = VQzBuilder_OptinSettingModel::getInstance()->get_one($optin_setting_id);
        switch ($optin_setting['optin_systen_slug']) {
            case 'aweber':
                //make sure not placeholder data
                if ($optin_setting['credentials'] == "PLACEHOLD") {
                    RETURN FALSE;
                }

                // parse the auth token
                list($consumerKey, $consumerSecret, $accessKey, $accessSecret) = explode('|', $optin_setting['credentials']);

                $aweber = new AWeberAPI($consumerKey, $consumerSecret);

                // try to access the aweber account lists
                try {
                    return $aweber->getAccount($accessKey, $accessSecret)->lists;
                } catch (Exception $e) {
                    return FALSE;
                }
                break;

            case 'icontact':
                list($username, $account_id, $folder_id) = explode('|', $optin_setting['credentials']);
                $icontact = new iContactApi($username, $optin_setting['icontact_password'], VQZB_ICONTACT_APP_ID);

                // get lists
                $lists = $icontact->getFolderLists($account_id, $folder_id);

                // check if there are any errors
                if (!$lists OR !$lists['res'])
                    return FALSE;

                return $lists['lists']->lists;
                break;

            case 'mailchimp':
                $mailchimp = new MCAPI($optin_setting['credentials']);

                // get lists
                $lists = $mailchimp->lists();

                // check if there are any errors
                if ($mailchimp->errorCode)
                    return FALSE;

                return $lists['data'];
                break;
        }
    }

}