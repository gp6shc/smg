<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
$thumb_url = $thumb_url_array[0];

?>

<div class="work portfolio">
	<a href="<?php the_permalink() ?>">
		<div class="portfolio-image" style="background-image: url(<?php echo $thumb_url ?>)"></div>
		<div class="portfolio-title">
			<h3><?php the_title() ?></h3>
			<ul class="medium-list">
			<?php $terms = get_the_terms($post->id, 'medium');
				if ( !empty($terms) && !is_wp_error( $terms ) ) {
					foreach( $terms as $term ) {
						echo '<li>' . esc_html( $term->name ) . '</li>'; 
					}
				}else{
					echo '<li></li>'; 
				}
			?>
			</ul>
		</div>
	</a>	
</div>