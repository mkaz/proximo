<?php
/**
 * Template Name: Tutorial Page
 *
 * @package Proximo
 *
 */

$parent_id = ( $post->post_parent ) ? $post->post_parent : $post->ID;
$parent = get_post( $parent_id );

// get previous / next pages

$pagelist = get_pages("child_of=".$parent_id."&sort_column=menu_order&sort_order=asc");
$prev = false;
$next = false;
$onemore = false;
foreach ($pagelist as $p) {
    if ( $onemore ) {
        $next = $p;
        break;
    }

    if ( $post->ID === $p->ID  ) {
        $onemore = true;
    } else {
        $prev = $p;
    }

}

// if this is the parent post, hardcode
if ( $post->ID === $parent_id ) {
    $prev = false;
    $next = $pagelist[0];
}

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

    <header class="site-header">
        <h3 class="site-title">
            <a href="<?php echo esc_attr( get_permalink( $parent_id ) ); ?>">
                <?php echo esc_html( $parent->post_title ); ?>
            </a>
        </h3>
    </header>

    <main>

        <aside>
            <h2>Contents</h2>
            <ul>

<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $parent_id,
    'orderby'        => 'menu_order',
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
                <?php the_content(); ?>
            <?php endwhile; ?>
            <footer>
                <nav>
                    <?php if ( $prev ) : ?><span class="prev">
                        <a href="<?php echo esc_attr( get_permalink( $prev->ID ) ); ?>">
                            &#171; <?php echo esc_html( $prev->post_title ); ?>
                        </a>
                    </span><?php endif; ?>
                    <?php if ( $next ) : ?><span class="next">
                        <a href="<?php echo esc_attr( get_permalink( $next->ID ) ); ?>">
                            <?php echo esc_html( $next->post_title ); ?> &#187;
                        </a>
                    </span><?php endif; ?>
                </nav>

            </footer>
        </article>

    </main>

</div>
<?php
get_footer();

