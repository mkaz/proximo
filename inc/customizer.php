<?php
/**
 * Proximo: Customizer
 *
 * Add color schemes to customizer
 *
 * @package proximo
 * @since 1.1.0
 */

/**
 * Colors order: Background, Text, Link, Header Background, Header Text
 */
$proximo_color_choices = array (
    'gruvvy' => array(
        'label' => 'Gruvvy',
        'colors' => array( '#F5F5F5', '#404040', '#005DAC', '#282828', '#FE8019' )
    ),
    'purple' => array(
        'label' => 'Purple',
        'colors' => array( '#29274c', '#7e52a0', '#d295bf', '#e6bccd' )
    ),
    'slate' => array(
        'label' => 'Slate',
        'colors' => array( '#b9bbbb', '#a2a3bb', '#5e5f87', '#b3b7ee', '#fbf9ff' )
    )
);

function proximo_customize_register( $wp_customize ) {
    global $proximo_color_choices;

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

    // Background color
    $wp_customize->add_setting( 'background_color', array(
        'default'   => $proximo_color_choices['gruvvy']['colors'][0],
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Background', 'proximo' ),
    ) ) );

    // Text color
    $wp_customize->add_setting( 'text_color', array(
        'default'   => $proximo_color_choices['gruvvy']['colors'][1],
        'transport' => 'refresh',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Text color', 'proximo' ),
    ) ) );

    // Link color
    $wp_customize->add_setting( 'link_color', array(
        'default'   => $proximo_color_choices['gruvvy']['colors'][2],
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Link color', 'proximo' ),
    ) ) );

    // Header background
    $wp_customize->add_setting( 'header_background', array(
        'default'   => $proximo_color_choices['gruvvy']['colors'][3],
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Header Background', 'proximo' ),
    ) ) );

    // Header Colors
    $wp_customize->add_setting( 'header_text_color', array(
        'default'   => $proximo_color_choices['gruvvy']['colors'][4],
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_text_color', array(
        'section' => 'colors',
        'label'   => esc_html__( 'Header Text Color', 'proximo' ),
    ) ) );
}
add_action( 'customize_register', 'proximo_customize_register' );

function proximo_color_palette_callback( $color ) {
    global $proximo_color_choices;
    if ( ! array_key_exists( $color, $proximo_color_choices ) ) {
        return $color;
    }
    $colors = $proximo_color_choices[ $color ]['colors'];
    set_theme_mod( 'background_color', $colors[0] );
    set_theme_mod( 'text_color', $colors[1] );
    set_theme_mod( 'link_color', $colors[2] );
    set_theme_mod( 'header_background', $colors[3] );
    set_theme_mod( 'header_text_color', $colors[4] );

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
        <?php proximo_css_customizer_helper( 'background-color', 'background_color' ); ?>;
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
