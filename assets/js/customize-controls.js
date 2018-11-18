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
                wp.customize.control.each( c => {
                    if ( c.id === "background_color") {
                        c.setting.set( colors[0] );
                    } else if ( c.id === "text_color" ) {
                        c.setting.set( colors[1] );
                    } else if ( c.id === "link_color" ) {
                        c.setting.set( colors[2] );
                    } else if ( c.id === "header_background" ) {
                        c.setting.set( colors[3] );
                    } else if ( c.id === "header_text_color" ) {
                        c.setting.set( colors[4] );
                    }
                } )
            });
        });
    });
})( jQuery );
