/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header padding
	wp.customize('branding_padding',function( value ) {
		value.bind( function( newval ) {
			$('.site-branding').css('padding-top', newval + 'px' );
			$('.site-branding').css('padding-bottom', newval + 'px' );
			$('.main-navigation.inline-header').css('padding-top', newval + 'px' );
			$('.main-navigation.inline-header').css('padding-bottom', newval + 'px' );			
		} );
	});
	// Title banner padding
	wp.customize('banner_padding',function( value ) {
		value.bind( function( newval ) {
			$('.banner-inner').css('padding-top', newval + 'px' );
			$('.banner-inner').css('padding-bottom', newval + 'px' );		
		} );
	});
	// Font sizes
	wp.customize('site_title_size',function( value ) {
		value.bind( function( newval ) {
			$('.site-title').css('font-size', newval + 'px' );
		} );
	});	
	wp.customize('site_desc_size',function( value ) {
		value.bind( function( newval ) {
			$('.site-description').css('font-size', newval + 'px' );
		} );
	});
	wp.customize('menu_size',function( value ) {
		value.bind( function( newval ) {
			$('.main-navigation li').css('font-size', newval + 'px' );
		} );
	});					
	wp.customize('h1_size',function( value ) {
		value.bind( function( newval ) {
			$('h1').not('.site-title').css('font-size', newval + 'px' );
		} );
	});	
    wp.customize('h2_size',function( value ) {
        value.bind( function( newval ) {
            $('h2').not('.site-description').css('font-size', newval + 'px' );
        } );
    });	
    wp.customize('h3_size',function( value ) {
        value.bind( function( newval ) {
            $('h3').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('h4_size',function( value ) {
        value.bind( function( newval ) {
            $('h4').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('h5_size',function( value ) {
        value.bind( function( newval ) {
            $('h5').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('h6_size',function( value ) {
        value.bind( function( newval ) {
            $('h6').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('body_size',function( value ) {
        value.bind( function( newval ) {
            $('body').css('font-size', newval + 'px' );
        } );
    });
	// Front page colors
	wp.customize('block_bgcolor_1',function( value ) {
		value.bind( function( newval ) {
			$('.block-1').css('background-color', newval );
			$('.svg-block-1').css('fill', newval );
		} );
	});
	wp.customize('block_color_1',function( value ) {
		value.bind( function( newval ) {
			$('.block-1, .block-1 a').css('color', newval );
			$('.block-1 .block-icon').css('background-color', newval );
		} );
	});
	wp.customize('block_bgcolor_2',function( value ) {
		value.bind( function( newval ) {
			$('.block-2').css('background-color', newval );
			$('.svg-block-2').css('fill', newval );
			$('.svg-block-3').css('fill', newval );
		} );
	});
	wp.customize('block_color_2',function( value ) {
		value.bind( function( newval ) {
			$('.block-2, .block-2 a').css('color', newval );
			$('.block-2 .block-icon').css('background-color', newval );
		} );
	});
	wp.customize('block_bgcolor_3',function( value ) {
		value.bind( function( newval ) {
			$('.block-3').css('background-color', newval );
			$('.svg-block-4').css('fill', newval );
			$('.svg-block-5').css('fill', newval );
		} );
	});
	wp.customize('block_color_3',function( value ) {
		value.bind( function( newval ) {
			$('.block-3, .block-3 a').css('color', newval );
			$('.block-3 .block-icon').css('background-color', newval );
		} );
	});
	wp.customize('block_bgcolor_4',function( value ) {
		value.bind( function( newval ) {
			$('.block-4').css('background-color', newval );
			$('.svg-block-6').css('fill', newval );
		} );
	});
	wp.customize('block_color_4',function( value ) {
		value.bind( function( newval ) {
			$('.block-4, .block-4 a').css('color', newval );
			$('.block-4 .block-icon').css('background-color', newval );
		} );
	});		 
	//Site title
	wp.customize('header_textcolor',function( value ) {
		value.bind( function( newval ) {
			$('.site-title a').css('color', newval );
		} );
	});
	// Body text color
	wp.customize('body_text_color',function( value ) {
		value.bind( function( newval ) {
			$('body').css('color', newval );
		} );
	});	
	// Widgets color
	wp.customize('widgets_color',function( value ) {
		value.bind( function( newval ) {
			$('.widget-area .widget, .widget-area .widget a').css('color', newval );
		} );
	});	
	//Footer color
	wp.customize('footer_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-footer, .footer-widget-area ').css('background-color', newval );
		} );
	});	
	//Logo size
	wp.customize('logo_size',function( value ) {
		value.bind( function( newval ) {
			$('.site-logo').css('max-width', newval + 'px' );
		} );
	});		  		   			    
} )( jQuery );
