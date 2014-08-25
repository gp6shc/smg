<?php
/**
 * Boxes
 * Creates meta boxes that hold custom fields
 * @package Parapxl WP Framework
 * @subpackage Functions
 * @since 1.0
 */
	if ( !class_exists('pxlBoxes') ) :
		class pxlBoxes {
			private static $boxes = array(
				'theme' => array(
					'boxes' => array(
						// 'page' => array(
						// 	'options' => array(
						// 		'title' => 'Page Template',
						// 	),
						// 	'fields' => array(
						// 		'_wp_page_template' => array(
						// 			'description' => '',
						// 			'label' => 'Template',
						// 			'field' => 'select',
						// 			'default' => array('default','Default'),
						// 			'fn' => array(
						// 				 'prefix' => 'pxlTemplates'
						// 				,'name' => 'pxlTemplates::page_templates'
						// 				,'query' => ""
						// 			)
						// 		),
						// 	)
						// )
					)
				)
			);
			private static $setup;
			function __construct() {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				add_action( 'add_meta_boxes', array( &$this, 'init') );
				add_action( 'save_post', array( &$this, 'save') );
				add_action( 'before_delete_post', array( &$this, 'delete') );
			}
			public  function init( $page ) {
				$boxes = thisThat(self::$setup['theme']['postTypes'][$page]['boxes']);
				self::add_meta_boxes_default($page);
				if ( $boxes ) self::add_meta_boxes( self::$setup, $page, $boxes );
			} // Initiates the meta boxes for the current Post Type
			private function add_meta_boxes( $setup, $page, $boxes ) {
				foreach ($boxes as $box_name) {
					$box = $setup['theme']['boxes'][$box_name];
					$options = array(
						 'id' => $box_name.'_box'
						,'title' => $box_name
						,'context' => 'side'
						,'priority' => 'high'
					);
					foreach ($options as $name => $val) isnotset($box['options'][$name],$val);
					extract($box['options']);
					add_meta_box( $id, $title, array( &$this, 'create' ), $page, $context, $priority, array( 'fields' => $box['fields'] ) );
				}
			} // Kicks off the creation of the meta boxes.
			private function add_meta_boxes_default( $page ) {
				$boxes = ( isset(self::$boxes['theme']['boxes'][$page]) ? : false);
				if ( $boxes ) self::add_meta_boxes( self::$boxes, $page, array($page) );
			} // Kicks off the creation of default meta boxes
			public  function create( $post, $box ) {
				wp_nonce_field( 'update', 'custom_box_fields' );
				foreach ($box['args']['fields'] as $name => $args) self::field_create( array('post', $post->ID), $name, $args );
			} // Creates the content for the meta boxes
			public  function field_create( $id, $name, $args ) {
				$args['admin_page'] = $id[0]; // Check to see if we are editing a post or an author
				$styles_box = ( isset($args['style_box']) ? FormCast::print_styles( $args['style_box'] ) : false );
				$default = ( $args['field'] == 'input' ? 'text' : false); isnotset($args['attrs']['type'],$default); // Check for field type
				echo "<div class=\"field {$args['attrs']['type']}\"$styles_box>";
					$args[$id[0]] = $id[1]; // Store ID
					$args['name'] = $name;  // Store Field Name
					self::field_current_value( $args );
					$extra = self::field_type_fns( $args, $args['attrs']['type'] );
					echo FormCast::tag( $args, $extra ); // Print Field
				echo "</div>";
			}
			private function field_current_value( &$args ) {
				if ( isset($args['post']) ) {
					if ( $args['field'] == 'list' ) $single = false;
					else $single = true;
					$get_val = thisThat(get_post_meta($args['post'], $args['name'], $single));
				}
				else $get_val = thisThat(get_the_author_meta($args['name'], $args['author']));
				if ( !$get_val ) return false;
				else {
					$value = ( isset($args['attrs']['value']) ? $args['attrs']['value'] : false );
					if ( $args['attrs']['type'] == 'radio' && $value ) {
						if ( $get_val == $value ) $args['attrs']['checked'] = 'checked';
					}else if( $args['attrs']['type'] == 'text' ) $args['attrs']['value'] = $get_val;
					else $args['value'] = $get_val;
				}
			}
			private function field_type_fns( $args, $type ) {
				if ( !$type ) return;
				switch ( $type ) {
					case 'file': 
						return self::file_upload_init( $args['admin_page'], $args['attrs']['value'] );
					break;
					default: break;
				}
			}
			private function file_upload_init( $page, &$attachment_id ) {
				switch ($page) {
					case 'author': $id = 'your-profile'; break;
					case 'post': $id = 'post'; break;
					default: break;
				}
				$output = "<script type=\"text/javascript\"> var form = document.getElementById('$id'); form.encoding = \"multipart/form-data\"; form.setAttribute('enctype', 'multipart/form-data'); </script>";
				if ( !isset($attachment_id) ) return $output;
				$type = split('/',get_post_field( 'post_mime_type', $attachment_id, false ));
				$name = get_post_field( 'post_title', $attachment_id, false );
				$image = wp_get_attachment_image( $attachment_id, 'thumbnail', 1 );
				$output .= '<div class="current">';
				switch ( $type[1] ) {
					case 'pdf': $output .= "$image<br>$name"; break;
					case 'jpg': case 'jpeg': case 'png': case 'tif': case 'tiff': $output .= $image; break;
					default: break;
				}
				$output .= '</div>';
				return $output;
			}
			public  function file_upload_save( $file, $id, $type = 'post' ) {
				$upload = wp_handle_upload($file, array('test_form' => false));
				if(!isset($upload['error']) && isset($upload['file'])) {
					if ( $type == 'user' ) {
						$user    = get_userdata( $id );
						$current = get_user_meta( $id, 'file_current', true );
						$title   = $user->data->user_nicename;
					}else{
						$current = get_post_meta($post->ID, 'file_current', true);
						$ext     = strrchr($title, '.');
						$title   = ($ext !== false) ? substr($file['name'], 0, -strlen($ext)) : $file['name'];
						$parent  = $id;
					}
					if ( is_numeric($current) ) wp_delete_attachment( $current );
					$filetype    = wp_check_filetype(basename($upload['file']), null);
					$attachment  = array(
						 'post_mime_type' => $filetype['type']
						,'post_title'     => addslashes($title)
						,'post_content'   => ''
						,'post_status'    => 'inherit'
						,'guid'           => $upload['url']
					);
					if ( isset($parent) ) $attachment['post_parent'] = $id;
					$attach_id   = wp_insert_attachment( $attachment, $upload['file'] );
					$attach_data = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
					wp_update_attachment_metadata( $attach_id,  $attach_data );
					if ( $type == 'user' ) update_user_meta( $id, 'file_current', $attach_id ); else update_post_meta($id, 'file_current', $attach_id);
					return $attach_id;
				}else return false;
			}
			public  function save( $post_id ) {
				// Verify Save and Nonce, continue if Not a Revision, Not an Autosave, If there are Custom Fields, and a valid nonce.
					if ( wp_is_post_revision( $post_id ) || (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || !isset($_POST['custom_box_fields']) || !wp_verify_nonce( $_POST['custom_box_fields'], 'update' ) ) return;
				// Check Permissions
					if ( 'page' == $_POST['post_type'] ) if ( !current_user_can( 'edit_page', $post_id ) ) return;
					else if ( !current_user_can( 'edit_post', $post_id ) ) return;
				// Save Post
					global $pxlSetup;
					$default_boxes = thisThat(self::$boxes['theme']['boxes'][$_POST['post_type']]);
					$theme_boxes = thisThat($pxlSetup['theme']['postTypes'][$_POST['post_type']]['boxes']);
					if ( $default_boxes ) self::save_boxes( self::$boxes, array($_POST['post_type']), $post_id );
					if ( $theme_boxes ) self::save_boxes( $pxlSetup, $theme_boxes, $post_id );
			}
			public  function delete( $post_id ) {
				// nice("Deleting");
				// nice($post_id);
				
				// Delete File_Current 
					// the post id is the attachment_id: 162101
			}
			private function save_boxes( $setup, $boxes, $post_id ) {
				foreach ($boxes as $box_name) {
					$fields = $setup['theme']['boxes'][$box_name]['fields'];
					foreach ($fields as $field => $attr) {
						if ( isset($attr['include']) ) {
							foreach ($attr['include'] as $name => $check) {
								$field_name = $field.'_'.$name;
								if ( $check ) self::save_field( $post_id, $field_name, $_POST[$field_name] );
							}
						}else if( isset($_POST[$field]) || isset($_FILES[$field]) ) {
							if ( isset($_FILES[$field]) ) $value = pxlBoxes::file_upload_save( $_FILES[$field], $_POST['post_ID'] );
							else $value = $_POST[$field];
							if ( is_array($value) ) { // For List items we need to re-add all items
								delete_post_meta($post_id, $field); // Delete all list items so we do not mess up our final list
								foreach ($value as $item) self::save_field($post_id, $field, $item, 'add');
							}else self::save_field($post_id, $field, $value);
						}
					}
				}
			}
			private function save_field( $post_id, $meta_key, $meta_value, $action = false ) {
				if ( !$action ) {
					$prev_value = get_post_meta($post_id,$meta_key,true);
				} else $prev_value = false;
				//     if ( $prev_value && $meta_value == '' ) nice("Deleting $meta_key");
				// elseif ( $prev_value && $meta_value != $prev_value) nice("Updating $meta_key");
				// elseif ( $meta_value != '' && $meta_value != $prev_value ) nice("Adding $meta_key");
				    if ( $prev_value && $meta_value == '' ) delete_post_meta($post_id, $meta_key, $meta_value);
				elseif ( $prev_value && $meta_value != $prev_value) update_post_meta($post_id, $meta_key, $meta_value, $prev_value);
				elseif ( $meta_value != '' && $meta_value != $prev_value ) add_post_meta($post_id, $meta_key, $meta_value);
			}
		}
	endif;