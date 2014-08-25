<?php
/**
 * Custom Post Types & Taxons
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 * @param array $custom_post_types Used to store the custom taxonomies capabilities
 */
	if ( !class_exists('pxlSidebars') ) :
		class pxlSidebars {
			private static $setup;
			function __construct() {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				self::sidebars_register();
			}
			private function sidebars_register() {
				$sidebars = self::$setup['theme']['sidebars'];
				foreach ($sidebars as $slug => $sidebar) {
					$args = array( );
					if ( is_array($sidebar) ) {
						$params = array(
							'name' => thisThat($sidebar['name'],'sidebar'),
							'id' => thisThat($sidebar['id'],'sidebar-'.$slug),
							'description' => thisThat($sidebar['description']),
							'before_widget' => html_entity_decode(thisThat($sidebar['before_widget'])),
							'after_widget' => html_entity_decode(thisThat($sidebar['after_widget'])),
							'before_title' => html_entity_decode(thisThat($sidebar['before_title'])),
							'after_title' => html_entity_decode(thisThat($sidebar['after_title'])),
						);
					}else{
						$params = array(
							'name' => $sidebar,
							'id' => 'sidebar-'.$slug
						);
					}
					foreach ($params as $name => $param) if ( $param ) $args[$name] = $param;
					register_sidebar($args);
				}
			}
		}
	endif;