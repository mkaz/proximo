<?php
/**
 * Header
 * This header is a sider
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

</head>

<body <?php body_class(); ?>>

<div class="wrapper">

    <header class="site-header" role="banner">

        <h3 class="site-title header-text-color">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?>
            </a>
        </h3>
        <?php if ( ! empty( get_bloginfo( 'description' ) ) ) : ?>
            <h4 class="site-description"><?php bloginfo( 'description'); ?></h4>
        <?php endif; ?>

        <aside>
            <?php get_search_form(); ?>
            <?php get_sidebar(); ?>
        </aside>

    </header>

