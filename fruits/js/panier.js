var url = "http://srv-infoweb.iut-nantes.univ-nantes.prive/~E216351P/fruits/"

function totalQuantity(n,id){
    var totalQuantity = document.getElementById("totalQuantity".concat(id));
    var totalQuantityValue = parseInt(totalQuantity.innerHTML);
    totalQuantity.innerHTML = totalQuantityValue + n
    if (totalQuantity.innerHTML < 0){
        totalQuantity.innerHTML = 0
    }
    modifyQuantity(id,totalQuantity.innerHTML);
}

function modifyQuantity(id,quantity){
    var data = new FormData();
    data.append("id",id);
    data.append("quantity",quantity);

    var xhr = new XMLHttpRequest();
    xhr.open("POST",url.concat("index.php/boutique/modifyProductsQuantity"),true);
    xhr.responseType = "json";

    xhr.send(data);

}

function addPanier(id){
    var nbElementPanier = document.getElementById("quantityPanier");
    var nbElementValue = 0
    if (nbElementPanier != null){
        nbElementValue = parseInt(nbElementPanier.innerHTML);
    }

    var totalQuantity = document.getElementById("totalQuantity".concat(id));
    var totalQuantityValue = parseInt(totalQuantity.innerHTML);

    var data = new FormData();
    data.append("id",id);
    data.append("quantity",totalQuantityValue);

    if (totalQuantityValue == 0){
        Notiflix.Notify.info("Quantité invalide", {timeout:1000, distance:'90px', width:"400px", fontSize:"16px"});

    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var res = this.response;
            for(var p = 0; p < res.panier.length ;p++){
                if (res.panier[p]["id_fruits"] == id){
                    nbElementPanier.innerHTML = nbElementValue;
                }else{
                    nbElementPanier.innerHTML = nbElementValue + 1;
                }
            }
            totalQuantity.innerHTML = 0;
            Notiflix.Notify.info('Produit ajouté au panier.', {timeout:1000, distance:'90px', width:"400px", fontSize:"16px"});
        } else if (this.readyState == 4) {
            alert("Une erreur est survenue...");
        }
    };

    xhr.open("POST",url.concat("index.php/boutique/addPanier"),true);
    xhr.responseType = "json";
    xhr.send(data);
}
