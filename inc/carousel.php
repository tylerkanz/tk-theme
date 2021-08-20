<?php
add_shortcode('tk_carousel', 'tk_carousel_func');
function tk_carousel_func($atts = array())
{
    ob_start();
    extract(shortcode_atts(array('category' => ''), $atts));
    $args = array('category_name' => $category, 'posts_per_page' => 25);
    $posts = get_posts($args);
?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/carousel/carousel.css">
    <div class="gallery">
        <div class="gallery-container">
            <?php
            $item_counter = 0;
            foreach ($posts as $post) {
                $item_counter++;
                if (has_post_thumbnail($post->ID)) {
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
                    <img class="gallery-item <?php if ($item_counter <= 5) {
                                                    echo 'gallery-item-' . $item_counter;
                                                } ?>" src="<?php echo $image[0]; ?>" data-index="<?php echo $item_counter; ?>">
            <?php }
            } ?>
        </div>
        <div class="gallery-controls"></div>
    </div>
    <script src="<?php echo get_template_directory_uri() ?>/inc/carousel/carousel.js"></script>
<?php
    return ob_get_clean();
} ?>