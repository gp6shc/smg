<?php /* Template Name: Emily */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p>A former SMG intern, Emily has a great enthusiasm for the communications field and serves her clients with a long-standing knowledge of strategic planning, and account management. A Tallahassee native, Emily graduated from the University of Florida with a Bachelor of Science in journalism and communications. Upon graduation, she took her skills to Washington, D.C., where she worked for an integrated marketing agency that served high profile, information technology (IT) corporations.</p>
					<p>Her client work includes experience in the areas of public health, education associations, technology, government, senior services, dentistry and product marketing. Emily officially became full-time in 2014, where her passion for advocacy work manifests itself through her involvement with the Lauren’s Kids Foundation, an organization that works to raise awareness about the prevention of childhood sexual abuse.</p>

					<!--last p (pushes padding down)-->
					<p class="lastp">Emily keeps active by volunteering through Junior League Tallahassee and enjoys spending quality time with her family and friends.</p>
					<!--end last p-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/uf.png" /></p>
					<p class="badge-title">Gator Girl</p>
					<p>While raised a Seminole, Emily is a proud alumna of the University of Florida and a Gator through and through!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/dinner.png" /></p>
					<p class="badge-title">Who's Coming to Dinner?</p>
					<p>Drawing from her Italian and Southern roots, Emily is always proud to show off her cooking skills. Fear the garlic, y’all!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/sunset.png" /></p>
					<p class="badge-title">Go Fish!</p>
					<p>Emily is not good at catching fish, but she enjoys any chance she can get to be on the water!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/JLT.png" /></p>
					<p class="badge-title">League Life</p>
					<p>Emily is an active member of the Junior League of Tallahassee, and is proud to work on initiatives that give back to women and children in the Tallahassee community.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/yoga.png" /></p>
					<p class="badge-title">Namaste</p>
					<p>Emily looks to yoga to channel her “inner-Zen.”</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>