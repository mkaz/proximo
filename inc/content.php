<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proximo
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( '' != get_the_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'proximo-featured-image' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <?php
            if ( is_single() ) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }
        ?>
        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php proximo_posted_on(); ?>
            </div>
        <?php endif; ?>
    </header>
    <div class="entry-content">
        <?php
            the_content();
        ?>
    </div>
    <?php get_template_part( 'inc/content', 'footer' ); ?>
</article>
