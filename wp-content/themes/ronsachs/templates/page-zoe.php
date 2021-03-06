<?php /* Template Name: Zoe */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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

					<!--twitter follow-->
					<p class="follow"><a href="https://twitter.com/zoelinafelt" class="twitter-follow-button" data-show-count="false">Follow Zoe Sharron</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
					<!--end twitter follow-->

                    <!--facebook subscribe
					<p class="subscribe"><iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fryanmmi&amp;layout=standard&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=270&amp;appId=286935158076596" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px;" allowTransparency="true"></iframe></p>
					<!--end facebook subscribe-->

					<!--about paragraph-->
					<p>Zoe joined the Sachs Media Group team in January 2010 as an intern during her senior year at Florida State University. After she graduated summa cum laude with a Bachelor’s degree in English, Zoe became a full-time rhino.</p>
					<p>Zoe is a gifted writer and editor, as well as an accomplished project coordinator, video producer and event planner. Her work with the firm has deepened her knowledge of a broad range of topics, including branding and marketing, children’s issues, health care, agriculture and finance.</p>
					<p>She is a very involved member of the Capital Chapter of the Florida Public Relations Association and currently serves as Programs Committee Chair.</p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp"></p>
					<!--end last p-->
			    
				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/capitol.png" /></p>
					<p class="badge-title">Tally Gal</p>
					<p>Proud Tallahassee native and FSU Grad (2010).</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/film.png" /></p>
					<p class="badge-title">Film Noir</p>
					<p>Loves old films and mystery radio shows.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/quill.png" /></p>
					<p class="badge-title">Feather quill</p>
					<p>Lifelong writer of fiction, non-fiction and poetry.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/startrek.png" /></p>
					<p class="badge-title">Live Long and Prosper</p>
					<p>Star trek nerd.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/music.png" /></p>
					<p class="badge-title">Just a Note</p>
					<p>Loves to sing in community ensembles or choruses.</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>