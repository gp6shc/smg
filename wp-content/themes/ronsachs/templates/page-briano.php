<?php /* Template Name: Brian O' */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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

					<!--twitter follow-->
					<p class="follow"><a href="https://twitter.com/brianotoole" class="twitter-follow-button" data-show-count="false">Follow BrianOToole</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fbrianzotoole&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>A graduate of FSU, Brian is skilled in web/mobile development, creative strategy, and social/digital advertising.  He has worked on several start-up projects, including VibinFM – the Pandora for Electronic DJ sets and SocialJukebox.fm.</p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">He enjoys keeping up with web development trends, especially the latest in front-end development. He continues to improve upon his technical skill set by becoming multidimensional in both front and back-end development. Outside of work, Brian enjoys keeping up with sports, being active & maintaing a healthy lifestyle.</p>
					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only</h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=brian-otoole]"); ?></p>
					<!--end blog section

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/brian-otoole/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/quora.png" /></p>
					<p class="badge-title">Quora</p>
					<p>He is addicted to <a href="http://quora.com" target="_blank">Quora.com</a>, the human information engine.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/vibin.png" /></p>
					<p class="badge-title">Music</p>
					<p>Created and led team 'Social Jukebox' to win 2nd Place at <a href="http://startupweekend.org" target="_blank">Startup Weekend Tallahassee</a>.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/baseball.png" /></p>
					<p class="badge-title">Baseball</p>
					<p>Brian played in the 2006 FACA State All Star Game, coveted by former players such as Chipper Jones, Alex Rodriguez, Zac Grienke, and many other MLB stars.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/apple.png" /></p>
					<p class="badge-title">Apple</p>
					<p>Since joining SMG, Brian made the switch to Apple products and has never looked back! </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/motocross.png" /></p>
					<p class="badge-title">Motocross</p>
					<p>Directed the digital work for Ricky Carmichael Racing, which now boasts over 150K Likes.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>