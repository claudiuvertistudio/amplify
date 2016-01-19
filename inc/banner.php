<?php

/**
 * Page title banner
 */

function amplify_page_title() {
	echo '<header class="title-banner">';
	echo 	'<div class="banner-inner container">';
	if ( is_singular() ) :
		echo '<h1 class="entry-title">';
	else :
		echo '<h1 class="page-title">';
	endif;	
			if ( is_singular() ) {
				the_title();	
			} elseif ( is_category() ) {
				echo '<i class="fa fa-folder-open-o"></i>&nbsp;';
				single_cat_title();
			} elseif ( is_tag() ) {
				echo '<i class="fa fa-tag"></i>&nbsp;';
				single_tag_title();
			} elseif ( is_post_type_archive() ) {
				post_type_archive_title();	
			} elseif ( is_author() ) {
				printf( __( 'Author: %s', 'amplify' ), '<span class="vcard">' . get_the_author() . '</span>' );
			} elseif ( is_day() ) {
				printf( __( 'Day: %s', 'amplify' ), '<span>' . get_the_date() . '</span>' );
			} elseif ( is_month() ) {
				printf( __( 'Month: %s', 'amplify' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'amplify' ) ) . '</span>' );
			} elseif ( is_year() ) {
				printf( __( 'Year: %s', 'amplify' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'amplify' ) ) . '</span>' );
			} elseif ( is_search() ) {
				printf( __( 'Search Results for: %s', 'amplify' ), '<span>' . get_search_query() . '</span>' );
			} elseif ( is_tax( 'post_format', 'post-format-aside' ) ) {
				_e( 'Asides', 'amplify' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				_e( 'Galleries', 'amplify' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				_e( 'Images', 'amplify' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				_e( 'Videos', 'amplify' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				_e( 'Quotes', 'amplify' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				_e( 'Links', 'amplify' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				_e( 'Statuses', 'amplify' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				_e( 'Audios', 'amplify' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				_e( 'Chats', 'amplify' );
			} elseif ( is_404() ) {
				_e( 'Nothing found here', 'amplify' );
			} else {
				_e( 'Archives', 'amplify' );
			}	
	echo 		'</h1>';	
	if ( is_single() && get_theme_mod('amplify_single_date') != 1 ) {
		echo '<div class="banner-meta">';
			amplify_posted_on();
		echo '</div>';
	}	
	echo 	'</div>';
	echo '</header>'; 
}