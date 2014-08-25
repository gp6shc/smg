<?php /* Template Name: What We Do: Public Affairs */ pxl::page(); while ( have_posts() ) : the_post(); ?>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery("#expanderHead").click(function(){
		jQuery("#expanderContent").slideToggle();
		if (jQuery("#expanderSign.read-more").text() == "-"){
			jQuery("#expanderSign.read-more").html("+")
		}
		else {
			jQuery("#expanderSign.read-more").text("-")
		}
	});
});
</script>
<style>
#expanderSign.read-more{
	background: transparent url('http://sachsmedia.com/wp-content/themes/ronsachs/resources/images/icons/sprite.png') right -82px;
	color: #DA1F26;
	font-family: 'Arvo', serif;
	font-size: 11px;
	padding-right: 12px;
	text-transform: uppercase;
}
.content-img-what-we-do img {
	opacity: 1.0;
	-webkit-transition: all 0.2s ease-in-out;
	-moz-transition: all 0.2s ease-in-out;
	-o-transition: all 0.2s ease-in-out;
	-ms-transition: all 0.2s ease-in-out;
	transition: all 0.2s ease-in-out;
	box-shadow: -2px 4px 9px #ebebeb;
	-webkit-box-shadow: -2px 4px 9px #ebebeb;
	-moz-box-shadow: -2px 4px 9px #ebebeb;
	border-radius: 1px;
	-webkit-border-radius: 1px;
}
.content-img-what-we-do img:hover {
	opacity: 0.8;
	-webkit-transition: all 0s ease-in-out;
	-moz-transition: all 0s ease-in-out;
	-o-transition: all 0s ease-in-out;
	-ms-transition: all 0s ease-in-out;
	transition: all 0s ease-in-out;
	box-shadow: -2px 4px 9px #ccc;
	-webkit-box-shadow: -2px 4px 9px #ccc;
	-moz-box-shadow: -2px 4px 9px #ccc;
}
.public-affairs-team p{
	height: 95px;
	width: 97%;
	background: #fff;
	padding: 15px 7px;
	border-top: 0px solid #FFFFFF;
	border-bottom: 0px solid #F0F0F0;
}
.public-affairs-team img.alignleft{
	margin-top: 14px;
	margin-left: 14px;
	margin-right: 20px!important;
	border: 1px solid #FFF;
	padding: 2px;
}
a.read-more.team{
	color: #808080;
	font-family: 'Arvo', serif;
	font-size: 10px;
	padding-left: 6px;
	padding-right: 12px;
	text-transform: uppercase;
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
			<li><a href="<?php echo home_url( '/our-work' ); ?>">Design Portfolio</a></li>
		</ul>
		<br />
		<?php if ( !dynamic_sidebar('Sidebar') ) : ?>
		<?php endif; ?>
	</div>
	
	<div class="span6">
		<!--content-->
		<h3 class="whatwedo"><?php echo get_the_title(); ?> Philosophy</h3>
		<div class="content-img-what-we-do">
		

		<div id="expanderHead" style="cursor:pointer;">
		<p>Ranked number one in Florida for public affairs, the Sachs Media Group public affairs team understands how to shape issues, move public and policymaker opinion, and win in the halls of power. With a leadership team steeped in media, government and politics, we leverage compelling messaging and strategies that motivate action.</p>
		
		<p>Whether the goal is passing a bill in the legislature, encouraging a veto by the governor or gaining support for a statewide or local amendment, our team has done it all and can help you accomplish your public policy goals. Using our strong bipartisan relationships, we are the perfect complement to any successful government relations team and work to generate public support, on-message media coverage and third-party validation.... <span id="expanderSign" class="read-more">Read More </span> </p>
		</div>
		
		<div id="expanderContent" style="display:none">
		<p>Combining decades of experience working for Florida governors, attorneys general and state agencies, our team starts every project with thorough research and an in-depth analysis of the current political climate. Then, using our innovative and integrated approach, we craft a tailored plan of action designed to effect change among the target audience. In addition, our social/digital team utilizes, <em>Digital Impact</em>, a proprietary platform that ensures your message reaches key policy makers on social media.</p>
		
		<p>As a result, we are consistently viewed as Florida's dominant public affairs communications firm and have received numerous accolades for our work, including a Florida Public Relations Association Dick Pope All-Florida Golden Image Award in support of a statewide amendment and the 2012 Bulldog Reporter Bronze Award for Public Affairs Agency of the Year.</p>
		
		<p>So, whether the objective is gaining policymaker support, persuading key opinion leaders or energizing grassroots, we are your go-to firm for public affairs.</p>
		
		<p>To learn more about our philosophy <a href="http://www.youtube.com/watch?feature=player_embedded&amp;v=nk6f7uoJ2ls" target="_blank">click here</a>.</p>
		</div>
		
		<div class="public-affairs-team">
		<h3 class="whatwedo" style="margin-bottom:15px;">The Team</h3>
		
		<a href="<?php echo home_url(); ?>/team/ron-sachs/"><img class="alignleft size-thumbnail wp-image-2238" style="margin-right: 10px;" title="Ron Sachs" src="http://sachsmedia.com/wp-content/uploads/2014/02/ron-sachs-smg.png" alt="" width="100" height="100" align="left" /></a>
		<p style="vertical-align: top;margin-bottom: 0px;">A veteran Florida communicator with an extensive background in journalism and government communications. His contacts in government and the media, formed during his service to Florida Governors Lawton Chiles and Reubin Askew, work to the benefit of all our clients<a class="read-more team" href="<?php echo home_url(); ?>/team/ron-sachs">View Profile</a></p>
		<div style="clear: both;padding-bottom:1px;"></div>
		<hr style="border-bottom: 0px solid #333;margin:20px 0px!important;" />
		

		<a href="<?php echo home_url(); ?>/team/ryan-banfill/"><img class="alignleft size-thumbnail wp-image-2238" style="margin-right: 10px;" title="Ryan Banfill" src="http://sachsmedia.com/wp-content/uploads/2014/02/ryan.jpg" alt="" width="100" height="100" align="left" /></a>
		<p style="vertical-align: top;margin-bottom: 0px;">The public affairs team is headed by partner and senior vice president Ryan Banfill, a senior public policy strategist who served as press secretary to Florida Governor Lawton Chiles and a communications director in both the Florida House and Senate. <a class="read-more team" href="<?php echo home_url(); ?>/team/ryan-banfill">View Profile</a></p>
		<div style="clear: both;"></div>
		<hr style="border-bottom: 0px solid #333;margin:20px 0px!important;" />
		
		
		
		<a href="<?php echo home_url(); ?>/team/herbie-thiele/"><img class="alignleft size-thumbnail wp-image-2237" style="margin-right: 10px; margin-bottom: 10px;" title="Herbie Thiele" src="http://sachsmedia.com/wp-content/uploads/2014/02/herbs_papage.png" alt="" width="100" height="100" align="left" /></a>
		<p style="vertical-align: top;">Deputy director of public affairs Herbie Thiele combines knowledge of the political process and media  relations expertise with an extensive network of contacts, including professionals in both state government and the private sector. <a class="read-more team" href="<?php echo home_url(); ?>/team/herbie-thiele">View Profile</a></p>
		<div style="clear: both;"></div>
		<hr style="border-bottom: 0px solid #333;margin:20px 0px!important;" />
		<!--<div id ="1" style="margin-top:2px;">&nbsp;</div>-->


		
		<a href="<?php echo home_url(); ?>/team/mark-pankowski/"><img class="alignleft size-thumbnail wp-image-2235" style="margin-right: 10px;" title="Mark Pankowski" src="http://sachsmedia.com/wp-content/uploads/2014/02/mark.jpg" alt="" width="100" height="100" align="left" /></a>
		<p style="vertical-align: top;">Director of Washington Operations Mark Pankowski leads our Washington D.C. efforts with more than 25 years of experience as an award-winnig journalist, media relations specialist and crisis communications expert. <a class="read-more team" href="<?php echo home_url(); ?>/team/mark-pankowski">View Profile</a></p>
		<div style="clear: both;"></div>
		<hr style="border-bottom: 0px solid #333;margin:20px 0px!important;" />
		
		
		
		<a href="<?php echo home_url(); ?>/team/karen-cyphers/"><img class="alignleft size-thumbnail wp-image-2235" style="margin-right: 10px;" title="Karen Cyphers" src="http://sachsmedia.com/wp-content/uploads/2014/02/karen.jpg" alt="" width="100" height="100" align="left" /></a>
		<p style="vertical-align: top;">Senior policy counsel Karen Cyphers</a> uses her expert knowledge of Florida's political trends to direct policy initiatives and previously served as policy director for the gubernatorial campaigns of Charlie Crist and Bill McCollum, and as director of health care policy for the FL. Medical Association. <a class="read-more team" href="<?php echo home_url(); ?>/team/karen-cyphers">View Profile</a></p>
		<div style="clear: both;"></div>
		<hr style="border-bottom: 0px solid #333;margin:20px 0px!important;" />
		
	
		
		</div><!-- end .public-affairs-team -->
		
		

		<div style="float: left;">
		<a href="<?php echo home_url(); ?>/team/drew-piers/"><img class="alignleft size-thumbnail wp-image-2236" style="margin-bottom: 14px;margin-right: 20px!important;margin-left: 14px;border: 1px solid #FFF;padding: 2px;" title="Drew Piers" src="http://sachsmedia.com/wp-content/uploads/2014/02/drew.jpg" alt="" width="100" height="100" align="left" /></a>
		<p style="vertical-align: top;margin-top: -14px;height:95px;background: #fff;padding: 15px 7px;">Public affairs associate Drew Piers works closely with the team’s research and messaging  objectives and uses his prior experience at the Governor’s Office of Policy and Budget to simplify complex  subject matter and frame issues so they are compelling and easily understood. <a class="read-more team" href="<?php echo home_url(); ?>/team/drew-piers">View Profile</a></p>
		<div style="clear: both;"></div>
		<hr style="border-bottom: 0px solid #333;margin:20px 0px!important;" />
		
		
		
		<p>The public affairs division also works closely with the public relations team, headed by vice president and former press secretary to Governor Bob Martinez <a href="<?php echo home_url(); ?>/team/jon-peck/">Jon Peck</a>, to craft compelling messaging and integrate new media strategies, traditional news media and special events into all campaigns. Innovative online strategies are woven into public affairs campaigns through the guidance of the award-winning social/digital media team, led by vice president <a href="<?php echo home_url(); ?>/team/ryan-cohn/">Ryan Cohn</a>, a nationally-acclaimed digital media thought leader and professor of advanced social media at the Florida State University.</p>
		
		</div>
		<div style="clear: both;"></div>
	
			
		</div><!--end content-->
		
			<div class="row lined">
				<div class="span6">
					<!--blog section-->
					<h3 class="related">Related Blog Articles<!--echos first name only--></h3>
					<p style="padding-bottom:4px;"><?php echo do_shortcode("[posts show=3 loop=post-indivcasestudy category_name=publicaffairs]"); ?></p>
					<!--end blog section-->
				</div><!--end span6-->
							
		</div><!--end span6 row lined-->
	</div><!--end span6-->

		<!--Case Studies -->
		<div id="sidebar" class="span3">
		<h3 class="whatwedo">Case Studies</h3>
			<?php echo do_shortcode("[posts loop=post-casestudy category_name=casestudy-publicaffairs]"); ?></p>
 		</div><!--end span 3-->
 		
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>