<?php
/**
 * Columns
 * Creates custom columns to display snippets, custom fields, and assigned taxonomy terms.
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 */
	if ( !class_exists('pxlColumns') ) :
		class pxlColumns {
			private static $setup;
			function __construct() {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				self::columns_register();
			}
			private function columns_register() {
				$post_types = self::$setup['theme']['postTypes'];
				foreach ($post_types as $name => $args) {
					if ( isset($args['columns']) && !empty($args['columns']) ) {
						add_filter( "manage_{$name}_posts_columns", array( &$this, 'columns_set' ) );
						add_action( "manage_{$name}_posts_custom_column", array( &$this, 'column_values' ), 10, 2 );
					}
				}
			}
			public  function columns_set( $columns ) {
				if ( post_type_exists( $_REQUEST['post_type'] ) ) $post_type = $_REQUEST['post_type'];
				else $post_type = 'post';
				$defaults = array(
					"cb" => "<input type=\"checkbox\" />",
				);
				$set = thisThat(self::$setup['theme']['postTypes'][$post_type]['columns']);
				if ( isset($set['taxonomy']) && $set['taxonomy'] ) {
					$output = 'names';
					$operator = 'and';
					$builtin = array( 'public' => true, '_builtin' => true );
					$custom = array( 'public' => true, '_builtin' => false );
					$_builtin_taxonomies = get_taxonomies( $builtin, $output, $operator );
					$_custom_taxonomies = get_taxonomies( $custom, $output, $operator );
					$taxons = array_merge($_builtin_taxonomies,$_custom_taxonomies);
					$taxonomies = get_object_taxonomies( $post_type, 'objects' );
					foreach ( $taxonomies as $taxonomy ) {
						if ( in_array( $taxonomy->name, $taxons ) ) {
							$key = 'taxonomy';
							$keys = array_flip(array_keys($set));
							unset($set[$key]);
							$set = array_insert($set,array($taxonomy->name => $taxonomy->label),$keys[$key]);
						}
					}
				}
				if ( $set ) return array_merge($defaults, $set);
			}
			public  function column_values( $column_name, $post_id ) {
				global $post;
				$cfs = get_post_custom( $post_id );
				$snippets = thisThat(self::$setup['theme']['snippets']);
				// $taxonomies_args = array( 'public' => true, '_builtin' => false );
				// $taxonomies = get_taxonomies( $taxonomies_args, 'names', 'and' );
				// nice($taxonomies);
				
				$builtin = array( 'public' => true, '_builtin' => true );
				$custom = array( 'public' => true, '_builtin' => false );
				$_builtin_taxonomies = get_taxonomies( $builtin, 'names', 'and' );
				$_custom_taxonomies = get_taxonomies( $custom, 'names', 'and' );
				$taxonomies = array_merge($_builtin_taxonomies,$_custom_taxonomies);
				$output = '';
				if ( isset($snippets[$column_name]) ) $output = $snippets[$column_name]($post,$cfs);
				else if( isset($cfs[$column_name]) ) $output = $cfs[$column_name][0];
				else if( isset($taxonomies[$column_name]) ) {
					$post_type = get_post_type( $post_id );
					$terms = get_the_terms( $post_id, $column_name );
					if ( ! empty( $terms ) ) {
						foreach ( $terms as $t )
							$output[] = "<a href='edit.php?post_type=$post_type&amp;taxonomy=$column_name&amp;term=$t->slug'> " . esc_html( sanitize_term_field( 'name', $t->name, $t->term_id, $column_name, 'display' ) ) . "</a>";
						$output = implode( ', ', $output );
					} else {
						$t = get_taxonomy( $column_name );
						$output = "No $t->label";
					}
				}
				if ( $output ) echo $output;
			}
		}
	endif;