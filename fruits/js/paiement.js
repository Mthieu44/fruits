function showHideForm() {
    // Récupère le bouton radio
    var radioCard = document.getElementById("payment-method-card");
    var radioPaypal = document.getElementById("payment-method-paypal");
    // Récupère le formulaire
    var formCard = document.getElementById("formCard");
    var formPaypal = document.getElementById("formPaypal");
  
    // Si le bouton radio est coché, on affiche le formulaire
    if (radioCard.checked) {
        formCard.style.display = "block";
        formPaypal.style.display ="none";
    }
    else if(radioPaypal.checked){
        formPaypal.style.display="block";
        formCard.style.display ="none";
    }
    // Sinon, on le cache
    else {
        formCard.style.display ="none";
        formPaypal.style.display ="none";
    }
  }

  function validateForm() {
    var detenteur = document.getElementById("detenteur").value;
    var numero = document.getElementById("numero").value;
    var cryptogramme = document.getElementById("cryptogramme").value;
    
    if (detenteur == "" || !numero.match(/^[0-9]{16}$/) || !cryptogramme.match(/^[0-9]{3}$/)) {
      alert("Veuillez remplir tous les champs correctement.");
      return false;
    }
    
    return true;
  }