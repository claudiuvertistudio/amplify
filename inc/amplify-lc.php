<?php

/**
 * Live Composer defaults
 */

function amplify_lc_accordion( $options, $id ) {
 
    $new_defaults = array();
	if ( $id == 'DSLC_Accordion' ) { 
		$new_defaults = array(
			'accordion_content' => 'Placeholder content. Lorem ipsum dolor sit amet, consectetur tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. (dslc_sep)  (dslc_sep) ',
			'accordion_nav' => 'CLICK TO EDIT (dslc_sep) CLICK TO EDIT (dslc_sep) CLICK TO EDIT',
			'css_header_bg_color' => 'rgb(250, 190, 40)',
			'css_header_border_color' => 'rgb(250, 190, 40)',
			'css_header_border_width' => '0',
			'css_header_padding_vertical' => '15',
			'css_header_padding_horizontal' => '15',
			'css_title_color' => 'rgb(255, 255, 255)',
			'css_title_font_family' => '',
			'css_content_border_color' => 'rgb(250, 190, 40)',
			'css_content_font_size' => '16',
		);
	}
    return dslc_set_defaults( $new_defaults, $options );
 
}
add_filter( 'dslc_module_options', 'amplify_lc_accordion', 10, 2 );


function amplify_lc_social( $options, $id ) {
 
    $new_defaults = array();
	if ( $id == 'DSLC_Social' ) { 
		$new_defaults = array(
			'vimeo' => '#',
			'tumblr' => '#',
			'pinterest' => '#',
			'css_bg_color' => 'rgb(250, 190, 40)',
			'css_bg_color_hover' => 'rgb(250, 190, 40)',
			'css_margin_bottom' => '15',
			'css_size' => '75',
			'css_spacing' => '25',
			'css_icon_color' => 'rgb(255, 255, 255)',
			'css_icon_font_size' => '50',
		);
	}
    return dslc_set_defaults( $new_defaults, $options );
 
}
add_filter( 'dslc_module_options', 'amplify_lc_social', 10, 2 );



function amplify_lc_blog( $options, $id ) {
 
    $new_defaults = array();
	if ( $id == 'DSLC_Blog' ) { 
		$new_defaults = array(
			'amount' => '3',
			'columns' => '3',
			'css_sep_height' => '10',
			'css_main_border_width' => '0',
			'css_main_text_align' => 'left',
			'title_font_size' => '20',
			'css_title_font_weight' => '400',
			'css_title_font_family' => 'Oswald',
			'css_meta_border_trbl' => 'top right bottom left ',
			'css_meta_font_size' => '13',
			'css_meta_font_family' => 'Open Sans',
			'css_meta_line_height' => '32',
			'css_meta_padding_vertical' => '5',
			'css_meta_padding_horizontal' => '5',
			'css_meta_link_color' => 'rgb(250, 190, 40)',
			'css_meta_link_color_hover' => 'rgb(250, 190, 40)',
			'css_meta_avatar_border_radius' => '0',
			'css_excerpt_font_size' => '16',
			'css_excerpt_font_weight' => '400',
			'css_excerpt_font_family' => 'Open Sans',
			'excerpt_length' => '35',
			'button_text' => 'Read more',
			'css_button_bg_color' => 'rgb(250, 190, 40)',
			'css_button_bg_color_hover' => 'rgba(250, 190, 40, 0)',
			'css_button_border_width' => '2',
			'css_button_border_color' => 'rgb(250, 190, 40)',
			'css_button_color_hover' => 'rgb(250, 190, 40)',
			'css_button_font_size' => '16',
			'css_button_font_weight' => '400',
			'css_button_font_family' => 'Open Sans',
			'carousel_autoplay' => '3000',
			'carousel_autoplay_hover' => 'true',
			'css_arrows_bg_color_hover' => 'rgb(250, 190, 40)',
		);
	}
    return dslc_set_defaults( $new_defaults, $options );
 
}
add_filter( 'dslc_module_options', 'amplify_lc_blog', 10, 2 );


function amplify_lc_button( $options, $id ) {
 
    $new_defaults = array();
	if ( $id == 'DSLC_Button' ) { 
		$new_defaults = array(
			'css_align' => 'center',
			'css_bg_color' => 'rgb(250, 190, 40)',
			'css_padding_vertical' => '15',
			'css_padding_horizontal' => '15',
			'css_button_font_size' => '16',
			'css_button_font_family' => 'Open Sans',
			'css_icon_color' => 'rgb(51, 51, 51)',
			'css_icon_margin' => '1',
			'css_button_font_weight' => '400',
		);
	}
    return dslc_set_defaults( $new_defaults, $options );
 
}
add_filter( 'dslc_module_options', 'amplify_lc_button', 10, 2 );


function amplify_lc_notification( $options, $id ) {
 
    $new_defaults = array();
	if ( $id == 'DSLC_Notification' ) { 
		$new_defaults = array(
			'css_bg_color' => 'rgb(250, 190, 40)',
			'css_text_font_size' => '16',
			'css_font_family' => 'Open Sans',
			'css_close_top' => '10',
			'css_close_right' => '10',
			'css_close_size' => '20',
			'css_close_icon_color' => 'rgb(250, 190, 40)',
		);
	}
	return dslc_set_defaults( $new_defaults, $options );

}
add_filter( 'dslc_module_options', 'amplify_lc_notification', 10, 2 );


function amplify_lc_tabs( $options, $id ) {
 
    $new_defaults = array();
	if ( $id == 'DSLC_Tabs' ) { 
		$new_defaults = array(
			'tabs_content' => 'This is just placeholder text.',
			'tabs_nav' => 'Click to edit',
			'css_nav_bg_color' => 'rgb(230, 230, 230)',
			'css_nav_font_size' => '16',
			'css_nav_active_bg_color' => 'rgb(250, 190, 40)',
			'css_nav_active_color' => 'rgb(255, 255, 255)',
			'css_content_font_size' => '16',
		);
	}
	return dslc_set_defaults( $new_defaults, $options );

}
add_filter( 'dslc_module_options', 'amplify_lc_tabs', 10, 2 );

function amplify_lc_progress( $options, $id ) {
 
    // The array that will hold new defaults
    $new_defaults = array();

	if ( $id == 'DSLC_Progress_Bars' ) { 
		$new_defaults = array(
			'css_loader_color' => 'rgb(250, 190, 40)',
			'css_loader_height' => '25',
		);
	}
	return dslc_set_defaults( $new_defaults, $options );

}
add_filter( 'dslc_module_options', 'amplify_lc_progress', 10, 2 );


function amplify_lc_infobox( $options, $id ) {
 
    $new_defaults = array();
	if ( $id == 'DSLC_Info_Box' ) { 
		$new_defaults = array(
			'css_icon_bg_color' => 'rgb(250, 190, 40)',
			'css_icon_wrapper_width' => '100',
			'css_icon_width' => '50',
			'css_title_color' => 'rgb(65, 71, 79)',
			'css_title_font_size' => '20',
			'css_title_font_weight' => '400',
			'css_title_font_family' => 'Oswald',
			'css_title_line_height' => '20',
			'css_content_font_size' => '16',
			'css_content_font_family' => 'Open Sans',
			'css_button_bg_color' => 'rgb(250, 190, 40)',
			'css_button_font_size' => '16',
			'css_button_font_weight' => '400',
			'css_button_icon_color' => 'rgb(51, 51, 51)',
			'button_title' => 'Read more',
		);
	}
	return dslc_set_defaults( $new_defaults, $options );

}
add_filter( 'dslc_module_options', 'amplify_lc_infobox', 10, 2 );