<?php

function mlservice_customize_register($wp_customize)
{
}
add_action('customize_register', 'mlservice_customize_register');

function mlservice_customize_preview_js()
{
    wp_enqueue_script('mlservice-customizer', get_template_directory_uri() . '/assets/js/customizer/customizer.js', array('jQuery', 'customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'mlservice_customize_preview_js');
