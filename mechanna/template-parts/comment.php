<footer class="comment-meta">
	<div class="comment-author vcard">
		<?php echo mechanna_comment_author_avatar(); ?>
	</div>
	<div class="comment-metadata">
		<?php printf( esc_html__(  '<span class="posted-by">%1$s by</span> %2$s', 'mechanna' ), '<i class="material-icons">person</i>', mechanna_get_comment_author_link() ); ?>
		<?php echo '<i class="material-icons">access_time</i> ' . esc_html__(  'Published on ' , 'mechanna') . mechanna_get_comment_date( array( 'format' => 'M d, Y' ) ); ?>
	</div>
</footer>
<div class="comment-content">
	<?php echo mechanna_get_comment_text(); ?>
</div>
<div class="reply">
	<?php echo mechanna_get_comment_reply_link( array( 'reply_text' => '<i class="material-icons">reply</i>' ) ); ?>
</div>


