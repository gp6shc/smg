<article class="span3">
	<a href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); ?>
		<h3><?php the_title_limit( 55, '...'); ?></h3>
	</a>
	<p><?php wp_character_excerpt(160, false); ?></p>
	<a href="<?php the_permalink(); ?>" class="date read-more"><?php the_time('F j, Y'); ?></a>
</article>