<?php
/**
 * Amplify functions and definitions
 *
 * @package Amplify
 */


if ( ! function_exists( 'amplify_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function amplify_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Amplify, use a find and replace
	 * to change 'amplify' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'amplify', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1140;
	}

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'amplify-project', 540, 350, true );
	add_image_size( 'amplify-thumb', 1080 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'amplify' ),
		'social' => __( 'Social', 'amplify' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'amplify_custom_background_args', array(
		'default-color' => '606c74',
		'default-image' => '',
	) ) );
}
endif; // amplify_setup
add_action( 'after_setup_theme', 'amplify_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function amplify_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'amplify' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer left', 'amplify' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer center', 'amplify' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer right', 'amplify' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Register widget areas for the Widgetized page templates
	$pages = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => 'templates/page_widgetized.php',
	));
	foreach($pages as $page){
		register_sidebar( array(
			'name'          => __( 'Page ', 'amplify' ) . $page->post_title,
			'id'            => 'widget-area-' . $page->post_id,
			'description'   => __( 'Use this widget area to build content for the page: ', 'amplify' ) . $page->post_title,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	$pages = get_pages(array(
		'meta_key' => '_wp_page_template',
		'meta_value' => 'templates/page_widgetized-no-sidebar.php',
	));
	foreach($pages as $page){
		register_sidebar( array(
			'name'          => __( 'Page ', 'amplify' ) . $page->post_title,
			'id'            => 'widget-area-' . $page->post_id,
			'description'   => __( 'Use this widget area to build content for the page: ', 'amplify' ) . $page->post_title,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	register_widget( 'Amplify_Video' );
	register_widget( 'Amplify_Recent_Comments' );

}
add_action( 'widgets_init', 'amplify_widgets_init' );

require get_template_directory() . "/widgets/video-widget.php";
require get_template_directory() . "/widgets/recent-comments.php";

/**
 * Enqueue scripts and styles.
 */
function amplify_scripts() {
	wp_enqueue_style( 'amplify-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), true );


	if ( get_theme_mod('body_font_name') !='' ) {
	    wp_enqueue_style( 'amplify-body-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('body_font_name')) );
	} else {
	    wp_enqueue_style( 'amplify-body-fonts', '//fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600');
	}

	if ( get_theme_mod('headings_font_name') !='' ) {
	    wp_enqueue_style( 'amplify-headings-fonts', '//fonts.googleapis.com/css?family=' . esc_attr(get_theme_mod('headings_font_name')) );
	} else {
	    wp_enqueue_style( 'amplify-headings-fonts', '//fonts.googleapis.com/css?family=Oswald:400,700');
	}

	wp_enqueue_style( 'amplify-style', get_stylesheet_uri() );

	wp_enqueue_style( 'amplify-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );

	wp_enqueue_script( 'amplify-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), true );

	wp_enqueue_script( 'amplify-slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array(), true );


	if ( is_page_template('templates/page_portfolio-2col.php') || is_page_template('templates/page_portfolio-3col.php') || is_page_template('templates/page_portfolio-4col.php') ) {

	    wp_enqueue_script( 'amplify-shuffle', get_template_directory_uri() . '/js/jquery.shuffle.min.js', array('jquery'), true );

		wp_enqueue_script( 'amplify-shuffle-init', get_template_directory_uri() . '/js/shuffle-init.js', array('jquery'), true );

		wp_enqueue_script( 'amplify-pretty-photo-js', get_template_directory_uri() . '/js/prettyphoto/js/jquery.prettyPhoto.min.js', array(), true );

		wp_enqueue_script( 'amplify-pretty-photo-init', get_template_directory_uri() . '/js/prettyphoto/js/prettyphoto-init.js', array(), true );

		wp_enqueue_style( 'amplify-pretty-photo', get_template_directory_uri() . '/js/prettyphoto/css/prettyPhoto.min.css' );
	}

	wp_enqueue_script( 'amplify-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), true );

	if ( get_theme_mod('blog_layout') == 'masonry' ) {

		wp_enqueue_script( 'jquery');
		
		wp_enqueue_script( 'masonry');

		wp_enqueue_script( 'amplify-masonry-init', get_template_directory_uri() . '/js/masonry-init.js', array('jquery', 'masonry'), true );
	}

	wp_enqueue_script( 'amplify-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), true );

	wp_enqueue_script( 'amplify-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'amplify_scripts' );

/* tgm-plugin-activation */
require_once get_template_directory() . '/class-tgm-plugin-activation.php';

/**
 * TGMPA register
 */
function amplify_register_required_plugins() {
		$plugins = array(

			array(
				'name'      => 'WP Product Reviews',
				'slug'      => 'wp-product-reviews',
				'required'  => false,
			),

			array(
				'name'      => 'Intergeo Maps - Google Maps Plugin',
				'slug'      => 'intergeo-maps',
				'required'  => false
			),

			array(
				'name'     => 'Pirate Forms',
				'slug' 	   => 'pirate-forms',
				'required' => false
			));

	$config = array(
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'amplify' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'amplify' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'amplify' ),
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'amplify' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'amplify' ),
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'amplify' ),
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'amplify' ),
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'amplify' ),
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'amplify' ),
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'amplify' ),
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'amplify' ),
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'amplify' ),
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'amplify' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'amplify' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'amplify' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'amplify' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'amplify' ),
            'nag_type'                        => 'updated'
        )
    );

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'amplify_register_required_plugins' );


/**
 * Change the excerpt length
 */
function amplify_excerpt_length( $length ) {

  $excerpt = get_theme_mod('exc_lenght', '55');
  return $excerpt;

}
add_filter( 'excerpt_length', 'amplify_excerpt_length', 999 );

/**
 * Load html5shiv
 */
function amplify_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'amplify_html5shiv' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Dynamic styles
 */
require get_template_directory() . '/styles.php';

/**
 * Live Composer
 */
require get_template_directory() . '/inc/amplify-lc.php';

/**
 * Posts and pages title banner
 */
require get_template_directory() . '/inc/banner.php';

/**
 * Resume page template functions
 */
require get_template_directory() . '/inc/resume.php';
