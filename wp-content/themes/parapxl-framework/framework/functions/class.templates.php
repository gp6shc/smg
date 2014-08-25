<?php
/**
 * Templates
 * An extension of how Wordpress figures out which file to serve up as the template. We do it this way in order to have a more organized theme folder structure.
 * 
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 */
	if ( !class_exists('pxlTemplates') ) :
		class pxlTemplates {
			public  function init() {
				global $query_string;
				if ( strpos($query_string,'mkey') && strpos($query_string,'post_type') ) {
					$search = str_replace('mkey','meta_key',$query_string);
					nice($search);
					query_posts($search);
				}
				if ( is_home() ) { return self::template_default( 'default', 'blog' ); } // If "Your latest posts" or "Posts page" default to blog.php
				elseif ( is_front_page() ) { global $post; the_post(); return self::template_default( 'default', 'home' ); } // if "Front page" default to home.php
				if ( is_single() || is_page() ) { global $post; the_post(); } // Initilize the post object for single post and page
				if ( is_page() ) return self::template_page(); // Check to see if page uses a custom page template [Deprecated]
				global $wp_query;
				$is_area = self::is_check( $wp_query ); // Checks wp_query for the is_ conditionals and returns the ones that are true
				if ( isset($wp_query->query['post_type']) && count($is_area) >= 3 ) { // If we are filtering on top of a custom post type make sure we retrieve the post type template
					unset($is_area[1]);
					if ( isset($is_area[3]) ) unset($is_area[2]);
					$is_area = array_values($is_area);
				}
				$custom = self::template_custom( $wp_query, $is_area ); // Check for Custom Template
				if ( $custom ) return $custom;
				return self::template_default( 'default', $is_area[0] ); // Return Default Template
			}
			private function is_check( $wp_query ) {
				$is = array();
				foreach ($wp_query as $key => $item) 
					if ( $wp_query->$key === true && strpos( $key,'is_' ) === 0 ) array_push( $is,substr($key,3) );
				if ( $is[0] == '404' ) self::redirect( $is );
				return $is;
			}
			private function redirect( &$is ) { // Redirects requests from the base of a taxonomy (e.g. /genres ) to the archive of the main custom post type that uses that taxonomy
				global $pxlSetup;
				$url = str_replace('/','',$_SERVER['REQUEST_URI']);
				$term = substr($url,0,-1);
				$taxonomy = thisThat($pxlSetup['theme']['taxonomies'][$term]);
				if ( $taxonomy ) {
					global $posts;
					$post_types = $taxonomy['post_types'];
					if ( is_array($post_types) ) {
						foreach ($post_types as $type) {
							$cont = true;
							if ( isset($pxlSetup['theme']['post_types'][$type]) && $cont ) { $post_type = $type; $cont = false; }
						}
					}else $post_type = 'post';
					$is = array('archive','tax',$term);
					$terms = get_terms( $term, array( 'fields' => 'names' ));
					$args = array(
						'post_type' => $post_type,
						'numberposts' => 10,
						'tax_query' => array(
							array(
								'taxonomy' => $term,
								'field' => 'slug',
								'operator' => 'IN',
								'terms' => $terms
							)
						)
					);
					$posts = get_posts( $args );
				}else return false;
			}
			private function template_custom( $wp_query, $is_area ) {
				if ( !isset($is_area[1]) ) return false;
				$dir = TEMPLATES . '/custom/';
				$custom_templates = scan_dir( $dir );
				$template = array();
				$find = false;
				switch ( $is_area[1] ) {
					case 'author':
						$find = find_file($dir,'author');
						break;
					case 'date':
						$post_type = thisThat($wp_query->query['post_type'],'post');
						$slug = $post_type.'-'.$is_area[2].'-'.$is_area[0];
						$find = find_file($dir,$slug);
						break;
					case 'category':
						$find = $is_area[1].'-'.$is_area[0];
						$term = str_replace('/','-',$wp_query->query['category_name']);
						$search = array($term,$is_area[0]);
						$find = find_file($dir,$search,'cat-');
						break;
					case 'tag':
						$term = $wp_query->query['tag'];
						$search = array($term,$is_area[0]);
						$find = find_file($dir,$search,'tag-');
						break;
					case 'tax':
						$tax_name = thisThat($is_area[2]);
						$tax = thisThat($wp_query->query_vars['taxonomy'],$tax_name);
						$find_term = thisThat($wp_query->query[$tax]);
						$term = str_replace('/','-',$find_term);
						$search = array($term,$is_area[0]);
						$find = find_file($dir,$search,$tax.'-');
						break;
					default: // singular
						$post_type = str_replace('-','_',thisThat($wp_query->query['post_type'],'post'));
						$base = $post_type.'-'.$is_area[0];
						$slug = ( isset($is_area[2]) ? $post_type.'-'.$is_area[1] : $post_type.'-'.$is_area[0] );
						$search = array($slug);
						if ( $slug != $base ) array_push($search,$base);
						$find = find_file($dir,$search);
						break;
				}
				if ( $find ) return self::template_default( 'custom', $find );
				else return false;
			}
			private function template_default( $sub, $file ) {
				$dir = TEMPLATES .'/'. $sub .'/';
				$find = find_file($dir,$file);
				if ( $find ) return 'templates/'.$sub.'/'.$file; else return 'templates/default/index';
			}
			private function template_page() { // Deprecated in favor of going back to the WP method now that you can scan one folder deep
				global $post; $template = get_post_meta($post->ID, '_wp_page_template', true);
				$cfs = get_post_custom();
				if ( isvar($template) && $template != 'default' ) return self::template_default( 'custom', 'page-'.$template );
				else return self::template_default( 'default', 'page' );
			}
			public  function page_templates() { // Deprecated
				$page_templates = scan_dir( get_stylesheet_directory().'/templates/custom' );
				$templates = array();
				foreach ($page_templates as $file) {
					if ( strpos($file,'page-') === 0 ) {
						$filename = ucwords(str_replace(array('page-','.php'),'',$file));
						array_push($templates,$filename);
					}
				}
				return $templates;
			}
		}
	endif;