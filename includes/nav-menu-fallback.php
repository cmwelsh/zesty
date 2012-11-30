<?php
namespace Snippet;

// If theme location menu does not exist, show a basic link to the Home page
// instead of listing all pages

class Nav_Menu_Fallback {
    public function __construct() {
        add_filter('wp_page_menu_args', array($this, 'wp_page_menu_args'));
    }
    public function wp_page_menu_args($args) {
        $args['show_home'] = true;
        return $args;
    }
}
