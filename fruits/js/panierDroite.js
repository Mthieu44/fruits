let angle = 0

function showPanier(){
    let volet = document.getElementById("panierVolet");
    volet.style.right = 0;
    let fleche = document.getElementById("voletFlecheImage");
    fleche.style.transition = "0.5s ease-in-out"
    angle += 180
    fleche.style.transform = `rotate(${angle}deg)`;
    let hider = document.getElementById("hider");
    hider.style.display = "block";
    let blurring = document.getElementsByClassName("blur")
    for (elem in blurring){
        blurring[elem].style.filter = "blur(2px)"
    }

}

function closePanier(){
    let volet = document.getElementById("panierVolet");
    volet.style.right = "-20%"; 
    let fleche = document.getElementById("voletFlecheImage");
    angle += 180
    fleche.style.transform = `rotate(${angle}deg)`;
    let hider = document.getElementById("hider");
    hider.style.display = "none";
    let blurring = document.getElementsByClassName("blur")
    for (elem in blurring){
        blurring[elem].style.filter = "none"
    }
}

function flechePanier(){
    let volet = document.getElementById("panierVolet");
    if (volet.style.right == '0px'){
        closePanier()
    }
    else{
        showPanier()
    }
}