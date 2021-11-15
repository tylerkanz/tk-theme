<?php

/**
 * PHP Files
 */

//Customizer Functions
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/patterns.php';

add_theme_support( 'automatic-feed-links' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'editor-styles' );
add_theme_support( 'wp-block-styles' );

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

//Check for Updates
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/tylerkanz/tk-theme/',
	__FILE__,
	'tk-theme'
);
$myUpdateChecker->setBranch('main');
