
// angle de rotation de la petite fleche en haut à droite
let angle = 0

// fonction qui permet d'afficher le panier de droite, tourner la fleche, flouter le fond, et rendre le panier scrollable
function showPanier() {
    let volet = document.getElementById("panierVolet");
    volet.style.right = 0;
    volet.style.overflow = "scroll";
    let fleche = document.getElementById("voletFlecheImage");
    fleche.style.transition = "0.5s ease-in-out"
    angle += 180
    fleche.style.transform = `rotate(${angle}deg)`;
    let flechediv = document.getElementById("voletFleche");
    flechediv.style.right = "400px";
    let hider = document.getElementById("hider");
    hider.style.display = "block";
    let blurring = document.getElementsByClassName("blur")
    for (elem in blurring) {
        blurring[elem].style.filter = "blur(0.5px)"
    }

}

// fonction qui permet de cacher le panier de droite, tourner la fleche, enlever le flou 
function closePanier() {
    let volet = document.getElementById("panierVolet");
    volet.style.right = "-400px";
    let fleche = document.getElementById("voletFlecheImage");
    angle += 180
    fleche.style.right = "0";
    fleche.style.transform = `rotate(${angle}deg)`;
    let flechediv = document.getElementById("voletFleche");
    flechediv.style.right = "0";
    let hider = document.getElementById("hider");
    hider.style.display = "none";
    let blurring = document.getElementsByClassName("blur")
    for (elem in blurring) {
        blurring[elem].style.filter = "none"
    }
}

// fonction qui affiche ou cache le panier lors du clic sur la flêche
function flechePanier() {
    let volet = document.getElementById("panierVolet");
    if (volet.style.right == '0px') {
        closePanier()
    }
    else {
        showPanier()
    }
}