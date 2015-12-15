<?php
/**
 * Home template
 *
 * @package Amplify
 */

get_header(); ?>

	<?php if ( (get_theme_mod('blog_layout', 'classic') == 'masonry') || (get_theme_mod('blog_layout', 'classic') == 'fullwidth') ) {
		$layout = 'fullwidth';
	} else {
		$layout = '';
	} ?>
	<?php if ( get_theme_mod('blog_layout', 'classic') == 'masonry' ) {
		$masonry = 'home-masonry';
	} else {
		$masonry = '';
	} ?>	

	<div id="primary" class="content-area <?php echo esc_attr($layout); ?>">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<div class="home-wrapper <?php echo esc_attr($masonry); ?>">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>
			</div>

			<?php amplify_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if ( get_theme_mod('blog_layout', 'classic') == 'classic' ) {
	get_sidebar();
}
?>
<?php get_footer(); ?>
