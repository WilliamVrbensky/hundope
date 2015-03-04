<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package hundope
 * i class displays copyright logo to the left of Safeguard Security in the footer.
 * hundope_social_menu is the code snippet to allow the placement of the social media menu in the footer.
 * get_sidebar function calls our side-footer.php file to display the footer widgets.
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
</html>