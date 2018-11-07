<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Proximo
 */

get_header(); ?>

<main id="main" class="content-area" role="main">

<?php
if ( have_posts() ) : ?>

	<header>
		<h5 class="page-title">
			<?php printf( esc_html( 'Search Results: %s' ), '<span>' . get_search_query() . '</span>' ); ?>
		</h5>
	</header>

	<ul class="post-list">
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'inc/content', 'excerpt' );
		endwhile; ?>
	</ul>
	<?php
	proximo_pagination();

else :

	get_template_part( 'inc/content', 'none' );

endif; ?>

</main>

<?php
get_sidebar();
get_footer();
