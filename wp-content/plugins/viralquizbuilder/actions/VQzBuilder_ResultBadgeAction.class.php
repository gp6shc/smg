<?php

/**
 *  Quiz actions controller
 */
class VQzBuilder_ResultBadgeAction extends VQzBuilder_Core
{

    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_ResultBadgeAction;
        }
        return self::$instance;
    }

    public function add($quiz_id)
    {
        // if user can add one more result badge?
        if (!VQzBuilder_ResultBadgeModel::getInstance()->can_create($quiz_id))
        {
            //set message
            $_SESSION['errors'] = array('You cannot add result badge - the badge for all result variants already created.');
            // redirect to main result page
            vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $quiz_id));
        }

        // set some data to pass to view
        $view_array = array
            (
            'vqzb_form_action' => '?page=vqzb_quiz_grid&action=add_resbadge&quiz_id=' . $quiz_id . '&noheader=true',
            'vqzb_page_title' => 'Add result page badge & viral sharing',
            'quiz_id' => $quiz_id,
            'fonts' => VQzBuilder_FontModel::getInstance()->get_list(),
            'fontsizes' => VQzBuilder_FontsizeModel::getInstance()->get_list(),
        );
        // get list of abc-type-answers if needed
        if (VQzBuilder_QuizModel::getInstance()->get_type_slug($quiz_id) == 'abc-quiz')
            $view_array['abc_type_answers'] = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_not_used_in_quiz_badge($quiz_id);

        if ($_POST)
        {
            //sanitize post data
            vqzb_sanitize_post();

            if (isset($_POST['is_default']))
            {
                $_POST['is_default'] = 1;
                if (isset($_POST['points_from']))
                    $_POST['points_from'] = NULL;
                if (isset($_POST['points_to']))
                    $_POST['points_to'] = NULL;
                if (isset($_POST['abc_type_answer_id']))
                    $_POST['abc_type_answer_id'] = NULL;
            }
            else
            {
                $_POST['is_default'] = 0;
            }
            
            // validate
            $valid = VQzBuilder_ResultBadgeModel::getInstance()->validate($_POST, $quiz_id);

            // if validation is success
            if ($valid === TRUE)
            {
                // upload image
                if (isset($_FILES['background_image']) && $_FILES['background_image']['error'] != 4)
                {
                    $answer_variant = isset($view_array['abc_type_answers']) ? $_POST['abc_type_answer_id'] : $_POST['points_from'] . '-' . $_POST['points_to'];
                    $new_file_name = "quiz_bg_" . $quiz_id . '_' . $answer_variant;
                    // save file
                    $upload_res = vqzb_upload_img('background_image', VQZB_RESULT_BG_IMG_DIR, $new_file_name);

                    if ($upload_res['result'])
                    {
                        // resize image
                        vqzb_image_resize($upload_res['full_path'], $upload_res['ext'], $upload_res['full_path']);
                        $_POST['background_image'] = $upload_res['filename'];
                    }
                    else
                        $view_array['errors'][] = $upload_res['msg'];
                }

                if (!isset($view_array['errors']))
                {
                    $data_to_save = $_POST;
                    unset($data_to_save['previous_background_image']);
                    unset($data_to_save['background_selected']);
                    // try to save
                    if (VQzBuilder_ResultBadgeModel::getInstance()->add($data_to_save + array('quiz_id' => $quiz_id)))
                    {
                        //clear tmp folder
                        vqzb_clear_dir(VQZB_TMP_UPLOADS_DIR);
                        // set success message
                        $_SESSION['success'] = 'Result badge saved successfully.';
                        //redirect to main quiz result page
                        vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $quiz_id));
                    }
                    // set db error
                    $view_array['errors'][] = 'DB error occured';
                }
            }
            else
                $view_array['errors'] = $valid;
        }

        //send headers
        vqzb_send_admin_headers();

        //load view
        $this->load_view('result-badge_form.php', $view_array, TRUE);
    }

    public function edit($id)
    {
        // set some data to pass to view
        $view_array = array
            (
            'vqzb_form_action' => '?page=vqzb_quiz_grid&action=edit_resbadge&id=' . $id . '&noheader=true',
            'vqzb_page_title' => 'Edit result page badge & viral sharing',
            'fonts' => VQzBuilder_FontModel::getInstance()->get_list(),
            'fontsizes' => VQzBuilder_FontsizeModel::getInstance()->get_list(),
            'badge' => VQzBuilder_ResultBadgeModel::getInstance()->get_one($id)
        );

        $view_array['quiz_id'] = $view_array['badge']['quiz_id'];

        // get list of abc-type-answers if needed
        if (VQzBuilder_QuizModel::getInstance()->get_type_slug($view_array['badge']['quiz_id']) == 'abc-quiz')
            $view_array['abc_type_answers'] = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_not_used_in_quiz_badge($view_array['badge']['quiz_id'], $id);

        if ($_POST)
        {
            //sanitize post data
            vqzb_sanitize_post();

            if (isset($_POST['is_default']))
            {
                $_POST['is_default'] = 1;
                if (isset($_POST['points_from']))
                    $_POST['points_from'] = NULL;
                if (isset($_POST['points_to']))
                    $_POST['points_to'] = NULL;
                if (isset($_POST['abc_type_answer_id']))
                    $_POST['abc_type_answer_id'] = NULL;
            }
            else
            {
                $_POST['is_default'] = 0;
            }
            
            // validate
            $valid = VQzBuilder_ResultBadgeModel::getInstance()->validate($_POST, $view_array['badge']['quiz_id'], $id);

            // if validation is success
            if ($valid === TRUE)
            {
                // upload image
                if (isset($_FILES['background_image']) && $_FILES['background_image']['error'] != 4)
                {
                    $answer_variant = $view_array['abc_type_answers'] == 'abc-quiz' ? $_POST['abc_type_answer_id'] : $_POST['points_from'] . '-' . $_POST['points_to'];
                    $new_file_name = "quiz_bg_" . $view_array['badge']['quiz_id'] . '_' . $answer_variant;
                    // save file
                    $upload_res = vqzb_upload_img('background_image', VQZB_RESULT_BG_IMG_DIR, $new_file_name);

                    if ($upload_res['result'])
                    {
                        // resize image
                        vqzb_image_resize($upload_res['full_path'], $upload_res['ext'], $upload_res['full_path']);
                        $_POST['background_image'] = $upload_res['filename'];
                    }
                    else
                        $view_array['errors'][] = $upload_res['msg'];
                }

                if (!isset($view_array['errors']))
                {
                    $data_to_save = $_POST;
                    unset($data_to_save['previous_background_image']);
                    unset($data_to_save['background_selected']);
                    // try to save
                    if (VQzBuilder_ResultBadgeModel::getInstance()->edit($id, $data_to_save + array('quiz_id' => $view_array['badge']['quiz_id'])))
                    {
                        //clear tmp folder
                        vqzb_clear_dir(VQZB_TMP_UPLOADS_DIR);
                        // set success message
                        $_SESSION['success'] = 'Changes saved successfully.';
                        //redirect to main quiz result page
                        vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_resbadge&id=' . $id));
                    }
                    // set db error
                    $view_array['errors'][] = 'DB error occured';
                }
            }
            else
                $view_array['errors'] = $valid;
        }

        //send headers
        vqzb_send_admin_headers();

        //load view
        $this->load_view('result-badge_form.php', $view_array, TRUE);
    }

    public function delete($id)
    {
        $resbadge = VQzBuilder_ResultBadgeModel::getInstance()->get_one($id);

        $del_res = VQzBuilder_ResultBadgeModel::getInstance()->delete($id);
        if ($del_res !== TRUE)
            $_SESSION['errors'] = $del_res;
        else
            $_SESSION['success'] = 'Result Badge deleted successfully';

        //redirect to main quiz result page
        vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $resbadge['quiz_id']));
    }

    /*
     * Ajax callback function
     */

    public function generateExampleCallback()
    {
        $options_arr = array();
        $json_encode = array();

        // define the background
        if (isset($_POST['background_selected']))
        {
            //if user selected color for background
            if ($_POST['background_selected'] == 'color')
            {
                if (isset($_POST['background_color']))
                    if ($_POST['background_color'] != '')
                        $options_arr['background_color'] = $_POST['background_color'];
            }
            else//if user selected image for background
            {
                //check if previous image is defined
                if ($_POST['previous_background_image'] != '')
                {
                    $options_arr['background_image'] = VQZB_RESULT_BG_IMG_DIR . $_POST['previous_background_image'];
                }
                if (isset($_FILES['background_image']) && $_FILES['background_image']['error'] != 4)
                {
                    // save file to TMP DIRECTORY
                    $upload_res = vqzb_upload_img('background_image', VQZB_TMP_UPLOADS_DIR);

                    //check if upload is successful
                    if ($upload_res['result'] === FALSE)
                    {
                        echo json_encode(array('result' => 'error', 'msg' => $upload_res['msg']));
                        die;
                    }

                    // resize image
                    $new_file = VQZB_TMP_UPLOADS_DIR . $upload_res['filename'];
                    vqzb_image_resize($new_file, $upload_res['ext'], $new_file);
                    $options_arr['background_image'] = $new_file;

                    $json_encode['img_name'] = $upload_res['filename'];
                }
            }
        }
        //get measurement of the quiz
        if (isset($_POST['quiz_id']))
        {
            $quiz = VQzBuilder_QuizModel::getInstance()->get_one($_POST['quiz_id']);
            $measure_sing = vqzb_get_quiz_measurement($quiz['custom_measurement_sing'], $quiz['measurement']);
            $measure_pl = vqzb_get_quiz_measurement($quiz['custom_measurement_pl'], $quiz['measurement_pl']);
            $options_arr['value'] = VQZB_DEFAULT_RESULT_VALUE . ' ' . vqzb_get_measurement_str($measure_sing, $measure_pl);
        }
        else
        {
            $options_arr['value'] = VQZB_DEFAULT_RESULT_VALUE . ' points';
        }
        // data for image generation
        $options_arr['text'] = stripcslashes($_POST['text']);
        if ($_POST['text_color'] != '')
            $options_arr['text_color'] = $_POST['text_color'];
        if ($_POST['text_font_id'] != '')
            $options_arr['font_id'] = $_POST['text_font_id'];
        if ($_POST['text_fontsize_id'] != '')
            $options_arr['fontsize_id'] = $_POST['text_fontsize_id'];

        // generate image example & send renponse to browser
        $json_encode['result'] = 'success';

        $generated_img = vqzb_get_result_img($options_arr);
        $json_encode['base_64'] = $generated_img['base_64'];
        $json_encode['mime_type'] = $generated_img['mime_type'];

        echo json_encode($json_encode);
        die;
    }

}