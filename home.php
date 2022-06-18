<?php get_header(); ?>
<div id="main-banner" class="carousel slide mb-1 mb-md-3 my-md-4">
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
    $categories = get_categories(['orderby' => 'name', 'order' => 'ASC', 'parent' => 0]);
    $categories = array_filter($categories, function($i){ return $i->slug !== "uncategorized" && $i->slug !== "review"; });
    $n_posts = 5;
    foreach($categories as $category): 
    $query = new WP_Query(array('cat' => $category->cat_ID, 'posts_per_page' => $n_posts));
?>
    <div class="category-block mx-0 m-md-5 mb-3 mb-md-0">
        <div class="right-arrow-extension--header">
            <a href="<?php echo get_home_url() . "/category/" . $category->slug; ?>">
                <h1 class="hover-underline-animation"><?php echo $category->name; ?></h1>
            </a>
        </div>
        <div class="d-flex flex-column-reverse flex-md-column">
            <div class="category-block--articles row my-2 mb-md-5 mx-1 mx-md-0">
                <?php $count = 1; while($query->have_posts()): ?>
                    <?php $query->the_post(); 
                        if ($count == 1) $first_post = [
                            'title' => get_the_title(),
                            'author' => get_the_author(),
                            'thumbnail' => get_the_post_thumbnail_url(),
                            'excerpt' => get_the_excerpt(),
                            'permalink' => get_the_permalink()
                        ];
                    ?>
                    <a class="col-6 col-md-3  <?php 
                        if ($count == 1) echo "d-none d-md-block"; if ($count == $n_posts) echo "d-block d-md-none"; $count += 1;
                    ?>" href="<?php the_permalink(); ?>">
                        <div class="card">
                            <div class="card-img overflow-hidden">
                                <img src="<?php the_post_thumbnail_url(); ?>">
                            </div>
                            <div class="card-img-overlay d-none d-md-block">
                                <p><?php the_title(); ?></p>
                            </div>
                            <?php if (get_field('rating')): ?>
                                <div class="card-score-badge"><p><?php the_field('rating'); ?></p></div>
                            <?php endif; ?>
                        </div>
                        <p class="d-md-none"><?php the_title(); ?></p>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <p class="d-block d-md-none">Latest Posts</p>
            <div class="category-block--spotlight my-0 mx-0 row d-none d-md-flex">
                <div class="col-12 col-md-5">
                    <h1><?php echo $first_post['title']; ?></h1>
                    <p>By <?php echo $first_post['author']; ?></p>
                </div>
                <div class="col-12 col-md-5">
                    <p><?php echo $first_post['excerpt']; ?></p>
                    <a class="read-more-button right-arrow-extension float-end" href="<?php echo $first_post['permalink']; ?>">
                        <p class="hover-underline-animation-sm">Read More</p>
                    </a>
                </div> 
            </div>
            <a href="<?php echo $first_post['permalink']; ?>">
                <div class="category-block--spotlight card d-block d-md-none">
                    <div class="card-img overflow-hidden">
                        <img src="<?php echo $first_post['thumbnail']; ?>">
                    </div>
                    <div class="card-img-overlay">
                        <p class="text-start"><?php echo $first_post['title']; ?></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php endforeach; ?>
<?php get_footer(); ?>