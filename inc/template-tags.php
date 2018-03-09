<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Proximo
 */

if ( ! function_exists( 'proximo_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function proximo_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'proximo' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$categories_list = get_the_category_list( esc_html__( ', ', 'proximo' ) );
	if ( $categories_list && proximo_categorized_blog() ) {
		$category_list = sprintf( '<span class="cat-links">' . esc_html__( ' in %1$s', 'proximo' ) . '</span>', $categories_list ); // WPCS: XSS OK.
	}

	echo '<span class="posted-on">' . $posted_on . '</span>' . $category_list;

}
endif;

if ( ! function_exists( 'proximo_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function proximo_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'proximo' ) );
		if ( $tags_list ) {
			printf( '<div class="tags-links">' . esc_html__( 'Tagged %1$s', 'proximo' ) . '</div>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'proximo' ), esc_html__( '1 Comment', 'proximo' ), esc_html__( '% Comments', 'proximo' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'proximo' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function proximo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'proximo_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'proximo_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so proximo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so proximo_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in proximo_categorized_blog.
 */
function proximo_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'proximo_categories' );
}
add_action( 'edit_category', 'proximo_category_transient_flusher' );
add_action( 'save_post',     'proximo_category_transient_flusher' );