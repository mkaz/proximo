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

<title><?php wp_title( '-', true, 'right' ); ?> mkaz.blog</title>
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <header class="site-header" role="banner">

        <h3 class="site-title header-text-color">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?>
            </a>
        </h3>
        <?php if ( ! empty( get_bloginfo( 'description' ) ) ) : ?>
            <h4 class="site-description"><?php bloginfo( 'description'); ?></h4>
        <?php endif; ?>

    </header>

    <main>

        <aside>
            <?php get_sidebar(); ?>
        </aside>

