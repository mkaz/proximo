<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Proximo
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<nav class="widgets">

    <?php dynamic_sidebar( 'sidebar-1' ); ?>

    <?php get_search_form(); ?>

    <?php if ( function_exists( 'jetpack_social_menu' ) ) : ?>
        <section class="widget jetpack-social-menu">
            <h2 class="widget-title"> Social </h2>
            <?php jetpack_social_menu(); ?>
        </section>
    <?php endif; ?>

</nav>
