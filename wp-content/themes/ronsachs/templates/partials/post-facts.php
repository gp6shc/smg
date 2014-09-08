<article class="span9">
	<h3 class="fact-title" title="<?php the_time('F j, Y'); ?>">
		<?php 
			$factPublishDate = get_the_time('Ymd');				//outputs 20140901 for September 1st 2014	(date published)
			$todaysDate = date('Ymd'); 							//outputs 20140901 for September 1st 2014	(server's current time)
			$dayOfTheYear = date('z');							//outputs 34 for February 3rd...	(server's current time)
			$publishedDayOfTheYear = get_the_time('z'); 		//outputs 34 for February 3rd...	(date published)
			
			
			if( $factPublishDate === $todaysDate ) { 								// if published today
				echo 'Today\'s Fact';
				
			}elseif( $factPublishDate == ($todaysDate - 1) || $publishedDayOfTheYear == ($dayOfTheYear - 1) ) {		// if published yesterday
				echo 'Yesterday\'s Fact';
			
			}elseif( $factPublishDate > ($todaysDate - 7) || $publishedDayOfTheYear > ($dayOfTheYear - 7) ) {		// if published within the last week
				echo (the_time('l').'\'s Fact');
				
			}elseif( round($factPublishDate, -4) === round($todaysDate, -4) ){ 		// if published year is the current year
				if( ($factPublishDate % 10) === 1 ) {								// if day number ends in 1, append "st"
					echo(the_time('F j').'st\'s Fact');
			
				}elseif( ($factPublishDate % 10) === 2 ) {							// if day number ends in 2, append "nd"
					echo(the_time('F j').'nd\'s Fact');
			
				}elseif( ($factPublishDate % 10) === 3 ) {							// if day number ends in 3, append "rd"
					echo(the_time('F j').'rd\'s Fact');
			
				}else{																// else append "th"
					echo(the_time('F j').'th\'s Fact');
				}
					
			}else{																	// if not published this year, give everything
				echo(the_time('F j, Y').'\'s Fact');
			}
		?>
	</h3>
	<?php the_content(); ?>
	<h5 class="explicit-date">
		<?php the_time('F j'); ?>
	</h5>
	<hr>
</article>



