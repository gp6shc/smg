<?php

/*
 * Quiz Type model
 */
class VQzBuilder_QuiztypeModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 15;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_QuiztypeModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'quiz_type');
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
        $quiz_types = array
            (
            array('name' => 'Quiz for Points', 'slug' => 'points-quiz'),
            array('name' => 'Type A/B/C Quiz', 'slug' => 'abc-quiz'),
        );

        if ($this->count_rows() === FALSE)
        {
            $j = 0;
            foreach ($quiz_types as $type)
            {
	$this->insert($this->getTableName(), array('name' => $type['name'], 'slug' => $type['slug'], 'sort_order' => $j));
	$j++;
            }
        }
    }

    /**
     * Get quiz type by its id
     * @param type $id QuizType id
     * @return array
     */
    public function get_one($id)
    {
        $id = intval($id);
        return $this->wpdb->get_row("SELECT `id`, `name`, `slug` FROM {$this->getTableName()} WHERE `id` = {$id}", ARRAY_A);
    }

    /**
     * Get quiz types list
     * @return array 
     */
    public function get_list()
    {
        return $this->wpdb->get_results("SELECT `id`, `name`, `slug` FROM `{$this->getTableName()}` ORDER BY `sort_order`", ARRAY_A);
    }

}