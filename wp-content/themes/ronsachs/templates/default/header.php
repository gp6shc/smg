<header id="primary">
	<div class="wrapper">
		<a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>">
			<h1><?php bloginfo('title'); ?></h1>
		</a>
		<div class="navs">
			<nav id="social">
				<a title="Like us on Facebook" href="http://www.facebook.com/sachsmedia"><i class="icon icon-facebook"></i></a>
				<a title="Follow us on Twitter" href="http://www.twitter.com/sachsmediagrp"><i class="icon icon-twitter"></i></a>
				<a title="Subscribe to us on Youtube" href="http://www.youtube.com/user/SachsMedia/"><i class="icon icon-youtube"></i></a>
			</nav>
			<nav id="menu">
				<ul>
					<li><a href="<?php echo home_url()?>">Home</a></li>
		            <li><a href="<?php echo home_url('/about')?>">About</a></li>
		            <li><a href="<?php echo home_url('/what-we-do')?>">What We Do</a></li>
		            <li><a href="<?php echo home_url('/blog')?>">Blog</a></li>
		            <li><a href="<?php echo home_url('/news')?>">News</a></li>
		            <li><a href="<?php echo home_url('/contact')?>">Contact</a></li>
				</ul>
			</nav>
		</div>
	</div>
</header>
<div id="container" class="wrapper">
	<?php if ( is_front_page() ) : 
		$slides = get_fields($page->ID);
		$numberOfSlides = count($slides) / 2; ?>
		
		<div class="dummy-wrapper"><!-- dummy for drop shadow -->
			<div id="slideshow">
			<?php for ($i = 1; $i <= $numberOfSlides; $i++):
					$link = 'slide_link_'.$i; 
					$image = 'slide_image_'.$i; ?>
				
					<a href="<?= $slides[$link]?>"><img src="<?= $slides[$image]?>" width="1010" height="422"/></a>
			<?php endfor; ?>
		</div>
	<?php elseif ( is_home() ||  is_singular(array('post')) ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_whatwedo_grey.jpg' ); ?>') repeat-x 0 	0;">
		<div class="text">
			<h2 class="red"><span>Blog</span></h2>
		</div>
	<?php elseif ( is_404() ) : ?>
	<div id="banner" style="background: url('<?php the_field('header_image', 'options') ?>') repeat-x 0 0;">	
		<div class="text">
			<h2 class="red"><span>Page Not Found: 404</span></h2>
		</div>
	<?php elseif ( is_page(594) || $post->post_parent == '594' ) : // if is 'team' & all children of it ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2014/08/SMG_Team.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>Team</span></h2>
		</div>
	<?php elseif ( is_page( array( 45 ) )  ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_whatwedo_grey.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>About Us</span></h2>
		</div>
	<?php elseif ( is_page( array( 46 ) )  ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_contact.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>Contact Us</span></h2>
		</div>
	<?php elseif ( is_page( array( 449, 477, 481, 483, 485, 488,  ) )  ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_whatwedo_grey.jpg' ); ?>') repeat-x 0 	0;">
		<div class="text">
			<h2 class="red"><span>What We Do</span></h2>
		</div>
	<?php elseif ( is_singular(array('news')) ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_whatwedo-1.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>News</span></h2>
		</div>
	<?php elseif ( is_page(474)  ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2014/02/pageheader_publicaffairs.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<!--<h2 class="red"><span>News</span></h2>-->
		</div>
	<?php elseif ( is_search() ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_whatwedo-1.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>Search</span></h2>
		</div>
	<?php elseif ( is_singular(array('work')) || is_post_type_archive('work') || is_tax('medium') ) : ?>
	<div id="banner" style="background: url('<?php the_field('header_image', 'options') ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>Our Work</span></h2>
		</div>
	<?php elseif ( is_post_type_archive() ) : ?>
	<div id="banner" style="background: url('<?php the_field('header_image', 'options') ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span><?php post_type_archive_title(); ?></span></h2>
		</div>
	<?php elseif (is_page_template( array('templates/page-anniversary-people.php','templates/page-anniversary-comm.php','templates/page-anniversary-issues.php') )) : ?>
		<!-- Anniversary Pages-->
		<div>
	<?php else : ?>
	<div id="banner" style="background: url('<?php the_field('header_image', 'options') ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span><?php single_post_title(); ?></span></h2>
		</div>
	<?php endif; ?>
		<div class="shadow bottom"></div>
	</div>	