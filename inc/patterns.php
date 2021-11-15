<?php 
function my_register_block_patterns()
  {
    if (class_exists('WP_Block_Patterns_Registry')) {
      // register pattern
      register_block_pattern('mine/your-pattern', [
        'title' => __('Your pattern title', 'textdomain'),
        'description' => _x(
          'Your pattern description',
          'Block pattern description',
          'textdomain'
        ),
        'content' =>
          "<!-- wp:paragraph -->\n<p>Your pattern</p>\n<!-- /wp:paragraph -->",
        'categories' => ['section'],
      ]);

      // register categories
      register_block_pattern_category('section', [
        'label' => _x('Section', 'textdomain'),
      ]);
    }
  }

add_action( 'init', 'my_register_block_patterns' );
?>