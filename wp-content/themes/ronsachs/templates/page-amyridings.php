<?php /* Template Name: Amy Ridings */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/aliafaraj" class="twitter-follow-button" data-show-count="false">Follow Alia</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<!--<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Falia.farajjohnson&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>-->
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Amy Ridings joined the Sachs Media Group team in May 2013 following her graduation from Florida State University. She was initially hired as an intern, but her communication skills and self-motivated attitude quickly propelled her promotion to full-time team member.</p>
					
					<p>As an Account Executive, Amy maintains daily contact with clients, primarily working closely on large-scale education initiatives within the state of Florida. Thanks to this concentrated focus, she has developed a deep knowledge of the education system and an understanding of the ins and outs of the policy issues related to education reform. </p>
					
					<p>By pursuing a degree in sociology and a specialization in statistics, Amy was led to follow her love of understanding research, numbers and most of all – people.  These passions have contributed to her professional pursuits, and in turn are being developed and shaped on a daily basis.</p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp"></p>

					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=amy-ridings]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/beth-watson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3"> 
					<!--badges section-->
					<div id="badges">
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/fsu.png" /></p>
					<p class="badge-title">FSU Alumni</p>
					<p>Amy graduated from Florida State University in May 2013. Go Noles!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/droid.png" /></p>
					<p class="badge-title">Droooooid</p>
					<p>As much as she loves her Apple laptop, Amy is an avid Android user. Her cellphone is rarely far from her side, and rumor has it that she is secretly a habitual gamer.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/palm.png" /></p>
					<p class="badge-title">Florida Girl</p>
					<p>A true Floridian at heart, Amy can be found enjoying the water on the weekends. Kayaking, beach trips and fishing are among her favorite ways to wind down and enjoy the Florida sun.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/travel.png" /></p>
					<p class="badge-title">World Wanderer</p>
					<p>As much as Amy loves living in Florida, there is almost nothing that she enjoys more than traveling. New Zealand, Australia, Canada and London are a few of her past adventure destinations.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/family.png" /></p>
					<p class="badge-title">Fond of Family</p>
					<p>Amy values her family as the single most important asset in her life. While you don’t get to pick your family, if given the choice, Amy wouldn’t change a thing.</p>
					</div>

					
				</div>
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>