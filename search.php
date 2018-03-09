<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Proximo
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h5 class="page-title"><?php printf( esc_html__( 'Search Results: %s', 'proximo' ), '<span>' . get_search_query() . '</span>' ); ?></h5>
			</header>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'inc/content', 'excerpt' );
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'inc/content', 'none' );

		endif; ?>

		</main>
	</section>
<?php
get_sidebar();
get_footer();
