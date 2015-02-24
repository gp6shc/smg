<?php /* Template Name: Jeff */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/ericavillanueva" class="twitter-follow-button" data-show-count="false">Follow EricaVillanueva </a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fericadvillanueva&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraphs-->

					<p>Jeff is a digital media analyst for the Sachs Media team, but could better be described as digital media guru. He has a penchant for data-driven marketing and online advertising management across multiple platforms including social, search and native. He is a certified Google AdWords, Google Analytics and Bing ads professional. His unique and self-described “question-driven” approach optimizes the digital media planning and analysis he provides.</p>

					<!--last p (pushes padding down)-->
					<p class="lastp">Jeff enjoys monitoring and reporting on the “metrics that matter,” while also analyzing user behavior to make data-driven decisions for online advertising. On top of all that, Jeff is also fanatical about content marketing, online lead generation, search engine optimization and conversion optimization.</p>
					<!--end last p-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/magnifying-glass.png" /></p>
					<p class="badge-title">Pivot Ninja</p>
					<p>Jeff loves slicing and dicing data with Excel Pivot Tables.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/barbell.png" /></p>
					<p class="badge-title">Geek Strength</p>
					<p>Jeff enjoys Olympic lifting</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/globe.png" /></p>
					<p class="badge-title">Linguaphile</p>
					<p>Jeff is proficient in French and has a working knowledge of Mandarin Chinese. His favorite written language is Korean.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/ghost.png" /></p>
					<p class="badge-title">HHN Fanatic</p>
					<p>Jeff’s favorite event of the year is Universal Orlando’s Halloween Horror Nights.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/teacher.png" /></p>
					<p class="badge-title">Teacher at Heart</p>
					<p>Jeff taught English as a Second Language abroad in Xiamen, China, and online to students in Taiwan, and has volunteered with the Leon County Literacy Volunteers program to teach students from all over the globe.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>