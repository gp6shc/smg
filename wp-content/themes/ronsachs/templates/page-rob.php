<?php /* Template Name: Rob Orr */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/roborracle" class="twitter-follow-button" data-show-count="false">Follow RobOrracle</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Froborracle&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Rob Orr is a web developer who thrives on building great outcomes. Having built numerous websites over the last 10 years, he specializes in building highly functional, aethestically stunning and results-oriented web projects. Rob has a solid background working with new and emerging web and business technology, having spent several years in business development and sales prior to embarking on his current path as a web developer. Originally from Atlanta, Georgia, Rob grew up in Orlando. In 2003 he married his best friend and in 2005 he and Paige had a daughter, Peyton.</p>
					<!--end about paragraph-->
					<p class="lastp">As a proud graduate of Florida State University, Rob is an avid supporter of the Noles and his Saturday afternoons in the fall are devoted to college football, grilling and company with family and friends. He's also a huge Atlanta Braves fan, having grown up going to games at the old Fulton County Stadium with his dad, even getting Dale Murphy's autograph during batting practice one time.</p>
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only</h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=rob-orr]"); ?></p>
					<!--end blog section

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/rob-orr/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/code.png" /></p>
					<p class="badge-title">Drupal &amp; Wordpress</p>
					<p>Rob's been building with Drupal since the earliest versions of Drupal 6 and with WordPress since 2.7. How did he get things done before Drush?</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/apple2.png" /></p>
					<p class="badge-title">Mac Guy</p>
					<p>Rob's not part of the cult, but mildly sympathetic to their <strike>obsession</strike> passion.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/family-2.png" /></p>
					<p class="badge-title">Family Guy</p>
					<p>Rob would rather be at Disney with his wife and daughter than anywhere else.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/vibin.png" /></p>
					<p class="badge-title">Groove </p>
					<p>Rob relies on coffee and music - from hardcore to classical - to get things done.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/sunshine.png" /></p>
					<p class="badge-title">Early Bird</p>
					<p>Rob's usually in the office around 6:00 am, long before the sun rises.</p>
					</div>	
					<!--end badges section-->
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>