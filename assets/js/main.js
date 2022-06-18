const smBreakpoint = 767;

// initialize home page carousel banner (that pauses on mobile)

document.querySelectorAll('.carousel .carousel-item').forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i = 1; i < minPerSlide; i++) {
        if (!next) next = document.querySelectorAll('.carousel .carousel-item')[0]
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})

var carousel = new bootstrap.Carousel(document.querySelector('#main-banner'))
function pauseCarouselOnMobile() {
    if (window.innerWidth <= smBreakpoint) {
        carousel.pause()
    } else {
        carousel.cycle()
    }
}
pauseCarouselOnMobile()
window.addEventListener('resize', pauseCarouselOnMobile)

// function for handling opening and closing of navbar menu

function expandNavbar() {
    var expanded = document.getElementById('nav');
    [...document.querySelectorAll('.collapse')].map(collapseEl => new bootstrap.Collapse(collapseEl));
    expanded.setAttribute("aria-expanded", (expanded.getAttribute("aria-expanded") === "true") ?  "false" : "true");
    document.getElementById("overlay").classList.toggle('open');
    document.body.classList.toggle('disable-scroll');
}

// create correct header for page

const menu_secondary = document.querySelector(".menu-secondary")

const observer = new IntersectionObserver( ([e]) => (e.intersectionRatio < 1 
    && window.getComputedStyle(e.target, null).display !== "none") 
    ? pin_secondary_header(e.target) 
    : unpin_secondary_header(e.target), 
{ threshold: [1] });

function pin_secondary_header(target) {
    target.classList.remove("menu-secondary--default");
    target.classList.add("menu-secondary--pinned")
    document.querySelector('#logo').classList.add("opacity-0")
    document.querySelector('.flip-box').classList.add('flipped')
}

function unpin_secondary_header(target) {
    target.classList.remove("menu-secondary--pinned")
    target.classList.add("menu-secondary--default")
    document.querySelector('#logo').classList.remove("opacity-0")
    document.querySelector('.flip-box').classList.remove('flipped')
}

function handleSizeChange() {
    if (window.getComputedStyle(menu_secondary, null).display == "none") {
        document.querySelector('#logo').classList.remove("opacity-0")
        document.querySelector('.flip-box').classList.remove('flipped')
    } else {
        document.querySelector('#logo').classList.add("opacity-0")
        document.querySelector('.flip-box').classList.add('flipped')
    }
}

if (document.body.classList.contains('home')) {
    observer.observe(menu_secondary)
} else {
    pin_secondary_header(menu_secondary)
    menu_secondary.classList.add('position-fixed')
    menu_secondary.style.left = "25%"
}

handleSizeChange()
window.addEventListener('resize', handleSizeChange)