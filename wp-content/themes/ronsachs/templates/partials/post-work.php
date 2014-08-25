<article class="span3 post" style="margin-top:27px;">
	<a rel="lightbox" href="<?php $image_id = get_post_thumbnail_id(); $image_url = wp_get_attachment_image_src($image_id,'large', true); echo $image_url[0]; ?>"><?php pxl::timthumb( 'post_thumbnail', array( 'w' => 200, 'h' => 115 ), 'medium' ); ?></a>
	<h3><a href="#"><?php the_title(); ?></a></h3>
	<?php pxl::excerpt("length=30 sep=false link=false"); ?>
</article>



