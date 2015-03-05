<?php
/**
*The template for displaying the footer.
*
*Contains the closing of the #content div and all content after.
*
*@package hundope
*
*The i class function enables the theme to display a copyright logo to the left of Safeguard Security in the footer.
*The function called hundope_social_menu is the code snippet to allow the placement of the social media menu in the footer. It is called from the functions file to incorporate this functionality based on where you input it. In our case, we decided to put it in the footer. 
*The get_sidebar function displays desired footer widgets on the theme as selected in the WordPress dashboard. 
*/
?>
	</div><!-- #content -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php get_sidebar('footer'); ?>
		<div class="site-info">
				<i class="fa fa-copyright"></i>
		<?php printf( __( 'Safeguard Security', 'hundope' ), 'Safeguard Security' ); ?>
		</div><!-- .site-info -->
		<?php hundope_social_menu(); ?>
	</footer>
	</div>

<?php wp_footer(); ?>
</body>
</html>