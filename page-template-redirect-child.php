<?php
/*
Template Name: Redirect: First Child Page
*/

$query = new WP_Query(array(
  'post_type' => 'page',
  'posts_per_page' => 1,
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'post_parent' => get_the_ID(),
));

if ($query->have_posts()) {
  while ($query->have_posts()) {
    $query->the_post();

    header("Location: " . get_permalink());
    exit;
  }
}
