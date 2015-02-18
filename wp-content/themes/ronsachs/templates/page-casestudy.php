<?php /* Template Name: Indiv Case Study */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row lined">
	<div id="sidebar" class="span3">
		<?php wp_nav_menu('menu=what-we-do&container=&menu_id=side&menu_class=no-margin'); ?>
<br />

	<?php if ( !dynamic_sidebar('Sidebar') ) : ?>
	<?php endif; ?>
	
	</div>
	<div class="span9">

			<h3 class="whatwedo">Case Study: <?php echo get_the_title(); ?></h3>

		<div class="post" style="padding-top: 10px;"><?php pxl::timthumb( 'post_thumbnail', array( 'w' => 700, 'h' => 403 ), 'original' ); ?></div>
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile; pxl::page(0); ?>