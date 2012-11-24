<?php
namespace Snippet;

// Enqueue stylesheets

class Styles {
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));
    }

    // Load default stylesheet
    public function wp_enqueue_scripts() {
        $path = get_stylesheet_directory_uri() . '/assets/styles/';
        wp_enqueue_style('zesty-style', $path . 'style.css');
    }
}
