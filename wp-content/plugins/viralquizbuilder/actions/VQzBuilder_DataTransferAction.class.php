<?php

/**
 *  Quiz actions controller
 */
class VQzBuilder_DataTransferAction extends VQzBuilder_Core
{

    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_DataTransferAction;
        }
        return self::$instance;
    }

    /**
     * Quiz Grid Page handler 
     */
    public function pageHandler()
    {
        // start session if it was not started yet
        vqzb_start_session();

        $view_array = array();

        //save plugin settings
        if (isset($_GET['action']))
        {
            // execute the action
            switch ($_GET['action'])
            {
                case 'export':
                    $res = $this->export();
                    break;
                case 'import':
                    $res = $this->import();
                    break;
            }
            if ($res !== TRUE)
                $_SESSION['errors'] = array($res); //set flash error
            else
                $_SESSION['success'] = 'Data has been imported successlly.';

// redirect to exportimport page
            vqzb_redirect(self_admin_url('admin.php?page=vqzb_transfer_data'));
        }

        //load quiz grid view
        vqzb_send_admin_headers();
        $this->load_view('transfer_data.php', $view_array, TRUE);
    }

    public function export()
    {
        // check if debug mode is ON
        if (WP_DEBUG)
            return 'You must set the Debug Mode off to export quiz data.';

        // check if zip  class is enabled
        if (!class_exists('ZipArchive'))
            return 'Export failed: The PHP Zip archive extension is not installed on your server';

        // create the export data array
        // get configs to export
        $configs = Spyc::YAMLLoad(VQZB_INCS_DIR . 'transfer_data_config.yml');

        // get the all quizes
        $export = VQzBuilder_QuizModel::getInstance()->get_for_export($configs['table']['quiz']['export_cols']);

        foreach ($export as &$one)
        {
            // get the abc_type_answers for quizes
            $one['abc_type_answers'] = VQzBuilder_ABCtypeAnswerModel::getInstance()->get_for_export($configs['table']['abc_type_answer']['export_cols'], 'quiz_id', $one['id']);
            // get the optin settings for quizes
            $one['optin_settings'] = VQzBuilder_OptinSettingModel::getInstance()->get_for_export($configs['table']['optin_setting']['export_cols'], 'quiz_id', $one['id']);

            //get the result optin forms for optin settings
            foreach ($one['optin_settings'] as &$optin_setting)
            {
                $optin_setting['result_optin_forms'] = VQzBuilder_ResultOptInFormModel::getInstance()->get_for_export($configs['table']['result_optin_form']['export_cols'], 'optin_setting_id', $optin_setting['id']);
            }

            //get questions for quizes
            $one['questions'] = VQzBuilder_QuestionModel::getInstance()->get_for_export($configs['table']['question']['export_cols'], 'quiz_id', $one['id']);

            // get the answers for questions
            foreach ($one['questions'] as &$question)
            {
                $question['answers'] = VQzBuilder_AnswerModel::getInstance()->get_for_export($configs['table']['answer']['export_cols'], 'question_id', $question['id']);
            }
            unset($question);

            //get the result badges for quizes
            $one['result_badges'] = VQzBuilder_ResultBadgeModel::getInstance()->get_for_export($configs['table']['result_badge']['export_cols'], 'quiz_id', $one['id']);

            //get the result contents for quizes
            $one['result_contents'] = VQzBuilder_ResultContentModel::getInstance()->get_for_export($configs['table']['result_content']['export_cols'], 'quiz_id', $one['id']);
        }
        unset($one);

        // zip the export data
        $z = new ZipArchive();

        $zip_name = "vqzb_export_" . date("m_d_y_H-i") . ".zip";
        $zip_path = VQZB_TMP_UPLOADS_DIR . $zip_name;

        $z->open($zip_path, ZIPARCHIVE::CREATE);

        // zip the result badge logos dir
        vqzb_folder_to_zip(VQZB_RESULT_BG_IMG_DIR, $z);

        // zip the data from db
        $z->addFromString('db_data.txt', serialize($export));

        $z->close();

        header("Content-Type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Content-Length: " . filesize($zip_path));
        header("Content-Disposition: attachment; filename=" . $zip_name);
        readfile($zip_path);

        // clear the uploads temp dir
        vqzb_clear_dir(VQZB_TMP_UPLOADS_DIR);
        exit;
    }

    public function import()
    {
        // check if zip  class is enabled
        if (!class_exists('ZipArchive'))
            return 'Export failed: The PHP Zip archive extension is not installed on your server';

        // check if the xml file is loaded
        if (isset($_FILES['import_file']) && $_FILES['import_file']['error'] == 4)
            return 'Error: No file loaded';

        // validate the file
        if (vqzb_get_file_extension($_FILES['import_file']['name']) !== 'zip')
            return 'Error: Wrong file extension: only .zip is available';

        //upload the file
        $zip_path = VQZB_TMP_UPLOADS_DIR . $_FILES['import_file']['name'];
        $unzip_path = VQZB_TMP_UPLOADS_DIR . 'import_unzip/';
        move_uploaded_file($_FILES['import_file']['tmp_name'], $zip_path);

        // unzip the file
        $zip = new ZipArchive;
        $zip->open($zip_path);
        $zip->extractTo($unzip_path);
        $zip->close();

        // get file content
        $import = file_get_contents($unzip_path . 'db_data.txt');

        // insert quizes into db

        $db_error = 'DB error occured: import terminated';

        foreach (unserialize($import) as $one)
        {
            // insert quizes
            $quiz = array
                (
                'name' => $one['name'],
                'quiz_type_id' => $one['quiz_type_id'],
                'measurement_id' => $one['measurement_id'],
                'custom_measurement_sing' => $one['custom_measurement_sing'],
                'custom_measurement_pl' => $one['custom_measurement_pl'],
                'result_html_content' => $one['result_html_content'],
                'display_in_box' => $one['display_in_box']
            );

            if (!$quiz_id = VQzBuilder_QuizModel::getInstance()->add($quiz))
                return $db_error;

            // insert quiz abc type answers
            $abc_type_answer_ids = array('' => ''); // array (old id => new id)
            foreach ($one['abc_type_answers'] as $abc_type_answer)
            {
                $data = array
                    (
                    'quiz_id' => $quiz_id,
                    'answer' => $abc_type_answer['answer'],
                    'sort_order' => $abc_type_answer['sort_order']
                );
                if (!$abc_type_answer_ids[$abc_type_answer['id']] = VQzBuilder_ABCtypeAnswerModel::getInstance()->add($data))
                    return $db_error;
            }

            // insert quiz optin settings
            foreach ($one['optin_settings'] as $optin_setting)
            {
                $data = array
                    (
                    'quiz_id' => $quiz_id,
                    'optin_system_id' => $optin_setting['optin_system_id'],
                    'credentials' => $optin_setting['credentials'],
                    'icontact_password' => $optin_setting['icontact_password']
                );
                if (!$optin_setting_id = VQzBuilder_OptinSettingModel::getInstance()->add($data))
                    return $db_error;

                // insert result optin forms
                foreach ($optin_setting['result_optin_forms'] as $result_optin_form)
                {
                    $data = array
                        (
                        'optin_setting_id' => $optin_setting_id,
                        'email_list' => $result_optin_form['email_list'],
                        'need_contact_name' => $result_optin_form['need_contact_name'],
                        'instructions' => $result_optin_form['instructions'],
                        'content' => $result_optin_form['content'],
                        'submit_btn_text' => $result_optin_form['submit_btn_text'],
                        'is_default' => $result_optin_form['is_default'],
                        'points_from' => $result_optin_form['points_from'],
                        'points_to' => $result_optin_form['points_to'],
                        'abc_type_answer_id' => $abc_type_answer_ids[$result_optin_form['abc_type_answer_id']],
                        'is_default' => $result_optin_form['is_default']
                    );
                    if (!VQzBuilder_ResultOptInFormModel::getInstance()->add($data))
                        return $db_error;
                }
            }

            // insert the questions
            foreach ($one['questions'] as $question)
            {
                $data = array
                    (
                    'quiz_id' => $quiz_id,
                    'question' => $question['question'],
                    'content' => $question['content'],
                    'sort_order' => $question['sort_order']
                );
                if (!$question_id = VQzBuilder_QuestionModel::getInstance()->add($data))
                    return $db_error;

                // insert the answers
                foreach ($question['answers'] as $answer)
                {
                    $data = array
                        (
                        'question_id' => $question_id,
                        'answer' => $answer['answer'],
                        'value' => $answer['value'],
                        'abc_type_answer_id' => $abc_type_answer_ids[$answer['abc_type_answer_id']],
                        'sort_order' => $answer['sort_order']
                    );
                    if (!VQzBuilder_AnswerModel::getInstance()->add($data))
                        return $db_error;
                }
            }

            // insert result_badges
            foreach ($one['result_badges'] as $result_badge)
            {
                $image_name = '';
                if ($result_badge['background_image'] != '')
                {
                    $answer_variant = ($result_badge['abc_type_answer_id'] != '') ? $result_badge['abc_type_answer_id'] : $result_badge['points_from'] . '-' . $result_badge['points_to'];
                    $image_name = "quiz_bg_" . $quiz_id . '_' . $answer_variant . '.' . vqzb_get_file_extension($result_badge['background_image']);
                }

                $data = array
                    (
                    'quiz_id' => $quiz_id,
                    'text' => $result_badge['text'],
                    'text_color' => $result_badge['text_color'],
                    'text_font_id' => $result_badge['text_font_id'],
                    'text_fontsize_id' => $result_badge['text_fontsize_id'],
                    'background_color' => $result_badge['background_color'],
                    'background_image' => $image_name,
                    'share_text_twitter' => $result_badge['share_text_twitter'],
                    'share_text_fb' => $result_badge['share_text_fb'],
                    'share_text_pin' => $result_badge['share_text_pin'],
                    'points_from' => $result_badge['points_from'],
                    'points_to' => $result_badge['points_to'],
                    'abc_type_answer_id' => $abc_type_answer_ids[$result_badge['abc_type_answer_id']],
                    'is_default' => $result_badge['is_default']
                );
                if (!VQzBuilder_ResultBadgeModel::getInstance()->add($data))
                    return $db_error;

                // move the logo
                if ($image_name != '')
                {
                    if (file_exists($unzip_path . $result_badge['background_image']))
                        copy($unzip_path . $result_badge['background_image'], VQZB_RESULT_BG_IMG_DIR . $image_name);
                }
            }

            // insert result contents
            foreach ($one['result_contents'] as $result_content)
            {
                $data = array
                    (
                    'quiz_id' => $quiz_id,
                    'text' => $result_content['text'],
                    'points_from' => $result_content['points_from'],
                    'points_to' => $result_content['points_to'],
                    'abc_type_answer_id' => $abc_type_answer_ids[$result_content['abc_type_answer_id']],
                    'is_default' => $result_content['is_default']
                );
                if (!VQzBuilder_ResultContentModel::getInstance()->add($data))
                    return $db_error;
            }
        }

        // clear the temp dir
        vqzb_clear_dir(VQZB_TMP_UPLOADS_DIR);

        return TRUE;
    }

}