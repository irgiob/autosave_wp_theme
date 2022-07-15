<?php
/**
 * index.php
 * 
 * default page when there is no template defined for the page the user is trying to access
 */

get_header();
get_template_part('template-parts/postlist', get_queried_object()->slug, [
    'list-title' => wp_get_document_title(),
    'query' => $wp_query,
    'hide-spotlight-desktop' => true,
]);
get_template_part('template-parts/pagination');
get_footer();