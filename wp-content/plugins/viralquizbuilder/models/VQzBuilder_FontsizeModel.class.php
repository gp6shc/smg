<?php

/*
 * Fontsize model
 */
class VQzBuilder_FontsizeModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 11;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_FontsizeModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'fontsize');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	    `name` CHAR(70) NOT NULL,
	    `sort_order` INTEGER UNSIGNED NOT NULL,
	    PRIMARY KEY (`id`)
	    ) ENGINE=" . $this->storage_engine . " DEFAULT CHARSET=" . $this->default_charset . ";";
        return dbDelta($sql);
    }

    /**
     * Insert data into table after its creation 
     */
    public function insert_after_tablecreate()
    {
        if ($this->count_rows() === FALSE)
        {
            $j = 0;
            for ($i = 12; $i <= 60; $i++)
            {
	if ($i % 2 == 0)
	{
	    $this->insert($this->getTableName(), array('name' => $i, 'sort_order' => $j));
	    $j++;
	}
            }
        }
    }

    /**
     * Get fontsize by its id
     * @param integer $id Fontsize id
     * @return array
     */
    public function get_one($id)
    {
        $id = intval($id);
        return $this->wpdb->get_row("SELECT `id`, `name` FROM {$this->getTableName()} WHERE `id` = {$id}", ARRAY_A);
    }

    /**
     * Get list of fontsizes
     * @return type 
     */
    public function get_list()
    {
        return $this->wpdb->get_results("SELECT `id`, `name` FROM `{$this->getTableName()}` ORDER BY `sort_order`", ARRAY_A);
    }

}