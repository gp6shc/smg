<?php /* Template Name: Chidozie */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p class="follow"><a href="https://twitter.com/aliafaraj" class="twitter-follow-button" data-show-count="false">Follow Alia</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe-->
					<!--<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Falia.farajjohnson&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>-->
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Chidozie Acey joined the Sachs Media Group team after graduating from Florida A&M University with a degree in Graphic Design.  A skilled designer, Chidozie’s specialties include print design, UI design, branding, illustration and typography.</p>
					<!--end about paragraph-->
					
					<p>Chidozie enjoys growing his design portfolio with new and exciting pieces. While juggling studies at FAMU, he helped design the iPhone application “Vlubbin,” which reached around 25,000 downloads upon its initial release.  At Sachs Media Group, he is known as the fastest illustrator and helps formulate rich compositions for clients like Lauren’s Kids, Accesso LoQueue and Learn More Go Further.</p>

					<p class="lastp">He loves to stay engaged in the latest design trends and loves learning more techniques as he grows. Outside of work, he continues to learn front-end development skills and mastering capoeira. His passion is to help spread effective messages with visually-appealing designs that speak louder than words alone.</p>

					<!--end last p-->
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=chidozie-acey]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/beth-watson/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/music-lover.png" /></p>
					<p class="badge-title">Music Lover</p>
					<p>He couldn’t live without music to get through the day.  He can’t get enough of hip hop, jazz, pop, alternative rock and many other genres.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/striker.png" /></p>
					<p class="badge-title">Striker</p>
					<p>Chidozie graduated from Florida A&M University in May 2014.  Not only that, but he forever continues to strike, strike and strike again. Go Rattlers!</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/adobe.png" /></p>
					<p class="badge-title">Adobe Genius</p>
					<p>Chidozie took the time in college to mentor students in Adobe programs and how to use them effectively.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/giver.png" /></p>
					<p class="badge-title">Lending Hands</p>
					<p>He volunteered with the Tampa Prodigy Cultural Arts Program to help children build their creative talents. </p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/ninja.png" /></p>
					<p class="badge-title">Ninja</p>
					<p>Chidozie is a Naruto nerd.  In addition, he has influence to fight hard and never, ever give up, no matter the odds.</p>
					</div>

					
				</div>
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>