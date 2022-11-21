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