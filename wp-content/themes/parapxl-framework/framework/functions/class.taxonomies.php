<?php
/**
 * Custom Post Types & Taxons
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 * @param array $custom_post_types Used to store the custom taxonomies capabilities
 */
	if ( !class_exists('pxlTaxonomies') ) :
		class pxlTaxonomies {
			function __construct( $setup ) {
				pxlPostTypes::register('taxonomies');
				// add_action('restrict_manage_posts', 'filter_taxonomy');
			}
			public function filter_taxonomy() {
				/*
					TODO Refactor and Test
				*/
			// 	global $typenow;
			// 	$taxonomy = $typenow.'_type';
			// 	if( taxonomy_exists($taxonomy) && $typenow != "page" && $typenow != "post" ){
			// 		$filters = array($taxonomy);
			// 		foreach ($filters as $tax_slug){
			// 			$tax_obj = get_taxonomy($tax_slug);
			// 			$tax_name = $tax_obj->labels->name;
			// 			$terms = get_terms($tax_slug);
			// 			echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
			// 			echo "<option value=''>Show All $tax_name</option>";
			// 			foreach ($terms as $term){ echo '<option value='.$term->slug.' '.($_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '').'>' . $term->name .' (' . $term->count .')</option>'; }
			// 			echo "</select>";
			// 		}
			// 	}
			}
		}
	endif;