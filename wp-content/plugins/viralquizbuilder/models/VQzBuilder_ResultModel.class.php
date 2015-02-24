<?php
/*
 * Quiz Result model
 */
class VQzBuilder_ResultModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 4;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_ResultModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'result');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`quiz_id` INTEGER UNSIGNED,
	`ip` CHAR(20) NOT NULL,
	`date` DATETIME NOT NULL,
	`picture_name` CHAR(200),
	`points` INTEGER UNSIGNED,
	`abc_type_answer_id` INTEGER UNSIGNED,
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
	    ADD CONSTRAINT `FK_vqzb_result_quiz` FOREIGN KEY `FK_vqzb_result_quiz` (`quiz_id`)
	    REFERENCES `{$oquiz->getTableName()}` (`id`)
	    ON DELETE SET NULL
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
     * Get list of results
     * @return array 
     */
    public function get_list($quiz_id = NULL)
    {
        $oquiz = new VQzBuilder_QuizModel();
        $oabc_type_answer = new VQzBuilder_ABCtypeAnswerModel();
        
        $sql = "SELECT r.`id`, r.`ip`, r.`points`, r.`abc_type_answer_id`, r.`picture_name`, r.`date`,
            (SELECT q.`name` FROM `{$oquiz->getTableName()}` q WHERE r.`quiz_id` = q.`id`) as quiz_name, 
            (SELECT q.`custom_measurement_sing` FROM `{$oquiz->getTableName()}` q WHERE r.`quiz_id` = q.`id`) as custom_measurement_sing, 
            (SELECT q.`custom_measurement_pl` FROM `{$oquiz->getTableName()}` q WHERE r.`quiz_id` = q.`id`) as custom_measurement_pl, 
            (SELECT q.`measurement_id` FROM `{$oquiz->getTableName()}` q WHERE r.`quiz_id` = q.`id`) as measurement_id,
            (SELECT abc.`answer` FROM {$oabc_type_answer->getTableName()} abc WHERE abc.`id` = r.`abc_type_answer_id`) as abc_type_answer
            FROM `{$this->getTableName()}` r ";
            
        if ($quiz_id != NULL)
            $sql .= " WHERE r.`quiz_id` = {$quiz_id}";
            
        $sql .= " ORDER BY r.`date` DESC";
        
        return $this->wpdb->get_results($sql, ARRAY_A);
    }

    /**
     * Get results statistic
     * @return array 
     */
    public function get_statistic($quiz_id = NULL)
    {
        $sql = "SELECT COUNT(`id`) as number,
		UNIX_TIMESTAMP(`date`)*1000 as `date` 
		FROM {$this->getTableName()}";
		
        if ($quiz_id != NULL)
            $sql .= " WHERE `quiz_id` = {$quiz_id}";
            
        $sql .= " GROUP BY DATE(`date`)";
        return $this->wpdb->get_results($sql, ARRAY_A);
    }

    /**
     * Delete all results from table
     * @return boolean 
     */
    public function clear_table()
    {
        if ($this->wpdb->query("TRUNCATE TABLE `{$this->getTableName()}`") === FALSE)
            return FALSE;
        return TRUE;
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
	        "SELECT r.`id`,
		r.`quiz_id`,
		r.`ip`,
		r.`date`,
		r.`picture_name`,
		r.`abc_type_answer_id`,
		r.`points`
		FROM {$this->getTableName()} r 
		WHERE r.`id` = {$id}", ARRAY_A);
    }

}