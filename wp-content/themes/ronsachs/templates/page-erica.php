<?php /* Template Name: Erica */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/ericavillanueva" class="twitter-follow-button" data-show-count="false">Follow EricaVillanueva </a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fericadvillanueva&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraphs-->
					<p>Erica has an outstanding ability to quickly establish positive rapport with government agencies, media outlets, community organizations and the general public. She is currently serving as president of the Capital Chapter of the Florida Public Relations Association, the oldest public relations organization in the United States.</p>

					<p>She is an expert in healthcare issue communications, crisis management and media pitching and works well under pressure. She comes from a background in State government and worked for two Florida Governors. </p>

					<p>Erica is the internship coordinator at Sachs Media Group and proudly trains all of our new "baby rhinos."</p>

					<!--last p (pushes padding down)-->
					<p class="lastp">She graduated from the University of Central Florida with a Journalism degree, and earned a Master’s degree in Spanish Language and Culture from New York University. </p>
					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section-->
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=erica-villanueva]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/erica-villanueva/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/travel.png" /></p>
					<p class="badge-title">Globetrotter</p>
					<p>Erica has travelled around the world and lived in several different countries including: Brazil, Panama, Turkey and Spain. She is of Chilean decent and speaks fluent Spanish.</p>
					<div id="bottom-line"></div>
					
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/butterfly.png" /></p>
					<p class="badge-title">Butterfly</p>
					<p>Erica loves meeting new people and is an expert networker and social butterfly. She has a passion for event planning and you can count on seeing her at a special events around town.</p>
					<div id="bottom-line"></div>
					
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/dog.png" /></p>
					<p class="badge-title">Oscar</p>
					<p>Her 15-year-old dachshund, Oscar Mayer, is the love of her life and she is obsessed with dachshunds in general. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/apple2.png" /></p>
					<p class="badge-title"><span style="text-transform:lowercase;">i</span>Geek</p>
					<p>Lover of all things apple and could not live with out her iPhone. She is an early adopter to new technology and a social media enthusiast. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/speaking.png" /></p>
					<p class="badge-title">Toastmaster</p>
					<p>She is very comfortable with public speaking and enjoys giving media training presentations. </p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>