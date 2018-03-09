<?php
/**
 * Template part for displaying post lists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proximo
 */


	the_title( '<li class="entry-title" id="post-<?php the_ID(); ?>" ><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></li>' );

