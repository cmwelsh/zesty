<?php

// Automatically add menu_order when post is created

class New_Page_Menu_Order {
  public function __construct() {
    add_filter('wp_insert_post_data', array($this, 'wp_insert_post_data'), 10, 2);
  }

  public function wp_insert_post_data($data, $postarr) {
    if ($data['menu_order'] === 0) {
      global $wpdb;
      $post_type = $data['post_type'];
      if ($post_type !== 'post') {
        $data['menu_order'] = $wpdb->get_var("
          SELECT MAX(menu_order)+1 AS menu_order
          FROM {$wpdb->posts}
          WHERE post_type='{$post_type}'");
      }
    }
    return $data;
  }
}

new New_Page_Menu_Order();
