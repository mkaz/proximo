<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Proximo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<link rel="icon" type="image/svg+xml" href="/a/imgs/favicon.svg">
<link rel="icon" type="image/png" sizes="32x32" href="/a/imgs/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/a/imgs/favicon-16x16.png">
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'proximo' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div id="masthead">
			<div class="site-branding">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<h3 class="site-title"><?php bloginfo( 'name' ); ?></h3>
				</a>
				<h4 class="site-description"><?php bloginfo( 'description' ); ?></h4>
			</div>

            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'top-menu' ) ); ?>
            </nav>
		</div>
	</header>
	<div id="content" class="site-content">
