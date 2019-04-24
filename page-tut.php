<?php
/**
 * Template Name: Tutorial Page
 *
 * @package Proximo
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <header class="tutorial-header">
        <h3 class="site-title"> <a href="/vim/">Working with Vim</a> </h3>
    </header>

    <main>
        <aside>
            <h3>Contents</h3>
            <ul>

<?php

$post_id = ( $post->post_parent ) ? $post->post_parent : $post->ID;
$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post_id,
    'order'          => 'ASC',
 );

$parent = new WP_Query( $args );
if ( $parent->have_posts() ) : ?>

    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

        <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>

    <?php endwhile; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>

            </ul>
        </aside>

        <article>
            <?php while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            <?php endwhile; ?>
            <footer>
                <nav>
                    <span class="prev">
                        <a href=""> &#171; {{ .PrevTitle }} </a>
                    </span>
                    <span class="next">
                        <a href=""> {{ .NextTitle }} &#187; </a>
                    </span>
                </nav>

                <div style="margin-top: 5rem">
                    Contribute: <a href="https://github.com/mkaz/working-with-vim/blob/master/{{.SourceFile}}">source</a>
                </div>

            </footer>
        </article>

    </main>

<?php
get_footer();

