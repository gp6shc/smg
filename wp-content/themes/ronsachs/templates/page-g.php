<?php /* Template Name: G */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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

					<!--about paragraph-->
					<p>Giavona “G” Williams is a United States Navy veteran and senior designer with both in-house and agency experience. Her creative specialties include print, multimedia, branding, layout and typography, with experience in UI, UX, and Web design. G earned her bachelor’s degree in graphic design from S.I. Newhouse School of Public Communications at Syracuse University. In addition, she also holds a bachelor’s degree in African-American Studies and Spanish.</p>
					<p>G’s work is known for clean type and clean imagery. She is a natural leader and approaches each project with enthusiasm! Her energetic personality keeps the design team motivated every day. With multiple ADDY® awards and two International IMCA Showcase Awards to her name, her work shines among the best for a wide range of clients and issues.</p>

					<!--last p (pushes padding down)-->
					<p class="lastp">In her spare time, G loves playing soccer in the Tallahassee Adult League, spending time with her family, taking care of her Brittany spaniel, and of course traveling on her Harley-Davidson motorcycle.</p>
					<!--end last p-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/syracuse.png" /></p>
					<p class="badge-title">Orange Woman!</p>
					<p>Raised in Pennsylvania surrounded by Penn State fans, G knew she would one day become a Syracuse Orange. She is an alumnus from the Journalism program and proudly bleeds orange and blue!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/anchor.png" /></p>
					<p class="badge-title">Navy Sailor</p>
					<p>The Navy runs in G’s family. Her father and uncle both served in the Navy during Vietnam, and she just had to follow. The Navy is still a huge part of her life as she carries over the wisdom she learned into her creative career. Hence, she is fond of structure and knows how important teamwork is, not only to save lives, but to get things done at your strongest!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/harley.png" /></p>
					<p class="badge-title">Harley Chick</p>
					<p>G took up riding 6 years ago. Her fiancé introduced her to HD and she has never looked back. She enjoys riding her bike to bike rallies and on weekend getaways. However, if you see a lime green bike around Tallahassee, with a ponytail sticking out of a helmet, that’s definitely G!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/soccer-2.png" /></p>
					<p class="badge-title">Defense wins Championships!</p>
					<p>G has been an athlete all of her life and has played soccer since she was six. She is part of the Tallahassee Adult Soccer league, and spends almost every Sunday at games, followed by “icing parties” on Mondays.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/compass.png" /></p>
					<p class="badge-title">World Traveler</p>
					<p>She is very passionate about traveling. She just loves to get her passport stamped! She has traveled to many countries: Amsterdam, Italy, London, Ireland, Portugal, Spain, France, Scotland, Belize, and Morocco!</p>
					</div>
				</div>
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>