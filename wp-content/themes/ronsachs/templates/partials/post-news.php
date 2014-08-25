<article class="span3">
<a href="<?php the_permalink(); ?>">
	<?php pxl::timthumb( 'post_thumbnail', array( 'w' => 200, 'h' => 115 ), 'medium' ); ?>
	<h3><?php the_title_limit( 55, '...'); ?></h3>
</a>
	<?php $date = get_the_date(); pxl::excerpt("length=25 class='date read-more' text='$date'"); ?>
</article>