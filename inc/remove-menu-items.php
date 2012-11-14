<?php
namespace Snippet;

// Remove Menu Items

// This removes the Links menu item

class Remove_Menu_Items {
    public function __construct() {
        add_action('admin_menu', array($this, 'remove_menus'));
    }

    // This function modifies the global variable $menu which controls
    // the items to be displayed on the administration sidebar.
    public function remove_menus() {
        // Menu titles to remove
        $restricted = array(
            __('Links'),
        );

        global $menu;

        foreach ($menu as $key => $val) {
            $menu_title = $val[0];

            if (in_array($menu_title, $restricted)) {
                unset($menu[$key]);
            }
        }
    }
}
