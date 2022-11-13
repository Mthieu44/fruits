<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fruits • Produit</title>
    
  <style>
  <?php include 'css/style.css'; ?>
  <?php include 'css/home.css'; ?>
  <?php include 'css/produit.css'; ?>
  </style>
</head>

<body>
<header>
            <nav>
                <ul>
                <li class="logo">
                    <img src="<?= base_url('img/logo.png') ?>" alt="fruit" class="logo2" />
                    <h1><b class="yellow">F</b>RUITS</h1>
                </li>
                <li><a href="<?=site_url('Home')?>" >Accueil</a></li>
                <li><a href=" <?=site_url('Boutique')?>" class="yellow" >Boutique</a></li>
                <li><a href="<?=site_url('APropos')?>"  >A propos</a></li>
                <li><a href="<?=site_url('Contact')?>">Contact</a></li>
                <li class="connexion">
                    <img src="<?= base_url('img/bonhomme.png')?>" alt="connexion" />
                    <a href="<?=site_url('Connexion')?>">Connexion</a> 
                </li>
                <li class="panier">
                    <a href="<?=site_url('Panier')?>" >
                        <img src="<?= base_url('img/panier.png')?>" alt="panier"  />
                        <div><p>0</p></div>
                    </a>
                </li>
            </ul>
            </nav>
        </header>



<div class="left-part">
    <img src="img/orange.png" alt="orange">
    <div class="rightmenu">
        <div class="top-part">
                <label class="titre-white">Mangue</label>
                <label class="prix">Prix :</label>
                <label class="prix">2.50€</label>
                <label class="prix">Quantité :</label>
                <input type="number" name="quantite" id="quantite" min="1" max="10" value="1">
                <button class="ajouter">Ajouter au panier</button>
                <button class="ajouter">Commandez et payer</button>
        </div>
    </div>
    <div class="left-text">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut ladna Lorem ipsum dolor sit amet, consectetu Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut ladna Lorem ipsum dolor sit amet, consectetu</p>
    </div>
    <div class="menu-description">
        <label class="titre-green">Description</label>


    </div>


</div>


