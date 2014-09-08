<div class="row lined">
	<div class="span9 fotd-archive">
	
		<?php 
			//fix php timezone error from defaulting to UTC
		 	date_default_timezone_set('America/New_York');
		 	
		 	pxl::loop("partial=post-facts");
		 ?>
		
		<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
	</div>
	<?php get_sidebar();?>
</div>