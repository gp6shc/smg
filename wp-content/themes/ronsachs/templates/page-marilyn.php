<?php /* Template Name: Marilyn */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
	</div>
	<div class="span9">
		<!--content-->
		<div class="content-img"><?php the_content(); ?></div>
		<!--end content-->
		
			<div class="row lined">
				<div class="span6">
					<!--about title-->
					<h3 class="team">About <?php echo get_the_title(); ?></h3>
					<!--end about title-->

					<!--about paragraph-->
					<p>Marilyn Siets is a business manager and bookkeeper with more than 15 years of experience both in public accounting and private professional firms. She assisted Ron Sachs with accounting software installation and training during his first year in business. She returned as a private contractor in 1999 and was hired as business manager in September 2003. Marilyn is a native Tallahassee "lassie" and graduate of Lincoln High School. Her hobbies include needlework, playing the piano, and singing.</p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp"></p>
					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only</h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=ron-sachs]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/ron-sachs/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/calculator.png" /></p>
					<p class="badge-title">Calculator</p>
					<p>As the business manager, Marilyn's in charge of keeping all things reconciled – bank accounts, budgets, client contracts and man-power.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/family.png" /></p>
					<p class="badge-title">Family First</p>
					<p>A native Tallahassean, Marilyn enjoys having most of her immediate and extended family in the N. FL area. Her homestead in eastern Leon County stands on former farmland – worked by her grandfather and father. Marilyn has four children ranging in age from early 30's to middle school.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/knitting.png" /></p>
					<p class="badge-title">Crochet/needlework</p>
					<p>Cross-stitch and crochet are addicting for her!  She can often be found in her living room recliner madly stitching away while watching reruns of NCIS, Monk, White Collar or Psych.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/motherly.png" /></p>
					<p class="badge-title">Den mother</p>
					<p>If our company were a scout troop, marilyn would be one of the den moms.  Her office is considered the “go-to” place for staff inquiring about one thing or another.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/micorphone.png" /></p>
					<p class="badge-title">Singer</p>
					<p>Believe it or not, Marilyn wanted a music degree!  Now, she sings in her church choir, plays the piano, and conducts the Sachs Media Group "symphony" on a daily basis.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>