<?php get_header(); $template = pxlTemplates::init(); clog($template); ?>
	<div class="template">
		<?php get_template_file( $template, array( 'cfs' => ( isset($post) ? get_post_custom() : false ) ) ); ?>
	</div>
<?php get_footer(); ?>