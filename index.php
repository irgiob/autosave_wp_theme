<?php
get_header();
get_template_part('template-parts/content','list',[
    'list-title' => wp_get_document_title(),
    'query' => $wp_query,
    'hide-spotlight-desktop' => true,
]);
get_footer();