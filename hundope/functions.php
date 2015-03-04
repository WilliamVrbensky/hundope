<?php
/**
 * hundope functions and definitions
 *
 * @package hundope
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'hundope_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function hundope_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on hundope, use a find and replace
	 * to change 'hundope' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'hundope', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'hundope' ),
		'social' => __( 'Social Menu',  'hundope' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'hundope_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // hundope_setup
add_action( 'after_setup_theme', 'hundope_setup' );

/**
 * The code below registers the sidebar and footer widget area.
 * Sidebar Widgets shows up under the WordPress dashboard to drag and drop widgets into the area.
 * Footer Widgets shows up under the WordPress dashboard to drag and drop widgets into the area.
 */
function hundope_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Widgets', 'hundope' ),
		'id'            => 'sidebar-1',
		'description'   => 'Sidebar widgets area on the sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'hundope' ),
		'description'   => __( 'Footer widgets area on the footer.', 'hundope'),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}

add_action( 'widgets_init', 'hundope_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function hundope_scripts() {
	wp_enqueue_style( 'hundope-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'hundope-content-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css' ); 
	
	wp_enqueue_style( 'hundope-google-fonts', 'http://fonts.googleapis.com/css?family=Cabin+Condensed:500,700|Patua+One|Play|Jockey+One' );
	
	wp_enqueue_style( 'hundope-awesomefonts', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'hundope-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'hundope-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'hundope-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hundope_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';