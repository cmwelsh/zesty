<?php
namespace Snippet;

// Remove Meta Tags

// This will remove all of the <meta> tag cruft that WordPress puts into the
// <head> section of the page.

class Remove_Meta_Tags {
    public function __construct() {
        // Posts and Comments RSS Feeds
        remove_action('wp_head', 'feed_links', 2);
        add_action('wp_head', array($this, 'feed_links'), 2);
        // Links to the extra feeds such as category feeds
        remove_action('wp_head', 'feed_links_extra', 3);
        // Link to the Really Simple Discovery service endpoint, EditURI link
        remove_action('wp_head', 'rsd_link');
        // Link to the Windows Live Writer manifest file.
        remove_action('wp_head', 'wlwmanifest_link');
        // Index link
        remove_action('wp_head', 'index_rel_link');
        // Prev link
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        // Start link
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        // Relational links for the posts adjacent to the current post
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        // Generator tag indicating what version of WordPress is running
        remove_action('wp_head', 'wp_generator');
    }
    public function feed_links() {
        if (!current_theme_supports('automatic-feed-links')) {
            return;
        }
        // Add RSS feed but exclude comments feed
        ?>
        <link rel="alternate" type="<?php echo feed_content_type(); ?>" title="<?php printf(__('%1$s %2$s Feed'), get_bloginfo('name'), '&raquo;'); ?>" href="<?= get_feed_link(); ?>">
        <?php
    }
}
