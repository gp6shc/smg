<meta property='fb:app_id' content='712207672128635' />
<div class="row lined">
	<div class="span9">
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