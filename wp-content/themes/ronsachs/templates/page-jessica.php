<?php /* Template Name: Jessica */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/HerbieThiele" class="twitter-follow-button" data-show-count="false">Follow HerbieThiele</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<!--<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Falia.farajjohnson&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>-->
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Jessica's expertise lies in her attention to detail, ability to strategically plan large campaigns and burn the midnight oil in pursuit of client results. Since joining the firm in 2010, Jessica has participated in some of the firm's largest statewide branding, strategic planning and issues campaigns including rebranding the Florida Department of Veterans' Affairs. Her work on behalf of the Lauren’s Kids foundation, an organization that works to raise awareness about childhood sexual abuse, has helped to propel the organization into the national arena. </p>
					<!--end about paragraph-->

					<p>A magna cum laude graduate from Florida State University with a B.S. in public relations, Jessica is an 11-time Florida Public Relations Association Award recipient and winner of the 2012 Bulldog Reporter Media Relations Silver Award winner for Best Education/Public Service Campaign recipient.</p>

					<!--last p (pushes padding down)-->
					<p class="lastp">Jessica particularly loves to fight for a cause and currently sits on the Executive Board of the Florida Network of Children’s Advocacy Centers.</p>
					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<!--<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=jessica-clark]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/jessica-clark/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/camera.png" /></p>
					<p class="badge-title">Shutterbug</p>
					<p>Jessica is an avid photographer.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/ribbon.png" /></p>
					<p class="badge-title">Teal Ribbon</p>
					<p>Jessica devoted 3 years of professional career to helping client prevent child sexual abuse and exploitation.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/stamp.png" /></p>
					<p class="badge-title">Plan On It!</p>
					<p>One of her major assets to the company is her strategic planning abilities.</p>
					<div id="bottom-line"></div>
					
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/travel.png" /></p>
					<p class="badge-title">Globetrotter</p>
					<p>She has explored England, Ireland, Scotland, France, Poland and Germany.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/beer.png" /></p>
					<p class="badge-title">Beer</p>
					<p>She is a foodie and craft beer connoisseur.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>