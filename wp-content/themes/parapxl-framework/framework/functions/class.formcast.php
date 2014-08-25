<?php
/**
 * FormCast
 * Allows for the easy creation of form elements.
 * @package Parapxl WP Framework
 * @subpackage Functions
 * @since 1.0
 * A class to easily create form elements.
 */
/*
		TODO Added hidden address_full field to address
*/
	if ( !class_exists('FormCast') ) :
		class FormCast {
			public function tag( $args = false, $extra = false ) {
				$output = '';
				// Label
					$label = self::print_text( $args );
				// Assign Field Arguments
					$field_args = array( 'main' => $args, );
					$field_args['attrs'] = ( isset($args['attrs']) ? self::print_attrs($args['attrs']) : false );
					$field_args['style'] = ( isset($args['style']) ? self::print_styles( $args['style'] ) : self::field_defaults($args) );
				// Build Field
					$field_fn = "field_".$args['field'];
					isnotset($field_args['main']['id'],$field_args['main']['name']);
					$field = self::$field_fn( $field_args );
				// Description
					$description = self::print_text( $args, 'description' );
				// Organize Output
					if ( isset($args['id']) ) $output = $field .' '. $label .' '. $description;
					else $output = $label .' '. $extra .' '. $field .' '. $description;
				// Return Field
					return $output;
			}
			private function address( $args ) {
				$address = array(
					'street_address' => array(
						'label' => 'Street',
						'field' => 'input',
					),
					'extended_address' => array(
						'label' => 'Extended',
						'field' => 'input',
					),
					'locality' => array(
						'label' => 'City',
						'field' => 'input',
						'style_box' => 'float:left;width:30%;'
					),
					'region' => array(
						'label' => 'State',
						'field' => 'datalist',
						'datalist' => listStates( ( isset($args['main']['state']) ? $args['main']['state'] : 'abbr' ) ),
						'style_box' => 'float:left;margin-left:5%;width:30%;'
					),
					'postal_code' => array(
						'label' => 'Zip',
						'field' => 'input',
						'style_box' => 'float:left;margin-left:5%;width:30%;'
					),
					'country_name' => array(
						'label' => 'Country',
						'field' => 'input',
					),
				);
				$fields = '<div style="overflow:hidden">';
					foreach ($address as $field_name => $attrs) {
						if ( $args['main']['include'][$field_name] ) {
							$field_type = 'field_'.$attrs['field'];
							$style = self::print_styles( $attrs['style_box'] );
							$fields .= "<div $style>";
								$attrs['name'] = $args['main']['name'].'_'.$field_name; // Store Field Name
								$attrs['post'] = $args['main']['post']; // Store Post ID
								$fields .= FormCast::tag( $attrs );
							$fields .= "</div>";
						}
					}
				$fields .= '</div>';
				return $fields;
			}
			private function field_datalist( $args ) {
				$list = $args['main']['name'].'_list';
				// nice($args);
				$input = array(
					'field' => 'input',
					'attrs' => array( 'type' => 'text', 'list' => $list ),
					'name' => $args['main']['name'],
					'post' => $args['main']['post']
				);
				
				if ( isset($args['main']['fn']) ) $args['main']['datalist'] = $args['main']['fn']['prefix']::$args['main']['fn']['name']( $args['main']['fn']['query'] );
				$field = self::tag( $input );
				$field .= "<datalist id=\"$list\">";
					foreach ($args['main']['datalist'] as $id => $value) $field .= "<option value=\"$value\">";
				$field .= "</datalist>";
				return $field;
			}
			private function field_datefield( $args ) {
				/*
					TODO Need to complete this.
				*/
				$field = array(
					'main' => array(
						'id' => $args['main']['id']
						,'name' => $args['main']['name']
						,'attrs' => array( 'type' => 'text' )
					)
					,'attrs' => "value=\"$value\""
					,'style' => "style=\"width:100%;\""
				);
				return self::field_input( $field );
			}
			private function field_defaults( $args ) {
				$type = ( isset($args['attrs']['type']) ? $args['attrs']['type'] : $args['field'] );
				switch ( $type ) {
					case 'text': case 'textarea': return " style=\"width:100%;\""; break;
					default: return false; break;
				}
			}
			private function field_input( $args ) {
				return "<input id=\"{$args['main']['id']}\" name=\"{$args['main']['name']}\" type=\"{$args['main']['attrs']['type']}\" {$args['attrs']} {$args['style']}>";
			}
			private function field_list( $args ) {
				$values = ( isset($args['main']['value']) ? $args['main']['value'] : false );
				$field = array(
					'main' => array(
						'id' => $args['main']['id']
						,'name' => $args['main']['name']
						,'attrs' => array( 'type' => 'text' )
					)
					,'attrs' => ""
					,'style' => "style=\"width:100%;\""
				);
				$return = "";
				$return = "<a href=\"#\" class=\"add_list_item\" id=\"{$args['main']['id']}\" name=\"{$args['main']['name']}\">Add</a>"; // To add more
				if ( $values ) {
					foreach ($values as $key => $value) {
						$field['main']['id'] = $args['main']['id']."_$key";
						$field['main']['name'] = $args['main']['name']."[$key]";
						$field['attrs'] = "value=\"$value\"";
						$return .= self::field_input( $field );
					}
				}else $return .= self::field_input( $field );
				return $return;
			}
			private function field_radio( $args ) {
				// the value is getting overwridden, do a check for radio and set checked
				$output = '';
				$input = array(
					'field' => 'input',
					'attrs' => array( 'type' => 'radio' ),
					'post' => $args['main']['post'],
					'name' => $args['main']['name']
				);
				foreach ($args['main']['fields'] as $key => $name) {
					$input['id'] = $args['main']['name'].'_'.$key;
					$input['label'] = $name;
					$input['attrs']['value'] = $name;
					$output .= self::tag( $input );
				}
				return $output;
			}
			private function field_select( $args ) {
				$id = ( isset($args['main']['id']) ? $args['main']['id'] : $args['main']['name'] );
				$style = ( isset($args['style']) ? $args['style'] : self::field_defaults('select') );
				$default = ( isset($args['main']['default']) ? "<option value=\"{$args['main']['default'][0]}\">{$args['main']['default'][1]}</option>" : false);
				// Run any custom functions
					if ( isset($args['main']['fn']) ) {
						extract($args['main']['fn']);
						if ( $prefix ) $fn = array($prefix,$name);
						else $fn = $name;
						$options = call_user_func($fn,$query);
					}else $options = $args['main']['options'];
				// Check for stored value
					$stored_val = ( isset($args['main']['value']) ? strtolower($args['main']['value']) : false );
					if( ctype_digit($stored_val) ) $stored_val = (int)$stored_val;
				// Build Select
				$select = "<select id=\"$id\" name=\"{$args['main']['name']}\" {$args['attrs']} $style>";
					$select .= ( $default ? $default : false );
					$type = ( isAssoc($options) ? 'associative' : 'index');
					foreach ($options as $value => $text) {
						if ( $type == 'index' ) $val = strtolower($text);
						else $val = $value;
						$selected = ( $val === $stored_val ? ' selected="selected"' : false );
						$select .= "<option value=\"$val\"$selected>$text</option>";
					}
				$select .= '</select>';
				return $select;
			}
			private function field_textarea( $args ) {
				$value = ( isset($args['main']['value']) ? $args['main']['value'] : false );
				return "<textarea id=\"{$args['main']['id']}\" name=\"{$args['main']['name']}\" {$args['attrs']} {$args['style']}>$value</textarea>";
			}
			private function print_attrs( &$attrs ) {
				if ( empty($attrs) ) return false;
				$output = $attrs;
				if ( is_array($attrs) ) {
					$output = '';
					foreach ($attrs as $attr => $value) {
						if ( $value ) $output .= "$attr=\"$value\" ";
					}
				}
				return $output;
				// return ( is_array($attrs) ? array_implode($attrs) : $attrs );
			}
			public  function print_styles( &$styles ) {
				if ( !isvar($styles) ) return false;
				return " style=\"$styles\"";
			}
			private function print_text( $args, $type = 'label' ) {
				if ( !isset($args[$type]) ) return false;
				if( is_array($args[$type]) ){
					$styles = ( isset($args[$type]['style']) ? $args[$type]['style'] : false );
					$style = ( $styles ? self::print_styles($styles) : false );
					$text = $args[$type]['text'];
				}else { $style = false; $text = $args[$type]; }
				switch ( $type ) {
					case 'description': return "<small$style>$text</small>"; break;
					case 'label':
						$id = ( isset($args['id']) ? $args['id'] : $args['name'] );
						return "<label for=\"$id\"$style>{$args['label']}</label>";
					break;
					default: return false; break;
				}
			}
		}
	endif;