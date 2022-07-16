<?php
/**
 * postlist.php
 * 
 * template used to display a single card for a general post
 *
 * Arguments:
 *    • query: Wordpress Query object of the posts to display
 *    • card-classes: additional classes to add to outer most div of list item card
 *    • title: title of the post
 *    • thumbnail: thumbnail of the post
 *    • rating: rating of the post if the post is a review
 *    • hide-overlay-on-mobile: hides the overlay on mobile
 */
?>

<div class="card <?php echo $args['card-classes'] ?>">
    <div class="card-img overflow-hidden">
        <img src="<?php 
            echo ($args['thumbnail']) 
                ? $args['thumbnail']
                : "//via.placeholder.com/800x600/"
                    .substr(constant('primary_color'),1)
                    ."?text=".$args['title']; 
        ?>">
    </div>
    <div class="card-img-overlay <?php if ($args['hide-overlay-on-mobile']) echo "d-none d-md-block" ?>">
        <p class="text-start"><?php echo $args['title']; ?></p>
    </div>
    <?php if ($args['custom-fields']['rating']): ?>
        <div class="card-score-badge"><p><?php echo $args['custom-fields']['rating']; ?></p></div>
    <?php endif; ?>
</div>