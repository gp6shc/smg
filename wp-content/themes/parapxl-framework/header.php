<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
		<title><?php wp_title( '|', true, 'right' ); ?>Sachs Media Group</title>
		
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=1130">
	    <meta name="author" content="<?php echo bloginfo('name'); ?>">
		<meta property="twitter:account_id" content="68730054" />
		
		<meta property="og:title" content="<?php the_title()?>"/>
		<meta property="og:site_name" content="Sachs Media Group"/>
		<meta property="og:url" content="<?php the_permalink()?>"/>
		<!-- <meta property="fb:app_id" content="" /> -->
		
		<link rel="stylesheet" id="royalslider-css"  href="<?php echo home_url();?>/wp-content/themes/ronsachs/resources/css/royalslider.css" type="text/css" media="all" />
		<link rel="stylesheet" id="rs-default-css"  href="<?php echo home_url();?>/wp-content/themes/ronsachs/resources/css/rs-default.css" type="text/css" media="all" />
		<link rel="stylesheet" id="theme-css"  href="<?php echo home_url();?>/wp-content/themes/ronsachs/resources/css/theme.css" type="text/css" media="all" />

		<?php pxl::responsive(); ?>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/resources/images/icons/favicon.ico" />
		<?php wp_head();?>
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script type="text/javascript"> var _ss = _ss || []; _ss.push(['_setAccount', 'KOI-BGI58S']); _ss.push(['_trackPageView']); (function() { var ss = document.createElement('script'); ss.type = 'text/javascript'; ss.async = true; ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-4UXZO.sharpspring.com/client/ss.js?ver=1.1.1'; var scr = document.getElementsByTagName('script')[0]; scr.parentNode.insertBefore(ss, scr); })(); </script>
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