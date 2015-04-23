<a href="<?php echo home_url( '/design-portfolio' ); ?>" class="work span3">
	<?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
	<?php $terms = get_the_terms( $post->ID, 'medium' ); 
		if ( $terms ) foreach ($terms as $term) $medium = $term->name;
		else $medium = false;
	?>
	<h5><span><?php echo $medium; ?>:</span> <?php the_title(); ?></h5>
</a>
