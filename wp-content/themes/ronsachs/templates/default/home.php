<div class="row spaced intro">
	<p class="span6">
		<iframe width="449" height="198.4" src="https://www.youtube.com/embed/DWlBwezbkj8?controls=0&modestbranding=1&rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
	</p>
	<div class="span6">
		<?php the_content() ?>
	</div>
</div>

<div class="row anniv-promo">
	<h2>20 Years of Impact 
	<svg class="anniv-chev" viewBox="0 0 80 125" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
	    <g id="Page-1" stroke="none" fill="ffffff" fill-rule="evenodd" sketch:type="MSPage">
	        <path d="M78.5328185,65.9894541 L21.2355212,123.526675 C20.2574003,124.508892 19.0990991,125 17.7606178,125 C16.4221364,125 15.2638353,124.508892 14.2857143,123.526675 L1.46718147,110.654467 C0.489060489,109.67225 0,108.509098 0,107.165012 C0,105.820926 0.489060489,104.657775 1.46718147,103.675558 L42.4710425,62.5 L1.46718147,21.3244417 C0.489060489,20.342225 0,19.1790736 0,17.8349876 C0,16.4909016 0.489060489,15.3277502 1.46718147,14.3455335 L14.2857143,1.47332506 C15.2638353,0.491108354 16.4221364,0 17.7606178,0 C19.0990991,0 20.2574003,0.491108354 21.2355212,1.47332506 L78.5328185,59.0105459 C79.5109395,59.9927626 80,61.155914 80,62.5 C80,63.844086 79.5109395,65.0072374 78.5328185,65.9894541 L78.5328185,65.9894541 Z" id="Shape" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
	    </g>
	</svg>
	</h2>
	<p>As we celebrate 20 years in business, we are so grateful for the clients, the partners and the team members who made our success possible. Looking back over the past 20 years, we are proud of the impact we’ve made in the lives of the people who have worked here, the issues our work has touched, and the community we love.</p>
	<ul class="anniv-nav">
		<li><a href="/anniversary/people">People</a></li>
		<li><a href="/anniversary/community">Community</a></li>
		<li><a href="/anniversary/issues">Issues</a></li>
	</ul>
</div>

<div class="row">
	<h4>Our Work</h4>
	<div id="new-work-slider">
		<?php echo do_shortcode("[posts type=work show=11 loop=post-slider]"); ?>
		<div class="work portfolio">
			<a href="<?= home_url('our-work')?>">
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
	<h4>Our Clients</h4>
	<div id="logos" class="logos">
		<img src="<?= home_url()?>/wp-content/themes/ronsachs/resources/images/logo-box-01.jpg"/>
		<img src="<?= home_url()?>/wp-content/themes/ronsachs/resources/images/logo-box-02.jpg"/>
		<img src="<?= home_url()?>/wp-content/themes/ronsachs/resources/images/logo-box-03.jpg"/>
		<img src="<?= home_url()?>/wp-content/themes/ronsachs/resources/images/logo-box-04.jpg"/>
		<img src="<?= home_url()?>/wp-content/themes/ronsachs/resources/images/logo-box-05.jpg"/>
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
