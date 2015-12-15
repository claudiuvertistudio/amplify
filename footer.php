<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Amplify
 */
?>

	</div><!-- #content -->
	<?php if ( is_active_sidebar( 'sidebar-2' ) || is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) ) : ?>
		<?php get_sidebar('footer'); ?>
	<?php endif; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social-navigation clearfix col-md-12">
				<?php wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'menu_class' => 'menu clearfix', 'fallback_cb' => false ) ); ?>
			</nav>
			<?php endif; ?>
			<div class="site-info col-md-12">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'amplify' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'amplify' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %2$s by %1$s.', 'amplify' ), 'JustFreeThemes', '<a href="http://justfreethemes.com/amplify/" rel="nofollow">Amplify</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
