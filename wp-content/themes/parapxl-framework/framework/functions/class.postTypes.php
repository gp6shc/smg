<?php
/**
 * Post Types
 * Creates custom post types to be used on the site.
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 * @param array $custom_post_types Used to store the custom taxonomies capabilities
 * @todo Figure out how to get the permalink structure to look like /post-type/taxonomy-tag/post-name (http://shibashake.com/wordpress-theme/custom-post-type-permalinks-part-2)
 */
	if ( !class_exists('pxlPostTypes') ) :
		class pxlPostTypes {
			private static $setup;
			function __construct() {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				add_action( 'init', array( &$this, 'init' ) );
				if ( function_exists( 'members_get_capabilities' ) ) add_action( 'init', array( &$this, 'check_capabilities' ) );
			}
			public  function init() {
				self::register();
				include( FW_FUNCTIONS . '/class.columns.php' );
				new pxlColumns( self::$setup );
			} // Runs on Init and registers our custom Post Types or Taxonomies
			public  function register( $items = 'postTypes' ) {
				$type = ( $items == 'postTypes' ? 'postTypes' : 'taxonomies' );
				foreach (self::$setup['theme'][$items] as $key => $item) {
					if ( isset(self::$setup['support']['misc']['taxmeta']) && $key == 'taxmeta' ) self::register_taxonomy_meta( $item );
					elseif ( $key != 'page' && $key != 'post' ) {
						if ( $type == 'postTypes' ) register_post_type($key, self::args( $type, $key, $item ));
						else register_taxonomy( $key, $item['postTypes'], self::args( $type, $key, $item ));
					}
					/*
						TODO Deprecated: This is no longer needed to have post thumbnails for pages.
					*/
					// else if( $key == 'page' )
						// if ( isset($item['supports']) && $item['supports'] == 'excerpt' ) add_post_type_support('page', 'excerpt');
				}
			} // Loops through each Post Type or Taxonomy and creates it
			private function args( $type, $name, $item ) {
				// Look for Labels and Define
					if ( isset($item['labels']) ) {
						$labels = split(',',$item['labels']);
						$single = trim($labels[0]);
					} else $single = $name;
					/*
						TODO REGEX the plural
					*/
					$plural = ( isset($labels) ? trim($labels[1]) : $single.'s' );
				// Define Capabilities
					$cap_single = str_replace(" ","_",strtolower($single));
					$cap_plural = str_replace(" ","_",strtolower($plural));
				// Post Type and Taxonomy Overlap
					$overlap = array(
						 'labels' => self::labels($single,$plural,$type)
						,'public' => ( isset($item['public']) ? $item['public'] : true )
						,'rewrite' => ( isset($item['rewrite']) ? $item['rewrite'] : true )
					);
					$overlap_check = array( 'show_ui', 'show_in_nav_menus', 'query_var' );
					check_add($overlap_check, $item, $overlap);
				// Respective Type Parameters
					if ( $type == 'postTypes' ) {
						$params = array(
							 'capability_type' => ( $cap_single === $cap_plural ? $cap_single : array($cap_single,$cap_plural) )
							,'has_archive' => ( isset($item['has_archive']) ? $item['has_archive'] : true )
							,'map_meta_cap' => ( isset($item['map_meta_cap']) ? $item['map_meta_cap'] : true )
							,'menu_icon' => FW_RESOURCES_PATH.'/images/icons/'.( isset($item['icon']) ? $item['icon'] : 'pushpin' ).'.png'
							,'menu_position' => ( isset($item['menu_position']) ? $item['menu_position'] : 5 )
							,'supports' => ( isset($item['supports']) ? explode(',',str_replace(' ','',$item['supports'])) : explode(',',str_replace(' ','','title,editor,thumbnail')) )
						);
						$params_check = array( 'can_export', 'exclude_from_search', 'hierarchical', 'publicly_queryable', 'register_meta_box_cb', 'show_in_admin_bar', 'show_in_menu', 'taxonomies' );
						check_add($params_check, $item, $params);
					}else{
						$params = array(
							'capabilities' => array(
								 'manage_terms' => 'manage_'.$cap_plural
								,'edit_terms' => 'manage_'.$cap_plural
								,'delete_terms' => 'manage_'.$cap_plural
								,'assign_terms' => 'edit_'.$cap_plural
							)
							,'hierarchical' => ( isset($item['hierarchical']) ? $item['hierarchical'] : true )
						);
						$params_check = array( 'show_tagcloud', 'update_count_callback' );
						check_add($params_check, $item, $params);
					}
				// Return Arguments
					return array_merge($overlap,$params);
			} // Returns the arguments to be used when registering
			private function labels( $single, $plural, $type ) {
				$single = ucwords($single);
				$plural = ucwords($plural);
				if ( $type == 'postTypes' ) {
					return array(
						 'name' => _x($plural, 'post type general name')
						,'singular_name' => _x($single, 'post type singular name')
						,'add_new' => _x("Add New", $single)
						,'add_new_item' => __("Add New $single")
						,'edit' => __('Edit')
						,'edit_item' => __("Edit $single")
						,'new_item' => __("New $single")
						,'view_item' => __("View $single")
						,'search_items' => __("Search $plural")
						,'not_found' =>  __("No $plural found")
						,'not_found_in_trash' => __("No $plural found in Trash")
						,'parent_item_colon' => __("Parent $single")
						,'menu_name' => __($plural)
					);
				}else{
					return array(
						 'name' => __($plural)
						,'singular_name' => __($single)
						,'search_items' => __("Search $plural")
						,'popular_items' => __("Popular $plural")
						,'all_items' => __("All $plural")
						,'parent_item' => __("Parent $single")
						,'parent_item_colon' => __("Parent $single:")
						,'edit_item' => __("Edit $single")
						,'update_item' => __("Update $single")
						,'add_new_item' => __("Add New $single")
						,'new_item_name' => __("New $single name")
						,'separate_items_with_commas' => __("Separate $plural with commas")
						,'add_or_remove_items' => __("Add or remove $single")
						,'choose_from_most_used' => __("Choose from the most used $plural")
						,'menu_name' => __($plural)
					);
				}
			} // Sets up the labels
			private function register_taxonomy_meta( $items ) {
				foreach ($items as $item) new pxlTaxMeta($item);
			}
			public  function check_capabilities() {
				add_filter('members_get_capabilities', array( &$this, 'members_get_custom_capabilities' ) );
			} // Check for Members plugin and add Custom Capabilities
			public  function members_get_custom_capabilities( $caps ) {
				$cap_areas = array(
					"wp_post_types" => array_keys(self::$setup['theme']['postTypes']),
					"wp_taxonomies" => array_keys(self::$setup['theme']['taxonomies']),
				);
				$capabilities = array();
				foreach ($cap_areas as $field => $area) {
					foreach ($area as $k => $type) {
						if ( $type != 'taxmeta' )
							foreach ($GLOBALS[$field][$type]->cap as $key => $value) $capabilities[] = $value;
					}
				}
				return array_merge($caps, $capabilities);
			} // Find Custom Capabilities and add them to the Members Plugin
		}
	endif;