<?php

/*
*Footer widgets.
*Sidebar 2 is the footer widget area. This is shown in the WordPress dashboard under appearance>widgets called Footer Widgets.
*The sidebar-2 function is then called from the functions file to implement our footer widgets area.
*The if statement calls in the widget area in the functions file. The code is basically saying if you don't add anyting into the footer widgets area in the WordPress dashboard, it won't display anything. If you do drag a widget into it, this function will become activated and display them on the theme.
*/

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="supplementary">
	<div id="footer-widgets" class="footer-widgets widget-area clear" role="complementary">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- #footer-sidebar -->
</div><!-- #supplementary -->