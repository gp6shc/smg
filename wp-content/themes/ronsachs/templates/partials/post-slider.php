<a href="<?php echo home_url( '/design-portfolio' ); ?>" class="work span3">
	<?php pxl::timthumb( 'post_thumbnail', array( 'w' => 274, 'h' => 137 ), 'medium' ); ?>
	<?php $terms = get_the_terms( $post->ID, 'medium' ); 
		if ( $terms ) foreach ($terms as $term) $medium = $term->name;
		else $medium = false;
	?>
	<h5><span><?php echo $medium; ?>:</span> <?php the_title(); ?></h5>
</a>
