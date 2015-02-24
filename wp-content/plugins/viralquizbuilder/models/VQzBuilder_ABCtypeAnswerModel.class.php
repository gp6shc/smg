<?php

/*
 * ABC Answer model - A/B/C quiz answer variant.
 */
class VQzBuilder_ABCtypeAnswerModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 8;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_ABCtypeAnswerModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'abc_type_answers');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	    `answer` CHAR(100) NOT NULL,
	    `quiz_id` INTEGER UNSIGNED NOT NULL,
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
	    ADD CONSTRAINT `FK_vqzb_abcanswer_quiz` FOREIGN KEY `FK_vqzb_abcanswer_quiz` (`quiz_id`)
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
        return $this->insert($this->getTableName(), $data);
    }

    /**
     * Get by id
     * @param type $id
     * @return array
     */
    public function get_one($id)
    {
        $id = intval($id);
        return $this->wpdb->get_row("SELECT `id`, `answer`, `quiz_id` FROM {$this->getTableName()} WHERE `id` = {$id}", ARRAY_A);
    }

    /**
     * Get by quiz id
     * @param type $quiz_id
     * @return array List of answers selected by quiz
     */
    public function get_by_quiz($quiz_id)
    {
        $quiz_id = intval($quiz_id);
        return $this->wpdb->get_results("SELECT `id`, `answer` FROM `{$this->getTableName()}` WHERE `quiz_id` = {$quiz_id} ORDER BY `sort_order`", ARRAY_A);
    }

    /**
     * Get abc type answers that are not used in the quiz result content
     * @param type $quiz_id
     * @return array List of answers
     */
    public function get_not_used_in_quiz_content($quiz_id, $rescontent_id = NULL)
    {
        $quiz_id = intval($quiz_id);
        $oresult_content = new VQzBuilder_ResultContentModel();
        $sql = "SELECT abc.`id`, abc.`answer`
		        FROM `{$this->getTableName()}` abc LEFT JOIN `{$oresult_content->getTableName()}` rc ON abc.`id` = rc.`abc_type_answer_id`
		        WHERE (abc.`quiz_id` = {$quiz_id}
		        AND rc.`abc_type_answer_id` IS NULL)";

        if ($rescontent_id !== NULL)
            $sql .= " OR rc.`id` = {$rescontent_id}";

        $sql .= " ORDER BY abc.`sort_order`";
        return $this->wpdb->get_results($sql, ARRAY_A);
    }

    /**
     * Get abc type answers that are not used in the quiz result badges
     * @param type $quiz_id
     * @return array List of answers
     */
    public function get_not_used_in_quiz_badge($quiz_id, $resbadge_id = NULL)
    {
        $quiz_id = intval($quiz_id);
        $oresult_badge = new VQzBuilder_ResultBadgeModel();
        $sql = "SELECT abc.`id`, abc.`answer`
		        FROM `{$this->getTableName()}` abc LEFT JOIN `{$oresult_badge->getTableName()}` rc ON abc.`id` = rc.`abc_type_answer_id`
		        WHERE (abc.`quiz_id` = {$quiz_id}
		        AND rc.`abc_type_answer_id` IS NULL)";

        if ($resbadge_id !== NULL)
            $sql .= " OR rc.`id` = {$resbadge_id}";

        $sql .= " ORDER BY abc.`sort_order`";
        return $this->wpdb->get_results($sql, ARRAY_A);
    }

    public function get_not_used_in_quiz_optin_form($quiz_id, $optin_form_id = NULL)
    {
        $quiz_id = intval($quiz_id);
        $ooptin_form = new VQzBuilder_ResultOptInFormModel();
        $sql = "SELECT abc.`id`, abc.`answer`
		        FROM `{$this->getTableName()}` abc LEFT JOIN `{$ooptin_form->getTableName()}` of ON abc.`id` = of.`abc_type_answer_id`
		        WHERE (abc.`quiz_id` = {$quiz_id}
		        AND of.`abc_type_answer_id` IS NULL)";

        if ($optin_form_id !== NULL)
            $sql .= " OR of.`id` = {$optin_form_id}";

        $sql .= " ORDER BY abc.`sort_order`";
        return $this->wpdb->get_results($sql, ARRAY_A);
    }
}