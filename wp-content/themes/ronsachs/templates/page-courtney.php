<?php /* Template Name: Courtney */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<!--<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Falia.farajjohnson&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>-->
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Courtney Davidson is an Account Executive at Sachs Media Group. She is a Florida State University graduate with a Bachelor’s degree in Public Relations and a minor in Political Science. Courtney is a second generation public relations professional, so communications is in her DNA. She was able to combine her passions for current events, government affairs and communications into a career path. She interned at Sachs Media Group for two semesters before joining the team full-time.</p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">Courtney is also involved with the Florida Public Relations Association Capital Chapter and is certified in Principles of Public Relations by the Universal Accrediting Board.</p>

					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=courtney-davidson]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/beth-watson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/coffee.png" /></p>
					<p class="badge-title">Coffee Addict</p>
					<p>Courtney is a coffee fiend. She must start the morning with healthy doses of caffeine to get her creative juices flowing for the day.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/drama.png" /></p>
					<p class="badge-title">Theatre Junkie</p>
					<p>Courtney has a passion for theatre - whether performing or watching. She was in multiple plays throughout high school, Vice President of the drama club and particpated in competitions. In fact, she met her fiancé in a high school play they performed in together.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/courtney-food.png" /></p>
					<p class="badge-title">Foodie</p>
					<p>Don't let Courtney's petite frame fool you. She loves to eat and is willing to try anything at least once.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/read.png" /></p>
					<p class="badge-title">Book Worm</p>
					<p>In her spare time, Courtney is usually found with a book in her hands. From a young age, you could always find her with at least one book.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/courtney-cat.png" /></p>
					<p class="badge-title">Cat Lover</p>
					<p>Courtney has a fondness for all things feline.</p>
					</div>

					
				</div>
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>