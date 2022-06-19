<?php get_header();
while ( have_posts() ) : the_post();?>

<div class="post container px-3 px-lg-5 pt-2 pt-md-5">
    <?php foreach($cats = get_the_category() as $cat): ?>
        <a href="<?php echo get_category_link($cat->cat_ID) ?>">
            <span class="hover-underline-animation-sm">
                <?php echo $cat->name . ($cat !== $cats[array_key_last($cats)] ? ", " : "")?>
            </span>
        </a>
    <?php endforeach; ?>
    <h1><?php the_title(); ?></h1>
    <p>By <?php the_author(); ?></p>
    <div class="py-2">
        <?php the_content(); ?>
    </div>
</div>

<?php endwhile;
get_footer(); ?>