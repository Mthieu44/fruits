"use strict"

// classe pour les sliders de produits
class sliderProduit {

	constructor(insideSlider) {
		this.pos = 3
		this.slider = document.getElementsByClassName(insideSlider)
	}

	//décale vers la gauche
	slideLeft() {
		this.showCartes(-1)
	}

	//décale vers la droite
	slideRight() {
		this.showCartes(1)
	}

	//décale le slider d'un certain nombre de cran, utilisé par les 2 fonctions d'au-dessus
	showCartes(n) {
		this.pos += n;
		if (this.pos < 3) {
			this.pos = this.slider.length - 2
		}
		if (this.pos > this.slider.length - 2) {
			this.pos = 3
		}
		let align = -220 * this.pos + 110 * (this.slider.length + 1)
		for (let i = 0; i < this.slider.length; i++) {
			this.slider[i].style.transform = `translate(${align}px, 0)`
		}
	}
}

// Fonction pour que le slider réagisse lors du roulage de la molette
function roulage1(event) {
	event.preventDefault()
	if (event.deltaY > 0) {
		slideBestsellers.showCartes(1)
	} else {
		slideBestsellers.showCartes(-1)
	}
}

function roulage2(event) {
	event.preventDefault()
	if (event.deltaY > 0) {
		slideSeasonal.showCartes(1)
	} else {
		slideSeasonal.showCartes(-1)
	}
}

// Déclaration des sliders
const slideBestsellers = new sliderProduit("card-product-top")
const slideSeasonal = new sliderProduit("card-product-bottom")

// Initialisation des sliders
let isinit = 0

function initSliders() {
	if (isinit == 0) {
		isinit = 1
		document.getElementById("slider-bestsellers").onwheel = roulage1;
		slideBestsellers.showCartes(0)
		document.getElementById("slider-season").onwheel = roulage2;
		slideSeasonal.showCartes(0)
	}
}
