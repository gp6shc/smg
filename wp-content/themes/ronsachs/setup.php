<?php
	$pxlSetup = array(
		'support' => array(
			'admin-bar' => array(
				'display' => true,
				'style' => "border-bottom:10px solid red;",
			), // Not implemented yet.
			'add_theme_support' => array(
				'automatic-feed-links' => true,
				'custom-background' => false,
				'custom-header' => false,
				'post-formats' => false,
				'post-thumbnails' => true,
			),
			'misc' => array(
				'shortcodes' => true,
				'twitter' => true,
				'widget-shortcode' => false,
			)
		),
		'theme' => array(
			'boxes' => array(
			),
			'menus' => array(
				'main' => 'Main',
				'social' => 'Social',
				'our-work' => 'Our Work',
			),
			'panel' => array(
				'sections' => array(
					 'general' => false
					,'appearance' => false
					,'social' => true
					// ,'twitter' => "Twitter Widget"
					,'about' => false
					,'reset' => false
				)
				,'fields' => array(
					'twitter-username' => array(
						 'section' => 'social'
						,'title'   => __( 'Twitter Username' )
						,'desc'    => __( '' )
						,'type'    => 'text'
					)
					// ,'twitter-usernames' => array(
					// 	 'section' => 'twitter'
					// 	,'title'   => __( 'Twitter Usernames' )
					// 	,'desc'    => __( 'Seperate by comma.' )
					// 	,'type'    => 'text'
					// )
					// ,'twitter-https' => array(
					// 	 'section' => 'twitter'
					// 	,'title'   => __( 'Use HTTPs?' )
					// 	,'desc'    => __( 'If you have an SSL certificate on your site set this to yes.' )
					// 	,'type'    => 'select'
					// 	,'std'     => 'no'
					// 	,'choices' => array('no','yes')
					// )
					// ,'twitter-cache' => array(
					// 	'section' => 'twitter'
					// 	,'title'   => __( 'Cache for' )
					// 	,'desc'    => __( 'How many minutes you would like to cache your tweets for.' )
					// 	,'type'    => 'text'
					// )
				)
			),
			'postTypes' => array(
				'page' => array(
					'supports' => 'excerpt',
				),
				'post' => array(
				),
				'news' => array(
					'icon' => 'newspaper',
					'supports' => 'title, editor, author, thumbnail',
					'labels' => 'news,news articles',
					'rewrite' => array('slug' => 'news', 'with_front' => false),
				),
				'work' => array(
					'icon' => 'content',
					'supports' => 'title, editor, author, thumbnail',
					'rewrite' => array('slug' => 'our-work', 'with_front' => false),
				)
			),
			'sidebars' => array(
				'side' => array(
					'name' => 'Sidebar',
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h3 class="widgettitle">',
					'after_title'   => '</h3>'
				)
			),
			'snippets' => array(
				'location' => 'pxl_display_location',
			),
			'taxonomies' => array(
				'medium' => array( 'postTypes' => array('work') ),
			),
			'profile' => array(
				'url' => 'staff',
			),
		),
	);
	
	function my_acf_options_page_title( $title ) {
		$title = "General";
		return $title;
	}
	add_filter('acf_options_page_title', 'my_acf_options_page_title');