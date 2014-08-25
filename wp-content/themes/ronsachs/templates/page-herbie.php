<?php /* Template Name: Herbie */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/HerbieThiele" class="twitter-follow-button" data-show-count="false">Follow HerbieThiele</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<!--<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Falia.farajjohnson&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>-->
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Herbie Thiele is a highly motivated communications professional with an outstanding ability to quickly establish positive rapport with government agencies, media outlets, community organizations and the general public. He has a strong understanding of the legislative process; ability to analyze legislative bills; development of resolutions and proclamations; extensive work on constitutional amendment campaigns.</p>
					<!--end about paragraph-->
					
					<p>Herbie has developed, coordinated and implemented statewide public relations campaigns for various clients with an emphasis on public affairs issues including legislative tracking, attending committee meetings, and working on effecting change in public policy. Experiences developing complex paid media buy plans including placement of billboard, radio, TV and print ads both statewide and nationally. </p>

					<!--last p (pushes padding down)-->
					<p>
					<strong>Large-scale projects include:</strong>
					<ul>
					<li>Deepwater Horizon Presidential Oil Spill Commission: Developed multi-state schedules and logistics and staffed members of the commission.  Handled media relations at the state level.</li> 
					<li>Eric Brody and Rachel Hoffman cases: Claims bills that successfully passed due to appropriate and effective media outreach.</li>
					<li>Managed several legislative issues including property insurance, PIP, health care, gaming, education, etc.</li>
					</ul></p>
					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<!--<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=herbie-thiele]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/herbie-thiele/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/baseball.png" /></p>
					<p class="badge-title">Fast Pitch</p>
					<p>Knows how to pitch a news story -- To reporters:  Fast Pitch Warning</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/jack.png" /></p>
					<p class="badge-title">Jack-of-all-trades</p>
					<p>Whether it is a road trip, work assignment, news release or event -- Herbie makes it an adventure.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/network.png" /></p>
					<p class="badge-title">Forrest Gump</p>
					<p>Knows how to meet the right people -- always in the right place at the right time and even better -- can bring you along.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/socks.png" /></p>
					<p class="badge-title">Shoeless Joe Jackson</p>
					<p>Herbie is an even bigger fan of NO socks.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/coach.png" /></p>
					<p class="badge-title">Ol' Ball Coach</p>
					<p>Huge baseball fan and coach to Tallahassee future pro players</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>