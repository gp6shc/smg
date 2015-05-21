<?php if (is_singular('alumni')): $fields = get_fields(); ?>
<img src="<?= $fields[current_photo][sizes][large]?>" class="alumni-single-img"/>
<div class="alumni">
	<div class="full-view">
		<h1><?php the_title()?></h1>
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
</div> <!-- /.alumni -->

<script>
	$('.sachs-image').on('click', function() {
		$(this).toggleClass('big');
	});
</script>
	

<?php elseif (is_singular('work')): ?>

<div class="row lined single-work">
	<h2><?php the_title(); ?></h2>
    <!--post content-->
	<?php the_content(); ?>
	<!--end post content-->

	<!--share at bottom-->
	<div class="row"><em><span class="share">share: <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="_blank"><i class="icon icon-facebook"></i></a> <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&via=SachsMediaGrp&text=<?php the_title(); ?>&original_referer=<?php echo home_url(); ?>" target="_blank"><i class="icon icon-twitter"></i></a></em></div>
	<!--end share at bottom-->
</div><!--end row lined-->


<?php else: ?>


<div class="row lined single">
	<div class="span9">
		<?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
		<h2><?php the_title(); ?></h2>
		<em><?php the_time('F jS, Y'); ?> | Posted by: <?php the_author(); ?> | <span class="share">share: <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="_blank"><i class="icon icon-facebook"></i></a> <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&via=SachsMediaGrp&text=<?php the_title(); ?>&original_referer=<?php echo home_url(); ?>" target="_blank"><i class="icon icon-twitter"></i></a></span>
		</em>
        <!--post content-->
		<?php the_content(); ?>
		<!--end post content-->

		<!--share at bottom-->
		<em><span class="share">share: <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" target="_blank"><i class="icon icon-facebook"></i></a> <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&via=SachsMediaGrp&text=<?php the_title(); ?>&original_referer=<?php echo home_url(); ?>" target="_blank"><i class="icon icon-twitter"></i></a></em>
		<!--end share at bottom-->

		<!--fb comments-->
		<h3>Leave a Comment:</h3>
		<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=712207672128635";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<fb:comments href="<?php the_permalink(); ?>" width="720"></fb:comments>
		<!--end fb comments-->

		<!--responsive fb comments hack-->
		<style>
		.fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style] {width: 100% !important;}
		.fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] {width: 100% !important;}
		</style>
		<!--end responsive fb comments hack-->
	</div><!--end span9-->
	<?php get_sidebar(); ?>
</div><!--end row lined-->

<?php endif;?>