<?php
namespace Snippet;

use Zesty;

// Enqueue stylesheets
// Copy this file into your child theme to add or edit styles

class Styles {
    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'wp_enqueue_scripts'));
    }

    // Load default stylesheet
    public function wp_enqueue_scripts() {
        Zesty::enqueue_style('zesty-style', 'style.css');
    }
}
