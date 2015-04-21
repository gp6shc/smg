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

		<div class="post" style="padding-top: 10px;">
			<?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
		</div>
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile; pxl::page(0); ?>