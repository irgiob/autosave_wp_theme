<div class="search-container">
    <form role="search" method="get" class="search-form" action="<?php echo get_home_url(); ?>">
        <i class="bi-search mx-1 position-absolute"></i>
        <input 
            type="search" 
            id="search"
            placeholder="Search..." 
            name="s"
            value="<?php echo get_search_query(); ?>"
        />
        <input type="submit" class="search-submit" hidden />
    </form>
</div>