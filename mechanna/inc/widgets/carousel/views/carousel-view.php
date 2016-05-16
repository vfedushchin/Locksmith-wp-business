<?php
/**
 * Template part to display Carousel widget.
 *
 * @package Mechanna
 * @subpackage widgets
 */
?>

<div class="inner">
	<div class="content-wrapper">
		<header class="entry-header">
			<?php echo $image; ?>
			<?php echo $terms_line; ?>
		</header>
		<div class="entry-content">
			<span class="posted-by"><?php echo esc_html__( 'Posted by ', 'mechanna' ); ?><?php echo $author; ?></span>
			<?php echo $title; ?>
			<?php echo $content; ?>
			<?php echo $more_button; ?>
		</div>
	</div>
	<footer class="entry-footer">
		<div class="entry-meta">
			<?php echo $date; ?>
			<?php echo $comments; ?>
		</div>
	</footer>
</div>