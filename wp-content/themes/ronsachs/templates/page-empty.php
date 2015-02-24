<?php /* Template Name: Empty */ 

pxl::page(); while ( have_posts() ) : the_post(); ?>
		<style>
			.wrapper {
				width: 100% ;
			}
			
			#primary, #banner, body > div:nth-child(3) {
				display: none;
			}
			body {
				border: none;
				width: 100%;
			}
			.wrapper footer, #curl-shadow {
				display: none;
			}
			#container {
				border: none;
			}
		</style>
		<div><?php the_content(); ?></div>
		<!--end content-->
		
<?php endwhile; pxl::page(0); ?>