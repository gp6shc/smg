<?php
/**
 * Resources
 * Used to register and enqueue css styles and js scripts
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 * @todo Set ASYNC, DEFER and Load Bottom to True by default
 */
	if ( !class_exists('pxlResources') ) :
		class pxlResources {
			private static $setup;
			function __construct() {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				// Register Resources
					if( is_admin() ) add_action('admin_enqueue_scripts', array( &$this, 'admin' ));
					else add_action( 'wp_enqueue_scripts', array( &$this, 'theme' ) );
				// Add Defer
					add_filter( 'clean_url', array( &$this, 'add_defer_async' ), 11, 1 );
			}
			function admin() {
				/*
					TODO FIX this to use enqueue function
				*/
				$register = array();
				$dirs = array(
					'css' => scan_dir(FW_RESOURCES.'/css'),
					'js' => scan_dir(FW_RESOURCES.'/js'),
				);
				foreach ($dirs as $dir => $files) {
					foreach ($files as $file) {
						$part = split('\.',$file);
						$register[$dir][$part[0]] = true;
					}
				} // Find all Files
				foreach ($register as $ext => $files) {
					foreach ($files as $file => $args)
						self::register( $ext, $file, $args, array(CHILD_PATH,FW_RESOURCES) );
				} // Register all Files
				// Enable Classes for Admin Panels
					add_filter('admin_body_class', array('pxlResources','body_class'));
				// Enqueue Admin Files
					wp_enqueue_script( 'admin' );
					wp_enqueue_style( 'admin' );
			}
			function theme() {
				if ( !is_admin() ) {
					wp_deregister_script('jquery');
					wp_register_script('jquery', '/wp-includes/js/jquery/jquery.js', false, false, false);
				}
				$registered = array( 'css' => array(), 'js' => array() );
				foreach (self::$setup['theme']['resources'] as $ext => $files){
					foreach ($files as $file => $args){
						if( $file != 'admin' ) {
							array_push($registered[$ext],self::register( $ext, $file, $args ));
						}
					}
				}
				/*
					TODO Figure out how to hook templates in sooner to be able to enqueue scripts on the fly.
				*/
				self::enqueue($registered);
			}
			function body_class($classes) {
				global $post, $post_type;
				$mode = '';
				$uri = $_SERVER["REQUEST_URI"];
				if (strstr($uri,'edit.php')) $mode = 'edit-list-';
				elseif (strstr($uri,'post.php')) $mode = 'edit-post-';
				elseif (strstr($uri,'post-new.php')) $mode = 'edit-post-';
				$classes .= $mode . $post_type;
				return $classes;
			}
			private function register( $ext, $file, $args, $dir = false ) {
				if ( $ext == 'fonts' ) wp_register_style( $file, "http://fonts.googleapis.com/css?family=$file:$args" );
				else if ( $args ) {
					$handle = ( isset($args['handle']) ? $args['handle'] : $file );
					if ( $dir ) $paths = $dir;
					else if( isset($args['src']) ) $paths = array(get_stylesheet_directory().'/'.$args['src'],get_template_directory().'/'.$args['src']);
					else $paths = ( CHILD_PATH ? array(CHILD_PATH,PARENT_PATH) : PARENT_PATH );
					$src = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']),'http://'.$_SERVER['SERVER_NAME'],strtolower(find_file_location( $paths, $file, false, $ext )));
					$deps = ( isset($args['deps']) ? $args['deps'] : false );
					$ver = ( isset($args['ver']) ? $args['ver'] : false );
					$type = ( $ext === 'js' ? 'script' : 'style' );
					if ( $ext === 'js' ) $last = ( isset($args['in_footer']) ? $args['in_footer'] : true );
					else $last = ( isset($args['media']) ? $args['media'] : 'all' );
					$run = 'wp_register_'.$type;
					$run( $handle, $src, $deps, $ver, $last );
					if ( isset($args['localize']) ) wp_localize_script( $handle, $handle, array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
					return $handle;
				}
			}
			private function enqueue( $resources ){
				foreach($resources as $ext => $files) {
					foreach($files as $file) {
						$fn = "wp_enqueue_".( $ext == 'css' ? 'style' : 'script');
						$fn($file);
					}
				}
			}
			public  function add_defer_async( $url ) {
				if ( FALSE === strpos( $url, '.js' ) ) return $url; // not a js file
				preg_match('/js\/(\S*)\.js/',$url,$filename);
				$add = false;
				if ( isset($filename[1]) ) {
					$async = ( isset(self::$setup['theme']['resources']['js'][$filename[1]]['async']) ? self::$setup['theme']['resources']['js'][$filename[1]]['async'] : false );
					$defer = ( isset(self::$setup['theme']['resources']['js'][$filename[1]]['defer']) ? self::$setup['theme']['resources']['js'][$filename[1]]['defer'] : false );
					if ( $async || $filename[1] == 'jquery' ) $add .= 'async=\'async';
					if ( $defer || $filename[1] == 'jquery' ) {
						if ( $add ) $add .= '\' ';
						$add .= 'defer=\'defer';
					}
					return "$url' $add";
				}else return $url;
			}
		}
	endif;