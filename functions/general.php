<?php
// theme supports
add_theme_support( 'title-tag' );
add_theme_support('post-thumbnails');
add_image_size('thumbnail-portrait', 720, 1080, true);
add_image_size('thumbnail-landscape', 600, 400, true);

// add stylesheets and javascript files
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css" );
    wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . "/assets/css/bootstrap-icons/bootstrap-icons.css" );
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_enqueue_script('jquery', get_template_directory_uri() . "/assets/js/vendor/jquery-3.6.0.min.js", NULL, '1.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . "/assets/js/bootstrap.bundle.min.js", NULL, '1.0', true);
    wp_enqueue_script('main', get_template_directory_uri() . "/assets/js/main.js", NULL, '1.0', true);
});

// add theme as body class
add_filter('body_class', function($classes) {
    $classes[] = (isset($_COOKIE['site-theme'])) ? $_COOKIE['site-theme'] : 'light';
    return $classes;
});