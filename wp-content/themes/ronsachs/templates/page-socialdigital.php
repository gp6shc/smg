<?php /* Template Name: What We Do: Social/Digital */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row lined">
	<div id="sidebar" class="span3">
		<ul id="side">
			<li><a href="../public-affairs/">Public Affairs</a></li>
			<li><a href="../branding/">Branding</a></li>
			<li><a href="../campaigns/">Campaigns</a></li>
			<li><a href="../crisis-communication/">Crisis Communications</a></li>
			<li><a href="../social-digital/">Social/Digital</a></li>
			<li><a href="../public-relations/">Public Relations</a></li>
			<li><a href="<?php echo home_url( '/design-portfolio' ); ?>">Design Portfolio</a></li>
		</ul>
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
					<p style="padding-bottom:4px;"><?php echo do_shortcode("[posts show=3 loop=post-indivcasestudy category_name=socialdigital]"); ?></p>
					<!--end blog section-->
				</div><!--end span6-->
							
		</div><!--end span6 row lined-->
	</div><!--end span6-->

		<!--Case Studies -->
		<div id="sidebar" class="span3">
		<!--<h3 class="whatwedo">Featured Resources</h3>
		<p><a href="http://pages.optify.net/2013-social-media-strategy-guide" target="_blank"><img src="http://sachsmedia.com/wp-content/uploads/2013/02/download.jpg" title="Click to Download" style="margin-top:5px;width:200px;height:115px;"/></a></p>-->

		<h3 class="whatwedo">Case Studies</h3>
			<?php echo do_shortcode("[posts loop=post-casestudy category_name=casestudy-socialdigital]"); ?></p>
 		</div><!--end span 3-->
 		
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>