<?php /* Template Name: Alia */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row lined">
	<div id="sidebar" class="span3">
		<ul id="side">
			<li><a href="<?php echo home_url( '/about' ); ?>">About Us</a></li>
			<li class="">
				<a href="#">Our Team</a>
				<ul>
					<li class="group">Executive</li>
					<li><a href="../ron-sachs/">Ron Sachs</a></li>
					<li><a href="../michelle-ubben/">Michelle Ubben</a></li>
					<li><a href="../ryan-banfill/">Ryan Banfill</a></li>
					<li><a href="../alia-faraj-johnson/">Alia Faraj Johnson</a></li>
					<li><a href="../vicki-johnson/">Vicki Johnson</a></li>
					<li><a href="../lisa-garcia/">Lisa Garcia</a></li>
					<li><a href="../jon-peck/">Jon Peck</a></li>
					<li><a href="../ryan-cohn/">Ryan Cohn</a></li>
					<li><a href="../mark-pankowski/">Mark Pankowski</a></li>
					<li class="group">Client/Creative</li>
					<li><a href="../beth-watson/">Beth Watson</a></li>
					<li><a href="../erica-villanueva/">Erica Villanueva</a></li>
					<li><a href="../jessica-clark/">Jessica Clark</a></li>
					<li><a href="../herbie-thiele/">Herbie Thiele</a></li>
					<li><a href="../trimmel-gomes/">Trimmel Gomes</a></li>
					<li><a href="../zoe-sharron/">Zoe Sharron</a></li>
					<li><a href="../claire-vansusteren/">Claire Vansusteren</a></li>
					<li><a href="../erin-pace/">Erin Pace</a></li>
					<li><a href="../brian-otoole/">Brian O'Toole</a></li>
					<li><a href="../amy-ridings/">Amy Ridings</a></li>
					<li><a href="../courtney-davidson/">Courtney Davidson</a></li>
					<li><a href="../ashley-schaffer/">Ashley Schaffer</a></li>
					<li><a href="../drew-piers/">Drew Piers</a></li>
					<li class="group">Administrative</li>
					<li><a href="../marilyn-siets/">Marilyn Siets</a></li>
					<li><a href="../carmella-bugbee/">Carmella Bugbee</a></li>
					<li><a href="../connie-copeland/">Connie Copeland</a></li>
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
					<p class="follow"><a href="https://twitter.com/aliafaraj" class="twitter-follow-button" data-show-count="false">Follow Alia</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<!--<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Falia.farajjohnson&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>-->
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Alia Faraj-Johnson is a longtime television news producer and reporter and former Gov. Jeb Bush's longest serving communications director. She is a skilled professional spokesperson and has outstanding crisis management skills, having represented a host of state agencies and a broad cross-section of clients.</p>
					<!--end about paragraph-->

					<p>In 2009, She was the winner of the PRNews Legal PR Award for Media Relations during Litigation or Crisis, winner of the 2009 Bronze Bulldog Award for best crisis communications and the 2012 Bronze Bulldog for Crisis Agency of the Year. She is a gubernatorial appointee serving her second term on the Florida Elections Commission. Alia has extensive relationships with the media and throughout state government.</p>

					<p class="lastp"><iframe src="http://www.youtube.com/embed/6pRKAA-Auts?rel=0" frameborder="0" width="100%" height="270"></iframe></p>

			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section-->
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=alia-faraj-johnson]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/alia-faraj-johnson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/american.png" /></p>
					<p class="badge-title">Proud to be an American</p>
					<p>Alia is proud to be an American - became a naturalized citizen in 2004.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/soccer.png" /></p>
					<p class="badge-title">Sporty</p>
					<p>Alia has a precocious 4 year old (Jan 2013) - little sporty girl who loves fast cars, bikes, soccer and golf.  Owns her very own set of Jack Nicklaus golf clubs and tour bag.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/travel.png" /></p>
					<p class="badge-title">Explorer</p>
					<p>Lived in Chile, India, Syria, Jordan, and Taiwan. Traveled down the River Nile, climbed the highest Pyramid, hiked to Petra a 2000 year old city carved by the Nabataeans, enjoyed Athens from the top of the Acropolis, snorkeled in the Red Sea and floated in the Dead Sea.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/web.png" /></p>
					<p class="badge-title">Networker</p>
					<p>Connected - strategic - access through trusted relationships/opens doors -- a policy wonk.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/lightning.png" /></p>
					<p class="badge-title">Lightning</p>
					<p>Claim to fame - was on state plane with Gov. Jeb Bush that was struck by lightening in 2003 -  that night lead mention on NBC Dateline</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>