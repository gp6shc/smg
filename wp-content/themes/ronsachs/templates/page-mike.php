<?php /* Template Name: Mike Felton */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<li class="group">Client/Creative</li>
					<li><a href="../beth-watson/">Beth Watson</a></li>
					<li><a href="../erica-villanueva/">Erica Villanueva</a></li>
					<li><a href="../jessica-clark/">Jessica Clark</a></li>
					<li><a href="../herbie-thiele/">Herbie Thiele</a></li>
					<li><a href="../peter-dowling/">Peter Dowling</a></li>
					<li><a href="../trimmel-gomes/">Trimmel Gomes</a></li>
					<li><a href="../zoe-sharron/">Zoe Sharron</a></li>
					<li><a href="../michael-felton/">Michael Felton</a></li>
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
					<p class="follow"><a href="https://twitter.com/Mike_FeltonFLA" class="twitter-follow-button" data-show-count="false">Follow Mike</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fron.sachs&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Michael is a consumer service specialist with more than six years of experience. He is pursuing a degree in marketing and is currently enrolled at Tallahassee Community College. </p>

					<p>As the community relation’s coordinator at RSC, Michael oversees pro bono projects and assists the CEO with special community initiatives.</p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">Michael participated in the rebranding of the Florida Department of Veterans’ Affairs (FDVA) and helped with the creation of the new mobile app that connects veteran's with earned benefits.</p>
					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section-->
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=michael-felton]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/michael-felton/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/network.png" /></p>
					<p class="badge-title">Service First</p>
					<p>Mike has more than 6 years of customer and public relations experience.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/family.png" /></p>
					<p class="badge-title">Family</p>
					<p>Mike comes from a large, close-knit family and is the youngest of 6 siblings.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/film.png" /></p>
					<p class="badge-title">Movie Buff</p>
					<p>Mike considers himself to be a movie buff.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/magic.png" /></p>
					<p class="badge-title">Go Magic!</p>
					<p>Mike is a die-hard Orlando Magic fan; born and raised in Orlando.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/workout.png" /></p>
					<p class="badge-title">Gym-rat</p>
					<p>Mike loves to workout and can be found shooting hoops regularly at Sue McCollum Community Center.</p>
					</div>	
					<!--end badges section-->

				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>