<?php get_header(); ?>
<div id="main-banner" class="carousel slide mb-3 my-md-4">
    <div class="carousel-inner" role="listbox">
        <?php for($i=1;$i<7;$i++): ?>
            <div class="carousel-item <?php if($i==1){ echo "active";}?>">
                <div class="col-md-3">
                    <a href="">
                        <div class="card">
                            <div class="card-img overflow-hidden h-100">
                                <img src="//via.placeholder.com/720x1280/<?php printf( "%06X\n", mt_rand( 0, 0xFFFFFF )); ?>?text=<?php echo $i;?>">
                            </div>
                            <div class="card-img-overlay">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vehicula.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        <?php endfor; ?>
    </div>
    <a class="carousel-control-prev bg-transparent" href="#main-banner" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next bg-transparent" href="#main-banner" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>

<div class="category-block mx-0 m-md-5">
    <div class="right-arrow-extension--header">
        <a href=""><h1 class="hover-underline-animation">Game Review</h1></a>
    </div>
    <div class="d-flex flex-column-reverse flex-md-column">
        <div class="category-block--articles row my-2 mb-md-5 mx-0">
            <?php for($i=1;$i<5;$i++): ?>
            <a class="col-6 col-md-3" href="">
                <div class="card">
                    <div class="card-img overflow-hidden">
                        <img src="//via.placeholder.com/960x500/<?php printf( "%06X\n", mt_rand( 0, 0xFFFFFF )); ?>?text=<?php echo $i;?>">
                    </div>
                    <div class="card-img-overlay d-none d-md-block">
                        <p>Lorem ipsum dolor sit, consectetur adipis elit.</p>
                    </div>
                </div>
                <p class="d-md-none">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </a>
            <?php endfor; ?>
        </div>
        <div class="category-block--spotlight my-0 mx-0 row d-none d-md-flex">
            <div class="col-12 col-md-5">
                <h1>Lorem ipsum dolor sit, consectetur adipis elit.</h1>
                <p>By John Smith</p>
            </div>
            <div class="col-12 col-md-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vitae velit gravida, aliquet erat eget, dignissim sem. Aenean id vestibulum augue. Curabitur metus mi, sagittis sit amet eros ut, tempor placerat odio. Nulla commodo, ipsum quis scelerisque facilisis, orci purus finibus orci, eu interdum elit est sed lacus. Proin gravida, risus sit amet euismod fermentum.</p>
                <a href=""><p class="read-more-button right-arrow-extension">Read More</p></a>
            </div> 
        </div>
        <div class="category-block--spotlight card d-block d-md-none">
            <div class="card-img overflow-hidden">
                <img src="//via.placeholder.com/660x500/<?php printf( "%06X\n", mt_rand( 0, 0xFFFFFF )); ?>?text=1">
            </div>
            <div class="card-img-overlay">
                <p class="text-start">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>