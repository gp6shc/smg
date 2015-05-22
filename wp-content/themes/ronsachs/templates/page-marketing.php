<?php /* Template Name: What We Do: Marketing */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
				<?php if (get_category(125)->category_count > 0): ?>
					<!--blog section-->
					<h3 class="related">Related Blog Articles<!--echos first name only--></h3>
					<p style="padding-bottom:4px;"><?php echo do_shortcode("[posts show=3 loop=post-indivcasestudy category_name=marketing]"); ?></p>
					<!--end blog section-->
				<?php endif;?>
				</div><!--end span6-->
							
		</div><!--end span6 row lined-->
	</div><!--end span6-->

		<!--Case Studies -->
		<div id="sidebar" class="span3">
		<h3 class="whatwedo" style="font-size: 22px">Research Methods We Love</h3>
			<?php $R_query = new WP_Query( 'category_name=casestudy-marketing');
				while ( $R_query->have_posts() ) : $R_query->the_post();
					$do_not_duplicate = $post->ID; ?>
					<div style="margin-bottom: 25px">
						<div class="post">
							<?php the_post_thumbnail('medium','class=research-img'); ?>
						</div>	
						<h3 style="margin: 5px 0 0 0"><?php the_title();?></h3>
						<p><?php the_content(); ?></p>
					</div>
				<?php endwhile;?>
 		</div><!--end span 3-->
 		
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>