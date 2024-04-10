<?php


function example_customizer( $wp_customize ) {
    
    
/* ============== HEADER LOGO
========================== */
    $wp_customize->add_section( 'logo_section' , array(
    'title'       => __( 'Logo' ),
    'priority'    => 30,
    'description' => 'Upload a logo in the header',
        ) );
        
    $wp_customize->add_setting( 'logo' );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
    'label'    => __( 'Logo' ),
    'section'  => 'logo_section',
    'settings' => 'logo',
) ) );


}
add_action( 'customize_register', 'example_customizer' );
