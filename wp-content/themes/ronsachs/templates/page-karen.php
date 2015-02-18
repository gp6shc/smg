<?php /* Template Name: Karen */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/karencyphers" class="twitter-follow-button" data-show-count="false">Follow Karen</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

					<!--about paragraph-->
					<p>While completing a doctoral degree, Karen directed policy for two gubernatorial campaigns, one governor, the Florida House and Senate, and the Florida Medical Association. Today, she relentlessly seeks the elusive bridge between data-driven policy and on-the-ground politics.</p>
					<p>Karen provides thought leadership, data crunching, and strategic analysis on a range of projects.</p>
					<p>Outside of the office, Karen is an adjunct instructor at Florida State University, dedicates time toward assisting the Alzheimer's Project, Inc. on matters close to her heart, and writes for various publications.</p>
					<p>Karen earned a Ph.D. in political science from Florida State University. Her academic research focuses on experimental design, political behavior and health care policy. She is a proud graduate of New College of Florida.</p>
					<!--end about paragraph-->

					<p class="lastp"></p>

			   
					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only</h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=karen-cyphers"); ?></p>
					end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/alia-faraj-johnson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				 <div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3>
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/homebase.png" /></p>
					<p class="badge-title">Home Base</p>
					<p>Karen and her husband Brett have two preschoolers, and Karen's stepdaughter is a proud Florida State Seminole.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/doodlemaster.png" /></p>
					<p class="badge-title">Doodle Master</p>
					<p>Karen's notebooks are sprinkled with doodles and poems and ideas for new children's books.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/comfortableshoes.png" /></p>
					<p class="badge-title">Comfortable Shoes</p>
					<p>Happy feet are the foundation for happy days.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/spreadsheetheaven.png" /></p>
					<p class="badge-title">Spreadsheet Heaven</p>
					<p>Karen loves getting lost in spreadsheets full of original data primed for analysis.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/canvasclown.png" /></p>
					<p class="badge-title">World's only 'Canvas Clown'</p>
					<p>You wouldn't know it is her from looking. But if you come across a 'living statue' that people are painting on... well...</p>
					</div>	
					
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>