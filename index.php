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
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<header>
			<h5 class="page-title">Articles</h5>
		</header>
		<?php
		if ( have_posts() ) : ?>
			<ul class="post-list">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'inc/content', 'excerpt' );
			endwhile; ?>
			</ul>
			<?php
			the_posts_navigation();

		else :

			get_template_part( 'inc/content', 'none' );

		endif; ?>

		</main>
	</div>
<?php
get_sidebar();
get_footer();
