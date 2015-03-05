<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package hundope
 */

//This includes the header.php template file from the theme directory
get_header(); ?>

<?php //This creates a division identified as 'primary' with a class named 'content-area'?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php //This function checks to see if the current WordPress query has any results to loop over ?>
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<?php //This loads a template part 'content' into a template, making it easy for the theme to reuse sections of the code.
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php //This displays navigation to a different post.?>
			
			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>