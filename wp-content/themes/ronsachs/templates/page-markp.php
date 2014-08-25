<?php /* Template Name: Mark P */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
				<div class="span9">
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
					<p>Mark Pankowski brings more than 25 years of experience as an award-winning journalist, media relations specialist and crisis communications expert. Mark spent a decade as a reporter, news editor and business editor at The Tallahassee Democrat and The Orlando Sentinel.</p>
					
					<p>He then joined Sachs Media Group as a Senior Vice President, leading high-impact communications efforts for such clients as the Florida Medical Association, Huizenga Holdings/Miami Dolphins, the Florida League of Cities and Joe DiMaggio Children’s Hospital.</p>
					
					<p>Mark later became Senior Vice President at Dezenhall Resources, one of the nation’s leading crisis communications firms. For 10 years, he led the firm’s media efforts for a variety of major companies in the chemical, plastics, pharmaceutical and food-ingredient industries.</p>
					
					<p>Mark continues his work today in media relations and crisis communications for Sachs Media Group. His clients have included national associations, Fortune 500 companies, and celebrities.</p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">Mark is a Phi Beta Kappa graduate of Notre Dame.</p>

					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=beth-watson]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/beth-watson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span9"> <!-- *******switch back to span 3, and uncomment below to get badges back -->
					<!--badges section-->
					<!--<div id="badges">
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/cook.png" /></p>
					<p class="badge-title">App-lover</p>
					<p>Loves to cook for big family dinners or celebrations.  Thinks appetizers should be a basic food group.  Secretly longs to be a caterer and is famous for her 9-Layer Dip.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/disney2.png" /></p>
					<p class="badge-title">Mouse</p>
					<p>Conducted guided tours of the Magic Kingdom. A summer job became a 20-year career culminating in an 8-year stint in Disney’s Community Relations office.  Developed a lifelong passion for corporate philanthropy.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/tv.png" /></p>
					<p class="badge-title">Remote</p>
					<p>Avid devotee of well-written and produced television shows.  Has seen all episodes of Law and Order, but her favorite is SVU.  Limits reality TV to competition shows, the Kardashians, and Toddlers and Tiaras. Can sing theme songs to old sitcoms ranging from Gilligan’s Island to That Girl to Petticoat Junction.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/family.png" /></p>
					<p class="badge-title">Menagerie</p>
					<p>Ridiculously proud of two grown daughters, and hopelessly in love with Katie, the Cocker Spaniel, Jersey Boy, the German Shepherd, and three pound kitties, Mr. Boots, Brighton, and Bellatrix Lestrange.  Takes care of widowed Mom, and misses Dad terribly.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/survivor.png" /></p>
					<p class="badge-title">Survivor</p>
					<p>Best problem solver ever. Clever, creative, and fearless.  Annoys friends, family and strangers by always knowing a better way.  Seriously, you want her on your Survivor tribe – but bring sunscreen.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/school.png" /></p>
					<p class="badge-title">Lifelong Learner</p>
					<p>Big believer in the value of education and a strong proponent of quality public schools.  Certified secondary English Language Arts instructor. Serves on the board of A Gift For Teaching which provides resources and surplus materials to classroom teachers for their students in need.</p>
					</div>	-->

					
				</div>
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>