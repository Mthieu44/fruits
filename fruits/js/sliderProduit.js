"use strict"

class sliderProduit {

  constructor(insideSlider) {
    this.pos = 1
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
    console.log(this.pos);
    if (this.pos < 1) {this.pos = this.posMax - 1}
    if (this.pos > this.posMax - 1) {this.pos = 1}
    this.posMax = this.slider.length
    if (this.posMax % 2 == 0) {this.posMax += 1}
    let align = -290 * this.pos + 145 * this.posMax
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
    document.getElementById("slider-bestsellers").onwheel = roulage1;
    document.getElementById("slider-season").onwheel = roulage2;
    slideBestsellers.showCartes(0)
    slideSeasonal.showCartes(0)
    isinit = 1
  }
}


