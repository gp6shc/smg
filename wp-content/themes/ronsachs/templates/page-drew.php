<?php /* Template Name: Drew P */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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

					<!--twitter follow
					<p class="follow"><a href="https://twitter.com/aliafaraj" class="twitter-follow-button" data-show-count="false">Follow Alia</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<p class="subscribe"><iframe src="http://www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fdrew.piers&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Drew Piers is a strong writer with a special affinity for finding creative solutions to challenging problems. He graduated magna cum laude from the Florida State University with degrees in both public relations and political science and quickly found his place on the Sachs Media Group team.</p>
					<p>His previous experience in the Executive Office of the Governor proves to be increasingly useful as he helps clients navigate through Florida’s unique political landscape and media environment. Serving as a hybrid between the public affairs and public relations teams, Drew uses his talents to track policy issues, craft strategic messages and generate positive stories for clients. </p>

					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">Drew is also involved with the Florida Public Relations Association Capital Chapter and is certified in Principles of Public Relations by the Universal Accrediting Board.</p>

					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=drew-piers]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/beth-watson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3"> 
					<!--badges section-->
					<h3 class="team">Drew's Badges</h3>
					<div id="badges">
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/research.png" /></p>
					<p class="badge-title">Research Nerd</p>
					<p>A research nerd first and foremost, Drew likes to understand the effects of messaging and the different strategies that shift public opinion.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/Kittens.png" /></p>
					<p class="badge-title">Foster parent</p>
					<p>Drew is a foster parent for the Tallahassee Animal Shelter and takes care of pets until they find a forever home. So, if you’re ever looking to adopt a pet, chances are Drew has some adorable kittens that need homes. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/FPRA.png" /></p>
					<p class="badge-title">FPRA</p>
					<p>Through introductions made at a Florida Public Relations Association luncheon, Drew was able to begin an internship at Sachs Media. He now regularly attends events and serves as Professional Liaison for the student chapter.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/CFA.png" /></p>
					<p class="badge-title">Chick-fil-A</p>
					<p>If you’ve known Drew long enough, you’ll know he loves Chic-fil-A. He once convinced several of his Sachs Media colleagues to dress up as cows to receive free food there for National Cow Appreciation Day.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/compass.png" /></p>
					<p class="badge-title">World Traveler</p>
					<p>Although Florida will always be close to his heart, Drew loves to travel around the world. He was in London for the 2012 Olympics and is already planning his trip to Brazil for the 2014 World Cup.</p>
					
					</div>	

					
				</div>
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>