<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <script src="https://kit.fontawesome.com/8972077944.js" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
            <?php
            if (get_theme_mod('tk_header_logo')) : ?>
                <div>
                    <img style="max-width: 75px; max-height: 40px;" src="<?php echo get_theme_mod('tk_header_logo'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                </div>
            <?php
            else : ?>
                Navbar
            <?php endif; ?>
        </a>
        <!-- Brand and toggle get grouped for better mobile display -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        wp_nav_menu(array(
            'theme_location'    => 'header-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse justify-content-sm-end',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav align-items-lg-center',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ));
        ?>
    </div>
</nav>