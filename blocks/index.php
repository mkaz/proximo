<?php

/**
 * Register Proximo Sidenote Block
 */
function proximo_sidenote_register_block() {
    wp_register_script(
        'proximo-sidenote-js',
        get_template_directory_uri() . '/blocks/sidenote.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor'),
        'v1.1'
    );

	register_block_type( 'proximo/sidenote', array(
		'editor_script' => 'proximo-sidenote-js',
	) );

    wp_register_script(
        'proximo-tips-js',
        get_template_directory_uri() . '/blocks/tips.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor'),
        'v1.1'
    );

	register_block_type( 'proximo/tips', array(
		'editor_script' => 'proximo-tips-js',
	) );

}
add_action( 'admin_init', 'proximo_sidenote_register_block' );

