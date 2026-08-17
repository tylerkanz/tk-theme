<?php
add_shortcode('tk-preview-posts', 'tk_preview_posts');

function tk_preview_posts($atts)
{
    $atts = shortcode_atts(
        array(
            'category' => '',
        ),
        $atts,
        'tk-preview-posts'
    );

    ob_start(); ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php
            $args = array(
                'posts_per_page' => 4,
                'category_name' => $atts['category']
            );

            $posts = get_posts($args);
            foreach ($posts as $post) : setup_postdata($post); ?>
                <div class="col-md-3">
                    <div class="card m-auto mb-4" style="width: 18rem;">
                        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
                        <?php if ($image) : ?>
                            <img class="card-img-top" src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo esc_html($post->post_title); ?></h5>
                            <?php
                            $excerpt = wp_strip_all_tags($post->post_content);
                            if (strlen($excerpt) > 149) { ?>
                                <p class="card-text"><?php echo esc_html(substr($excerpt, 0, 150)) . '&hellip;'; ?></p>
                            <?php } else { ?>
                                <p class="card-text"><?php echo esc_html($excerpt); ?></p>
                            <?php }
                            $git_url = get_post_meta($post->ID, 'github_repo_url', true);
                            if ($git_url) { ?>
                                <a href="<?php echo esc_url($git_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary">View on GitHub &nbsp;<i class="fab fa-github" aria-hidden="true"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php
            endforeach;
            wp_reset_postdata(); ?>

        </div>
    </div>
<?php return ob_get_clean();
}
