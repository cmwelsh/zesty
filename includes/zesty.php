<?php

class Zesty {
    protected static $snippets = array();

    public static function enqueue_script($slug, $path) {
        $stylesheet_directory_url = get_stylesheet_directory_uri();
        $script_url = "{$stylesheet_directory_url} /assets/scripts/{$path}.js";
        wp_enqueue_script($slug, $script_url);
    }
    public static function load_snippet($slug, $options = array()) {
        // Check if file exists
        $required = !isset($options['optional']) or !$options['optional'];
        $snippet_file = locate_template("includes/{$slug}.php");
        if (!file_exists($snippet_file)) {
            if ($required) {
                throw new Exception("Snippet file not found: inc/{$slug}.php");
            }
            else {
                return;
            }
        }
        // Load file
        require $snippet_file;
        // Instantiate instance of class
        $snippet_class = 'Snippet\\' . str_replace(' ', '_', ucwords(str_replace('-', ' ', $slug)));
        self::$snippets[$slug] = new $snippet_class;
    }
    public static function snippet($slug) {
        return self::$snippets[$slug];
    }
    public static function query($options = null) {
        $query = new Zesty_Query_Iterator($options);
        return $query;
    }
}

// WordPress post iterator
// thanks to Øystein Riiser Gundersen for the code
// https://gist.github.com/1343203
class Zesty_Post_Iterator implements Iterator {
    protected $index = 0;
    protected $posts;
    protected $original_post;

    public function __construct($posts) {
        $this->original_post = $GLOBALS['post'];
        $this->posts = $posts;
    }

    function rewind() {
        $this->index = 0;
        $this->current();
    }

    function current() {
        if (!isset($this->posts[$this->key()])) {
            return null;
        }

        $current_post = $this->posts[$this->index];
        $GLOBALS['post'] = $current_post;
        setup_postdata($current_post);
        return $current_post;
    }
    
    function key() {
        return $this->index;
    }
    
    function next() {
        $this->index++;
        $valid = isset($this->posts[$this->key()]);     
    }
    
    function valid() {
        $valid = isset($this->posts[$this->key()]);
        if (!$valid) {
            // reset post data
            $GLOBALS['post'] = $this->original_post;
            setup_postdata($this->original_post);
        }
            
        return $valid;
    }
}

class Zesty_Query_Iterator extends Zesty_Post_Iterator implements Countable {
    protected $query;
    
    public function __construct($query_arguments = null) {
        if ($query_arguments === null) {
            $this->query = $GLOBALS['wp_query'];
        }
        else {
            $this->query = new WP_Query($query_arguments);
        }
        parent::__construct($this->query->posts);
    }

    public function count() {
        return $this->query->post_count;
    }

    // act as proxy for WP_Query
    public function __call($method, $arguments) {
        if (method_exists($this->query, $method)) {
            return call_user_func_array(array($this->query, $method), $arguments);
        }
    }
    
    public function __get($property) {
        if (isset($this->query->$property)) {
            return $this->query->$property;
        }
    }
}
