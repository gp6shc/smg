</div>
<div class="wrapper">
	<div id="curl-shadow"></div>
	<footer>
		<div class="row lined">
			
			<div class="span3">
				<h4>Stop In For Coffee</h4>
				<div class="map">
					<iframe width="200" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=114+S.+Duval+Street+Tallahassee,+FL+32301&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=82.704067,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=114+S+Duval+St,+Tallahassee,+Florida+32301&amp;t=m&amp;ll=30.4412,-84.283419&amp;spn=0.020276,0.034332&amp;z=16&amp;iwloc=A&amp;output=embed"></iframe><br />
				</div>
			</div>
			<div class="span3">
				<h4>Drop Us a Line</h4>
				<?php echo do_shortcode("[gravityform id=1 title=false description=false]"); ?>
			</div>
			<div class="span6">
				<h4>Our Elevator Speech</h4>
				<?php the_field('a_little_bit_about_us', 'options'); ?>

				<div class="row lined">
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
<script type="text/javascript">
/* <![CDATA[ */
var JQLBSettings = {"fitToScreen":"0","resizeSpeed":"400","displayDownloadLink":"0","navbarOnTop":"0","loopImages":"","resizeCenter":"","marginSize":"0","linkTarget":"_self","help":"","prevLinkTitle":"previous image","nextLinkTitle":"next image","prevLinkText":"\u00ab Previous","nextLinkText":"Next \u00bb","closeTitle":"close image gallery","image":"Image ","of":" of ","download":"Download"};
/* ]]> */
</script>

<!-- adroll.com tracking -->
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
<!-- /adroll.com tracking -->

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