<?php get_header(); ?>

<div id="main-banner">
    <?php
    $first_post = true;
    while (have_posts()):
        the_post(); ?>
        <a href="<?php the_permalink(); ?>">
            <div class="card">
                <div class="card-img overflow-hidden h-100">
                    <img src="<?php the_post_thumbnail_url('thumbnail-portrait'); ?>">
                </div>
                <div class="card-img-overlay">
                    <p class="mx-2"><?php the_title(); ?></p>
                </div>
            </div>
        </a>
    <?php endwhile; wp_reset_postdata(); ?>
</div>

<?php 
// for each category get latest posts and display them using the content list template
$categories = get_categories(['orderby' => 'name', 'order' => 'ASC', 'parent' => 0]);
$categories = array_filter($categories, fn($i) => !in_array($i->slug, ["uncategorized", "review", "zine"]));
$n_posts = 5;
foreach($categories as $category) {
    $query = new WP_Query(array('cat' => $category->cat_ID, 'posts_per_page' => $n_posts));
    get_template_part('template-parts/content','list',[
        'list-title' => $category->name,
        'list-link' => get_category_link($category->cat_ID),
        'query' => $query,
        'hide-last-post' => true
    ]);
}

get_footer(); ?>