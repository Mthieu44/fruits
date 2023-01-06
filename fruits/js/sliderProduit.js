"use strict"

class sliderProduit {

  constructor(insideSlider) {
    this.pos = 3
    this.slider = document.getElementsByClassName(insideSlider)
  }

  slideLeft() {
    this.showCartes(-1)
  }
  
  slideRight() {
    this.showCartes(1)
  }
  
  showCartes(n) {
    this.pos += n;
    if (this.pos < 3) {this.pos = this.slider.length - 2}
    if (this.pos > this.slider.length - 2) {this.pos = 3}
    let align = -220 * this.pos + 110 * (this.slider.length + 1)
    for (let i = 0; i < this.slider.length; i++) {
      this.slider[i].style.transform = `translate(${align}px, 0)`
    }
  }
}

function roulage1(event) {
  event.preventDefault()
  if (event.deltaY > 0){
    slideBestsellers.showCartes(1)
  }else{
    slideBestsellers.showCartes(-1)
  }
}

function roulage2(event) {
  event.preventDefault()
  if (event.deltaY > 0){
    slideSeasonal.showCartes(1)
  }else{
    slideSeasonal.showCartes(-1)
  }
}


const slideBestsellers = new sliderProduit("card-product-top")
const slideSeasonal = new sliderProduit("card-product-bottom")

let isinit = 0
function initSliders() {
  if (isinit == 0){
    isinit = 1
    document.getElementById("slider-bestsellers").onwheel = roulage1;
    slideBestsellers.showCartes(0)
    document.getElementById("slider-season").onwheel = roulage2;
    slideSeasonal.showCartes(0)
  }
}


