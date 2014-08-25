<?php /* Template Name: About */ pxl::page(); while ( have_posts() ) : the_post(); ?>
<div class="row lined">
	<div id="sidebar" class="span3">
		<ul id="side">
			<li><a href="<?php echo home_url( '/about' ); ?>">About Us</a></li>
			<li class="">
				<a href="#">Our Team</a>
				<ul>
					<li class="group">Executive</li>
					<?php wp_nav_menu('menu=executive'); ?>
					<li class="group">Client/Creative</li>
					<?php wp_nav_menu('menu=client/creative'); ?>
					<li class="group">Administrative</li>
					<?php wp_nav_menu('menu=administrative'); ?>
				</ul>
			</li>
		</ul>
	</div>
	<div class="span9">
		<header>
			<h2>About Us <small>From the Ground Up</small></h2>
		</header>
		<?php the_content(); ?>


		<!--<div class="coins">
			<div class="row lined">
				<div class="span3">
					<h4>Public Affairs</h4>
					<p>We understand how to change opinions - the public's and policymakers - from city halls to state capitals. We communicate simply, dramatically and effectively.  We support the work of many of Florida's top lobbyists by generating strong grassroots support for issues, framing issues clearly and persuasively, generating significant media attention, educating the public, and massing public support.</p>
				</div>
				<div class="span3">
					<h4>Media Relations</h4>
					<p>We build news conferences and customize activities that generate state and national newspaper, television and radio coverage. We're accustomed to unforgiving deadlines and understand that developing and implementing quick responses, strategies and action plans will always keep our clients positioned properly. We also help our clients navigate media crises, working to achieve balanced media coverage.</p>
				</div>
				<div class="span3">
					<h4>Creative Design</h4>
					<p>Our clean, strong design work and memorable advertising campaigns break through the noise and clutter to reach people where they watch and listen. Our award-winning creative work delivers our clients' messages with a powerful impact. Identifying what an organization is at its core allows an entity to simply and effectively convey what it is and what it has to offer through words and images.</p>
				</div>
			</div>
			<hr>
			<div class="row lined">
				<div class="span3">
					<h4>Strategic Marketing</h4>
					<p>We position our clients' products and services in ways that build recognition within their target markets with sound, innovative and cost-effective strategies. We create and reinforce clear and strong corporate identities in what is often a rapidly shifting marketplace of ideas, supplementing and strengthening traditional marketing approaches with high visibility public relations strategies.</p>
				</div>
				<div class="span3">
					<h4>Web & Interactive</h4>
					<p>We create Web sites, e-newsletters, chat rooms and blogs that bring people together and propel them to action. Our Web sites are dynamic, accessible and memorable. Whether we are building a new Web site, providing an update and facelift to an existing Web site, or creating an electronic newsletter, our Web tools enhance image and meet strategic objectives effectively and economically.</p>
				</div>
				<div class="span3">
					<h4>Video Services</h4>
					<p>From feature-length television specials to radio and TV commercials, our work generates premium placement in major markets and exceptional visibility for our clients. Our award-winning video production team produces effective television advertising and public service announcements that earn regional and national recognition. Our video work educates, informs and evolves public opinion.</p>
				</div>
			</div>
		</div>-->
	</div>
</div>
<?php endwhile; pxl::page(0); ?>