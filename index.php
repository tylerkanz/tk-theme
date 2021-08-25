<?php get_header(); ?>
<div class="entry-content">

    <body>
    <div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>
        <script>
            $(window).on("load", function() {
                $(".loader-wrapper").fadeOut("slow");
            });
        </script>
        <div class="se-pre-con"></div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="container-fluid" style="margin-top: 64px">
                    <?php the_content(); ?>
                </div>
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
            <div class="container">
                <h1>Nothing here :(</h1>
            </div>
        <?php endif; ?>
        <?php wp_footer(); ?>
    </body>
</div>
<?php get_footer(); ?>