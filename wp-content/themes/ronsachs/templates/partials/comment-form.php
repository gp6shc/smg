<?php
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	comment_form_pxl(
		array(
			'comment_notes_after' => '',
			'title_reply' => "Leave a Reply",
			'fields' => array(
				'author' => '<p class="span4 comment-form-author">' . 
							'<label for="author">' . __( 'Name' ) . 
							'*</label> ' . 
									'<input id="author" name="author" type="text" value="' . 
									esc_attr( $commenter['comment_author'] ) . '" size="30"' . 
									$aria_req . ' /></p>',
				'email' => '<p class="span4 comment-form-email"><label for="email">' .
							__( 'Email' ) . 
							 '*</label> ' . 
									'<input id="email" name="email" type="text" value="' . 
									esc_attr(  $commenter['comment_author_email'] ) . 
									'" size="30"' . $aria_req . ' /></p>',
				'url' => '<p class="span4 comment-form-url"><label for="url">' 
						. __( 'Website' ) . '</label>' .
								'<input id="url" name="url" type="text" value="' . 
								esc_attr( $commenter['comment_author_url'] ) . 
								'" size="30" /></p>'
			)
		)
	);
?>