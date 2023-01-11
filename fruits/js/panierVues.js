let url = "http://srv-infoweb/~E216120N/equipe2-1/fruits/";

const vue = new Vue({
	data: () => {
		return {
			fruits: [], // tableau de tous les fruits
			panier: [], // tableau du panier courant
			searchKey: "", // string qui prend en temps réel le contenu de la barre de recherche
			options: ["Prix croissant", "Prix décroissant", "Nom (A-Z)", "Nom (Z-A)"], // options de tris
			categoriesList: [
				"Agrumes",
				"Fruits exotiques",
				"Fruits rouges et baies",
				"Fruits à coque",
				"Fruits à pépins",
				"Fruits à noyau",
			], // Toutes les catégories
			ventesList: [
				"Meilleures Ventes",
				"Promotions",
				"Indisponibles",
				"Fruits de saison",
			], // Toutes les catégories de ventes
			categories: [], // Tableau des catégories selectionées en temps réel
			ventes: [], // Tableau des ventes selectionées en temps réel
			selected: "", // String du critère de filtre selectionnée (Par prix croissant, etc ..)
		};
	},
	computed: {
		// Fonction qui renvoi un tableau contenant tous les fruits possédants la catégorie Meilleurs Ventes
		meilleuresVentes() {
			let tab = [];
			this.fruits.forEach((fruit) => {
				fruit.category.forEach((el) => {
					if (el.nom == "Meilleures Ventes") {
						if (!tab.includes(fruit)) {
							tab.push(fruit);
						}
					}
				});
			});
			return tab;
		},
		// Fonction qui renvoi un tableau contenant tous les fruits possédants la catégorie Fruits de Saison
		fruitsDeSaison() {
			let tab = [];
			this.fruits.forEach((fruit) => {
				fruit.category.forEach((el) => {
					if (el.nom == "Fruits de saison") {
						if (!tab.includes(fruit)) {
							tab.push(fruit);
						}
					}
				});
			});
			return tab;
		},
		// retourne en temps réel le tableau des fruits correspondant aux différents critères de recherche, en fonction des ventes, des catégories, du tris souhaité
		// ou encore en fonction du contenu de la barre de recherche
		search() {
			if (this.categories.length > 0) {
				iteratorCat = this.categories.values();
				tab = [];
				for (let val of iteratorCat) {
					this.fruits.forEach((fruit) => {
						fruit.category.forEach((el) => {
							if (el.nom == val) {
								if (!tab.includes(fruit)) {
									tab.push(fruit);
								}
							}
						});
					});
				}
				if (this.ventes.length > 0) {
					iteratorVent = this.ventes.values();
					newTab = [];
					for (let val of iteratorVent) {
						tab.forEach((fruit) => {
							fruit.category.forEach((el) => {
								if (el.nom == val) {
									if (!newTab.includes(fruit)) {
										newTab.push(fruit);
									}
								}
							});
						});
					}
					tab = newTab;
				}
				if (this.selected == "Prix croissant") {
					tab = tab
						.filter((fruit) => {
							return fruit.nom
								.toLowerCase()
								.includes(this.searchKey.toLowerCase());
						})
						.sort(function (a, b) {
							if (a.prix > b.prix) {
								return 1;
							}
							if (a.prix < b.prix) {
								return -1;
							}
							return 0;
						});
				}

				if (this.selected == "Prix décroissant") {
					tab = tab
						.filter((fruit) => {
							return fruit.nom
								.toLowerCase()
								.includes(this.searchKey.toLowerCase());
						})
						.sort(function (a, b) {
							if (a.prix > b.prix) {
								return -1;
							}
							if (a.prix < b.prix) {
								return 1;
							}
							return 0;
						});
				}
				if (this.selected == "Nom (A-Z)") {
					tab = tab
						.filter((fruit) => {
							return fruit.nom
								.toLowerCase()
								.includes(this.searchKey.toLowerCase());
						})
						.sort(function (a, b) {
							if (a.nom > b.nom) {
								return 1;
							}
							if (a.nom < b.nom) {
								return -1;
							}
							return 0;
						});
				}
				if (this.selected == "Nom (Z-A)") {
					tab = tab
						.filter((fruit) => {
							return fruit.nom
								.toLowerCase()
								.includes(this.searchKey.toLowerCase());
						})
						.sort(function (a, b) {
							if (a.nom > b.nom) {
								return -1;
							}
							if (a.nom < b.nom) {
								return 1;
							}
							return 0;
						});
				}
				if (this.searchKey != "") {
					return tab.filter((fruit) => {
						return fruit.nom
							.toLowerCase()
							.includes(this.searchKey.toLowerCase());
					});
				} else {
					return tab;
				}
			} else if (this.ventes.length > 0) {
				iteratorVent = this.ventes.values();
				newTab = [];
				for (let val of iteratorVent) {
					this.fruits.forEach((fruit) => {
						fruit.category.forEach((el) => {
							if (el.nom == val) {
								if (!newTab.includes(fruit)) {
									newTab.push(fruit);
								}
							}
						});
					});
				}
				if (this.searchKey != "") {
					return newTab.filter((fruit) => {
						return fruit.nom
							.toLowerCase()
							.includes(this.searchKey.toLowerCase());
					});
				} else {
					return newTab;
				}
			}

			if (this.selected == "Prix croissant") {
				return this.fruits
					.filter((fruit) => {
						return fruit.nom
							.toLowerCase()
							.includes(this.searchKey.toLowerCase());
					})
					.sort(function (a, b) {
						if (a.prix > b.prix) {
							return 1;
						}
						if (a.prix < b.prix) {
							return -1;
						}
						return 0;
					});
			}

			if (this.selected == "Prix décroissant") {
				return this.fruits
					.filter((fruit) => {
						return fruit.nom
							.toLowerCase()
							.includes(this.searchKey.toLowerCase());
					})
					.sort(function (a, b) {
						if (a.prix > b.prix) {
							return -1;
						}
						if (a.prix < b.prix) {
							return 1;
						}
						return 0;
					});
			}
			if (this.selected == "Nom (A-Z)") {
				return this.fruits
					.filter((fruit) => {
						return fruit.nom
							.toLowerCase()
							.includes(this.searchKey.toLowerCase());
					})
					.sort(function (a, b) {
						if (a.nom > b.nom) {
							return 1;
						}
						if (a.nom < b.nom) {
							return -1;
						}
						return 0;
					});
			}
			if (this.selected == "Nom (Z-A)") {
				return this.fruits
					.filter((fruit) => {
						return fruit.nom
							.toLowerCase()
							.includes(this.searchKey.toLowerCase());
					})
					.sort(function (a, b) {
						if (a.nom > b.nom) {
							return -1;
						}
						if (a.nom < b.nom) {
							return 1;
						}
						return 0;
					});
			}

			return this.fruits.filter((fruit) => {
				return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
			});
		},
	},
	methods: {
		// Va chercher le fruit correspondant à l'id mis en paramètre et l'ajoute dans le tableau panier et envoie la nouvelle valeur dans le panier de session php avec
		// une reqûete en http
		ajouterAuPanier(id) {
			let fruit = this.fruits.find((element) => element.id_fruit == id); // recherche du fruit en fonction de son id	
			let Copiedfruit = Object.assign({}, fruit); // On fait une copie du fruit car en vueJs c'est des tableaux de pointeurs donc sans copies cela aurait envoyé vers le meme élément et on n'aurait pu le modifier indépendamment
			let quantity = Copiedfruit.quantity;
			if (Copiedfruit.quantity == 0) {
				Notiflix.Notify.info("Quantité invalide", {
					timeout: 1000,
					distance: "90px",
					width: "400px",
					fontSize: "16px",
				});
				return;
			}
			let test = true;
			this.panier.forEach((element) => {
				if (element.id_fruit == id) {
					element.quantity = element.quantity + Copiedfruit.quantity;
					quantity = element.quantity;

					this.totalQuantity(-fruit.quantity, id); // On envoie - la quantity pour re-avoir une quantity à 0 dans l'objet fruit dans le tableaux de tous les fruits
					fruit.quantity = 0;
					test = false;
					this.ajouterAuPanierSession(id, quantity);
					showPanier(); // fonction qui affiche le panier sur le côté
				}
			});
			if (test) {
				this.panier.push(Copiedfruit);

				this.totalQuantity(-fruit.quantity, id);
				fruit.quantity = 0;
				this.ajouterAuPanierSession(id, quantity);
				showPanier();
			}
		},
		// retire le fruit correspondant à l'id mis en parametre du panier
		retirerDuPanier(id) {
			for (let i = 0; i < this.panier.length; i++) {
				if (this.panier[i].id_fruit == id) {
					this.panier.splice(i, 1);
					this.ajouterAuPanierSession(id, -1); // avec -1 cela delete le produit dans le panier session
					break;
				}
			}
		},
		// Renvoie le total d'un fruit correspondant à l'id mis en parametre
		getTotalProduit(id) {
			let total = 0;
			let fruit = this.panier.find((element) => element.id_fruit == id);
			total += fruit.quantity * fruit.prix;
			return total.toFixed(2); // 2 chiffres après la virgule
		},
		// Renvoie le total du panier
		getTotalPanier() {
			let total = 0;
			this.panier.forEach((element) => {
				total += element.quantity * element.prix;
			});
			return total.toFixed(2);
		},

		// Calcul la quantity chosie en temps réel pour un fruit(- / +) et l'affecte aux fruits dans la variable de session php pour que cette quantity soit la meme dans toutes les pages pour un fruit 
		totalQuantity(n, id) {
			let quantity = 0;
			for (let i = 0; i < this.fruits.length; i++) {
				if (this.fruits[i].id_fruit == id) {
					if (n == -this.fruits[i].quantity) {
						quantity = n - 1;
					} else {
						this.fruits[i].quantity += n;
						quantity = this.fruits[i].quantity;
					}

					if (this.fruits[i].quantity < 0) {
						this.fruits[i].quantity = 0;
					}
				}
			}
			// Envoyer le tableau de fruits au tableau de session fauxPanier dans le php
			let formData = new FormData();
			formData.append("id", id);
			formData.append("quantity", quantity);
			formData.append("tab", "fauxPanier");
			formData.append("total", this.getTotalPanier());
			axios
				.post(url.concat("index.php/panier/addToPanier"), formData)
				.catch(function (error) {
					console.log(error);
				});
		},
		// Calcul la quantity chosie en temps réel pour un fruit présent dans le panier (- / +) et l'affecte aux fruits dans la variable de session php pour que cette quantity soit la meme dans toutes les pages pour un fruit 

		totalQuantityPanier(n, id) {
			let quantity = 0;
			for (let i = 0; i < this.panier.length; i++) {
				if (this.panier[i].id_fruit == id) {
					this.panier[i].quantity += n;
					quantity = this.panier[i].quantity;
					if (this.panier[i].quantity <= 0) {
						// Rajouter une pop up ou autre pour prévenir que mettre une quantity à 0 va supprimer le produit du panier.
						let dlg = new Dialog({
							caption: 'Confirmation',
							message: 'Voulez vous vraiment supprimer le fruit : '.concat(this.panier[i].nom).concat(' de votre panier ?'),
							showClose: false,
							buttons: Dialog.buttons.OK_CANCEL,
							cancelable: false,
							okHandler: (dlg) => {
								this.panier.splice(i, 1);
								this.ajouterAuPanierSession(id, -1);
								dlg.close();
							},
							cancelHandler: () => {
								this.panier[i].quantity = 1;
								dlg.close();
							},

						});
						dlg.show()
					}
				}
			}
			this.ajouterAuPanierSession(id, quantity);
		},
		// Envoie une requete HTTP en post sur ma méthode addToPanier du controler panier en lui passant en parametre,
		// l'id du fruit concerné, sa quantity, le total, et le tableau sur lequelle il doit faire le changement
		ajouterAuPanierSession(id, quantity) {
			let formData = new FormData();
			formData.append("id", id);
			formData.append("quantity", quantity);
			formData.append("tab", "panier");
			formData.append("total", this.getTotalPanier());

			axios
				.post(url.concat("index.php/panier/addToPanier"), formData)
				.then(function (response) {
					console.log(response);
				})
				.catch(function (error) {
					console.log(error);
				});
		},
		// récupère une image d'un fruit en fonction de son id
		getImg(id) {
			for (let i = 0; i < this.fruits.length; i++) {
				if (this.fruits[i].id_fruit == id) {
					return url.concat("img/fruit/").concat(this.fruits[i].image);
				}
			}
		},
		// affiche la page produit correspondant à l'id passé en parametre
		getProduct(id) {
			return url.concat("index.php/boutique/fruit/").concat(id);
		},
		// récupère la category selectionnée dans une autre page pour pouvoir remplir le tableau et donc affiché les bons fruits
		setSelectedCategory(category) {
			localStorage.setItem("ventes", category);
		},
		// Fonction qui retourne un booléen si le fruit correspondant à l'id passé en parametre à la catégorie 'Indisponible'
		isIndisponible(id) {
			let fruit = this.search.find((element) => element.id_fruit == id);
			let istrue = false
			fruit.category.forEach((cat) => {
				if (cat.nom == "Indisponibles") {
					istrue = true;
				}
			});
			return istrue;
		},

	},
	// fonction qui permet d'effectuer des actions quand la vue en montée sur la page (dès le début)
	mounted() {
		// condition pour affecter ou non à la catégorie par rapport au contenu du localSotrage de items 'ventes'
		if (localStorage.getItem("ventes") != null) {
			this.ventes = [localStorage.getItem("ventes")];
			localStorage.removeItem("ventes");
		}
		// récupère tous les fruits en appelant la méthode getAllFruits et affecte ce résultat au tableau 'fruits'
		axios
			.get(url.concat("index.php/panier/getAllFruits"))
			.then((res) => res.data)
			.then((res) => {
				this.fruits = res;
			})
			.catch(function (error) {
				console.log(error);
			});
		// récupère le panier courant en appelant la méthode getPanier et affecte ce résultat au tableau 'panier'
		axios
			.get(url.concat("index.php/panier/getPanier"))
			.then((res) => res.data)
			.then((res) => {
				this.panier = res;
			});
	},
}).$mount("#app-vue");
