<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
    <script src="https://kit.fontawesome.com/8972077944.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
</head>

<script>
    $(window).scroll(function() {
        if ($(window).scrollTop() >= 1) {
            $('.custom-nav-transition').css('background', '#323233');
        } else {
            $('.custom-nav-transition').css('background', 'transparent');
        }
    });
</script>
<nav class="navbar navbar-expand-lg fixed-top navbar-dark custom-nav-transition" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
            <?php
            if (get_theme_mod('tk_header_logo')) : ?>
                <div>
                    <img style="max-width: 200px; max-height: 50px;" src="<?php echo get_theme_mod('tk_header_logo'); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
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