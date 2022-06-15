<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="overlay"onclick="if(overlay.classList.contains('open')) {expandNavbar();}" ></div>
    <nav id="nav" class="navbar sticky-top" aria-expanded="false">
        <div class="container-fluid mx-3">
            <div>
                <p class="fw-bold pe-auto mb-0" role="button" onclick="expandNavbar();">
                    <i class="bi-chevron-right"></i><span class="mx-1 d-none d-md-inline">Menu</span>
                </p>
            </div>
            <a id="logo" class="my-2" href="<?php echo get_home_url(); ?>">
                <?php echo get_logo("", true); ?>
            </a>
            <div class="flip-box d-none d-md-block">
                <div class="front">
                    <?php get_search_form(); ?>
                </div>
                <div class="back">
                    <a class="logo--side" href="<?php echo get_home_url(); ?>"><?php echo get_logo("", true); ?></a>
                </div>
            </div>
            <div class="text-end d-inline d-md-none">
                <a href="<?php echo get_home_url() . "?s"; ?>"><i class="bi-search mx-1"></i></a>
            </div>
        </div>

        <!-- navbar expansion -->
        <div class="collapse w-100 top-100" id="navbar-expanded">
            <div class="p-4">
                <div class="row">
                    <div class="col-md-2 col-12 fs-1">
                        <p class="fw-bold hover-underline-animation"><a class="link-container .fs-1text" href="<?php get_home_url() ?>">Anime</a></p><br>
                        <p class="fw-bold hover-underline-animation"><a class="link-container .fs-1text" href="<?php get_home_url() ?>">Tech</a></p><br>
                        <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Games</a></p><br>
                        <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Zine</a></p><br>
                    </div>
                    <div class="col-md-2 col-12 fs-1">
                        <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Podcast</a></p><br>
                        <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Shop</a></p><br>
                        <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">Instagram</a></p><br>
                        <p class="fw-bold hover-underline-animation"><a class="link-container" href="<?php get_home_url() ?>">About Us</a></p><br>
                    </div>
                    <div class="col-8 d-none d-md-inline position-relative ">
                        <p class="fs-6 fw-bold position-absolute bottom-0 right-0" style="right: 0"> For all things anime, tech and games </p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="menu-secondary menu-secondary--default justify-content-between w-50 mx-auto fw-bold d-none d-md-flex">
        <a href=""><p class="hover-underline-animation-sm">Anime</p></a>
        <a href=""><p class="hover-underline-animation-sm">Tech</p></a>
        <a href=""><p class="hover-underline-animation-sm">Games</p></a>
        <a href=""><p class="hover-underline-animation-sm">Zine</p></a>
    </div>