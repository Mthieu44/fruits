<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fruits • Home</title>

    
  <style>
  <?php include 'css/style.css'; ?>
  <?php include 'css/home.css'; ?>
  <?php include 'css/boutique.css'; ?>
  <?php include 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'; ?>
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
          <li><a href="<?=site_url('Home')?>" class="yellow" >Accueil</a></li>
          <li><a href=" <?=site_url('Boutique')?>" >Boutique</a></li>
          <li><a href="<?=site_url('APropos')?>"  >A propos</a></li>
          <li><a href="<?=site_url('Contact')?>">Contact</a></li>
          <li class="connexion">
              <img src="<?= base_url('img/bonhomme.png')?>" alt="connexion" />
              <a href="<?=site_url('Connexion')?>">
                <?php
                  if (!isset($this->session->user)) {
                    echo("Connexion");
                  } else {
                    echo($this->session->user["prenom"]);
                }
                ?>
              </a> 
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

    <div class="accueilphoto">
      <img src="<?= base_url('img/acceuil1.jpg')?>" alt="image accueil" class="peches" />
      <div class="textpeches">
        <img src="<?= base_url('img/back.png')?>" alt="back" />
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
        
        <img src="<?= base_url('img/back.png')?>" class="fleche" alt="back" />

        <div class="card-product">
          <img src="<?= base_url('img/orange.png')?>" alt="oranges" />
            <h1 class="p02">Orange</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <div class="card-product">
          <img src="<?= base_url('img/orange.png')?>" alt="oranges" />
            <h1 class="p02">Orange</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <div class="card-product">
          <img src="<?= base_url('img/orange.png')?>" alt="oranges" />
            <h1 class="p02">Orange</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <img src="<?= base_url('img/next.png')?>" class="fleche" alt="next" />
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
        
        <img src="<?= base_url('img/back.png')?>" class="fleche" alt="back" />

        <div class="card-product">
          <img src="<?= base_url('img/mangue.png')?>" alt="mangues" />
            <h1 class="p02">mangue</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <div class="card-product">
          <img src="<?= base_url('img/mangue.png')?>" alt="mangues" />
            <h1 class="p02">mangue</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>

        <div class="card-product">
          <img src="<?= base_url('img/mangue.png')?>" alt="mangues" />
            <h1 class="p02">Orange</h1>
            <hr class="line small">
            <p class="p02">1.99€</p>
            <div class="add-to-cart">
              <p class="p02">- 0 +</p>
              <p class="p02">Ajouter au panier</p>
            </div>
        </div>
        <img src="<?= base_url('img/next.png')?>" class="fleche" alt="next" />
      </div>
    </div>

    <div class="info"></div>

    <footer></footer>
  </body>
</html>
