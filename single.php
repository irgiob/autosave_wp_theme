<?php get_header();
/**
 * single.php
 * 
 * the page displayed when users access individual post pages
 */

while ( have_posts() ): 
the_post();

if (!has_category('zine')): ?>
    <div class="post container px-3 px-lg-5 pt-2 pt-md-5">

        <?php // for all posts other than zine, print post title, author, and category
        foreach($cats = get_the_category() as $cat): ?>
            <a class="hover-underline-animation-sm fw-bold" href="<?php echo get_category_link($cat->cat_ID) ?>">
                <?php echo $cat->name . ($cat !== $cats[array_key_last($cats)] ? ", " : "")?>
            </a>
        <?php endforeach; ?>
        <h1 class="fw-bold"><?php the_title(); ?></h1>
        <p>By <?php the_author(); ?></p>

        <?php // adds spotify podcast embed if post type is podcast
        if (has_category('podcast') && get_field('spotify_episode_uri')): ?>
            <iframe 
                src="https://open.spotify.com/embed/episode/<?php echo get_field('spotify_episode_uri'); ?>?utm_source=generator" 
                style="border-radius:12px" width="100%" height="232" frameBorder="0" 
                allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
            ></iframe>
        <?php endif; ?>

        <?php // displays post content ?>
        <div class="py-2">
            <?php the_content(); ?>
        </div>
    </div>
<?php 
// if zine, only display content without any formatting
else: 
    the_content(); 
endif;
endwhile;
get_footer(); ?>