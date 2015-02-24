<?php

/*
 * Answer model
 */
class VQzBuilder_OptinSettingModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 5;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_OptinSettingModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'optin_settings');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	`quiz_id` INTEGER UNSIGNED NOT NULL,
	`optin_system_id` INTEGER UNSIGNED NOT NULL,
	`credentials` CHAR(200) NOT NULL,
	`icontact_password` CHAR(200),
	PRIMARY KEY (`id`)
	) ENGINE=" . $this->storage_engine . " DEFAULT CHARSET=" . $this->default_charset . ";";
        return dbDelta($sql);
    }

    public function vqbUpdateTable()
    {

    }

    /**
     * Add foreign keys 
     */
    public function add_foreign_keys()
    {
        if ($this->check_indexes_exist() === FALSE)
        {
            $oquiz = new VQzBuilder_QuizModel();
            $optin_system = new VQzBuilder_OptinSystemModel();
            $sql = "ALTER TABLE `{$this->getTableName()}`
	    ADD INDEX `quiz_id`(`quiz_id`),
	    ADD CONSTRAINT `FK_vqzb_optin_quiz` FOREIGN KEY `FK_vqzb_optin_quiz` (`quiz_id`)
	    REFERENCES `{$oquiz->getTableName()}` (`id`)
	    ON DELETE CASCADE
	    ON UPDATE CASCADE,
	    ADD INDEX `optin_system_id`(`optin_system_id`),
	    ADD CONSTRAINT `FK_vqzb_optin_optinsystem` FOREIGN KEY `FK_vqzb_optin_optinsystem` (`optin_system_id`)
	    REFERENCES `{$optin_system->getTableName()}` (`id`)
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
    
    public function delete_by_quiz($quiz_id)
    {
        $quiz_id = intval($quiz_id);
        if ($this->wpdb->query($this->wpdb->prepare("DELETE FROM {$this->getTableName()} WHERE `quiz_id` = %d", $quiz_id)) === FALSE)
        {
            return FALSE;
        }
        return TRUE;
    }
    
    public function get_by_quiz($quiz_id)
    {
        $quiz_id = intval($quiz_id);
        return $this->wpdb->get_row(
	        "SELECT os.`id`,
		os.`quiz_id`,
		os.`optin_system_id`,
		os.`credentials`,
		os.`icontact_password`
		FROM {$this->getTableName()} os
		WHERE os.`quiz_id` = {$quiz_id}", ARRAY_A);
    }
    
    public function get_one($id)
    {
        $id = intval($id);
        $ooptin_system = VQzBuilder_OptinSystemModel::getInstance();
        return $this->wpdb->get_row(
	        "SELECT os.`id`,
		os.`quiz_id`,
		os.`optin_system_id`,
		os.`credentials`,
		os.`icontact_password`,
		osys.`name` as `optin_systen_name`,
		osys.`slug` as `optin_systen_slug`
		FROM {$this->getTableName()} os LEFT JOIN {$ooptin_system->getTableName()} osys ON os.`optin_system_id` = osys.`id`
		WHERE os.`id` = {$id}", ARRAY_A);
    }

}