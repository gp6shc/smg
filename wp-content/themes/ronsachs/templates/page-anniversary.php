<?php /* Template Name: Anniversary */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row">	
		<h3><?php the_title(); ?></h3>
		<div><?php the_content(); ?></div>		
</div>

<div class="row">
	<!--Case Studies -->
	<?php $loop = new WP_Query( array( 'post_type' => 'alumni', 'posts_per_page' => 0 ) ); ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); $fields = get_fields(); ?>
	<?php
		if( $fields ) {
			foreach( $fields as $field_name => $value )
			{
				// get_field_object( $field_name, $post_id, $options )
				// - $value has already been loaded for us, no point to load it again in the get_field_object function
				$field = get_field_object($field_name, false, array('load_value' => false));
		
				echo '<div>';
					echo '<h3>' . $field_name . '</h3>';
					echo $value;
				echo '</div>';
			}
		}
	?>
	<?php endwhile; ?>

</div><!--end container row lined-->
<?php endwhile; pxl::page(0); ?>