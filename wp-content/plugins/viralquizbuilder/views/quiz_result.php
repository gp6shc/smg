<div id="vqzb_result_page">

    <?php if ($content): ?>
        <!-- print content here -->
        <div><?php echo wpautop(do_shortcode($content['text'])); ?></div>
    <?php endif; ?>

        <?php if ($badge): ?> 
    <!-- print badge here -->
    <div id="vqzb_result_badge">
        <img class="result_img" src="<?php echo $image_link; ?>" alt=""/>

        <div id="social_links_wrap">


            <!-- twitter -->
            <a class="social_link popup twitter" href="http://twitter.com/home/?status=<?php echo $badge['share_text_twitter'] ?>">
	<img src="<?php echo VQZB_IMG_DIR . 'twitter.png'; ?>" alt="" />
	<?php echo vqzb_i18n('share_tw'); ?>
            </a>

            <!-- facebook -->
            <?php if ($fb_app_id != NULL): ?>
                <a class="social_link" target="_blank" href="https://www.facebook.com/dialog/feed?
                   app_id=<?php echo $fb_app_id; ?>&
                   link=<?php echo urlencode($quiz_url); ?>&
                   picture=<?php echo urlencode($image_link); ?>&
                   name=<?php echo urlencode($quiz['name']); ?>&
                   caption=Quiz&
                   description=<?php echo $badge['share_text_fb']; ?>&
                   redirect_uri=<?php echo urlencode(get_bloginfo('url')); ?>">
                    <img src="<?php echo VQZB_IMG_DIR . 'facebook.png'; ?>" alt="" />
	    <?php echo vqzb_i18n('share_fb'); ?>
                </a>
            <?php endif; ?>

            <!-- pinterest -->
            <a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode($quiz_url); ?>&media=<?php echo urlencode($image_link); ?>&description=<?php echo $badge['share_text_pin']; ?>" class="pin-it-button social_link popup" count-layout="none">
	<img src="<?php echo VQZB_IMG_DIR . 'pinterest.png'; ?>" alt="" />
	<?php echo vqzb_i18n('share_pin'); ?>
            </a>

            <!-- blog -->
            <a class="social_link" href="" onClick="javascript: jQuery('#add_to_blog_text').show(); return false;">
	<img src="<?php echo VQZB_IMG_DIR . 'addtoblog.png'; ?>" alt="" />
	<?php echo vqzb_i18n('share_site'); ?>
            </a>

            <!-- add to blog content -->
            <div id="add_to_blog_text">
	<textarea onclick="this.select();" ><a href="<?php echo $quiz_url; ?>"><img src="<?php echo $image_link; ?>" alt="<?php echo $quiz['name']; ?>" /></a><p>Created by <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></p>
	</textarea>
	<span class="instruction"><?php echo vqzb_i18n('share_site_instructions'); ?></span>
            </div>

        </div>

        <div style="clear: both; float: none"></div>
        <p><?php echo vqzb_i18n('created-by'); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></p>
    </div>
     <?php endif; ?>
</div>

<script>
    jQuery('.popup').click(function(event) {
        var width  = 575,
        height = 400,
        left   = (jQuery(window).width()  - width)  / 2,
        top    = (jQuery(window).height() - height) / 2,
        url    = this.href,
        opts   = 'status=1' +
            ',width='  + width  +
            ',height=' + height +
            ',top='    + top    +
            ',left='   + left;

        window.open(url, 'popup', opts);

        return false;
    });
</script>