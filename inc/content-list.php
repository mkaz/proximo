<?php
/**
 * Template part for displaying post lists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proximo
 */
?>


<ul class="post-list">
<?php while ( have_posts() ) : the_post(); ?>
    <li>
        <span class="entry-title">
            <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
        </span>
    </li>
<?php endwhile; ?>
</ul>

<?php proximo_pagination(); ?>
