<?php
// Facebook Open Graph Tags
// https://developers.facebook.com/docs/opengraphprotocol/
?>
<?php if (get_option('facebook_open_graph_image')) : ?>
  <meta property="og:image" content="http://example.com/image.png">
<?php endif; ?>
<meta property="og:site_name" content="<?= get_bloginfo('name') ?>">
