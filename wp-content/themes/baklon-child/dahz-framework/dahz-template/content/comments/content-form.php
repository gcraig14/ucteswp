<?php
/**
 * The template for displaying comments navigation
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package baklon
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
// apply_filters( 'comment_form_submit_field', '<p class="form-submit">%1$s %2$s</p>', array $args );

$commenter		= wp_get_current_commenter();
$req			= get_option( 'require_name_email' );
$aria_req		= ( $req ? " aria-required='true'" : '' );
$args = array(
		'comment_field'	=> '
			<p class="comment-form-comment">
				<label for="comment"> Tu comentario </label>
				<textarea class="uk-width-1-1" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
			</p>
			',
		'class_form' => 'comment-form uk-grid',
		'label_submit'	=> 'Publicar comentario',
		'comment_field'	=> '<div class="uk-width-1-1"><label for="comment"> Comentar </label><textarea id="comment" class="uk-width-1-1" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>',
		'comment_notes_before' => '<div class="uk-width-1-1"><p class="comment-notes uk-width-1-1"> Tu correo electrónico no será publicado' . ( $req ? 'Los campos obligatorios están marcados *' : '' ) . '</p></div>',
		'fields'		=> apply_filters( 'comment_form_default_fields', array(
			'author'=> '<p class="uk-width-1-2 comment-form-author">
							<label for="author"> Nombre ' .
			    			( $req ? '<span class="required">*</span>' : '' ) . '</label>
							<input id="author"
							 name="author"
							 type="text"
							 value="' . esc_attr( $commenter['comment_author'] ) .'"
							 size="30"
							 maxlength="245"
							 ' . $aria_req .'
							 >
						</p>',
			'email'	=> '<p class="uk-width-1-2 comment-form-email">
							<label for="email">' . __( 'Email', 'baklon' ) .
				    		( $req ? '<span class="required">*</span>' : '' ) . '</label>
							<input id="email"
							 name="email"
							 type="email"
							 value="'. esc_attr( $commenter['comment_author_email'] ) .'"
							 size="30"
							 maxlength="100"
							 aria-describedby="email-notes"
							 ' . $aria_req .'
							 >
						</p>',
			'url'	=> '<p class="uk-width-1-1 comment-form-url">
						<label for="url"> Sitio web </label>
						<input id="url"
							 name="url"
							 type="url"
							 value="'. esc_attr( $commenter['comment_author_url'] ) .'"
							 size="30"
							 maxlength="200"
							 >
						</p>'
			)
		),
		'submit_field'		=> '<p class="form-submit uk-width-1-1">%1$s %2$s</p>',
		'title_reply_before'=> '<h4 id="reply-title" class="uk-width-1-1 comment-reply-title uk-flex uk-flex-between">',
		'title_reply_after'	=> '</h4>',
		'cancel_reply_link'	=> '<i data-uk-icon="close" ></i>'
	);
?>
<div class="comments-form">
	<?php comment_form( $args );?>
</div>
