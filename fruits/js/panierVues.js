const vue = new Vue({
    data: () => {
        return {
            fruits: [],
            panier: [],
            url: "http://127.0.0.1/",
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
        getTotalPanier() {
            let total = 0;
            this.panier.forEach(element => {
                total += element.quantity * element.prix;
            });
            return total;
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
            // Envoyer le tableau de fruits au tableau de session fauxPanier dans le php
            axios({
                method: 'post',
                url: 'http://localhost/public_html/equipe2-1/fruits/index.php/panier/addToPanier',
                data: {
                    fruits: this.fruits,
                    tab: "fauxPanier"
                }
            }).then(function (response) {
                console.log(response);
            }).catch(function (error) {
                console.log(error);
            });
        },
        totalQuantityPanier(n, id) {
            for (let i = 0; i < this.panier.length; i++) {
                if (this.panier[i].id_fruit == id) {
                    this.panier[i].quantity += n;
                    if (this.panier[i].quantity < 0) {
                        this.panier[i].quantity = 0; // Rajouter une pop up ou autre pour prévenir que mettre une quantity à 0 va supprimer le produit du panier.
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
