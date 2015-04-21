<div id="sidebar" class="span3">
<?php if ( !dynamic_sidebar('Sidebar') ) : ?>
	<?php endif; ?>
	<hr>
	<?php if ( is_home() || is_post_type_archive( 'post' ) ) : ?>
		<ul id="side">
			<li>
				<span>Blog Archives</span>
				<ul>
					<?php wp_get_archives() ?>
				</ul>
			</li>
		</ul>
		<hr>
	<?php endif; if ( is_post_type_archive( 'news' ) ) : ?>
		<ul id="side">
			<li>
				<span>News Archives</span>
				<ul>
					<?php pxl::archive(); ?>
				</ul>
			</li>
		</ul>
		<hr>
	<?php endif; ?>
	
	<div class="facebook-box">
		<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FSachsMedia&amp;width=600&amp;height=300&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=true&amp;appId=253839971311174" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100%; height:300px;" allowTransparency="true"></iframe>
	</div>
	<hr>
	<div id="twitter">
		<h3>All ATwitter</h3>
		<a class="twitter-timeline" width="222" height="600" href="https://twitter.com/twitterapi" data-widget-id="277096538856099840">@SachsMediaGrp</a>
			
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>