<style>
hr{
	border-bottom: 2px solid #333;
	padding:0px 0px 0px 0px;
	text-align:left;
	width:100%;
}
.post img {
	border-left: 0px solid #DA1F26;
	max-width: 100%;
}
#movedown{
	padding-top:12px;
}
</style>

<div id="movedown">
<a href="<?php the_permalink(); ?>">
<div class="post">
	<?php if ( has_post_thumbnail() ) the_post_thumbnail('full'); ?>
</div>
<h3><?php the_title(); ?></h3>
</a>
<?php pxl::excerpt("length=30 class='read-more' text='Read More' inline=true sep=false"); ?>
<div id="bottom-line"></div>
</div>

