let url = "http://127.0.0.1/"

const vue = new Vue({
    data: () => {
        return {
            fruits: [],
            panier: [],
            searchKey: "",
            options: [
                "Prix croissant",
                "Prix décroissant",
                "Nom (A-Z)",
                "Nom (Z-A)",
            ],
            categoriesList: ["Agrumes", "Fruits exotiques", "Fruits rouges et baies", "Fruits à coque", "Fruits à pépins", "Fruits à noyau"],
            ventesList: ["Meilleures Ventes", "Promotions", "Indisponibles", "Fruits de saison"],
            categories: [],
            ventes: [],
            selected: "",
        }
    },
    computed: {
        search() {
            if (this.categories.length > 0) {
                iteratorCat = this.categories.values()
                tab = []
                for (let val of iteratorCat) {
                    this.fruits.forEach(fruit => {
                        fruit.category.forEach(el => {
                            if (el.nom == val) {
                                if (!tab.includes(fruit)) {
                                    tab.push(fruit)
                                }
                            }
                        })
                    })
                }
                if (this.ventes.length > 0) {
                    iteratorVent = this.ventes.values()
                    newTab = []
                    for (let val of iteratorVent) {
                        tab.forEach(fruit => {
                            fruit.category.forEach(el => {
                                if (el.nom == val) {
                                    if (!newTab.includes(fruit)) {
                                        newTab.push(fruit)
                                    }

                                }
                            })
                        })
                    }
                    tab = newTab
                }
                if (this.selected == "Prix croissant") {
                    tab = tab.filter((fruit) => {
                        return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
                    }).sort(function (a, b) {
                        if (a.prix > b.prix) {
                            return 1;
                        }
                        if (a.prix < b.prix) {
                            return -1;
                        }
                        return 0;
                    })
                }

                if (this.selected == "Prix décroissant") {
                    tab = tab.filter((fruit) => {
                        return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
                    }).sort(function (a, b) {
                        if (a.prix > b.prix) {
                            return -1;
                        }
                        if (a.prix < b.prix) {
                            return 1;
                        }
                        return 0;
                    })
                } if (this.selected == "Nom (A-Z)") {
                    tab = tab.filter((fruit) => {
                        return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
                    }).sort(function (a, b) {
                        if (a.nom > b.nom) {
                            return 1;
                        }
                        if (a.nom < b.nom) {
                            return -1;
                        }
                        return 0;
                    })
                } if (this.selected == "Nom (Z-A)") {
                    tab = tab.filter((fruit) => {
                        return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
                    }).sort(function (a, b) {
                        if (a.nom > b.nom) {
                            return -1;
                        }
                        if (a.nom < b.nom) {
                            return 1;
                        }
                        return 0;
                    })
                }
                if (this.searchKey != "") {
                    return tab.filter((fruit) => {
                        return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
                    })
                } else {
                    return tab
                }
            }
            else if (this.ventes.length > 0) {
                iteratorVent = this.ventes.values()
                newTab = []
                for (let val of iteratorVent) {
                    this.fruits.forEach(fruit => {
                        fruit.category.forEach(el => {
                            if (el.nom == val) {
                                if (!newTab.includes(fruit)) {
                                    newTab.push(fruit)
                                }
                            }
                        })
                    })
                }
                if (this.searchKey != "") {
                    return newTab.filter((fruit) => {
                        return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
                    })
                } else {
                    return newTab
                }
            }

            if (this.selected == "Prix croissant") {
                return this.fruits.filter((fruit) => {
                    return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
                }).sort(function (a, b) {
                    if (a.prix > b.prix) {
                        return 1;
                    }
                    if (a.prix < b.prix) {
                        return -1;
                    }
                    return 0;
                })
            }

            if (this.selected == "Prix décroissant") {
                return this.fruits.filter((fruit) => {
                    return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
                }).sort(function (a, b) {
                    if (a.prix > b.prix) {
                        return -1;
                    }
                    if (a.prix < b.prix) {
                        return 1;
                    }
                    return 0;
                })
            } if (this.selected == "Nom (A-Z)") {
                return this.fruits.filter((fruit) => {
                    return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
                }).sort(function (a, b) {
                    if (a.nom > b.nom) {
                        return 1;
                    }
                    if (a.nom < b.nom) {
                        return -1;
                    }
                    return 0;
                })
            } if (this.selected == "Nom (Z-A)") {
                return this.fruits.filter((fruit) => {
                    return fruit.nom.toLowerCase().includes(this.searchKey.toLowerCase());
                }).sort(function (a, b) {
                    if (a.nom > b.nom) {
                        return -1;
                    }
                    if (a.nom < b.nom) {
                        return 1;
                    }
                    return 0;
                })
            }

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
                    this.totalQuantity(-fruit.quantity, id)
                    fruit.quantity = 0
                    test = false
                    this.ajouterAuPanierSession(id, quantity);
                    showPanier();
                }
            });
            if (test) {
                this.panier.push(Copiedfruit);
                console.log("Envoi fauxPanier :" + -fruit.quantity)
                this.totalQuantity(-fruit.quantity, id)
                fruit.quantity = 0
                this.ajouterAuPanierSession(id, quantity);
                showPanier();
            }

        },

        retirerDuPanier(id) {
            for (let i = 0; i < this.panier.length; i++) {
                if (this.panier[i].id_fruit == id) {
                    this.panier.splice(i, 1);
                    this.ajouterAuPanierSession(id, -1); // avec -1 cela delete le produit
                    break;
                }
            }
        },


        getTotalProduit(id) {
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
            for (let i = 0; i < this.fruits.length; i++) {
                if (this.fruits[i].id_fruit == id) {
                    if (n == -this.fruits[i].quantity) {
                        quantity = n - 1
                    } else {
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
            this.ajouterAuPanierSession(id, quantity);
        },

        ajouterAuPanierSession(id, quantity) {
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
