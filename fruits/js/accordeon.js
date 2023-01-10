//script qui récupère tous les elements avec la class accordeon et qui va les deployer avec la scrollHeight progressivement
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
	
    var panel = this.nextElementSibling;
	console.log(panel.scrollHeight);
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
  
  // Ouvrez l'accordéon par défaut en simulant un clic sur l'élément
  acc[i].click();
}
