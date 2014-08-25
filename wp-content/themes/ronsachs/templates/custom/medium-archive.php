<style>
.post-type-archive-work article, .tax-medium article {
height: 270px !important;
}
.row.lined > [class*="span"] + [class*="span"]::before {
background-color: #CCC;
bottom: 0;
content: '';
left: 0px !important;
position: absolute;
top: 0;
width: 1px;
}
[class*="span"] {
float: left;
margin: 5px 0 5px 33px;
min-height: 1px;
position: relative;
}
nav ul#categories {
text-align: left;
left: 32px;
top: 21px;
}
#sidebar{
margin-left: 20px;
}
</style>

<div class="row lined">
	<div id="sidebar" style="margin-left:50px;"class="span3">
		<ul id="side">
			<li><a href="<?php echo home_url( '/public-affairs' ); ?>">Public Affairs</a></li>
			<li><a href="<?php echo home_url( '/branding' ); ?>">Branding</a></li>
			<li><a href="<?php echo home_url( '/campaigns' ); ?>">Campaigns</a></li>
			<li><a href="<?php echo home_url( '/crisis-communication' ); ?>">Crisis Communications</a></li>
			<li><a href="<?php echo home_url( '/social-digital' ); ?>">Social/Digital</a></li>
			<li><a href="<?php echo home_url( '/public-relations' ); ?>">Public Relations</a></li>
			<li><a href="<?php echo home_url( '/design-portfolio' ); ?>">Design Portfolio</a></li>
		</ul>
	</div>

	<div class="span9">
		<!--content-->
			<nav>
			<h4>
				<ul id="categories">
					<?php wp_nav_menu( array(
						'theme_location'  => 'our-work',
						'container'       => false,
						'echo'            => true,
						'fallback_cb'     => false,
						'items_wrap'      => '%3$s',
						'depth'           => 0
					) ); ?>
				</ul>
			</h4>
		</nav>
	<?php pxl::loop("partial=post-work") ?>		
	</div><!--end span9-->
</div><!--end container row lined-->
	