<div class="post row">
	<div class="span3">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php pxl::excerpt("length=30 class='read-more' text='Read More' inline=true sep=false"); ?>
		<div class="data">
		<!-- <span class="share">share: <a class="facebook" href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="_blank">facebook</a> <a class="twitter" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&via=SachsMediaGrp&text=<?php the_title(); ?>&original_referer=<?php echo home_url(); ?>" target="_blank">twitter</a></span> -->
			<span><h5><?php the_time('F j, Y') ?></h5></span>
		</div>
	</div>
	<div class="image span6">
		<?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
	</div>
</div>