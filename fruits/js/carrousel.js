//initialisation du carousel
let slideIndex = 1;
showSlides(slideIndex);


// permet de faire tourner le carousel automatiquement toutes les 15 secondes
let timer = 0;
setInterval(autoSlides, 150);

function autoSlides() {
    if (timer > 100) {
        plusSlides(1)
    } else {
        timer += 1;
    }
}

// fonction qui permet de naviguer dans le carousel
function plusSlides(n) {
    showSlides(slideIndex += n);
    timer = 0;
}

//fonction pour afficher la bonne image dans le carousel
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