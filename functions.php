<?php
/**
* PHP Files
*/
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/carousel.php';
require get_template_directory() . '/inc/synthwave.php';
/**
 * Enqueue Scripts
 */
function tk_enqueue() {
    ## Enqueue CSS ##
    wp_enqueue_style('styles', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    ## Enqueue JS ##
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/jquery-3.2.1.slim.min.js', array( 'jquery' ), 1.1, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'bootstrap' ), 1.1, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/popper.min.js', array( 'popper' ), 1.1, true);
}
add_action('wp_enqueue_scripts', 'tk_enqueue');

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
  }
  add_action( 'init', 'register_my_menu' );

  // Add theme support for Featured Images
add_theme_support('post-thumbnails', array(
    'post',
    'page',
    'custom-post-type-name',
    ));
