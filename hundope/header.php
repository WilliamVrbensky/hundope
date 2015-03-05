<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up untill <div id="content">
 *
 * @package hundope
 *The code referred to as link rel="shortcut icon" below the head represents a custom favicon on the page tab left to our website name, visualized as a hand that we created.
**/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
/**The code below grabs the enqueued code from the functions file to show the content in the header. This allows the style to appear on the top of the page.
*Please note we placed some of our comments in php tag because otherwise it would show up on the header. We tried a variety of different ways but it didn't work.
**/
?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'hundope' ); ?></a>
	
<?php
/*
*This code below identifies the div id for the header along with the nav tag showing where it is located.
**/
?>

	<header id="masthead" class="site-header" role="banner">
	
<?php
/*	
*This creates a div id  with a class named 'site-branding' and shows the two header titles for our site, one as "site-title" and the other as "site description."
*We also created a div called gradient to display a gradient color style on the header.
**/
?>
	<div class="site-branding">
			<div class="title-box">
			<div id="gradient">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
		</div>
		</div>
<?php
/** The following code shows the nav id or navigation within the header for our site, which consists of a menu bar with navigation links.
**/
?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Primary Menu', 'hundope' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<div class="search-toggle">
    			<i class="fa fa-search"></i>
    			<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'hundope' ); ?></a>
			</div>
		</nav>
		
<?php
/** The code below denotes the division id for the search bar beside the navigation menu
**/
?>
		
		<div id="search-container" class="search-box-wrapper clear">
    <div class="search-box clear">
        <?php get_search_form(); ?>
    </div>
    </div> 
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">