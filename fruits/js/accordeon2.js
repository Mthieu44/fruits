//script qui récupère tous les elements avec la class accordeon et qui va afficher les elements voisins à accordeon : panel deployer avec la scrollHeight progressivement
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
	acc[i].addEventListener("click", function () {
		this.classList.toggle("active");

		var panel = this.nextElementSibling;
		if (panel.style.display === "block") {
			panel.style.display = "none";
		} else {
			panel.style.display = "block";
		}
	});
}

//script qui récupère tous les elements avec la class accordionCommande et qui va afficher les elements voisins à accordeon : panelCommande d'un seul coup
var acc = document.getElementsByClassName("accordionCommande");
var i;

for (i = 0; i < acc.length; i++) {
	acc[i].addEventListener("click", function () {
		this.classList.toggle("activeCommande");
		var panel = this.nextElementSibling;
		if (panel.style.maxHeight) {
			panel.style.maxHeight = null;
		} else {
			panel.style.maxHeight = panel.scrollHeight + "px";
		}
	});
}
