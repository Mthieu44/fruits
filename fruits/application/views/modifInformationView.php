<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fruits • Connexion </title>
    <link rel="icon" href="<?= base_url('img/header/logo.png') ?>" />
    <?php require('loader.php'); ?>
    <style>
        <?php include 'css/style.css'; ?><?php include 'css/connexion.css'; ?>
    </style>

</head>

<body>
    <div id="preloader" class="preloader">
        <img src="<?= base_url('img/loader/' . $loader) ?>" class="loader">
    </div>

    <header>
        <a href="<?= site_url('Home') ?>" class="logo">
            <img src="<?= base_url('img/header/logo.png') ?>" alt="fruit" class="logo2" />
            <h1><b class="yellow">F</b>RUITS</h1>
        </a>
        <nav>

            <ul>
                <li><a href="<?= site_url('Home') ?>" class="yellow">Accueil</a></li>
                <li><a href=" <?= site_url('Boutique') ?>">Boutique</a></li>
                <li><a href="<?= site_url('APropos') ?>" class="propos">A propos</a></li>
                <li><a href="<?= site_url('Contact') ?>">Contact</a></li>
                <li class="connexion">
                    <a href="<?= site_url('Connexion') ?>" class="yellow">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="30.000000pt" height="30.000000pt" viewBox="0 0 400.000000 400.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,400.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path d="M1935 3315 c-321 -61 -566 -296 -640 -615 -22 -96 -20 -269 5 -366 68 -267 267 -484 519 -567 215 -72 411 -57 620 44 91 44 116 63 196 142 158 158 233 321 242 533 12 244 -70 450 -248 620 -187 179 -444 256 -694 209z" />
                                <path d="M1363 1750 c-386 -239 -625 -634 -659 -1087 l-7 -93 1381 0 1380 0 -4 78 c-12 182 -65 384 -141 537 -114 228 -333 462 -544 579 l-45 26 -60 -46 c-78 -59 -239 -138 -339 -166 -116 -32 -374 -32 -490 0 -106 29 -242 95 -333 160 -40 28 -74 52 -75 51 -1 0 -30 -18 -64 -39z" />
                            </g>
                        </svg>
                        <?php
                        if (!isset($this->session->user)) {
                            echo ("Connexion");
                        } else {
                            echo ($this->session->user["user"]->getPrenom());
                        }
                        ?>
                    </a>
                </li>
                <li class="panier">
                    <a href="<?= site_url('Panier') ?>">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="40.000000pt" height="40.000000pt" viewBox="0 0 400.000000 400.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,400.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                <path d="M1990 3530 c0 -6 -27 -10 -60 -10 -33 0 -60 -4 -60 -10 0 -5 -13 -10 -30 -10 -16 0 -30 -4 -30 -10 0 -5 -11 -10 -25 -10 -14 0 -25 -4 -25 -10 0 -5 -9 -10 -20 -10 -11 0 -20 -4 -20 -10 0 -5 -7 -10 -15 -10 -18 0 -165 -144 -165 -162 0 -7 -11 -22 -25 -32 -17 -13 -23 -25 -20 -38 4 -12 1 -18 -9 -18 -11 0 -16 -9 -16 -30 0 -16 -4 -30 -10 -30 -5 0 -10 -24 -10 -54 0 -30 -4 -58 -10 -61 -6 -4 -10 -113 -10 -296 l0 -289 40 -40 c35 -35 46 -40 85 -40 25 0 45 4 45 9 0 5 10 11 23 13 14 2 23 11 25 26 2 12 8 22 13 22 5 0 9 122 9 300 0 193 4 300 10 300 6 0 10 9 10 20 0 11 5 20 10 20 6 0 10 9 10 19 0 10 7 21 15 25 8 3 15 12 15 21 0 8 18 34 40 56 22 23 40 45 40 50 0 5 11 9 25 9 14 0 25 5 25 10 0 6 9 10 20 10 11 0 20 5 20 10 0 6 20 10 45 10 25 0 45 5 45 10 0 6 20 10 45 10 25 0 45 -4 45 -10 0 -5 16 -10 35 -10 19 0 35 -4 35 -10 0 -5 11 -10 25 -10 14 0 25 -4 25 -10 0 -5 9 -10 20 -10 11 0 20 -3 20 -7 0 -10 45 -63 54 -63 15 0 56 -51 56 -70 0 -11 5 -20 10 -20 6 0 10 -9 10 -20 0 -11 5 -20 10 -20 6 0 10 -107 10 -300 0 -193 4 -300 10 -300 6 0 10 -7 10 -15 0 -9 7 -18 15 -21 8 -4 15 -10 15 -16 0 -5 6 -16 14 -24 17 -16 106 -20 106 -4 0 6 11 10 25 10 20 0 25 5 25 25 0 14 5 25 10 25 6 0 10 113 10 320 0 207 -4 320 -10 320 -5 0 -10 20 -10 45 0 25 -4 45 -10 45 -5 0 -10 9 -10 20 0 11 -4 20 -10 20 -5 0 -10 11 -10 25 0 16 -6 25 -16 25 -8 0 -12 5 -9 10 4 6 -10 27 -29 46 -20 20 -36 40 -36 45 0 5 -5 9 -10 9 -14 0 -80 66 -80 80 0 5 -11 10 -25 10 -14 0 -25 5 -25 10 0 6 -7 10 -15 10 -8 0 -15 5 -15 10 0 6 -11 10 -25 10 -14 0 -25 5 -25 10 0 6 -11 10 -24 10 -14 0 -28 5 -31 10 -3 6 -33 10 -65 10 -32 0 -62 5 -65 10 -3 6 -26 10 -51 10 -24 0 -44 -4 -44 -10z" />
                                <path d="M653 2605 c-14 -15 -18 -55 -5 -55 4 0 5 -25 4 -55 -3 -45 -1 -55 12 -55 12 0 16 -11 16 -45 0 -25 5 -45 10 -45 6 0 10 -20 10 -45 0 -25 5 -45 10 -45 6 0 10 -18 10 -40 0 -22 5 -40 10 -40 6 0 10 -20 10 -45 0 -32 4 -45 14 -45 10 0 12 -11 8 -45 -4 -37 -2 -45 12 -45 12 0 16 -10 16 -45 0 -25 5 -45 10 -45 6 0 10 -20 10 -45 0 -25 5 -45 10 -45 6 0 10 -20 10 -45 0 -25 5 -45 10 -45 6 0 10 -18 10 -40 0 -24 5 -43 13 -46 8 -3 11 -18 9 -44 -3 -32 -1 -40 12 -40 12 0 16 -10 16 -45 0 -25 5 -45 10 -45 6 0 10 -20 10 -45 0 -25 5 -45 10 -45 6 0 10 -20 10 -45 0 -29 4 -45 13 -45 8 0 11 -14 9 -45 -3 -36 -1 -45 12 -45 12 0 16 -10 16 -45 0 -25 5 -45 10 -45 6 0 10 -18 10 -40 0 -22 5 -40 10 -40 6 0 10 -20 10 -45 0 -25 5 -45 10 -45 6 0 10 -20 10 -45 0 -25 5 -45 11 -45 11 0 39 -25 39 -35 0 -10 48 -55 60 -55 5 0 10 -4 10 -10 0 -5 16 -10 35 -10 19 0 35 -4 35 -10 0 -7 272 -10 795 -10 523 0 795 3 795 10 0 6 16 10 35 10 19 0 35 5 35 10 0 6 6 10 13 10 7 0 21 11 31 25 10 13 23 22 29 18 5 -3 7 -1 3 5 -3 6 5 19 19 30 19 15 25 29 25 61 0 23 5 41 10 41 6 0 10 20 10 45 0 25 5 45 10 45 6 0 10 18 10 39 0 26 5 41 16 45 12 5 15 16 12 46 -2 28 0 40 9 40 9 0 13 15 13 45 0 25 5 45 10 45 6 0 10 20 10 45 0 25 5 45 10 45 6 0 10 20 10 45 0 25 5 45 10 45 6 0 10 20 10 45 0 35 4 45 16 45 13 0 15 8 12 40 -2 26 1 41 9 44 8 3 13 22 13 46 0 22 5 40 10 40 6 0 10 20 10 45 0 25 5 45 10 45 6 0 10 20 10 44 0 31 5 46 16 50 13 5 15 15 11 46 -4 30 -2 40 9 40 10 0 14 13 14 45 0 25 5 45 10 45 6 0 10 20 10 45 0 25 5 45 10 45 6 0 10 18 10 40 0 22 5 40 10 40 6 0 10 20 10 44 0 31 5 46 16 50 12 5 15 17 12 56 -2 32 1 50 8 50 14 0 28 134 14 138 -6 2 -8 8 -4 13 3 6 -125 8 -328 7 l-333 -3 0 -105 c0 -73 -4 -107 -12 -113 -7 -4 -13 -15 -13 -23 0 -17 -64 -84 -80 -84 -5 0 -9 -6 -8 -12 2 -8 -10 -14 -29 -16 -18 -2 -33 -7 -33 -13 0 -5 -27 -9 -60 -9 -33 0 -60 4 -60 10 0 6 -9 10 -20 10 -11 0 -20 7 -20 15 0 8 -8 15 -19 15 -21 0 -71 46 -71 66 0 8 -4 14 -10 14 -5 0 -10 16 -10 35 0 19 -4 35 -10 35 -6 0 -10 37 -10 90 l0 90 -255 0 -255 0 0 -100 c0 -60 -4 -100 -10 -100 -5 0 -10 -13 -10 -28 0 -32 -58 -102 -84 -102 -9 0 -19 -7 -22 -15 -4 -8 -15 -15 -25 -15 -10 0 -19 -4 -19 -10 0 -6 -27 -10 -60 -10 -33 0 -60 4 -60 10 0 6 -9 10 -19 10 -10 0 -21 7 -25 15 -3 8 -12 15 -21 15 -20 0 -65 44 -65 65 0 8 -4 15 -10 15 -5 0 -10 11 -10 24 0 13 -5 26 -11 28 -8 3 -11 36 -10 101 l2 97 -328 0 c-270 -1 -330 -3 -340 -15z" />
                            </g>
                        </svg>
                        <div>
                            <p id="quantityPanier">
                                <?=
                                count($this->session->panier);
                                ?>
                            </p>
                        </div>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <form action="<?= site_url('Connexion/modifInformationUser') ?>" method="post" class="register modif">
        <h1>Vous pouvez modifier vos informations ici</h1>
        <div class="name">
            <input class="inputname" type="text" name="prenom" placeholder="Prenom" maxlength="20" value="<?= $user["user"]->getPrenom() ?>" required>
            <input class="inputname" type="text" name="nom" placeholder="Nom" maxlength="20" value="<?= $user["user"]->getNom() ?>" required>
        </div>
        <input type="email" name="email" placeholder="Email" maxlength="60" value="<?= $user["user"]->getMail() ?>" disabled>
        <input type=" adresse" name="adresse" placeholder="Adresse" maxlength="60" value="<?= $user["user"]->getAdresse() ?>" required>
        <input type="tel" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$" name="telephone" placeholder="Telephone (10 chiffres)" value="<?= $user["user"]->getTelephone() ?> " required>
        <div class="sexe">
            <input type="radio" name="sexe" value="homme" id="homme" <?php if ($user["user"]->getSexe() == 'homme') {
                                                                            echo ('checked');
                                                                        } ?>>
            <label for="homme">Homme</label>
            <input type="radio" name="sexe" value="femme" id="femme" <?php if ($user["user"]->getSexe() == 'femme') {
                                                                            echo ('checked');
                                                                        } ?>>
            <label for="femme">Femme</label>
            <input type="radio" name="sexe" value="autre" id="autre" <?php if ($user["user"]->getSexe() == 'autre') {
                                                                            echo ('checked');
                                                                        } ?>>
            <label for="autre">Autre</label>
        </div>
        <input class="bouton" type="submit" value="Valider">

    </form>
</body>

</html>

<script type="text/javascript" src="<?= base_url('js/loader.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('js/panier.js') ?>"></script>