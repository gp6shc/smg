<?php
/**
 * WP Theme Functions
 *
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 */

/* Define Paths */
	define('FW_FUNCTIONS', get_template_directory() . '/framework/functions' );
	define('FW_RESOURCES', get_template_directory().'/framework/resources' );
	define('FW_RESOURCES_PATH', get_template_directory_uri().'/framework/resources' );
	define('RESOURCES', '/resources' );
	define('PARENT_PATH', get_template_directory().RESOURCES);
	if ( get_template_directory() === get_stylesheet_directory() ) define('CHILD_PATH', false);
	else define('CHILD_PATH', get_stylesheet_directory() . RESOURCES);
	define('TEMPLATES', get_stylesheet_directory() . '/templates' );
	
	function jquery_dump() {
		if (!is_admin()) {
			wp_deregister_script('jquery');
		}
	}
	add_action('init', 'jquery_dump');
	
/* Query Helper */
	$pxl_query = false;
	
/* PHP Helper Functions */
	include( FW_FUNCTIONS . '/phpfn.php' );
	include( FW_FUNCTIONS . '/class.formcast.php' );
	
/* Theme Setup */
	include( get_stylesheet_directory() . '/setup.php' );
	
// Framework
	include( FW_FUNCTIONS . '/class.pxl.php');
// Custom admin login 
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url(http://sachsmedia.com/rockheaven/assets/images/smg_logo.png) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');

function the_title_limit($length, $replacer = '...') {
	$string = the_title('','',FALSE);
	if(strlen($string) > $length)
	$string = (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;
	echo $string;
}

function wp_character_excerpt($limit, $readMore) {
	$excerpt = strip_tags( get_the_content() );
	$length = strlen($excerpt);
	
	if ($length <= $limit) {
		return $excerpt;
	}else{
		$excerpt = substr($excerpt, 0, $limit);		
		if ($readMore) {
			echo $excerpt . '… <span>Read More »</span>'; 
		}else{
			echo $excerpt . '…'; 
		}
	}	
}

function custom_post_people() {
  $labels = array(
    'name'               => _x( 'People', 'post type general name' ),
    'singular_name'      => _x( 'People', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New People' ),
    'edit_item'          => __( 'Edit People' ),
    'new_item'           => __( 'New People' ),
    'all_items'          => __( 'People' ),
    'view_item'          => __( 'View People' ),
    'search_items'       => __( 'Search People' ),
    'not_found'          => __( 'No People found' ),
    'not_found_in_trash' => __( 'No People found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'People',
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Collection of SMG People',
    'public'        => true,
    'menu_position' => 5,
    'show_in_menu'	=> 'anniversary',
    'menu_icon'		=> 'dashicons-welcome-learn-more',
    'supports'      => array( 'title', 'editor' ),
    'has_archive'   => false,
  );
  register_post_type( 'alumni', $args ); 
}
add_action( 'init', 'custom_post_people' );

function custom_post_issues() {
  $labels = array(
    'name'               => _x( 'Issue', 'post type general name' ),
    'singular_name'      => _x( 'Issue', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Issue' ),
    'edit_item'          => __( 'Edit Issue' ),
    'new_item'           => __( 'New Issue' ),
    'all_items'          => __( 'Issues' ),
    'view_item'          => __( 'View Issue' ),
    'search_items'       => __( 'Search Issues' ),
    'not_found'          => __( 'No Issues found' ),
    'not_found_in_trash' => __( 'No Issues found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Issues',
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Collection of SMG Issues',
    'public'        => true,
    'menu_position' => 10,
    'show_in_menu'	=> 'anniversary',
    'menu_icon'		=> 'dashicons-welcome-learn-more',
    'supports'      => array( 'title', 'editor' ),
    'has_archive'   => false,
  );
  register_post_type( 'issues', $args ); 
}
add_action( 'init', 'custom_post_issues' );

function custom_post_community() {
  $labels = array(
    'name'               => _x( 'Community', 'post type general name' ),
    'singular_name'      => _x( 'Community', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Community' ),
    'edit_item'          => __( 'Edit Community' ),
    'new_item'           => __( 'New Community' ),
    'all_items'          => __( 'Communities' ),
    'view_item'          => __( 'View Community' ),
    'search_items'       => __( 'Search Communities' ),
    'not_found'          => __( 'No Communities found' ),
    'not_found_in_trash' => __( 'No Communities found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Communities',
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Collection of SMG Communities',
    'public'        => true,
    'menu_position' => 10,
    'show_in_menu'	=> 'anniversary',
    'menu_icon'		=> 'dashicons-welcome-learn-more',
    'supports'      => array( 'title', 'editor' ),
    'has_archive'   => false,
  );
  register_post_type( 'communities', $args ); 
}
add_action( 'init', 'custom_post_community' );

function display_anniv_page() {
	$output = "<h1>"
			. "Anniversary"
			. "</h1>"
	;
	
	echo $output;
}

function add_anniversary_menu_page() {
	add_menu_page( 'Anniversary', 'Anniversary', 'manage_options', 'anniversary', 'display_anniv_page', 'dashicons-editor-textcolor' , 6 );
}
add_action( 'admin_menu', 'add_anniversary_menu_page' );

//Design Portfolio
function customize_output($results , $arg, $id, $getdata ){
	// The Query
	$apiclass = new uwpqsfprocess();
	$query = new WP_Query( $arg );
	ob_start();	
	$result = '';

	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) :
			$query->the_post();
			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
			$thumb_url = $thumb_url_array[0];
			
			?>
		
			<div class="portfolio opacity-0">
				<a href="<?php the_permalink() ?>">
					<div class="portfolio-image" style="background-image: url(<?php echo $thumb_url ?>)"></div>
					<div class="portfolio-title">
						<h3><?php the_title() ?></h3>
						<ul class="medium-list">
						<?php $terms = get_the_terms($post->id, 'medium');
							if ( !empty($terms) && !is_wp_error( $terms ) ) {
								foreach( $terms as $term ) {
									if ($term->name === "PR") {
										echo '<li>Public Relations</li>';
									}elseif ($term->name === "PA") {
										echo '<li>Public Affairs</li>';
									}else{
										echo '<li>' . esc_html( $term->name ) . '</li>'; 
									}
								}
							}else{
								echo '<li></li>'; 
							}
						?>
						</ul>
					</div>
				</a>	
			</div>
	<?php endwhile;
		echo  $apiclass->ajax_pagination($arg['paged'],$query->max_num_pages, 2, $id, $getdata);
	}
	/* Restore original Post Data */
	
	wp_reset_postdata();
	$results = ob_get_clean();		
	return $results;
}
add_filter('uwpqsf_result_tempt', 'customize_output', '', 4);

// Get the home url for shortcode use
function home_url_shortcode() {
	return get_home_url();
} 
add_shortcode('home-url','home_url_shortcode');

?>