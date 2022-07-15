<?php
/**
 * postlist.php
 * 
 * template used to display a general list of post cards if no specific list is available
 *
 * Arguments:
 *    • query: Wordpress Query object of the posts to display
 *    • list-title: title of the list (optional if hide title is true)
 *    • list-link: a link the title leads to (optional)
 *    • hide-title (optional): boolean value that if true hides the list title
 *    • hide-spotlight-dekstop (optional): hides desktop spotlight section
 *    • hide-spotlight-mobile (optional): hides mobile spotlight section
 *    • hide-last-post (optional): hides last post on desktop for certain situations
 *    • hide-sub-title (optional): hides "Lastest Post" title on mobile
 */

// this variable with create a long post if there are more than 8 posts on the page
$show_long_post = $args['query']->post_count > 8; ?>
<div class="postlist mx-0 m-md-5 mb-3 mb-md-0">

    <!-- Title Section -->
    <?php if (!$args['hide-title']): ?>
        <a href="<?php echo $args['list-link']; ?>">
        <div class="right-arrow-extension--header d-inline-block ms-2">
                <h1 class="hover-underline-animation fw-bold">
                    <?php echo $args['list-title']; ?>
                </h1>
        </div>
        </a>
    <?php endif; ?>
    <div class="d-flex flex-column-reverse flex-md-column">

        <!-- Main List of Posts Section -->
        <div class="postlist--posts row my-2 mb-md-5 mx-1 mx-md-0">
            <?php if ($show_long_post): ?>
                <div class="col-md-3 d-none d-md-block">
                    <a href="<?php the_permalink(); ?>">
                        <?php get_template_part('template-parts/listitem', get_the_category()[0]->slug, [
                            'card-classes' => 'card--long mt-2 mb-3',
                            'title' => get_the_title(),
                            'thumbnail' => get_the_post_thumbnail_url('','thumbnail-landscape'),
                            'rating' => get_field('rating'),
                            'spotify-uri' => get_field('spotify_episode_uri'),
                        ]) ?>
                    </a>
                </div>
            <?php endif; ?>
            
            <?php if ($show_long_post): ?><div class="col-12 col-md-9 row with-long-post"><?php endif; ?>
                <?php $count = 1; while($args['query']->have_posts()): ?>
                    <?php 
                        // saves the first post of the query for future use
                        $args['query']->the_post(); 
                        if ($count == 1) $first_post = [
                            'title' => get_the_title(),
                            'author' => get_the_author(),
                            'thumbnail-portrait' => get_the_post_thumbnail_url('','thumbnail-portrait'),
                            'thumbnail-landscape' => get_the_post_thumbnail_url('','thumbnail-landscape'),
                            'excerpt' => get_the_excerpt(),
                            'permalink' => get_the_permalink(),
                            'rating' => get_field('rating'),
                            'category' => get_the_category()[0]->slug,
                        ];

                        // calculate extra classes for next list of cards
                        $extra_classes = "col-6 ";

                        // changes column width depending on if theres a long post
                        $extra_classes .= ($show_long_post) ? "col-md-4 " : "col-md-3 ";
                        
                        // adds special display logic for first and last cards
                        if ($count == 1) {
                            $extra_classes .= "d-none "; 
                            if (!$show_long_post) $extra_classes .= "d-md-block ";
                        }
                        else if ($count == $args['query']->post_count && $args['hide-last-post']) 
                            $extra_classes .= "d-block d-md-none "; 
                        $count += 1;
                    ?>
                    <a class="<?php echo $extra_classes;?>" href="<?php the_permalink(); ?>">
                        <?php get_template_part('template-parts/listitem', get_the_category()[0]->slug, [
                            'title' => get_the_title(),
                            'thumbnail' => get_the_post_thumbnail_url('','thumbnail-landscape') ,
                            'rating' => get_field('rating'),
                            'hide-overlay-on-mobile' => true,
                            'spotify-uri' => get_field('spotify_episode_uri'),
                        ]) ?>
                        <p class="d-md-none"><?php the_title(); ?></p>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php if ($show_long_post): ?></div><? endif; ?>
        </div>
        <?php if (!$args['hide-sub-title'] && $count > 2): ?>
            <p class="d-block d-md-none fw-bold">Latest Posts</p>
        <?php endif; ?>

        <!-- Spotlight Post Section DESKTOP (shows spotlight post with excerpt on desktop only) -->
        <?php if (!$args['hide-spotlight-desktop']): ?>
            <div class="postlist--spotlight my-0 ms-1 row d-none d-md-flex">
                <div class="col-12 col-md-5">
                    <h1 class="fw-bold"><?php echo $first_post['title']; ?></h1>
                    <p>By <?php echo $first_post['author']; ?></p>
                </div>
                <div class="col-12 col-md-5">
                    <p><?php echo $first_post['excerpt']; ?></p>
                    <a class="read-more-button right-arrow-extension float-end" href="<?php echo $first_post['permalink']; ?>">
                        <p class="hover-underline-animation-sm fw-bold">Read More</p>
                    </a>
                </div> 
            </div>
        <?php endif; ?>

        <!-- Spotlight Post Section MOBILE (shows spotlight post as card on mobile only)-->
        <?php if (!$args['hide-spotlight-mobile']): ?>
            <a href="<?php echo $first_post['permalink']; ?>">
                <?php get_template_part('template-parts/listitem', $first_post['category'], [
                    'card-classes' => 'postlist--spotlight d-block d-md-none',
                    'title' => $first_post['title'],
                    'thumbnail' => $first_post['thumbnail-landscape'],
                    'rating' => $first_post['rating'],
                    'spotify-uri' => get_field('spotify_episode_uri'),
                ]) ?>
            </a>
        <?php endif; ?>
    </div>
</div>