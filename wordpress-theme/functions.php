<?php

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

add_filter('use_block_editor_for_post', '__return_false', 10);

function mlservice_scripts()
{
    wp_enqueue_style('mlservice-options', get_template_directory_uri() . '/assets/css/options.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('mlservice-header-footer', get_template_directory_uri() . '/assets/css/header-footer.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('mlservice-main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('mlservice-vendor', get_template_directory_uri() . '/assets/css/vendor.css', array(), _S_VERSION, 'all');
    if ((is_singular() || is_404()) && !is_front_page()) {
        wp_enqueue_style('mlservice-single', get_template_directory_uri() . '/assets/css/single.css', array(), _S_VERSION, 'all');
    }

	wp_enqueue_script('mlservice-im', get_template_directory_uri() . '/assets/js/im.js', array(), _S_VERSION, true);
    wp_enqueue_script('mlservice-swiper', get_template_directory_uri() . '/assets/js/swiper.js', array(), _S_VERSION, true);
    wp_enqueue_script('mlservice-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'mlservice_scripts');

function mlservice_init()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header menu', 'mlservice'),
        )
    );

    register_post_type('service', [
        'label'  => null,
        'labels' => [
            'name'               => __('Services', 'mlservice'),
            'singular_name'      => __('Service', 'mlservice'),
            'add_new'            => __('Add service', 'mlservice'),
            'add_new_item'       => __('Adding service', 'mlservice'),
            'edit_item'          => __('Edit service', 'mlservice'),
            'new_item'           => __('New service', 'mlservice'),
            'view_item'          => __('See service', 'mlservice'),
            'search_items'       => __('Search service', 'mlservice'),
            'not_found'          => __('Services not found', 'mlservice'),
            'not_found_in_trash' => __('Services not found in trash', 'mlservice'),
            'parent_item_colon'  => '',
            'all_items'          => __('All services', 'mlservice'),
            'menu_name'          => __('Services', 'mlservice')
        ],
        'description'         => '',
        'public'              => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-admin-tools',
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => ['title', 'editor', 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'revisions', 'page-attributes', 'post-formats'],
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ]);

    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $labels->name = __('Posts', 'mlservice');
    $labels->singular_name = __('Post', 'mlservice');
    $labels->add_new = __('Add post', 'mlservice');
    $labels->add_new_item = __('Adding post', 'mlservice');
    $labels->edit_item = __('Edit post', 'mlservice');
    $labels->new_item = __('New post', 'mlservice');
    $labels->view_item = __('See post', 'mlservice');
    $labels->search_items = __('Search post', 'mlservice');
    $labels->not_found = __('Posts not found', 'mlservice');
    $labels->not_found_in_trash = __('Posts not found in trash', 'mlservice');
    $labels->all_items = __('All posts', 'mlservice');
    $labels->menu_name = __('Posts', 'mlservice');
    $labels->name_admin_bar = __('Posts', 'mlservice');
}
add_action('init', 'mlservice_init');

function mlservice_setup()
{
    load_theme_textdomain('mlservice', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support(
        'html5',
        array(
            'search-form',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_theme_support(
        'custom-background',
        apply_filters(
            'mlservice_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'mlservice_setup');

// Requires
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';
