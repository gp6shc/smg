</div>
<div class="wrapper">
	<div id="curl-shadow"></div>
	<footer>
		<div class="row lined">
			<div class="span3">
				<h4>Our Locations</h4>
				<div class="location">
					<h3><a href="<?php echo home_url('contact')?>#tallahassee">Tallahassee</a></h3>
					<address>
						114 S. Duval Street<br>
						Tallahassee, FL 32301<br>
						Phone: (850) 222-1996<br>
						Fax: (850) 224-2882<br>
						E-mail: <a href="mailto:contact@sachsmedia.com">contact@sachsmedia.com</a>
					</address>
				</div>
				<div class="location">
					<h3><a href="<?php echo home_url('contact')?>#orlando">Orlando</a></h3>
					<address>
						Two Landmark Center<br>
						225 East Robinson Street, Suite 455<br>
						Orlando, FL 32801<br>
						Phone: (407) 219-3157<br>
						Fax: (407) 219-3095<br>
					</address>
				</div>
				<div class="location">
					<h3><a href="<?php echo home_url('contact')?>#boca">Boca Raton</a></h3>
					<address>
						150 East Palmetto Park Road, Suite 800<br/>
						Boca Raton, Florida 33432<br/>
						Phone: (847) 977-9740<br/>
					</address>
				</div>
				<div class="location">
					<h3><a href="<?php echo home_url('team/mark-pankowski/')?>">Washington D.C.</a></h3>
				</div>
			</div>
			<div class="span3">
				<h4>Drop Us a Line</h4>
				<?php echo do_shortcode("[gravityform id=1 title=false ajax=true description=false tabindex=10]"); ?>
			</div>
			<div class="span6">
				<h4>Our Elevator Speech</h4>
				<?php the_field('a_little_bit_about_us', 'options'); ?>

				<div class="row lined regulatory">
					<div class="span3">
						<p class="coprf"><small>PROUD MEMBER</br>
						<a href="http://prfirms.org" target="_blank">COUNCIL of PUBLIC RELATIONS FIRMS</a></small></p>
					</div>
					<div class="span3">
						<p><em>All content © <?php echo date('Y') ?> Sachs Media Group. All rights reserved. Contact: <a href="mailto:<?php the_field('main_contact','options') ?>"><?php the_field('main_contact','options') ?></a> 
							<br><a href="<?php echo bloginfo('siteurl') ?>/privacy-policy">Privacy Policy</a></em></p>
					</div>
				</div>
			</div>
		</div>

<?php if (is_front_page() ):?><script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/resources/js/min/owl.carousel.min.js"></script><?php endif;?>
<script type="text/javascript" src="<?php echo home_url();?>/wp-content/themes/ronsachs/resources/js/min/site.min.js" async="async" defer="defer"></script>

<!-- adroll.com tracking -->
<!--
<script type="text/javascript">
adroll_adv_id = "CREP3LIB2NHCDPBDCETA4K";
adroll_pix_id = "7T2IUC42TNDEFG5IVCC6MN";
(function () {
var oldonload = window.onload;
window.onload = function(){
   __adroll_loaded=true;
   var scr = document.createElement("script");
   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
   scr.setAttribute('async', 'true');
   scr.type = "text/javascript";
   scr.src = host + "/j/roundtrip.js";
   ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
   if(oldonload){oldonload()}};
}());
</script>
-->
<!-- /adroll.com tracking -->
<!-- SharpSpring -->
	<script type="text/javascript"> var _ss = _ss || []; _ss.push(['_setAccount', 'KOI-BGI58S']); _ss.push(['_trackPageView']); (function() { var ss = document.createElement('script'); ss.type = 'text/javascript'; ss.async = true; ss.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'koi-4UXZO.sharpspring.com/client/ss.js?ver=1.1.1'; var scr = document.getElementsByTagName('script')[0]; scr.parentNode.insertBefore(ss, scr); })(); </script>
	<script>(function(){
			window._fbds = window._fbds || {};
			_fbds.pixelId = 1392381684358712;
			var fbds = document.createElement('script');
			fbds.async = true;
			fbds.src = '//connect.facebook.net/en_US/fbds.js';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(fbds, s);
		})();
		window._fbq = window._fbq || [];
		window._fbq.push(["track", "PixelInitialized", {}]);
	</script>
	<noscript><img height="1" width="1" border="0" alt="" style="display:none" src="https://www.facebook.com/tr?id=1392381684358712&amp;ev=NoScript" /></noscript>
<!-- /SharpSpring -->

<!-- Conversion Pixels (FB) -->
	<script type="text/javascript">
	var fb_param = {};
	fb_param.pixel_id = '6007260729204';
	fb_param.value = '0.00';
	(function(){
	  var fpw = document.createElement('script');
	  fpw.async = true;
	  fpw.src = (location.protocol=='http:'?'http':'https')+'://connect.facebook.net/en_US/fp.js';
	  var ref = document.getElementsByTagName('script')[0];
	 ref.parentNode.insertBefore(fpw, ref);
	})();
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6007260729204&amp;value=0" /></noscript>
<!-- /Conversion Pixels (FB) -->
	</footer>
</div>