<?php /* Template Name: Ryan C. */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/RyanCohn" class="twitter-follow-button" data-show-count="false">Follow RyanCohn</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fryanmmi&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Ryan Cohn is Vice President of Social/Digital Operations at Sachs Media Group, where he primarily specializes in social media’s use within the public affairs and grassroots advocacy arenas.  </p>
					<!--end about paragraph-->

					<p>Ryan is a sociology nut and spends tons of time outside the office writing his upcoming book on social media from a leader’s perspective. Ryan has written for <a href="http://allfacebook.com/" target="_blank">AllFacebook</a> and <a href="http://socialfresh.com/" target="_blank">Social Fresh</a>, and travels the nation speaking about emerging technology.</p>

					<p class="lastp"><iframe src="https://www.youtube.com/embed/PH8Xl91c_Nw?rel=0" frameborder="0" width="100%" height="270"></iframe></p>
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section-->
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=ryan-cohn]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/ryan-cohn/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/fsu.png" /></p>
					<p class="badge-title">Go Noles!</p>
					<p>Ryan is a graduate of the Florida State University with degrees in Marketing and Psychology. Ryan now regularly lectures at the university, and is a diehard FSU athletics fan. Go Noles!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/facebook.png" /></p>
					<p class="badge-title">Zuck's BFF</p>
					<p>Ryan's business relationship with Facebook goes back to May 2007, when the network was only 18 million users strong. This makes Ryan a grandfather in the social media marketing world.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/beach.png" /></p>
					<p class="badge-title">Beach Bum</p>
					<p>There are few places Ryan would rather be than by the surf and sand. He grew up in South Florida and tries to escape to the beach whenever possible.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/speaking.png" /></p>
					<p class="badge-title">Speech Geek</p>
					<p>Ryan travels the nation speaking on emerging technology. He also competed on scholarship for the FSU Speech &amp; Debate Team all throughout college and ranked as one of the top-20 speakers in the nation.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/cellphone.png" /></p>
					<p class="badge-title"><span style="text-transform:lowercase;">i</span>Addict</p>
					<p>Ryan is addicted to his iPhone. It’s rare to see him more than 5 feet from the mobile device. He’s also had very bad luck with them in the past, having gone through 5 phones in 2011 alone..</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>