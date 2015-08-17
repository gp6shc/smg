<?php /* Template Name: Anniversary - Community */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row">	
	<h1 class="anniversary">20 Years of Impact 
	<svg class="anniv-chev" viewBox="0 0 80 125" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
	    <g id="Page-1" stroke="none" fill="ffffff" fill-rule="evenodd" sketch:type="MSPage">
	        <path d="M78.5328185,65.9894541 L21.2355212,123.526675 C20.2574003,124.508892 19.0990991,125 17.7606178,125 C16.4221364,125 15.2638353,124.508892 14.2857143,123.526675 L1.46718147,110.654467 C0.489060489,109.67225 0,108.509098 0,107.165012 C0,105.820926 0.489060489,104.657775 1.46718147,103.675558 L42.4710425,62.5 L1.46718147,21.3244417 C0.489060489,20.342225 0,19.1790736 0,17.8349876 C0,16.4909016 0.489060489,15.3277502 1.46718147,14.3455335 L14.2857143,1.47332506 C15.2638353,0.491108354 16.4221364,0 17.7606178,0 C19.0990991,0 20.2574003,0.491108354 21.2355212,1.47332506 L78.5328185,59.0105459 C79.5109395,59.9927626 80,61.155914 80,62.5 C80,63.844086 79.5109395,65.0072374 78.5328185,65.9894541 L78.5328185,65.9894541 Z" id="Shape" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
	    </g>
	</svg>
	</h1>
	<div class="anniversary-content"><?php the_content(); ?></div>
</div>

<div class="row">
	<ul class="anniv-nav">
		<li><a href="/anniversary/people">People</a></li>
		<li class="current-page"><a href="/anniversary/community">Community</a></li>
		<li><a href="/anniversary/issues">Issues</a></li>
	</ul>
</div>
<div class="row alumni-contain">
	<?php $loop = new WP_Query( array( 'post_type' => 'communities', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) ); ?>
	<?php $i = 0; ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); $fields = get_fields(); $i++;?>

		<div class="alumni issue" id="<?= $post->post_name;?>">
			<div class="preview-box" style="background-image: url('<?= $fields[background_image][sizes][large]?>')">
				<span class="preview-title"><?php the_title()?></span>
			</div>
			<div class="full-view">
				<div class="full-view-wrapper">
					<h3>
						<a class="hash-url" href="<?= home_url()?>/anniversary/community/#<?= $post->post_name;?>"><?php the_title()?></a>
					</h3>
					<div class="memories issue-content">
						<p class="description"><?= $fields[content]?></p>
						<?php if ( $fields[youtube] ) :?>
							<?php $videoID = substr(strrchr( $fields[youtube] , "="), 1); ?>
							<iframe class="yt-embed" src="https://www.youtube.com/embed/<?= $videoID; ?>" frameborder="0" allowfullscreen></iframe>
						<?php endif;?>
						<?php foreach ($fields[images] as $image):
							if ( $image[image_credit] ): ?>
								<a href="<?= $image[image_credit]?>" target="_blank"><img class="issues-image" src="<?= $image[image][sizes][large]?>"/></a>
							<?php else: ?>
								<img class="issues-image" src="<?= $image[image][sizes][large]?>"/>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
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
	function openRow(elem, cloneElem, shouldScroll) { 						// elem = element clicked, to be cloned
		elem.children('.full-view').clone(true).appendTo(cloneElem); 		// clone the hidden content of the element into dest
		cloneElem.addClass('visible'); 										// make dest visible
		var newHeight = elem.children('.full-view').outerHeight();			// get prefound height of content
		cloneElem.css('height', newHeight);									// set new height
		elem.addClass('active');											// flag elem as the current, open, visible content
		setTimeout(function() {												// allow the .sachs-image to escape bounds when scaled up
			if (!cloneElem.hasClass('allow-overflow')) {
				cloneElem.addClass('allow-overflow');
			}
		}, 400);
		
		shouldScroll = typeof shouldScroll !== 'undefined' ? shouldScroll : 42;
		if (shouldScroll) {
			$("html, body").animate({ scrollTop: elem.offset().top }, 600);
		}
	}
	
	function closeRow(elem, cloneElem) {
		cloneElem.removeClass('allow-overflow');
		elem.removeClass('active');
		cloneElem.removeClass('visible');
		cloneElem.css('height', 0);
		setTimeout(function(){ cloneElem.empty(); }, 700);
	}

	
/*
	$('.issues-image').on('click', function() {
		$(this).toggleClass('big');
	});
*/
	
	var isClicking = false;
	
	$('.alumni').on('click', function(){
		if (isClicking) {
			console.log('nerfed');
			return;
		}else{
			isClicking = true;
		}
		
		if (history.replaceState) {
			history.replaceState(null, null, '#' + $(this).attr('id') );
		} else {
			location.hash = $(this).attr('id');
		}
		
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
					cloneRow.removeClass('allow-overflow');
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
				
		setTimeout( function() {
			isClicking = false;
		}, 500);
	});	
		
	$(document).ready(function() {
		if (window.location.hash) {
			closestRow = $(window.location.hash).nextAll(".full-view-contain").first();
			openRow( $(window.location.hash) , closestRow, true);
		}
	});
</script>
<?php endwhile; pxl::page(0); ?>