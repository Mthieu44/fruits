const vue = new Vue({
	data: () => {
		return {
			fruits: [],
			panier: [],
			url: "http://srv-infoweb.iut-nantes.univ-nantes.prive/~E216351P/fruits/",
		}
	},
	methods: {
		ajouterAuPanier(id) {
            let fruit = this.fruits.find(element => element.id_fruit == id)
			let Copiedfruit = Object.assign({},fruit);
			if (Copiedfruit.quantity == 0) {
				Notiflix.Notify.info("Quantité invalide", {
					timeout: 1000,
					distance: '90px',
					width: "400px",
					fontSize: "16px"
				});
				return;
			}
			let test = true
			this.panier.forEach(element => {
				if (element.id_fruit == id) {
					element.quantity = element.quantity + Copiedfruit.quantity
                    fruit.quantity = 0
					test = false
					showPanier();
				}
			});
			if (test) {
				this.panier.push(Copiedfruit);
                fruit.quantity = 0
				showPanier();
			}
		},

		retirerDuPanier(id) {
			for (let i = 0; i < this.panier.length; i++) {
				if (this.panier[i].id_fruit == id) {
					this.panier.splice(i, 1);
					break;
				}
			}
		},
		totalQuantity(n, id) {
			for (let i = 0; i < this.fruits.length; i++) {
				if (this.fruits[i].id_fruit == id) {
					this.fruits[i].quantity += n;
					if (this.fruits[i].quantity < 0) {
						this.fruits[i].quantity = 0;
					}
				}
			}
		},
		getImg(id) {
			for (let i = 0; i < this.fruits.length; i++) {
				if (this.fruits[i].id_fruit == id) {
					return this.url.concat("/img/fruit/").concat(this.fruits[i].image);
				}
			}
		},
	},
	mounted() {
		axios.get(url.concat('index.php/panier/getPanier'))
			.then((res) => res.data)
			.then((res) => {
				this.panier = res;
			})
		axios.get(url.concat('index.php/panier/getAllFruits'))
			.then((res) => res.data)
			.then((res) => {
				this.fruits = res;
			})
	},
}).$mount('#app-vue');

/*
for (let i = 0; i < this.fruits.length; i++) {
                if (this.fruits[i].id_fruit == id) {
                    if (this.fruits[i].quantity == 0){
                        Notiflix.Notify.info("Quantité invalide", {timeout:1000, distance:'90px', width:"400px", fontSize:"16px"});
                        break;
                    }else{
                        this.panier.push(this.fruits[i]);
                        this.fruits[i].quantity = 0;
                        showPanier();
                        break;
                    }
                }
            }
*/
