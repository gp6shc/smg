<?php /* Template Name: Vicki */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/vickijcomm" class="twitter-follow-button" data-show-count="false">Follow Vicki Johnson</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fryanmmi&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Vicki Johnson is a seasoned tourism PR strategist and longtime former Disney veteran. Her Orlando marketing firm, acquired by Ron Sachs Communications in August 2012, assisted a number of prominent organizations including Brand USA, CoCo Key Water Resorts, accesso, the U.S. Personal Chef Association, LEGOLAND Florida, and Super 78 Studios. </p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">During her more than 13 years with Disney, Johnson promoted and publicized Disney Parks &amp; Resorts to media around the globe. She's also held top communications posts at the U.S. Travel and Tourism Administration and the Florida Department of Commerce. Johnson is a graduate of the University of Florida College of Journalism. She has chaired the PR committees for VISIT FLA and the Visit Orlando, and served on the PR council for the US Travel Association. She is a Rotarian and also serves as on the Board of Directors for Harbor House.</p>
					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section-->
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=vicki-johnson]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/vicki-johnson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/travel.png" /></p>
					<p class="badge-title">Destination</p>
					<p>More than 20 years promoting travel and hospitality clients (including the opening of five major theme parks, more than 10 hotels, multiple celebrations, and countless attractions and restaurants), and proud staff member of the 1995 White House Conference on Travel and Tourism.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/fighter.png" /></p>
					<p class="badge-title">Violence Fighter</p>
					<p>Member of the Board of Directors and past president of Harbor House of Central Florida – Orange County’s domestic violence charity.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/disney2.png" /></p>
					<p class="badge-title">Mouse</p>
					<p>A 13+-year Disney Cast Member.  Vicki’s husband Bill Carl Johnson is the Custom Solutions Manager for Sports at the Disney Institute.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/running.png" /></p>
					<p class="badge-title">Many Miles</p>
					<p>More than 45 marathons completed + one 50-mile ultra marathon. The running gene courses through the family’s DNA…her two daughters run distance for their respective schools.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/uf.png" /></p>
					<p class="badge-title">Gator</p>
					<p>University of Florida grad and rabid supporter of Gator athletics</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>