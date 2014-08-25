<?php
/**
 * Paging Navigation
 * 
 * This is used for Previous and Next links to navigate the pages of posts.
 * @param	string	$nav	This sets the class to either top of the page or bottom.
 */
?>
<div id="nav-<?php echo $nav; ?>" class="navigation">
	<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
	<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
</div>