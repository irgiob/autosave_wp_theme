<?php
/*
Content List Template
This template is used to display a list of article cards across various pages

Arguments:
    • query: Wordpress Query object of the posts to display
    • list-title: title of the list (optional if hide title is true)
    • list-link: a link the title leads to (optional)
    • hide-title (optional): boolean value that if true hides the list title
    • hide-spotlight-dekstop (optional): hides desktop spotlight section
    • hide-spotlight-mobile (optional): hides mobile spotlight section
    • hide-last-post (optional): hides last post on desktop for certain situations
    • hide-sub-title (optional): hides "Lastest Post" title on mobile
*/

// this variable with create a long post if there are more than 8 posts on the page
$show_long_post = $args['query']->post_count > 8; ?>
<div class="content-list mx-0 m-md-5 mb-3 mb-md-0">

    <!-- Title Section -->
    <?php if (!$args['hide-title']): ?>
        <div class="right-arrow-extension--header">
            <a href="<?php echo $args['list-link']; ?>">
                <h1 class="hover-underline-animation">
                    <?php echo $args['list-title']; ?>
                </h1>
            </a>
        </div>
    <?php endif; ?>
    <div class="d-flex flex-column-reverse flex-md-column">

        <!-- Main List of Articles Section -->
        <div class="content-list--articles row my-2 mb-md-5 mx-1 mx-md-0">
            
            <?php if ($show_long_post): ?><div class="col-md-9 row"><?php endif; ?>
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
                            'rating' => get_field('rating')
                        ];
                    ?>
                    <a class="col-6 <?php 
                        // changes column width depending on if theres a long post
                        echo ($show_long_post) ? "col-md-4 " : "col-md-3 ";
                        
                        // adds special display logic for first and last cards
                        if ($count == 1) echo "d-none d-md-block"; 
                        else if ($count == $args['query']->post_count && ($args['hide-last-post'] || $show_long_post)) 
                            echo "d-block d-md-none"; 
                        
                        $count += 1;
                    ?>" href="<?php the_permalink(); ?>">
                        <div class="card">
                            <div class="card-img overflow-hidden">
                                <img src="<?php 
                                    echo (get_the_post_thumbnail_url()) 
                                        ? get_the_post_thumbnail_url('','thumbnail-landscape') 
                                        : "//via.placeholder.com/800x600/"
                                        .substr(constant('primary_color'),1)
                                        ."?text='".get_the_title()."'"; 
                                ?>"">
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
                <?php endwhile;?>

            <?php 
                // create long post if correct number of pages for it
                if ($show_long_post): ?>
            </div>
            <div class="col-md-3">
                <div class="card mt-2 mb-3 d-none d-md-block" style="aspect-ratio: unset; height: calc(100% - 0.5em);">
                    <div class="card-img overflow-hidden">
                        <img src="<?php 
                            echo (get_the_post_thumbnail_url()) 
                                ? get_the_post_thumbnail_url('','thumbnail-landscape') 
                                : "//via.placeholder.com/800x600/"
                                .substr(constant('primary_color'),1)
                                ."?text='".get_the_title()."'"; 
                        ?>">
                    </div>
                    <div class="card-img-overlay">
                        <p class="text-start"><?php the_title(); ?></p>
                    </div>
                    <?php if (get_field('rating')): ?>
                        <div class="card-score-badge"><p><?php the_field('rating'); ?></p></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <?php if (!$args['hide-sub-title'] && $count > 2): ?>
            <p class="d-block d-md-none">Latest Posts</p>
        <?php endif; ?>

        <!-- Spotlight Article Section DESKTOP (shows spotlight post with excerpt on desktop only) -->
        <?php if (!$args['hide-spotlight-desktop']): ?>
            <div class="content-list--spotlight my-0 mx-0 row d-none d-md-flex">
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
        <?php endif; ?>

        <!-- Spotlight Article Section MOBILE (shows spotlight post as card on mobile only)-->
        <?php if (!$args['hide-spotlight-mobile']): ?>
            <a href="<?php echo $first_post['permalink']; ?>">
                <div class="content-list--spotlight card d-block d-md-none">
                    <div class="card-img overflow-hidden">
                        <img src="<?php 
                            echo ($first_post['thumbnail-landscape']) 
                                ? $first_post['thumbnail-landscape'] 
                                : "//via.placeholder.com/800x600/"
                                  .substr(constant('primary_color'),1)
                                  ."?text=".$first_post['title']; 
                        ?>">
                    </div>
                    <div class="card-img-overlay">
                        <p class="text-start"><?php echo $first_post['title']; ?></p>
                    </div>
                    <?php if ($first_post['rating']): ?>
                        <div class="card-score-badge"><p><?php echo $first_post['rating']; ?></p></div>
                    <?php endif; ?>
                </div>
            </a>
        <?php endif; ?>
    </div>
</div>