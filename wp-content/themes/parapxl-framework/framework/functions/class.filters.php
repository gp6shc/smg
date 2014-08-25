<?php
/**
 * Templates
 * An extension of how Wordpress figures out which file to serve up as the template. We do it this way in order to have a more organized theme folder structure.
 * 
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 */
	if ( !class_exists('pxlFilter') ) {
		class pxlFilter {
			public function filter( $taxonomy, $type = 'dropdown', $parent = 0 ) {
				global $wp_query;
				// Get the Terms for our taxonomy
					// $terms = get_terms( $taxonomy, array( 'fields' => 'all', 'parent' => $parent ) );
					$terms = pxl::get_active_terms( $taxonomy, $parent );
				// Account for Category really being Category_Name
					if( $taxonomy == 'category' ) $taxonomy = 'category_name';
				// Determine if we are filtering on one of these taxonomy terms already
					$current = ( isset($wp_query->query[$taxonomy]) ? strtolower($wp_query->query[$taxonomy]) : 'all' );
					if( strpos($current,'/') > 0 ) {
						$current = explode('/',$current);
						$current = $current[count($current)-1];
					}
				// Build Links
					$src = array(
						'base' => site_url(),
						'post_type' => self::rewrite(),
						'taxonomy' => $taxonomy,
						'query' => self::current_filters($wp_query, $taxonomy),
					);
					$output = "type_$type";
					$options = self::$output( $src, $terms, $current );
				// Build Output
					// Account for Category_Name because it should be displayed as Category_Name
						if( $taxonomy == 'category_name' ) $taxonomy = 'category';
					get_template_file("templates/partials/filter-$type",array( 'title' => $taxonomy, 'current' => $current, 'options' => $options ));
			}
			public function sort( $by = 'date', $title = 'Sort by', $ASC = 'Oldest First', $DESC = 'Newest First' ) {
				global $wp_query;
				$base = site_url();
				$post_type = self::rewrite();
				$query = self::current_filters($wp_query, array('orderby','order'));
				$current = ( isset($wp_query->query['orderby']) && strtolower($wp_query->query['orderby']) == strtolower($by) ? $wp_query->query['order'] : ucwords($by) );
				$order = array(
					'ASC'  => "<a href='$base/{$post_type['slug']}?orderby=$by&order=ASC{$query}'>$ASC</a>",
					'DESC' => "<a href='$base/{$post_type['slug']}?orderby=$by&order=DESC{$query}'>$DESC</a>"
				);
				$options = '';
				foreach($order as $key => $option)
					if( $key != $current ) $options .= $option;
				if( strtolower($current) != strtolower($by) ) $current = ${$current};
				get_template_file("templates/partials/filter-dropdown",array( 'title' => $title, 'current' => $current, 'options' => $options ));
			}
			private function current_filters( $wp_query, $area ) {
				$query = false;
				foreach ($wp_query->query as $item => $term){
					$restrict_item = array('post_type','offset');
					if( is_array($area) ) $restrict_item = array_merge($restrict_item,$area);
					else array_push($restrict_item,$area);
					if( !in_array($item,$restrict_item) ) $query .= "&$item=$term";
				}
				return $query;
			}
			private function type_dropdown( $src, $terms, $current ) {
				$options = '';
				if ( $current != 'all' ) {
					$count = 0;
					$query = substr_replace($src['query'],'?',strpos($src['query'],'&'),1);
					$options .= "<a href='{$src['base']}/{$src['post_type']['slug']}$query'>All</a>";
				}
				foreach ($terms as $term){
					if( $term->slug != $current )
						$options .= "<a href='{$src['base']}/{$src['post_type']['slug']}?{$src['taxonomy']}=$term->slug{$src['query']}'>$term->name</a>";
				}
				return $options;
			}
			private function type_menu( $src, $terms, $current ) {
				$options = array();
				$post_type = ( !empty($src['post_type']) ? "/" : '');
				// Create all term links
					foreach($terms as $term) {
						if( $term->slug == $current ) {
							$option = "<a href='{$src['base']}/{$src['post_type']['slug']}?{$src['query']}' class='current'>$term->name</a>";
							array_unshift($options,$option);
						}else{
							$option = "<a href='{$src['base']}/{$src['post_type']['slug']}?{$src['taxonomy']}=$term->slug{$src['query']}'>$term->name</a>";
							array_push($options,$option);
						}
					}
				// Set All Link
					$class_all = ( $current == 'all' ? " class='current'" : '' );
					$link = "<a href='{$src['base']}/{$src['post_type']['slug']}'$class_all>{$src['post_type']['title']}</a>";
					array_unshift($options,$link);
				return $options;
			}
			private function rewrite() {
				global $post_type;
				$type = get_post_type_object($post_type);
				$postType = array();
				if( $type ) {
					$postType['title'] = "All $type->label";
					$postType['slug'] = $type->rewrite['slug'].'/';
				}else{
					$postType['title'] = 'Latest';
					$postType['slug'] = '';
				}
				return $postType;
			}
		}
	}
