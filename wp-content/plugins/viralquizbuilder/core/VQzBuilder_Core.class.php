<?php

// don't load directly
if (!defined('ABSPATH'))
    exit;
class VQzBuilder_Core
{

    protected $wpdb = NULL;

    protected function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
    }

    /**
     * Load includes
     * @param string $file File to load
     */
    protected function load_inc($file)
    {
        require_once dirname(__FILE__) . '/../inc/' . $file;
    }

    /**
     * Load view
     * @param string $file File with html to load
     * @param array $data Array of data is needed by view
     * @param boolean $admin If it is an admin area view or not (default = FALSE) 
     */
    protected function load_view($file, $data = array(), $admin = FALSE)
    {
        extract($data);
        if ($admin)
        {
            // load admin view
            require_once VQZB_VIEWS_DIR . 'admin/' . $file;
        }
        else
        {
            //load frontend view
            require_once VQZB_VIEWS_DIR . $file;
        }
    }

    /**
     * Get list of existing models
     * @return array Array of models names
     */
    static function get_models_list()
    {
        $models_arr = scandir(VQZB_MODELS_DIR);
        foreach ($models_arr as $key => $model)
        {
            $models_arr[$key] = str_replace(array('.class.php'), array(), $model);
            if ($model == '.' || $model == '..')
	unset($models_arr[$key]);
        }
        return $models_arr;
    }

    /**
     * Get list of existing helpers
     * @return array Array of helpers names
     */
    static function get_helpers_list()
    {
        $helpers_arr = scandir(VQZB_HELPERS_DIR);
        foreach ($helpers_arr as $key => $helper)
        {
            $helpers_arr[$key] = str_replace(array('.php'), array(), $helper);
            if ($helper == '.' || $helper == '..')
	unset($helpers_arr[$key]);
        }
        return $helpers_arr;
    }

    /**
     * Get list of existing actions controllers
     * @return array Array of actions names
     */
    static function get_actions_list()
    {
        $arr = scandir(VQZB_ACTIONS_DIR);
        foreach ($arr as $key => $one)
        {
            $arr[$key] = str_replace(array('.class.php'), array(), $one);
            if ($one == '.' || $one == '..')
	unset($arr[$key]);
        }
        return $arr;
    }

}