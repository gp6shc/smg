<div class="row lined">
	<div class="span12">
		<?php pxl::timthumb( 'post_thumbnail', array( 'w' => 700, 'h' => 403 ), 'original' ); ?>
		<h2><?php the_title(); ?></h2>
		<em><?php the_time('F jS, Y'); ?> | Posted by: <?php the_author(); ?> | <span class="share">share: <a class="facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="_blank">facebook</a> <a class="twitter" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&via=SachsMediaGrp&text=<?php the_title(); ?>&original_referer=<?php echo home_url(); ?>" target="_blank">twitter</a></span>
		</em>
        <!--post content-->
		<?php the_content(); ?>
		<!--end post content-->

		<!--share at bottom-->
		<em><span class="share">Share:<!--<?php the_author_firstname(); ?>'s Post--> <a class="facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="_blank">facebook</a> <a class="twitter" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&via=SachsMediaGrp&text=<?php the_title(); ?>&original_referer=<?php echo home_url(); ?>" target="_blank">twitter</a></span></em>
		<!--end share at bottom-->
	</div><!--end span12-->
</div><!--end row lined-->