const smBreakpoint = 767;
const menu_secondary = document.querySelector(".menu-secondary");
const nav = document.getElementById('nav');
var expanded = false;

// initialize home page carousel banner (that pauses on mobile)

const sharedClasses = 'position-absolute top-50 translate-middle text-white display-6 d-none d-md-block';
jQuery('#main-banner').slick({
    slidesToShow: 4,
    //autoplay: true,
    autoplaySpeed: 3000,
    prevArrow: '<i class="bi-chevron-left ' + sharedClasses + '" style="left: 0.75em;"></i>',
    nextArrow: '<i class="bi-chevron-right end-0 ' + sharedClasses + '"></i>',
    responsive: [{
        breakpoint: 768,
        settings: {
            slidesToShow: 1,
        }    
    }]
});

// function for handling opening and closing of navbar menu

function expandNavbar() {
    [...document.querySelectorAll('.collapse')].map(collapseEl => new bootstrap.Collapse(collapseEl));
    nav.setAttribute("aria-expanded", (nav.getAttribute("aria-expanded") === "true") ?  "false" : "true");
    document.getElementById("overlay").classList.toggle('open');
    document.body.classList.toggle('disable-scroll');

    // flip header elements if in stack mode
    var alreadyRun = false;
    if (!expanded) expanded = alreadyRun = true;

    if (menu_secondary.classList.contains("menu-secondary--pinned")) {
        if (nav.getAttribute("aria-expanded") === "true") {
            menu_secondary.classList.add("flipped")
            document.querySelector('.search-flipbox').classList.remove("flipped")
        } else {
            menu_secondary.classList.remove("flipped")
            document.querySelector('.search-flipbox').classList.add("flipped")
        }
    }

    setTimeout(() => {if (expanded && !alreadyRun) expanded = false}, 300);
}

// create correct header for page

const observer = new IntersectionObserver( ([e]) => (e.intersectionRatio < 1 
    && window.getComputedStyle(e.target, null).display !== "none") 
    ? pin_secondary_header(e.target) 
    : unpin_secondary_header(e.target), 
{ threshold: [1] });

function pin_secondary_header(target) {
    if (!expanded) {
        target.classList.remove("menu-secondary--default");
        target.classList.add("menu-secondary--pinned")
        document.querySelector('#logo').classList.add("opacity-0")
        document.querySelector('.search-flipbox').classList.add('flipped')
    }
}

function unpin_secondary_header(target) {
    if (!expanded) {
        target.classList.remove("menu-secondary--pinned")
        target.classList.add("menu-secondary--default")
        document.querySelector('#logo').classList.remove("opacity-0")
        document.querySelector('.search-flipbox').classList.remove('flipped')
    }
}

if (document.body.classList.contains('home')) {
    observer.observe(menu_secondary)
} else {
    pin_secondary_header(menu_secondary)
    menu_secondary.classList.add('position-fixed')
    menu_secondary.style.left = "25%"
}

// toggle dark mode
function toggleDarkMode() {
    if (document.getElementById('dark-mode-switch').checked) {
        document.cookie = 'site-theme=dark;path=/'
        document.body.classList.remove('light')
        document.body.classList.add('dark')
    } else {
        document.cookie = 'site-theme=light;path=/'
        document.body.classList.remove('dark')
        document.body.classList.add('light')
    }

}