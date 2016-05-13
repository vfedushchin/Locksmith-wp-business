<footer class="comment-meta">
	<div class="comment-author vcard">
		<?php echo __tm_comment_author_avatar(); ?>
	</div>
	<div class="comment-metadata">
		<?php printf( __( '<span class="posted-by"> by</span> %s', '__tm' ), __tm_get_comment_author_link() ); ?>
		<?php echo __tm_get_comment_date( array( 'format' => 'M d, Y' ) ); ?>
	</div>
</footer>
<div class="comment-content">
	<?php echo __tm_get_comment_text(); ?>
</div>
<div class="reply">
	<?php echo __tm_get_comment_reply_link( array( 'reply_text' => '<i class="fa fa-mail-reply"></i>' ) ); ?>
</div>