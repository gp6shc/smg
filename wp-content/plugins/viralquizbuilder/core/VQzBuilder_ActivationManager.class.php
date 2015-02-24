<?php

/*
 *  Plugin activate/deactivate/delete manager
 */
// don't load directly
if (!defined('ABSPATH'))
    exit;
class VQzBuilder_ActivationManager extends VQzBuilder_Core
{

    private static $instance = NULL;

    protected function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new VQzBuilder_ActivationManager;
        }
        return self::$instance;
    }

    /*
     * activate plugin function
     */
    static function activate()
    {
        // check if GD is installed
        if (!extension_loaded('gd') OR !function_exists('gd_info')) {
            deactivate_plugins(basename(__FILE__)); // Deactivate ourself
            wp_die("Sorry, but you can't run this plugin: GD library is not installed on server.");
        }

        // check if FreeType extension is not installed
        if (!function_exists('imagettftext')) {
            deactivate_plugins(basename(__FILE__)); // Deactivate ourself
            wp_die("Sorry, but you can't run this plugin: FreeType extension is not installed on server.");
        }


        //loop all models in dir BP_MODELS_DIR and call %MODEL%::create_table() for each
        foreach (VQzBuilder_Core::get_models_list() as $one) {
            $model = new $one();
            $model->createTable();
        }

        foreach (VQzBuilder_Core::get_models_list() as $one) {
            $model = new $one();
            $model->add_foreign_keys();
            if (method_exists($model, 'insert_after_tablecreate'))
                $model->insert_after_tablecreate();
        }

        VQzBuilder_LogModel::getInstance()->vqb_log("Plugin activated, creating tables...");
        VQzBuilder_LogModel::getInstance()->vqb_log("Current Fileset version:" . VQZB_VERSION);
        VQzBuilder_LogModel::getInstance()->vqb_log("Current Database version:" . get_option("vqb_db_version", 0));

        //add settings to WP options table
        add_option('vqzb_fb_app_id');

        // check fileset version and database version match
        VQzBuilder_ActivationManager::getInstance()->update();
    }

    /*
     * Run updates
     */
    static function update()
    {
        //loop all models in dir BP_MODELS_DIR and call %MODEL%::update_table() for each
        VQzBuilder_LogModel::getInstance()->vqb_log("Checking to see if updates needed");
        if (VQZB_VERSION > get_option("vqb_db_version", 0)) {
            VQzBuilder_LogModel::getInstance()->vqb_log("Fileset version : " . VQZB_VERSION . " is newer than database version: " . get_option("vqb_db_version", 0) . ".  Updating tables in the database...");
            VQzBuilder_LogModel::getInstance()->vqb_log("Running update");
            foreach (VQzBuilder_Core::get_models_list() as $one) {
                $model = new $one();
                if (method_exists($model, 'updateTable')) {
                    $model->updateTable(get_option("vqb_db_version", 0));
                }
                update_option("vqb_db_version", VQZB_VERSION);
            }
            VQzBuilder_LogModel::getInstance()->vqb_log("All tables updated...");
        }
    }

    /*
     * deactivate plugin function
     */
    static function deactivate()
    {

    }

    /*
     * check for updates
     */
    static function checkUpdates($json_path, $slug)
    {
        new PluginUpdateChecker(
            $json_path,
            __FILE__,
            $slug
        );
    }

    /*
     * uninstall plugin function
     */
    static function uninstall()
    {
        //get tables delete order (because of foreign keys)
        $models_arr = array_flip(VQzBuilder_Core::get_models_list());
        foreach ($models_arr as $model_name => $model_num) {
            $omodel = new $model_name();
            $models_arr[$model_name] = $omodel->delete_priority;
        }
        $models_arr = array_flip($models_arr);
        ksort($models_arr);

        //delete tables
        foreach ($models_arr as $one) {
            $omodel = new $one();
            $omodel->deleteTable();
        }

        //delete plugin settings
        delete_option('vqzb_fb_app_id');
        delete_option('vqb_db_version');
    }

}