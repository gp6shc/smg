<div class="row">
	<header class="span12"><h4>Here's The Scoop</h4></header>
</div>
<div id="scoop" class="row lined">
	<?php echo do_shortcode("[posts type=news show=4 loop=post-news]"); ?>
</div>
<div class="row spaced">
	<div id="hot" class="span6">
		<header><h4>Hot Off the Blog</h4></header>
		<?php echo do_shortcode("[posts category_name=hotofftheblog show=1 loop=post-blog]"); ?>
	</div>
	<div id="be-social" class="span6">
		<header><h4>Let's Be Social</h4></header>
		<div class="row lined">
			<div class="span3">
				<div class="facebook-box" style="margin-top:-6px;">
				<h3>Facebook Us</h3>
<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FSachsMedia&amp;width=222&amp;height=427&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=true&amp;appId=175195112639351" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:222px; height:296px;" allowTransparency="true"></iframe>
				</div>
			</div>
			<div id="twitter" class="span3" style="height:362px;margin-top:-2px;">
				<h3>All ATwitter</h3>
				
				<a class="twitter-timeline" width="222" height="296" href="https://twitter.com/twitterapi" data-widget-id="277096538856099840">@SachsMediaGrp</a>
			
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

			</div>
		</div>
	</div>
</div>
<div class="row">
	<header class="span12"><h4>Creative Spotlight</h4></header>
	<div id="new-work-slider" class="span12">
		<div class="work-slide">
			<div><?php echo do_shortcode("[posts type=work show=3 loop=post-slider]"); ?></div>
		</div> 
		<div class="work-slide">
			<div><?php echo do_shortcode("[posts type=work show=3 offset=3 loop=post-slider]"); ?></div>
		</div>
	</div>
	<div id="new-work" class="span12">
		<div class="row">
			<?php echo do_shortcode("[posts type=work show=4 loop=post-slider]"); ?>
		</div>
	</div>
</div>
