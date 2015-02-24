<?php
/**
 *  Quiz actions controller
 */
class VQzBuilder_QuestionAction extends VQzBuilder_Core
{
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new VQzBuilder_QuestionAction;
        }
        return self::$instance;
    }

    /*
         *  Add question page loader
         */
    function add($quiz_id)
    {
        $view_array = array('vqzb_form_action' => '?page=vqzb_quiz_grid&action=add_question&quiz_id=' . $quiz_id . '&noheader=true', 'vqzb_page_title' => 'Add question');

        //check if user entered any data
        if ($_POST) {
            $result = $this->handle_question_form($quiz_id, 'add');
            if ($result === TRUE) {
                $_SESSION['success'] = 'Question saved successfully';
                //redirect to edit quiz page
                vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_quiz&quiz_id=' . $quiz_id));
            }
            $view_array['errors'] = $result;
            if (isset($_POST['answers'])) {
                foreach ($_POST['answers'] as $id => $answer) {
                    $view_array['answers'][] = array
                    (
                        'answer' => $answer['answer'],
                        'value' => $answer['value'],
                    );
                }
            }
        }
        $view_array['quiz'] = VQzBuilder_QuizModel::getInstance()->get_one($_GET['quiz_id']);

        $view_array['abc_type_answers'] = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_by_quiz($_GET['quiz_id']);
        //send headers
        vqzb_send_admin_headers();

        //load question add/edit view
        $this->load_view('question_form.php', $view_array, TRUE);
    }

    /*
     *  Edit question page loader
     */
    function edit($question_id)
    {
        $view_array = array('vqzb_form_action' => '?page=vqzb_quiz_grid&action=edit_question&question_id=' . $question_id . '&noheader=true', 'vqzb_page_title' => 'Edit question');

        $view_array['question'] = VQzBuilder_QuestionModel::getInstance()->get_one($question_id);
        $view_array['quiz'] = VQzBuilder_QuizModel::getInstance()->get_one($view_array['question']['quiz_id']);
        $view_array['answers'] = VQzBuilder_AnswerModel::getInstance()->get_by_question_id($question_id);

        // check if user entered data
        if ($_POST) {
            $result = $this->handle_question_form($question_id, 'edit');
            if ($result === TRUE) {
                $_SESSION['success'] = 'Question updated successfully.';
                vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_question&question_id=' . $question_id));
            } else {
                $view_array['errors'] = $result;
                if (isset($_POST['answers'])) {
                    $view_array['answers'] = $_POST['answers'];
                }
            }
        }

        $view_array['abc_type_answers'] = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_by_quiz($view_array['question']['quiz_id']);

        //send headers
        vqzb_send_admin_headers();

        //load question add/edit view
        $this->load_view('question_form.php', $view_array, TRUE);
    }

    /**
     * Delete question function
     * @param integer $question_id Question id to delete
     */
    function delete($question_id)
    {
        $oquestion = new VQzBuilder_QuestionModel();
        $question = $oquestion->get_one($question_id);
        if (!$oquestion->delete($question_id)) {
            $_SESSION['errors'] = array('DB error occcured');
        } else {
            $_SESSION['success'] = 'Question successfully deleted';
        }

        //redirect to edit quiz page
        vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=edit_quiz&quiz_id=' . $question['quiz_id']));
    }

    /**
     * Question add/edit handler
     * @param string $action Possible values: add|edit
     * @param integer $id Depends on action it may be quiz_id (if add question) or question_id (if edit question)
     * @return array|boolean
     */
    function handle_question_form($id, $action)
    {
        //sanitize post
        vqzb_sanitize_post();


        //validation
        $errors = array();
        if ($_POST['question'] == '')
            $errors[] = "Enter question";
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $one) {
                //answer is not empty?
                if ($one['answer'] == '') {
                    $text_error = "Enter all answers";
                    if (array_search($text_error, $errors) === FALSE)
                        $errors[] = $text_error;
                }
                //answer value is not empty?
                if (isset($one['value']) && $one['value'] == '') {
                    $text_error = "Enter values for all answers";
                    if (array_search($text_error, $errors) === FALSE)
                        $errors[] = $text_error;
                } //answer value is numeric?
                elseif (isset($one['value']) && !vqzb_is_numeric($one['value'])) {
                    $text_error = "Not valid value for answer: only digits are available";
                    if (array_search($text_error, $errors) === FALSE)
                        $errors[] = $text_error;
                }
                // answer type is not empty?
                if (isset($answer['abc_type_answer_id']) && $answer['abc_type_answer_id'] == '') {
                    $text_error = "Select types for all answers";
                    if (array_search($text_error, $errors) === FALSE)
                        $errors[] = $text_error;
                }
            }
        }

        if (count($errors) > 0)
            return $errors;

        //add to DB
        $oquestion = new VQzBuilder_QuestionModel();
        $oanswer = new VQzBuilder_AnswerModel();

        switch ($action) {
            case 'add':
                //insert question into DB
                $question_res = $oquestion->add(array('quiz_id' => $id, 'question' => $_POST['question'], 'content' => $_POST['content']));
                if (!$question_res)
                    return array('DB error occured');
                break;

            case 'edit':
                //update question in DB
                $question_res = $oquestion->edit($id, array('question' => $_POST['question'], 'content' => $_POST['content']));
                if (!$question_res)
                    return array('DB error occured');

                //first delete all answers of the question
                if (!$oanswer->delete_by_question_id($id))
                    return array('DB error occured');

                $question_res = $id;

                break;
        }

        //insert answers into db
        if (isset($_POST['answers'])) {
            foreach ($_POST['answers'] as $key => $answer) {
                $data_to_save = array('question_id' => $question_res, 'answer' => $answer['answer'], 'sort_order' => array_search($key, explode(" ", str_replace("row_", "", $_POST['answers_sort_order']))));
                if (isset($answer['selected_qty']) && $answer['selected_qty'] != '')
                    $data_to_save['selected_qty'] = $answer['selected_qty'];
                if (isset($answer['value']))
                    $data_to_save['value'] = $answer['value'];
                if (isset($answer['abc_type_answer_id']))
                    $data_to_save['abc_type_answer_id'] = $answer['abc_type_answer_id'];

                VQzBuilder_LogModel::getInstance()->vqb_log("Saving the following data: " . print_r($data_to_save, true));
                if (!$oanswer->add($data_to_save))
                    return array('DB error occured');
            }
        }
        return TRUE;
    }
}