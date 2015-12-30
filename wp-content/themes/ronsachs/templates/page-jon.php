<?php /* Template Name: Jon */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
					<p>A strong, fast writer and unrepentant editor, Jon has never seen a sentence he didn’t think could be improved. After graduating from journalism school (Go Mizzou!), he landed a reporting job in Tampa back when there were those creatures called “afternoon newspapers.” That job brought him to Tallahassee, where he fell in love – with the town (Go Noles!), and with an amazing woman. </p>
					<!--end about paragraph-->

					<p>Jon eventually left journalism and embarked on a 26-year-career in state government that included communications duties for one governor (Bob Martinez), three Attorneys General and four executive agency heads. In early 2012, Jon enthusiastically joined the team at Ron Sachs Communications, where he quickly learned how easy it is to do good work when you’re surrounded by outstanding professionals.</p>

					<p class="lastp"><iframe src="https://www.youtube.com/embed/_X5oSSLsim0?rel=0" frameborder="0" width="100%" height="270"></iframe></p>
			    
					<!--keep up with-->
					<!--<h3 class="team">Keep Up With <?php echo get_the_title(); ?></h3>-->
					<!--end keep up with-->

					<!--blog section
					<h2 class="blog"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Blog Articles<!--echos first name only--></h2>

					<!--<p><?php echo do_shortcode("[posts show=3 loop=post-blog category_name=jon-peck]"); ?></p>
					<!--end blog section-->

					<!--more articles section-->	
					<!--<p class="more">View More Articles by: <a href="../category/jon-peck/"><?php echo get_the_title(); ?></a>
					</p>-->
					<!--end more article section-->

				</div><!--end span6-->
			
				<div class="span3">
					<!--badges section-->
					<div id="badges">
					<h3 class="team"><?php $title = get_the_title();$title_array = explode(' ', $title);$first_word = $title_array[0];echo $first_word;?>'s Badges</h3><!--echos first name only-->
					<p><img src="<?php bloginfo('template_directory'); ?>/badges/capitol.png" /></p>
					<p class="badge-title">Of the people</p>
					<p>Jon has spent his entire adult life observing government up close. It isn’t pretty, he says – but it's still the most remarkable system anywhere.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/quill.png" /></p>
					<p class="badge-title">Golden Quill</p>
					<p>Is it really that hard to understand the difference between ‘that’ and ‘which’?  Between ‘that’ and ‘who’?  To understand why it’s “he and I,” not “him and me”?”</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/beatles.png" /></p>
					<p class="badge-title">Beatles</p>
					<p>To Jon's thinking, pretty much everything can be related back to baseball or the Beatles.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/family.png" /></p>
					<p class="badge-title">HomeFire</p>
					<p>Jon has a wonderful wife, three sons, two daughters-in-law (and another on the way), and three grandchildren.</p>
					<div id="bottom-line"></div>

					<p><img src="<?php bloginfo('template_directory'); ?>/badges/tigers.png" /></p>
					<p class="badge-title">Mizzou-Rah</p>
					<p>Now that Missouri has joined the SEC, Jon has double the reason to root against the Gators. Go Mizzou! Go Noles!</p>
					</div>	
					<!--end badges section-->
					
				</div><!--end span 3-->
				
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>