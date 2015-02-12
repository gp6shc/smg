<?php /* Template Name: Amy Rosen */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
		<!--content-->
		<div class="content-img"><?php the_content(); ?></div>
		<!--end content-->
		
			<div class="row lined">
				<div class="span6">
					<!--about title-->
					<h3 class="team">About <?php echo get_the_title(); ?></h3>
					<!--end about title-->

					<!--about paragraph-->
						<p>Amy  has agency experience working at international New York and Chicago firms with a variety of ADDYs® and Effies under her belt, as well as client-side experience running the marketing departments of several national corporations. She specializes in developing brand identity, positioning and launching new brands, and helping brands reinvent themselves to be to be more competitive and relevant in today's changing market. Her vast category experience, along with her expertise in both traditional and digital media, enables her to provide clients with target-focused marketing plans providing measurable results and maximum return on their marketing investment.</p>
						<p>Amy received her Bachelor of Arts degree with a dual major in Government and American Studies, with a minor in Business. She has been a guest lecturer at Northern Arizona University and has run numerous training programs developed to help up-and-coming advertising executives hone their strategic, creative and communication skills. Her advertising and marketing experience includes Tiffany, Mercedes Benz, Kraft Foods, Bacardi, L'Oréal, Con Agra, Procter & Gamble, Schwinn and Bally Total Fitness.</p>


					<!--end about paragraph-->

					<!--blog section-->
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=amy-rosen]"); ?></p>
					<!--end blog section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/fummer.png" /></p>
					<p class="badge-title">Fummer (yes, that’s what we’re called)</p>
					<p>Proud graduate of Franklin and Marshall College (F&M) where Amy discovered her love for fiction, American sociological history and writing.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/sunshine.png" /></p>
					<p class="badge-title">Sunshine-Lover</p>
					<p>Anything outdoors is great - add hot sun and anything in which to swim, and it’s even better.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/googler.png" /></p>
					<p class="badge-title">Googler</p>
					<p>“There is no excuse to not know anything anymore! We are all geniuses with the touch of a computer.” - Amy on people who still ask questions.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/balance.png" /></p>
					<p class="badge-title">Balancer</p>
					<p>Mom to one amazing daughter and two cute dogs, plus dedication to a career spanning over 20 years in NYC, Chicago and now SoFlo, Amy thanks goodness for yoga.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/brandpolice.png" /></p>
					<p class="badge-title">Brand Police</p>
					<p>A lover of finding and bringing to life the true core of a brand, Amy believes her favorite expression “To thine own self be true” also applies to brands.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>