var url = "http://srv-infoweb.iut-nantes.univ-nantes.prive/~E216351P/fruits/"

function totalQuantity(n,id){
    let totalQuantity = document.getElementById("totalQuantity".concat(id));
    let totalQuantityValue = parseInt(totalQuantity.innerHTML);
    totalQuantity.innerHTML = totalQuantityValue + n;

    if (totalQuantity.innerHTML < 0){
        totalQuantity.innerHTML = 0;
    }
    modifyQuantity(id,totalQuantity.innerHTML);
}

function modifyQuantity(id,quantity){
    let data = new FormData();
    data.append("id",id);
    data.append("quantity",quantity);
    data.append("tab", "fauxPanier");

    let xhr = new XMLHttpRequest();
    xhr.open("POST",url.concat("index.php/boutique/addToPanier"),true);
    xhr.responseType = "json";

    xhr.send(data);

}

function addPanier(id){
    let nbElementPanier = document.getElementById("quantityPanier");
    let nbElementValue = 0
    if (nbElementPanier != null){
        nbElementValue = parseInt(nbElementPanier.innerHTML);
    }

    let totalQuantity = document.getElementById("totalQuantity".concat(id));
    let totalQuantityValue = parseInt(totalQuantity.innerHTML);

    let data = new FormData();
    data.append("id",id);
    data.append("quantity",totalQuantityValue);
    data.append("tab", "panier");

    if (totalQuantityValue == 0){ 
        Notiflix.Notify.info("Quantité invalide", {timeout:1000, distance:'90px', width:"400px", fontSize:"16px"});

    }
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let res = this.response;
            console.log(res.panier);
            nbElementPanier.innerHTML = res.panier.length;
            totalQuantity.innerHTML = 0;
            modifyQuantity(id,0);
            Notiflix.Notify.info('Produit ajouté au panier.', {timeout:1000, distance:'90px', width:"400px", fontSize:"16px"});
        } else if (this.readyState == 4) {
            alert("Une erreur est survenue...");
        }
    };

    xhr.open("POST",url.concat("index.php/boutique/addToPanier"),true);
    xhr.responseType = "json";
    xhr.send(data);
}
