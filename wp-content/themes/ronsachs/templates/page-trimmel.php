<?php /* Template Name: Trimmel */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<li><a href="../vicki-johnson/">Vicki Johnson</a></li>
					<li><a href="../lisa-garcia/">Lisa Garcia</a></li>
					<li><a href="../jon-peck/">Jon Peck</a></li>
					<li><a href="../ryan-cohn/">Ryan Cohn</a></li>
					<li><a href="../mark-pankowski/">Mark Pankowski</a></li>
					<li><a href="../karen-cyphers/">Karen Cyphers</a></li>
					<li class="group">Client/Creative</li>
					<li><a href="../beth-watson/">Beth Watson</a></li>
					<li><a href="../erica-villanueva/">Erica Villanueva</a></li>
					<li><a href="../jessica-clark/">Jessica Clark</a></li>
					<li><a href="../herbie-thiele/">Herbie Thiele</a></li>
					<li><a href="../trimmel-gomes/">Trimmel Gomes</a></li>
					<li><a href="../zoe-sharron/">Zoe Sharron</a></li>
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
					<p class="follow"><a href="https://twitter.com/TrimmelG" class="twitter-follow-button" data-show-count="false">Follow Trimmel</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

					<!--about paragraph-->
					<p>With more than 11 years as a radio and television newsman, Trimmel has covered almost everything under the sun in Florida. Before joining Sachs Media Group, Trimmel was the News Director of Florida Public Radio/WFSU-FM, coordinating statewide coverage of news and information that affect the lives of everyday Floridians. </p>
					<!--end about paragraph-->

					<p class="lastp">National Public Radio frequently featured his work and PBS also tapped him as national correspondent.  Trimmel, a graduate of the University of Florida College of Journalism and Communications, has won several awards and honors for his work.</p>

			   
					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only</h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=alia-faraj-johnson]"); ?></p>
					end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/alia-faraj-johnson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/travel.png" /></p>
					<p class="badge-title">Globe Trekker</p>
					<p>Trimmel is all about adventure travel, taking random trips anywhere in the world in the most cost-efficient way. He’s our frugal traveler.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/film.png" /></p>
					<p class="badge-title">Radio/TV</p>
					<p>Why choose? With his background shuffling between both platforms, he’s always ready to go live!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/tree.png" /></p>
					<p class="badge-title">Adventure</p>
					<p>Trimmel is always willing to try something random and new. Spelunking anyone?</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/eat.png" /></p>
					<p class="badge-title">Foodie</p>
					<p>Whenever and wherever on the road – if your eatery was featured on the Food Network, chances are Trimmel will make a stop to try the best of the best.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/uf.png" /></p>
					<p class="badge-title">Gator</p>
					<p>University of Florida grad with just the right mix of orange and blue running through his veins.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>