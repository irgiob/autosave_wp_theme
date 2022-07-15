<?php 
/**
 * home.php
 * 
 * page that is displayed when users go to the root url of the site
 */

get_header(); 
?>

<div id="main-banner" class="mb-3 my-0 my-md-4">
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
                    <p class="mx-3 fs-4"><?php the_title(); ?></p>
                </div>
            </div>
        </a>
    <?php endwhile; wp_reset_postdata(); ?>
</div>

<?php 
// for each category get latest posts and display them using the content list template
$n_posts = 5;
$categories = [/*'zine',*/ 'anime', 'technology', 'video games'];
foreach($categories as $cat_slug) {
    $category = get_category_by_slug($cat_slug);
    $query = new WP_Query(array('cat' => $category->cat_ID, 'posts_per_page' => $n_posts));
    get_template_part('template-parts/postlist', $cat_slug, [
        'list-title' => $category->name,
        'list-link' => get_category_link($category->cat_ID),
        'query' => $query,
        'hide-last-post' => true
    ]);
}

get_footer(); ?>