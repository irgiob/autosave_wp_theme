<?php get_header(); 
get_search_form();

if ($wp_query->have_posts()):
    get_template_part('template-parts/content','list',[
        'hide-title' => true,
        'query' => $wp_query,
        'hide-spotlight-desktop' => true,
    ]);
else: ?>
    <h1>Nothing Found</h2>
    <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
<?php endif;
get_template_part('template-parts/pagination');
?>

<?php get_footer(); ?>