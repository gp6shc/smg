<?php /* Template Name: What We Do(landing) */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row lined">
	<div id="sidebar" class="span3">
		<?php wp_nav_menu('menu=what-we-do&container=&menu_id=side&menu_class=no-margin'); ?>
<br />

	<?php if ( !dynamic_sidebar('Sidebar') ) : ?>
	<?php endif; ?>
	
	</div>
	<div class="span9">
		<header>
			<h2>Our Approach <small>carefully crafted</small></h2>
		</header>
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile; pxl::page(0); ?>


		