<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
?>
<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'kubrick'); ?></p>
<?php
	return;
}

function garland_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
?>
<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent'); ?>id="comment-<?php comment_ID() ?>">
	<div id="div-comment-<?php comment_ID() ?>">
	<span class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> Says:', 'kubrick'), get_comment_author_link()); ?>
	</span>
	<?php if ($comment->comment_approved == '0') : ?>
	<em><?php _e('Your comment is awaiting moderation.', 'kubrick'); ?></em>
	<?php endif; ?>
	<br />

	<small class="comment-meta commentmetadata"><a href="#comment-<?php comment_ID() ?>" title=""><?php printf(__('%1$s at %2$s', 'kubrick'), get_comment_date(), get_comment_time()); ?></a> <?php edit_comment_link(__('edit', 'kubrick'),'&nbsp;&nbsp;',''); ?></small>

	<?php comment_text(); ?>
	<div class="reply">
		<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	</div>
<?php
}

if (have_comments()) : ?>
	<h3 id="comments"><?php comments_number(__('No Responses Yet', 'kubrick'), __('One Response', 'kubrick'), __('% Responses', 'kubrick'));?> <?php printf(__('to &#8220;%s&#8221;', 'kubrick'), the_title('', '', false)); ?></h3>

	<ol class="commentlist">
	<?php wp_list_comments(array('callback'=>'garland_comment')); ?>
	</ol>
	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<br />
<?php endif; ?>

<?php if (comments_open()) : ?>
<div id="respond">
<h3><?php comment_form_title( __('Leave a Reply', 'kubrick'), __('Leave a Reply to %s', 'kubrick') ); ?></h3>
<div id="cancel-comment-reply"><small><?php cancel_comment_reply_link() ?></small></div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'kubrick'), get_option('siteurl') . '/wp-login.php?redirect_to=' . urlencode(get_permalink())); ?></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<div>

<?php if ( $user_ID ) : ?>

<p><?php printf(__('Logged in as <a href="%1$s">%2$s</a>.', 'kubrick'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account', 'kubrick'); ?>"><?php _e('Logout &raquo;', 'kubrick'); ?></a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small><?php _e('Name', 'kubrick'); ?> <?php if ($req) _e("(required)", "kubrick"); ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small><?php _e('E-mail (will not be published)', 'kubrick'); ?> <?php if ($req) _e("(required)", "kubrick"); ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Website', 'kubrick'); ?></small></label></p>

<?php endif; ?>

<!--<p><small><?php printf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>', 'kubrick'), allowed_tags()); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'kubrick'); ?>" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>
</div>
</form>

<?php endif; // If registration required and not logged in ?>
</div>
<?php elseif ( have_comments() ) : ?>
	<p class="nocomments"><?php _e('Comments are closed.', 'kubrick'); ?></p>
<?php endif; // if you delete this the sky will fall on your head ?>