<?php
get_header();
get_template_part('template-parts/content','list',[
    'list-title' => single_cat_title('',false),
    'query' => $wp_query,
]);
get_template_part('template-parts/pagination');
get_footer();