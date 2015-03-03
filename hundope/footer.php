<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package hundope
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
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