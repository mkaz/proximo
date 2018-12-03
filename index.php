<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proximo
 */

get_header(); ?>

<main id="main" class="content-area" role="main">
	<?php
	if ( have_posts() ) : ?>

		<header>
            <h5 class="page-title">
                <?php if ( is_search() ) : ?>
                    <div class="highlight">
                        <?php printf( esc_html( 'Search Results: %s' ), '<span>' . get_search_query() . '</span>' ); ?>
                    </div>
                <?php elseif ( is_archive() ) : ?>
                    <?php the_archive_title(); ?>
                <?php else: ?>
                    Articles
                <?php endif; ?>
            </h5>
		</header>

		<section class="post-list" aria-label="List of Posts">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'inc/content', 'excerpt' );
			endwhile; ?>
        </section>
		<?php
		proximo_pagination();

	else :

		get_template_part( 'inc/content', 'none' );

	endif; ?>
</main>

<?php get_footer(); ?>
