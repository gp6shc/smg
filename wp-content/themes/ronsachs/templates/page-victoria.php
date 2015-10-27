<?php /* Template Name: Victoria P. */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/vpetrocelli" class="twitter-follow-button" data-show-count="false">Follow vpetrocelli</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2F[NAMEHERE]&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Based in Sachs Media Group's Boca Raton office, Victoria Petrocelli takes a results-driven approach to every project and client challenge. A graduate of Liberty University in Virginia with a degree in Communication Studies: Advertising & Public Relations, Victoria merges creative thinking with proven communication strategies.</p>
					<!--end about paragraph-->
					<p class="lastp">She has first-hand experience navigating communications for an international corporation and overseeing the client side of advertising campaigns. Victoria's insights into effective techniques and her ability to deliver strategic solutions make her a valuable part of the team. Victoria is a member of the Boca Raton Chamber of Commerce and has received awards for her work in advertising.</p>
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only</h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=victoria-petrocelli]"); ?></p>
					<!--end blog section

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/victoria-petrocelli/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/libertyuniversity.png" /></p>
					<p class="badge-title">LU</p>
					<p>Victoria is a proud alumna of Liberty University.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/read.png" /></p>
					<p class="badge-title">Reader</p>
					<p>If you enjoyed an interesting book or article, Victoria wants to know! Leadership, religion, business, writing and psychology are some of her favorite topics to enhance her education.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/sunshine.png" /></p>
					<p class="badge-title">Florida Girl</p>
					<p>Victoria loves to enjoy the beach and sunshine all year long.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/drama.png" /></p>
					<p class="badge-title">Artsy</p>
					<p>With a minor in theatre, Victoria has always had an attraction toward music, performance and production.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/twinkletoes.png" /></p>
					<p class="badge-title">Fashionista</p>
					<p>Known for her statement pieces and color-coordinated outfits, Victoria loves all things girly, glittered and glamorous!</p>
					</div>	
					<!--end badges section-->
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>