<?php
/**
 * Theme functions and definitions
 */

function sample_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('responsive-embeds');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'sample_theme_setup');

// Enqueue styles and scripts
function sample_theme_scripts() {
    wp_enqueue_style('sample-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'sample_theme_scripts');
?>