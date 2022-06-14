<?php get_header(); ?>
<div class="d-flex justify-content-evenly w-75 mx-auto my-3 fw-bold">
    <p class="hover-underline-animation-sm">Anime</p>
    <p class="hover-underline-animation-sm">Tech</p>
    <p class="hover-underline-animation-sm">Games</p>
    <p class="hover-underline-animation-sm">Zine</p>
</div>

<div id="main-banner" class="carousel slide mb-5" data-bs-interval="false">
    <?php if (!wp_is_mobile()): ?><div class="carousel-inner" role="listbox"><?php endif; ?>
        <?php for($i=1;$i<7;$i++): ?>
            <?php if (!wp_is_mobile()): ?><div class="carousel-item <?php if($i==1){ echo "active";}?>"><?php endif; ?>
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
            <?php if (!wp_is_mobile()): ?></div><?php endif; ?>
        <?php endfor; ?>
    <?php if (!wp_is_mobile()): ?></div><?php endif; ?>
    <a class="carousel-control-prev bg-transparent" href="#main-banner" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next bg-transparent" href="#main-banner" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
</div>
<?php get_footer(); ?>