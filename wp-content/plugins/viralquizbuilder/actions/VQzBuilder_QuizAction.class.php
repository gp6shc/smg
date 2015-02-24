<?php

/**
 *  Quiz actions controller
 */
class VQzBuilder_QuizAction extends VQzBuilder_Core
{

    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_QuizAction;
        }
        return self::$instance;
    }

    /**
     * Quiz Grid Page handler 
     */
    public function quizGrid()
    {
        $view_array = array();

        //save plugin settings
        if (isset($_POST['fb_app_id']))
        {
            update_option('vqzb_fb_app_id', $_POST['fb_app_id']);
        }
        $view_array['fb_app_id'] = get_option('vqzb_fb_app_id');

        //load quiz grid view
        $view_array['quizes'] = VQzBuilder_QuizModel::getInstance()->get_list();

        vqzb_send_admin_headers();
        $this->load_view('quiz_grid.php', $view_array, TRUE);
    }

    /*
     *  Add quiz
     */

    function add()
    {
        // load required scripts
        wp_enqueue_script('vqzb_quiz_form');
        wp_enqueue_script('jquery.tablednd');

        $view_array = array();

        if ($_POST)
        {
            $result = $this->handle_quiz_form('add');
            if (is_numeric($result))
            {
                //redirect to add question
                vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=add_question&quiz_id=' . $result));
            }
            $view_array['errors'] = $result;
        }

        //get measurements
        $view_array['measurements'] = vqzb_get_item_list('measurement', array(array('id' => NULL, 'name_sing' => 'OWN')));
        $view_array['quiz_types'] = vqzb_get_item_list('quiztype');

        //send headers
        vqzb_send_admin_headers();

        //load add quiz view
        $this->load_view('add_quiz.php', $view_array, TRUE);
    }

    /*
     *  Edit quiz
     */

    function edit($quiz_id)
    {
        $view_array = array
            (
            'vqzb_form_action' => '?page=vqzb_quiz_grid&action=edit_quiz&quiz_id=' . $quiz_id . '&noheader=true',
            'quiz' => VQzBuilder_QuizModel::getInstance()->get_one($quiz_id)
        );

        //check if user entered any data
        if ($_POST)
        {
            $result = $this->handle_quiz_form('edit', $quiz_id);
            if ($result === TRUE)
            {
                $_SESSION['success'] = 'Quiz updated successfully.';
                vqzb_redirect('?page=vqzb_quiz_grid&action=edit_quiz&quiz_id=' . $quiz_id);
            }
            $view_array['errors'] = $result;
        }

        //get measurements
        $view_array['measurements'] = vqzb_get_item_list('measurement', array(array('id' => '', 'name_sing' => 'OWN')));

        //get questions by quiz id
        $view_array['questions'] = VQzBuilder_QuestionModel::getInstance()->get_by_quiz_id($quiz_id);

        $view_array['abc_type_answers'] = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_by_quiz($quiz_id);

        //load edit quiz view
        vqzb_send_admin_headers();
        $this->load_view('edit_quiz.php', $view_array, TRUE);
    }

    /**
     * Quiz delete
     * @param integer $quiz_id Quiz id
     * @return mixed (TRUE/array) 
     */
    function delete($quiz_id)
    {
        if (VQzBuilder_QuizModel::getInstance()->delete($quiz_id) === FALSE)
            $_SESSION['errors'] = array('DB error occured');
        else
            $_SESSION['success'] = 'Quiz successfully deleted.';

        vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid'));
    }

    public function quizStatistic()
    {
        // get the quiz id
        $quiz_id = $_GET['quiz_id'];

        // check if user pressed delete statistic button
        if (isset($_GET['clear']))
        {
            // try to clear quiz statistic
            try
            {
                // delete quiz results
                foreach (VQzBuilder_ResultModel::getInstance()->get_list($quiz_id) as $result)
                {
                    if (!VQzBuilder_ResultModel::getInstance()->delete($result['id']))
                        throw new Exception;

                    // check if user wants to delete result images too
                    if (isset($_GET['del_img']))
                        @unlink(VQZB_RESULT_IMG_DIR . $result['picture_name']);
                }
                // clear quiz answer selected qty
                foreach (VQzBuilder_AnswerModel::getInstance()->get_by_quiz($quiz_id) as $answer)
                {
                    if (!VQzBuilder_AnswerModel::getInstance()->clear_statistic($answer->id))
                        throw new Exception;
                }

                $_SESSION['success'] = 'Statistic cleared successfully.';
            }
            catch (Exception $e)
            {
                $_SESSION['errors'] = array('DB error occured.');
            }
            vqzb_redirect(self_admin_url('admin.php?page=vqzb_quiz_grid&action=quiz_statistic&quiz_id=' . $quiz_id));
        }

        // get quiz
        $quiz = VQzBuilder_QuizModel::getInstance()->get_one($quiz_id);

        // get questions with answers
        $questions = VQzBuilder_QuestionModel::getInstance()->get_by_quiz_id($quiz_id);
        foreach ($questions as $key => $question)
        {
            $questions[$key]['answers'] = VQzBuilder_AnswerModel::getInstance()->get_by_question_id($question['id']);
        }

        $view_arr = array
            (
            'quiz' => $quiz,
            'questions' => $questions
        );

        vqzb_send_admin_headers();
        $this->load_view('quiz-statistic.php', $view_arr, TRUE);
    }

    /**
     * Add/edit quiz form handler
     * 
     * @param string $action Action with the quiz (add/edit)
     * @param mixed $quiz_id Quiz id if it needs to be updated (default = NULL)
     * 
     * @return mixed Value depends on validation & DB inserting/updating (case $action = 'add': array/numeric; case $action = 'edit': array/boolean)
     */
    function handle_quiz_form($action, $quiz_id = NULL)
    {
        //sanitize post
        vqzb_sanitize_post();

        //validation
        $errors = array();
        if ($_POST['name'] == '')
            $errors[] = "Enter quiz name";
        if ($_POST['name'] == '')
            $errors[] = "Choose the quiz type";
        if (isset($_POST['measurement_id']) && $_POST['measurement_id'] == '' && $_POST['custom_measurement_sing'] == '')
            $errors[] = "Enter custom measurement (singular)";
        if (isset($_POST['measurement_id']) && $_POST['measurement_id'] == '' && $_POST['custom_measurement_pl'] == '')
            $errors[] = "Enter custom measurement (plural)";
        // abc quiz type answers do not validate - save just not empty answers
        // if there are any validation errors then return errors array
        if (count($errors) > 0)
            return $errors;

        $oquiz = new VQzBuilder_QuizModel();
        $abc_type_answers = isset($_POST['abc_type_answers']) ? $_POST['abc_type_answers'] : NULL;
        unset($_POST['abc_type_answers']);

        switch ($action)
        {
            case 'add':
                //insert to DB
                $db_res = $oquiz->add($_POST);
                break;
            case 'edit':
                //update questions sort order
                foreach (explode(' ', str_replace("row_", "", $_POST['questions_sort_order'])) as $sort_order => $question_id)
                {
                    if (!VQzBuilder_QuestionModel::getInstance()->edit($question_id, array('sort_order' => $sort_order)))
                        return array('DB error occured');
                }
                unset($_POST['questions_sort_order']);
                //update in DB
                $db_res = $oquiz->edit($quiz_id, $_POST);
                break;
        }

        // if sql result is FALSE then return DB errors array
        if ($db_res === FALSE)
            return array('DB error occured');

        // save abc type answers
        if (is_array($abc_type_answers) && $_POST['quiz_type_id'] == 2)
        {
            foreach ($abc_type_answers as $key => $abc_type_answer)
            {
                // do not save the empty abc answers types
                if ($abc_type_answer == '')
                    continue;

                if (!VQzBuilder_ABCtypeAnswerModel::getInstance()->add(array('answer' => $abc_type_answer, 'sort_order' => $key, 'quiz_id' => $db_res)))
                    return array('DB error occured');
            }
        }
        return $db_res;
    }

}