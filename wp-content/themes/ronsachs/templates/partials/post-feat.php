<?php query_posts('category_name=featured&showposts=4'); ?>
<?php while (have_posts()) : the_post(); ?>
<article class="span3">
	<?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
	<h3><?php the_title(); ?></h3>
	<?php $date = get_the_date(); pxl::excerpt("length=32 class='date read-more' text='$date'"); ?>
</article>
<?php endwhile; ?>