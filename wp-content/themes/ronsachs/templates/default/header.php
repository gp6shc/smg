<header id="primary">
	<div class="wrapper">
		<a class="brand" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('title'); ?>">
			<h1><?php bloginfo('title'); ?></h1>
		</a>
		<div class="navs">
			<nav id="social">
			<ul>
		    <li id="menu-item-194" class="facebook menu-item menu-item-type-custom menu-item-object-custom menu-item-194"><a title="LIKE us on Facebook" href="http://www.facebook.com/sachsmedia">Facebook</a></li>
			<li id="menu-item-7" class="twitter menu-item menu-item-type-custom menu-item-object-custom menu-item-7"><a title="Follow us on Twitter" href="http://www.twitter.com/sachsmediagrp">Twitter</a></li>
			<li id="menu-item-5" class="youtube menu-item menu-item-type-custom menu-item-object-custom menu-item-5"><a title="Visit us on Youtube" href="http://www.youtube.com/user/SachsMedia/">YouTube</a></li>
			</ul>
				<!--<ul>
					<?php wp_nav_menu( array(
						'theme_location'  => 'social',
						'container'       => false,
						'echo'            => true,
						'fallback_cb'     => false,
						'items_wrap'      => '%3$s',
						'depth'           => 0
					) ); ?>
				</ul>-->
			</nav>
			<nav id="menu">
			<ul>
				<li class="active"><a href="<?php echo home_url()?>">Home</a></li>
	            <li><a href="<?php echo home_url('/about')?>">About</a></li>
	            <li><a href="<?php echo home_url('/what-we-do')?>">What We Do</a></li>
	            <li><a href="<?php echo home_url('/blog')?>">Blog</a></li>
	            <li><a href="<?php echo home_url('/news')?>">News</a></li>
	            <li><a href="<?php echo home_url('/contact')?>">Contact</a></li>
			</ul>
				<!--<ul>
					<?php wp_nav_menu( array(
						'theme_location'  => 'main',
						'container'       => false,
						'echo'            => true,
						'fallback_cb'     => false,
						'items_wrap'      => '%3$s',
						'depth'           => 0
					) ); ?>
				</ul>-->
			</nav>
		</div>
	</div>
</header>
<div id="container" class="wrapper">
	<div id="banner" style="background: url('<?php the_field('header_image', 'options') ?>') repeat-x 0 0;">
	<?php if ( is_front_page() ) : $home = get_page_by_title('Home'); ?>
		<div id="slideshow" class="rsDefault">
		<?php if (get_field('slides',$home->ID)) : ?>
			<?php $slides = get_field('slides',$home->ID); foreach ($slides as $slide): ?>
			<div class="slide">
			<?php
				if ($slide['link_internal']) : echo '<a href="'.$slide['link_internal'].'"><img src="'.$slide['image'].'" width="1010" height="422"></a>';
				elseif ($slide['link_external']) : echo '<a href="'.$slide['link_external'].'" target="_blank"><img src="'.$slide['image'].'" width="1010" height="422"></a>';
				endif;
			?>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
	<?php elseif ( is_home() ||  is_singular(array('post')) ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_whatwedo_grey.jpg' ); ?>') repeat-x 0 	0;">
		<div class="text">
			<h2 class="red"><span>Blog</span></h2>
		</div>
	</div>
	<?php elseif ( is_404() ) : ?>
		<div class="text">
			<h2 class="red"><span>Page Not Found: 404</span></h2>
		</div>
	<?php elseif ( is_page(594) || $post->post_parent == '594' ) : // if is 'team' & all children of it ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2014/08/SMG_Team.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>Team</span></h2>
		</div>
	</div>
	<?php elseif ( is_page( array( 45 ) )  ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2014/08/SMG_AboutUs.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>About Us</span></h2>
		</div>
	</div>
	<?php elseif ( is_page( array( 46 ) )  ) : ?>
		<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_contact.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>Contact Us</span></h2>
		</div>
	</div>
	<?php elseif ( is_page( array( 449, 477, 481, 483, 485, 488,  ) )  ) : ?>
		<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_whatwedo_grey.jpg' ); ?>') repeat-x 0 	0;">
		<div class="text">
			<h2 class="red"><span>What We Do</span></h2>
		</div>
	</div>
	<?php elseif ( is_singular(array('news')) ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_whatwedo-1.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>News</span></h2>
		</div>
	</div>
	<?php elseif ( is_page(474)  ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2014/02/pageheader_publicaffairs.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<!--<h2 class="red"><span>News</span></h2>-->
		</div>
	</div>
	<?php elseif ( is_search() ) : ?>
	<div id="banner" style="background: url('<?php echo home_url( 'wp-content/uploads/2013/02/pageheader_whatwedo-1.jpg' ); ?>') repeat-x 0 0;">
		<div class="text">
			<h2 class="red"><span>Search</span></h2>
		</div>
	</div>
	<?php elseif ( is_singular(array('work')) || is_post_type_archive('work') || is_tax('medium') ) : ?>
		<div class="text">
			<h2 class="red"><span>Design Portfolio</span></h2>
		</div>
	<?php elseif ( is_post_type_archive() ) : ?>
		<div class="text">
			<h2 class="red"><span><?php post_type_archive_title(); ?></span></h2>
		</div>
	<?php else : ?>
		<div class="text">
			<h2 class="red"><span><?php single_post_title(); ?></span></h2>
		</div>
	<?php endif; ?>
		<div class="shadow bottom"></div>
	</div>
	