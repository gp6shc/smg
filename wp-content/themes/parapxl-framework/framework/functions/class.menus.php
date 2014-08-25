<?php
/**
 * Menus
 * Creates the locations to assign menus.
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 * @param array $custom_post_types Used to store the custom taxonomies capabilities
 */
	if ( !class_exists('pxlMenus') ) :
		class pxlMenus {
			private static $setup;
			function __construct() {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				self::menus_register();
			}
			private function menus_register() {
				register_nav_menus( self::$setup['theme']['menus'] );
			}
		}
	endif;