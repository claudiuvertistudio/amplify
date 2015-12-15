<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Amplify
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div class="sidebar-toggle">
	<i class="fa fa-plus"></i>
</div>
<div id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
