<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<title><?php pxl::head_title(); ?></title>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="initial-scale=1">
	    <meta name="author" content="<?php echo bloginfo('name'); ?>">
		<meta name="description" content="<?php echo bloginfo('name'); ?>">
		<meta property="twitter:account_id" content="68730054" />
		<link rel="stylesheet" id="theme-css"  href="<?php bloginfo('stylesheet_directory')?>/resources/css/style.css" type="text/css" media="all" />
		<link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>

		<?php pxl::responsive(); ?>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/resources/images/icons/favicon.ico" />

		<?php wp_head(); ?>
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
		<script type="text/javascript"> var _ss = _ss || []; _ss.push(['_setAccount', 'KOI-BGI58S']); _ss.push(['_trackPageView']); (function() { var ss = document.createElement('script'); ss.type = 'text/javascript'; ss.async = true; ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-4UXZO.sharpspring.com/client/ss.js?ver=1.1.1'; var scr = document.getElementsByTagName('script')[0]; scr.parentNode.insertBefore(ss, scr); })();
		</script>
		<script>(function(){
			window._fbds = window._fbds || {};
				_fbds.pixelId = 1392381684358712;
				var fbds = document.createElement('script');
				fbds.async = true;
				fbds.src = '//connect.facebook.net/en_US/fbds.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(fbds, s);
			})();
			window._fbq = window._fbq || [];
			window._fbq.push(["track", "PixelInitialized", {}]);
</script>
<noscript><img height="1" width="1" border="0" alt="" style="display:none" src="https://www.facebook.com/tr?id=1392381684358712&amp;ev=NoScript" /></noscript>
	</head>
	<body <?php body_class(); ?>>
		<?php get_template_part('templates/default/header'); ?>