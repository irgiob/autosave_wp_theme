<?php
/**
 * general.php
 * runs general function that add functionality across entire site
 */

// define constants for primary color and required plugins

define("primary_color", "#8A73F9");
define("required_plugins", [
    ["name" => "Advanced Custom Fields", "slug" => "advanced-custom-fields", "file" => "acf"],
    ["name" => "Crop Thumbnails", "slug" => "crop-thumbnails"],
    ["name" => "Require Featured Image", "slug" => "require-featured-image"],
    ["name" => "Require Post Category", "slug" => "require-post-category"]
]);

// general actions

add_theme_support( 'title-tag' );
add_theme_support('post-thumbnails');
remove_action( 'wp_head', 'wp_generator' );

// add custom thumbnail sizes

add_image_size('thumbnail-portrait', 720, 1080, true);
add_image_size('thumbnail-landscape', 600, 400, true);

// add stylesheets and javascript files

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/assets/css/bootstrap.min.css" );
    wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . "/assets/css/bootstrap-icons.css" );
    wp_enqueue_style( 'slick', get_template_directory_uri() . "/assets/css/slick.css" );
    wp_enqueue_style( 'style', get_stylesheet_uri() );

    wp_enqueue_script('jquery', get_template_directory_uri() . "/assets/js/vendor/jquery-3.6.0.min.js", NULL, '1.0', true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . "/assets/js/bootstrap.bundle.min.js", NULL, '1.0', true);
    wp_enqueue_script('slick', get_template_directory_uri() . "/assets/js/slick.min.js", ['jquery'], '1.0', true);
    wp_enqueue_script('main', get_template_directory_uri() . "/assets/js/main.js", ['jquery'], '1.0', true);
});

// add theme as body class

add_filter('body_class', function($classes) {
    $classes[] = (isset($_COOKIE['site-theme'])) ? $_COOKIE['site-theme'] : 'light';
    return $classes;
});

// add mandatory categories if not already added

function add_categories() {
    $categories = [
        'Anime',
        'Review',
        'Technology',
        'Video Games',
        'Zine',
        'Podcast'
    ];
    foreach($categories as $category)
        if(!term_exists( $category, 'category'))
            wp_insert_term($category, 'category', ['slug' => sanitize_title($category)]);
}
add_action( 'after_switch_theme', 'add_categories' );