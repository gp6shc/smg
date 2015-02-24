<?php

/*
 * Front End class
 */

class VQzBuilder_FrontEnd extends VQzBuilder_Core
{

    /**
     * Register js scripts
     */
    function register_js()
    {
        wp_register_script('jquery.form', VQZB_JS_DIR . 'jquery.form.js', array('jquery'), '3.04', false);
        wp_register_script('jquery_validate', VQZB_JS_DIR . 'jquery.validate.js', array('jquery'), '1.9.0', false);
        wp_register_script('jquery_placeholder', VQZB_JS_DIR . 'jquery.placeholder.min.js', array('jquery'), '2.0.7', false);
        wp_register_script('jquery_overlay', VQZB_JS_DIR . 'itpoverlay.js', array('jquery'), '1.0.0', false);
        wp_register_script('vqzb_shortcode', VQZB_JS_DIR . 'vqzb_shortcode.js', array('jquery', 'jquery_validate', 'jquery.form'), '1.0.0', false);
    }

    /**
     * Enqueue js scripts
     */
    function enqueue_js()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery.form');
        wp_enqueue_script('jquery_validate');
        wp_enqueue_script('jquery_placeholder');
        wp_enqueue_script('jquery_overlay');
        wp_enqueue_script('vqzb_shortcode');
    }

    /**
     * Register css styles
     */
    function register_css()
    {
        wp_register_style('vqzb_shortcode_css', VQZB_CSS_DIR . 'quiz_shortcode.css', array(), '1.0.0', false);
    }

    /**
     * Enqueue css styles
     */
    function enqueue_css()
    {
        wp_enqueue_style('vqzb_shortcode_css');
    }

    /**
     * Create [vqzb] shortcode
     * @param mixed $attrs Shortcode attributes
     */
    public function quiz_shortcode($attrs)
    {
        extract(shortcode_atts(array(
            'quiz_id' => '1'
        ), $attrs));

        //get quiz
        $view_arr['quiz'] = VQzBuilder_QuizModel::getInstance()->get_one($quiz_id);

        //get questions for quiz
        $view_arr['questions'] = VQzBuilder_QuestionModel::getInstance()->get_by_quiz_id($quiz_id);

        //get answers for questions
        foreach ($view_arr['questions'] as $key => $question) {
            $view_arr['questions'][$key]['answers'] = VQzBuilder_AnswerModel::getInstance()->get_by_question_id($question['id']);
        }

        //load shortcode view
        ob_start();
        $this->load_view('quiz_shortcode.php', $view_arr);
        $output_string = ob_get_contents();
        ob_end_clean();

        return $output_string;
    }

    /**
     * Ajax callback function - save user result & generate result image
     */
    public function vqzb_ajax_callback()
    {

        // sanitize post data
        vqzb_sanitize_post();

        if (isset($_POST['optin_form_id'])) $optin_form = VQzBuilder_ResultOptInFormModel::getInstance()->get_one($_POST['optin_form_id']);
        // check if the opt-in form was submitted
        if (isset($_POST['save_optin_form'])) {
            // validate the form
            if (!isset($_POST['optin_form_id']) OR !isset($_POST['result_id']))
                $error = TRUE;
            if ($optin_form['need_contact_name'] && (!isset($_POST['name']) OR $_POST['name'] == ''))
                $error = TRUE;
            if (!isset($_POST['email']) OR $_POST['email'] == '' OR !vqzb_is_valid_email($_POST['email']))
                $error = TRUE;

            // check if there are any errors
            if (isset($errors)) {
                // return the error
                header('HTTP/1.1 412 Precognition Failed');
                exit;
            }

            // get the info for building results
            $quiz = VQzBuilder_QuizModel::getInstance()->get_one($optin_form['quiz_id']);
            $saved_result = VQzBuilder_ResultModel::getInstance()->get_one($_POST['result_id']);
            $img_url = VQZB_RESULT_IMG_URL . $saved_result['picture_name'];

            // subscribe the user to the opt-in mail list only if custom code not set for backward compatibility.
            // if custom_code present then form already submitted in front end
            $optin_form = VQzBuilder_ResultOptInFormModel::getInstance()->get_one($_POST['optin_form_id']);
            if (!isset($optin_form['custom_code']) || trim($optin_form['custom_code'])=="") {
                try {
                    $this->subscribeContact($_POST);
                } catch (Exception $e) {}
            }

            switch (VQzBuilder_QuizModel::getInstance()->get_type_slug($quiz['id'])) {
                case 'abc-quiz':
                    $answer = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_one($saved_result['abc_type_answer_id']);
                    $result = array
                    (
                        'answer' => $answer['answer'],
                        'badge' => $this->_get_the_abctype_page_item(VQzBuilder_ResultBadgeModel::getInstance()->get_by_quiz($quiz['id']), $saved_result['abc_type_answer_id']),
                        'content' => $this->_get_the_abctype_page_item(VQzBuilder_ResultContentModel::getInstance()->get_by_quiz($quiz['id']), $saved_result['abc_type_answer_id']),
                    );
                    break;
                case 'points-quiz':
                    $result = array
                    (
                        'answer' => $saved_result['points'] . " " . vqzb_get_value_measurement($quiz['id'], $saved_result['points']),
                        'badge' => $this->_get_the_points_page_item(VQzBuilder_ResultBadgeModel::getInstance()->get_by_quiz($quiz['id']), $saved_result['points']),
                        'content' => $this->_get_the_points_page_item(VQzBuilder_ResultContentModel::getInstance()->get_by_quiz($quiz['id']), $saved_result['points']),
                    );
                    break;
            }
        } else {

            //generate image and get image url
            $quiz = VQzBuilder_QuizModel::getInstance()->get_one($_POST['quiz_id']);

            //count result & save answer statistic according to quiz type
            $quiz_type = VQzBuilder_QuizModel::getInstance()->get_type_slug($_POST['quiz_id']);
            switch ($quiz_type) {
                case 'abc-quiz':
                    $result = $this->handle_abc_quiz_result($_POST, $quiz);
                    break;
                case 'points-quiz':
                    $result = $this->handle_points_quiz_result($_POST, $quiz);
                    break;
            }


            // check if is needed to generate result image
            if ($result['badge']) {
                $options_arr['value'] = $result['answer'];
                $options_arr['text'] = $result['badge']['text'];
                if ($result['badge']['text_color'] != NULL)
                    $options_arr['text_color'] = $result['badge']['text_color'];
                if ($result['badge']['text_font_id'] != NULL)
                    $options_arr['font_id'] = $result['badge']['text_font_id'];
                if ($result['badge']['text_fontsize_id'] != NULL)
                    $options_arr['fontsize_id'] = $result['badge']['text_fontsize_id'];
                if ($result['badge']['background_color'] != NULL)
                    $options_arr['background_color'] = $result['badge']['background_color'];
                if ($result['badge']['background_image'] != NULL)
                    $options_arr['background_image'] = VQZB_RESULT_BG_IMG_DIR . $result['badge']['background_image'];

                $res_img_name = vqzb_get_result_img($options_arr, 'file', VQZB_RESULT_IMG_DIR);
                $img_url = VQZB_RESULT_IMG_URL . $res_img_name;
            }

            //save result into DB
            $arr_to_save = array('quiz_id' => $quiz['id'], 'ip' => vqzb_get_ip(), 'date' => 'NOW()', 'picture_name' => $res_img_name);
            switch ($quiz_type) {
                case 'abc-quiz':
                    $arr_to_save['abc_type_answer_id'] = $result['value'];
                    // get the opt-in form related to the quiz result
                    $optin_form = $this->_get_the_abctype_page_item(VQzBuilder_ResultOptInFormModel::getInstance()->get_by_quiz($quiz['id']), $result['value']);
                    break;
                case 'points-quiz':
                    $arr_to_save['points'] = $result['value'];
                    // get the opt-in form related to the quiz result
                    $optin_form = $this->_get_the_points_page_item(VQzBuilder_ResultOptInFormModel::getInstance()->get_by_quiz($quiz['id']), $result['value']);
                    break;
            }

            $res_id = VQzBuilder_ResultModel::getInstance()->add($arr_to_save);
            if (!$res_id) {
                //send error
                echo 'DB error occured.';
                exit();
            }

            // check if there is an opt-in form for the quiz result value
            if (isset($optin_form) && $optin_form) {
                //filter custom_code
                $optin_form['custom_code'] = filter_custom_code($optin_form['custom_code']);
                // if yes then print the form
                $this->load_view('opt-in_form.php', array('result_id' => $res_id, 'optin_form' => $optin_form));
                exit();
            }
        }

        $quiz_url = $_POST['quiz_url'];

        // prepare text to show in view
        if ($result['badge']) {
            $result['badge']['share_text_fb'] = vqzb_get_social_text($result['badge']['share_text_fb'], $quiz_url, $quiz['name'], $result['answer'], $img_url);
            $result['badge']['share_text_twitter'] = urlencode(vqzb_get_social_text($result['badge']['share_text_twitter'], $quiz_url, $quiz['name'], $result['answer'], $img_url));
            $result['badge']['share_text_pin'] = vqzb_get_social_text($result['badge']['share_text_pin'], $quiz_url, $quiz['name'], $result['answer'], $img_url);
        }
        if ($result['content']) {
            $result['content']['text'] = str_replace(VQZB_RESULT_VALUE_PLHDR, $result['answer'], $result['content']['text']);
        }

        // load quiz results view
        $this->load_view('quiz_result.php', array('quiz' => $quiz, 'value' => $result['answer'], 'badge' => $result['badge'], 'content' => $result['content'], 'image_link' => isset($img_url) ? $img_url : null, 'quiz_url' => $quiz_url, 'fb_app_id' => get_option('vqzb_fb_app_id')));
        exit();
    }

    public function handle_abc_quiz_result(array $data, array $quiz)
    {
        $res_arr = array();
        foreach ($data['answers'] as $answer_id) {
            $answer = VQzBuilder_AnswerModel::getInstance()->get_one($answer_id);

            // add result abc type id to results array
            $res_arr[] = $answer['abc_type_answer_id'];

            // update answer selected qty
            VQzBuilder_AnswerModel::getInstance()->edit($answer_id, array('selected_qty' => $answer['selected_qty'] + 1));
        }

        // determinate the common result
        $max_qty = 0;
        $res_id = 0;
        foreach (array_count_values($res_arr) as $id => $qty) {
            if ($qty <= $max_qty)
                continue;
            $max_qty = $qty;
            $res_id = $id;
        }
        $res = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_one($res_id);

        // get the right result content
        $result_content = $this->_get_the_abctype_page_item(VQzBuilder_ResultContentModel::getInstance()->get_by_quiz($quiz['id']), $res_id);

        // get the right result badge
        $result_badge = $this->_get_the_abctype_page_item(VQzBuilder_ResultBadgeModel::getInstance()->get_by_quiz($quiz['id']), $res_id);

        return array('value' => $res_id, 'answer' => $res['answer'], 'content' => $result_content, 'badge' => $result_badge);
    }

    public function handle_points_quiz_result(array $data, array $quiz)
    {
        $res = 0;
        foreach ($data['answers'] as $answer_id) {
            $answer = VQzBuilder_AnswerModel::getInstance()->get_one($answer_id);

            // summing the results points
            $res += $answer['value'];

            // update answer selected qty
            VQzBuilder_AnswerModel::getInstance()->edit($answer_id, array('selected_qty' => $answer['selected_qty'] + 1));
        }

        // options for image generation
        $result_measure = vqzb_get_value_measurement($quiz['id'], $res);

        // get the right result content
        $result_content = $this->_get_the_points_page_item(VQzBuilder_ResultContentModel::getInstance()->get_by_quiz($quiz['id']), $res);

        // get the right result badge
        $result_badge = $this->_get_the_points_page_item(VQzBuilder_ResultBadgeModel::getInstance()->get_by_quiz($quiz['id']), $res);

        return array('value' => $res, 'answer' => $res . ' ' . $result_measure, 'content' => $result_content, 'badge' => $result_badge);
    }

    public function _get_the_points_page_item($items, $value)
    {
        if (empty($items))
            return FALSE;

        // find the suitable item
        foreach ($items as $item) {
            if ($value >= $item['points_from'] && $value <= $item['points_to'])
                return $item;
        }
        // find the default item
        foreach ($items as $item) {
            if ($item['is_default'] == 1)
                return $item;
        }
    }

    public function _get_the_abctype_page_item($items, $abc_type_id)
    {
        if (empty($items))
            return FALSE;
        // find the suitable item
        foreach ($items as $item) {
            if ($abc_type_id == $item['abc_type_answer_id'])
                return $item;
        }
        // find the default item
        foreach ($items as $item) {
            if ($item['is_default'] == 1)
                return $item;
        }
    }

    public function subscribeContact($data)
    {
        // get the opt-in form
        $optin_form = VQzBuilder_ResultOptInFormModel::getInstance()->get_one($data['optin_form_id']);

        switch ($optin_form['optin_system_id']) {
            case 1: //aweber
                // parse the auth token
                list($consumerKey, $consumerSecret, $accessKey, $accessSecret) = explode('|', $optin_form['credentials']);

                $aweber = new AWeberAPI($consumerKey, $consumerSecret);

                $account = $aweber->getAccount($accessKey, $accessSecret);

                // get the contacts list
                $listURL = "/accounts/{$account->id}/lists/{$optin_form['email_list']}";
                $list = $account->loadFromUrl($listURL);

                // create a subscriber
                $params = array(
                    'email' => $data['email'],
                );
                if (isset($data['name']))
                    $params['name'] = $data['name'];

                $subscribers = $list->subscribers;
                $new_subscriber = $subscribers->create($params);
                break;

            case 2: //icontact
                // parse the credentials
                list($username, $account_id, $folder_id) = explode('|', $optin_form['credentials']);

                $icontact = new iContactApi($username, $optin_form['icontact_password'], VQZB_ICONTACT_APP_ID);

                // create the contact
                $params = array('email' => $data['email']);
                if (isset($data['name']))
                    $params['firstName'] = $data['name'];

                $contact_id = $icontact->addContact($account_id, $folder_id, $params);

                // subscribe the contact if it was added successfully
                if ($contact_id && $contact_id['res'])
                    $icontact->subscribeContact($account_id, $folder_id, $optin_form['email_list'], $contact_id['contact_id']);
                break;

            case 3:
                $mailchimp = new MCAPI($optin_form['credentials']);

                $subscribe_info = isset($data['name']) ? array('FNAME' => $data['fname'], 'LNAME' => $data['lname']) : NULL;

                // By default this sends a confirmation email - you will not see new members until the link contained in it is clicked!
                $mailchimp->listSubscribe($optin_form['email_list'], $data['email'], $subscribe_info);
                break;

            default:
                break;
        }
    }
}