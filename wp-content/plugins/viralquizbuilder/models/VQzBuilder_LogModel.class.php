<?php
/*
 * Quiz Result model
 */
class VQzBuilder_LogModel extends VQzBuilder_ModelCore
{
    var $delete_priority = 12;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_LogModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();
        $this->setTableName($this->table_prefix . 'vqb_log');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	    `action` VARCHAR(255),
	    `date` VARCHAR(255),
	    PRIMARY KEY (`id`)
	    ) ENGINE=" . $this->storage_engine . " DEFAULT CHARSET=" . $this->default_charset . ";";
            return dbDelta($sql);
    }

    /**
     * return log file for view
     * @return mixed
     */
    public function get_log_file() {
        $sql = "SELECT * FROM {$this->getTableName()} ORDER BY ID DESC";
        return $this->wpdb->get_results($sql);
    }

    /**
     * write to log file
     */
    public function vqb_log($log_text) {
        $this->wpdb->insert(
            $this->getTableName(),
            array('action'=>$log_text,
            'date'=> date('Y-m-d H:i:s'))
        );
    }
}