<?php /* Template Name: Anosh */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/anoshgill" class="twitter-follow-button" data-show-count="false">Follow AnoshGill</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fbrianzotoole&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Anosh Gill is an acclaimed creative director and educator with more than 20 years of international design experience. He has provided design services for hundreds of clients including municipalities, government agencies, travel destinations and educational organizations. His work has earned more than 60 awards in advertising, design and illustration. As a visiting graphic design instructor at Florida A&M University, his students have won ADDY® Awards in nearly every nominated category.</p>
					<p class="lastp">Anosh believes that designers are communicators first and foremost, so he approaches every design project with a communication strategy. He loves to find beauty in all things big and small, from other artists' work to the intricate and often delicate artistry found in nature. Anosh has an M.F.A. in Media Design from Full Sail University and a B.S. in Industrial and Product Design from The Ohio State University.</p>
					<!--end about paragraph-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only</h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=anosh-gill]"); ?></p>
					<!--end blog section

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/anosh-gill/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/art.png" /></p>
					<p class="badge-title">Painter</p>
					<p>An artist from a very young age, Anosh's true passion is painting. His office walls are lined with original works with his own brushstrokes. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/music-lover.png" /></p>
					<p class="badge-title">Music</p>
					<p>While Anosh loves all types of music, he would probably say Depeche Mode & Eurythmics are two of his all-time favorite bands.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/family.png" /></p>
					<p class="badge-title">Family Guy</p>
					<p>Family is incredibly important to Anosh. He and his wife are the parents of two boys with a big age gap: one age four, one age 17. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/running.png" /></p>
					<p class="badge-title">Run</p>
					<p>His big goal is to one day run a half-marathon with his wife. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/teacher.png" /></p>
					<p class="badge-title">Teacher</p>
					<p>Anosh loves guiding his students as communicators in the world of design. </p>
					</div>	
					<!--end badges section-->
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>