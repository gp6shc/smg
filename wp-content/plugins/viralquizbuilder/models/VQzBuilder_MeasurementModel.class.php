<?php

class VQzBuilder_MeasurementModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 13;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_MeasurementModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'measurement');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	    `name_sing` CHAR(70) NOT NULL,
	    `name_pl` CHAR(70) NOT NULL,
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
        $measure_arr = array
            (
            /* time */
            array('second', 'seconds'),
            array('minute', 'minutes'),
            array('hour', 'hours'),
            array('day', 'days'),
            array('month', 'months'),
            array('year', 'years'),
            /* length */
            array('millimeter', 'millimeters'),
            array('centimeter', 'centimeters'),
            array('meter', 'meters'),
            array('kilometer', 'kilometers'),
            /* area */
            array('square meter', 'square meters'),
            array('square kilometer', 'square kilometer'),
            /* volume */
            array('cubic meter', 'cubic meters'),
            /* capacity */
            array('milliliter', 'milliliters'),
            array('liter', 'liters'),
            /* mass & weight */
            array('milligram', 'milligrams'),
            array('gram', 'grams'),
            array('kilogram', 'kilograms'),
            array('ton', 'tons'),
            /* temperature */
            array('degree Celsius', 'degrees Celsius'),
            array('degree Fahrenheit', 'degrees Fahrenheit'),
        );

        if ($this->count_rows() === FALSE)
        {
            $j = 0;
            foreach ($measure_arr as $measure)
            {
	$this->insert($this->getTableName(), array('name_sing' => $measure[0], 'name_pl' => $measure[1], 'sort_order' => $j));
	$j++;
            }
        }
    }

    /**
     * Get measurement by its id
     * @param integer $id Measurement id
     * @return array 
     */
    function get_one($id)
    {
        $id = intval($id);
        return $this->wpdb->get_row("SELECT `id`, `name_sing`, `name_pl` FROM {$this->getTableName()} WHERE `id` = {$id}", ARRAY_A);
    }

    /**
     * Get measurements list
     * @return array 
     */
    function get_list()
    {
        return $this->wpdb->get_results("SELECT `id`, `name_sing`, `name_pl` FROM `{$this->getTableName()}` ORDER BY `sort_order`", ARRAY_A);
    }

}