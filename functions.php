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
    // Example of adding another custom external stylesheet
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function load_fontawesome() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts', 'load_fontawesome');
