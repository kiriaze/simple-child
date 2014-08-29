<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to simple_comment() which is
 * located in the functions/comments.php file.
 *
 * @package 	WordPress
 * @subpackage 	Simple
 * @version 	1.0
*/

?>

<div class="comments">
	<?php
	if ( post_password_required() ) : ?>
		<p><?php _e( 'Post is password protected. Enter the password to view any comments.', SIMPLE_THEME_SLUG ); ?></p>
</div>

<?php
		return;
	endif;
?>

	<?php if ( have_comments() ) : ?>

		<span class="comment-count">
			<?php comments_number( 'no comments', 'one comment', '% comments' ); ?>
		</span>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'type'		  => 'comment',
					'callback'	  => 'simple_comments',
				    'style'       => 'ol',
				    'short_ping'  => true,
				    'avatar_size' => 74,
				) );
			?>
		</ol>

	<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p><?php _e( 'Comments are closed here.', SIMPLE_THEME_SLUG ); ?></p>

	<?php endif; ?>

	<?php

		$req = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true' required " : '' );
		$fields =  array(
			'author'		=> '<p class="comment-form-author">
			    					<label for="author">' . __( 'Name', SIMPLE_THEME_SLUG ) . ( $req ? '<span class="required">*</span>' : '' )  . '</label>
			    					<input id="author" name="author" type="text" placeholder="Your name" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' />
			    				</p>',
		    'email'  		=> '<p class="comment-form-email">
			    					<label for="email">' . __( 'Email', SIMPLE_THEME_SLUG ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>
			        				<input id="email" name="email" type="email" placeholder="Email Address" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' />
			        			</p>'
		);

		$comments_args = array(
			'fields' 		=>  $fields,
			'comment_field' =>  '<p class="comment-form-comment">
									<label for="comment">' . __( 'Comment', SIMPLE_THEME_SLUG ) . '</label>
									<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required placeholder="Type your comment...">' .'</textarea>
								</p>',
			'id_form'		=> 'commentform',
			'id_submit'		=> 'submit',
			'label_submit'	=> __( 'Submit Comment', SIMPLE_THEME_SLUG ),
		);

		comment_form( $comments_args );
	?>

 	<?php paginate_comments_links(); ?>

</div>
