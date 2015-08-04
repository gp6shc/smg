<?php /* Template Name: Anniversary - People */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row">	
	<h1 class="anniversary">20 Years of Impact</h1>
	<div class="anniversary-content"><?php the_content(); ?></div>
</div>

<div class="row">
	<ul class="anniv-nav">
		<li class="current-page"><a href="/anniversary/people">People</a></li>
		<li><a href="/anniversary/community">Community</a></li>
		<li><a href="/anniversary/issues">Issues</a></li>
	</ul>
</div>
<div class="row alumni-contain">
	<?php $loop = new WP_Query( array( 'post_type' => 'alumni', 'posts_per_page' => -1, 'orderby' => 'rand' ) ); ?>
	<?php $i = 0; ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); $fields = get_fields(); $i++;?>
		<div class="alumni" id="<?= $post->post_name;?>">
			<div class="preview-box" style="background-image:url('<?= $fields[current_photo][sizes][large]?>')">
				<span class="preview-title"><?php the_title()?></span>
			</div>
			<div class="full-view">
				<span class="bg-name"><?php the_title()?></span>
				<div class="row">
					<div class="current-position">Now:<br/>
						<?php if ($fields[website]) :?>
							<a href="<?= $fields[website]?>" target="_blank"><?= $fields[current_company]?></a><br/>
							<?php else:?>
							<a href="#"><?= $fields[current_company]?></a><br/>
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
					<h3>
						<a class="hash-url" href="<?= home_url()?>/anniversary/people/#<?= $post->post_name;?>">
						Fondest Memory at Sachs:
						</a>
					</h3>
					<p><?= $fields[fondest_memory]?></p>
					<h3>Biggest Takeaway from Sachs:</h3>
					<p><?= $fields[biggest_takeaway]?></p>
				</div>
			</div>
		</div> <!-- /.alumni -->
		<?php if ($i % 3 === 0): ?>
		<div class="full-view-contain"></div>
		<?php endif;?>
	<?php endwhile; ?>
	<?php if ( !($i % 3 === 0) ): ?>
		<div class="full-view-contain"></div>
	<?php endif;?>
</div><!--end alumni-contain -->

<script>
	function openRow(elem, cloneElem, shouldScroll) { 					// elem = element clicked, to be cloned
		elem.children('.full-view').clone(true).appendTo(cloneElem); 	// clone the hidden content of the element into dest
		cloneElem.addClass('visible'); 									// make dest visible
		elem.addClass('active');										// flag elem as the current, open, visible content
		setTimeout(function() {											// allow the .sachs-image to escape bounds when scaled up
			cloneElem.addClass('allow-overflow');
		}, 700);
		
		shouldScroll = typeof shouldScroll !== 'undefined' ? shouldScroll : 42;
		if (shouldScroll) {
			$("html, body").animate({ scrollTop: elem.offset().top }, 600);
		}
	}
	
	function closeRow(elem, cloneElem) {
		cloneElem.removeClass('allow-overflow');
		elem.removeClass('active');
		cloneElem.removeClass('visible');
		setTimeout(function(){ cloneElem.empty(); }, 700);
	}
	
	$('.sachs-image').on('click', function() {
		$(this).toggleClass('big');
	});
	
	$('.alumni').on('click', function(){
		var clicked = $(this);
		var cloneRow = clicked.nextAll(".full-view-contain").first();
		
		// is the one clicked already open? If so close it
		if ( clicked.hasClass('active') ) {
			closeRow( clicked, cloneRow );
		}else{
			// it isn't already open, so check if there are any others open that need to be closed first
			var active = $('.alumni-contain').children('.active');

			// anything else already open? If so close that other thing
			if ( active.length !== 0 )  {
				
				var otherActive = $(active[0]); 											// if everything works right, there should only ever be one other active item at any point, so no .each() over active
				var existingCloneRow = otherActive.nextAll(".full-view-contain").first(); 	// possibly remove .first() if all working properly
					
				// does the new item use the same row as the old one? if so don't close the row, just empty and replace	
				if ( existingCloneRow[0] === cloneRow[0] ) {
					cloneRow.addClass('fade-out');
					setTimeout(function(){
						cloneRow.empty();
						otherActive.removeClass('active');
						openRow(clicked, cloneRow, false);
					},300);
					setTimeout(function(){
						cloneRow.removeClass('fade-out');
					},400);
				}else{
					// whelp, just close the old one and open the new one
					var scrollToFuture = clicked.offset().top - existingCloneRow.innerHeight();
					closeRow(otherActive, existingCloneRow);
					openRow(clicked, cloneRow, false);
					
					// is the new item lower than the previous one?, if so scroll to where it will be after the old one closes
					if ( otherActive.index('.alumni') < clicked.index('.alumni') ) {
						setTimeout(function() {
							$("html, body").animate({ scrollTop: scrollToFuture }, 600);
						}, 375);
					}else{
						$("html, body").animate({ scrollTop: clicked.offset().top }, 600);
					}
				}							
			}else{
				// the default: nothing else open, go ahead and open the clicked item
				openRow(clicked, cloneRow);
			}
		}
	});
	
	$(document).ready(function() {
		if (window.location.hash) {
			closestRow = $(window.location.hash).nextAll(".full-view-contain").first();
			openRow( $(window.location.hash) , closestRow, true);
		}
	});
</script>
<?php endwhile; pxl::page(0); ?>