<?php /* Template Name: Ryan B. */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/ryban1001" class="twitter-follow-button" data-show-count="false">Follow RyanBanfill</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fryan.banfill&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=467527463282526" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->
					
					<!--ig -->
					<p class=""><a href="http://instagram.com/ryban1001" target="_blank"><img src="http://www.midcoast.org/images/instagram-logo.png"/></a></p>
					<!--end ig subscribe-->

					<!--about paragraph-->
					<p>With a deep background in politics and public policy in the legislative and executive branches of Florida government, Ryan specializes in public affairs communications for the firm. Before joining Ron Sachs Communications in 2005, Ryan worked as a television reporter/producer; speechwriter/press secretary for Gov. Lawton Chiles; regional communications lead for NFIB; communications director, Florida House Democratic Caucus; communications director, Florida Democratic Party; and staff director, Florida Senate Democratic Caucus.</p>
					<!--end about paragraph-->

					<p>Ryan's work has received a number of accolades including the 2008 Florida Public Relations Association Dick Pope All Florida Golden Image Award Yes on Amendment 4 for Conservation campaign; 2012 Bulldog Reporter Media Relations Bronze Award winner for Public Affairs Agency of the Year for the Bad Bet for Florida campaign; 1993 Suncoast Regional Emmy Award, Public Affairs Programs. </p>

					<p class="lastp"><iframe src="https://www.youtube.com/embed/nk6f7uoJ2ls?rel=0" frameborder="0" width="100%" height="270"></iframe></p>
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section-->
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=ryan-banfill]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/ryan-banfill/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/uf.png" /></p>
					<p class="badge-title">Gator</p>
					<p>Graduated from the University of Florida in 1987 with a BS in Telecommunication and a Political Science minor. If it's a fall Saturday, Ryan is probably somewhere wearing Orange and Blue and screaming at the top of his lungs.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/family.png" /></p>
					<p class="badge-title">Home Base</p>
					<p>Life is completed by his wife and three children who keep him busy, sane and happy.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/guitar.png" /></p>
					<p class="badge-title">"These Go to 11"</p>
					<p>Relaxes by writing music and recording, <a href="https://soundcloud.com/ryban1001" target="_blank">like this</a>.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/vote.png" /></p>
					<p class="badge-title">Political Animal</p>
					<p>Follows the ebbs and flows of state and national politics. Bitten by the political bug after Kansas Governor Robert Docking (who served from 1967 to 1975) responded to a letter he sent, Ryan idolized John and Robert Kennedy, closely followed the Watergate hearings and learned the power of the vote when he cast the deciding vote for Jimmy Carter in an elementary school election in 1976. Personal political highlights include covering the 1988 Republican National Convention, serving as senior speechwriter and press secretary for Gov. Lawton Chiles and working with Florida lawmakers during the 2000 presidential election recount.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/disc.png" /></p>
					<p class="badge-title">Desert Island Discs</p>
					<p>(Top Five: Only 1 per artist allowed) 1. The Beatles (White Album) 2. Quadrophenia (The Who) 3.Sticky Fingers (The Rolling Stones) 4. Wish You Were Here (Pink Floyd) 5. Physical Graffiti (Led Zeppelin) </p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>