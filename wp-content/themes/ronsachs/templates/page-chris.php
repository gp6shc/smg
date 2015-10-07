<?php /* Template Name: Chris */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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

					<!--about paragraphs-->

					<p>Chris L. Crouch joined the SMG team in 2015 after studying graphic design at Florida A&M University. Chris is a skilled photographer and designer with an impressive set of skills and a very adventurous spirit.</p>
					<p>His work has been published in numerous magazines and newspapers, including the Tallahassee Democrat, Swatch Magazine, Diverse World Fashion and Tallahassee Magazine. Chris’s high-caliber work has earned him several statewide print awards, and as a student he was the recipient of a scholarship from the American Advertising Federation of Tallahassee.</p>

					<!--last p (pushes padding down)-->
					<p class="lastp">Outside of the office, Chris enjoys creating music in his band, 90’s cartoons, watching movies, and mixed martial arts. He is also the biggest Teenage Mutant Ninja Turtles fan you’ll ever meet.</p>
					<!--end last p-->

				</div><!--end span6-->
			
				<div class="span3">
				<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/coffee.png" /></p>
					<p class="badge-title">Caffeine Connoisseur</p>
					<p>Chris loves caffeine in nearly all forms and depends on it to help get him through the day.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/ghost.png" /></p>
					<p class="badge-title">Horror Fanatic</p>
					<p>A great night to Chris is sipping on hot chocolate and indulging in a great campy ’80s horror flick. He is also a firm believer that Halloween should be year-round.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/camera.png" /></p>
					<p class="badge-title">Shutter Bug</p>
					<p>He likes to spend his free time practicing photography, sharpening his skills while gaining new appreciation for the world around him.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/ninja-turtle.png" /></p>
					<p class="badge-title">Shellhead</p>
					<p>Chris is an extremely huge fan of the Teenage Mutant Ninja Turtles. Fads come and go, but for him the Ninja Turtles have been a passion since birth. COWABUNGA!!!!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/pizza.png" /></p>
					<p class="badge-title">Pizza Lover</p>
					<p>His favorite food is pizza, hands down. Favorite toppings? Sausage and pineapple.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>