<?php /* Template Name: Michelle */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/mluubben" class="twitter-follow-button" data-show-count="false">Follow mluubben</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<!--<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Falia.farajjohnson&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>-->
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Michelle has managed Sachs Media Group to be one of Florida’s top independent public relations firms and one of the top 100 in the nation, one of Florida Trend’s Best Places to Work, and 2011 Small Agency of the Year by the Bulldog Reporter.</p>
					<!--end about paragraph-->

					<p>Her prior career in Florida government included stints as Communication Director for the Florida Senate, Department of Insurance, Department of Health &amp; Rehabilitative Services, Department of Children and Families, and Department of Agriculture.  Her passion is creating campaigns that change public behavior.</p>

					<p class="lastp"><iframe src="http://www.youtube.com/embed/JCTbws4JHBI?rel=0" frameborder="0" width="100%" height="270"></iframe></p>
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section-->
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=michelle-ubben]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/michelle-ubben/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/fsu.png" /></p>
					<p class="badge-title">SemiKnightGatorMom</p>
					<p>Earned an M.A. in rhetoric from FSU and a B.A. in journalism from UCF. Being the mother of three Gators, she supports all Florida teams.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/award.png" /></p>
					<p class="badge-title">Accoladed</p>
					<p>Winner of a 2008 international Stevie Award for Women in Business, a 2006 finalist for the National Public Relations Executive of the Year, and named one of the 25 Women You Need to Know by the Tallahassee Democrat.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/family.png" /></p>
					<p class="badge-title">Balance</p>
					<p>Balances work with her beloved family – husband, Matt, six children, two grandchildren, dog, cats and bunnies.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/quill.png" /></p>
					<p class="badge-title">Muse</p>
					<p>Former newspaper reporter, avid writer, blogger, message-mapper who loves a good turn of phrase.   Also loves to paint and play bluegrass on the mandolin.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/heart.png" /></p>
					<p class="badge-title">Adoption</p>
					<p>An adoptive mother herself, she led the work to rebrand Florida's public adoption system, helping Florida place a record number of children in adoptive homes, leading the nation in and earning millions in federal bonus funds.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>