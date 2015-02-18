<?php /* Template Name: What We Do */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row lined">
	<div id="sidebar" class="span3">
		<?php wp_nav_menu('menu=what-we-do&container=&menu_id=side&menu_class=no-margin'); ?>
		<br />
		<?php if ( !dynamic_sidebar('Sidebar') ) : ?>
		<?php endif; ?>
	</div>
	<div class="span6">
		<!--content-->
		<h3 class="whatwedo">Philosophy of: <?php echo get_the_title(); ?></h3>
		<div class="content-img-what-we-do"><?php the_content(); ?></div>
		<!--end content-->
		
			<div class="row lined">
				<div class="span6">

					<!-- ADD LINE BELOW INTO WP POST EDITOR HTML SECTION 
					<h3 class="whatwedo">Related Case Studies</h3>
					ADD LINE ABOVE INTO WP POST EDITOR HTML SECTION -->

					<p class="lastp">&nbsp;</p><!--fixes mobile padding issue-->

					<!--blog section-->
					<h2 class="blog">Related Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=ryan-cohn]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/cat-name/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
							
		</div><!--end span6 row lined-->
	</div><!--end span6-->

		
		<!--Case Studies -->
		<div id="sidebar" class="span3">
			case studies here
 
		</div><!--end span 3-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>