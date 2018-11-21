/**
 * Scripts within the customizer controls window.
 *
 * Change the color controls for each field when the scheme is selected.
 */
(function() {
    wp.customize.bind( 'ready', function() {
        wp.customize( 'proximo_color_palette', function( setting ) {
            setting.bind( function( val ) {
                if ( ! ( val in proximo_color_choices ) ) { return; }
                let colors = proximo_color_choices[ val ].colors;               
                for ( let color in colors ) {
                    wp.customize( color ).set( colors[ color ] );
                }
            });
        });
    });
})( jQuery );
