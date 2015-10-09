<?php /* Template Name: Ashley S */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="http://www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fashley.schaffer.140&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Ashley Schaffer graduated from Florida State University with a Bachelor’s degree in Marketing and Psychology. She is well versed in social/digital technologies, writing and design, and has a natural talent for creating content that appeals to a diverse set of audiences. In her spare time, Ashley enjoys blogging and is the creator/editor of her own lifestyle blog called <a href="http://lattesandletters.wordpress.com/" target="_blank">Lattes & Letters</a>. </p>
					
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">During her college career, Ashley served as the President of the Florida Chapter of the One Million Bones Project. She assisted in raising over $500,000 for survivors of ongoing mass atrocities and advocated for future prevention measures. Ashley is currently a member of the 621 Board, where she is in charge of PR/Marketing operations.</p>

					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=ashley-schaffer]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/beth-watson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/compass-2.png" /></p>
					<p class="badge-title">World Traveler</p>
					<p>Passionate about travel and world culture. Spent a semester studying abroad in Switzerland, France, Germany, Italy, and Austria.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/music-2.png" /></p>
					<p class="badge-title">Music Enthusiast</p>
					<p>Loves listening to music, attending concerts and jamming on the guitar, bass and piano.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/laptop.png" /></p>
					<p class="badge-title">Blog Lovin'</p>
					<p>Enjoys blogging about fashion, music and life.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/fsu-1.png" /></p>
					<p class="badge-title">Seminole Alum</p>
					<p>Florida State graduate with a degree in Marketing. Go Noles!.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/coffee.png" /></p>
					<p class="badge-title">Coffee Addict</p>
					<p>Can't go a single day without a cup of coffee in hand.</p>
					</div>	

					
				</div>
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>