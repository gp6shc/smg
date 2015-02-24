<?php

/*
 * Font model
 */
class VQzBuilder_I18nModel extends VQzBuilder_ModelCore
{

    var $delete_priority = 12;
    private static $instance = NULL;

    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new VQzBuilder_I18nModel;
        }
        return self::$instance;
    }

    public function __construct()
    {
        parent::__construct();

        $this->setTableName($this->table_prefix . 'i18n');
    }

    public function createTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `{$this->getTableName()}` (
	    `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
	    `original` TEXT NOT NULL,
	    `translate` TEXT,
	    `slug` TEXT NOT NULL,
	    PRIMARY KEY (`id`)
	    ) ENGINE=" . $this->storage_engine . " DEFAULT CHARSET=" . $this->default_charset . ";";
        return dbDelta($sql);
    }

    /**
     * Insert data into table after its creation 
     */
    public function insert_after_tablecreate()
    {
        // set data to insert
        $rows = array
        (
            array
            (
	'slug' => 'no-quiz',
	'original' => 'Sorry, no such quiz found.',
            ),
            array
            (
	'slug' => 'no-questions',
	'original' => 'No questions for the quiz found.',
            ),
            array
            (
	'slug' => 'no-answers',
	'original' => 'No answers for the question found.',
            ),
            array
            (
	'slug' => 'share_tw',
	'original' => 'Share it on Twitter!',
            ),
            array
            (
	'slug' => 'share_fb',
	'original' => 'Share it on Facebook!',
            ),
            array
            (
	'slug' => 'share_site',
	'original' => 'Add this badge to your blog!',
            ),
            array
            (
	'slug' => 'share_pin',
	'original' => 'Share it on Pinterest!',
            ),
            array
            (
	'slug' => 'share_site_instructions',
	'original' => 'To add it to your site, edit your page in HTML or Source mode and paste the above code.',
            ),
            array
            (
	'slug' => 'created-by',
	'original' => 'Created by',
            ),
        );
        
        if ($this->count_rows() === FALSE)
        {
            foreach ($rows as $row)
            {
	$this->insert($this->getTableName(), $row);
            }
        }
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
     * Get by slug
     * @param integer $id
     * @return array
     */
    public function get_by_slug($slug)
    {
        return $this->wpdb->get_row("SELECT `id`, `original`, `translate`, `slug` FROM {$this->getTableName()} WHERE `slug` = '{$slug}'", ARRAY_A);
    }
    
    /**
     * Get list
     * @return array 
     */
    public function get_list()
    {
        return $this->wpdb->get_results("SELECT `id`, `original`, `translate`, `slug` FROM `{$this->getTableName()}`", ARRAY_A);
    }

}