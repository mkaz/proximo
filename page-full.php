<?php
/**
 * Template Name: Full Width Page
 *
 * @package Proximo
 */

get_header();

echo "<div class='full-page'>";

    // basic loop, just spit out content
    while ( have_posts() ) : the_post();
        the_content();
    endwhile; // End of the loop.

    dynamic_sidebar( 'author-1' );

echo "</div>";

get_footer();

