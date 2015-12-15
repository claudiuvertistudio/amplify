<?php
/**
 * The template for displaying all single posts.
 *
 * @package Amplify
 */

get_header(); ?>

	<?php if ( get_theme_mod('fullwidth_single', 0) == 1 ) {
		$layout = 'fullwidth';
	} else {
		$layout = '';
	} ?>

	<div id="primary" class="content-area <?php echo esc_attr($layout); ?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php amplify_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( get_theme_mod('fullwidth_single', 0) != 1 ) {
	get_sidebar();
}
?>
<?php get_footer(); ?>
