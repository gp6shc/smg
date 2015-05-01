<article>
	<a href="<?php the_permalink(); ?>">
		<div class="post"><?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?></div>
		<h3><?php the_title(); ?></h3>
	</a>
	<?php pxl::excerpt("length=50 class='read-more' text='Read More' inline=true sep=false"); ?>
</article>