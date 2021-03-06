<?php /* Template Name: Mike */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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

					<p>Mike is a web developer for Sachs Media Group, with a unique talent for technical problem solving. Mike received his Associate’s degree from Tallahassee Community College and is currently pursuing a Bachelor’s degree in Computer Science Engineering from the University of Florida. His focus includes creating innovative user experiences and building top-notch sites from the ground up for an array of clients, in addition to developing the firm’s own website. With his impressive and cutting-edge skills, Mike brings the client’s ideas to life online.</p>

					<!--last p (pushes padding down)-->
					<p class="lastp">Mike is a self-taught developer and has gained a special interest in multi-platform web services. He is heavily inspired by the mastermind innovator, Elon Musk, who is an entrepreneur, engineer, and thought leader.</p>
					<!--end last p-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/new-hampshire.png" /></p>
					<p class="badge-title">Northern Native</p>
					<p>Mike is a native of New Hampshire and truly misses the snowbound winters.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/uf.png" /></p>
					<p class="badge-title">Mega-Gator</p>
					<p>Born into a Gator family, Mike naturally bleeds orange and blue.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/tv-2.png" /></p>
					<p class="badge-title">Cinephile</p>
					<p>Much of Mike’s down time is spent catching up on his favorite TV shows, from Breaking Bad to The Office.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/tesla.png" /></p>
					<p class="badge-title">Electric Drive</p>
					<p>Mike plans to one day be the proud owner of the electric Model 3 from Tesla.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/mike-1.png" /></p>
					<p class="badge-title">Apple Corp</p>
					<p>Mike is a huge proponent of Apple and avidly tracks the company’s evolution.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>