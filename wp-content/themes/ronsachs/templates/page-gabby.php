<?php /* Template Name: Gabby */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p>Gabby Greenawalt is Sachs Media Group's Financial Officer. Gabby is a Flagler College graduate with a Bachelor's degree in Accounting. She interned at SMG for several semesters before joining the team full-time. </p>
					
					<p>Her love of numbers and detail-oriented excel spreadsheets ensures that the firm's books remain balanced day after day. She supports the firm’s human resources and accounting needs with a smile on her face. </p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">Gabby was born in Alabama, but has grown up in Florida's Capital most of her life so she considers herself a true "Tallahassean."</p>

					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=gabby-greenwalt]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/beth-watson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/cake.png" /></p>
					<p class="badge-title">Baker</p>
					<p>Gabby loves to bake anything from basic cupcakes to themed cakes. She has designed birthday, wedding and anniversary cakes for friends and family. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/dog-gabby.png" /></p>
					<p class="badge-title">Animal Lover </p>
					<p>Gabby can't even count the number of animals she has had over the years. She loves all furry, four-legged friends. However, her Golden Retriever named Bella is her favorite. She loves her more than her boyfriend. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/paint.png" /></p>
					<p class="badge-title">Crafty</p>
					<p>From scrapbooking to repurposing furniture, Gabby has an eye for crafting and Pinterest projects. Her bedtime routine is Pinterest hunting for new ideas. Her dream is to have a house where everything is the color Turquoise.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/rollercoaster.png" /></p>
					<p class="badge-title">Theme Park Enthusiast</p>
					<p>Throughout the years, Gabby has traveled to various theme parks in multiple states. With roller coasters, the bigger and faster the better for her. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/country-music.png" /></p>
					<p class="badge-title">Country Music Fan</p>
					<p>In one month alone, Gabby saw five country music shows. She has grown up on a love of cowboy boots and Southern music.</p>
					</div>

					
				</div>
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>