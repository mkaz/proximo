<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Proximo
 */

?>

</div>
<footer id="colophon" class="site-footer header-background-color" role="contentinfo">

    <?php get_sidebar(); ?>

    <div class="site-info header-text-color">
        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'proximo' ) ); ?>">
			<?php printf( esc_html__( 'Proudly powered by %s', 'proximo' ), 'WordPress' ); ?>
		</a>
        <span class="sep"> | </span>
        Theme: <a href="https://github.com/mkaz/proximo">Proximo</a>
		crafted by <a href="https://mkaz.com/" rel="designer">mkaz</a>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
