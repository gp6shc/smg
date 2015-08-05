<?php /* Template Name: Anniversary - Issues */ pxl::page(); while ( have_posts() ) : the_post(); ?>

<div class="row">	
	<h1 class="anniversary">20 Years of Impact</h1>
	<div class="anniversary-content"><?php the_content(); ?></div>
</div>

<div class="row">
	<ul class="anniv-nav">
		<li><a href="/anniversary/people">People</a></li>
		<li><a href="/anniversary/community">Community</a></li>
		<li class="current-page"><a href="/anniversary/issues">Issues</a></li>
	</ul>
</div>
<div class="row alumni-contain">
	<?php $loop = new WP_Query( array( 'post_type' => 'issues', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) ); ?>
	<?php $i = 0; ?>
	<?php while ( $loop->have_posts() ) : $loop->the_post(); $fields = get_fields(); $i++;?>

		<div class="alumni issue" id="<?= $post->post_name;?>">
			<div class="preview-box" style="background-image:radial-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0)), url('<?= $fields[background_image][sizes][large]?>')">
				<i class="fa <?= $fields[icon]?>"></i>
				<span class="preview-title"><?php the_title()?></span>
			</div>
			<div class="full-view">
				<div class="full-view-wrapper">
					<h3>
						<a class="hash-url" href="<?= home_url()?>/anniversary/people/#<?= $post->post_name;?>"><?php the_title()?> <i class="fa <?= $fields[icon]?>"></i></a>
					</h3>
					<div class="memories issue-content">
						<p class="description"><?= $fields[content]?></p>
						<?php if ( $fields[youtube] ) :?>
							<?php $videoID = substr(strrchr( $fields[youtube] , "="), 1); ?>
							<iframe class="yt-embed" src="https://www.youtube.com/embed/<?= $videoID; ?>" frameborder="0" allowfullscreen></iframe>
						<?php endif;?>
						<?php foreach ($fields[images] as $image): ?>
						<img class="issues-image" src="<?= $image[image][sizes][large]?>"/>
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
			cloneElem.addClass('allow-overflow');
		}, 1000);
		
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
		}, 1000);
	});
		
	$(document).ready(function() {
		if (window.location.hash) {
			closestRow = $(window.location.hash).nextAll(".full-view-contain").first();
			openRow( $(window.location.hash) , closestRow, true);
		}
	});
</script>
<?php endwhile; pxl::page(0); ?>