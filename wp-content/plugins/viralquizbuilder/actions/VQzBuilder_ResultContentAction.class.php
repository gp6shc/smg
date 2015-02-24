<?php

/**
 *  Quiz actions controller
 */
class VQzBuilder_ResultContentAction extends VQzBuilder_Core
{

    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_ResultContentAction;
        }
        return self::$instance;
    }

    public function add($quiz_id)
    {
        // if user can add one more result content?
        if (!VQzBuilder_ResultContentModel::getInstance()->can_create($quiz_id))
        {
            //set message
            $_SESSION['errors'] = array('You cannot add result content - the content for all result variants already created.');
            // redirect to main result page
            vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $quiz_id));
        }

        // set some data to pass to view
        $view_array = array
            (
            'vqzb_form_action' => '?page=vqzb_quiz_grid&action=add_rescontent&quiz_id=' . $quiz_id . '&noheader=true',
            'vqzb_page_title' => 'Add result page content',
            'quiz_id' => $quiz_id
        );

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
            $errors = VQzBuilder_ResultContentModel::getInstance()->validate($_POST, $quiz_id);

            // if validation is success
            if ($errors === TRUE)
            {
                // try to save
                if (VQzBuilder_ResultContentModel::getInstance()->add($_POST + array('quiz_id' => $quiz_id)))
                {
                    // set success message
                    $_SESSION['success'] = 'Result content saved successfully.';
                    //redirect to main quiz result page
                    vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $quiz_id));
                }

                // set db error
                $errors[] = 'DB error occured';
            }
            else
                $view_array['errors'] = $errors;
        }

        // get list of abc-type-ansers if needed
        if (VQzBuilder_QuizModel::getInstance()->get_type_slug($quiz_id) == 'abc-quiz')
            $view_array['abc_type_answers'] = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_not_used_in_quiz_content($quiz_id);

        //send headers
        vqzb_send_admin_headers();

        //load view
        $this->load_view('result-content_form.php', $view_array, TRUE);
    }

    public function edit($id)
    {
        $view_array = array
            (
            'vqzb_form_action' => '?page=vqzb_quiz_grid&action=edit_rescontent&id=' . $id . '&noheader=true',
            'vqzb_page_title' => 'Edit result page content',
        );

        $rescontent = VQzBuilder_ResultContentModel::getInstance()->get_one($id);

        $view_array['quiz_id'] = $rescontent['quiz_id'];

        if ($_POST)
        {
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

            $errors = VQzBuilder_ResultContentModel::getInstance()->validate($_POST, $rescontent['quiz_id'], $id);
            // if validation is success
            if ($errors === TRUE)
            {
                // try to save
                if (VQzBuilder_ResultContentModel::getInstance()->edit($id, $_POST))
                {
                    //redirect to edit result content page
                    $_SESSION['success'] = 'Changes saved successfully.';
                    vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_rescontent&id=' . $id));
                }

                $errors[] = 'DB error occured';
            }
            $view_array['errors'] = $errors;
        }

        if (VQzBuilder_QuizModel::getInstance()->get_type_slug($rescontent['quiz_id']) == 'abc-quiz')
            $view_array['abc_type_answers'] = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_not_used_in_quiz_content($rescontent['quiz_id'], $id);

        $view_array['content'] = VQzBuilder_ResultContentModel::getInstance()->get_one($id);

        //send headers
        vqzb_send_admin_headers();

        //load view
        $this->load_view('result-content_form.php', $view_array, TRUE);
    }

    public function delete($id)
    {
        $rescontent = VQzBuilder_ResultContentModel::getInstance()->get_one($id);

        $del_res = VQzBuilder_ResultContentModel::getInstance()->delete($id);
        if ($del_res !== TRUE)
            $_SESSION['errors'] = $del_res;
        else
            $_SESSION['success'] = 'Result Content deleted successfully';

        //redirect to main quiz result page
        vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=result_page&quiz_id=' . $rescontent['quiz_id']));
    }

}