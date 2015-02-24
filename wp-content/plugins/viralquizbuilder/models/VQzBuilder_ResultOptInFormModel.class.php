<?php

/*
 * Result Content model
 * 
 * need_contact_name - option which defines if contact name is needed - default 1 (yes)
 */

class VQzBuilder_ResultOptInFormModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 1;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_ResultOptInFormModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'result_optin_forms');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`optin_setting_id` INTEGER UNSIGNED NOT NULL,
	`points_from` INTEGER UNSIGNED,
	`points_to` INTEGER UNSIGNED,
	`abc_type_answer_id` INTEGER UNSIGNED,
	`email_list` CHAR(100) NOT NULL,
        `need_contact_name` TINYINT(1) NOT NULL DEFAULT 1,
	`instructions` TEXT,
        `content` TEXT,
	`submit_btn_text` CHAR(100),
	`is_default` TINYINT(1) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
	) ENGINE=" . $this->storage_engine . " DEFAULT CHARSET=" . $this->default_charset . ";";
        return dbDelta($sql);
    }

    /**
     * Update table in accordance with plugin updates
     * $version = current database version of plugin
     * @return boolean
     */
    public function updateTable($version) {
        // version 2.02 - manual code for opt in
            if(!$this->check_column_exists("custom_code")) {
                $sql = "ALTER TABLE {$this->getTableName()} ADD `custom_code` text default NULL after `is_default`";
                $this->wpdb->query($sql);
            }
    }

    /**
     * Add foreign keys 
     */
    public function add_foreign_keys()
    {
        if ($this->check_indexes_exist() === FALSE)
        {
            $optinsetting = new VQzBuilder_OptinSettingModel();
            $sql = "ALTER TABLE `{$this->getTableName()}`
	    ADD INDEX `optin_setting_id`(`optin_setting_id`),
	    ADD CONSTRAINT `FK_vqzb_optin_form_x_setting` FOREIGN KEY `FK_vqzb_optin_form_x_setting` (`optin_setting_id`)
	    REFERENCES `{$optinsetting->getTableName()}` (`id`)
	    ON DELETE CASCADE
	    ON UPDATE CASCADE;";
            $this->wpdb->query($sql);
        }
    }

    /**
     * Insert row
     * @param array $data Data to insert (field_name => value)
     * @return boolean 
     */
    public function add($data)
    {
        return $this->insert($this->getTableName(), $data);
    }

    /**
     * Update row
     * @param integer $id Row id
     * @param array $data Data to update (field_name => value)
     * @return boolean 
     */
    public function edit($id, $data)
    {
        return $this->update($this->getTableName(), $id, $data);
    }

    // if user can create one more form for quiz?
    public function can_create($quiz_id, $id = NULL)
    {
        $quiz_type = VQzBuilder_QuizModel::getInstance()->get_type_slug($quiz_id);
        switch ($quiz_type)
        {
            case 'abc-quiz':
                if (count(VQzBuilder_ABCtypeAnswerModel::getInstance()->get_not_used_in_quiz_optin_form($quiz_id, $id)) > 0 OR !$this->default_form_exist)
                    return TRUE;
                return FALSE;
            case 'points-quiz':
            default:
                return TRUE;
        }
    }

    /**
     * Check if the default form for the quiz already exists
     * @param integer $quiz_id
     * @return boolean
     */
    public function default_form_exist($quiz_id)
    {
        $quiz_id = intval($quiz_id);
        $ooptin_setting = new VQzBuilder_OptinSettingModel();
        $res = $this->wpdb->get_results("SELECT of.`id` 
		FROM {$this->getTableName()} of LEFT JOIN {$ooptin_setting->getTableName()} os ON of.`optin_setting_id` = os.`id` 
		WHERE os.`quiz_id` = {$quiz_id} 
		AND of.`is_default` = 1", ARRAY_A);
        return (count($res) > 0);
    }

    /**
     * Get one
     * @param integer $id
     * @return array
     */
    public function get_one($id)
    {
        $id = intval($id);
        $ooptin_setting = VQzBuilder_OptinSettingModel::getInstance();
        return $this->wpdb->get_row(
                        "SELECT of.`id`,
		of.`optin_setting_id`,
		of.`points_from`,
		of.`points_to`,
		of.`abc_type_answer_id`,
		of.`is_default`,
		of.`email_list`,
                of.`need_contact_name`,
		of.`instructions`,
                of.`content`,
		of.`submit_btn_text`,
		of.`custom_code`,
		oset.`quiz_id` as `quiz_id`,
		oset.`optin_system_id` as `optin_system_id`,
		oset.`credentials` as `credentials`,
		oset.`icontact_password` as `icontact_password`
		FROM {$this->getTableName()} of LEFT JOIN {$ooptin_setting->getTableName()} oset ON of.`optin_setting_id` = oset.`id`
		WHERE of.`id` = {$id}", ARRAY_A);
    }

    /**
     * Get list by quiz
     * @param integer $quiz_id Quiz id
     * @return array
     */
    public function get_by_quiz($quiz_id)
    {
        $quiz_id = intval($quiz_id);
        $oabc_type_answer = VQzBuilder_ABCtypeAnswerModel::getInstance();
        $ooptin_setting = VQzBuilder_OptinSettingModel::getInstance();
        return $this->wpdb->get_results("
	SELECT of.`id`, 
	of.`points_from`,
	of.`points_to`,
	of.`abc_type_answer_id`,
	of.`is_default`,
        of.`need_contact_name`,
	of.`instructions`,
        of.`content`,
	of.`submit_btn_text`,
	of.`email_list`,
	of.`custom_code`,
	(SELECT abc.`answer` FROM `{$oabc_type_answer->getTableName()}` abc WHERE abc.`id` = of.`abc_type_answer_id`) as `abc_type_answer_name`
	FROM `{$this->getTableName()}` of LEFT JOIN {$ooptin_setting->getTableName()} oset ON of.`optin_setting_id` = oset.`id`
	WHERE oset.`quiz_id` = {$quiz_id}", ARRAY_A);
    }

    /**
     * Validate the Result Content
     * @param array $data Data to validate
     * @param integer $quiz_id The related quiz id
     * @param mixed(integer|NULL) $id The Result Content Id if editing it
     * @return array|TRUE Array of errors or boolean TRUE
     */
    public function validate($data, $quiz_id, $id = NULL)
    {
        // check if the form is default
        if (!isset($data['is_default']))
        {
            // check according to the quiz type (abc or points)
            switch (VQzBuilder_QuizModel::getInstance()->get_type_slug($quiz_id))
            {
                case 'points-quiz':
                    if (($valid_points = $this->validate_points($data, $quiz_id, $id)) !== TRUE)
                        $errors = $valid_points;
                    break;

                case 'abc-quiz':
                    if ($data['abc_type_answer_id'] == '')
                        $errors[] = 'Select For value';
                    if (!vqzb_is_numeric($data['abc_type_answer_id']))
                        $errors[] = 'For value must be numeric';
            }
        }

        //validate content itself
        // if ($data['email_list'] == '')
        //     $errors[] = 'Choose email list';

        // return errors if they were found
        if (isset($errors))
            return $errors;

        return TRUE;
    }

    public function validate_points($data, $quiz_id, $id = NULL)
    {
        //validate points from value
        if ($data['points_from'] == '')
            $errors[] = 'Enter From point value';
        elseif (!vqzb_is_numeric($data['points_from']))
            $errors[] = 'From points value must be numeric';

        //validate points to value
        if ($data['points_to'] == '')
            $errors[] = 'Enter To point value';
        elseif (!vqzb_is_numeric($data['points_to']))
            $errors[] = 'To point value must be numeric';

        //return errors
        if (isset($errors))
            return $errors;

        return TRUE;
    }
}