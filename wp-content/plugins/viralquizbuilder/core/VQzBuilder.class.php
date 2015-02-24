<?php
/**
 * Main VQzBuilder Plugin Class
 */

// don't load directly
if (!defined('ABSPATH')) exit;

class VQzBuilder extends VQzBuilder_Core
{
    private static $instance = NULL;

    function __construct()
    {

        parent::__construct();
        $this->init();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new VQzBuilder();
        }
        return self::$instance;
    }

    /*
    * Define constants
    * Attach hooks
    */
    function init()
    {
        $this->load_inc('constants.php');
        $this->load_actions();
        $this->load_models();
        $this->load_helpers();
        $this->load_libraries();
        $this->attach_hooks();
    }

    /*
    * Load actions
    */
    function load_actions()
    {
        foreach ($this->get_actions_list() as $action) {
            require_once VQZB_ACTIONS_DIR . $action . '.class.php';
        }
    }

    /*
    * Load models
    */
    function load_models()
    {
        foreach ($this->get_models_list() as $model) {
            require_once VQZB_MODELS_DIR . $model . '.class.php';
        }
    }

    /*
    *  Load helpers
    */
    function load_helpers()
    {
        foreach ($this->get_helpers_list() as $helper) {
            require_once VQZB_HELPERS_DIR . $helper . '.php';
        }
    }

    /**
     * Load libraries
     */
    function load_libraries()
    {
        // Aweber library
        if (!class_exists('AWeberAPI'))
            require_once VQZB_LIBRARIES_DIR . 'aweber_api/aweber_api.php';

        // MailChimp library
        if (!class_exists('MCAPI'))
            require_once VQZB_LIBRARIES_DIR . 'mailchimp_api/MCAPI.class.php';

        // iContact library
        if (!class_exists('iContactApi'))
            require_once VQZB_LIBRARIES_DIR . 'icontact_api/icontact_api.php';

        // Simple YAML loader class for PHP
        if (!class_exists('Spyc'))
            require_once VQZB_LIBRARIES_DIR . 'spyc/spyc.php';

        // SMP API
        if (!class_exists('vqb_SMPLicense'))
            require_once VQZB_LIBRARIES_DIR . 'smp/vqb_smp.php';
    }

    /*
    *  Attach wp hooks for admin & frontend parts
    */
    function attach_hooks()
    {
        if (is_admin()) {
            //register ajax callback function for frontend ('wp_ajax_' hooks MUST be inside the is_admin() part)
            $frontend = new VQzBuilder_FrontEnd();
            add_action('wp_ajax_vqzb_ajax', array($frontend, 'vqzb_ajax_callback')); //for logged in users
            add_action('wp_ajax_nopriv_vqzb_ajax', array($frontend, 'vqzb_ajax_callback')); //for not logged in users

            //"admin-only" hooks
            $admin = new VQzBuilder_Admin();

            //register ajax callback function
            add_action('wp_ajax_vqzb_generate_example', array(VQzBuilder_ResultBadgeAction::getInstance(), 'generateExampleCallback')); //for logged in users
            //admin menus, submenus
            add_action('admin_menu', array($admin, 'add_adminmenu_pages'));

            //admin js
            add_action('init', array($admin, 'register_js'));
            add_action('admin_print_scripts', array($admin, 'enqueue_js'));

            //admin css
            add_action('init', array($admin, 'register_css'));
            add_action('admin_print_styles', array($admin, 'enqueue_css'));

            if (is_vqzb_admin_page()) {
                add_action('admin_init', array($admin, 'vqb_l_scan'));
            }

        } else {
            //"frontend-only" hooks
            $frontend = new VQzBuilder_FrontEnd();

            //shortcode
            add_shortcode('vqzb', array($frontend, 'quiz_shortcode'));

            //frontend css
            add_action('init', array($frontend, 'register_css'));
            add_action('wp_print_styles', array($frontend, 'enqueue_css'));

            //frontend js
            add_action('init', array($frontend, 'register_js'));
            add_action('wp_print_scripts', array($frontend, 'enqueue_js'));
        }
    }
}