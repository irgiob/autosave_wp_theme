<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<?php 
    $nav_items_all = [
        "Anime" => get_category_link(get_cat_ID('anime')),
        "Tech" => get_category_link(get_cat_ID('technology')),
        "Games" => get_category_link(get_cat_ID('video games')),
        "Zine" => "",
        "Podcast" => "",
    ];
    $nav_items_extra = [
        "Shop" => "",
        "Instagram" => "https://www.instagram.com/autosavemedia/' target='_blank'",
        "About Us" => ""
    ];
    $menu_col_len = 4;
?>

<body <?php body_class(); ?>>
    <div id="overlay"onclick="if(overlay.classList.contains('open')) {expandNavbar();}" ></div>

    <!-- main navbar -->
    <nav id="nav" class="navbar sticky-top" aria-expanded="false">
        <div class="container-fluid mx-3">
            <div>
                <p class="fw-bold pe-auto mb-0" role="button" onclick="expandNavbar();">
                    <i class="bi-chevron-right"></i><span class="mx-1 d-none d-md-inline">Menu</span>
                </p>
            </div>
            <a id="logo" class="hover-logo-animation my-2" href="<?php echo get_home_url(); ?>">
                <?php echo get_logo("", true); ?>
            </a>
            <div class="search-flipbox d-none d-md-block">
                <div class="front">
                    <?php get_search_form(); ?>
                </div>
                <div class="back">
                    <a class="hover-logo-animation d-block" href="<?php echo get_home_url(); ?>">
                        <?php echo get_logo("", true); ?>
                    </a>
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
                    <?php $index = 0;
                    foreach(array_merge($nav_items_all, $nav_items_extra) as $title => $link): ?>
                        <?php if ($index % $menu_col_len == 0): ?><div class="col-md-2 col-12 fs-1"><? endif; ?>
                            <a <?php if ($link) echo "href='$link'"; ?>>
                                <p class="fw-bold hover-underline-animation"><?php echo $title; ?></p></br>
                            </a>
                        <?php if ($index % $menu_col_len == $menu_col_len - 1): ?></div><? endif; 
                        $index++; ?>
                    <? endforeach; ?>
                    <div class="col-md-8 col-12 d-flex flex-column text-end justify-content-between fw-bold">
                        <div class="form-check form-switch mb-0">
                            <input 
                                class="form-check-input float-none" 
                                type="checkbox" 
                                id="dark-mode-switch"
                                <?php if (isset($_COOKIE['site-theme']) && $_COOKIE['site-theme'] === "dark") echo "checked"; ?>
                                onchange="toggleDarkMode();"
                            >
                            <label class="form-check-label ms-1" for="dark-mode-switch"><p>Dark Mode</p></label>
                        </div>
                        <p class="fs-6 mb-0 mb-md-3"> For all things anime, tech and games </p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- secondary menu that collapses onto the main header menu-->
    <div class="menu-secondary menu-secondary--default w-50 mx-auto d-none d-md-block">
        <div class="front d-flex justify-content-between fw-bold ">
            <?php foreach($nav_items_all as $title => $link): ?>
                <a <?php if ($link) echo "href='$link'"; ?>>
                    <p class="hover-underline-animation-sm"><?php echo $title; ?></p>
                </a>
            <?php endforeach; ?>
        </div>
        <div class="back mx-auto start-0 end-0">
            <a class="hover-logo-animation" href="<?php echo get_home_url(); ?>">
                <?php echo get_logo("", true); ?>
            </a>
        </div>
    </div>