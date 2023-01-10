// fonction qui vérifie si le formulaire de commande est rempli entièrement et l'envoie, affiche un message d'erreur si ce n'est pas le cas.
function validateForm() {
    let inputs = document.getElementsByTagName("input")
    let err = document.getElementById("errPai")
    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value.length < 1){
            err.innerHTML = "Veuillez remplir tous les champs"
            return
        }
        
    }
    document.getElementById("formulaire").submit()

    
}