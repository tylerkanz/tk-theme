<?php

/**
 * PHP Files
 */

//Customizer Functions
require get_template_directory() . '/inc/customizer.php';

//Accessories Functions
require get_template_directory() . '/inc/accessories.php';

//Carousel
require get_template_directory() . '/inc/carousel.php';

//Synthwave
require get_template_directory() . '/inc/synthwave.php';

/**
 * Register Custom Navigation Walker
 */
function register_navwalker()
{
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

/**
 * Enqueue Scripts
 */
function tk_enqueue()
{
    ## Enqueue CSS ##
    wp_enqueue_style('styles', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    ## Enqueue JS ##
    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true);
    wp_enqueue_script('bootstrap');
    wp_register_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), false, true);
    wp_enqueue_script('popper');
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js', array('jquery'), NULL, false);
}
add_action('wp_enqueue_scripts', 'tk_enqueue');

function register_my_menu()
{
    register_nav_menu('header-menu', __('Header Menu'));
}
add_action('init', 'register_my_menu');

//Because thats annoying
add_filter( 'show_admin_bar', '__return_false' );

// Add theme support for Featured Images
add_theme_support('post-thumbnails', array(
    'post',
    'page',
    'custom-post-type-name',
));
