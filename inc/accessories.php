<?php

//Button Shortcode
add_shortcode('tk_button', 'tk_button_func');
function tk_button_func($atts = array())
{
    extract(shortcode_atts(array('text' => '', 'href' => '#', 'type' => 'text'), $atts)); ?>
    <a href="<?php echo $href; ?>" class="btn btn-outline-primary">
        <?php if ($type == 'icon') : ?>
            <i class="<?php echo $text; ?>"></i>
        <?php endif; ?>
        <?php if ($type == 'text') : ?>
            <?php echo $text; ?>
        <?php endif; ?>
    </a>
<?php } ?>