<?php
/**
 * Bootstrap
 * This file will initialize the bootstrap folder in the child theme directory
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 */
	if ( !class_exists('pxlBootstrap') ) {
		class pxlBootstrap {
			private static $setup;
			function __construct( $include ) {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				$css = array(); $js = array();
				$params = array(
					'min' => '.min',
					'responsive' => true,
					'resources' => array(
						'css' => array(
							'bootstrap',
							'bootstrap-responsive',
						),
						'js' =>	 array(
							'bootstrap',
						)
					),
				);
				if( !($include === true) ) $params = array_merge($params,$include);
				extract($params);
				foreach($resources as $ext => $files) {
					foreach($files as $file) {
						$keep = true; $rep = false;
						if( !$responsive && strpos($file,'responsive') ) $keep = false;
						elseif( $responsive && strpos($file,'responsive') ) $rep = true;
						if( $keep ) {
							if( $min ) ${$ext}[$file.$min] = array('src'=>'bootstrap');
							if( $rep ) ${$ext}[$file.$min]['deps'] = array('bootstrap'.$min);
							if( $ext == 'js' && $file == 'bootstrap' ) $js[$file.$min]['deps'] = array('jquery');
						}
					}
				}
				$pxlSetup['theme']['resources']['css'] = array_merge($css,$pxlSetup['theme']['resources']['css']);
				$pxlSetup['theme']['resources']['js'] = array_merge($js,$pxlSetup['theme']['resources']['js']);
			}
		}
	}
	
	if ( ! function_exists( 'Bootstrap_Walker' ) ):
		/*
			TODO Mat
				Review and determine if this needs to be refactored. Also, Bootstrap updated their menus so we may not need this.
		*/
		class Bootstrap_Walker extends Walker_Nav_Menu {
			/**
			 * Start lvl
			 * @param string $output: Passed by reference. Used to append additional content.
			 * @param int $depth: Depth of menu item. Used for padding.
			 */
				function start_lvl( &$output, $depth ) {
					$indent = str_repeat( "\t", $depth );
					$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";
				}
				
			/**
			 * Start el
			 * 
			 * @uses apply_filters http://codex.wordpress.org/Function_Reference/apply_filters
			 * @uses esc_attr http://codex.wordpress.org/Function_Reference/esc_attr
			 * @param string $output: Passed by reference. Used to append additional content.
			 * @param object $item: Menu item data object.
			 * @param int $depth: Depth of menu item. Used for padding.
			 * @param object $args
			 */
				function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
					$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
					
					$li_attributes = '';
					$class_names = $value = '';
					
					$classes = empty( $item->classes ) ? array() : (array) $item->classes;
					$classes[] = ($args->has_children) ? 'dropdown' : '';
					$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
					$classes[] = 'menu-item-' . $item->ID;
					
					$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
					$class_names = ' class="' . esc_attr( $class_names ) . '"';
					
					$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
					$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
					
					$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
					
					$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
					$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
					$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
					$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
					$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
					
					$item_output = $args->before;
					$item_output .= '<a'. $attributes .'>';
					$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
					$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
					$item_output .= $args->after;
					
					$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
				}
			
			/**
			 * Display Element
			 * 
			 * @param object $element: Data object
			 * @param array $children_elements: List of elements to continue traversing.
			 * @param int $max_depth: Max depth to traverse.
			 * @param int $depth: Depth of current element.
			 * @param array $args
			 * @param string $output: Passed by reference. Used to append additional content.
			 */
				function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
					if ( !$element )
						return;
					
					$id_field = $this->db_fields['id'];
				
					//display this element
						if ( is_array( $args[0] ) )
							$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
						else if ( is_object( $args[0] ) )
							$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
					
					$cb_args = array_merge( array(&$output, $element, $depth), $args);
					call_user_func_array(array(&$this, 'start_el'), $cb_args);
				
					$id = $element->$id_field;
				
					// descend only when the depth is right and there are childrens for this element
						if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
							foreach( $children_elements[ $id ] as $child ){
								if ( !isset($newlevel) ) {
									$newlevel = true;
									//start the child delimiter
									$cb_args = array_merge( array(&$output, $depth), $args );
									call_user_func_array( array(&$this, 'start_lvl'), $cb_args) ;
								}
								$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
							}
							unset( $children_elements[ $id ] );
						}
				
					if ( isset($newlevel) && $newlevel ){
						//end the child delimiter
							$cb_args = array_merge( array(&$output, $depth), $args);
							call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
					}
				
					//end this element
						$cb_args = array_merge( array(&$output, $element, $depth), $args);
						call_user_func_array(array(&$this, 'end_el'), $cb_args);
				}
		}
	endif;
