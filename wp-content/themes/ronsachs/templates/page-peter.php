<?php /* Template Name: Peter */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<li><a href="../peter-dowling/">Peter Dowling</a></li>
					<li><a href="../trimmel-gomes/">Trimmel Gomes</a></li>
					<li><a href="../zoe-sharron/">Zoe Sharron</a></li>
					<li><a href="../claire-vansusteren/">Claire Vansusteren</a></li>
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
					<p class="follow"><a href="https://twitter.com/HerbieThiele" class="twitter-follow-button" data-show-count="false">Follow HerbieThiele</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<!--<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Falia.farajjohnson&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>-->
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>With a solid background in government communications, Peter combines excellent writing skills with his sound strategic vision as a public affairs specialist for the firm. After leaving home on Anna Maria Island to serve in the U.S. Marine Corps, he earned a master's degree in International Affairs from Florida State University before moving to Washington, D.C. to handle correspondence issues for Secretary of Homeland Security Janet Napolitano.</p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">Peter went on to become a writer for U.S. Citizenship and Immigration Services, where he created communications plans to help customers use its new electronic immigration system (USCIS ELIS). He came back home in early 2013 to join Sachs Media Group, where he enjoys communicating with Florida's diverse audiences and working on issues to make our Sunshine State a better place to live. Peter resides in Tallahassee with his lovely wife Lisa and dog Harry.</p>
					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<!--<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=jessica-clark]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/jessica-clark/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/voice.png" /></p>
					<p class="badge-title">The People's Voice</p>
					<p>It takes thoughtful and aggressive messaging to shift public opinion. Peter has a passion for reaching people on a personal level and the drive to consistently deliver content that is smart and relevant, a lethal combination in today's PR world.</p>
					<div id="bottom-line"></div>
					
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/american.png" /></p>
					<p class="badge-title">Veterans</p>
					<p>Peter cares deeply for his fellow veterans in making sure they receive the education and care they deserve.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/beach.png" /></p>
					<p class="badge-title">Beach Bum</p>
					<p>On the weekends, you can usually find Peter at the pool or making a trip down to his favorite beach on Anna Maria Island.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/tree.png" /></p>
					<p class="badge-title">Outdoor Enthusiast</p>
					<p>Whether it involves running, biking or just taking a long walk down the beach, Peter takes every opportunity to enjoy Florida and its great outdoor pursuits.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/baseball.png" /></p>
					<p class="badge-title">Baseball</p>
					<p>America's greatest pastime has no better venue than Florida. A southpaw in high school, Peter never misses a chance to catch a Braves game or see the Noles dominate at Mike Martin field.</p>


					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>