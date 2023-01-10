const slides = document.querySelectorAll('.uppercontent');
const container = document.querySelector('#carousel');
const prevBtn = document.querySelectorAll('.prev-btn');
const nextBtn = document.querySelectorAll('.next-btn');

// initialisation du carousel
let currentSlide = 0;
slides.forEach((slide, index) => {
	slide.style.transform = `translateX(${(index - currentSlide) * 100}%)`;
});

// ajoute un event listener de clic sur les boutons suivants pour passer à la slide d'après
nextBtn.forEach((btn, index) => {
	btn.addEventListener('click', () => {
		currentSlide = (currentSlide + 1)
		if (currentSlide == slides.length) {
			currentSlide = slides.length - 1
		};
		slides.forEach((slide, index) => {
			slide.style.transform = `translateX(${(index - currentSlide) * 100}%)`;
		});
	});
});

// ajoute un event listener de clic sur les boutons précédents pour passer à la slide d'avant
prevBtn.forEach((btn, index) => {
	btn.addEventListener('click', () => {
		currentSlide = (currentSlide - 1);
		if (currentSlide == -1) {
			currentSlide = 0
		};
		slides.forEach((slide, index) => {
			slide.style.transform = `translateX(${(index - currentSlide) * 100}%)`;
		});
	});
});
