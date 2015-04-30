<?php /* Template Name: About */ pxl::page(); while ( have_posts() ) : the_post(); ?>
<div class="row lined">
	<div id="sidebar" class="span3">
		<ul id="side">
			<li><a href="<?php echo home_url( '/about' ); ?>">About Us</a></li>
			<li class="">
				<a href="#">Our Team</a>
				<ul>
					<li class="group">Executive</li>
					<?php wp_nav_menu('menu=executive'); ?>
					<li class="group">Client/Creative</li>
					<?php wp_nav_menu('menu=client/creative'); ?>
					<li class="group">Administrative</li>
					<?php wp_nav_menu('menu=administrative'); ?>
				</ul>
			</li>
		</ul>
	</div>
	<div class="span9">
		<header>
			<h2>About Us <small>From the Ground Up</small></h2>
		</header>
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile; pxl::page(0); ?>