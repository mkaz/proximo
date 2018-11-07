<?php

// Initial code started from:
// https://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/

function proximo_pagination() {

    if ( is_singular() ) {
        return;
    }

    global $wp_query;
    $max = intval( $wp_query->max_num_pages );

    if ( $max <= 1 ) {
        return;
    }

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

    /** Add current page to the array */
    if ( $paged >= 1 ) {
        $links[] = $paged;
    }

    /** Add the pages around the current page to the array */
    if ( $paged >= 2 ) {
        $links[] = $paged - 1;
    }

    if ( ( $paged + 1 ) <= $max ) {
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() ) {
        printf( '<li>%s</li>' . "\n", get_previous_posts_link( 'Previous' ) );
    }

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) ) {
            echo '<li>…</li>';
        }
    }

    /** Link to current page, plus 1 page in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = ( $paged == $link ) ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) ) {
            echo '<li>…</li>' . "\n";
        }

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() ) {
        printf( '<li>%s</li>' . "\n", get_next_posts_link( 'Next' ) );
    }

    echo '</ul></div>' . "\n";

}
