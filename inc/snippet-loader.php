<?php

namespace Zesty;

class Snippet_Loader {
    protected $snippets = array();

    public function __construct() {
        add_action('zesty_load_snippet', array($this, 'load_snippet'));
    }
    public function load_snippet($snippet) {
        $snippet_file = locate_template("inc/{$snippet}.php");
        if (!file_exists($snippet_file)) {
            throw new Exception("Snippet file not found: inc/{$snippet}.php");
        }
        require $snippet_file;
        $snippet_class = 'Snippet\\' . str_replace(' ', '_', ucwords(str_replace('-', ' ', $snippet)));
        $snippets[$snippet] = new $snippet_class;
    }
}

new Snippet_Loader();
