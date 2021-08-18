<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <script src="https://kit.fontawesome.com/8972077944.js" crossorigin="anonymous"></script>
</head>

<nav class="navbar navbar-expand-md navbar-dark bg-dark" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?php echo get_home_url();?>">
            <?php
            if (get_theme_mod('tk_header_logo')) : ?>
            <div>
                <img style="max-width: 75px; max-height: 50px;" src="<?php echo get_theme_mod('tk_header_logo'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            </div>
            <?php
            else : ?>
                Navbar
            <?php endif; ?>
        </a>
        <div>
            <?php
            wp_nav_menu(array(
                'theme_location'    => 'header-menu',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                'walker'            => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
    </div>
</nav>