<?php get_header(); ?>

<div id="main-banner" class="carousel slide mb-1 mb-md-3 my-md-4" data-bs-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <?php 
        $first_post = true;
        while (have_posts()): ?>
            <?php the_post(); ?>
            <div class="carousel-item <?php if($first_post){ echo "active"; $first_post = false;}?>">
                <div class="col-md-3">
                    <a href="<?php the_permalink(); ?>">
                        <div class="card">
                            <div class="card-img overflow-hidden h-100">
                                <img src="<?php the_post_thumbnail_url('thumbnail-portrait'); ?>">
                            </div>
                            <div class="card-img-overlay">
                                <p><?php the_title(); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    <a class="carousel-control-prev bg-transparent" href="#main-banner" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next bg-transparent" href="#main-banner" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>

<?php 
// for each category get latest posts and display them using the content list template
$categories = get_categories(['orderby' => 'name', 'order' => 'ASC', 'parent' => 0]);
$categories = array_filter($categories, fn($i) => !in_array($i->slug, ["uncategorized", "review", "zine", "podcast"]));
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