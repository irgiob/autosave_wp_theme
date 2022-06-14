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

function expandNavbar() {
    const overlay = document.getElementById("overlay");
    var expanded = document.getElementById('nav');
    [...document.querySelectorAll('.collapse')].map(collapseEl => new bootstrap.Collapse(collapseEl));
    //expanded = !(expanded === "true");
    expanded.setAttribute("aria-expanded", (expanded.getAttribute("aria-expanded") === "true") ?  "false" : "true");
    (overlay.classList.contains('open')) ? overlay.classList.remove('open') : overlay.classList.add('open');
}