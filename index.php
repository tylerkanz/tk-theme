<?php get_header(); ?>
<div class="entry-content">
<body>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
            <?php edit_post_link(); ?>
    <?php endwhile; ?>

        <?php
        if (get_next_posts_link()) {
            next_posts_link();
        }
        ?>
        <?php
        if (get_previous_posts_link()) {
            previous_posts_link();
        }
        ?>

    <?php else : ?>

        <h1>No posts found. :(</h1>

    <?php endif; ?>
    <?php wp_footer(); ?>
</body>
</div>
<?php get_footer(); ?>
