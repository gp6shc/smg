<?php
/**
 * Shortcodes
 * @package Parapxl WP Framework
 * @subpackage Functions
 * @since 1.0
 */
	if ( !class_exists('pxlShortcodes') ) :
		class pxlShortcodes {
			private static $setup;
			function __construct() {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				add_shortcode( 'col', array( &$this, 'content_columns' ) );
				add_shortcode( 'insert', array( &$this, 'insert_custom_variable' ) );
				add_shortcode( 'posts', array( &$this, 'list_posts' ) );
				add_shortcode( 'sidebar', array( &$this, 'sidebar_position' ) );
			}
			public function content_columns( $atts, $content = null ) {
				extract( shortcode_atts( array( 'class' => '', 'page' => 'none', 'shortcode' => 'no', 'size' => '4' ), $atts ) );
				$inside_content = '<div class="'.$class.' span'.$size.'">'.do_shortcode($content).'</div>';
				if( $page == 'start' ) $return = '<div class="row-fluid">'.$inside_content;
				else if( $page == 'end' ) $return = $inside_content.'</div>';
				else if( $page == 'none' ) $return = $inside_content;
				else $return = '<div class="row-fluid">'.$inside_content.'</div>';
				return $return;
			}
			public function insert_custom_variable( $atts ) {
				global $custom_vars, $post; $cfs = get_post_custom();
				extract( shortcode_atts( array( 'var' => '', ), $atts ) );
				$snippets = thisThat(self::$setup['theme']['snippets']);
				$output = false;
				if ( isset($snippets[$var]) ) $output = $snippets[$var]($post,$cfs);
				else if( isset($cfs[$var]) ) $output = $cfs[$var][0];
				return $output;
			} 
			public function list_posts( $atts ) {
				$default = array(
					'author' => null,
					'cat' => null,
					'category_name' => null,
					'category__and' => null,
					'category__in' => null,
					'category__not_in' => null,
					'tag' => null,
					'tag_id' => null,
					'tag__and' => null,
					'tag__in' => null,
					'tag__not_in' => null,
					'tag_slug__and' => null,
					'tag_slug__in' => null,
					'tax_query' => null,
					'p' => null,
					'name' => null,
					'page_id' => null,
					'pagename' => null,
					'post_parent' => null,
					'post__in' => null,
					'post__not_in' => null,
					'type' => null,
					'post_status' => null,
					'show' => null,
					'posts_per_archive_page' => null,
					'nopaging' => null,
					'paged' => null,
					'offset' => null,
					'order' => null,
					'orderby' => null,
					'ignore_sticky_posts' => null,
					'year' => null,
					'monthnum' => null,
					'w' => null,
					'day' => null,
					'hour' => null,
					'minute' => null,
					'second' => null,
					'meta_key' => null,
					'meta_value' => null,
					'meta_value_num' => null,
					'meta_compare' => null,
					'meta_query' => null,
					'meta_type' => null,
					'perm' => null,
					'cache_results' => null,
					'update_post_term_cache' => null,
					'update_post_meta_cache' => null,
					'fields' => null,
					's' => null,
					'loop' => 'post',
					'paging' => null,
					'notfound' => null,
					'echo' => null
				);
				$params = shortcode_atts($default, $atts);
				$args = array();
				self::build_queries( $atts, $args );
				foreach ($atts as $key => $value){
					$check = @unserialize($value);
					switch ($key) {
						case 'type': $args['post_type'] = ( $check !== false ? $check : $value ); break;
						case 'show': $args['posts_per_page'] = $value; break;
						case 'cat': $args['cat'] = $value; break;
						default: $args[$key] = ( $check !== false ? $check : $value ); break;
					}
				}
				$pxl_query = new WP_Query( $args );
				// echo $pxl_query->request;
				if ( pxl::has_sc('posts') || $params['echo'] === 'false') $echo = false; else $echo = true;
				$output = pxl::loop("partial='{$params['loop']}' paging='{$params['paging']}' notfound='{$params['notfound']}' echo='$echo'",$pxl_query);
				if ( !$echo ) return $output;
			}
			public function sidebar_position( $atts ) {
				$template = TEMPLATES . '/default/sidebar.php';
				ob_start(); include($template); $output = ob_get_contents(); ob_end_clean();
				return $output;
			}
			public function users( $atts ) {
				/*
					TODO Finish out users sql query
				*/
				extract( shortcode_atts( array(
					'author' => false
				), $atts));
			}
			public function build_queries( &$atts, &$args, $queries = array('meta_query', 'tax_query') ) {
				foreach ($queries as $type) {
					if ( isset($atts[$type]) ) {
						$data = @unserialize($atts[$type]);
						if ( $data === false ) {
							$query = split('/',$atts[$type]);
							switch ( $type ) {
								case 'meta_query':
									$params = array('key' => $query[0], 'value' => $query[1], 'compare' => '=');
									if ( isset($atts['meta_type']) ) $params['type'] = $atts['meta_type'];
									break;
								case 'tax_query': $params = array('taxonomy' => $query[0] ,'field' => 'slug' ,'terms' => $query[1]); break;
							}
							$args[$type] = array( $params );
						}else $args[$type] = $data;
						unset($atts[$type]);
					}
				}
			}
		}
	endif;