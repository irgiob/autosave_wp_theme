// initialize home page carousel banner

let items = document.querySelectorAll('.carousel .carousel-item')

items.forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i = 1; i < minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
            next = items[0]
        }
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})

// function for handling opening and closing of navbar menu

function expandNavbar() {
    const overlay = document.getElementById("overlay");
    var expanded = document.getElementById('nav');
    [...document.querySelectorAll('.collapse')].map(collapseEl => new bootstrap.Collapse(collapseEl));
    //expanded = !(expanded === "true");
    expanded.setAttribute("aria-expanded", (expanded.getAttribute("aria-expanded") === "true") ?  "false" : "true");
    (overlay.classList.contains('open')) ? overlay.classList.remove('open') : overlay.classList.add('open');
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
}

function unpin_secondary_header(target) {
    target.classList.remove("menu-secondary--pinned")
    target.classList.add("menu-secondary--default")
    document.querySelector('#logo').classList.remove("opacity-0")
}

function check_logo_visibility() {
    if (window.getComputedStyle(menu_secondary, null).display == "none") {
        document.querySelector('#logo').classList.remove("opacity-0")
    } else {
        document.querySelector('#logo').classList.add("opacity-0")
    }
}

if (document.body.classList.contains('home')) {
    observer.observe(menu_secondary)
} else {
    pin_secondary_header(menu_secondary)
    menu_secondary.classList.add('position-absolute')
    menu_secondary.style.left = "25%"
    check_logo_visibility()
    window.addEventListener('resize', check_logo_visibility)
}