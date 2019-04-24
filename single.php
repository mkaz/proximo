<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Proximo
 */

get_header(); ?>

<main class="content-area" role="main">

    <?php
    while ( have_posts() ) : the_post();

    	get_template_part( 'inc/content', get_post_format() );

    endwhile; // End of the loop.
    ?>

</main>

<?php get_footer(); ?>
