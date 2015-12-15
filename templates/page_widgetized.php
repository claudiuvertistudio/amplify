<?php
/*
Template Name: Widgetized
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php $id = get_the_id(); ?>

			<?php if ( is_active_sidebar( 'widget-area-' . $id ) ) : ?>
			<div class="entry-content">
		 		<?php dynamic_sidebar( 'widget-area-' . $id ); ?>
		 	</div>	
			<?php endif; ?>	

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
