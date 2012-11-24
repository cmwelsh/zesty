<!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <?php // HTML5 support for IE8 and down ?>
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php // replace "no-js" class on <html> with "js" ?>
    <script>document.documentElement.className = document.documentElement.className.replace("no-js","js");</script>

    <?php wp_head(); ?>
</head>
<body data-home-url="<?= home_url() ?>" <?php body_class(); ?>>

<?php
wp_nav_menu(array(
    'theme_location' => 'primary',
    'menu_class' => 'nav-menu',
));
?>
