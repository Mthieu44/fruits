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
    xhr.open("POST","http://srv-infoweb.iut-nantes.univ-nantes.prive/~E216351P/fruits/index.php/boutique/modifyProductsQuantity",true);
    xhr.responseType = "json";

    xhr.send(data);
}


function addPanier(id,n){
    var nbElementPanier = document.getElementById("quantityPanier");
    var nbElementValue = parseInt(nbElementPanier.innerHTML);

    var totalQuantity = document.getElementById("totalQuantity".concat(id));
    var totalQuantityValue = parseInt(totalQuantity.innerHTML);

    var data = new FormData();
    data.append("id",id);
    data.append("quantity",totalQuantityValue);
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.response);
            var res = this.response;
            if (res.success) {
                console.log("Fruit ajouter au panier");
            } else {
                alert(res.msg);
            }
        } else if (this.readyState == 4) {
            alert("Une erreur est survenue...");
        }
    };

    xhr.open("POST","http://srv-infoweb.iut-nantes.univ-nantes.prive/~E216351P/fruits/index.php/boutique/addPanier",true);
    xhr.responseType = "json";

    xhr.send(data);
}