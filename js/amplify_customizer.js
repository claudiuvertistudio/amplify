/*
Upsells
*/

jQuery(document).ready(function() {

	/* Upsells in customizer (Documentation link and Upgrade to PRO link */


	if( !jQuery( ".amplify-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('<li class="accordion-section amplify-upsells" style="padding-bottom: 15px">');
		}

    if( jQuery( ".amplify-upsells" ).length ) {

  		jQuery('.amplify-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="http://flyfreemedia.com/documentation/amplify/" class="button" target="_blank">{documentation}</a>'.replace('{documentation}', amplifyCustomizerObject.documentation));
  		jQuery('.amplify-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://github.com/Codeinwp/amplify" class="button" target="_blank">{github}</a>'.replace('{github}', amplifyCustomizerObject.github));
  		jQuery('.amplify-upsells').append('<a style="width: 80%; margin: 5px auto 5px auto; display: block; text-align: center;" href="https://wordpress.org/support/view/theme-reviews/amplify#postform" class="button" target="_blank">{review}</a>'.replace('{review}', amplifyCustomizerObject.review));

  	}

	if ( !jQuery( ".amplify-upsells" ).length ) {
		jQuery('#customize-theme-controls > ul').prepend('</li>');
	}
});
