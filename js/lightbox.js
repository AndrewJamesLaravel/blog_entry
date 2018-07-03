function init() {
    var lightboxElements = "<div id='lightbox'>";
    lightboxElements += "<div id='overlay' class='hidden'></div>";
    lightboxElements += "<img class='hidden' id='big-image' />";
    lightboxElements += "</div>";
    document.querySelector("body").innerHTML += lightboxElements;
    prepareThumbs();
}

function toggle() {
    window.console.log("show or hide a big image");
}

function prepareThumbs() {
    var liElements = document.querySelectorAll("ul#images li");
    var i = 0;
    var image, li;
    //loop through all <li> elements
    while ( i < liElements.length ) {
        li = liElements[i];
        //set class='lightbox'
        li.setAttribute("class", "lightbox");
        image = li.querySelector("img");
        //register a click event handler for the <img> elements
        image.addEventListener("click", toggle, false);
        i += 1;
    }
}

document.addEventListener("DOMContentLoaded", init, false);
