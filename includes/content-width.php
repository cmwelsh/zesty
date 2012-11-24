<?php
namespace Snippet;

// $content_width
// http://mainstreetopen.com/wordpress-26-and-full-width-images/

class Content_Width {
    public function __construct() {
        if (!isset($GLOBALS['content_width'])) {
            $GLOBALS['content_width'] = 750;
        }
    }
}
