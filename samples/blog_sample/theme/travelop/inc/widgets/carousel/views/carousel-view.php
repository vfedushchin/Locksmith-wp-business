<?php
/**
 * Template part to display Carousel widget.
 *
 * @package Travelop
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
			<?php echo $title; ?>
			<?php echo $content; ?>
		</div>
	</div>
	<footer class="entry-footer">
		<div class="entry-meta">
			<?php echo $date; ?>
			<?php echo $comments; ?>
		</div>
		<?php echo $more_button; ?>
	</footer>
</div>