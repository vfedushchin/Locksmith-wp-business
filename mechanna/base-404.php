<?php get_header( mechanna_template_base() ); ?>

	<?php do_action( 'mechanna_render_widget_area', 'full-width-header-area' ); ?>

	<?php mechanna_site_breadcrumbs(); ?>

	<div class="container">

		<?php do_action( 'mechanna_render_widget_area', 'before-content-area' ); ?>

		<div class="row">

			<div id="primary" class="col-xs-12 col-md-8 col-md-push-2" >

				<?php do_action( 'mechanna_render_widget_area', 'before-loop-area' ); ?>

				<main id="main" class="site-main" role="main">

					<?php include mechanna_template_path(); ?>

				</main><!-- #main -->

				<?php do_action( 'mechanna_render_widget_area', 'after-loop-area' ); ?>

			</div><!-- #primary -->


		</div><!-- .row -->

		<?php do_action( 'mechanna_render_widget_area', 'after-content-area' ); ?>

	</div><!-- .container -->

	<?php do_action( 'mechanna_render_widget_area', 'after-content-full-width-area' ); ?>

<?php get_footer( mechanna_template_base() ); ?>
