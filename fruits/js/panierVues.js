let url = "http://localhost/public_html/equipe2-1/fruits/"

const vue = new Vue({
	data: () => {
		return {
			fruits: [],
			panier: [],
			searchKey: "",
		}
	},
	computed: {
		search() {
			return this.fruits.filter((fruit) => {
				return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
			})
		}
	},
	methods: {
		ajouterAuPanier(id) {
			
			let fruit = this.fruits.find(element => element.id_fruit == id)
			let Copiedfruit = Object.assign({}, fruit);
			let quantity = Copiedfruit.quantity;
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
					quantity = element.quantity
					console.log("Envoi fauxPanier :" + -fruit.quantity)
					this.totalQuantity(-fruit.quantity,id)
					fruit.quantity = 0
					test = false
					this.ajouterAuPanierSession(id,quantity);
					showPanier();
				}
			});
			if (test) {
				this.panier.push(Copiedfruit);
				console.log("Envoi fauxPanier :" + -fruit.quantity)
				this.totalQuantity(-fruit.quantity,id)
				fruit.quantity = 0
				this.ajouterAuPanierSession(id,quantity);
				showPanier();
			}

		},

		retirerDuPanier(id) {
			for (let i = 0; i < this.panier.length; i++) {
				if (this.panier[i].id_fruit == id) {
					this.panier.splice(i, 1);
					this.ajouterAuPanierSession(id,-1); // avec -1 cela delete le produit
					break;
				}
			}
		},

		
		getTotalProduit(id){
			let total = 0
			let fruit = this.panier.find(element => element.id_fruit == id)
			total += fruit.quantity * fruit.prix
			return total.toFixed(2)
		},
		
		getTotalPanier() {
			let total = 0;
			this.panier.forEach(element => {
				total += element.quantity * element.prix;
			});
			return total.toFixed(2);
		},

		totalQuantity(n, id) {
			let quantity = 0;
			console.log("id :" + id)
			for (let i = 0; i < this.fruits.length; i++) {
				if (this.fruits[i].id_fruit == id) {
					if (n == -this.fruits[i].quantity){
						quantity = n - 1
					}else{
						this.fruits[i].quantity += n;
						quantity = this.fruits[i].quantity
					}
					
					if (this.fruits[i].quantity < 0) {
						this.fruits[i].quantity = 0;
					}
				}
			}
			// Envoyer le tableau de fruits au tableau de session fauxPanier dans le php
			let formData = new FormData();
			formData.append('id', id);
			formData.append('quantity', quantity)
			formData.append('tab', 'fauxPanier');
			axios.post(url.concat('index.php/panier/addToPanier'), formData).catch(function (error) {
				console.log(error);
			});

		},

		totalQuantityPanier(n, id) {
			let quantity = 0
			for (let i = 0; i < this.panier.length; i++) {
				if (this.panier[i].id_fruit == id) {
					this.panier[i].quantity += n;
					quantity = this.panier[i].quantity
					if (this.panier[i].quantity < 0) {
						this.panier[i].quantity = 0; // Rajouter une pop up ou autre pour prévenir que mettre une quantity à 0 va supprimer le produit du panier.
					}
				}
			}
			this.ajouterAuPanierSession(id,quantity);
		},

		ajouterAuPanierSession(id,quantity){
			let formData = new FormData();
			formData.append('id', id);
			formData.append('quantity', quantity)
			formData.append('tab', 'panier');

			axios.post(url.concat('index.php/panier/addToPanier'), formData).then(function (response) {
				console.log(response);
			}).catch(function (error) {
				console.log(error);
			});
		},

		getImg(id) {
			for (let i = 0; i < this.fruits.length; i++) {
				if (this.fruits[i].id_fruit == id) {
					return url.concat("img/fruit/").concat(this.fruits[i].image);
				}
			}
		},
		getProduct(id) {
			return url.concat("index.php/boutique/fruit/").concat(id);
		},
	},
	mounted() {
		axios.get(url.concat('index.php/panier/getAllFruits'))
			.then((res) => res.data)
			.then((res) => {
				this.fruits = res;
			}).catch(function (error) {
				console.log(error);
			});
		axios.get(url.concat('index.php/panier/getPanier'))
			.then((res) => res.data)
			.then((res) => {
				this.panier = res;
			})
	},
}).$mount('#app-vue');
