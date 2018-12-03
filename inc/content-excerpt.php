<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proximo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
            the_title(
                sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>'
            );
        ?>

        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php proximo_posted_on(); ?>
            </div>
        <?php endif; ?>
    </header>
    <div class="entry-summary">
        <?php the_excerpt(); ?>
    </div>
    <?php get_template_part( 'inc/content', 'footer' ); ?>
</article>
