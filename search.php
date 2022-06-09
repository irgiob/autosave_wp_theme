<?php get_header();

$the_query = new WP_Query(array('s' => get_search_query()));

if ($the_query->have_posts()): ?>
    <h2>Search results for: <?php echo get_query_var('s') ?></h2>
    <?php while($the_query->have_posts()):?>
        <?php $the_query->the_post(); ?>
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile ?>
<?php else: ?>
    <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
    <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
<?php endif ?>

<?php get_footer(); ?>