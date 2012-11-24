<?php
namespace Snippet;

// Facebook Open Graph Tags
// https://developers.facebook.com/docs/opengraphprotocol/

// TODO: Add a built-in ACF option field to select the image

class Facebook_Open_Graph {
    public function __construct() {
        add_action('wp_head', array($this, 'wp_head'));
    }
    public function wp_head() {
        get_template_part('partial-open-graph');
    }
}
