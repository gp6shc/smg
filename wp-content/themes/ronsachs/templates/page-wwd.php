<?php /* Template Name: What We Do(landing) */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row lined">
	<div id="sidebar" class="span3">
		<ul id="side">
			<li><a href="../public-affairs/">Public Affairs</a></li>
			<li><a href="../branding/">Branding</a></li>
			<li><a href="../campaigns/">Campaigns</a></li>
			<li><a href="../crisis-communication/">Crisis Communications</a></li>
			<li><a href="../social-digital/">Social/Digital</a></li>
			<li><a href="../public-relations/">Public Relations</a></li>
			<li><a href="<?php echo home_url( '/design-portfolio' ); ?>">Design Portfolio</a></li>
		</ul>
<br />

	<?php if ( !dynamic_sidebar('Sidebar') ) : ?>
	<?php endif; ?>
	
	</div>
	<div class="span9">
		<header>
			<h2>Our Approach <small>carefully crafted</small></h2>
		</header>
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile; pxl::page(0); ?>


		