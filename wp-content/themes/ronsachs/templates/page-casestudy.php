<?php /* Template Name: Indiv Case Study */ pxl::page(); while ( have_posts() ) : the_post(); ?>

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
	<div class="span9">

			<h3 class="whatwedo">Case Study: <?php echo get_the_title(); ?></h3>

		<div class="post" style="padding-top: 10px;"><?php the_post_thumbnail('large'); ?></div>
		<?php the_content(); ?>
	</div>
</div>
<?php endwhile; pxl::page(0); ?>