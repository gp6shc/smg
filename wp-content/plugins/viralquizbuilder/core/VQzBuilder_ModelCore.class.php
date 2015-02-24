<?php
/**
 * Model core class 
 */

// don't load directly
if( !defined( 'ABSPATH' ) )	exit;

abstract class VQzBuilder_ModelCore
{
    private $tableName = NULL;
    protected $wpdb = NULL;
    protected $table_prefix = '';
    protected $storage_engine = 'InnoDB';
    protected $default_charset = 'utf8';

    function __construct()
    {
	global $wpdb;
	$this->wpdb = $wpdb;
	$this->table_prefix = $this->wpdb->prefix.'vqzb_';

	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    }

    /**
     * Set table name
     * @param string $table Table name
     */
    public function setTableName($table)
    {
	$this->tableName = $table;
    }
    
    /**
     * Get table name
     * @return string Table name 
     */
    public function getTableName()
    {
	return $this->tableName;
    }

    /**
     * Create table abstract function 
     */
    abstract public function createTable();
    
    /**
     * Check if table has any FOREIGN KEYs
     * @return boolean
     */
    protected function check_indexes_exist()
    {
	if ($this->wpdb->query("SHOW INDEXES IN {$this->getTableName()}") <= 1) return FALSE;
	return TRUE;
    }

    /**
     * Add foreign keys 
     */
    public function add_foreign_keys(){}

    /**
     * Get maximum value of sort order column
     */
    public function get_max_sort_order()
    {
	return $this->wpdb->get_var("SELECT MAX(`sort_order`) FROM {$this->getTableName()}");
    }
    
    /**
     * Delete table 
     */
    public function deleteTable()
    {
	$sql = "DROP TABLE IF EXISTS {$this->getTableName()};";
	$this->wpdb->query($sql);
    }
    
    /**
     * Prepare data for using in special wpdb function prepare()
     * 
     * @param array $data Data need to be prepared
     * @param string $implode Defines if fields must be imploded default='yes'
     * @return array Data prepared for using in wpdb function prepare()
     */
    private function prepare_data_for_query($data, $implode = 'yes')
    {
	//array of fields names
	$fields = array();
	//array of values types
	$types = array();
	//array of values
	$values = array();
	
	foreach ($data as $key => $one)
	{
	    $fields[] = $key;
	    if ($one === '000000')
	    {
		$values[] = $one;
		$types[] = '%s';
	    }
	    elseif (is_numeric($one) || $one === 0)
	    {
		$values[] = $one;
		$types[] = '%d';
	    }
	    elseif ($one === NULL || $one === '')
	    {
		$types[] = 'NULL';
	    }
	    elseif ($one == 'NOW()')
	    {
		$types[] = $one;
	    }
	    else
	    {
		$values[] = $one;
		$types[] = '%s';
	    }
	}
	
	return array('fields' => $implode == 'yes'?implode(", ", $fields):$fields, 'types' => $implode == 'yes'?implode(", ", $types):$types, 'values' => $values);
    }
    
    /**
     * Insert new row into table
     * @param string $table Table name
     * @param array $data Array of data to insert (field_name => value)
     * @return boolean The inserting result
     */
    protected function insert($table, $data)
    {
	$prepared_data = $this->prepare_data_for_query($data);
	if ($this->wpdb->query($this->wpdb->prepare("INSERT INTO {$table} ({$prepared_data['fields']}) VALUES ({$prepared_data['types']})", $prepared_data['values'])) === FALSE)
	{
	    return FALSE;
	}
	return $this->wpdb->insert_id;
    }
    
    /**
     * Update row in table by its id
     * @param string $table Table name
     * @param integer $id Row id
     * @param array $data Data array to update
     * @return boolean Updating result
     */
    protected function update($table, $id, $data)
    {
	$prepared_data = $this->prepare_data_for_query($data, 'no');
	$prepared_data['values'][] = $id;
	$sql = "UPDATE {$table} SET ";
	foreach ($prepared_data['fields'] as $key => $one)
	{
	    if ($key > 0) $sql .= ', ';
	    $sql .= "`{$one}` = {$prepared_data['types'][$key]} ";
	}
	$sql .= "WHERE `id` = %d;";
	if ($this->wpdb->query($this->wpdb->prepare($sql, $prepared_data['values'])) === FALSE)
	{
	    return FALSE;
	}
	return TRUE;
    }
    
    /**
     * Delete row from table by its id
     * @param integer $id Row id
     * @return boolean Deleting result
     */
    public function delete($id)
    {
        $id = intval($id);
	if ($this->wpdb->query($this->wpdb->prepare("DELETE FROM {$this->getTableName()} WHERE `id` = %d", $id)) === FALSE)
	{
	    return FALSE;
	}
	return TRUE;
    }
    
    /**
     * Check if table has any rows
     * @return boolean
     */
    public function count_rows()
    {
	if ($this->wpdb->get_var("SELECT COUNT(`id`) FROM {$this->getTableName()}") > 0) return TRUE;
	return FALSE;
    }
    
    public function get_for_export($cols, $parent_name=NULL, $parent_id=NULL)
    {
        $sql = "SELECT {$cols} FROM {$this->getTableName()}";
        
        if($parent_name !== NULL)
            $sql .= " WHERE {$parent_name} = {$parent_id}";
        return $this->wpdb->get_results($sql, ARRAY_A);
    }


    /**
     *Check if column exists in table
     *return boolean
     */
    public function check_column_exists($column)
    {
        VQzBuilder_LogModel::getInstance()->vqb_log("Checking if column " . $column . " exists in database: " . $this->getTableName());
        $sql = "SHOW COLUMNS FROM {$this->getTableName()} where field = '{$column}'";
        $result = $this->wpdb->get_results($sql);

        if ($this->wpdb->num_rows) {
            VQzBuilder_LogModel::getInstance()->vqb_log("Column " . $column . " does exist in database: " . $this->getTableName());
            return true;
        }
        VQzBuilder_LogModel::getInstance()->vqb_log("Column " . $column . " doesn't exist in database: " . $this->getTableName());
        return false;
    }
}