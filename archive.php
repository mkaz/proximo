<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proximo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header>
				<?php
					the_archive_title( '<h5 class="page-title">', '</h5>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>

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
