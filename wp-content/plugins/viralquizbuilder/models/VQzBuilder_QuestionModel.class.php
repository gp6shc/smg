<?php

/*
 * Question model
 */
class VQzBuilder_QuestionModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 7;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_QuestionModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'question');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`quiz_id` INTEGER UNSIGNED NOT NULL,
	`question` CHAR(200) NOT NULL,
	`content` TEXT,
	`sort_order` INTEGER UNSIGNED NOT NULL,
	PRIMARY KEY (`id`)
	) ENGINE=" . $this->storage_engine . " DEFAULT CHARSET=" . $this->default_charset . ";";
        return dbDelta($sql);
    }

    public function add_foreign_keys()
    {
        if ($this->check_indexes_exist() === FALSE)
        {
            $oquiz = new VQzBuilder_QuizModel();
            $sql = "ALTER TABLE `{$this->getTableName()}`
	    ADD INDEX `quiz_id`(`quiz_id`),
	    ADD CONSTRAINT `FK_vqzb_question_quiz` FOREIGN KEY `FK_vqzb_question_quiz` (`quiz_id`)
	    REFERENCES `{$oquiz->getTableName()}` (`id`)
	    ON DELETE CASCADE
	    ON UPDATE CASCADE;";
            return $this->wpdb->query($sql);
        }
    }

    /**
     * Insert row
     * @param array $data Data to insert (field_name => value)
     * @return boolean 
     */
    public function add($data)
    {
        $max_order = $this->get_max_sort_order();
        $data['sort_order'] = $max_order + 1;
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
     * Get question by its id
     * @param type $id Question id
     * @return array
     */
    public function get_one($id)
    {
        $id = intval($id);
        return $this->wpdb->get_row("SELECT `id`, `quiz_id`, `question`, `content` FROM {$this->getTableName()} WHERE `id` = {$id}", ARRAY_A);
    }

    /**
     * Get questions by quiz id
     * @param integer $quiz_id Quiz id
     * @return array Array of questions
     */
    public function get_by_quiz_id($quiz_id)
    {
        $quiz_id = intval($quiz_id);
        $oanswer = new VQzBuilder_AnswerModel();
        return $this->wpdb->get_results("SELECT 
	q.`id`,
	q.`question`, 
	q.`sort_order`, 
	q.`content`, 
	(SELECT COUNT(a.`id`) FROM {$oanswer->getTableName()} a WHERE a.`question_id` = q.`id`) as `answer_num`
	FROM `{$this->getTableName()}` q 
	WHERE q.`quiz_id` = {$quiz_id} 
	ORDER BY q.`sort_order`", ARRAY_A);
    }

}