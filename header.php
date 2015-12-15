<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Amplify
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'amplify' ); ?></a>

	<?php if ( get_header_image() ) : ?>
		<img class="header-image" src="<?php echo esc_url(get_header_image()); ?>">
		<?php $header_image = 'has-banner'; ?>	
	<?php else : ?>
		<?php $header_image = ''; ?>	
	<?php endif; ?>

	<header id="masthead" class="site-header <?php echo esc_attr($header_image); ?>" role="banner">
		<div class="container">

			<?php if (get_theme_mod('header_style', 'menu-above') == 'menu-above') : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu clearfix' ) ); ?>
			</nav><!-- #site-navigation -->
			<nav class="mobile-nav"></nav>
			<?php endif; ?>

			<div class="site-branding">
	        <?php if ( get_theme_mod('site_logo') && get_theme_mod('logo_style', 'hide-title') == 'hide-title' ) : //Show only logo ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
	        <?php elseif ( get_theme_mod('logo_style', 'hide-title') == 'show-title' ) : //Show logo, site-title, site-description ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo show-title" src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>	        
	        <?php else : //Show only site title and description ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
	        <?php endif; ?>
			</div>

			<?php if (get_theme_mod('header_style', 'menu-above') == 'menu-below') : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu clearfix' ) ); ?>
			</nav><!-- #site-navigation -->
			<nav class="mobile-nav"></nav>
			<?php endif; ?>
		</div>
		<?php get_search_form(); ?>
	</header><!-- #masthead -->

	<?php if ( !is_page_template('templates/page_live-composer.php') && !is_home() ) : ?>
		<?php echo amplify_page_title(); ?>
	<?php endif; ?>

	<?php if ( !is_page_template('templates/page_live-composer.php') ) : ?>
		<?php $container = "container"; ?>
	<?php else : ?>
		<?php $container = ""; ?>
	<?php endif; ?>
	<div id="content" class="site-content clearfix <?php echo esc_attr($container); ?>">

    <?php if( function_exists('bcn_display') && !is_front_page() ) : // Support for Breadcrumb NavXT ?>
    <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
    	<?php bcn_display(); ?>
    </div>
    <?php endif; ?>