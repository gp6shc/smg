<style>
/*hr{
	border-bottom: 2px solid #333;
	padding:0px 0px 0px 0px;
	text-align:left;
	width:100%;
}*/
.post img {
	border-left: 15px solid #DA1F26;
	max-width: 100%;
}
</style>

<a href="<?php the_permalink(); ?>">
<div class="post"><?php pxl::timthumb( 'post_thumbnail', array( 'w' => 435, 'h' => 180 ), 'original' ); ?></div>
<h3><?php the_title(); ?></h3>
</a>
<?php pxl::excerpt("length=50 class='read-more' text='Read More' inline=true sep=false"); ?>
