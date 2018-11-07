<?php
/**
 * Conjunction function
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Proximo
 */

if ( ! function_exists( 'proximo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the aftercomponentsetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function proximo_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'proximo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'proximo', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'proximo-featured-image', 640, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Top', 'proximo' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'proximo_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'proximo_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function proximo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'proximo_content_width', 720);
}
add_action( 'after_setup_theme', 'proximo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function proximo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'proximo' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'proximo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function proximo_scripts() {
	wp_enqueue_style( 'proximo-style', get_stylesheet_uri(), filemtime( get_template_directory() . '/style.css' ) );
	wp_enqueue_style( 'proximo-fonts', get_template_directory_uri() . '/webfonts/stylesheet.css', filemtime( get_template_directory() . '/webfonts/stylesheet.css' ) );
}
add_action( 'wp_enqueue_scripts', 'proximo_scripts' );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/pagination.php';
