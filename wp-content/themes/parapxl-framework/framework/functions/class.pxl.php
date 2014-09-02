<?php
/**
 * PXL
 * These are functions that wordpress should implement to make developer's lives easier.
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 */
	if ( !class_exists('pxl') ) :
		class pxl {
			private static $setup;
			function __construct() {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				// Wordpress Specific Features
					self::support_wp();
				// Miscellaneous Features
					$support_misc = self::$setup['support']['misc'];
					foreach ($support_misc as $name => $enable) if ( $enable ) self::support_enable( $name, $enable );
				// Framework Features
					self::support_fw();
				// Query Vars
					add_filter('query_vars', array(&$this,'query_vars_add') );
			} // Initializes WP, Misc, and Framework Features
			public  function archive( $postType = false ) {
				global $wpdb;
				if ( $postType ) $post_type = $postType;
				else $post_type = get_post_type();
				$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = '".$post_type."' ORDER BY post_date DESC");
				foreach($years as $year) {
					$months = $wpdb->get_col("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = '".$post_type."' AND YEAR(post_date) = '".$year."' ORDER BY post_date DESC");
					foreach($months as $month) {
						$date = get_month_link($year, $month);
						$date_display = date( 'F', mktime(0, 0, 0, $month) );
						echo "<li><a href=\"$date?post_type=$post_type\">$date_display $year</a></li>";
					}
				}
			}
			public  function cfs( $cfs, $fields, $prefix = 'pxl' ) {
				$params = array();
				foreach ($fields as $field) {
					if ( isset($cfs[$field]) ) $params[$prefix.'_'.$field] = $cfs[$field][0];
					else $params[$prefix.'_'.$field] = false;
				}
				return $params;
			}
			public  function content( $content ) {
				echo apply_filters('the_content', $content);
			}
			public  function dashboard_widgets() {
				global $wp_meta_boxes;
				foreach(self::$setup['support']['misc']['dashboard'] as $area => $box)
					foreach($box as $box_name)
						unset($wp_meta_boxes['dashboard'][$area]['core'][$box_name]);
			}
			public  function excerpt( $atts ) {
				global $post;
				$default = array( 'length' => 25 ,'content' => 'excerpt' ,'link' => get_permalink() ,'class' => false ,'text' => 'read more' ,'inline' => true ,'sep' => '&hellip;' );
				$params = self::get_params( $atts, $default );
				extract($params);
				switch ( $content ) {
					case 'content': $content = $post->post_content; break;
					case 'excerpt': $content = get_the_excerpt(); break;
					default: $content = $params['content']; break;
				}
				$words = explode(' ', $content);
				if (count($words) > $length){ array_splice($words, $length); $content = implode(' ', $words); }
				if ( _bool($sep) ) $content .= $sep;
				$output = strip_tags(apply_filters('the_excerpt', $content ));
				if ( _bool($link) ) {
					// nice($link);
					$class = ( $class ? " class=\"$class\"" : false );
					$link_tag = "<a href=\"$link\"$class>$text</a>";
					if ( _bool($inline) ) $output .= " $link_tag";
				}
				echo "<p>$output</p>";
				if ( _bool($link) && !_bool($inline) ) echo $link_tag;
			}
			public  function getFeed($feed_url) {
				$content = file_get_contents($feed_url);
				return new SimpleXmlElement($content);
			}
			public  function get_params( $atts, $default ){
				$atts = shortcode_parse_atts($atts);
				return shortcode_atts($default,$atts);
			}
			public  function get_post_by_title($page_title, $post_type = "post" ,$output = OBJECT) {
				global $wpdb;
				$post_request = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type= %s", $page_title, strtolower($post_type) ));
				if ( $post_request ) return get_post($post_request, $output);
				return false;
			}
			public  function get_posts_by_letter( $letters ) {
				global $wpdb, $post_type;
				return $wpdb->get_results(
					$wpdb->prepare(
						"
						SELECT t.name, count(t.name) count
						FROM wp_posts p
						WHERE p.post_type = %s
						GROUP BY t.name
						",
						$post_type
					),
					OBJECT_K
				);
			}
			public  function get_active_terms( $taxonomy, $parent = 0 ) {
				global $wpdb, $post_type;
				if( !$post_type ) $post_type = 'post';
				return $wpdb->get_results(
					$wpdb->prepare(
						"
						SELECT t.name, t.slug, count(t.name) count
						FROM wp_posts p
						JOIN wp_term_relationships tr ON tr.object_id = p.id
						JOIN wp_term_taxonomy tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
						JOIN wp_terms t ON t.term_id = tt.term_id
						WHERE p.post_type = %s AND tt.taxonomy = %s && tt.parent = %d
						GROUP BY t.name
						",
						$post_type, $taxonomy, $parent
					),
					OBJECT_K
				);
			}
			public  function has_sc($shortcode = '') {
				if ( !in_the_loop() ) return false;
				$post_to_check = get_post(get_the_ID());
				// false because we have to search through the post content first
				$found = false;
				// if no short code was provided, return false
				if (!$shortcode) return $found;
				// check the post content for the short code
				if ( stripos($post_to_check->post_content, '[' . $shortcode) !== false ) $found = true;
				// return our final results
				return $found;
			}
			public  function head_title() {
				echo get_bloginfo('name')." | ".get_bloginfo('description');
			}
			public  function loop( $atts, $query = false ) {
				$default = array(
					'partial' => 'post'
					,'paging' => false
					,'notfound' => false
					,'echo' => true
				);
				$params = self::get_params($atts, $default);
				extract($params);
				if ( $query == false ) { global $wp_query; $query = $wp_query; }
				$post_type = get_post_type();
				$output = '';
				if ( is_object($query) && $query->have_posts() ) {
					while ( $query->have_posts() ) : $query->the_post();
						$filename = 'templates/partials/'.$partial;
						$output .= get_template_file($filename, false, $echo);
					endwhile;
					if( $paging ) self::paging('bottom', $paging, $query);
				}else{
					if ( $notfound == null || (bool)$notfound === false ) return;
					else if ( $notfound ){
						$notfound = explode('-',$notfound);
						$output .= get_template_part( 'templates/partials/'.$notfound[0], false, $echo);
					} else $output .= get_template_part( 'templates/default/not-found', false, $echo );
				}
				wp_reset_postdata(); // Reset Post Data
				if ( $echo ) echo $output;
				else return $output;
			}
			public  function loop_items( $args, $params = false, $template, $loop_fn = false ) {
				global $post;
				$tmp_post = $post;
				$items = get_posts($args);
				$count = count($items);
				foreach( $items as $key => $post ) { setup_postdata($post);
					if ( $loop_fn ) $vars = call_user_func($loop_fn,$params,$key,$post);
					elseif( $params ) $vars = $params;
					else $vars = array( 'key' => $key );
					if( $count == 1 ) $vars['cat'] = $args['tax_query'][0]['terms'];
					get_template_file($template,$vars);
				}
				$post = $tmp_post;
				return $count;
			}
			public  function page( $action = true ) {
				if( $action ) {
					get_header();
					echo '<div class="template">';
				}else{
					echo '</div>';
					get_footer();
				}
			}
			public  function paging( $class = false, $template = 'paging', $query = false ) {
				global $post_type;
				if ( !$query ) { global $wp_query; $query = $wp_query; }
				$paging = thisThat(self::$setup['theme']['postTypes'][$post_type]['paging']);
				if ( $paging ) { $prev = $paging['prev']; $next = $paging['next']; }
				else{ $prev = 'Previous'; $next = 'Next'; }
				$big = 999999999; // need an unlikely integer
				if ( $query->max_num_pages > 1 ) get_template_file("templates/partials/$template", array( 'class' => $class, 'prev' => $prev, 'next' => $next, 'query' => $query, 'big' => $big ) );
			}
			public  function query_args( $query ) {
				// Stop if WP is working on anything but the main query
					if( !$query->is_main_query() || $query->is_single() == 1 || is_page() ) return;
				// Set Variables
					global $pxlSetup;
					$area = ( $query->is_admin == 1 ? 'admin' : 'site' );
					$post_types = $pxlSetup['theme']['postTypes'];
					$query_args = false;
				// Find the Post Type
					if ( $query->is_admin ) $post_type = thisThat($query->query_vars['post_type']);
					else if ( $query->is_home ) $post_type = 'post';
					else if ( $query->is_archive && isset($query->query_vars['post_type']) ) $post_type = $query->query_vars['post_type'];
				// If no Post Type return
					if ( !isset($post_type) ) return;
				// Lookup Arguments
					$find_query = thisThat($post_types[$post_type]['query']);
					if ( $find_query ) {
						if ( $area == 'admin' ) $query_args = thisThat($find_query[$area],false);
						else $query_args = thisThat($find_query[$area],$find_query);
					}
				// Set Arguments
					if ( $query_args ) foreach ($query_args as $key => $value) $query->set( $key, $value );
				return;
			}
			public  function query_vars_add( $qvars ){
				$qvars[] = 'mkey';
				return $qvars;
			}
			public  function responsive() {
				if( isset(self::$setup['support']['misc']['responsive']) && self::$setup['support']['misc']['responsive'] ) echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">';
			}
			public  function search_meta() {
				global $query_string, $wp_query;
				$params = array( 'for' => '' );
				$query_args = explode("&", $query_string);
				$search_query = array();
				
				foreach($query_args as $key => $string) {
					$query_split = explode("=", $string);
					$search_query[$query_split[0]] = urldecode($query_split[1]);
					if( $query_split[0] != 'post_type' ) $params['for'] .= "'$query_split[1]' ";
					// else $params['post_type'] = str_replace('-',' ',$query_split[1]);
				}
				
				$search = new WP_Query($search_query);
				$params['total_results'] = $wp_query->found_posts.' Result';
				// $params['total_results'] = $wp_query->found_posts.' '.ucwords($params['post_type']);
				if( $params['total_results'] > 1 ) $params['total_results'] .= 's';
				return $params;
			}
			public  function select_posts( $atts ) {
				$atts = shortcode_parse_atts($atts);
				$default = array(
					'author' => null,'cat' => null,'category_name' => null,'category__and' => null,'category__in' => null,'category__not_in' => null,'tag' => null,'tag_id' => null,'tag__and' => null,'tag__in' => null,'tag__not_in' => null,'tag_slug__and' => null,'tag_slug__in' => null,'tax_query' => null,'p' => null,'name' => null,'page_id' => null,'pagename' => null,'post_parent' => null,'post__in' => null,'post__not_in' => null,'type' => null,'post_status' => null,'show' => null,'posts_per_archive_page' => null,'nopaging' => null,'paged' => null,'offset' => null,'order' => null,'orderby' => null,'ignore_sticky_posts' => null,'year' => null,'monthnum' => null,'w' => null,'day' => null,'hour' => null,'minute' => null,'second' => null,'meta_key' => null,'meta_value' => null,'meta_value_num' => null,'meta_compare' => null,'meta_query' => null,'perm' => null,'cache_results' => null,'update_post_term_cache' => null,'update_post_meta_cache' => null,'fields' => null,'s' => null,'loop' => 'post','paging' => false,'notfound' => false
				);
				$params = shortcode_atts($default, $atts);
				$args = array();
				pxlShortcodes::build_queries( $atts, $args );
				foreach ($atts as $key => $value){
					$check = @unserialize($value);
					switch ($key) {
						case 'type': $args['post_type'] = ( $check !== false ? $check : $value ); break;
						case 'show': $args['posts_per_page'] = $value; break;
						default: $args[$key] = ( $check !== false ? $check : $value ); break;
					}
				}
				$pxl_query = get_posts( $args );
				$return = array();
				foreach ($pxl_query as $key => $item) {
					$return[$item->ID] = $item->post_title;
				}
				return $return;
			}
			/*
public  function timthumb( $image, $args = false, $size = 'medium', $title = '', $echo_url = false ) {
				$defaults = array( 'w' => 100 ,'h' => 100 ,'q' => 100 ,'a' => false ,'zc' => 0 ,'f' => false ,'s' => false ,'cc' => false ,'ct' => false, 'lp' => 'random', 'hd' => false );
				if ( $args ) $params = array_merge($defaults,$args);
				else $params = $defaults;
				if ( $image == 'post_thumbnail' ) {
					global $post;
					$thumb_id = get_post_thumbnail_id($post->ID);
					$image_meta = wp_get_attachment_image_src($thumb_id, $size);
					$url = $image_meta[0];
					$title = trim(strip_tags( get_the_title($thumb_id) ));
				}else $url = $image;
				
				if ( $url ) {
					$content_url = content_url();
					$url = get_image_path( $url );
					
					$img = '<img src="';
						$src = "$content_url/timthumb.php?src=$url";
						foreach ($params as $attr => $value) if ( $value && $attr != 'lp' ) $src .= "&$attr=$value";
						if( $params['hd'] ) {
							$params['w'] = $params['w'] / 2;
							$params['h'] = $params['h'] / 2;
						}
						$attrs = " alt=\"$title\" width=\"{$params['w']}\" height=\"{$params['h']}\"";
					$img .= "$src\" $attrs/>";
					
					$upload_dir = wp_upload_dir();
					$imageParts = explode('/', $url);
					$year = $imageParts[count($imageParts)-3];
					$month = $imageParts[count($imageParts)-2];
					$file = $imageParts[count($imageParts)-1];
					$abs = "{$upload_dir['basedir']}/$year/$month/$file";
					
					if ( file_exists($abs) ) {
						if ( $echo_url ) echo $src;
						else echo $img;
					}elseif( dev() ) self::lorempixel( $echo_url, $params['w'], $params['h'], $params['lp'] );
				}elseif( dev() ) self::lorempixel( $echo_url, $params['w'], $params['h'], $params['lp'] );
			}
*/
			public  function title() {
				if ( is_home() ) wp_title('');
				elseif( is_search() ) {
					$search_query = get_search_query();
					echo "Search: $search_query";
				}else the_title();
			}
			private function lorempixel( $echo_url, $width, $height, $lp ) {
				$categories = array('abstract' ,'animals' ,'city' ,'food' ,'nightlife' ,'fashion' ,'people' ,'nature' ,'sports' ,'technics' ,'transport');
				if ( $lp == 'random' ) $category = $categories[array_rand($categories,1)];
				else $category = $lp;
				$url = "http://lorempixel.com/$width/$height/$category";
				if ( $echo_url ) echo $url;
				else echo "<img src=\"$url\" width=\"$width\" height=\"$height\" />";
			}
			private function support_enable( $name, $args ) {
				switch ( $name ) {
					case 'bootstrap':
						include( FW_FUNCTIONS . '/class.bootstrap.php');
						new pxlBootstrap($args);
						break;
					case 'dashboard':
						add_action('wp_dashboard_setup', array('pxl','dashboard_widgets') );
						break;
					case 'filters':
						include( FW_FUNCTIONS . '/class.filters.php');
						break;
					case 'shortcodes':
						include( FW_FUNCTIONS . '/class.shortcodes.php');
						new pxlShortcodes( self::$setup );
						break;
					case 'taxmeta':
						include( FW_FUNCTIONS . '/class.taxonomy-meta.php');
						break;
					case 'twitter':
						include( FW_FUNCTIONS . '/class.twitter.php');
						new pxlTweet( self::$setup );
						break;
					case 'widget-shortcode':
						if (!is_admin()) add_filter('widget_text', 'do_shortcode', 11);
						break;
					default: break; // Responsive ends here because it is handeld differently
				}
			}
			private function support_fw() {
				$support_fw = self::$setup['theme'];
				
				// Unset Specific Items
					unset($support_fw['snippets']);
					unset($support_fw['widgets']);
					
				// Setup Query Action
					add_action( 'pre_get_posts', array( 'pxl', 'query_args' ) );
					
				// Include Core Files
					include( FW_FUNCTIONS . '/class.templates.php');
					
				// Include and Initiliaze Feature Code
					foreach($support_fw as $name => $args) {
						$pxl = 'pxl'.ucwords($name);
						if ( !empty($args) ) {
							include( FW_FUNCTIONS . '/class.'.$name.'.php' );
							new $pxl( self::$setup );
						} else if( $name == 'boxes' ){
							include( FW_FUNCTIONS . '/class.'.$name.'.php' );
							new $pxl( self::$setup );
						}
					}
			}
			private function support_wp() {
				$support_wp = self::$setup['support']['add_theme_support'];
				foreach ($support_wp as $name => $enable) {
					if ( $enable ) {
						if ( $name == 'post-formats' ) {
							$types = ( is_array($enable) ? $enable : array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );
							add_theme_support( $name, $types );
						}
						else add_theme_support( $name );
					}
				}
			}
		}
		new pxl;
	endif;
	if ( !class_exists('pxlWalker') ) :
		class pxlWalker extends Walker_Nav_Menu {
			function __construct() {
				add_filter('nav_menu_css_class', array(&$this,'add_parent_css'),10,2);
			}
			function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
				$GLOBALS['has_children'] = ( isset($children_elements[$element->ID]) )? 1:0;
				$GLOBALS['list_depth'] = (int) $depth;
				parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
			}
			public  function add_parent_css($classes, $item){
				global  $list_depth, $has_children;
				$classes[] = 'menu-depth-'.$list_depth;
				if($has_children)
					$classes[] = 'menu-item-parent';
				return $classes;
			}
		}
	endif;