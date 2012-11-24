<?php
namespace Snippet;

class Nav_Menu_Fallback {

}

function twentytwelve_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );
