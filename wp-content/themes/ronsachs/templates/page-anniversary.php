<?php /* Template Name: Anniversary */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row">	
	<h1 class="anniversary"><?php the_title(); ?></h1>
	<div class="anniversary-content"><?php the_content(); ?></div>
</div>

<div class="row alumni-contain">
	<?php $loop = new WP_Query( array( 'post_type' => 'alumni', 'posts_per_page' => 0 ) ); ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); $fields = get_fields(); ?>
		<div class="alumni">
			<div class="preview-box" style="background-image:url('<?= $fields[current_photo][sizes][large]?>')">
			<!--<img src="<?= $fields[current_photo][sizes][medium]?>"/> -->
				<span class="preview-title"><?php the_title()?></span>
			</div>
			<div class="full-view-contain">
				<div class="full-view">
					<span class="bg-name"><?php the_title()?></span>
					<div class="row">
						<div class="current-position">Now:<br/>
							<?php if ($fields[website]) :?>
								<a href="<?= $fields[website]?>" target="_blank"><?= $fields[current_company]?></a><br/>
								<?php else:?>
								<p><?= $fields[current_company]?></p><br/>
							<?php endif;?>
							<span class="current-title"><?= $fields[title]?></span><br/>
							<span class="current-state"><?= $fields[state]?></span>
						</div>
						<div class="smg-position">
							<span><?= $fields[years]?></span><br/>
							<span class="smg-title"><?= $fields[position_at_smg]?></span>
						</div>
					</div>
					<div class="memories row">
						<img class="sachs-image" src="<?= $fields[sachs_photo][sizes][large]?>"/>
						<h3>Fondest Memory at Sachs:</h3>
						<p><?= $fields[fondest_memory]?></p>
						<h3>Biggest Takeaway from Sachs:</h3>
						<p><?= $fields[biggest_takeaway]?></p>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
	
	<script>
		$('.alumni').each(function() {
			var pBox 		 = $(this).find('.preview-box');
			var fViewContain = $(this).find('.full-view-contain');
			var fView 		 = $(this).find('.full-view');
			
			fViewContain.css('top',(pBox.offset().top + 165));
			fView.attr('data-height', fView.innerHeight() );
		});
		
		$('.alumni').on('click', function(){
			var fullView		= $(this).find('.full-view');
			var fullViewContain = $(this).find('.full-view-contain');
			var fullViewHeight	= fullView.data('height');
			var previewBox		= $(this).find('.preview-box');
			var sachsImage 		= $(this).find('.sachs-image');
			
			if ($(this).hasClass('active')) {
				sachsImage.removeClass('big');
				fullViewContain.css('overflow', 'hidden');
				$(this).removeClass('active');
				previewBox.css('margin-bottom', 0);
			}else{
				$('.alumni-contain').find('.active').each(function() {
					$(this).find('.sachs-image').removeClass('big');
					$(this).find('.full-view-contain').css('overflow', 'hidden');
					$(this).removeClass('active');
					$(this).find('.preview-box').css('margin-bottom', 0);
				});
				$(this).addClass('active');
				previewBox.css('margin-bottom', (fullViewHeight + 15));
				setTimeout(function() {
					fullViewContain.css('overflow', 'visible');
				}, 700);
			}
		});
		
		$('.full-view').on('click', function(e) {
			e.stopPropagation();
		});
		
		$('.sachs-image').on('click', function() {
			$(this).toggleClass('big');
		});
	</script>
</div><!--end alumni-contain -->
<?php endwhile; pxl::page(0); ?>