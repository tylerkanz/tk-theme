<?php
add_shortcode('tk-preview-posts', 'tk_preview_posts');

function tk_preview_posts($atts)
{
    ob_start(); ?>
    <div class="container">
        <div class="row">
            <?php
            $args = array(
                'posts_per_page' => 4,
                'category_name' => $atts['category']
            );

            $posts = get_posts($args);
            foreach ($posts as $post) : setup_postdata($post); ?>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
                        <img class="card-img-top" src="<?php echo $image[0]; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post->post_title ?></h5>
                            <p class="card-text"><?php echo substr($post->post_content, 0, 150) . '...' ?></p>
                            <?php
                            $git_url = get_post_meta($post->ID, 'github_repo_url', true);
                            if ($git_url) { ?>
                                <a href="<?php echo $git_url ?>" target="_blank" class="btn btn-outline-primary">View on GitHub &nbsp<i class="fab fa-github"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            endforeach; ?>

        </div>
    </div>
<?php return ob_get_clean();
}
?>