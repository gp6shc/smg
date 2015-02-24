<?php

/**
 * Quiz Moedl
 * 
 * When creating quiz the next default objects must be created:
 *  - default result content
 *  - default result badge 
 */
class VQzBuilder_QuizModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 9;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_QuizModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'quiz');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` CHAR(200) NOT NULL,
	`quiz_type_id` INTEGER UNSIGNED NOT NULL,
	`measurement_id` INTEGER UNSIGNED,
	`custom_measurement_sing` CHAR(70),
	`custom_measurement_pl` CHAR(70),
	`result_html_content` TEXT,
	`display_in_box` TINYINT(1) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
	) ENGINE=" . $this->storage_engine . " DEFAULT CHARSET=" . $this->default_charset . ";";
        return dbDelta($sql);
    }

    public function add_foreign_keys()
    {
        if ($this->check_indexes_exist() === FALSE)
        {
            $omeasurement = new VQzBuilder_MeasurementModel();
            $oquiz_type = new VQzBuilder_QuiztypeModel();
            $sql = "ALTER TABLE `{$this->getTableName()}`
	    ADD INDEX `measurement_id`(`measurement_id`),
	    ADD INDEX `quiz_type_id`(`quiz_type_id`),
	    ADD CONSTRAINT `FK_vqzb_quiz_measurement` FOREIGN KEY `FK_vqzb_quiz_measurement` (`measurement_id`)
	    REFERENCES `{$omeasurement->getTableName()}` (`id`)
	    ON DELETE RESTRICT
	    ON UPDATE CASCADE,
	    ADD CONSTRAINT `FK_vqzb_quiz_quiztype` FOREIGN KEY `FK_vqzb_quiz_quiztype` (`quiz_type_id`)
	    REFERENCES `{$oquiz_type->getTableName()}` (`id`)
	    ON DELETE RESTRICT
	    ON UPDATE CASCADE;";
            return $this->wpdb->query($sql);
        }
    }

    /**
     * Insert row
     * @param array $data Data to insert (field_name => value)
     * @param boolean If the quiz is being created manually or automatically (i.e. import)
     * @return boolean 
     */
    public function add($data)
    {
        // clear some fields
        if ($data['quiz_type_id'] == '2')//2 = a-b-c quiz type
        {
            $data['measurement_id'] = NULL;
            $data['custom_measurement_sing'] = NULL;
            $data['custom_measurement_pl'] = NULL;
        }
        else
        {
            // prepare data for DB
            if ($data['measurement_id'] == '')
            {
                $data['measurement_id'] = NULL;
            }
            else
            {
                $data['custom_measurement_sing'] = NULL;
                $data['custom_measurement_pl'] = NULL;
            }
        }
        if (!$quiz_id = $this->insert($this->getTableName(), $data))
            return FALSE;

        return $quiz_id;
    }

    public function get_type_slug($id)
    {
        $id = intval($id);
        $oquiz_type = new VQzBuilder_QuiztypeModel();
        return $this->wpdb->get_var(
                        "SELECT (SELECT qt.`slug` FROM `{$oquiz_type->getTableName()}` qt WHERE qt.`id` = qz.`quiz_type_id`)
	        FROM {$this->getTableName()} qz 
	        WHERE qz.`id` = {$id}");
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
     * Get quiz by its id
     * @param integer $id Quiz id
     * @return array
     */
    public function get_one($id)
    {
        $id = intval($id);
        $omeasurement = new VQzBuilder_MeasurementModel();
        $oquiz_type = new VQzBuilder_QuiztypeModel();
        $oresult = new VQzBuilder_ResultModel();
        return $this->wpdb->get_row(
                        "SELECT qz.`id`,
		qz.`name`,
		qz.`quiz_type_id`,
		qz.`custom_measurement_sing`,
		qz.`custom_measurement_pl`,
		qz.`measurement_id`,
		qz.`display_in_box`,
		(SELECT qt.`name` FROM `{$oquiz_type->getTableName()}` qt WHERE qt.`id` = qz.`quiz_type_id`) as `quiz_type`,
		(SELECT m.`name_sing` FROM `{$omeasurement->getTableName()}` m WHERE m.`id` = qz.`measurement_id`) as `measurement`,
		(SELECT m.`name_pl` FROM `{$omeasurement->getTableName()}` m WHERE m.`id` = qz.`measurement_id`) as `measurement_pl`,
		(SELECT COUNT(r.`id`) FROM `{$oresult->getTableName()}` r WHERE r.`quiz_id` = qz.`id`) as `passed_qty`
		FROM {$this->getTableName()} qz 
		WHERE qz.`id` = {$id}", ARRAY_A);
    }

    /**
     * Get list of quizes
     * @return type 
     */
    public function get_list()
    {
        $oquestion = new VQzBuilder_QuestionModel();
        $oresult = new VQzBuilder_ResultModel();
        return $this->wpdb->get_results("SELECT qz.`id`, qz.`name`, 
					(SELECT COUNT(qt.`id`) FROM {$oquestion->getTableName()} qt WHERE qt.`quiz_id` = qz.`id`) as questions_qty, 
					(SELECT COUNT(r.`id`) FROM {$oresult->getTableName()} r WHERE r.`quiz_id` = qz.`id`) as passed_test 
					FROM `{$this->getTableName()}` qz ORDER BY qz.`id`", ARRAY_A);
    }

}