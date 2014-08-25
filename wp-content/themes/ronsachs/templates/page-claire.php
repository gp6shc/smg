<?php /* Template Name: Claire */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/cvansusteren" class="twitter-follow-button" data-show-count="false">Follow cvansusteren</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fbrianzotoole&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Claire VanSusteren joined the Ron Sachs Communications team in the fall of 2011. She has helped to implement an award-winning statewide advocacy campaign for Lauren’s Kids to raise awareness about child sexual abuse. Claire graduated from Florida State University's College of Communication and Information, earning a Bachelor's degree in Public Relations, and was the recipient of the College’s Outstanding Public Relations Student Award. After graduation, Claire traveled to Washington, D.C., to expand her communication skill set while working for zcomm, a Certified Women’s Business Enterprise and one of D.C.’s top 15 agencies.</p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">Claire is currently a committee chair for the FPRA Capital Chapter and holds certificates in Leadership Studies and Developmental Disabilities. She is a two-time FPRA Image Award winner.</p>
					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section-->
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=claire-vansusteren]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/brian-otoole/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/caring.png" /></p>
					<p class="badge-title">Community Volunteer</p>
					<p>Claire is committed to making her community a better place and has volunteered with several non-profit agencies around town since coming to Tallahassee in 2008, including Challenger Swim, Pyramid, the Big Bend Homeless Coalition and most recently, Capital City Youth Services.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/ribbon.png" /></p>
					<p class="badge-title">Teal Awareness Ribbon</p>
					<p>Claire has become an advocate for awareness, education and change surrounding the issue of child sexual abuse through her work with client Lauren’s Kids.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/roadrunner.png" /></p>
					<p class="badge-title">Roadrunner</p>
					<p>Claire is a high-energy, hit-the-ground-running kind of girl!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/seminole.png" /></p>
					<p class="badge-title">Seminole Alum</p>
					<p>F-L-O-R-I-D-A...S-T-A-T-E...Florida State, Florida State, Florida State! Wooh! Proud Seminole alum!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/tree.png" /></p>
					<p class="badge-title">Outdoor Enthusiast</p>
					<p>Claire spent three months living in a tent...two summers in a row! She’s an outdoor enthusiast and long-time Girl Scout who loves kayaking and nature walks and can start a mean campfire.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>