<?php
/**
 * hundope functions and definitions
 *
 * @package hundope
 */
//The code below allows us to set the width of our content based on the theme's stylesheet and design. It cannot exceed 640 pixels.
if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

if ( ! function_exists( 'hundope_setup' ) ) :

//This sets up the theme defaults and registers support for different WordPress functions.
//The code below is the main function of theme wrapped in a conditiona statement that says if not function exists, hundope setup then run the function. 
//This plugin function allows someone to make a child theme based on this theme. They can add the conditional statement to make it plugable.
function hundope_setup() {

	//This is to make the theme available for translation and allows for installation.
	load_theme_textdomain( 'hundope', get_template_directory() . '/languages' );

	//This allows us to add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	
	//This code declares that the theme does not use a hard-coded <title> tag, and that WordPress will provide it for us.
	add_theme_support( 'title-tag' );

	//This registers the custom navigation menu and allows for the creation of custom menus in the dashboard of WordPress.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'hundope' ),
		'social' => __( 'Social Menu',  'hundope' ),
	) );

	//This allows our theme to register support for a search form, comment form, and comments.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	//This enables support for post formats.
	add_theme_support( 'post-formats', array(
		'aside'
	) );

	//This code is to set up the WordPress core custom background features.
	//add_theme_support( 'custom-background', apply_filters( 'hundope_custom_background_args', array(
	//	'default-color' => 'ffffff',
	//	'default-image' => '',
	//) ) );
}

//Alternate hundope setup
endif;
add_action( 'after_setup_theme', 'hundope_setup' );


//The following code registers the sidebar and footer widget area. This shows up under the WordPress dashboard for users to drag and drop desired widgets into our designated areas. You can also classify the header to target the text. For our purposes, we kept them both as h1 to make the look of our widgets consistent. 
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

//This function is used to initialize the widget.
add_action( 'widgets_init', 'hundope_widgets_init' );

/*The following enqueues scripts and styles.
 *The enqueues below bring in fonts from external databases and connects our theme to styles to implement changes on the design and layout of the theme.
 *It is meant to link fonts from Font Awesome and Google Fonts as well as styles from the content-siderbar.css and styles.css files. 
 */
function hundope_scripts() {
	wp_enqueue_style( 'hundope-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'hundope-content-sidebar', get_template_directory_uri() . '/layouts/content-sidebar.css' ); 
	
	wp_enqueue_style( 'hundope-google-fonts', 'http://fonts.googleapis.com/css?family=Cabin+Condensed:500,700|Patua+One|Play|Jockey+One' );
	
	wp_enqueue_style( 'hundope-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

	wp_enqueue_script( 'hundope-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	
	wp_enqueue_script( 'hundope-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'hundope-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hundope_scripts' );

   //These files are found under the includes.php folder.
   //This is used to implement the custom header feature. 
   //This allows us to customize the header image. 
require get_template_directory() . '/inc/custom-header.php';

   //This is used to load custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

   //This retrieves the path of custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

   //This retrieves the path of Customizer additions.
require get_template_directory() . '/inc/customizer.php';

   //This is to load the Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';