<?php

/*
*Plugin Name: Viral Quiz Builder
* Plugin URI: http://viralquizbuilder.com/
* Description: This plugin allow users to create simple multiple-choice quizzes that they can embed on their WP site. The quiz results in a “badge”, that can be embedded, along with a call-to-action to share the quiz socially.
* Version: 2.15
* Author: IM Impact
* Author URI: http://www.imimpact.com/
*/
if (!defined('ABSPATH')) exit;



require_once 'bootstrap.php';

$VQzBuilder = VQzBuilder::getInstance();
$VQzBuilder_ActivationManager = VQzBuilder_ActivationManager::getInstance();

register_activation_hook(__FILE__, array($VQzBuilder_ActivationManager, 'activate'));
register_deactivation_hook(__FILE__, array($VQzBuilder_ActivationManager, 'deactivate'));

// automatic updates
new PluginUpdateChecker('http://viralquizbuilder.com/mdl-28db/viralquizbuilderupdates.json', __FILE__, 'viral-quiz-builder');

// catch necessary updates
add_action('admin_init', 'vqb_update_check');

function vqb_update_check()
{
    if (VQZB_VERSION > get_option("vqb_db_version", 0)) {
        VQzBuilder_ActivationManager::getInstance()->update();
    }
}


// capture error logging for activation
add_action('activated_plugin', 'vqb_save_error');

function vqb_save_error()
{
    update_option('plugin_error', ob_get_contents());
}
