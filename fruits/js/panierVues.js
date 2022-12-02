
const vue = new Vue({
    data : () => {
        return {
            fruits : [],
            panier : [],
            url : "http://srv-infoweb.iut-nantes.univ-nantes.prive/~E216351P/fruits/",
        }
    },
    methods : {
        ajouterAuPanier(id) {
            for (let i = 0; i < this.fruits.length; i++) {
                if (this.fruits[i].id == id) {
                    this.panier.push(this.fruits[i]);
                    break;
                }
            }
        },
        retirerDuPanier(id) {
            for (let i = 0; i < this.panier.length; i++) {
                if (this.panier[i].id == id) {
                    this.panier.splice(i, 1);
                    break;
                }
            }
        },
        totalQuantity(n,id){
            for (let i = 0; i < this.fruits.length; i++){
                if (this.fruits[i].id_fruit == id){
                    this.fruits[i].quantity += n;
                    
                    if (this.fruits[i].quantity < 0){
                        this.fruits[i].quantity = 0;
                    }
                }
            }
        },
        getImg(id){
            for (let i = 0; i < this.fruits.length; i++){
                if (this.fruits[i].id_fruit == id){
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
