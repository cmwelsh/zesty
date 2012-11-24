<?php
namespace Snippet;

// Favicon

class Favicon {
    public function __construct() {
        add_action('wp_head', array($this, 'render_favicon'));
        add_action('admin_head', array($this, 'render_favicon'));
    }
    public function render_favicon() {
        ?>
        <link rel="shortcut icon" href="<?= get_stylesheet_directory_uri() ?>/assets/images/favicon.png">
        <?php
    }
}
