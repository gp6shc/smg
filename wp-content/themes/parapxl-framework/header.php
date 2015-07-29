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
		<meta property="fb:app_id" content="712207672128635"/>
		
		<link rel="stylesheet" id="theme-css"  href="<?php echo home_url();?>/wp-content/themes/ronsachs/resources/css/themev2.css" type="text/css" media="all" />
		<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/resources/images/icons/favicon.ico" />

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="<?= home_url();?>/wp-content/plugins/gravityforms/js/gravityforms.min.js"></script>
		<script src="<?= home_url();?>/wp-content/plugins/gravity-forms-no-captcha-recaptcha/public/js/gf-no-captcha-recaptcha-public.js"></script>
	</head>

	<body <?php body_class(); ?>>
		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KRHVFT"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KRHVFT');</script>
		<!-- End Google Tag Manager -->
		
		<?php get_template_part('templates/default/header'); ?>