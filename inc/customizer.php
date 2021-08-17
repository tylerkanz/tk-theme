<?php
add_action('customize_register', 'tk_customizer_options');
function tk_customizer_options($wp_customize)
{
    /**
     * Custom Colors section
     */
    $wp_customize->add_setting(
        'tk_accent_color',
        array(
            'default' => '#333333', //default
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'tk_custom_accent_color',
            array(
                'label'      => __('Accent Color', 'tk-theme'), //label
                'section'    => 'colors',
                'settings'   => 'tk_accent_color'
            )
        )
    );

    /**
     * Header Image
     */
    $wp_customize->add_setting('tk_header_logo');
    // Add a control to upload the logo
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'tk_header_logo',
        array(
            'label' => 'Upload Logo',
            'section' => 'title_tagline',
            'settings' => 'tk_header_logo',
        )
    ));
}
