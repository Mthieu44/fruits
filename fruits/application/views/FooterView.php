<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="footer-col">
                        <h4>Notre entreprise</h4>
                        <ul>
                            <li><a href="<?= site_url('APropos') ?>">A propos</a></li>
                            <li><a href="<?= site_url('Contact') ?>">Nous contacter</a></li>
                            <li><a href="<?= site_url('home/ConditionsGenerales') ?>">CGU</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Plus d'infos</h4>
                        <ul>
                            <li><a href="<?= site_url('Connexion') ?>">Mon compte</a></li>
                            <li><a href="<?= site_url('Panier') ?>">Mon panier</a></li>
                            <li><a href="<?= site_url('Connexion') ?>">Mes commandes</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>La boutique</h4>
                        <ul>
                            <li><a href="<?= site_url('Boutique') ?>"
                                    @click="setSelectedCategory('Meilleures Ventes')">Meilleures ventes</a></li>
                            <li><a href="<?= site_url('Boutique') ?>"
                                    @click="setSelectedCategory('Fruits de saison')">Fruits de saison</a></li>
                            <li><a href="<?= site_url('Boutique') ?>"
                                    @click="setSelectedCategory('Promotions')">Promotion</a></li>
                            <li><a href="<?= site_url('Boutique') ?>"
                                    @click="setSelectedCategory('Indisponibles')">Indisponibles</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Mentions légales</h4>
                        <p>Fruits en ligne est une société anonyme (SA) au capital social de 100 000 euros.
                            Les prix sont indiqués en euros et n'incluent pas la TVA.
                            Les frais de livraison sont en sus et varient en fonction de la destination et du mode de
                            livraison choisi.
                        </p>
                    </div>
                </div>
            </div>
            <a href="#"><img src="<?= base_url('img/arrowUp') ?>" class="up"></a>
</footer>


        <script type="text/javascript" src="<?= base_url('js/accordeon2.js') ?>"></script>