<?php
/**
 * Conjunction function
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Proximo
 */

add_action( 'after_setup_theme', function() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    //add_theme_support( 'title-tag' );

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

	$GLOBALS['content_width'] = apply_filters( 'proximo_content_width', 720);

} );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', function() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'proximo' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
});

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style(
        'proximo-style',
        get_stylesheet_uri(),
        array(),
        filemtime( get_template_directory() . '/style.css' )
    );
});

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/blocks/index.php';
