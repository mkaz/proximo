<?php
/**
 * Home page with posts by year
 *
 * @package Proximo
 */

get_header();

$previous_year = 1970;

?>

<main id="main" class="site-main content-area" role="main">

    <section class="post-index">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php
        $current_year = get_the_date( 'Y' );
        if ( $current_year != $previous_year ) {
            // do we need to close previous year tag
            if ( $previous_year != '1970' ) {
                echo '</ul>';
            }
            echo '<h4 class="year">' . $current_year . '</h4>';
            echo '<ul>';
        }
        ?>
        <li class="hentry">
            <span class="entry-title">
                <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
            </span>
            <time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                <?php echo esc_html( get_the_date( 'F j' ) ); ?>
            </time>
        </li>

        <?php $previous_year = $current_year; ?>
    <?php endwhile; ?>
    <?php echo '</ul>'; // final year close ?>
    </section>

    <?php proximo_pagination(); ?>

</main>

<?php
get_sidebar();
get_footer();
