<?php /* Template Name: Lisa */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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

					<!--twitter follow-->
					<p class="follow"><a href="https://twitter.com/Alfozzie" class="twitter-follow-button" data-show-count="false">Follow LisaGarcia</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<!--<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Falia.farajjohnson&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>-->
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>In the relentless pursuit to raise the intellectual consciousness of some of the 21st centuries most important social and environmental issues on a large scale, Lisa leads the charge on the firm’s environmental, health care and public-private campaigns and initiatives. Prior to her joining Ron Sachs Communications in 2005, Lisa worked in communications for the International Union of Gas Workers and the International Brotherhood of Teamsters in Washington, D.C. </p>
					<!--end about paragraph-->

					<p>She is an avid volunteer in her community, church and a member of the Florida Public Relations Board. Lisa’s work has received significant recognition including an Award of Distinction in 2012 for the “No More Cuts” campaign for the Florida Hospital Association; A 2011 Golden Image Award for her work in the “We Tackle Cancer” campaign for the University of Miami, a Grand All and Golden Image Award in 2010 for her work on the “No Butts About It” campaign for the Florida Hospital Association and a Suncoast Regional Emmy Award in 2008 for directing a series of public service announcement related to climate change for the Environmental Defense Fund.</p>

					<p class="lastp"><iframe src="https://www.youtube.com/embed/P5ZFPb-_sik?rel=0" frameborder="0" width="100%" height="270"></iframe></p>

					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<!--<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=lisa-garcia]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/lisa-garcia/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/mountains.png" /></p>
					<p class="badge-title">Bobcat</p>
					<p>Lisa graduated from Frostburg State University with a BA in International Business. Raised in Maryland, Lisa enjoys skiing, ice-skating and shopping malls. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/pepper.png" /></p>
					<p class="badge-title">Hot Pepper</p>
					<p>First generation American, Lisa has a knack for languages and accents. In addition to English, she speaks both Spanish and French.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/cook.png" /></p>
					<p class="badge-title">Master Chef</p>
					<p>She is a self-proclaimed master chef of her own kitchen.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/camera.png" /></p>
					<p class="badge-title">Shutterbug</p>
					<p>Lisa has a passion for photography &amp; is also an Emmy Award-winning director.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/family.png" /></p>
					<p class="badge-title">La Familia</p>
					<p>Happily married for more than 17 years to her husband Joe Garcia, together they have two smart and beautiful children Joseph and Victoria Garcia.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>