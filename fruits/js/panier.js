function totalQuantity(n,id){
    var totalQuantity = document.getElementById("totalQuantity".concat(id));
    var totalQuantityValue = parseInt(totalQuantity.innerHTML);    
    totalQuantity.innerHTML = totalQuantityValue + n;
    // si on clique sur le bouton - et que la quantité est à 0, on ne peut pas descendre en dessous
    if(totalQuantity.innerHTML < 0){
      totalQuantity.innerHTML = 0;
    }
    // on met à jour la quantité dans le panier
    modifyProductsQuantity(id, totalQuantity.innerHTML);
}

function modifyProductsQuantity(id, quantity) {
    var data = new FormData();
    data.append('id', id);
    data.append('quantity', quantity);
    var url = "http://localhost/public_html/equipe2-1/fruits/index.php/boutique/modifyProductsQuantity";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", url, true);
    xhr.send(data);
}

