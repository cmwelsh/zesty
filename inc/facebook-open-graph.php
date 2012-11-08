<?php
namespace Snippet;

// Facebook Open Graph

// TODO: add support for automatically creating a ACF options page to choose
//       open graph image

class Facebook_Open_Graph {
  public function __construct() {
    add_action('wp_head', array($this, 'wp_head'));
  }
  public function wp_head() {
    get_template_part('page-templates/partials/facebook-open-graph');
  }
}
