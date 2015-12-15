<?php


//Dynamic styles
function amplify_custom_styles($custom) {


	//Header padding
	$branding_padding = get_theme_mod( 'branding_padding' );
	if ( $branding_padding ) {
		$custom = ".site-branding { padding:" . intval($branding_padding) . "px 45px; }"."\n";
		$custom .= ".main-navigation.inline-header { padding:" . intval($branding_padding) . "px 45px; }"."\n";
	}
	//Full width header
	$header_bg = get_theme_mod( 'header_color', '#333' );
	if ( isset($header_bg) && ( $header_bg != '#333' ) ) {
		$custom .= ".site-header .container { background-color:" . esc_html($header_bg) . "}"."\n";
		$custom .= "@media only screen and (max-width: 991px) { #masthead { background-color:" . esc_html($header_bg) . "}}"."\n";
	}		
	if ( get_theme_mod( 'full_header', 1 ) ) {
		$custom .= ".site-header { background-color:" . esc_html($header_bg) . "}"."\n";
	}	
	//Header center
	$branding_center = get_theme_mod( 'branding_center', 1 );
	if ( $branding_center && get_theme_mod( 'header_style' ) != 'inline') {
		$custom .= ".site-header { text-align: center; }"."\n";
		$custom .= ".main-navigation li { float: none; display: inline-block; }"."\n";
	}
	//Banner padding
	$banner_padding = get_theme_mod( 'banner_padding' );
	if ( $banner_padding ) {
		$custom .= ".banner-inner { padding:" . intval($banner_padding) . "px 45px; }"."\n";
	}
	//Fonts
	$body_fonts = get_theme_mod('body_font_family');	
	$headings_fonts = get_theme_mod('headings_font_family');
	if ( $body_fonts !='' ) {
		$custom .= "body { font-family:" . $body_fonts . ";}"."\n";
	}
	if ( $headings_fonts !='' ) {
		$custom .= "h1, h2, h3, h4, h5, h6 { font-family:" . $headings_fonts . ";}"."\n";
	}
    //Site title
    $site_title_size = get_theme_mod( 'site_title_size', '62' );
    if ( get_theme_mod( 'site_title_size' )) {
        $custom .= ".site-title { font-size:" . intval($site_title_size) . "px; }"."\n";
    }
    //Site description
    $site_desc_size = get_theme_mod( 'site_desc_size', '18' );
    if ( get_theme_mod( 'site_desc_size' )) {
        $custom .= ".site-description { font-size:" . intval($site_desc_size) . "px; }"."\n";
    }
    //Site description
    $menu_size = get_theme_mod( 'menu_size', '16' );
    if ( get_theme_mod( 'menu_size' )) {
        $custom .= ".main-navigation li { font-size:" . intval($menu_size) . "px; }"."\n";
    }    	    	
	//H1 size
	$h1_size = get_theme_mod( 'h1_size' );
	if ( get_theme_mod( 'h1_size' )) {
		$custom .= "h1 { font-size:" . intval($h1_size) . "px; }"."\n";
	}
    //H2 size
    $h2_size = get_theme_mod( 'h2_size' );
    if ( get_theme_mod( 'h2_size' )) {
        $custom .= "h2 { font-size:" . intval($h2_size) . "px; }"."\n";
    }
    //H3 size
    $h3_size = get_theme_mod( 'h3_size' );
    if ( get_theme_mod( 'h3_size' )) {
        $custom .= "h3 { font-size:" . intval($h3_size) . "px; }"."\n";
    }
    //H4 size
    $h4_size = get_theme_mod( 'h4_size' );
    if ( get_theme_mod( 'h4_size' )) {
        $custom .= "h4 { font-size:" . intval($h4_size) . "px; }"."\n";
    }
    //H5 size
    $h5_size = get_theme_mod( 'h5_size' );
    if ( get_theme_mod( 'h5_size' )) {
        $custom .= "h5 { font-size:" . intval($h5_size) . "px; }"."\n";
    }
    //H6 size
    $h6_size = get_theme_mod( 'h6_size' );
    if ( get_theme_mod( 'h6_size' )) {
        $custom .= "h6 { font-size:" . intval($h6_size) . "px; }"."\n";
    }
    //Body size
    $body_size = get_theme_mod( 'body_size' );
    if ( get_theme_mod( 'body_size' )) {
        $custom .= "body { font-size:" . intval($body_size) . "px; }"."\n";
    }

    //__COLORS

    //Primary color
	$primary_color = get_theme_mod( 'primary_color' );
	if ( isset($primary_color) && ( $primary_color != '#FABE28' ) ) {
		$custom .= ".company-name, .school-degree, .site-description, .entry-title a:hover, .entry-meta a:hover, .entry-footer a:hover, .widget a:hover, .main-navigation li::before, a, a:hover, a:active, a:focus, .main-navigation ul ul::before { color:" . esc_html($primary_color) . "}"."\n";
		$custom .= ".skillbar-bar, .resume-nav span, .project-nav, #filter a, .amplify-search, .banner-inner, .title-banner, .widget-title::after, .main-navigation li:hover { background-color:" . esc_html($primary_color) . "}"."\n";
		$custom .= ".header-image, .site-header, .main-navigation li, .main-navigation ul ul li:last-of-type { border-color:" . esc_html($primary_color) . "}"."\n";
		$custom .= "a:hover { outline-color:" . esc_html($primary_color) . "}"."\n";
	}
	//Site title
	$site_title = get_header_textcolor();
	if ( isset($site_title) && ( $site_title != '#ffffff' )) {
		$custom .= ".site-title a, .site-title a:hover { color:#" . esc_html($site_title) . "}"."\n";
	}
	//Body text
	$body_text = get_theme_mod( 'body_text_color' );
	if ( isset($body_text) && ( $body_text != '#666B71' )) {
		$custom .= "body { color:" . esc_html($body_text) . "}"."\n";
	}
	//Widgets
	$widgets = get_theme_mod( 'widgets_color' );
	if ( isset($widgets) && ( $widgets != '#666B71' )) {
		$custom .= ".widget-area .widget, .widget-area .widget a { color:" . esc_html($widgets) . "}"."\n";
	}
	//Footer
	$footer_bg = get_theme_mod( 'footer_color' );
	if ( isset($footer_bg) && ( $footer_bg != '#333' )) {
		$custom .= ".site-footer, .footer-widget-area { background-color:" . esc_html($footer_bg) . "}"."\n";
	}

	//Contain title
	$boxed_title = get_theme_mod( 'boxed_title' );
	if ( $boxed_title ) {
		$custom .= ".title-banner { background-color: transparent; }"."\n";
	}

	//Logo size
	$logo_size = get_theme_mod( 'logo_size', '200' );
	if ( get_theme_mod( 'logo_size' )) {
		$custom .= ".site-logo { max-width:" . intval($logo_size) . "px; }"."\n";
	}

	//Output all the styles
	wp_add_inline_style( 'amplify-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'amplify_custom_styles' );