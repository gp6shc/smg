<?php
/**
 * PHP Functions
 *
 * @package Parapxl WP Framework
 * @subpackage Functions
 * @since 1.0
 */
	function alert( $msg ) {
		if ( dev() ) echo '<script>alert("'.$msg.'");</script>';
	} // Alerts message via JS
	function array_implode( $array, $join = '=', $sep = ' ', $wrap = '"' ) {
		$string = '';
		foreach ($array as $key => $value) {
			$string .= $key.$join.$wrap.$value.$wrap;
			if ( count($array) != $key+1 ) $string .= $sep;
		}
		return $string;
	}
	function array_insert( $array, $values, $offset ) {
	    return array_slice($array, 0, $offset, true) + $values + array_slice($array, $offset, NULL, true);  
	}
	function _bool( $var ){
		if( is_bool($var) ) return $var;
		else if( $var === NULL || $var === 'NULL' || $var === 'null' ) return false;
		else if( is_string($var) ) {
			$var = trim($var);
			if( $var == 'false' ) return false;
			else if( $var == 'true' ) return true;
			else if( $var == 'no' ) return false;
			else if( $var == 'yes' ) return true;
			else if( $var == 'off' ) return false;
			else if( $var == 'on' ) return true;
			else if( $var == '' ) return false;
			else if(ctype_digit($var)){
				if( (int) $var ) return true;
				else return false;
			} else return true;
		} else if( ctype_digit((string) $var) ){
			if( (int) $var ) return true;
			else return false;
		} else if( is_array($var) ){
			if( count($var) ) return true;
			else return false;
		} else if( is_object($var) ) return true;// No reason to (bool) an object, we assume OK for crazy logic
		else return true;// Whatever came though must be something,	OK for crazy logic
	}
	function clog( $msg ) {
		if ( dev() ) echo '<script>console.log("'.$msg.'");</script>';
	} // Print message to the console via JS
	function check_add( $check_for, $in, &$add_to ) {
		foreach ($check_for as $item)
			if ( isset($in[$item]) ) $add_to[$item] = $in[$item];
	} // Given an array of terms, look for those terms in another array, if found add their values to the referenced array
	function curl_get( $url ) {
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		$return = curl_exec($curl);
		curl_close($curl);
		return $return;
	} // Initiates cURL
	function cut_char( $string, $cut_by, $sep = '...' ) {
		$count = strlen($string);
		if ( $count > $cut_by ) $cut = substr($string,0,$cut_by).$sep;
		else $cut = $string;
		echo $cut;
	}
	function dev() {
		return ( $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ? true : false );
	} // Console Logging for the Development Environment
	/*
		TODO Reconcile find_file with find_file_location
	*/
	function find_file( $dir, $search, $prefix = false, $ext = 'php' ) {
		$found = false;
		if ( is_array($search) ) {
			foreach ($search as $item) {
				$files = array_reverse(split('-',$item));
				$count = count($files);
				foreach ($files as $key => $item){
					$file = $prefix;
					for ($i=$key+1; $i < count($files); $i++) {
						$file .= $files[$i];
						if( $i != count($files) ) $file .= '-';
					}
					$file .= $item;
					$path = $dir.$file.'.'.$ext;
					if ( !$found && file_exists($path) ) $found = $file;
				}
			}
		}else{
			$file = $dir.$search.'.'.$ext;
			if ( !$found && file_exists($file) ) $found = $search;
		}
		return $found;
	}
	function find_file_location( $paths, $files, $prefix = false, $ext = 'php' ) {
		$found = false;
		$locations = ( !is_array($paths) ? (array)$paths : $paths );
		$files = ( !is_array($files) ? (array)$files : $files );
		foreach ($locations as $location) {
			foreach ($files as $file) {
				$dir = ( !strpos($location,$ext) && ($ext === 'css' || $ext === 'js') ? '/'.$ext : false );
				$filename = $file.'.'.$ext;
				$path = $location.$dir.'/'.$filename;
				if ( !$found && file_exists($path) ) $found = $path;
			}
		}
		return $found;
	}
	function get_image_path ( $src ) {
		global $blog_id;
		if (is_multisite() && isset($blog_id) && $blog_id > 0) {
			$imageParts = explode('/files/', $src);
			if (isset($imageParts[1])) $theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
		}else $theImageSrc = $src;
		if ( isset($theImageSrc) && $theImageSrc ) return $theImageSrc;
		else return false;
	}
	function get_template_file( $filename, $vars = false, $echo = true ) {
		global $post;
		if ( $post ) $cfs = get_post_custom();
		if ( $vars ) extract($vars);
		$file = locate_template($filename.".php");
		if (is_file($file)) {
			ob_start();
			include $file;
			if ( $echo ) echo ob_get_clean();
			else return ob_get_clean();
		} else return false;
	}
	function isAssoc( $arr ) {
	    return array_keys($arr) !== range(0, count($arr) - 1);
	}
	function is_mobile() {
		/*
			TODO Re-write this function
		*/
		$mobile = array(
			"mobile_browser" => 0,
			"mobile_browser_tablet" => 0,
			"mobile_browser_smartphones" => 0,
			"mobile_browser_android" => 0
		);
		if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipod|android|blackberry|webos|windows (ce|phone)|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) $mobile["mobile_browser"]++;
		if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) $mobile["mobile_browser"]++;
		$mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
		$mobile_agents = array(
			'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
			'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
			'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
			'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
			'newt','noki','palm','pana','pant','phil','play','port','prox',
			'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
			'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
			'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
			'wapr','webc','winw','winw','xda ','xda-');
		if ( in_array($mobile_ua,$mobile_agents)
			|| (isset($_SERVER['ALL_HTTP']) && strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini') > 0)
			|| (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'BlackBerry9800') > 0)
			|| (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'Windows Phone OS 7.0') > 0)
			|| (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'Windows Phone OS') > 0)
		) $mobile["mobile_browser"]++;
		
		// Tablets
			if (preg_match('/(iPad|Xoom|PlayBook)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) $mobile["mobile_browser_tablet"]++;
		// Smartphones
			if (preg_match('/(ipod|iphone|android|webos)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) $mobile["mobile_browser_smartphones"]++;
		// Android
			if (preg_match('/(android)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) $mobile["mobile_browser_android"]++;
		return $mobile;
	} $mobile = is_mobile(); // Mobile Detect Script
	function isvar( &$var ) {
		if ( isset($var) && $var ) return true; else return false;
	} // Checks to see if a Variable is set and is true or not null
	function isnotset( &$var, $set ) {
		if ( !isset($var) ) $var = $set;
	}
	function listStates( $type = 'abbr' ) {
		$states = array(
			'AL'=>"Alabama", 'AK'=>"Alaska", 'AZ'=>"Arizona", 'AR'=>"Arkansas",
			'CA'=>"California", 'CO'=>"Colorado", 'CT'=>"Connecticut",
			'DE'=>"Delaware", 'DC'=>"District Of Columbia",
			'FL'=>"Florida",
			'GA'=>"Georgia",
			'HI'=>"Hawaii",
			'ID'=>"Idaho", 'IL'=>"Illinois", 'IN'=>"Indiana", 'IA'=>"Iowa",
			'KS'=>"Kansas", 'KY'=>"Kentucky",
			'LA'=>"Louisiana",
			'ME'=>"Maine", 'MD'=>"Maryland", 'MA'=>"Massachusetts", 'MI'=>"Michigan", 'MN'=>"Minnesota", 'MS'=>"Mississippi", 'MO'=>"Missouri", 'MT'=>"Montana",
			'NE'=>"Nebraska", 'NV'=>"Nevada", 'NH'=>"New Hampshire", 'NJ'=>"New Jersey", 'NM'=>"New Mexico", 'NY'=>"New York", 'NC'=>"North Carolina", 'ND'=>"North Dakota",
			'OH'=>"Ohio", 'OK'=>"Oklahoma", 'OR'=>"Oregon",
			'PA'=>"Pennsylvania",
			'RI'=>"Rhode Island",
			'SC'=>"South Carolina", 'SD'=>"South Dakota",
			'TN'=>"Tennessee", 'TX'=>"Texas",
			'UT'=>"Utah",
			'VT'=>"Vermont", 'VA'=>"Virginia",
			'WA'=>"Washington", 'WV'=>"West Virginia", 'WI'=>"Wisconsin", 'WY'=>"Wyoming"
		);
		if ( $type == 'abbr' ) return array_keys($states);
		else return array_values($states);
	}
	function nice( $print_nice, $style = 'display:block;background-color:#eee;padding:10px;' ) {
		if ( dev() ) {
			echo "<pre style='$style'>";
				print_r($print_nice);
			echo '</pre>';
		}
	} // Prints Strings/Arrays in a nice format
	function thisThat( &$this, $that = false ) {
		/*
			TODO Used in class.boxes.php for get_meta, see if we can decomishion this completely.
		*/
		return ( isset($this) && $this ? $this : $that );
	} // Returns This if it is set or retruns That
	function scan_dir( $dir ) {
		$files = scandir( $dir );
		foreach ($files as $key => $file) if ( strpos($file,'.') === 0 ) unset( $files[$key] );
		$output = array_values($files);
		return $output;
	}
	function url_get_contents ($Url) {
		if (!function_exists('curl_init')) die('CURL is not installed!');
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $Url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	} // This is an alternative to file_get_contents which does not work ons ecure hosting
	function user( $field = false, $single = true ) {
		global $current_user;
		get_currentuserinfo();
		if ( $field ) return get_user_meta($current_user->ID, $field, $single);
		else return $current_user;
	}
	function valArray( $key_name, array $array ) {
		$newArray = array();
		$returnValues = create_function( '$value, $key, $attr', 'if($key == $attr[\'match\'] && $value != "") array_push($attr[\'array\'],$value);');
		array_walk_recursive($array, $returnValues, array( 'match' => $key_name, 'array' => &$newArray));
		return $newArray;
	} // Returns an array of values from a multidimensional array for a given key
	
	
