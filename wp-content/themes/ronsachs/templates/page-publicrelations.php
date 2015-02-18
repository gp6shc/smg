<?php /* Template Name: What We Do: Public Relations */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row lined">
	<div id="sidebar" class="span3">
		<?php wp_nav_menu('menu=what-we-do&container=&menu_id=side&menu_class=no-margin'); ?>
		<br />
		<?php if ( !dynamic_sidebar('Sidebar') ) : ?>
		<?php endif; ?>
	</div>
	
	<div class="span6">
		<!--content-->
		<h3 class="whatwedo"><?php echo get_the_title(); ?> Philosophy</h3>
		<div class="content-img-what-we-do"><?php the_content(); ?></div>
		<!--end content-->
		
			<div class="row lined">
				<div class="span6">
					<!--blog section-->
					<h3 class="related">Related Blog Articles<!--echos first name only--></h3>
					<p style="padding-bottom:4px;"><?php echo do_shortcode("[posts show=3 loop=post-indivcasestudy category_name=publicrelations]"); ?></p>
					<!--end blog section-->
				</div><!--end span6-->
							
		</div><!--end span6 row lined-->
	</div><!--end span6-->

		<!--Case Studies -->
		<div id="sidebar" class="span3">
		<h3 class="whatwedo">Case Studies</h3>
			<?php echo do_shortcode("[posts loop=post-casestudy category_name=casestudy-pr]"); ?></p>
 		</div><!--end span 3-->
 		
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>