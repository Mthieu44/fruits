"use strict"

class sliderProduit {

  constructor(insideSlider) {
    this.pos = 2
    this.slider = document.getElementsByClassName(insideSlider)
    this.posMax = this.slider.length
  }

  slideLeft() {
    this.showCartes(-1)
  }
  
  slideRight() {
    this.showCartes(1)
  }
  
  showCartes(n) {
    this.pos += n;
    if (this.pos < 2) {this.pos = this.posMax - 2}
    if (this.pos > this.posMax - 2) {this.pos = 2}
    this.posMax = this.slider.length
    if (this.posMax % 2 == 1) {this.posMax += 1}
    let align = -220 * this.pos + 110 * this.posMax
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


