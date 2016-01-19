<?php
/**
 * Search form
 *
 * @package Amplify
 */
?>

<?php $search_style = get_theme_mod('header_search', 'bottom-right'); ?> 

<form role="search" method="get" class="amplify-search-form <?php echo esc_attr($search_style); ?>" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo __( 'Search for:', 'amplify' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &#8230;', 'amplify' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'amplify' ) ?>" />
	</label>
	<span class="amplify-search"><i class="fa fa-search"></i></span>
</form>