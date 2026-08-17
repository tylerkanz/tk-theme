<?php

// register the meta box
add_action( 'add_meta_boxes', 'github_repo_url' );
function github_repo_url() {
    add_meta_box(
        'git-url',          // this is HTML id of the box on edit screen
        'GitHub Repo URL',
        'github_url_box_content',   // function to be called to display the checkboxes, see the function below
        'post',        // on which edit screen the box should appear
        'normal',      // part of page where the box should appear
        'default'
    );
}

// display the metabox
function github_url_box_content() {
    // nonce field for security check, you can have the same
    // nonce field for all your meta boxes of same plugin
    wp_nonce_field( plugin_basename( __FILE__ ), 'myplugin_nonce' );
    $github_repo_url = get_post_meta( get_the_ID(), 'github_repo_url', true );
    ?>
    <label for="github_repo_url" class="screen-reader-text"><?php esc_html_e( 'GitHub Repo URL', 'tk-theme' ); ?></label>
    <input type="text" id="github_repo_url" name="github_repo_url" class="widefat" value="<?php echo esc_attr( $github_repo_url ); ?>" />
    <?php
}

// save data from the meta box
add_action( 'save_post', 'github_url_field_data' );
function github_url_field_data($post_id) {

    // check if this isn't an auto save
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    // security check
    if ( ! isset( $_POST['myplugin_nonce'] ) || ! wp_verify_nonce( $_POST['myplugin_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    // only users who can edit this post should be able to change its meta
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return;

    if ( ! isset( $_POST['github_repo_url'] ) )
        return;

    // now store the sanitized value
    update_post_meta( $post_id, 'github_repo_url', sanitize_text_field( wp_unslash( $_POST['github_repo_url'] ) ) );

}
