<?php

/*
 * Font model
 */
class VQzBuilder_OptinSystemModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 14;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_OptinSystemModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'optin_systems');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	    `name` CHAR(100) NOT NULL,
	    `slug` CHAR(20) NOT NULL,
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
        $systems = array
        (
            array('name' => 'Aweber', 'slug' => 'aweber'),
            array('name' => 'iContact', 'slug' => 'icontact'),
            array('name' => 'MailChimp', 'slug' => 'mailchimp'),
        );
        
        if ($this->count_rows() === FALSE)
        {
            $j = 0;
            foreach ($systems as $system)
            {
	$this->insert($this->getTableName(), array('name' => $system['name'], 'slug' => $system['slug'], 'sort_order' => $j));
	$j++;
            }
        }
    }

    /**
     * Get by id
     * @param type $id
     * @return array
     */
    public function get_one($id)
    {
        $id = intval($id);
        return $this->wpdb->get_row("SELECT `id`, `name`, `slug` FROM {$this->getTableName()} WHERE `id` = {$id}", ARRAY_A);
    }

    /**
     * Get list
     * @return array 
     */
    public function get_list()
    {
        return $this->wpdb->get_results("SELECT `id`, `name`, `slug` FROM `{$this->getTableName()}` ORDER BY `sort_order`", ARRAY_A);
    }

}