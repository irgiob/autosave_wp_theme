<?php
/**
 * category.php
 * 
 * page that is displayed when accessing category archive pages
 */

get_header();
get_template_part('template-parts/postlist', get_queried_object()->slug, [
    'list-title' => single_cat_title('',false),
    'query' => $wp_query,
]);
get_template_part('template-parts/pagination');
get_footer();