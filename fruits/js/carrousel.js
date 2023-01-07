let slideIndex = 1;
showSlides(slideIndex);

let timer = 0;
setInterval(autoSlides, 100);

function autoSlides() {
    if (timer > 100) {
        plusSlides(1)
    } else {
        timer += 1;
    }
}

// Next/previous controls
function plusSlides(n) {
    showSlides(slideIndex += n);
    timer = 0;
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("sliderinside");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
} 