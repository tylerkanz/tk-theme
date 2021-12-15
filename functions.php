<?php

/**
 * PHP Files
 */

//Customizer Functions
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/patterns.php';

add_theme_support('automatic-feed-links');
add_theme_support('responsive-embeds');
add_theme_support('editor-styles');
add_theme_support('wp-block-styles');

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
add_filter('show_admin_bar', '__return_false');

// Add theme support for Featured Images
add_theme_support('post-thumbnails', array(
    'post',
    'page',
    'custom-post-type-name',
));


//Shortcodes
include('inc/shortcodes/post-preview.php');

//Post Options
include('inc/post-options/git-url.php');

//Check for Updates
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/tylerkanz/tk-theme/',
    __FILE__,
    'tk-theme'
);
$myUpdateChecker->setBranch('main');


function disable_wp_auto_p($content)
{
    remove_filter('the_content', 'wpautop');
    remove_filter('the_excerpt', 'wpautop');
    return $content;
}
add_filter('the_content', 'disable_wp_auto_p', 0);


add_filter('the_content', 'remove_unneeded_silly_p_tags_from_shortcodes');
function remove_unneeded_silly_p_tags_from_shortcodes($the_content){
    $array = array (
        '<p>'      => '',
        '</p>'     => '<br /><br />'
    );
    $the_content = strtr($the_content, $array); //replaces instances of the keys in the array with their values
    return $the_content;
}

