<?php query_posts('category_name=featured&showposts=4'); ?>
<?php while (have_posts()) : the_post(); ?>
<article class="span3">
	<?php pxl::timthumb( 'post_thumbnail', array( 'w' => 200, 'h' => 115 ), 'medium' ); ?>
	<h3><?php the_title(); ?></h3>
	<?php $date = get_the_date(); pxl::excerpt("length=32 class='date read-more' text='$date'"); ?>
</article>
<?php endwhile; ?>