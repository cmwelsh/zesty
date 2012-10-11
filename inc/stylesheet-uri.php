<?php

// Custom Stylesheet URI

// Lets WordPress know that the main stylesheet for our project is located
// in the /assets/styles folder

class Stylesheet_Uri {
  public function __construct() {
    add_filter('stylesheet_directory_uri', array($this, 'stylesheet_directory_uri'), 10, 2);
  }

  public function stylesheet_directory_uri($stylesheet_dir_uri, $theme_name) {
    $sub_directory = '/assets/styles';
    return $stylesheet_dir_uri . $sub_directory;
  }
}

new Stylesheet_Uri();
