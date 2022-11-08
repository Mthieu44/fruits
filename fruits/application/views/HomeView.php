<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fruits • Home</title>

    <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('css/home.css'); ?>" />
  </head>

  <body>
    <header>
      <nav>
        <ul>
          <li class="logo">
            <img src="<?= base_url('img/logo.png') ?>" alt="fruit" class="logo2" />
            <h1><b class="yellow">F</b>RUITS</h1>
          </li>
          <li><a href="index.html" class="yellow">Accueil</a></li>
          <li><a href="boutique.html">Boutique</a></li>
          <li><a href="apropos.html">A propos</a></li>
          <li><a href="contact.html">Contact</a></li>
          <li class="connexion">
            <img src="<?= base_url('img/bonhomme.png')?>" alt="connexion" />
            <a href="login.html">Connexion</a>
          </li>
          <li class="panier">
            <a href="panier.html">
              <img src="<?= base_url('img/panier.png')?>" alt="panier" />
              <div><p>0</p></div>
            </a>
          </li>
        </ul>
      </nav>
    </header>

    <div class="accueilphoto">
      <img src="<?= base_url('img/acceuil1.jpg')?>" alt="peches" class="peches" />
      <div class="textpeches">
        <img src="img/back.png" alt="back" />
        <div class="selectmenu">
          <div class="subtitle1">
            <h1>Bienvenue !</h1>
            <h1>Salivez, cliquez, mangez !</h1>
          </div>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna Lorem ipsum
            dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna Lorem ipsum dolor sit amet,
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna Lorem ipsum dolor sit amet, consectetur
            adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna
          </p>
        </div>
        <img src="<?= base_url('img/next.png')?>" alt="next" />
      </div>
    </div>

    <div class="bestsellers">
      <div class = "top-part">
        <hr class="line">
        <div class="top-text">
          <h1 class="h01">Meilleures ventes</h1>
          <p class="p01">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
        </div>
      </div>
      <div class="fruit-menu">
        
        <img src="img/back.png" class="fleche" alt="back" />

        <div class="card-product">
          <img src="img/orange.png" alt="oranges" />
            <h1 class="p02">Orange</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <div class="card-product">
          <img src="img/orange.png" alt="oranges" />
            <h1 class="p02">Orange</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <div class="card-product">
          <img src="img/orange.png" alt="oranges" />
            <h1 class="p02">Orange</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <img src="img/next.png" class="fleche" alt="next" />
      </div>
    </div>

    <div class="bestsellers">
      <div class = "top-part">
        <hr class="line">
        <div class="top-text">
          <h1 class="h01">Fruits de saison</h1>
          <p class="p01">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna </p>
        </div>
      </div>
      <div class="fruit-menu">
        
        <img src="img/back.png" class="fleche" alt="back" />

        <div class="card-product">
          <img src="img/mangue.png" alt="mangues" />
            <h1 class="p02">mangue</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <div class="card-product">
          <img src="img/mangue.png" alt="mangues" />
            <h1 class="p02">mangue</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <div class="card-product">
          <img src="img/mangue.png" alt="mangues" />
            <h1 class="p02">Orange</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <img src="img/next.png" class="fleche" alt="next" />
      </div>
    </div>

    <div class="info"></div>

    <footer></footer>
  </body>
</html>
