<a href="<?php the_permalink() ?>" class="work">
	<?php if ( has_post_thumbnail() ) the_post_thumbnail('medium'); ?>
	<?php $terms = get_the_terms( $post->ID, 'medium' ); 
		if ( $terms ) foreach ($terms as $term) $medium = $term->name;
		else $medium = false;
	?>
	<h5><span><?php echo $medium; ?>:</span> <?php the_title(); ?></h5>
</a>
