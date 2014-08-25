<div class="row lined">
	<div class="span9">
	
			<?php if ( have_posts() ) : ?>
			<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
	
			<?php else : ?>
			<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your keyword(s). Please try again with some different keywords.', 'twentyeleven' ); ?></p>
					<?php get_search_form(); ?>
			</div><!-- .entry-content -->
			<?php endif; ?>
			
			
		<?php pxl::loop(''); ?>
		<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
	</div>
	<?php get_sidebar(); ?>
</div>