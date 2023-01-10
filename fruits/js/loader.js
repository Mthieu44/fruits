//fonction qui va supprimer les balises avec la class preloader (en fade out) quand la fenetre active l'evenement "load"
window.addEventListener("load", function () {
	var styleBySelector = {};
	for (var j = 0; j < document.styleSheets.length; j++) {
		var styleList =
			document.styleSheets[j].rules || document.styleSheets[j].cssRules;
		for (var i = 0; i < styleList.length; i++)
			styleBySelector[styleList[i].selectorText] = styleList[i].style;
	}
	while (styleBySelector[".preloader"].opacity > 0) {
		styleBySelector[".preloader"].opacity -= 0.2;
	}
	setTimeout(() => {
		el = document.getElementById("preloader");
		el.parentNode.removeChild(el);
	}, 500);
});


