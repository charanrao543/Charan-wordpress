<?php
// Add theme support
function sample_block_theme_setup() {
  add_theme_support('post-thumbnails');
  add_theme_support('editor-styles');
  add_editor_style();
}

add_action('after_setup_theme', 'sample_block_theme_setup');

function theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


