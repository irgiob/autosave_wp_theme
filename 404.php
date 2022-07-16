<?php 
/**
 * 404.php
 * 
 * page that is displayed when user tries to access page that doesn't exist
 */

get_header(); ?>
<div class="not-found-info">
    <h1>404</h1>
    <h2>Page Not Found</h2>
    <p>It looks like the page you're looking for doesn't exist</p>
    <p class="fw-bold">
        <a class="hover-underline-animation-sm" href="<?php echo get_home_url(); ?>">Return to home</a>
    </p>
</div>
<?php get_footer(); ?>