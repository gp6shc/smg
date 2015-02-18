<?php /* Template Name: Design Portfolio */ pxl::page(); while ( have_posts() ) : the_post(); ?>
<head>
<!--[if lt IE 7]>
<link href="stylesheets/screen-ie6.css" type="text/css" rel="stylesheet" media="screen,projection" />
<![endif]-->
</head>

<link rel="stylesheet" href="http://sachsmedia.com/wp-content/themes/ronsachs/resources/lightbox/lightbox.css" type="text/css" media="screen" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://sachsmedia.com/wp-content/themes/ronsachs/resources/js/portfolio-filter.js"></script>
<script type="text/javascript" src="http://sachsmedia.com/wp-content/themes/ronsachs/resources/lightbox/lightbox.js"></script>

<!--override styling-->
<style>
.clearing{clear:both}.last{margin-bottom:0}.screenReader{left:-9999px;position:absolute;top:-9999px}ul#filter{list-style-type:none;margin:0 0 0 10px;padding:0 0 20px;position:relative}ul#filter li{float:left;line-height:16px;margin-right:10px;padding-right:10px}ul#filter li+li{border-left:1px solid #000;padding-left:15px}ul#filter li:last-child{border-right:0;margin-right:0;padding-right:0}ul#filter a{color:#000;text-decoration:none;font-family:Arvo,serif;font-size:13px;list-style-type:none;text-transform:uppercase;cursor:pointer}ul#filter li.current a,ul#filter a:hover{text-decoration:underline;color:#DA1F26}ul#filter li.current a{color:#000;font-weight:700;text-decoration:none}ul#portfolio{float:left;list-style:none;margin-top:-60px;margin-left:-30px;width:100%}ul#portfolio li{float:left;margin:0 33px 15px 0;width:185px}ul#portfolio a{width:100%}ul#portfolio a:hover{text-decoration:none}ul#portfolio img{display:block;padding-bottom:5px;width:185px;height:115px}.post h3{border-bottom:2px solid #000;line-height:24px;margin-top:10px;padding-bottom:10px;padding-left:0;position:relative}.post h3::before{background:none!important;content:'';display:block;height:16px;left:0;position:absolute;top:2px;width:16px}article{width:100%;margin:0 auto;margin-bottom:80px}article h3{font-size:22px}#row3 div{float:left;margin-right:-100%;width:225px}#row3 div:nth-child(4n+1){margin-left:0;margin-bottom:20px;clear:both;overflow:hidden;*zoom:1}#row3 div:nth-child(4n+2){margin-left:245px;margin-bottom:20px;clear:none}#row3 div:nth-child(4n+3){margin-left:490px;margin-bottom:20px;clear:none}#row3 div:nth-child(4n+4){margin-left:735px;margin-bottom:20px;clear:none}#Grid .mix{opacity:0;display:none}.shadow{z-index:20!important}
</style>

<?php
//description 1 - Explore Adoption
$charset = 'UTF-8';
$length = 90;
$string1 = 'Worked with the Executive Office of the Governor to brand a campaign encouraging adoption of sibling groups, disabled children and older children via the state\'s program. We produced many items, including PSAs, a website and an Explore Adoption marketing kit for partners that included a poster, brochure, button, DVD, window cling and informational one-pagers in English, Spanish and Creole';
if(mb_strlen($string1, $charset) > $length) {
  $string1 = mb_substr($string1, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_adoption.jpg" class="read-more" rel="lightbox" title="Worked with the Executive Office of the Governor to brand a campaign encouraging adoption of sibling groups, disabled children and older children via the state\'s program. We produced many items, including PSAs, a website and an Explore Adoption marketing kit for partners that included a poster, brochure, button, DVD, window cling and informational one-pagers in English, Spanish and Creole. &lt;a href=&quot;http://sachsmedia.com/case-study/explore-adoption/&quot;&gt;Click Here to View Case Study&lt;/a&gt;">... READ MORE</a>';
}
//description 2 - Don't Miss the Signs
$length = 90;
$string2 = 'Collaborated with the Florida Department of Children and Families and the Lauren\'s Kids foundation to conceptualize, design and produce a branded campaign including online content (microsite, online petition/pledge, television and radio PSAs, online survey, video message, online training and certification tool, social media content) and print materials in English, Spanish and Creole (brochure, rack card, bookmark, training handbook, posters, billboards and other outdoor advertisements).';
if(mb_strlen($string2, $charset) > $length) {
  $string2 = mb_substr($string2, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_dmts.jpg" class="read-more" rel="lightbox" title="Collaborated with the Florida Department of Children and Families and the Lauren\'s Kids foundation to conceptualize, design and produce a branded campaign including online content (microsite, online petition/pledge, television and radio PSAs, online survey, video message, online training and certification tool, social media content) and print materials in English, Spanish and Creole (brochure, rack card, bookmark, training handbook, posters, billboards and other outdoor advertisements).">... READ MORE</a>';
}
//description  3 - SSK
$length = 90;
$string3 = 'Conceptualized, branded, designed and launched the Safer, Smarter Kids abuse prevention curriculum for public school VPK and kindergarten students across Florida. We expanded the brand by also creating Safer, Smarter Kids curriculum for children with special needs and designed a training curriculum for foster parents who are caring for a child with a sexual abuse history. The Safer, Smarter Kids curricula also includes an online tool to help parents facilitate a conversation with their children about abuse prevention and safety.';
if(mb_strlen($string3, $charset) > $length) {
  $string3 = mb_substr($string3, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_ssk.jpg" class="read-more" rel="lightbox" title="Conceptualized, branded, designed and launched the Safer, Smarter Kids abuse prevention curriculum for public school VPK and kindergarten students across Florida. We expanded the brand by also creating Safer, Smarter Kids curriculum for children with special needs and designed a training curriculum for foster parents who are caring for a child with a sexual abuse history. The Safer, Smarter Kids curricula also includes an online tool to help parents facilitate a conversation with their children about abuse prevention and safety.">... READ MORE</a>';
}
//description  4 - FDVA
$length = 90;
$string4 = 'Rebranded the 24-year-old Florida Department of Veterans\' Affairs to help them better reach the 1.6 million veterans in Florida. We branded the department with a new logo, designed and programmed a new website, produced PSAs, created a mobile app, online and print advertisements, and designed images for social media, marketing and collateral materials.';
if(mb_strlen($string4, $charset) > $length) {
  $string4 = mb_substr($string4, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_fdva.jpg" class="read-more" rel="lightbox" title="Rebranded the 24-year-old Florida Department of Veterans’ Affairs to help them better reach the 1.6 million veterans in Florida. We branded the department with a new logo, designed and programmed a new website, produced PSAs, created a mobile app, online and print advertisements, and designed images for social media, marketing and collateral materials. &lt;a href=&quot;http://sachsmedia.com/case-study/florida-department-of-veterans-affairs/&quot;&gt;Click Here to View Case Study&lt;/a&gt;">... READ MORE</a>';
}
//description  5 - Volunteer Florida
$length = 90;
$string5 = 'Rebranded the governor\'s commission on volunteerism and community service, designed and programmed a new website, identity package, annual report, e-newsletter, marketing folder and other collateral materials.';
if(mb_strlen($string5, $charset) > $length) {
  $string5 = mb_substr($string5, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_volfl.jpg" class="read-more" rel="lightbox" title="Rebranded the governor\'s commission on volunteerism and community service, designed and programmed a new website, identity package, annual report, e-newsletter, marketing folder and other collateral materials. &lt;a href=&quot;http://sachsmedia.com/case-study/volunteer-florida/&quot;&gt;Click to View Case Study&lt;/a&gt;">... READ MORE</a>';
}
//description  6 - FSU Women's Basketball
$length = 90;
$string6 = 'Refresh the recruiting website SeminoleHoops.com every year with a completely new look, including a photo shoot, posters and website theme.';
if(mb_strlen($string6, $charset) > $length) {
  $string6 = mb_substr($string6, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_fsuwbb.jpg" class="read-more" rel="lightbox" title="Refresh the recruiting website SeminoleHoops.com every year with a completely new look, including a photo shoot, posters and website theme. &lt;a href=&quot;http://sachsmedia.com/case-study/fsu-womens-basketball/&quot;&gt;Click to View Case Study&lt;/a&gt;">... READ MORE</a>';
}
//description  7 - Girls Get IT
$length = 90;
$string7 = 'Branded the "Girls Get IT," an initiative financed by Cisco Systems to encourage young women across Florida to pursue careers in technology, science and math. Designed identity package, poster and website.';
if(mb_strlen($string7, $charset) > $length) {
  $string7= mb_substr($string7, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_adoption.jpg" class="read-more" rel="lightbox" title="Branded \'Girls Get IT\', an initiative financed by Cisco Systems to encourage young women across Florida to pursue careers in technology, science and math. Designed identity package, poster and website.">... READ MORE</a>';
}
//description  8 - Kids Oughta Be Covered (FL Kidcare)
$length = 90;
$string8 = 'Conceptualized and designed a branded campaign to encourage enrollment in the children\'s health insurance program Florida KidCare, included a photo shoot, designed activity book, posters, brochures and more.';
if(mb_strlen($string8, $charset) > $length) {
  $string8 = mb_substr($string8, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_kidcare.jpg" class="read-more" rel="lightbox" title="Conceptualized and designed a branded campaign to encourage enrollment in the children\'s health insurance program Florida KidCare, included a photo shoot, designed activity book, posters, brochures and more.">... READ MORE</a>';
}
//description  9 - Radey Law Firm
$length = 90;
$string9 = 'Following a national trend of rebranding law firms, we designed a modern and sleek logo, identity package and signage to streamline the new brand and theme.';
if(mb_strlen($string9, $charset) > $length) {
  $string9 = mb_substr($string9, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_radey.jpg" class="read-more" rel="lightbox" title="Following a national trend of rebranding law firms, we designed a modern and sleek logo, identity package and signage to streamline the new brand and theme. &lt;a href=&quot;http://sachsmedia.com/news/radey-thomas-yon-clark-is-now-radey-law-firm/&quot;&gt;Click Here to View Case Study&lt;/a&gt;">... READ MORE</a>';
}
//description 10 - Waterproof FL
$length = 90;
$string10 = 'Branded campaign in coordination with Florida Department of Health to reduce child deaths by drowning, produced PSAs, designed website, informational handouts and brochure.';
if(mb_strlen($string10, $charset) > $length) {
  $string10 = mb_substr($string10, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_waterproof1.jpg" class="read-more" rel="lightbox" title="Branded campaign in coordination with Florida Department of Health to reduce child deaths by drowning, produced PSAs, designed website, informational handouts and brochure.">... READ MORE</a>';
}
//description  11 - Healthy Pools
$length = 90;
$string11 = 'Conducted a national poll to determine which things Americans would be most likely to give up for a week: sex, smartphone/tablet, caffeine or alcohol. The results were surprising, so we designed an infographic of the results.';
if(mb_strlen($string11, $charset) > $length) {
  $string11 = mb_substr($string11, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_adoption.jpg" class="read-more" rel="lightbox" title="Collaborated with the American Chemistry Council to display shareable facts and statistics about summer activities and pool safety. &lt;a href=&quot;http://sachsmedia.com/news/survey-shows-parents-are-worried-kids-are-diving-into-technology-instead-of-pools/&quot;&gt;Click Here to View Case Study&lt;/a&gt;">... READ MORE</a>';
}
//description  12 - Sex vs Smartphones infograpic
$length = 90;
$string12 = 'Conducted a national poll to determine which things Americans would be most likely to give up for a week: sex, smartphone/tablet, caffeine or alcohol. The results were surprising, so we designed an infographic of the results.';
if(mb_strlen($string12, $charset) > $length) {
  $string12 = mb_substr($string12, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_adoption.jpg" class="read-more" rel="lightbox" title="Conducted a national poll to determine which things Americans would be most likely to give up for a week: sex, smartphone/tablet, caffeine or alcohol. The results were surprising, so we designed an infographic of the results. &lt;a href=&quot;http://sachsmedia.com/news/poll-americans-choose-smartphones-over-sex/&quot;&gt;Click Here to View Case Study&lt;/a&gt;">... READ MORE</a>';
}
//description  13 - Brandyland
$length = 90;
$string13 = 'As a fun way to represent the importance of evaluating a brand, we designed a Candyland-style game board to show the stages of the rebranding process.';
if(mb_strlen($string13, $charset) > $length) {
  $string13 = mb_substr($string13, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_adoption.jpg" class="read-more" rel="lightbox" title="As a fun way to represent the importance of evaluating a brand, we designed a Candyland-style game board to show the stages of the rebranding process. &lt;a href=&quot;http://sachsmedia.com/brandyland/&quot;&gt;Click Here to View Case Study&lt;/a&gt;">... READ MORE</a>';
}
//description  14 - Hotel Duval
$length = 90;
$string14 = 'Coordinated the hotel\'s grand opening event, conceptualized and designed branded invitations and print advertisements.';
if(mb_strlen($string14, $charset) > $length) {
  $string14 = mb_substr($string14, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_hd1.jpg" class="read-more" rel="lightbox" title="Coordinated the hotel\'s grand opening event, conceptualized and designed branded invitations and print advertisements.">... READ MORE</a>';
}
//description  15 - Prime Meridian Bank
$length = 90;
$string15 = 'Rebranded the regional bank, designed new website and identity package to reinforce the company\'s core message with a cohesive look and feel.';
if(mb_strlen($string15, $charset) > $length) {
  $string15 = mb_substr($string15, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_adoption.jpg" class="read-more" rel="lightbox" title="Rebranded the regional bank, designed new website and identity package to reinforce the company\'s core message with a cohesive look and feel.">... READ MORE</a>';
}
//description  16 - Vision 2020
$length = 90;
$string16 = 'Rebranded the venture capital firm, designed website and corporate identity package.';
if(mb_strlen($string16, $charset) > $length) {
  $string16 = mb_substr($string16, 0, $length, $charset) . '<a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_v20201.jpg" class="read-more" rel="lightbox" title="Rebranded the venture capital firm, designed website and corporate identity package.">... READ MORE</a>';
}
?>


<div class="row lined">
	<div id="sidebar" class="span3">
		<?php wp_nav_menu('menu=what-we-do&container=&menu_id=side&menu_class=no-margin'); ?>
	<br />

	<?php if ( !dynamic_sidebar('Sidebar') ) : ?>
	<?php endif; ?>
	</div>
	<div class="span9">
	<ul id="filter">
		<li class="current"><a href="#">All</a></li>
		<li><a href="#">Print</a></li>
		<li><a href="#">Video</a></li>
		<li><a href="#">Web</a></li>
	</ul>

	<ul id="portfolio">
	  <div class="post">
	  
	  	<article id="row3">
			<div><li class="mix print web video"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_adoption.jpg" rel="lightbox" title="Worked with the Executive Office of the Governor to brand a campaign encouraging adoption of sibling groups, disabled children and older children via the state's program. We produced many items, including PSAs, a website and an Explore Adoption marketing kit for partners that included a poster, brochure, button, DVD, window cling and informational one-pagers in English, Spanish and Creole. &lt;a href=&quot;http://sachsmedia.com/case-study/explore-adoption/&quot;&gt;Click Here to View Case Study&lt;/a&gt; "><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_adoption.jpg" />
			<h3>Explore Adoption</a></h3>
			<p><?php echo $string1; ?></p></li></div>
			
			<div><li class="mix print web video"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_dmts.jpg" rel="lightbox" title="Collaborated with the Florida Department of Children and Families and the Lauren’s Kids foundation to conceptualize, design and produce a branded campaign including online content (microsite, online petition/pledge, television and radio PSAs, online survey, video message, online training and certification tool, social media content) and print materials in English, Spanish and Creole (brochure, rack card, bookmark, training handbook, posters, billboards and other outdoor advertisements)."><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_dmts.jpg" />
			<h3>Don't Miss the Signs</a></h3>
			<p><?php echo $string2; ?></p></li></div>
			
			<div><li class="mix print web video"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_ssk.jpg" rel="lightbox" title="Conceptualized, branded, designed and launched the Safer, Smarter Kids abuse prevention curriculum for public school VPK and kindergarten students across Florida. We expanded the brand by also creating Safer, Smarter Kids curriculum for children with special needs and designed a training curriculum for foster parents who are caring for a child with a sexual abuse history. The Safer, Smarter Kids curricula also includes an online tool to help parents facilitate a conversation with their children about abuse prevention and safety."><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_ssk.jpg" />
			<h3>Safer, Smarter Kids</a></h3>
			<p><?php echo $string3; ?></p></li></div>
		</article>
		
		
		<article id="row3">
			<div><li class="mix print web video"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_fdva.jpg" rel="lightbox" title="Rebranded the 24-year-old Florida Department of Veterans' Affairs to help them better reach the 1.6 million veterans in Florida. We branded the department with a new logo, designed and programmed a new website, produced PSAs, created a mobile app, online and print advertisements, and designed images for social media, marketing and collateral materials. &lt;a href=&quot;http://sachsmedia.com/case-study/florida-department-of-veterans-affairs/&quot;&gt;Click to View Case Study&lt;/a&gt;"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_fdva.jpg" />
			<h3>FDVA</a></h3>
			<p><?php echo $string4; ?></p></li></div>
			
			<div><li class="mix print web"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_volfl.jpg" rel="lightbox" title="Rebranded the 24-year-old Florida Department of Veterans’ Affairs to help them better reach the 1.6 million veterans in Florida. We branded the department with a new logo, designed and programmed a new website, produced PSAs, created a mobile app, online and print advertisements, and designed images for social media, marketing and collateral materials. &lt;a href=&quot;http://sachsmedia.com/case-study/volunteer-florida/&quot;&gt;Click to View Case Study&lt;/a&gt;"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_volfl.jpg" />
			<h3>Volunteer Florida</a></h3>
			<p><?php echo $string5; ?></p></li></div>
			
			<div><li class="mix print web"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_fsuwbb.jpg" rel="lightbox" title="Refresh the recruiting website SeminoleHoops.com every year with a completely new look, including a photo shoot, posters and website theme. &lt;a href=&quot;http://sachsmedia.com/case-study/fsu-womens-basketball/&quot;&gt;Click to View Case Study&lt;/a&gt;"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_fsuwbb.jpg" />
			<h3>FSU Women's Basketball</a></h3>
			<p><?php echo $string6; ?></p></li></div>
		</article>
		
		
		<article id="row3">
			
			<div><li class="mix print web video"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_kidcare.jpg" rel="lightbox" title="Conceptualized and designed a branded campaign to encourage enrollment in the children's health insurance program Florida KidCare, included a photo shoot, designed activity book, posters, brochures and more."><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_kidcare.jpg" />
			<h3>Kids Oughta Be Covered</a></h3>
			<p><?php echo $string8; ?></p></li></div>
			
			<div><li class="mix print"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_radey.jpg" rel="lightbox" title="Following a national trend of rebranding law firms, we designed a modern and sleek logo, identity package and signage to streamline the new brand and theme. &lt;a href=&quot;http://sachsmedia.com/news/radey-thomas-yon-clark-is-now-radey-law-firm/&quot;&gt;Click Here to View Case Study&lt;/a&gt;"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_radey.jpg" />
			<h3>Radey Law Firm</a></h3>
			<p><?php echo $string9; ?></p></li></div>
			
			<div><li class="mix print web"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_v2020.jpg" rel="lightbox" title="Rebranded the venture capital firm, designed website and corporate identity package."><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_v2020.jpg" />
			<h3>Vison 2020</a></h3>
			<p><?php echo $string16; ?></p></li></div>
		</article>
		
		
		<article id="row3">
			
			<div><li class="mix print"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_hd.jpg" rel="lightbox" title="Coordinated the hotel's grand opening event, conceptualized and designed branded invitations and print advertisements."><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_hd.jpg" />
			<h3>Hotel Duval</a></h3>
			<p><?php echo $string14; ?></p></li></div>
			
			<div><li class="mix print web video"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_waterproof.jpg" rel="lightbox" title="Branded campaign in coordination with Florida Department of Health to reduce child deaths by drowning, produced PSAs, designed website, informational handouts and brochure."><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_waterproof.jpg" />
			<h3>Waterproof Florida</a></h3>
			<p><?php echo $string10; ?></p></li></div>
			
		</article>


     </div><!--end .post-->
	</ul>
	</div><!--end #portfolio-->
	
</div>
<?php endwhile; pxl::page(0); ?>
