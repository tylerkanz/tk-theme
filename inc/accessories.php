<?php

//Button Shortcode
add_shortcode('tk_button', 'tk_button_func');
function tk_button_func($atts = array())
{
    extract(shortcode_atts(array('text' => '', 'href' => '#', 'type' => 'text'), $atts)); ?>
    <div class="portfolio-experiment">
        <a href="<?php echo $href; ?>">
            <?php if ($type == 'icon') : ?>
                <span class="text"><i class="<?php echo $text; ?>"></i></span>
                <span class="line -right"></span>
                <span class="line -top"></span>
                <span class="line -left"></span>
                <span class="line -bottom"></span>
            <?php endif; ?>
            <?php if ($type == 'text') : ?>
                <span class="text"><?php echo $text; ?></span>
                <span class="line -right"></span>
                <span class="line -top"></span>
                <span class="line -left"></span>
                <span class="line -bottom"></span>
            <?php endif; ?>
        </a>
    </div>
<?php } ?>