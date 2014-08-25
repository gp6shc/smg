<?php /* Template Name: Design Portfolio */ pxl::page(); while ( have_posts() ) : the_post(); ?>
<head>
<!--[if lt IE 7]>
<link href="stylesheets/screen-ie6.css" type="text/css" rel="stylesheet" media="screen,projection" />
<![endif]-->
</head>
<link rel="stylesheet" href="http://sachsmedia.com/wp-content/themes/ronsachs/resources/lightbox/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" src="http://d2o0t5hpnwv4c1.cloudfront.net/196_jquery/scripts/jquery.js"></script>
<script type="text/javascript" src="http://d2o0t5hpnwv4c1.cloudfront.net/196_jquery/scripts/framework.js"></script>
<script type="text/javascript" src="http://sachsmedia.com/wp-content/themes/ronsachs/resources/lightbox/lightbox.js"></script>

<!--override styling-->
<style>
/* Portfolio Clearing */
.clearing { clear: both; }
.last { margin-bottom: 0; }
.screenReader { left: -9999px; position: absolute; top: -9999px; }

/* Portfolio Layout */
ul#filter { 
list-style-type: none;
margin: 0 0 0 10px;
padding: 0 0 20px 0;
position: relative;
}

ul#filter li { 
float: left;
line-height: 16px;
margin-right: 10px;
padding-right: 10px;
}

ul#filter li + li {
border-left: 1px solid #000;
padding-left: 15px;
}

ul#filter li:last-child { 
border-right: none; 
margin-right: 0; 
padding-right: 0;
}

ul#filter a { 
color: #000; 
text-decoration: none;
font-family: 'Arvo', serif;
font-size: 13px;
list-style-type: none;
text-transform: uppercase;
}

ul#filter li.current a, ul#filter a:hover { 
text-decoration: underline; 
color: #DA1F26;
}

ul#filter li.current a { 
color: #000;
font-weight: 700;
text-decoration: none;
}

ul#portfolio { 
float: left; 
list-style: none; 
margin-left: -30px; 
width: 100%; /*span 9 container is 700px*/
}

ul#portfolio li { 
float: left;
margin: 0 33px 15px 0px;
width: 185px;
}

ul#portfolio a {
display: block; 
width: 100%;
}

ul#portfolio a:hover {
text-decoration: none; 
}

ul#portfolio img { 
display: block;
padding-bottom: 5px;
width: 185px;
height: 115px;
}

.post h3 {
border-bottom: 2px solid #000;
line-height: 24px;
margin-top: 10px;
padding-bottom: 10px;
padding-left: 25px;
position: relative;
}

.post h3::before{
background: url('http://sachsmedia.com/wp-content/themes/ronsachs/resources/images/icons/sprite.png') no-repeat -418px -160px;
content: '';
display: block;
height: 16px;
left: 0;
position: absolute;
top: 2px;
width: 16px;
}
</style>

<div class="row lined">
	<div id="sidebar" class="span3">
		<ul id="side">
			<li><a href="../public-affairs/">Public Affairs</a></li>
			<li><a href="../branding/">Branding</a></li>
			<li><a href="../campaigns/">Campaigns</a></li>
			<li><a href="../crisis-communication/">Crisis Communications</a></li>
			<li><a href="../social-digital/">Social/Digital</a></li>
			<li><a href="../public-relations/">Public Relations</a></li>
			<li class="dropdown">
				<a href="../design-portfolio/">Design Services</a>
				<ul>
					<li><a href="../our-work/">Portfolio</a></li>
				</ul>
		</ul>
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
	  
	  	<li class="print web video"><a href="http://sachsmedia.com/case-study/explore-adoption/"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_adoption.jpg" alt="" /><h3>Explore Adoption</a></h3><p>Worked with the Executive Office of the Governor to brand a campaign encouraging adoption of sibling groups, disabled children and older children via the state's program. We produced many items, including PSAs, a website and an Explore Adoption marketing kit for partners that included a poster, brochure, button, DVD, window cling and informational one-pagers in English, Spanish and Creole.</p></li>
	  	
	  	<li class="print web video"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_dmts.jpg" rel="lightbox"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_dmts.jpg" alt="" /><h3>Don't Miss the Signs</a></h3><p>Collaborated with the Florida Department of Children and Families and the Lauren’s Kids foundation to conceptualize, design and produce a branded campaign including online content (microsite, online petition/pledge, television and radio PSAs, online survey, video message, online training and certification tool, social media content) and print materials in English, Spanish and Creole (brochure, rack card, bookmark, training handbook, posters, billboards and other outdoor advertisements).</p></li>
	  	
	  	<li class="print web video"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_ssk.jpg" rel="lightbox"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_ssk.jpg" alt="" /><h3>Safer, Smarter Kids</a></h3><p>Conceptualized, branded, designed and launched the Safer, Smarter Kids abuse prevention curriculum for public school VPK and kindergarten students across Florida. We expanded the brand by also creating Safer, Smarter Kids curriculum for children with special needs and designed a training curriculum for foster parents who are caring for a child with a sexual abuse history. The Safer, Smarter Kids curricula also includes an online tool to help parents facilitate a conversation with their children about abuse prevention and safety.</p></li>
	  	
	  	<li class="print web video"><a href="http://sachsmedia.com/case-study/florida-department-of-veterans-affairs/"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_fdva.jpg" alt="" /><h3>FDVA</a></h3><p>Rebranded the 24-year-old Florida Department of Veterans’ Affairs to help them better reach the 1.6 million veterans in Florida. We branded the department with a new logo, designed and programmed a new website, produced PSAs, created a mobile app, online and print advertisements, and designed images for social media, marketing and collateral materials.</p></li>
	  	
	  	<li class="print web"><a href="http://sachsmedia.com/case-study/volunteer-florida/"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_volfl.jpg" alt="" /><h3>Volunteer Florida</a></h3><p>Rebranded the governor's commission on volunteerism and community service, designed and programmed a new website, identity package, annual report, e-newsletter, marketing folder and other collateral materials.</p></li>
	  	
		<li class="print web"><a href="http://sachsmedia.com/case-study/fsu-womens-basketball/"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_fsuwbb.jpg" alt="" /><h3>FSU Women's Basketball</a></h3><p>Refresh the recruiting website <a href="http://seminolehoops.com/" target="_blank">SeminoleHoops.com</a> every year with a completely new look, including a photo shoot, posters and website theme.</p></li>

		<li class="print web"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_v2020.jpg" rel="lightbox"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_v2020.jpg" alt="" /><h3>Girls Get IT</a></h3><p>Branded the "Girls Get IT," an initiative financed by Cisco Systems to encourage young women across Florida to pursue careers in technology, science and math. Designed identity package, poster and website.</p></li>
		
		<li class="print web video"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_kidcare.jpg" rel="lightbox"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_kidcare.jpg" alt="" /><h3>Kids Oughta Be Covered</a></h3><p>Conceptualized and designed a branded campaign to encourage enrollment in the children's health insurance program Florida KidCare, included a photo shoot, designed activity book, posters, brochures and more.</p></li>
		
		<li class="print"><a href="http://sachsmedia.com/news/radey-thomas-yon-clark-is-now-radey-law-firm/"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_kidcare.jpg" alt="" /><h3>Radey Law Firm</a></h3><p>Following a national trend of rebranding law firms, we designed a modern and sleek logo, identity package and signage to streamline the new brand and theme.</p></li>
		
		<li class="print web video"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_waterproof.jpg" rel="lightbox"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_waterproof.jpg" alt="" /><h3>Waterproof Florida</a></h3><p>Branded campaign in coordination with Florida Department of Health to reduce child deaths by drowning, produced PSAs, designed website, informational handouts and brochure.</p></li>
		
		<li class="web"><a href="http://sachsmedia.com/news/survey-shows-parents-are-worried-kids-are-diving-into-technology-instead-of-pools/"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_kidcare.jpg" alt="" /><h3>Healthy Pools</a></h3><p>Conducted a national poll to determine which things Americans would be most likely to give up for a week: sex, smartphone/tablet, caffeine or alcohol. The results were surprising, so we designed an infographic of the results.</p></li>
		
		<li class="web"><a href="http://sachsmedia.com/news/poll-americans-choose-smartphones-over-sex/"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_waterproof.jpg" alt="" /><h3>Sex Vs. Smartphones</a></h3><p>Conducted a national poll to determine which things Americans would be most likely to give up for a week: sex, smartphone/tablet, caffeine or alcohol. The results were surprising, so we designed an infographic of the results.</p></li>
		
		<li class="print"><a href="http://sachsmedia.com/brandyland/"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_waterproof.jpg" alt="" /><h3>Brandyland</a></h3><p>As a fun way to represent the importance of evaluating a brand, we designed a Candyland-style game board to show the stages of the rebranding process.</p></li>
		
		<li class="print"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_hd.jpg" rel="lightbox"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_hd.jpg" alt="" /><h3>Hotel Duval</a></h3><p>Coordinated the hotel's grand opening event, conceptualized and designed branded invitations and print advertisements.</p></li>
		
		<li class="print web"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_hd.jpg" rel="lightbox"><img src="http://sachsmedia.com/wp-content/uploads/2013/02/portfolio_prime.jpg" alt="" /><h3>Prime Meridian Bank</a></h3><p>Rebranded the regional bank, designed new website and identity package to reinforce the company's core message with a cohesive look and feel.</p></li>
		
		<li class="print web"><a href="http://sachsmedia.com/wp-content/uploads/2013/09/portfolio_full_v2020.jpg" rel="lightbox"><img src="http://sachsmedia.com/wp-content/uploads/2013/09/portfoliothumb_v2020.jpg" alt="" /><h3>Vison 2020</a></h3><p>Rebranded the venture capital firm, designed website and corporate identity package.</p></li>
		
		
		
	

		
     </div><!--end .post-->
	</ul>
	</div><!--end #portfolio-->
</div>
<?php endwhile; pxl::page(0); ?>
