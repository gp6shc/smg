<?php
/**
 * pxlTweets
 * Allows you to display N tweets from a user's timeline, a group of users, or for a particular search query
 * @package Parapxl Framework
 * @subpackage Functions
 * @since 1.0
 */
	if ( !class_exists('pxlTweet') ) :
		class pxlTweet {
			private static $setup;
			function __construct() {
				global $pxlSetup;
				self::$setup = $pxlSetup;
				$pxlSetup['theme']['panel']['sections']['twitter'] = "Twitter Widget";
				$pxlSetup['theme']['panel']['fields']['twitter-usernames'] = array(
					 'section' => 'twitter'
					,'title'   => __( 'Twitter Usernames' )
					,'desc'    => __( 'Seperate by comma.' )
					,'type'    => 'text'
				);
				$pxlSetup['theme']['panel']['fields']['twitter-https'] = array(
					 'section' => 'twitter'
					,'title'   => __( 'Use HTTPs?' )
					,'desc'    => __( 'If you have an SSL certificate on your site set this to yes.' )
					,'type'    => 'select'
					,'std'     => 'no'
					,'choices' => array('no','yes')
				);
				$pxlSetup['theme']['panel']['fields']['twitter-cache'] = array(
					'section' => 'twitter'
					,'title'   => __( 'Cache for' )
					,'desc'    => __( 'How many minutes you would like to cache your tweets for.' )
					,'type'    => 'text'
				);
			}
			public  function user( $username = true, $limit = 3 ) {
				if ( $username === true ) $username = get_themeinfo('twitter-usernames');
				$search_for = str_replace(" ","",$username);
				self::search($search_for, $limit, false, 'api', '1/statuses/user_timeline');
			}
			public  function users( $usernames = true, $limit = 3, $result_type = 'mixed' ){
				if ( $usernames === true ) $usernames = get_themeinfo('twitter-usernames');
				$search_for = "from:".str_replace(",", "+OR+from:", str_replace(" ","",$usernames));
				self::search($search_for, $limit, $result_type);
			}
			public  function search( $search, $limit = 3, $result_type = 'mixed', $type = 'search', $json = 'search' ) {
				$id = hexdec(hash("adler32", $search));
				$time = hexdec(hash("adler32", 'time'));
				// Check the Cache
					$now = time();
					$wait = ( get_themeinfo('twitter-cache') ? (get_themeinfo('twitter-cache')*60) : 15*60 );
					$cached_on = get_option($id.$time);
					$elapsed = $now - $cached_on;
				// if ( $elapsed <= $wait ) {
				// if ( $elapsed == 0 ) {
				// 	$tweets = get_option($id);
				// 	echo unserialize(base64_decode($tweets));
				// }else{
					$search_for = rawurlencode($search);
					$https = thisThat(get_themeinfo('twitter-https'));
					if ( $https ) $https = 'https'; else $https = 'http';
					$feed = "$https://$type.twitter.com/$json.json";
					$from_user = 'from_user';
					$from_user_name = 'from_user_name';
					$image = ( $https ? 'profile_image_url_https' : 'profile_image_url' );
					switch ( $type ) {
						case 'api':
							$feed .= "?include_entities=true&include_rts=true&screen_name=$search_for&count=$limit";
							$from_user = 'screen_name';
							$from_user_name = 'name';
							$image = $image;
							break;
						case 'search': $feed .= "?include_entities=true&result_type=$result_type&q=$search_for&rpp=$limit"; break;
						default: break;
					}
					$tweets_get = json_decode(curl_get($feed));
					$tweets = array();
					if ( $type == 'search' ) $results = $tweets_get->results; else $results = $tweets_get;
					$results_count = count($results);
					if ( $result_type && $result_type == 'mixed' && $results_count > $limit ) $results = array_splice($results,$results_count-$limit);
					foreach ($results as $key => $tweet) {
						$text = $tweet->text;
						$entities = $tweet->entities;
						if ( isset($tweet->user) ) $tweet = $tweet->user;
						$tweets[$key] = array(
							'ago' => self::time_since($tweet->created_at),
							'date' => $tweet->created_at,
							'id' => $tweet->id,
							'image'.$https => $tweet->$image,
							'name' => $tweet->$from_user_name,
							'text' => $text,
							'username' => $tweet->$from_user,
						);
						$entities_keep = self::parse_entities($entities);
						if ( $entities_keep )  $tweets[$key]['entities'] = $entities_keep;
					}
					self::parse_feed($tweets, $id, $time);
				// }
			}
			private function parse_feed( $tweets, $id, $time ) {
				$output = '';
				foreach ($tweets as $tweet) {
					self::parse_message( $tweet );
					$output .= get_template_file('/templates/partials/tweet', array( 'tweet' => $tweet ), false);
				}
				$store = base64_encode(serialize($output));
				update_option($id, $store);
				update_option($id.$time, time());
				echo $output;
			}
			private function parse_message( &$tweet ) {
				$replace_index = array();
				if ( !empty($tweet['entities']) ) {
					foreach ($tweet['entities'] as $area => $items) {
						switch ( $area ) {
							case 'hashtags':
								$find = 'text';
								$prefix = '#';
								$url = 'https://twitter.com/search/?src=hash&q=%23';
								break;
							case 'user_mentions':
								$find = 'screen_name';
								$prefix = '@';
								$url = 'https://twitter.com/';
								break;
							case 'media':
								$find = 'display_url';
								$prefix = '';
								$url = '';
								break;
							case 'urls':
								$find = 'display_url';
								$prefix = '';
								$url = "expanded_url";
								break;
							default: break;
						}
						foreach ($items as $item) {
							$text = $tweet['text'];
							$string = $item->$find;
							if ( $url == 'expanded_url' ) $href = $item->$url;
							else $href = $url.$string;
							if (!(strpos($href, 'http://') === 0)) $href = "http://".$href;
							$replace = substr($text,$item->indices[0],$item->indices[1]-$item->indices[0]);
							$with = "<a href=\"$href\">{$prefix}{$string}</a>";
							$replace_index[$replace] = $with;
						}
					}
					foreach ($replace_index as $replace => $with) $tweet['text'] = str_replace($replace,$with,$tweet['text']);
				}
			}
			private function parse_entities( $entity ) {
				$entities_keep = array();
				foreach ($entity as $item => $params) if( !empty($params) ) $entities_keep[$item] = $params;
				if ( !empty($entities_keep) ) return $entities_keep;
				else return false;
			}
			private function time_since( $original ) {
				if ( getType($original) == "string") $original = strtotime($original);
				$chunks = array(
					 array(60 * 60 * 24 * 365 , 'year')
					,array(60 * 60 * 24 * 30 , 'month')
					,array(60 * 60 * 24 * 7, 'week')
					,array(60 * 60 * 24 , 'day')
					,array(60 * 60 , 'hour')
					,array(60 , 'minute')
					,array(1 , 'sec')
				);
				$today = time(); /* Current unix time  */
				$since = $today - $original;
				$time = '';
				// $j saves performing the count function each time around the loop
				for ($i = 0, $j = count($chunks); $i < $j; $i++) {
					$time_chunk = $chunks[$i][0];
					$name = $chunks[$i][1];
					if (($count = floor($since / $time_chunk)) != 0) { $time = $time_chunk; break; }
				}
				if($count > 24 && $time != "60") return date('l M j \- g:ia',$original);
				else{
					$print = ($count == 1) ? '1 '.$name : "$count {$name}s";
					if ($i + 1 < $j && $count < 1) {
						// now getting the second item
						$seconds2 = $chunks[$i + 1][0];
						$name2 = $chunks[$i + 1][1];
						// add second item if its greater than 0
						if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) {
							$print .= ($count2 == 1) ? ', 1 '.$name2 : " $count2 {$name2}s";
						}
					}
					$print = $print . ' ago';
					return $print;
				}
			}
		}
	endif;