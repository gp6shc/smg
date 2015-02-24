<?php

/*
 * Result Content model
 */

class VQzBuilder_ResultContentModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 2;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_ResultContentModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'result_contents');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`quiz_id` INTEGER UNSIGNED NOT NULL,
	`text` TEXT,
	`points_from` INTEGER UNSIGNED,
	`points_to` INTEGER UNSIGNED,
	`abc_type_answer_id` INTEGER UNSIGNED,
	`is_default` TINYINT(1) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
	) ENGINE=" . $this->storage_engine . " DEFAULT CHARSET=" . $this->default_charset . ";";
        return dbDelta($sql);
    }

    /**
     * Add foreign keys 
     */
    public function add_foreign_keys()
    {
        if ($this->check_indexes_exist() === FALSE)
        {
            $oquiz = new VQzBuilder_QuizModel();
            $oabc_type_answer = new VQzBuilder_ABCtypeAnswerModel();
            $sql = "ALTER TABLE `{$this->getTableName()}`
	    ADD INDEX `quiz_id`(`quiz_id`),
	    ADD CONSTRAINT `FK_vqzb_rescontent_quiz` FOREIGN KEY `FK_vqzb_rescontent_quiz` (`quiz_id`)
	    REFERENCES `{$oquiz->getTableName()}` (`id`)
	    ON DELETE CASCADE
	    ON UPDATE CASCADE,
	    ADD INDEX `abc_type_answer_id`(`abc_type_answer_id`),
	    ADD CONSTRAINT `FK_vqzb_rescontent_abcanswer` FOREIGN KEY `FK_vqzb_rescontent_abcanswer` (`abc_type_answer_id`)
	    REFERENCES `{$oabc_type_answer->getTableName()}` (`id`)
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

    /**
     * Delete
     * @param integer $id
     * @return mixed(array|TRUE) Array of errors or TRUE 
     */
    public function delete($id)
    {
        return !parent::delete($id) ? array('DB error ocured') : TRUE;
    }

    /**
     * Get one
     * @param integer $id
     * @return array
     */
    public function get_one($id)
    {
        $id = intval($id);
        return $this->wpdb->get_row(
                        "SELECT rc.`id`,
		rc.`quiz_id`,
		rc.`text`,
		rc.`points_from`,
		rc.`points_to`,
		rc.`abc_type_answer_id`,
		rc.`is_default`
		FROM {$this->getTableName()} rc 
		WHERE rc.`id` = {$id}", ARRAY_A);
    }

    public function is_default($id)
    {
        $res = $this->get_one($id);
        return $res['is_default'] == 1 ? TRUE : FALSE;
    }

    /**
     * Check if the default content for the quiz already exists
     * @param integer $quiz_id
     * @return boolean
     */
    public function default_exists($quiz_id)
    {
        $quiz_id = intval($quiz_id);
        $res = $this->wpdb->get_results("SELECT c.`id` 
		FROM {$this->getTableName()} c
		WHERE c.`quiz_id` = {$quiz_id} 
		AND c.`is_default` = 1", ARRAY_A);
        return (count($res) > 0);
    }

    /**
     * Get list by quiz
     * @param integer $quiz_id Quiz id
     * @return array
     */
    public function get_by_quiz($quiz_id)
    {
        $quiz_id = intval($quiz_id);
        $oabc_type_answer = new VQzBuilder_ABCtypeAnswerModel();
        return $this->wpdb->get_results("
	SELECT rc.`id`, 
	rc.`quiz_id`, 
	rc.`points_from`,
	rc.`points_to`,
	rc.`abc_type_answer_id`,
	rc.`is_default`,
	rc.`text`,
	(SELECT abc.`answer` FROM `{$oabc_type_answer->getTableName()}` abc WHERE abc.`id` = rc.`abc_type_answer_id`) as `abc_type_answer_name`
	FROM `{$this->getTableName()}` rc
	WHERE `quiz_id` = {$quiz_id}", ARRAY_A);
    }

    /**
     * Check if user can create one more optin form for the quiz
     * @param integer $quiz_id
     * @param integer $id
     * @return boolean
     */
    public function can_create($quiz_id, $id = NULL)
    {
        $quiz_type = VQzBuilder_QuizModel::getInstance()->get_type_slug($quiz_id);
        switch ($quiz_type)
        {
            case 'abc-quiz':
                if (count(VQzBuilder_ABCtypeAnswerModel::getInstance()->get_not_used_in_quiz_content($quiz_id, $id)) > 0)
                    return TRUE;
                return FALSE;
            case 'points-quiz':
            default:
                return TRUE;
        }
    }

    public function check_if_points_used($points_from, $points_to, $quiz_id, $id = NULL)
    {
        $sql = "SELECT `id`
	FROM `{$this->getTableName()}`
	WHERE `quiz_id` = {$quiz_id}
	AND ({$points_from} BETWEEN `points_from` AND `points_to`
	OR {$points_to} BETWEEN `points_from` AND `points_to`)";
        if ($id !== NULL)
            $sql .= " AND `id` <> {$id}";

        $res = $this->wpdb->get_results($sql, ARRAY_A);
        return count($res) > 0 ? TRUE : FALSE;
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

        //check if content for the points exists
        if (!($data['points_from'] <= $data['points_to']))
            $errors[] = 'The From points value must be smaller or equals the To points value';
        elseif ($this->check_if_points_used($data['points_from'], $data['points_to'], $quiz_id, $id))
            $errors[] = 'The Result Content for the entered points values already exists.';

        //return errors
        if (isset($errors))
            return $errors;
        return TRUE;
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
        // check if the result content if 'default'
        if (!$data['is_default'])
        {
            // check according to the quiz type (abc or points)
            switch (VQzBuilder_QuizModel::getInstance()->get_type_slug($quiz_id))
            {
                case 'points-quiz':
                    if ($this->validate_points($data, $quiz_id, $id) !== TRUE)
                        $errors = $this->validate_points($data, $quiz_id, $id);
                    break;

                case 'abc-quiz':
                    if ($data['abc_type_answer_id'] == '')
                        $errors[] = 'Select For value';
                    if (!vqzb_is_numeric($data['abc_type_answer_id']))
                        $errors[] = 'ABC type answer id must be numeric';
                    if (!$this->can_create($quiz_id, $id))
                        $errors[] = 'The Result Content for the selected abc type answer already exists.';
            }
        }

        //validate content itself
        if ($data['text'] == '')
            $errors[] = 'Enter Content';

        // return errors if they were found
        if (isset($errors))
            return $errors;

        return TRUE;
    }

}