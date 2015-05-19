<div class="row spaced intro">
	<p class="span6">
		<iframe width="449" height="198.4" src="https://www.youtube.com/embed/DWlBwezbkj8?controls=0&modestbranding=1&rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
	</p>
	<div class="span6">
		<?php the_content() ?>
	</div>
</div>

<div class="row">
	<h4>Our Work</h4>
	<div id="new-work-slider">
		<?php echo do_shortcode("[posts type=work show=11 loop=post-slider]"); ?>
		<div class="work portfolio">
			<a href="http://gator-air.local:5757/our-work/">
				<div class="portfolio-more">
					<i class="fa fa-3x fa-arrow-circle-right"></i>
					<h3>View More of Our Work</h3>
				</div>
			</a>	
		</div>
	</div>
</div>

<div class="row">
	<h4>In the News</h4>
	<div class="scoop row lined">
		<?php echo do_shortcode("[posts type=news show=4 loop=post-news]"); ?>
	</div>
</div>

<div class="row">
	<div id="hot" class="span6">
		<h4>Hot Off the Blog</h4>
		<?php echo do_shortcode("[posts category_name=hotofftheblog show=2 loop=post-blog]"); ?>
	</div>
	<div id="be-social" class="span6">
		<h4>Let's Be Social</h4>
		<div class="row lined">
			<div class="span6">
				<div class="facebook-box">
					<h3>Facebook Us</h3>
					<div class="fb-page" data-href="https://www.facebook.com/sachsmedia" data-hide-cover="false" data-show-facepile="true" data-show-posts="false" width="450">
						<div class="fb-xfbml-parse-ignore">
							<blockquote cite="https://www.facebook.com/sachsmedia">
								<a href="https://www.facebook.com/facebook">Facebook</a>
							</blockquote>
						</div>
					</div>
				</div>
			</div>
			<div id="twitter" class="span6">
				<h3>All ATwitter <a href="https://twitter.com/SachsMediaGrp" target="_blank" class="twitter-handle">@SachsMediaGrp</a></h3>
				<a class="twitter-timeline" href="https://twitter.com/SachsMediaGrp" data-chrome="noheader nofooter noborder" data-widget-id="593808855299133442">Tweets by @SachsMediaGrp</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
			</div>
		</div>
	</div>
</div>
