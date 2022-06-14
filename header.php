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

            <!-- navbar logo -->
            <a id="logo" class="my-2" href="<?php echo get_home_url(); ?>">
                <svg viewBox="0 0 430 90" xmlns="http://www.w3.org/2000/svg" xmlns:undefined="http://www.inkscape.org/namespaces/inkscape" xml:space="preserve" version="1.1">
                    <g transform="matrix(1 0 0 -1 -20 120)">
                        <g id="logo_short_out">
                            <path d="m79.7117,41.2061l7.57,0l-21.216,65.89l-15.702,0l-21.307,-65.89l7.665,0l5.72,17.944l0.007,0.022l2.496,7.829l0.026,0l3.405,10.572l8.718,27.372l2.151,0l10.093,-31.4l-0.007,0l4.594,-14.395l5.787,-17.944z" />
                        </g>
                        <g id="logo_short_in">
                            <path d="m51.5506,65.7178l2.433,0c1.471,0 2.663,1.193 2.663,2.664l0,12.94l7.425,0l0,-13.275c0,-1.286 -1.042,-2.329 -2.328,-2.329l-2.293,0c-1.548,0 -2.804,-1.255 -2.804,-2.804l0,-12.8l-7.425,0l0,13.276c0,1.286 1.043,2.328 2.329,2.328" />
                        </g>
                        <g id="logo_u">
                            <path d="m131.8748,67.001l0,20.653l7.573,0l0,-46.448l-7.573,0l0,8.037l1.216,5.328l-2.151,0c-1.866,-8.41 -7.756,-14.299 -17.849,-14.299c-10.56,0 -17.382,6.076 -17.382,18.973l0,28.409l7.662,0l0,-27.382c0,-9.717 3.739,-13.457 11.776,-13.457c9.812,0 16.728,7.756 16.728,20.186" />
                        </g>
                        <g id="logo_t">
                            <path d="m181.7957,47.75l0,-6.544l-17.572,-0.935c-4.392,-0.277 -6.353,2.056 -6.353,6.358l0,34.485l-10.283,0l0,6.54l10.283,0l0,11.963l7.57,2.337l0,-14.3l14.485,0l0,-6.54l-14.485,0l0,-34.394l16.355,1.03z" />
                        </g>
                        <g id="logo_o">
                            <path d="m212.6443,46.8154c10.933,0 16.823,7.942 16.823,17.662c0,9.626 -5.89,17.572 -16.823,17.572c-11.028,0 -16.918,-7.946 -16.918,-17.572c0,-9.72 5.89,-17.662 16.918,-17.662m0,41.774c14.767,0 24.393,-10.652 24.393,-24.112c0,-13.551 -9.626,-24.206 -24.393,-24.206c-14.862,0 -24.579,10.655 -24.579,24.206c0,13.46 9.717,24.112 24.579,24.112" />
                        </g>
                        <g id="logo_s">
                            <path d="m266.11801,40.2715c-15.048,0 -21.216,7.011 -21.216,18.039l7.665,0c0,-8.037 4.674,-11.776 13.646,-11.776c7.193,0 10.56,1.683 10.56,6.448c0,6.076 -6.262,7.102 -13.832,9.439c-8.786,2.805 -15.888,5.514 -15.888,13.924c0,7.384 6.262,12.244 16.915,12.244c14.485,0 18.878,-7.943 18.878,-15.607l-7.662,0c0,6.262 -3.834,9.344 -11.216,9.344c-5.139,0 -9.25,-1.493 -9.25,-5.7c0,-4.484 3.176,-5.886 10.651,-8.318c9.158,-2.991 19.065,-5.047 19.065,-15.045c0,-7.011 -4.389,-12.992 -18.316,-12.992" />
                        </g>
                        <g id="logo_a">
                            <path d="m307.99789,46.8154c10.561,0 17.29,7.288 17.29,16.914l-17.198,-1.774c-5.887,-0.563 -8.877,-2.338 -8.877,-6.917c0,-5.327 3.362,-8.223 8.785,-8.223m-1.216,20.839l18.506,1.778c-0.467,8.505 -5.05,12.708 -13.087,12.708c-6.726,0 -12.988,-2.991 -12.988,-11.776l-7.479,0c0,9.629 7.292,18.225 20.467,18.225c12.992,0 20.748,-8.596 20.748,-21.026l0,-19.813l6.825,0l0,-6.544l-8.227,0c-3.549,0 -5.514,1.964 -5.514,5.422l0,2.524l1.216,4.86l-2.242,0c-1.779,-7.106 -6.73,-13.741 -17.944,-13.741c-13.46,0 -15.515,8.972 -15.515,13.832c0,7.384 4.392,12.431 15.234,13.551" />
                        </g>
                        <g id="logo_v">
                            <path d="m386.32791,87.6543l-15.14,-46.448l-15.515,0l-15.325,46.448l7.474,0l14.486,-44.297l2.246,0l14.39,44.297l7.384,0z" />
                        </g>
                        <g id="logo_e">
                            <path d="m428.20779,68.7754c0,7.479 -4.951,13.365 -14.204,13.365c-9.158,0 -15.049,-5.886 -15.049,-13.365l29.253,0zm-14.204,19.814c13.083,0 21.683,-8.318 21.683,-22.615l0,-2.99l-36.732,0c0.468,-8.786 4.675,-16.355 16.17,-16.355c7.664,0 12.802,3.735 14.485,10.841l7.665,0c-1.778,-7.197 -7.383,-17.199 -22.15,-17.199c-16.637,0 -23.645,11.404 -23.645,24.769c0,14.953 9.345,23.549 22.524,23.549" />
                        </g>
                    </g>
                </svg>
            </a>
            <?php get_search_form(); ?>
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