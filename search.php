<?php 
/**
 * search.php
 * 
 * the page showing results of a search the user made
 */

get_header(); 
?>
<div class="search-page-content">
    <?php
    get_search_form();

    if ($wp_query->have_posts()):
        get_template_part('template-parts/content','list',[
            'hide-title' => true,
            'query' => $wp_query,
            'hide-spotlight-desktop' => true,
        ]);
    else: ?>
        <h1 class="text-center">Nothing Found</h2>
        <p class="text-center">
            Sorry, but nothing matched your search criteria. Please try again with some different keywords.
        </p>
    <?php endif;
    get_template_part('template-parts/pagination');
    ?>
</div>
<?php get_footer(); ?>