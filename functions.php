<?php
function tk_enqueue() {
    ## Enqueue CSS ##
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    ## Enqueue JS ##
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/jquery-3.2.1.slim.min.js', array( 'jquery' ), 1.1, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'bootstrap' ), 1.1, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/popper.min.js', array( 'popper' ), 1.1, true);
}
add_action('wp_enqueue_scripts', 'tk_enqueue');
?>