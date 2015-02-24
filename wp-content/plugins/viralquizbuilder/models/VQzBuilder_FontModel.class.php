<?php

/*
 * Font model
 */
class VQzBuilder_FontModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 10;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new VQzBuilder_FontModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'font');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	    `name` CHAR(100) NOT NULL,
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
        if ($this->count_rows() === FALSE) {
            $j = 0;
            foreach ($this->get_fonts_from_dir() as $font) {
                $this->insert($this->getTableName(), array('name' => $font, 'sort_order' => $j));
                $j++;
            }
        }
    }

    /**
     * Get font by its id
     * @param type $id Font id
     * @return array
     */
    public function get_one($id)
    {
        $id = intval($id);
        return $this->wpdb->get_row("SELECT `id`, `name` FROM {$this->getTableName()} WHERE `id` = {$id}", ARRAY_A);
    }

    /**
     * Get fonts list
     * @return array
     */
    public function get_list()
    {
        return $this->wpdb->get_results("SELECT `id`, `name` FROM `{$this->getTableName()}` ORDER BY `sort_order`", ARRAY_A);
    }

    public function get_fonts_from_dir()
    {
        $fonts_arr = scandir(VQZB_FONTS_DIR);
        foreach ($fonts_arr as $key => $font) {
            $fonts_arr[$key] = str_replace('.ttf', '', $font);
            if ($font == '.' || $font == '..')
                unset($fonts_arr[$key]);
        }
        return $fonts_arr;
    }

}