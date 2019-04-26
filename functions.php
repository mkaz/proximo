<?php
/**
 * Conjunction function
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Proximo
 */

if ( ! function_exists( 'proximo_setup' ) ) :
function proximo_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

    // Add HTML5 support for core markup
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

    // Add support for editor styles
    add_theme_support( 'editor-styles' );

    // Enqueue editor styles
    add_editor_style( 'style-editor.css' );

    // Gutenberg Images
    add_theme_support( 'align-wide' );
    add_theme_support( 'align-full' );

    // Jetpack Social Menu
    add_theme_support( 'jetpack-social-menu' );

    add_filter( 'excerpt_length', function( $length )  { return 30; } );
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
    wp_enqueue_style(
        'proximo-style',
        get_stylesheet_uri(),
        array(),
        filemtime( get_template_directory() . '/style.css' )
    );
}
add_action( 'wp_enqueue_scripts', 'proximo_scripts' );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/blocks/index.php';
