<?php

/*
 * Answer model
 */
class VQzBuilder_AnswerModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 6;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_AnswerModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'answer');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`question_id` INTEGER UNSIGNED NOT NULL,
	`answer` CHAR(200) NOT NULL,
	`value` INTEGER UNSIGNED,
	`abc_type_answer_id` INTEGER UNSIGNED,
	`selected_qty` INTEGER NOT NULL DEFAULT 0,
	`sort_order` INTEGER UNSIGNED UNSIGNED NOT NULL,
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
            $oquestion = new VQzBuilder_QuestionModel();
            $oab_type_answer = new VQzBuilder_ABCtypeAnswerModel();
            $sql = "ALTER TABLE `{$this->getTableName()}`
	    ADD INDEX `question_id`(`question_id`),
	    ADD CONSTRAINT `FK_vqzb_answer_question` FOREIGN KEY `FK_vqzb_answer_question` (`question_id`)
	    REFERENCES `{$oquestion->getTableName()}` (`id`)
	    ON DELETE CASCADE
	    ON UPDATE CASCADE,
	    ADD INDEX `abc_type_answer_id`(`abc_type_answer_id`),
	    ADD CONSTRAINT `FK_vqzb_answer_abc_type_answer` FOREIGN KEY `FK_vqzb_answer_abc_type_answer` (`abc_type_answer_id`)
	    REFERENCES `{$oab_type_answer->getTableName()}` (`id`)
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
     * Get answers by question id
     * @param integer $question_id Question id
     * @return array Array of answers
     */
    public function get_by_question_id($question_id)
    {
        $question_id = intval($question_id);
        return $this->wpdb->get_results("SELECT `id`, `answer`, `value`, `abc_type_answer_id`, `selected_qty`, `sort_order` FROM `{$this->getTableName()}` WHERE `question_id` = {$question_id} ORDER BY `sort_order`", ARRAY_A);
    }

    /**
     * Delete answers by question id
     * @param integer $question_id Question id
     * @return boolean Deleting result
     */
    public function delete_by_question_id($question_id)
    {
        $question_id = intval($question_id);
        if ($this->wpdb->query($this->wpdb->prepare("DELETE FROM {$this->getTableName()} WHERE `question_id` = %d", $question_id)) === FALSE)
        {
            return FALSE;
        }
        return TRUE;
    }
    
    public function get_by_quiz($quiz_id)
    {
        $oquestion = VQzBuilder_QuestionModel::getInstance();
        $quiz_id = intval($quiz_id);
        return $this->wpdb->get_results($this->wpdb->prepare("SELECT a.`id` FROM {$this->getTableName()} a LEFT JOIN {$oquestion->getTableName()} q ON a.`question_id` = q.`id` WHERE q.`quiz_id` = %d", $quiz_id));
    }
    
    /**
     * Get one
     * @param integer $id
     * @return array
     */
    public function get_one($id)
    {
        $id = intval($id);
        $oabc_type_answer = new VQzBuilder_ABCtypeAnswerModel();
        return $this->wpdb->get_row(
	        "SELECT a.`id`,
		a.`question_id`,
		a.`answer`,
		a.`value`,
		a.`abc_type_answer_id`,
		a.`selected_qty`,
		(SELECT abc.`answer` FROM `{$oabc_type_answer->getTableName()}` abc WHERE a.`abc_type_answer_id` = abc.`id`) as `abc_type_answer_name`
		FROM `{$this->getTableName()}` a 
		WHERE a.`id` = {$id}", ARRAY_A);
    }
    
    public function clear_statistic($id)
    {
        return $this->edit($id, array('selected_qty' => 0));
    }

}