<?php

/**
 * Lucky Store Customizer File
 *
 * @package Fancy_Lab
 */

function woo_guille_customizer_copyright($wp_customize)
{
    // Creating a first section, for copyright information
    // We can find in the database in wp_options, theme_mods
    $wp_customize->add_section(
        'sec_copyright',
        array(
            'title' => 'Copyright Settings',
            'description' => 'Copyright Section'
        )
    );

    // Field 1 - Copyrght Text Box Setting
    $wp_customize->add_setting(
        'set_copyright',
        array(
            'type' => 'theme_mod',
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Add Control for setting set_copyright and for section sec_copyright
    $wp_customize->add_control(
        'set_copyright',
        array(
            'label' => 'Copyright',
            'description' => 'Please, add you copyright information here',
            'section' => 'sec_copyright',
            'type' => 'text'
        )
    );
}

add_action('customize_register', 'woo_guille_customizer_copyright');
