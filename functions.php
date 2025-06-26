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

function load_bootstrap_for_carousel() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css');

    // Bootstrap JS (needs jQuery first)
    wp_enqueue_script('jquery'); // Already bundled with WordPress
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'load_bootstrap_for_carousel');

// ---------------------------------------------------------------------------------------------------------


function handle_register_form() {
    if (
        !isset($_POST['email']) || 
        !isset($_POST['psw']) || 
        !isset($_POST['psw-repeat']) || 
        $_POST['psw'] !== $_POST['psw-repeat']
    ) {
        wp_redirect(home_url('/register?error=password_mismatch'));
        exit;
    }

    $email = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['psw']);

    if (email_exists($email)) {
        wp_redirect(home_url('/register?error=email_exists'));
        exit;
    }

    $user_id = wp_create_user($email, $password, $email);

    if (is_wp_error($user_id)) {
        wp_redirect(home_url('/register?error=failed'));
        exit;
    }

    wp_redirect(home_url('/register?success=1'));
    exit;
}
add_action('admin_post_nopriv_handle_register_form', 'handle_register_form');
add_action('admin_post_handle_register_form', 'handle_register_form');
