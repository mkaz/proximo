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
                console.log( colors ); // use this for the loop instead
                wp.customize.control.each( c => {
                    if ( c.id === "bg_color") {
                        c.setting.set( colors['bg_color'] );
                    } else if ( c.id === "text_color" ) {
                        c.setting.set( colors['text_color'] );
                    } else if ( c.id === "link_color" ) {
                        c.setting.set( colors['link_color'] );
                    } else if ( c.id === "header_background" ) {
                        c.setting.set( colors['header_background'] );
                    } else if ( c.id === "header_text" ) {
                        c.setting.set( colors['header_text'] );
                    }
                } )
            });
        });
    });
})( jQuery );
