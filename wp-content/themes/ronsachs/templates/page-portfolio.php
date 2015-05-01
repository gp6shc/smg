<?php /* Template Name: Our Work */ pxl::page(); while ( have_posts() ) : the_post(); ?>
<script src="<?php echo plugins_url('ultimate-wp-query-search-filter/classes/scripts/uwpqsfscript.min.js') ?>" async></script>
<div class="row lined">
	<div id="sidebar" class="span3">
		<?php wp_nav_menu('menu=what-we-do&container=&menu_id=side&menu_class=no-margin'); ?>
		<br />
		<?php if ( !dynamic_sidebar('Sidebar') ) : ?>
		<?php endif; ?>
	</div>

	<div class="span9">	
		<?php echo do_shortcode('[ULWPQSF id=3924 button=0 formtitle=0]'); ?>
		<div class="loader-contain scale-0"><div class="loader"></div></div>
		<div id="works">
		
		</div>
	</div>
</div>

<?php endwhile; pxl::page(0); ?>
