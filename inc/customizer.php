<?php
/**
 * Proximo: Customizer
 *
 * Add color schemes to customizer
 *
 * @package proximo
 * @since 1.1.0
 */

require( __DIR__ . "/customizer-colors.php" );

function proximo_customize_register( $wp_customize ) {
    global $proximo_color_choices, $proximo_color_fields;

    $wp_customize->add_setting( 'proximo_color_palette', array(
        'default' => 'gruvvy',
        'transport' => 'refresh',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'proximo_color_palette_callback',
    ));

    $wp_customize->add_control( new Proximo_Color_Palette_Control( $wp_customize, 'proximo_color_palette', array(
        'label' => __( 'Color Scheme', 'proximo' ),
        'description' => __( 'Choose a color scheme.', 'proximo' ),
        'section' => 'colors',
        'choices' => $proximo_color_choices,
        'priority' => 5,
        'settings' => 'proximo_color_palette',
    ) ) );

    foreach ( $proximo_color_fields as $field => $desc ) {
        // Background color
        $wp_customize->add_setting( $field, array(
            'default'   => $proximo_color_choices['gruvvy']['colors'][$field],
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $field, array(
            'section' => 'colors',
            'label'   => esc_html__( $desc, 'proximo' ),
        ) ) );
    }
}
add_action( 'customize_register', 'proximo_customize_register' );

function proximo_color_palette_callback( $color ) {
    global $proximo_color_choices, $proximo_color_fields;
    if ( ! array_key_exists( $color, $proximo_color_choices ) ) {
        return $color;
    }
    $colors = $proximo_color_choices[ $color ]['colors'];
    foreach ( array_keys( $proximo_color_fields ) as $field ) {
        set_theme_mod( $field, $colors[$field] );
    }

    return $color;
}

/**
 * Helper function
 */
function proximo_css_customizer_helper( $prop, $param ) {
    $value = get_theme_mod( $param, '' );
    if ( empty( $value ) ) {
        return;
    }
    printf("%s: %s", $prop, sanitize_hex_color( $value ) );
}

function proximo_get_customizer_css() {
    ob_start();
    ?>
    body {
        <?php proximo_css_customizer_helper( 'background-color', 'bg_color' ); ?>;
        <?php proximo_css_customizer_helper( 'color', 'text_color' ); ?>;
    }

    a, a:visited {
        <?php proximo_css_customizer_helper( 'color', 'link_color' ); ?>;
    }

    .header-background-color {
        <?php proximo_css_customizer_helper( 'background-color', 'header_background' ); ?>;
    }

    .header-text-color,
    .header-text-color a,
    .header-text-color a:visited {
        <?php proximo_css_customizer_helper( 'color', 'header_text_color' ); ?>;
    }

    article {
        <?php proximo_css_customizer_helper( 'background-color', 'content_background' ); ?>;
    }

    .footer-widgets {
        <?php proximo_css_customizer_helper( 'background-color', 'widgets_background' ); ?>;
        <?php proximo_css_customizer_helper( 'color', 'widgets_text_color' ); ?>;
    }
    <?php
    $css = ob_get_clean();
    return $css;
}

/**
 */
function proximo_color_palette_control_class() {
    class Proximo_Color_Palette_Control extends WP_Customize_Control {
        public function render_content() {
        ?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif;

                if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <?php endif; ?>
                <div class="proximo-color-palette-group">
                <?php foreach ( $this->choices as $value => $label ) : ?>
                    <label class="color-option">
                        <span><?php echo esc_attr( $label['label'] ); ?></span>
                        <table class="color-palette">
                            <tr>
                            <?php foreach ( $label['colors'] as $color ) : ?>
                                <td style="background-color: <?php echo esc_attr( $color ); ?>">&nbsp;</td>
                            <?php endforeach; ?>
                            </tr>
                        </table>
                        <input
                            name="proximo_color_palette_<?php echo esc_attr( $this->id ); ?>"
                            type="radio"
                            value="<?php echo esc_attr( $value ); ?>"
                            <?php $this->link(); checked( $this->value(), $value ); ?>
                            style="display:none"
                        />
                    </label>
                <?php endforeach; ?>
                </div>
            </label>
        <?php }
    }
}
add_action( 'customize_register', 'proximo_color_palette_control_class', 9 );


/**
 * Load customizer controls script.
 */
function proximo_customizer_js() {
    // output color choices to JS
    global $proximo_color_choices;
    printf( '<script> var proximo_color_choices = %s; </script>', wp_json_encode( $proximo_color_choices ) );

	wp_enqueue_script( 'proximo-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array( 'jquery' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'proximo_customizer_js' );
