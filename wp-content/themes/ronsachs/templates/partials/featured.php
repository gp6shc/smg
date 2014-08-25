<?php /* Home Page | Featured Carousel */ ?>

<div id="featured" display="visible" slider="yes" wrap="960">
	<div display="visible" slides="yes">
	<?php $args = array(
		'numberposts'     => -1,
		'orderby'         => 'post_date',
		'order'           => 'DESC',
		'post_type'       => 'portfolio',
		'post_status'     => 'publish',
		'meta_key'        => '_thumbnail_id',
		'meta_compare'    => '>=',
		'meta_value'      => 1,
	);
	$featured = get_posts( $args );
	foreach( $featured as $key=>$post ) : setup_postdata($post); if(has_post_thumbnail()) {
		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail');
		$original_url = wp_get_attachment_image_src($thumb_id,'original');
	}; ?>
		<div class="slide <?php echo ( $key+1 == 1 ? 'active' : false ); ?>" rel="<?php echo $key+1; ?>">
			<img src="<?php echo $original_url[0]; ?>" />
			<div class="info">
				<span><?php the_title(); ?></span>
				<?php the_content(); ?>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
	<div slider="controls">
		<div class="dots">
			<a href="#" rel="1" class="active"></a>
			<?php for ($i = 2; $i <= count($featured); $i++) {
			    echo "<a href=\"#\" rel=\"$i\"></a>";
			} ?>
		</div>
	</div>
</div>