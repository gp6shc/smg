<?php /* Template Name: Mark P */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
		<!--content-->
		<div class="content-img"><?php the_content(); ?></div>
		<!--end content-->
		
			<div class="row lined">
				<div class="span9">
					<!--about title-->
					<h3 class="team">About <?php echo get_the_title(); ?></h3>
					<!--end about title-->

					<!--about paragraph-->
					<p>Mark Pankowski brings more than 25 years of experience as an award-winning journalist, media relations specialist and crisis communications expert. Mark spent a decade as a reporter, news editor and business editor at The Tallahassee Democrat and The Orlando Sentinel.</p>
					
					<p>He then joined Sachs Media Group as a Senior Vice President, leading high-impact communications efforts for such clients as the Florida Medical Association, Huizenga Holdings/Miami Dolphins, the Florida League of Cities and Joe DiMaggio Children’s Hospital.</p>
					
					<p>Mark later became Senior Vice President at Dezenhall Resources, one of the nation’s leading crisis communications firms. For 10 years, he led the firm’s media efforts for a variety of major companies in the chemical, plastics, pharmaceutical and food-ingredient industries.</p>
					
					<p>Mark continues his work today in media relations and crisis communications for Sachs Media Group. His clients have included national associations, Fortune 500 companies, and celebrities.</p>
					<!--end about paragraph-->

					<!--last p (pushes padding down)-->
					<p class="lastp">Mark is a Phi Beta Kappa graduate of Notre Dame.</p>

				</div><!--end span6-->
		</div><!--end span9 row lined-->
	</div><!--end span9-->
</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>