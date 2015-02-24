<?php /* Template Name: Uchi */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/ericavillanueva" class="twitter-follow-button" data-show-count="false">Follow EricaVillanueva </a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fericadvillanueva&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraphs-->

					<!--last p (pushes padding down)-->
					<p class="lastp">Michael is a designer who pairs creative chops with a strategic mindset. While earning a M.A. in integrated marketing from Florida State University he set himself on a mission to help companies become part of other peoples’ lives through design. Michael managed marketing campaigns for FSU, garnering record attendance numbers for large campus events, before joining the team. He continues to produce award-winning creative work in addition to directly working with clients to solve communications problems and achieve their goals. He has in-depth experience in several areas, ranging from but not limited to visual identity, branding, Web design, print design, typography and integrated campaign management.</p>
					<!--end last p-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/guitar.png" /></p>
					<p class="badge-title">Ramblin' Man</p>
					<p>Michael believes there is no better way to de-stress than a sitting on a porch with a six-string.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/hawaii.png" /></p>
					<p class="badge-title">Islander Spirit</p>
					<p>Though he grew up in Florida, Michael’s family has lived in Hawai’i for more than 100 years.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/typewriter.png" /></p>
					<p class="badge-title">Wordsmith</p>
					<p>Michael loves finagling with vocabulary, so much so he was published in the Kudzu Review.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/catan.png" /></p>
					<p class="badge-title">Catan Fan</p>
					<p>He cannot get enough of<br/>“The Board Game of Our Time”,<br/> Settlers of Catan.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/US.png" /></p>
					<p class="badge-title">Statesman</p>
					<p>He can recite all fifty states in alphabetical order on command.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>