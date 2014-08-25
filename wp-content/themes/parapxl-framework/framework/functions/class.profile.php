<?php
/**
 * Profile
 * Creates custom fields for user profiles.
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 * @param array $custom_post_types Used to store the custom taxonomies capabilities
 */
	if ( !class_exists('pxlProfile') ) :
		class pxlProfile {
			private static $setup;
			function __construct() {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				if( isset($pxlSetup['theme']['profile']['fields']) ) {
					add_action( 'show_user_profile', array( &$this, 'profile_register') );
					add_action( 'edit_user_profile', array( &$this, 'profile_register') );
					add_action( 'personal_options_update', array( &$this, 'profile_save') );
					add_action( 'edit_user_profile_update', array( &$this, 'profile_save') );
				}
				$url = thisThat(self::$setup['theme']['profile']['url']);
				if ( $url ) self::profile_permalink( $url );
			}
			private function profile_permalink( $base ) {
				global $wp_rewrite;
				$wp_rewrite->author_base = $base;
			}
			public  function profile_register( $user ) {
				$fields = self::$setup['theme']['profile']['fields'];
				$file = get_template_part('templates/partials/profile');
				foreach ($fields as $name => $args) pxlBoxes::field_create( array('author',$user->ID), $name, $args );
			}
			public  function profile_save( $user_id ) {
				global $meta_keys;
				$fields = self::$setup['theme']['profile']['fields'];
				if ( !current_user_can( 'edit_user', $user_id ) ) return false;
				foreach ($fields as $field => $attr) {
					if ( isset($_POST[$field]) || isset($_FILES[$field]) ) {
						$value = false;
						if ( isset($_FILES[$field]) && $_FILES[$field]['name'] != '' ) $value = pxlBoxes::file_upload_save( $_FILES[$field], $_POST['user_id'], 'user' );
						else if( isset($_POST[$field]) )$value = $_POST[$field];
						if ( $value ) update_user_meta( $user_id, $field, $value );
					}
				}
			}
		}
	endif;