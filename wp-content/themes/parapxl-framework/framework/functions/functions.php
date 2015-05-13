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

function custom_post_alumni() {
  $labels = array(
    'name'               => _x( 'Alumni', 'post type general name' ),
    'singular_name'      => _x( 'Alumni', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'book' ),
    'add_new_item'       => __( 'Add New Alumni' ),
    'edit_item'          => __( 'Edit Alumni' ),
    'new_item'           => __( 'New Alumni' ),
    'all_items'          => __( 'All Alumni' ),
    'view_item'          => __( 'View Alumni' ),
    'search_items'       => __( 'Search Alumni' ),
    'not_found'          => __( 'No Alumni found' ),
    'not_found_in_trash' => __( 'No Alumni found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Alumni'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Collection of SMG Alumni',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor' ),
    'has_archive'   => false,
  );
  register_post_type( 'alumni', $args ); 
}
add_action( 'init', 'custom_post_alumni' );


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
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
			$thumb_url = $thumb_url_array[0];
			
			?>
		
			<div class="portfolio opacity-0">
				<a href="<?php the_permalink() ?>">
					<div class="portfolio-image" style="background-image: url(<?php echo $thumb_url ?>)"></div>
					<div class="portfolio-title">
						<h3><?php the_title() ?></h3>
						<ul>
						<?php $terms = get_the_terms($post->id, 'medium');
							if ( !empty($terms) && !is_wp_error( $terms ) ) {
								foreach( $terms as $term ) {
									echo '<li>' . esc_html( $term->name ) . '</li>'; 
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