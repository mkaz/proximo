<?php
/**
 * Index page for categories/search results
 *
 * @package Proximo
 */

get_header();

?>

<section class="content-area" role="main">
    <header class="page-title">
        <h3>
            <?php if ( is_search() ) : ?>
                <div class="highlight">
                    <?php printf( esc_html( 'Search Results: %s' ), '<span>' . get_search_query() . '</span>' ); ?>
                </div>
            <?php elseif ( is_archive() ) : ?>
                <?php the_archive_title(); ?>
            <?php else: ?>
                Articles
            <?php endif; ?>
        </h3>
    </header>

    <section class="post-index" aria-label="List of Posts by Year">
    <ul>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php if ( get_the_title() === "Home" ) {
            continue;
        }; ?>
        <li class="hentry">
            <span class="entry-title">
                <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
            </span>
            <time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                <?php echo esc_html( get_the_date( 'Y' ) ); ?>
            </time>
        </li>
    <?php endwhile; ?>
    <?php echo '</ul>'; // final close ?>
    </section>

    <?php proximo_pagination(); ?>

</section>

<?php get_footer(); ?>
